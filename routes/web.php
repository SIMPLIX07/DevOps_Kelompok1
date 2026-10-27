<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\AuthPelamarController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\WawancaraController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookmarkController;


Route::get('/', function () {
    session()->flush();
    return view('index');
});

Route::get('/tentang-kami', function () {
    try {
        $dbPerusahaan = \App\Models\Perusahaan::count();
        $dbPenempatan = \App\Models\Karyawan::count() + \App\Models\Lamaran::where('status', 'diterima')->count();
        $perusahaanCount = $dbPerusahaan > 0 ? $dbPerusahaan : 500;
        $penempatanCount = $dbPenempatan > 0 ? $dbPenempatan : 10000;
    } catch (\Exception $e) {
        $perusahaanCount = 500;
        $penempatanCount = 10000;
    }
    return view('about', compact('perusahaanCount', 'penempatanCount'));
})->name('about');

Route::get('/pusat-bantuan', function () {
    return view('support');
})->name('support');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/lamar', function () {
    return view('lamar');
});

Route::get('/login/pelamar', function () {
    return view('loginPelamar');
});

Route::get('/login/perusahaan', function () {
    return view('loginPerusahaan');
});

Route::get('/register/pelamar', function () {
    return view('signPelamar');
});

Route::get('/register/perusahaan', function () {
    return view('signPerusahaan');
});

Route::get('/home-pelamar', [LowonganController::class, 'listPelamar'])->name('home');


// DAFTAR
Route::get('/pilihRole', function () {
    return view('daftarPelamar/pilihRole');
});


Route::get('/lamaran-anda', [LamaranController::class, 'index']);


Route::get('/kelola', function () {
    return view('Kelola');
});



// Pelamar
Route::post('/register/pelamar', [PelamarController::class, 'store'])->name('register.pelamar');
Route::post('/login/pelamar', [PelamarController::class, 'login'])->name('login.pelamar');
Route::post('/register/pelamar/validate', [PelamarController::class, 'validateSignup'])->name('register.pelamar.validate');
Route::post('/login/pelamar/get-email', [PelamarController::class, 'getEmailFromUsername'])->name('login.pelamar.getemail');
Route::post('/auth/firebase/google', [PelamarController::class, 'firebaseGoogleLogin'])->name('auth.firebase.google');
Route::get('/pelamar/cv', [LamaranController::class, 'getCvPelamar']);
Route::get('/pelamar/portofolio', [LamaranController::class, 'getPortofolioPelamar']);
Route::post('/lamaran/insert', [LamaranController::class, 'insertLamaran']);

// Setting Pelamar
Route::get('/pelamar/setting', [PelamarController::class, 'settings'])->name('pelamar.settings');
Route::post('/pelamar/setting/update', [PelamarController::class, 'updateProfil'])->name('pelamar.update');
Route::get('/pelamar/keamanan', function () {
    return "Halaman Keamanan (Belum Dibuat)";
})->name('pelamar.keamanan');

// Lowongan
Route::prefix('lowongan')->group(function () {
    Route::get('/tambah', [LowonganController::class, 'create'])->name('lowongan.create');
    Route::post('/tambah', [LowonganController::class, 'store'])->name('lowongan.store');

    // Detail Lowongan Perusahan
    Route::get('/detail/{id}', [LowonganController::class, 'showDetail'])->name('perusahaan.lowongan.detail');
    Route::delete('/delete/{id}', [LowonganController::class, 'destroy'])->name('perusahaan.lowongan.delete');
    Route::get('/edit/{id}', [LowonganController::class, 'edit'])->name('lowongan.edit');
    Route::put('/update/{id}', [LowonganController::class, 'update'])->name('lowongan.update');

    // Detail untuk sisi PELAMAR 
    Route::get('/{id}', [LowonganController::class, 'detail'])->name('lowongan.detail');

    Route::post('/lamaran/{id}/tolak', [LamaranController::class, 'tolak'])->name('lamaran.tolak');
    Route::post('/lamaran/{id}/jadwal-wawancara', [LamaranController::class, 'jadwalWawancara'])->name('lamaran.wawancara');
});

