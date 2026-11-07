<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelamar;
use App\Models\Keahlian;
use App\Models\Karyawan;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class PelamarController extends Controller
{
    private const LOGIN_ROUTE = '/login/pelamar';

    // REGISTER
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username'     => 'required|unique:pelamars,username',
            'email'        => 'required|email|unique:pelamars,email',
            'no_telp'      => 'nullable|numeric',
            'password'     => 'required|min:3',
            'conf'         => 'required|same:password',
            'keahlian'     => 'nullable',
            'firebase_uid' => 'nullable'
        ]);

        // Simpan pelamar
        $pelamar = Pelamar::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'email'        => $request->email,
            'no_telp'      => $request->no_telp,
            'password'     => Hash::make($request->password),
            'firebase_uid' => $request->firebase_uid,
            'foto_profil'  => null
        ]);

        // Simpan keahlian pelamar
        if ($request->keahlian) {
            $skills = array_map('trim', explode(',', $request->keahlian));

            foreach ($skills as $skill) {
                Keahlian::create([
                    'pelamar_id'    => $pelamar->id,
                    'nama_keahlian' => $skill
                ]);
            }
        }

        // login sessions
        session([
            'pelamar_id'       => $pelamar->id,
            'pelamar_username' => $pelamar->username,
            'pelamar_nama'     => $pelamar->nama_lengkap,
            'pelamar_foto'     => $pelamar->foto_profil,
        ]);

        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('openPasswordModal', true);
        }

        $pelamar = Pelamar::find(session('pelamar_id'));

        if (!$pelamar) {
            return redirect(self::LOGIN_ROUTE);
        }

        if (!Hash::check($request->password_lama, $pelamar->password)) {
            return back()
                ->withErrors(['password_lama' => 'Password lama salah'])
                ->with('openPasswordModal', true);
        }

        $pelamar->password = Hash::make($request->password_baru);
        $pelamar->save();

        return back()->with('success_password', 'Password berhasil diperbarui');
    }

    private function createPelamarSession(Pelamar $pelamar): void
    {
        session([
            'pelamar_id'       => $pelamar->id,
            'pelamar_username' => $pelamar->username,
            'pelamar_nama'     => $pelamar->nama_lengkap,
            'pelamar_foto'     => $pelamar->foto_profil,
        ]);
    }

    private function loginLocal(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pelamar = Pelamar::where('username', $request->username)
                          ->orWhere('email', $request->username)
                          ->first();

        if (!$pelamar || !Hash::check($request->password, $pelamar->password)) {
            return back()->withErrors([
                'login' => 'Username/email atau password salah.'
            ])->withInput();
        }

        $this->createPelamarSession($pelamar);

        return redirect()->route('home');
    }

    private function loginFirebase(Request $request)
    {
        $request->validate([
            'username'     => 'required',
            'idToken'      => 'required',
            'firebase_uid' => 'required',
        ]);

        $apiKey = config('services.firebase.api_key');
        $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$apiKey}", [
            'idToken' => $request->idToken
        ]);

        $users = $response->json('users');
        if ($response->failed() || empty($users) || $users[0]['localId'] !== $request->firebase_uid) {
            return back()->withErrors([
                'login' => 'Verifikasi Firebase Auth gagal atau identitas tidak cocok.'
            ])->withInput();
        }

        $pelamar = Pelamar::where('email', $users[0]['email'])
                          ->orWhere('username', $request->username)
                          ->first();

        if (!$pelamar) {
            return back()->withErrors([
                'login' => 'Akun tidak ditemukan di database lokal.'
            ])->withInput();
        }

        if (!$pelamar->firebase_uid) {
            $pelamar->firebase_uid = $users[0]['localId'];
            $pelamar->save();
        }

        $this->createPelamarSession($pelamar);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        if (!$request->has('idToken')) {
            return $this->loginLocal($request);
        }

        return $this->loginFirebase($request);
    }

    public function validateSignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:pelamars,username',
            'email'    => 'required|email|unique:pelamars,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        return response()->json(['success' => true]);
    }

    public function getEmailFromUsername(Request $request)
    {
        $request->validate([
            'username' => 'required'
        ]);

        $pelamar = Pelamar::where('username', $request->username)
                          ->orWhere('email', $request->username)
                          ->first();

        if (!$pelamar) {
            return response()->json([
                'success' => false,
                'message' => 'Username atau email tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'email' => $pelamar->email
        ]);
    }

    public function firebaseGoogleLogin(Request $request)
    {
        $request->validate([
            'idToken' => 'required',
            'firebase_uid' => 'required',
            'nama_lengkap' => 'required',
            'no_telp' => 'nullable|numeric',
            'keahlian' => 'nullable'
        ]);

        $firebaseUser = $this->verifyFirebaseToken((string) $request->idToken);
        if (!$firebaseUser) {
            return response()->json([
                'success' => false,
                'message' => 'Verifikasi token Google gagal.'
            ], 401);
        }

        if ($firebaseUser['localId'] !== $request->firebase_uid) {
            return response()->json([
                'success' => false,
                'message' => 'Identitas Google tidak cocok.'
            ], 401);
        }

        $pelamar = $this->resolveFirebasePelamar($firebaseUser, $request);
        $this->createPelamarSession($pelamar);

        return response()->json([
            'success' => true,
            'redirect' => route('home')
        ]);
    }

    private function verifyFirebaseToken(string $idToken): ?array
    {
        $apiKey = config('services.firebase.api_key');
        $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$apiKey}", [
            'idToken' => $idToken
        ]);

        if ($response->failed() || empty($response->json('users'))) {
            return null;
        }

        return $response->json('users')[0];
    }

    private function resolveFirebasePelamar(array $firebaseUser, Request $request): Pelamar
    {
        $firebaseUid = $firebaseUser['localId'];
        $email = $firebaseUser['email'];

        $pelamar = Pelamar::where('firebase_uid', $firebaseUid)->first();
        if ($pelamar) {
            return $pelamar;
        }

        $existingByEmail = Pelamar::where('email', $email)->first();
        if ($existingByEmail) {
            $existingByEmail->firebase_uid = $firebaseUid;
            if ($request->no_telp) {
                $existingByEmail->no_telp = $request->no_telp;
            }
            $existingByEmail->save();
            $this->syncPelamarKeahlian($existingByEmail->id, $request->keahlian);
            return $existingByEmail;
        }

        $newPelamar = Pelamar::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $this->generateUniqueUsername($email),
            'email'        => $email,
            'firebase_uid' => $firebaseUid,
            'password'     => Hash::make(Str::random(16)),
            'foto_profil'  => null,
            'no_telp'      => $request->no_telp
        ]);

        $this->syncPelamarKeahlian($newPelamar->id, $request->keahlian);
        return $newPelamar;
    }

    private function generateUniqueUsername(string $email): string
    {
        $baseUsername = explode('@', $email)[0];
        $username = $baseUsername;
        $counter = 1;
        while (Pelamar::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }
        return $username;
    }

    private function syncPelamarKeahlian(int $pelamarId, ?string $keahlian): void
    {
        if (!$keahlian) {
            return;
        }

        Keahlian::where('pelamar_id', $pelamarId)->delete();
        $skills = array_map('trim', explode(',', $keahlian));
        foreach ($skills as $skill) {
            if (!empty($skill)) {
                Keahlian::create([
                    'pelamar_id'    => $pelamarId,
                    'nama_keahlian' => $skill
                ]);
            }
        }
    }

    //setting
    public function settings()
    {
        $pelamar = Pelamar::with('keahlians')->find(session('pelamar_id'));

        if (!$pelamar) {
            return redirect(self::LOGIN_ROUTE);
        }

        $keahlianString = $pelamar->keahlians->pluck('nama_keahlian')->implode(', ');

        return view('setting', compact('pelamar', 'keahlianString'));
    }

    public function updateProfil(Request $request)
    {
        $pelamar = Pelamar::findOrFail(session('pelamar_id'));

        $request->validate([
            'nama_lengkap' => 'required',
            'username'     => 'required|unique:pelamars,username,' . $pelamar->id,
            'email'        => 'required|email|unique:pelamars,email,' . $pelamar->id,
            'no_telp'      => 'nullable|numeric',
            'foto_profil'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $fotoProfilPath = $pelamar->foto_profil;

        if ($request->hasFile('foto_profil')) {
            if ($pelamar->foto_profil && Storage::disk('public')->exists($pelamar->foto_profil)) {
                Storage::disk('public')->delete($pelamar->foto_profil);
            }

            $fotoProfilPath = $request->file('foto_profil')->store(
                'pelamar/profil',
                'public'
            );
        }

        $pelamar->update([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'email'        => $request->email,
            'foto_profil' => $fotoProfilPath,
            'no_telp'      => $request->no_telp,
        ]);

        if ($request->keahlian) {
            Keahlian::where('pelamar_id', $pelamar->id)->delete();
            $skills = array_map('trim', explode(',', $request->keahlian));
            foreach ($skills as $skill) {
                if (!empty($skill)) {
                    Keahlian::create([
                        'pelamar_id' => $pelamar->id,
                        'nama_keahlian' => $skill,
                    ]);
                }
            }
        }

        session([
            'pelamar_nama'     => $pelamar->nama_lengkap,
            'pelamar_username' => $pelamar->username,
            'pelamar_foto'     => $fotoProfilPath,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function destroy()
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect(self::LOGIN_ROUTE);
        }
        Keahlian::where('pelamar_id', $pelamarId)->delete();
        Karyawan::where('id_pelamar', $pelamarId)->delete();
        $pelamar = Pelamar::find($pelamarId);
        if ($pelamar && $pelamar->foto_profil) {
            Storage::disk('public')->delete($pelamar->foto_profil);
        }
        Pelamar::where('id', $pelamarId)->delete();
        session()->flush();
        return redirect('/')->with('success', 'Akun berhasil dihapus');
    }
}
