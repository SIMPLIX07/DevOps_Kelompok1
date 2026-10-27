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
            return redirect('/login/pelamar');
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



    public function login(Request $request)
    {
        // Fallback to traditional local database login if Firebase idToken is not provided (legacy/old users)
        if (!$request->has('idToken')) {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            // Find applicant by email or username
            $pelamar = Pelamar::where('username', $request->username)
                              ->orWhere('email', $request->username)
                              ->first();

            if (!$pelamar || !Hash::check($request->password, $pelamar->password)) {
                return back()->withErrors([
                    'login' => 'Username/email atau password salah.'
                ])->withInput();
            }

            session([
                'pelamar_id'       => $pelamar->id,
                'pelamar_username' => $pelamar->username,
                'pelamar_nama'     => $pelamar->nama_lengkap,
                'pelamar_foto'     => $pelamar->foto_profil,
            ]);

            return redirect()->route('home');
        }

        $request->validate([
            'username' => 'required',
            'idToken' => 'required',
            'firebase_uid' => 'required',
        ]);

        // Verify ID Token with Google Firebase API
        $apiKey = config('services.firebase.api_key');
        $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$apiKey}", [
            'idToken' => $request->idToken
        ]);

        if ($response->failed() || empty($response->json('users'))) {
            return back()->withErrors([
                'login' => 'Verifikasi Firebase Auth gagal.'
            ])->withInput();
        }

        $firebaseUser = $response->json('users')[0];
        $firebaseUid = $firebaseUser['localId'];

        if ($firebaseUid !== $request->firebase_uid) {
            return back()->withErrors([
                'login' => 'Identitas Firebase tidak cocok.'
            ])->withInput();
        }

        // Cari pelamar berdasarkan email atau username
        $pelamar = Pelamar::where('email', $firebaseUser['email'])
                          ->orWhere('username', $request->username)
                          ->first();

        if (!$pelamar) {
            return back()->withErrors([
                'login' => 'Akun tidak ditemukan di database lokal.'
            ])->withInput();
        }

        // Sinkronisasi firebase_uid jika belum ada
        if (!$pelamar->firebase_uid) {
            $pelamar->firebase_uid = $firebaseUid;
            $pelamar->save();
        }

        session([
            'pelamar_id'       => $pelamar->id,
            'pelamar_username' => $pelamar->username,
            'pelamar_nama'     => $pelamar->nama_lengkap,
            'pelamar_foto'     => $pelamar->foto_profil,
        ]);

        return redirect()->route('home');
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

        $apiKey = config('services.firebase.api_key');
        $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$apiKey}", [
            'idToken' => $request->idToken
        ]);

        if ($response->failed() || empty($response->json('users'))) {
            return response()->json([
                'success' => false,
                'message' => 'Verifikasi token Google gagal.'
            ], 401);
        }

        $firebaseUser = $response->json('users')[0];
        $firebaseUid = $firebaseUser['localId'];
        $email = $firebaseUser['email'];

        if ($firebaseUid !== $request->firebase_uid) {
            return response()->json([
                'success' => false,
                'message' => 'Identitas Google tidak cocok.'
            ], 401);
        }

        // Cari berdasarkan firebase_uid atau email
        $pelamar = Pelamar::where('firebase_uid', $firebaseUid)->first();

        if (!$pelamar) {
            $pelamar = Pelamar::where('email', $email)->first();
            if ($pelamar) {
                $pelamar->firebase_uid = $firebaseUid;
                if ($request->no_telp) {
                    $pelamar->no_telp = $request->no_telp;
                }
                $pelamar->save();

                // Simpan keahlian pelamar jika ada
                if ($request->keahlian) {
                    Keahlian::where('pelamar_id', $pelamar->id)->delete();
                    $skills = array_map('trim', explode(',', $request->keahlian));
                    foreach ($skills as $skill) {
                        if (!empty($skill)) {
                            Keahlian::create([
                                'pelamar_id'    => $pelamar->id,
                                'nama_keahlian' => $skill
                            ]);
                        }
                    }
                }
            } else {
                // Buat akun baru
                $baseUsername = explode('@', $email)[0];
                $username = $baseUsername;
                $counter = 1;
                while (Pelamar::where('username', $username)->exists()) {
                    $username = $baseUsername . $counter;
                    $counter++;
                }

                $pelamar = Pelamar::create([
                    'nama_lengkap' => $request->nama_lengkap,
                    'username'     => $username,
                    'email'        => $email,
                    'firebase_uid' => $firebaseUid,
                    'password'     => Hash::make(Str::random(16)),
                    'foto_profil'  => null,
                    'no_telp'      => $request->no_telp
                ]);

                // Simpan keahlian pelamar
                if ($request->keahlian) {
                    $skills = array_map('trim', explode(',', $request->keahlian));
                    foreach ($skills as $skill) {
                        if (!empty($skill)) {
                            Keahlian::create([
                                'pelamar_id'    => $pelamar->id,
                                'nama_keahlian' => $skill
                            ]);
                        }
                    }
                }
            }
        }

        session([
            'pelamar_id'       => $pelamar->id,
            'pelamar_username' => $pelamar->username,
            'pelamar_nama'     => $pelamar->nama_lengkap,
            'pelamar_foto'     => $pelamar->foto_profil,
        ]);

        return response()->json([
            'success' => true,
            'redirect' => route('home')
        ]);
    }

    //setting
    public function settings()
    {
        $pelamar = Pelamar::with('keahlians')->find(session('pelamar_id'));

        if (!$pelamar) {
            return redirect('/login/pelamar');
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
            return redirect('/login/pelamar');
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
