<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Karyawan; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $perusahaan = Perusahaan::where('email', $request->email)->first();

        if (!$perusahaan || !Hash::check($request->password, $perusahaan->password)) {
            return back()->withErrors(['email' => 'Email atau password salah']);
        }

        // Cek status verifikasi
        if ($perusahaan->status_verifikasi !== 'verified') {
            if ($perusahaan->status_verifikasi === 'pending') {
                return back()->withErrors(['email' => 'Akun Anda masih menunggu verifikasi dari admin. Silakan tunggu konfirmasi via email.']);
            } else if ($perusahaan->status_verifikasi === 'rejected') {
                return back()->withErrors(['email' => 'Akun Anda ditolak. Alasan: ' . $perusahaan->alasan_penolakan]);
            }
        }

        session([
            'perusahaan_id'    => $perusahaan->id,
            'perusahaan_nama'  => $perusahaan->nama_perusahaan,
            'perusahaan_email' => $perusahaan->email,
            'perusahaan_foto'  => $perusahaan->foto_profil,
        ]);

        return redirect('/home-perusahaan');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'email'           => 'required|email|unique:perusahaans,email',
            'password'        => 'required|min:6',
            'telepon'         => 'required|string|max:15',
            'npwp'            => 'required|string|max:20|unique:perusahaans,npwp',
            'sertifikat'      => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_profil'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'alamat'          => 'required|string|max:500',
            'sektor_industri' => 'required|string|max:100',
            'deskripsi'       => 'required|string|max:2000',
            'website'         => 'nullable|string|max:255',
        ]);

        $sertifikatPath = null;

        if ($request->hasFile('sertifikat')) {
            $sertifikatPath = $request->file('sertifikat')->store(
                'sertifikat',
                'public'
            );
        }

        $fotoProfilPath = null;

        if ($request->hasFile('foto_profil')) {
            $fotoProfilPath = $request->file('foto_profil')->store(
                'perusahaan/profil',
                'public'
            );
        }

        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $request->nama_perusahaan,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'telepon'           => $request->telepon,
            'npwp'              => $request->npwp,
            'sertifikat'        => $sertifikatPath,
            'foto_profil'       => $fotoProfilPath,
            'alamat'            => $request->alamat,
            'sektor_industri'   => $request->sektor_industri,
            'deskripsi'         => $request->deskripsi,
            'website'           => $request->website,
            'status_verifikasi' => 'pending', // Set status ke pending
        ]);

        // Pop Up menunggu verifikasi
        return redirect('/login/perusahaan')->with('info', 'Registrasi berhasil!
         Tunggu verifikasi dari admin sebelum login. Kami akan mengirimkan email konfirmasi.');
    }

    public function kategoriKaryawan()
    {
        $perusahaanId = session('perusahaan_id');

        $kategori = Karyawan::where('id_perusahaan', $perusahaanId)
            ->whereHas('pelamar')
            ->select('kategori_pekerjaan')
            ->selectRaw('COUNT(*) as jumlah')
            ->groupBy('kategori_pekerjaan')
            ->get();

        $karyawans = Karyawan::where('id_perusahaan', $perusahaanId)
            ->whereHas('pelamar')
            ->with(['pelamar', 'lowongan'])
            ->get();

        return view('karyawanPerusahaan', compact('kategori', 'karyawans'));
    }

    public function showPengaturanAkun()
    {
        $perusahaanId = session('perusahaan_id');

        if (!$perusahaanId) {
            return redirect('/login/perusahaan')->with('error', 'Anda harus login untuk mengakses pengaturan.');
        }
        $perusahaan = Perusahaan::find($perusahaanId);

        if (!$perusahaan) {
            return redirect('/login/perusahaan');
        }

        return view('perusahaan.settingPerusahaan', compact('perusahaan'));
    }

    public function updatePengaturanAkun(Request $request)
    {
        $perusahaanId = session('perusahaan_id');
        if (!$perusahaanId) {
            return redirect('/login/perusahaan')->with('error', 'Akses ditolak. Silakan login kembali.');
        }

        $perusahaan = Perusahaan::find($perusahaanId);

        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email'           => 'required|email|max:255|unique:perusahaans,email,' . $perusahaanId,
            'telepon'         => 'required|string|max:15',
            'lokasi'          => 'nullable|string|max:500',
            'sektor_industri' => 'required|string|max:100',
            'deskripsi'       => 'required|string|max:2000',
            'website'         => 'nullable|string|max:255',
            'foto_profil'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoProfilPath = $perusahaan->foto_profil;

        if ($request->hasFile('foto_profil')) {
            if ($perusahaan->foto_profil && Storage::disk('public')->exists($perusahaan->foto_profil)) {
                Storage::disk('public')->delete($perusahaan->foto_profil);
            }

            $fotoProfilPath = $request->file('foto_profil')->store(
                'perusahaan/profil',
                'public'
            );
        }

        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'email'           => $request->email,
            'telepon'         => $request->telepon,
            'alamat'          => $request->lokasi,
            'sektor_industri' => $request->sektor_industri,
            'deskripsi'       => $request->deskripsi,
            'website'         => $request->website,
            'foto_profil'     => $fotoProfilPath,
        ]);

        session([
            'perusahaan_nama'  => $perusahaan->nama_perusahaan,
            'perusahaan_email' => $perusahaan->email,
            'perusahaan_foto'  => $fotoProfilPath,
        ]);

        return redirect()->route('perusahaan.settings')->with('success', 'Pengaturan akun berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['perusahaan_id', 'perusahaan_nama', 'perusahaan_email', 'perusahaan_foto']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil keluar.');
    }

    public function updateFotoProfil(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $perusahaanId = session('perusahaan_id');
        $perusahaan = Perusahaan::find($perusahaanId);

        if ($request->hasFile('foto_profil')) {
            if ($perusahaan->foto_profil && Storage::disk('public')->exists($perusahaan->foto_profil)) {
                Storage::disk('public')->delete($perusahaan->foto_profil);
            }

            $path = $request->file('foto_profil')->store('perusahaan/profil', 'public');
            
            $perusahaan->update([
                'foto_profil' => $path
            ]);

            session(['perusahaan_foto' => $path]);

            return back()->with('success', 'Foto profil berhasil diperbarui!');
        }

        return back()->with('error', 'Gagal mengunggah foto.');
    }

    public function updatePassword(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('openPasswordModal', true);
        }

        $perusahaan = Perusahaan::find(session('perusahaan_id'));

        if (!Hash::check($request->password_lama, $perusahaan->password)) {
            return back()
                ->withErrors(['password_lama' => 'Password lama tidak sesuai'])
                ->withInput()
                ->with('openPasswordModal', true);
        }

        $perusahaan->password = Hash::make($request->password_baru);
        $perusahaan->save();

        return back()->with('success_password', 'Password berhasil diperbarui!');
    }
    
}