Route::post('/lamaran/terima/{id}', [PerusahaanController::class, 'terimaPelamar'])->name('lamaran.terima');
Route::get('/karyawanPerusahaan', [PerusahaanController::class, 'kategoriKaryawan']);

// CV
Route::resource('/cv', CVController::class);
Route::get('/cv/detail/{id}', [CVController::class, 'show'])->name('cv.show');

// Portofolio
Route::resource('/portofolio', PortofolioController::class);

// Perusahaan
Route::get('/home-perusahaan', [LowonganController::class, 'index']);
Route::post('/login/perusahaan', [PerusahaanController::class, 'login'])->name('login.perusahaan');
Route::post('/register/perusahaan', [PerusahaanController::class, 'register'])->name('register.perusahaan');
Route::get('/perusahaan/pengaturan', [PerusahaanController::class, 'showPengaturanAkun'])->name('perusahaan.settings');
Route::post('/perusahaan/pengaturan/update-foto', [PerusahaanController::class, 'updateFotoProfil'])->name('perusahaan.settings.updateFoto');
Route::post('/perusahaan/pengaturan', [PerusahaanController::class, 'updatePengaturanAkun'])->name('perusahaan.settings.update');
Route::post('/perusahaan/pengaturan/update-password', [PerusahaanController::class, 'updatePassword'])->name('perusahaan.settings.updatePassword');
Route::post('/perusahaan/logout', [PerusahaanController::class, 'logout'])->name('perusahaan.logout');
Route::post('/lamaran/store', [LamaranController::class, 'insertLamaran']);


Route::get('/lowongan-perusahaan', function () {
    return view('homePelamar.lowongan');
});

//wawancara pelamar
Route::get('/wawancara', [WawancaraController::class, 'index'])
    ->name('pelamar.wawancara');

//wawancara perusahaan
Route::get('/perusahaan/wawancara', [WawancaraController::class, 'indexPerusahaan'])
    ->name('perusahaan.wawancara');

// History lamaran perusahaan
Route::get('/perusahaan/history', [LamaranController::class, 'historyPerusahaan'])
    ->name('perusahaan.history');

Route::post(
    '/perusahaan/wawancara/{id}/terima',
    [KaryawanController::class, 'storeFromWawancara']
)->name('perusahaan.wawancara.terima');

Route::post(
    '/perusahaan/wawancara/{id}/tolak',
    [WawancaraController::class, 'tolak']
)->name('perusahaan.wawancara.tolak');

Route::get(
    '/perusahaan/karyawan/by-kategori/{kategori}',
    [KaryawanController::class, 'ajaxByKategori']
);

Route::post(
    '/pelamar/update-password',
    [PelamarController::class, 'updatePassword']
)->name('pelamar.updatePassword');


Route::post('/pelamar/logout', [PelamarController::class, 'logout'])
    ->name('pelamar.logout');

// Bookmark
Route::get('/bookmark', [BookmarkController::class, 'index'])->name('pelamar.bookmark');
Route::post('/bookmark/toggle', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');

Route::delete('/pelamar/hapus-akun', [PelamarController::class, 'destroy'])
    ->name('pelamar.destroy');

// ============ ADMIN ROUTES ============
Route::prefix('admin')->group(function () {
    // Login Admin
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    
    // Admin middleware - routes yang memerlukan login admin
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/daftar-perusahaan', [AdminController::class, 'daftarPerusahaan'])->name('admin.daftarPerusahaan');
        Route::get('/detail-perusahaan/{id}', [AdminController::class, 'detailPerusahaan'])->name('admin.detailPerusahaan');
        Route::post('/verifikasi-perusahaan/{id}', [AdminController::class, 'verifikasiPerusahaan'])->name('admin.verifikasiPerusahaan');
        Route::get('/history-verifikasi', [AdminController::class, 'historyVerifikasi'])->name('admin.historyVerifikasi');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

