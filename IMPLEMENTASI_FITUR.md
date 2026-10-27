# Dokumentasi Implementasi Fitur KerjaKuy

**Aplikasi:** Platform Job Matching untuk Pelamar dan Perusahaan  
**Framework:** Laravel 11  
**Database:** MySQL  
**Integrasi:** Node.js API untuk Logging Wawancara

---

## Daftar Isi
1. [Fitur Autentifikasi](#1-fitur-autentifikasi)
2. [CRUD Data](#2-crud-data)
3. [Fitur Portfolio](#3-fitur-portfolio)
4. [Proses Bisnis Utama](#4-proses-bisnis-utama)
5. [Validasi](#5-validasi)
6. [Interaksi API](#6-interaksi-api)

---

## 1. FITUR AUTENTIFIKASI

### 1.1 Register Pelamar

#### Deskripsi Singkat
Fitur yang memungkinkan calon pelamar untuk membuat akun baru dengan informasi dasar dan keahlian awal.

#### Alur Kerja
```
1. Pengguna mengakses halaman /register/pelamar
2. Mengisi form: nama lengkap, username, email, password, konfirmasi password
3. Pilihan: input keahlian (opsional, format: dipisah koma)
4. Submit form → validasi server-side
5. Password di-hash menggunakan bcrypt
6. Data pelamar disimpan ke tabel `pelamars`
7. Keahlian (jika ada) disimpan ke tabel `keahlians`
8. Session dibuat otomatis (auto-login)
9. Redirect ke /home-pelamar
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PelamarController.php](app/Http/Controllers/PelamarController.php) - method `store()`
- **Route:** [routes/web.php](routes/web.php) - `Route::post('/register/pelamar', ...)`
- **View:** `resources/views/signPelamar.blade.php`
- **Model:** [app/Models/Pelamar.php](app/Models/Pelamar.php)
- **Model:** [app/Models/Keahlian.php](app/Models/Keahlian.php)
- **Database:** `pelamars`, `keahlians` tables

#### Validasi yang Dijalankan
- `nama_lengkap`: required
- `username`: required, unique di tabel `pelamars`
- `email`: required, format email, unique di tabel `pelamars`
- `password`: required, minimal 3 karakter
- `conf`: required, harus sama dengan `password`
- `keahlian`: nullable

#### Teknologi
- Laravel Validation
- Illuminate\Support\Facades\Hash (bcrypt)
- Laravel Session

---

### 1.2 Login Pelamar

#### Deskripsi Singkat
Fitur untuk pelamar yang sudah terdaftar untuk masuk ke sistem dengan username dan password melalui integrasi Node.js API.

#### Alur Kerja
```
1. Pengguna mengakses halaman /login/pelamar
2. Mengisi form: username, password
3. Submit form ke Laravel controller
4. Laravel mengirim HTTP POST request ke Node.js API
   URL: http://localhost:3001/login-pelamar
   Data: { username, password }
5. Node.js API validasi credentials
6. Jika valid → Node.js return user data (id, username, nama)
7. Laravel buat session dengan data dari Node.js response
8. Redirect ke /home-pelamar
9. Jika invalid atau timeout → tampilkan error message
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PelamarController.php](app/Http/Controllers/PelamarController.php) - method `login()`
- **Route:** [routes/web.php](routes/web.php) - `Route::post('/login/pelamar', ...)`
- **View:** `resources/views/loginPelamar.blade.php`
- **Model:** [app/Models/Pelamar.php](app/Models/Pelamar.php)
- **External API:** Node.js - `POST /login-pelamar`

#### Implementation
```php
// Di PelamarController::login()
try {
    $response = Http::post('http://localhost:3001/login-pelamar', [
        'username' => $request->username,
        'password' => $request->password,
    ]);
} catch (\Exception $e) {
    return back()->withErrors(['login' => 'Server login sedang tidak tersedia']);
}

if ($response->failed()) {
    return back()->withErrors(['login' => $response->json()['message'] ?? 'Login gagal']);
}

$data = $response->json();
session([
    'pelamar_id'       => $data['id'],
    'pelamar_username' => $data['username'],
    'pelamar_nama'     => $data['nama'],
]);
return redirect('/home-pelamar');
```

#### Session yang Dibuat
```php
session([
    'pelamar_id'       => $data['id'],
    'pelamar_username' => $data['username'],
    'pelamar_nama'     => $data['nama'],
]);
```

#### Validasi
- `username`: required
- `password`: required
- Timeout API: default PHP timeout atau error handling

#### Node.js API Response
```json
// Success (200)
{
    "id": 5,
    "username": "john_doe",
    "nama": "John Doe"
}

// Error
{
    "message": "Username atau password salah"
}
```

#### Fitur Tambahan
- Method `logout()` - Flush session
- Method `destroy()` - Delete akun pelamar

---

### 1.3 Register Perusahaan

#### Deskripsi Singkat
Fitur untuk perusahaan mendaftar dengan verifikasi dokumen (NPWP dan sertifikat) oleh admin.

#### Alur Kerja
```
1. Pengguna mengakses halaman /register/perusahaan
2. Mengisi form dengan data:
   - Nama perusahaan
   - Email
   - Password
   - Telepon
   - NPWP
   - Upload Sertifikat (PDF/JPG/PNG)
   - Upload Foto Profil (opsional)
3. Submit form → validasi
4. File sertifikat disimpan ke folder 'public/sertifikat'
5. Foto profil disimpan ke folder 'public/perusahaan/profil'
6. Data perusahaan disimpan dengan status_verifikasi = 'pending'
7. Redirect ke /login/perusahaan dengan pesan untuk menunggu verifikasi
8. Admin akan memverifikasi dokumen sebelum perusahaan bisa login
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PerusahaanController.php](app/Http/Controllers/PerusahaanController.php) - method `register()`
- **Route:** [routes/web.php](routes/web.php) - `Route::post('/register/perusahaan', ...)`
- **View:** `resources/views/signPerusahaan.blade.php`
- **Model:** [app/Models/Perusahaan.php](app/Models/Perusahaan.php)

#### Validasi
- `nama_perusahaan`: required
- `email`: required, format email, unique
- `password`: required, minimal 6 karakter
- `telepon`: required, string, max 15
- `npwp`: required, string, max 20, unique
- `sertifikat`: required, file, mimes(pdf,jpg,jpeg,png), max 2048 KB
- `foto_profil`: nullable, image, mimes(jpg,jpeg,png), max 2048 KB

#### Status Verifikasi
- `pending`: Menunggu verifikasi admin
- `verified`: Sudah diverifikasi, bisa login
- `rejected`: Ditolak, bersama alasan penolakan

---

### 1.4 Login Perusahaan

#### Deskripsi Singkat
Fitur login untuk perusahaan yang sudah terverifikasi oleh admin.

#### Alur Kerja
```
1. Pengguna mengakses halaman /login/perusahaan
2. Mengisi form: email, password
3. Submit form
4. Server cari data di tabel `perusahaans` berdasarkan email
5. Validasi password dengan Hash::check()
6. CEK STATUS VERIFIKASI:
   - Jika status = 'verified' → lanjut
   - Jika status = 'pending' → tampilkan error "Menunggu verifikasi dari admin"
   - Jika status = 'rejected' → tampilkan error dengan alasan penolakan
7. Jika verified → buat session
8. Redirect ke /home-perusahaan
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PerusahaanController.php](app/Http/Controllers/PerusahaanController.php) - method `login()`
- **Route:** [routes/web.php](routes/web.php) - `Route::post('/login/perusahaan', ...)`
- **Model:** [app/Models/Perusahaan.php](app/Models/Perusahaan.php)

#### Session yang Dibuat
```php
session([
    'perusahaan_id'    => $perusahaan->id,
    'perusahaan_nama'  => $perusahaan->nama_perusahaan,
    'perusahaan_email' => $perusahaan->email
]);
```

---

### 1.5 Admin Login

#### Deskripsi Singkat
Fitur login untuk admin yang mengelola verifikasi perusahaan.

#### Alur Kerja
```
1. Admin mengakses halaman /admin/login
2. Mengisi email dan password admin
3. Submit form
4. Server validasi terhadap config 'admin.admin.email' dan 'admin.admin.password'
5. Jika valid → buat session admin
6. Redirect ke /admin/dashboard
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/AdminController.php](app/Http/Controllers/AdminController.php) - method `login()`
- **Route:** `routes/web.php` (didefinisikan terpisah untuk admin)
- **Config:** [config/admin.php](config/admin.php)
- **View:** `resources/views/admin/loginAdmin.blade.php`

#### Session Admin
```php
session(['admin_id' => 'admin', 'admin_email' => $adminEmail]);
```

---

## 2. CRUD DATA

### 2.1 CRUD CV (Curriculum Vitae) Pelamar

#### Deskripsi Singkat
Fitur untuk pelamar membuat, membaca, mengupdate, dan menghapus CV dengan komponen: pendidikan, skill, dan pengalaman kerja.

#### Alur Kerja - CREATE (Tambah CV)
```
1. Pelamar mengakses /cv/create
2. Mengisi form CV:
   - Umur: required, integer
   - Kontak: required
   - Title: required (profesi/jabatan)
   - Subtitle: required (deskripsi singkat)
   - Tentang Saya: required
   - Pendidikan: array dengan min 1 item
     * Tingkat (SMA, S1, S2, dll)
     * Universitas
     * Jurusan
   - Skill: array max 3 items
   - Pengalaman: array max 3 items
3. Submit form
4. Validasi server-side
5. Database transaction dimulai
6. Simpan ke tabel `cvs`
7. Simpan pendidikan ke tabel `pendidikans`
8. Simpan skill ke tabel `skill_cvs`
9. Simpan pengalaman ke tabel `pengalamans`
10. Commit transaction
11. Redirect ke index dengan success message
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/CVController.php](app/Http/Controllers/CVController.php)
  - Method `index()` - List CV
  - Method `create()` - Form tambah
  - Method `store()` - Simpan CV
  - Method `show()` - Detail CV
  - Method `edit()` - Form edit
  - Method `update()` - Update CV
  - Method `destroy()` - Hapus CV
- **Route:** [routes/web.php](routes/web.php) - `Route::resource('/cv', CVController::class)`
- **Models:**
  - [app/Models/CV.php](app/Models/CV.php)
  - [app/Models/Pendidikan.php](app/Models/Pendidikan.php)
  - [app/Models/SkillCv.php](app/Models/SkillCv.php)
  - [app/Models/Pengalaman.php](app/Models/Pengalaman.php)
- **Views:**
  - `resources/views/indexCv.blade.php` - List CV
  - `resources/views/cv/tambahCv.blade.php` - Form tambah
  - `resources/views/cv/editCv.blade.php` - Form edit

#### Model Relationships
```php
// CV.php
public function pelamar() { return $this->belongsTo(Pelamar::class); }
public function pendidikans() { return $this->hasMany(Pendidikan::class); }
public function skills() { return $this->hasMany(SkillCv::class); }
public function pengalamans() { return $this->hasMany(Pengalaman::class); }

// Pelamar.php
public function cv() { return $this->hasMany(Cv::class); }
```

#### Validasi
- `umur`: required, integer
- `kontak`: required
- `title`: required
- `subtitle`: required
- `tentang_saya`: required
- `pendidikan`: required, array, min 1
- `skill`: array, max 3
- `pengalaman`: array, max 3

---

### 2.2 CRUD Lowongan (Job Posting) Perusahaan

#### Deskripsi Singkat
Fitur untuk perusahaan membuat, membaca, mengupdate, dan menghapus lowongan pekerjaan.

#### Alur Kerja - CREATE (Tambah Lowongan)
```
1. Perusahaan (yang sudah login) mengakses /lowongan/tambah
2. Mengisi form lowongan:
   - Kategori Pekerjaan: required
   - Posisi Pekerjaan: required
   - Jenis Pekerjaan: required
   - Gaji: required
   - Deskripsi Singkat: required
   - Deskripsi Pekerjaan: required
   - Syarat: required
   - Provinsi, Kota, Kecamatan, Alamat: required
   - Tanggal Mulai: required, format date
   - Tanggal Berakhir: required, harus >= tanggal mulai
   - Gambar: optional, image file
3. Submit form
4. Validasi server-side
5. Jika ada upload gambar:
   - Generate nama file (timestamp + extension)
   - Simpan ke folder 'public/lowongan'
6. Simpan data lowongan ke tabel `lowongans`
7. Redirect ke home dengan success message
```

#### Alur Kerja - READ (List & Detail)
```
LIST UNTUK PERUSAHAAN:
1. Perusahaan mengakses /home-perusahaan
2. Controller query lowongan milik perusahaan itu saja
3. Include count lamaran dengan status 'diproses'
4. Support search berdasarkan posisi atau kategori
5. Sort by created_at desc
6. Tampilkan list lowongan

DETAIL UNTUK PELAMAR:
1. Pelamar mengakses /lowongan/{id}
2. Load lowongan dengan relasi perusahaan
3. Tampilkan detail lengkap lowongan
4. Tampilkan tombol "Lamar Pekerjaan"

DETAIL UNTUK PERUSAHAAN:
1. Perusahaan mengakses /lowongan/detail/{id}
2. Load lowongan dengan relasi lamarans.pelamar
3. Tampilkan semua pelamar yang telah melamar
```

#### Alur Kerja - UPDATE (Edit Lowongan)
```
1. Perusahaan mengakses /lowongan/edit/{id}
2. Pre-populate form dengan data existing
3. Modifikasi data
4. Submit form ke /lowongan/update/{id}
5. Validasi sama seperti create
6. Jika ada gambar baru:
   - Hapus gambar lama
   - Simpan gambar baru
7. Update data di database
8. Redirect dengan success message
```

#### Alur Kerja - DELETE (Hapus Lowongan)
```
1. Perusahaan submit request delete ke /lowongan/delete/{id}
2. Cek lowongan exists
3. Jika ada file gambar → hapus dari storage
4. Hapus record dari tabel lowongans
5. Redirect dengan success message
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/LowonganController.php](app/Http/Controllers/LowonganController.php)
  - Method `index()` - List lowongan perusahaan
  - Method `create()` - Form tambah
  - Method `store()` - Simpan lowongan
  - Method `detail()` - Detail untuk pelamar
  - Method `showDetail()` - Detail untuk perusahaan
  - Method `edit()` - Form edit
  - Method `update()` - Update lowongan
  - Method `destroy()` - Hapus lowongan
  - Method `listPelamar()` - List lowongan untuk pelamar
- **Route:** [routes/web.php](routes/web.php)
  - `Route::prefix('lowongan')->group(...)`
- **Model:** [app/Models/Lowongan.php](app/Models/Lowongan.php)
- **Views:**
  - `resources/views/homePerusahaan.blade.php` - List lowongan
  - `resources/views/lowongan/tambahLowongan.blade.php` - Form tambah
  - `resources/views/lowongan/editLowongan.blade.php` - Form edit
  - `resources/views/lamar.blade.php` - Detail lowongan
  - `resources/views/perusahaan/detailLowongan.blade.php` - Detail untuk perusahaan

#### Validasi
- `kategori`: required
- `posisi`: required
- `jenis`: required
- `gaji`: required
- `deskripsi_singkat`: required
- `deskripsi`: required
- `syarat`: required
- `provinsi`: required
- `kota`: required
- `kecamatan`: required
- `alamat`: required
- `tanggal_mulai`: required, date
- `tanggal_akhir`: required, date, after_or_equal:tanggal_mulai
- `gambar`: nullable, image, mimes(jpg,jpeg,png), max 2048
- `pendidikan`: nullable, string
- `pengalaman`: nullable, string
- `keahlian_teknis`: nullable, string (text)

#### Field Lowongan Baru (Database Migration)
```
pendidikan: string - Syarat tingkat pendidikan (contoh: "S1", "SMK", dll)
pengalaman: string - Syarat pengalaman (contoh: "2 tahun", "Minimal 3 tahun", dll)
keahlian_teknis: text - Syarat keahlian teknis (contoh: "PHP, Laravel, MySQL", dll)
```

#### Model Update
```php
// Lowongan.php
protected $fillable = [
    // ... fields lama ...
    'pendidikan',
    'pengalaman',
    'keahlian_teknis',
];
```

---

### 2.3 CRUD Profile Pelamar

#### Deskripsi Singkat
Fitur untuk pelamar mengupdate profil dan pengaturan keamanan (password).

#### Alur Kerja - Update Profil
```
1. Pelamar mengakses /pelamar/setting
2. Form pre-populated dengan data pelamar saat ini
3. Update:
   - Nama Lengkap
   - Email
   - No Telepon
   - Foto Profil (optional)
   - Keahlian
4. Submit form ke /pelamar/setting/update
5. Validasi
6. Jika ada upload foto:
   - Simpan ke folder 'public/pelamar/profil'
7. Update record di tabel pelamars
8. Redirect dengan success message
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PelamarController.php](app/Http/Controllers/PelamarController.php)
  - Method `settings()` - Form pengaturan
  - Method `updateProfil()` - Update profil
  - Method `updatePassword()` - Update password
- **Route:** [routes/web.php](routes/web.php)
  - `Route::get('/pelamar/setting', ...)`
  - `Route::post('/pelamar/setting/update', ...)`

---

### 2.4 CRUD Profile Perusahaan

#### Deskripsi Singkat
Fitur untuk perusahaan mengupdate data perusahaan dan pengaturan akun.

#### Alur Kerja
```
1. Perusahaan mengakses /perusahaan/pengaturan
2. Form pre-populated dengan data perusahaan
3. Update:
   - Nama Perusahaan
   - Email
   - Telepon
   - Alamat
   - Foto Profil
4. Submit form
5. Validasi
6. Update di database
7. Redirect dengan success message
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PerusahaanController.php](app/Http/Controllers/PerusahaanController.php)
  - Method `showPengaturanAkun()` - Form pengaturan
  - Method `updatePengaturanAkun()` - Update pengaturan

---

## 3. FITUR PORTFOLIO

### 3.1 Portfolio Pelamar

#### Deskripsi Singkat
Fitur untuk pelamar membuat, membaca, dan menghapus portfolio/proyek yang pernah dikerjakan untuk menunjukkan karya kepada perusahaan.

#### Alur Kerja - CREATE (Tambah Portfolio)
```
1. Pelamar mengakses /portofolio/create
2. Mengisi form portfolio:
   - Judul: required, string, max 255
   - Kategori: nullable, string, max 100
   - Deskripsi: nullable, string
   - Teknologi: nullable, string, max 255 (contoh: "React, Node.js, MongoDB")
   - Link Demo: nullable, string (URL public project)
   - Link Repository: nullable, string (GitHub/GitLab link)
   - Tanggal Mulai: nullable, date
   - Tanggal Selesai: nullable, date (harus >= tanggal mulai)
3. Submit form
4. Validasi server-side
5. Simpan ke tabel `portofolios`
6. Redirect ke /portofolio dengan success message
```

#### Alur Kerja - READ (List Portfolio)
```
1. Pelamar mengakses /portofolio
2. Controller query portfolio milik pelamar
3. Sort by created_at desc (terbaru dulu)
4. Tampilkan list portfolio dengan detail:
   - Judul
   - Kategori
   - Teknologi
   - Link demo & repository
   - Tanggal proyek
```

#### Alur Kerja - DELETE (Hapus Portfolio)
```
1. Pelamar klik tombol delete di portfolio list
2. Submit request DELETE ke /portofolio/{id}
3. Server validasi ownership (hanya pelamar pemilik yang bisa hapus)
4. Hapus record dari tabel portofolios
5. Redirect dengan success message
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PortofolioController.php](app/Http/Controllers/PortofolioController.php)
  - Method `index()` - List portfolio
  - Method `create()` - Form tambah
  - Method `store()` - Simpan portfolio
  - Method `destroy()` - Hapus portfolio
- **Route:** [routes/web.php](routes/web.php) - `Route::resource('/portofolio', PortofolioController::class)->only([...])``
- **Model:** [app/Models/Portofolio.php](app/Models/Portofolio.php)
- **Views:**
  - `resources/views/indexPortofolio.blade.php` - List portfolio
  - `resources/views/portofolio/tambahPortofolio.blade.php` - Form tambah
- **Database:** `portofolios` table

#### Validasi
- `judul`: required, string, max 255
- `kategori`: nullable, string, max 100
- `deskripsi`: nullable, string
- `teknologi`: nullable, string, max 255
- `link_demo`: nullable, string, max 255
- `link_repo`: nullable, string, max 255
- `tanggal_mulai`: nullable, date
- `tanggal_selesai`: nullable, date, after_or_equal:tanggal_mulai

#### Model Relationships
```php
// Portofolio.php
public function pelamar() {
    return $this->belongsTo(Pelamar::class);
}

// Pelamar.php
public function portofolios() {
    return $this->hasMany(Portofolio::class);
}
```

#### Integrasi dengan Lowongan
Portfolio pelamar bisa dilihat:
- Perusahaan melihat saat review detail CV pelamar
- Ditampilkan di profil pelamar untuk showcase karya
- Membantu perusahaan membuat keputusan hire

---

## 4. PROSES BISNIS UTAMA

### 4.1 Proses Lamaran Pekerjaan (Job Application)

#### Deskripsi Singkat
Alur lengkap dari pelamar melamar ke lowongan, perusahaan menerima/menolak, jadwal wawancara, hingga status akhir (diterima/ditolak).

#### Status Lamaran
- **diproses**: Lamaran baru, sedang menunggu review
- **diterima**: Sudah diterima perusahaan (langsung jadi karyawan)
- **ditolak**: Ditolak oleh perusahaan
- **wawancara**: Dipanggil untuk wawancara

#### Alur Kerja Lengkap
```
TAHAP 1: PELAMAR MELAMAR
┌─────────────────────────────────┐
│ 1. Pelamar view detail lowongan  │
│    (/lowongan/{id})             │
├─────────────────────────────────┤
│ 2. Klik tombol "Lamar"          │
│    - Fetch CV pelamar (AJAX)    │
│    - Validasi: min ada 1 CV     │
├─────────────────────────────────┤
│ 3. Pilih CV untuk lamaran       │
├─────────────────────────────────┤
│ 4. POST /lamaran/insert         │
│    Data:                        │
│    - pelamar_id                 │
│    - lowongan_id                │
│    - cv_id                      │
├─────────────────────────────────┤
│ 5. Server validasi:             │
│    - IDs exist di database      │
│    - Check duplicate lamaran    │
│    - Jika sudah ada → error 409 │
├─────────────────────────────────┤
│ 6. Insert ke tabel lamarans     │
│    Status: 'diproses'           │
│    Timestamp: created_at        │
├─────────────────────────────────┤
│ 7. Response JSON sukses         │
│    - message                    │
│    - data lamaran yang dibuat   │
└─────────────────────────────────┘

TAHAP 2: PERUSAHAAN REVIEW LAMARAN
┌──────────────────────────────────┐
│ 1. Perusahaan ke /home-perusahaan│
│    List lowongan dengan count    │
│    lamaran status 'diproses'     │
├──────────────────────────────────┤
│ 2. Klik lowongan → detail        │
│    (/lowongan/detail/{id})       │
│    Tampilkan semua pelamar       │
├──────────────────────────────────┤
│ 3. Review CV & profil pelamar    │
│    - Bisa lihat detail CV        │
│    - Review keahlian, pengalaman │
│    - Review pendidikan           │
├──────────────────────────────────┤
│ 4. OPSI A: TERIMA               │
│    POST /lamaran/terima/{id}    │
│    - Update status → 'diterima' │
├──────────────────────────────────┤
│ 5. OPSI B: TOLAK                │
│    POST /lowongan/lamaran/{id}  │
│    /tolak                       │
│    - Update status → 'ditolak'  │
├──────────────────────────────────┤
│ 6. OPSI C: JADWAL WAWANCARA     │
│    POST /lowongan/lamaran/{id}  │
│    /jadwal-wawancara            │
│    Data:                        │
│    - tanggal: required, date    │
│    - jam_mulai: required        │
│    - jam_selesai: required      │
│    - link_meet: required, URL   │
│    (Zoom, Google Meet, dll)     │
└──────────────────────────────────┘

TAHAP 3: JADWAL WAWANCARA
┌──────────────────────────────────┐
│ 1. Perusahaan jadwal wawancara   │
│    POST /lowongan/lamaran/{id}   │
│    /jadwal-wawancara             │
│    Data:                         │
│    - tanggal: required, date     │
│    - jam_mulai: required         │
│    - jam_selesai: required       │
│    - link_meet: required, URL    │
├──────────────────────────────────┤
│ 2. Perusahaan/Admin accept       │
│    POST /perusahaan/wawancara/   │
│    {id}/terima                   │
│    (via WawancaraController)     │
│    - Update wawancara status     │
│      → 'selesai'                 │
│    - Update lamaran status       │
│      → 'diterima'                │
│    - CREATE Karyawan record      │
│      (pelamar jadi karyawan)     │
├──────────────────────────────────┤
│ 3. Atau perusahaan reject        │
│    POST /perusahaan/wawancara/   │
│    {id}/tolak                    │
│    - Update wawancara status     │
│      → 'selesai'                 │
│    - Update lamaran status       │
│      → 'ditolak'                 │
│    - DB transaction untuk        │
│      atomic update               │
├──────────────────────────────────┤
│ 4. KIRIM KE NODE.JS API          │
│    POST http://127.0.0.1:3001/   │
│    log-wawancara                 │
│    Data:                         │
│    - perusahaan: nama perusahaan │
│    - pelamar: nama pelamar       │
│    - room: link_meet             │
│    (untuk logging di Node.js)    │
├──────────────────────────────────┤
│ 5. Logging attempt:              │
│    - Timeout: 5 detik            │
│    - Try-catch untuk error       │
│    - Log response ke Laravel     │
├──────────────────────────────────┤
│ 6. Update lamaran status:        │
│    'wawancara'                   │
│    - Update database lamaran     │
│    - Redirect dengan success msg │
└──────────────────────────────────┘

TAHAP 4: PELAMAR LIHAT STATUS LAMARAN & WAWANCARA
┌──────────────────────────────────┐
│ 1. Pelamar akses /lamaran-anda   │
│    GET /lamaran-anda             │
├──────────────────────────────────┤
│ 2. Load lamarans dengan relasi:  │
│    - lowongan                    │
│    - perusahaan (via lowongan)   │
│    Filter: pelamar_id = session  │
│    Sort: latest                  │
├──────────────────────────────────┤
│ 3. Tampilkan status lamaran:     │
│    - 'diproses'                 │
│    - 'diterima'                 │
│    - 'ditolak'                  │
│    - 'wawancara'                │
│                                  │
│ 4. Jika status 'wawancara':      │
│    - Klik tombol "Lihat Detail"  │
│    - Redirect ke /wawancara      │
├──────────────────────────────────┤
│ 5. Pelamar akses /wawancara      │
│    GET /wawancara                │
│    (WawancaraController::index)  │
├──────────────────────────────────┤
│ 6. Load wawancara pelamar:       │
│    - Status: 'proses' atau       │
│      'selesai'                   │
│    - Order by tanggal (ascending)│
│    - Include lowongan & perusahaan
│    - Include lamaran status     │
├──────────────────────────────────┤
│ 7. Tampilkan jadwal wawancara:   │
│    - Perusahaan                  │
│    - Posisi lowongan             │
│    - Tanggal & jam wawancara     │
│    - Link meeting (Zoom/GoogleMee)
│    - Pesan dari perusahaan       │
│    - Status (proses/selesai)     │
└──────────────────────────────────┘

TAHAP 5: PERUSAHAAN LIHAT JADWAL WAWANCARA
┌──────────────────────────────────┐
│ 1. Perusahaan akses /perusahaan/ │
│    wawancara                     │
│    (WawancaraController::        │
│    indexPerusahaan)              │
├──────────────────────────────────┤
│ 2. Load wawancara perusahaan:    │
│    Filter: perusahaan_id = sess. │
│    Status: 'proses' atau 'selesai│
│    Order by tanggal              │
├──────────────────────────────────┤
│ 3. Tampilkan list wawancara:     │
│    - Nama pelamar                │
│    - Posisi lowongan             │
│    - Tanggal & jam               │
│    - Status                      │
│    - Tombol Terima/Tolak Pelamar │
├──────────────────────────────────┤
│ 4. Jika Terima Pelamar:          │
│    POST /perusahaan/wawancara/   │
│    {id}/terima                   │
│    - WawancaraController::terima()
│    - Update wawancara → 'selesai'│
│    - Update lamaran → 'diterima' │
│    - CREATE Karyawan:            │
│      * id_pelamar                │
│      * id_lowongan               │
│      * id_perusahaan             │
│      * kategori_pekerjaan        │
│      * posisi                    │
│      * tanggal_mulai = now()     │
│      * status_karyawan = 'aktif' │
│    - Response JSON: success      │
├──────────────────────────────────┤
│ 5. Atau Tolak Pelamar:           │
│    POST /perusahaan/wawancara/   │
│    {id}/tolak                    │
│    - WawancaraController::tolak()│
│    - DB Transaction untuk atomic │
│    - Update wawancara → 'selesai'│
│    - Update lamaran → 'ditolak'  │
│    - Response JSON: success      │
└──────────────────────────────────┘

TAHAP 6: PERUSAHAAN LIHAT HISTORY LAMARAN
┌──────────────────────────────────┐
│ 1. Perusahaan akses /perusahaan/ │
│    history                       │
│    (LamaranController::           │
│    historyPerusahaan)            │
├──────────────────────────────────┤
│ 2. Load semua lamaran perusahaan:│
│    Include:                      │
│    - pelamar data                │
│    - lowongan info               │
│    - semua status lamaran        │
│    - timestamp                   │
├──────────────────────────────────┤
│ 3. Tampilkan history lengkap:    │
│    - Nama pelamar & CV           │
│    - Posisi yang dilamar         │
│    - Status lamaran sekarang     │
│    - Tanggal lamaran             │
│    - Total lamaran yang diterima │
│      (menjadi karyawan)          │
│    - Total lamaran yang ditolak  │
└──────────────────────────────────┘
```

#### File/Kode Terkait
- **Controllers:**
  - [app/Http/Controllers/LamaranController.php](app/Http/Controllers/LamaranController.php)
    - Method `insertLamaran()` - Submit lamaran (AJAX)
    - Method `tolak()` - Tolak lamaran (dari detail lowongan perusahaan)
    - Method `index()` - List lamaran pelamar
    - Method `getCvPelamar()` - Get CV pelamar (AJAX)
    - Method `historyPerusahaan()` - History lamaran perusahaan
  - [app/Http/Controllers/WawancaraController.php](app/Http/Controllers/WawancaraController.php)
    - Method `index()` - List wawancara pelamar
    - Method `indexPerusahaan()` - List wawancara perusahaan
    - Method `wawancara()` - Jadwal wawancara (dari LamaranController)
    - Method `terima()` - Terima pelamar (buat Karyawan record)
    - Method `tolak()` - Tolak pelamar (transaction)
  - [app/Http/Controllers/PerusahaanController.php](app/Http/Controllers/PerusahaanController.php)
    - Method `terimaPelamar()` - (deprecated, gunakan WawancaraController::terima)
  - [app/Http/Controllers/KaryawanController.php](app/Http/Controllers/KaryawanController.php)
    - Method `storeFromWawancara()` - Create Karyawan dari wawancara
    - Method `ajaxByKategori()` - Get karyawan by kategori (AJAX)
- **Routes:** [routes/web.php](routes/web.php)
  - `Route::post('/lamaran/insert', LamaranController::insertLamaran)`
  - `Route::get('/pelamar/cv', LamaranController::getCvPelamar)`
  - `Route::get('/lamaran-anda', LamaranController::index)`
  - `Route::get('/wawancara', WawancaraController::index)` - NEW
  - `Route::get('/perusahaan/wawancara', WawancaraController::indexPerusahaan)` - NEW
  - `Route::get('/perusahaan/history', LamaranController::historyPerusahaan)` - NEW
  - `Route::post('/perusahaan/wawancara/{id}/terima', KaryawanController::storeFromWawancara)` - NEW
  - `Route::post('/perusahaan/wawancara/{id}/tolak', WawancaraController::tolak)` - NEW
  - `Route::post('/lowongan/lamaran/{id}/tolak', LamaranController::tolak)`
  - `Route::post('/lowongan/lamaran/{id}/jadwal-wawancara', WawancaraController::wawancara)` - CHANGED
- **Models:**
  - [app/Models/Lamaran.php](app/Models/Lamaran.php)
  - [app/Models/Wawancara.php](app/Models/Wawancara.php)
  - [app/Models/Karyawan.php](app/Models/Karyawan.php)
- **Views:**
  - `resources/views/lamar.blade.php` - Detail lowongan (form lamaran)
  - `resources/views/Lamaran.blade.php` - List lamaran pelamar
  - `resources/views/perusahaan/detailLowongan.blade.php` - Detail lowongan (perusahaan)
  - `resources/views/wawancaraPelamar/wawancara.blade.php` - Jadwal wawancara pelamar - NEW
  - `resources/views/perusahaan/wawancara.blade.php` - Jadwal wawancara perusahaan - NEW
  - `resources/views/perusahaan/historyLamaran.blade.php` - History lamaran perusahaan - NEW

#### Database Schema - Lamaran
```
lamarans table:
- id
- pelamar_id (FK → pelamars)
- lowongan_id (FK → lowongans)
- cv_id (FK → cvs)
- status: enum('diproses', 'diterima', 'ditolak', 'wawancara')
- created_at, updated_at
```

#### Database Schema - Wawancara
```
wawancaras table:
- id
- pelamar_id (FK → pelamars)
- perusahaan_id (FK → perusahaans)
- lowongan_id (FK → lowongans)
- status: string
- tanggal: date
- jam_mulai: time
- jam_selesai: time
- link_meet: string (URL)
- pesan: text
- created_at, updated_at
```

---

### 4.2 Verifikasi Perusahaan oleh Admin

#### Deskripsi Singkat
Proses admin memverifikasi dokumen perusahaan (NPWP dan Sertifikat) sebelum perusahaan bisa login.

#### Alur Kerja
```
TAHAP 1: PERUSAHAAN DAFTAR
1. Perusahaan register dengan upload sertifikat
2. Status otomatis: 'pending'
3. Tidak bisa login sampai status 'verified'

TAHAP 2: ADMIN LOGIN & LIHAT DASHBOARD
┌─────────────────────────────────────┐
│ 1. Admin akses /admin/login          │
│    - Email & password dari config    │
├─────────────────────────────────────┤
│ 2. POST /admin/login                 │
│    - Validasi credentials            │
│    - Bandingkan dengan config        │
├─────────────────────────────────────┤
│ 3. Redirect ke /admin/dashboard      │
│    - List perusahaan dengan status   │
│      'pending' (newest first)        │
│    - Pagination: 10 per page         │
│    - Count perusahaan per status     │
│      (verified, rejected, total)     │
└─────────────────────────────────────┘

TAHAP 3: ADMIN FILTER & SEARCH PERUSAHAAN
┌─────────────────────────────────────┐
│ 1. Admin akses /admin/daftar-perusa.│
│    (AdminController::daftarPerusahaan)
├─────────────────────────────────────┤
│ 2. Support filter & search:         │
│    - Filter by status: pending,     │
│      verified, rejected             │
│    - Search by nama atau email      │
│    - Query builder dengan           │
│      $request->filled() check        │
├─────────────────────────────────────┤
│ 3. Pagination: 15 per page          │
│    - Sort: latest first             │
└─────────────────────────────────────┘

TAHAP 4: ADMIN REVIEW PERUSAHAAN
┌─────────────────────────────────────┐
│ 1. Admin klik perusahaan dari list   │
│    GET /admin/perusahaan/{id}        │
│    (AdminController::detailPerusahaan)
├─────────────────────────────────────┤
│ 2. Server tampilkan:                │
│    - Data perusahaan lengkap        │
│    - File sertifikat (link download)│
│    - Foto profil                    │
│    - NPWP & nomor identitas lain    │
├─────────────────────────────────────┤
│ 3. Admin review dokumen             │
│    - Cek sertifikat asli/valid      │
│    - Cek NPWP terdaftar             │
│    - Cek foto profil legitimate     │
└─────────────────────────────────────┘

TAHAP 5: ADMIN AMBIL KEPUTUSAN
┌─────────────────────────────────────┐
│ OPSI A: TERIMA (VERIFIED)           │
│ 1. Click tombol "Terima"            │
│ 2. POST /admin/verifikasi/{id}      │
│    (AdminController::               │
│    verifikasiPerusahaan)            │
│    - status_verifikasi = 'verified' │
│    - verified_by = admin id         │
│    - verified_at = sekarang         │
│    - alasan_penolakan = null        │
│ 3. Database update                  │
│ 4. Perusahaan bisa login sekarang   │
│                                     │
│ OPSI B: TOLAK (REJECTED)            │
│ 1. Input alasan penolakan           │
│ 2. Click tombol "Tolak"             │
│ 3. POST /admin/verifikasi/{id}      │
│    - status_verifikasi = 'rejected' │
│    - alasan_penolakan = teks        │
│    - verified_at = null             │
│ 4. Database update                  │
│ 5. Perusahaan lihat pesan penolakan │
│    saat mencoba login               │
└─────────────────────────────────────┘

TAHAP 6: PERUSAHAAN LOGIN SETELAH VERIFIKASI
1. Perusahaan akses /login/perusahaan
2. Input email & password
3. Server cek status_verifikasi
   - Jika 'verified' → lanjut login
   - Jika 'pending' → error: "Tunggu verifikasi"
   - Jika 'rejected' → error: "Ditolak. Alasan: ..."
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/AdminController.php](app/Http/Controllers/AdminController.php)
  - Method `showLoginForm()` - Form login admin
  - Method `login()` - Login admin
  - Method `dashboard()` - Dashboard admin
  - Method `daftarPerusahaan()` - List semua perusahaan dengan filter & search
  - Method `detailPerusahaan()` - Detail perusahaan untuk verifikasi
  - Method `verifikasiPerusahaan()` - Proses verifikasi
- **Routes:** Managed in web.php with admin prefix
- **Config:** [config/admin.php](config/admin.php) - Admin credentials
- **Model:** [app/Models/Perusahaan.php](app/Models/Perusahaan.php)
- **Views:**
  - `resources/views/admin/loginAdmin.blade.php`
  - `resources/views/admin/dashboard.blade.php`
  - `resources/views/admin/daftarPerusahaan.blade.php`
  - `resources/views/admin/detailPerusahaan.blade.php`

#### Session Admin
```php
session(['admin_id' => 'admin', 'admin_email' => $adminEmail]);
```

#### Filter & Search Implementation
```php
// Di AdminController::daftarPerusahaan()
if ($request->filled('status')) {
    $query->where('status_verifikasi', $request->status);
}

if ($request->filled('search')) {
    $search = $request->search;
    $query->where(function ($q) use ($search) {
        $q->where('nama_perusahaan', 'like', "%$search%")
          ->orWhere('email', 'like', "%$search%");
    });
}
```

---

### 4.3 Sistem Karyawan (Employee Management)

#### Deskripsi Singkat
Sistem untuk tracking pelamar yang diterima menjadi karyawan di perusahaan.

#### Alur Pembuatan Karyawan
```
1. Saat wawancara DITERIMA:
   POST /perusahaan/wawancara/{id}/terima
   
2. WawancaraController::terima() atau
   KaryawanController::storeFromWawancara()
   
3. Create Karyawan record:
   - id_pelamar (FK)
   - id_lowongan (FK)
   - id_perusahaan (FK)
   - kategori_pekerjaan (dari lowongan)
   - posisi (dari lowongan)
   - tanggal_mulai = now()
   - status_karyawan = 'aktif'
   
4. Update status lamaran → 'diterima'
5. Update status wawancara → 'selesai'
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/KaryawanController.php](app/Http/Controllers/KaryawanController.php)
  - Method `storeFromWawancara()` - Create karyawan dari wawancara
  - Method `ajaxByKategori()` - Get karyawan by kategori (AJAX)
- **Model:** [app/Models/Karyawan.php](app/Models/Karyawan.php)
- **Routes:**
  - `Route::post('/perusahaan/wawancara/{id}/terima', KaryawanController::storeFromWawancara)`
  - `Route::get('/perusahaan/karyawan/by-kategori/{kategori}', KaryawanController::ajaxByKategori)`
- **Database:** `karyawans` table

---

## 5. VALIDASI

### 4.1 Server-Side Validation (Laravel)

Semua form input divalidasi di server menggunakan Laravel Validation:

#### Authentication Validation
```php
// Register Pelamar
'nama_lengkap' => 'required',
'username'     => 'required|unique:pelamars',
'email'        => 'required|email|unique:pelamars',
'password'     => 'required|min:3',
'conf'         => 'required|same:password',

// Login Pelamar
'username' => 'required',
'password' => 'required',

// Register Perusahaan
'nama_perusahaan' => 'required',
'email'           => 'required|email|unique:perusahaans',
'password'        => 'required|min:6',
'telepon'        => 'required|string|max:15',
'npwp'            => 'required|string|max:20|unique:perusahaans',
'sertifikat'      => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
'foto_profil'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

// Login Perusahaan
'email'    => 'required|email',
'password' => 'required',
```

#### CV Validation
```php
'umur'         => 'required|integer',
'kontak'       => 'required',
'title'        => 'required',
'subtitle'     => 'required',
'tentang_saya' => 'required',
'pendidikan'   => 'required|array|min:1',
'pendidikan.*.universitas' => 'nullable',
'pendidikan.*.jurusan'     => 'nullable',
'skill'        => 'array|max:3',
'pengalaman'   => 'array|max:3',
```

#### Lowongan Validation
```php
'kategori'          => 'required',
'posisi'            => 'required',
'jenis'             => 'required',
'gaji'              => 'required',
'deskripsi_singkat' => 'required',
'deskripsi'         => 'required',
'syarat'            => 'required',
'provinsi'          => 'required',
'kota'              => 'required',
'kecamatan'         => 'required',
'alamat'            => 'required',
'tanggal_mulai'     => 'required|date',
'tanggal_akhir'     => 'required|date|after_or_equal:tanggal_mulai',
'gambar'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
```

#### Lamaran Validation
```php
'pelamar_id'  => 'required|integer|exists:pelamars,id',
'lowongan_id' => 'required|integer|exists:lowongans,id',
'cv_id'       => 'required|integer|exists:cvs,id',
```

#### Wawancara Validation
```php
'tanggal'      => 'required|date',
'jam_mulai'    => 'required',
'jam_selesai'  => 'required',
'link_meet'    => 'required|url',
```

### 4.2 Business Logic Validation

Selain input validation, ada validasi business logic:

```php
// 1. Duplicate Lamaran Check
$cek = Lamaran::where('pelamar_id', $request->pelamar_id)
              ->where('lowongan_id', $request->lowongan_id)
              ->first();
if ($cek) {
    return response()->json(['message' => 'Sudah melamar'], 409);
}

// 2. Password Match Check
if (!Hash::check($request->password_lama, $pelamar->password)) {
    return back()->withErrors(['password_lama' => 'Password salah']);
}

// 3. Perusahaan Verification Status Check
if ($perusahaan->status_verifikasi !== 'verified') {
    if ($perusahaan->status_verifikasi === 'pending') {
        return back()->withErrors(['Menunggu verifikasi']);
    } else if ($perusahaan->status_verifikasi === 'rejected') {
        return back()->withErrors(['Ditolak: ' . $perusahaan->alasan_penolakan]);
    }
}

// 4. Authentication Check (Session)
if (!session('pelamar_id')) {
    return redirect('/login/pelamar');
}

if (!session('perusahaan_id')) {
    return redirect('/login/perusahaan');
}
```

### 4.3 File Upload Validation
- **Sertifikat:** PDF, JPG, PNG, max 2MB
- **Foto Profil:** JPG, PNG, max 2MB
- **Gambar Lowongan:** JPG, PNG, max 2MB
- **Konten:** Disimpan di folder publik dengan path terstruktur

---

## 6. INTERAKSI API

### 5.1 Node.js API - Log Wawancara

#### Deskripsi Singkat
Ketika perusahaan membuat jadwal wawancara, Laravel mengirim request ke API Node.js untuk logging event dan room creation.

#### Endpoint
```
POST http://127.0.0.1:3001/log-wawancara
```

#### Request Format
```json
{
    "perusahaan": "Nama Perusahaan",
    "pelamar": "Nama Pelamar",
    "room": "https://zoom.us/j/12345678"
}
```

#### Implementation di Laravel
```php
// Di WawancaraController::wawancara()
try {
    $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
        ->timeout(5)
        ->post('http://127.0.0.1:3001/log-wawancara', [
            'perusahaan' => $lamaran->lowongan->perusahaan->nama_perusahaan,
            'pelamar'    => $lamaran->pelamar->nama_lengkap ?? $lamaran->pelamar->name,
            'room'       => $request->link_meet,
        ]);

} catch (\Throwable $e) {
    Log::error('GAGAL KIRIM KE NODE', [
        'message' => $e->getMessage(),
        'trace'   => $e->getTraceAsString(),
    ]);
}
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/WawancaraController.php](app/Http/Controllers/WawancaraController.php) - method `wawancara()`
- **External Service:** [node-auth/index.js](node-auth/index.js) - Node.js server
- **Facades:** Illuminate\Support\Facades\Http, Log

#### Error Handling
- Timeout: 5 detik
- Try-catch untuk network errors dan throwable
- Logging untuk debugging dengan message + trace
- Tetap melanjutkan proses walau API gagal (graceful degradation)
- Fallback untuk nama pelamar: `$pelamar->nama_lengkap ?? $pelamar->name`

#### Logging
Semua komunikasi dengan Node.js di-log ke `storage/logs/laravel.log`:
```
[2025-xx-xx xx:xx:xx] local.ERROR: GAGAL KIRIM KE NODE {
    "message": "...",
    "trace": "..."
}
```

---

### 6.2 AJAX API - Get CV Pelamar

#### Deskripsi Singkat
Frontend (JavaScript) melakukan AJAX request ke Laravel untuk fetch daftar CV pelamar ketika form lamaran ditampilkan.

#### Endpoint
```
GET /pelamar/cv
```

#### Response Format
```json
[
    {
        "id": 1,
        "pelamar_id": 5,
        "umur": 25,
        "title": "Software Engineer",
        "subtitle": "Full Stack Developer",
        "created_at": "2025-xx-xx xx:xx:xx",
        "updated_at": "2025-xx-xx xx:xx:xx"
    },
    ...
]
```

#### Implementation
```php
// LamaranController::getCvPelamar()
public function getCvPelamar()
{
    $pelamarId = session('pelamar_id');
    
    if (!$pelamarId) {
        return response()->json([], 401);
    }
    
    return Cv::where('pelamar_id', $pelamarId)->get();
}
```

#### Usage di Frontend
```javascript
// Fetch CV saat form ditampilkan
fetch('/pelamar/cv')
    .then(response => response.json())
    .then(data => {
        // Populate dropdown dengan CV options
        // Validasi: minimal 1 CV ada
    });
```

#### Error Response
- 401 Unauthorized: Pelamar tidak login
- 200 OK: List CV (bisa kosong jika belum ada CV)

---

### 6.3 AJAX API - Insert Lamaran
Frontend submit form lamaran via AJAX ke Laravel dengan JSON payload.

#### Endpoint
```
POST /lamaran/insert
Content-Type: application/json
```

#### Request Payload
```json
{
    "pelamar_id": 5,
    "lowongan_id": 12,
    "cv_id": 3
}
```

#### Success Response (201 Created)
```json
{
    "message": "Lamaran berhasil dikirim",
    "data": {
        "id": 45,
        "pelamar_id": 5,
        "lowongan_id": 12,
        "cv_id": 3,
        "status": "diproses",
        "created_at": "2025-xx-xx xx:xx:xx",
        "updated_at": "2025-xx-xx xx:xx:xx"
    }
}
```

#### Error Responses
```json
// 409 Conflict - Duplicate
{
    "message": "Anda sudah melamar lowongan ini"
}

// 422 Unprocessable Entity - Validation Error
{
    "message": "The pelamar_id field is required",
    "errors": {...}
}
```

#### Implementation
```php
// LamaranController::insertLamaran()
public function insertLamaran(Request $request)
{
    $request->validate([
        'pelamar_id'  => 'required|integer|exists:pelamars,id',
        'lowongan_id' => 'required|integer|exists:lowongans,id',
        'cv_id'       => 'required|integer|exists:cvs,id',
    ]);

    $cek = Lamaran::where('pelamar_id', $request->pelamar_id)
                  ->where('lowongan_id', $request->lowongan_id)
                  ->first();

    if ($cek) {
        return response()->json([
            'message' => 'Anda sudah melamar lowongan ini'
        ], 409);
    }

    $lamaran = Lamaran::create([
        'pelamar_id'  => $request->pelamar_id,
        'lowongan_id' => $request->lowongan_id,
        'cv_id'       => $request->cv_id,
        'status'      => 'diproses',
    ]);

    return response()->json([
        'message' => 'Lamaran berhasil dikirim',
        'data' => $lamaran
    ], 201);
}
```

---

### 6.4 Node.js API - Login Pelamar

#### Deskripsi Singkat
Fitur login pelamar sekarang menggunakan Node.js API untuk validasi credentials. Laravel mengirim username & password, Node.js memvalidasi dan return user data.

#### Endpoint
```
POST http://localhost:3001/login-pelamar
```

#### Request Format
```json
{
    "username": "john_doe",
    "password": "password123"
}
```

#### Success Response (200)
```json
{
    "id": 5,
    "username": "john_doe",
    "nama": "John Doe"
}
```

#### Error Response
```json
{
    "message": "Username atau password salah"
}
```

#### Implementation di Laravel
```php
// Di PelamarController::login()
try {
    $response = Http::post('http://localhost:3001/login-pelamar', [
        'username' => $request->username,
        'password' => $request->password,
    ]);
} catch (\Exception $e) {
    return back()->withErrors([
        'login' => 'Server login sedang tidak tersedia'
    ]);
}

if ($response->failed()) {
    return back()->withErrors([
        'login' => $response->json()['message'] ?? 'Login gagal'
    ]);
}

$data = $response->json();
session([
    'pelamar_id'       => $data['id'],
    'pelamar_username' => $data['username'],
    'pelamar_nama'     => $data['nama'],
]);
return redirect('/home-pelamar');
```

#### File/Kode Terkait
- **Controller:** [app/Http/Controllers/PelamarController.php](app/Http/Controllers/PelamarController.php) - method `login()`
- **External Service:** Node.js - `POST /login-pelamar`
- **Route:** [routes/web.php](routes/web.php) - `Route::post('/login/pelamar', ...)`

#### Error Handling
- Try-catch untuk network errors
- Check response->failed() untuk API errors
- Display pesan error dari Node.js response atau generic message
- Fallback message: "Server login sedang tidak tersedia"

#### Keuntungan Integrasi Node.js
- Centralized authentication (bisa digunakan oleh multiple service)
- Validasi username/password di satu tempat
- Data user terpusat di Node.js

---

## RINGKASAN TEKNOLOGI & TOOLS

| Komponen | Teknologi |
|----------|-----------|
| Backend | Laravel 11 |
| Database | MySQL |
| Authentication | Laravel Session, Hash (bcrypt), Node.js API |
| File Storage | Laravel Storage (public disk) |
| HTTP Client | Guzzle HTTP (Laravel Http Facade) |
| Frontend AJAX | JavaScript (fetch API) |
| External APIs | Node.js REST API (login-pelamar, log-wawancara) |
| ORM | Eloquent |
| Validation | Laravel Validation |
| Logging | Laravel Log |
| Transactions | Laravel DB Transactions |

#### Node.js API Integration
- **Login Pelamar:** `POST /login-pelamar` - Validasi credentials pelamar
- **Log Wawancara:** `POST /log-wawancara` - Logging event wawancara

---

## SECURITY NOTES

1. **Password Hashing:** Semua password di-hash dengan bcrypt sebelum disimpan
2. **Session-based Authentication:** Menggunakan Laravel session untuk mempertahankan login state
3. **Validation:** Input validation di setiap endpoint
4. **File Upload:** Validasi tipe file dan ukuran sebelum disimpan
5. **CSRF Protection:** Direkomendasikan gunakan CSRF middleware di production
6. **Status Verification:** Perusahaan tidak bisa login sampai diverifikasi admin
7. **Database Integrity:** Foreign keys dan relationships menjaga integritas data
8. **Transactions:** Penggunaan DB transactions untuk operasi multi-table

---

## Diagram Alur Sistem

### Alur Autentifikasi
```
┌─────────────────┐
│   PELAMAR       │
└────────┬────────┘
         │
    ┌────▼─────────────┐
    │ Register/Login   │
    │ (dengan email)   │
    └────┬─────────────┘
         │
         ▼
    ┌─────────────────┐
    │ Home Pelamar    │
    │ (list lowongan) │
    └─────────────────┘

┌──────────────────┐
│   PERUSAHAAN     │
└────────┬─────────┘
         │
    ┌────▼──────────────────────┐
    │ Register + Upload Sertif  │
    │ (status: pending)         │
    └────┬──────────────────────┘
         │
    ┌────▼──────────────────────┐
    │ Tunggu Verifikasi Admin   │
    └────┬──────────────────────┘
         │
    ┌────▼──────────────────────┐
    │ Login (status: verified)  │
    │ Home Perusahaan           │
    │ (list lowongan milik)     │
    └──────────────────────────┘

┌──────────────────┐
│     ADMIN        │
└────────┬─────────┘
         │
    ┌────▼──────────────────┐
    │ Login Admin           │
    │ (dari config)         │
    └────┬──────────────────┘
         │
    ┌────▼──────────────────────────┐
    │ Dashboard                     │
    │ (list perusahaan pending)     │
    │ - Review dokumen              │
    │ - Terima / Tolak              │
    └──────────────────────────────┘
```

### Alur Lamaran Pekerjaan
```
┌────────────────────┐
│ Pelamar lihat      │
│ lowongan detail    │
└────────┬───────────┘
         │
    ┌────▼────────────────┐
    │ Klik "Lamar"        │
    │ Fetch CV pelamar    │
    │ (AJAX)              │
    └────┬────────────────┘
         │
    ┌────▼────────────────┐
    │ Pilih CV            │
    │ Submit lamaran      │
    │ (AJAX POST)         │
    └────┬────────────────┘
         │
    ┌────▼────────────────┐
    │ Server:             │
    │ Validasi            │
    │ Create Lamaran      │
    │ status: 'diproses'  │
    └────┬────────────────┘
         │
    ┌────▼──────────────────────┐
    │ Perusahaan lihat lowongan  │
    │ (list pelamar yang melamar)│
    └────┬──────────────────────┘
         │
    ┌────▼──────────────────────┐
    │ OPSI:                      │
    │ 1. Terima (diterima)       │
    │ 2. Tolak (ditolak)         │
    │ 3. Jadwal Wawancara        │
    └────┬──────────────────────┘
         │
    ┌────▼──────────────────────────┐
    │ Jadwal Wawancara:              │
    │ - Create Wawancara record      │
    │ - Update Lamaran status        │
    │ - Kirim ke Node.js (logging)   │
    └────┬──────────────────────────┘
         │
    ┌────▼──────────────────────┐
    │ Pelamar lihat /lamaran-anda│
    │ - Status lamaran          │
    │ - Detail wawancara        │
    │   (jika ada)              │
    └──────────────────────────┘
```

---

## CHANGELOG - Update Terbaru (Git Pull 2025-06-08)

### Perubahan Fitur

#### 1. **Fitur Portfolio Pelamar** ✅ NEW
- `PortofolioController` baru dengan CRUD lengkap
- Pelamar bisa membuat portfolio/proyek showcase
- Fields: judul, kategori, deskripsi, teknologi, link_demo, link_repo, tanggal
- Routes: `/portofolio` (resource routes)
- Database migration untuk tabel `portofolios`

#### 2. **WawancaraController - Refactoring** ✅ UPDATED
- Dipindahkan dari LamaranController menjadi controller terpisah
- Method baru: `index()` (list wawancara pelamar), `indexPerusahaan()` (list wawancara perusahaan)
- Method `wawancara()` sekarang handle jadwal wawancara
- Method `terima()` & `tolak()` dengan DB transaction
- Routes baru:
  - `GET /wawancara` - Wawancara pelamar
  - `GET /perusahaan/wawancara` - Wawancara perusahaan
  - `POST /perusahaan/wawancara/{id}/terima` - Terima pelamar
  - `POST /perusahaan/wawancara/{id}/tolak` - Tolak pelamar

#### 3. **Sistem Karyawan (Employees)** ✅ UPDATED
- KaryawanController ditambah method `storeFromWawancara()`
- Otomatis create Karyawan record saat wawancara diterima
- Fields: id_pelamar, id_lowongan, id_perusahaan, kategori_pekerjaan, posisi, tanggal_mulai, status_karyawan
- Route: `POST /perusahaan/wawancara/{id}/terima` (via KaryawanController)

#### 4. **Lowongan - Fields Baru** ✅ UPDATED
- Migration: `add_qualifications_to_lowongans_table`
- Fields baru:
  - `pendidikan` (string): Syarat pendidikan
  - `pengalaman` (string): Syarat pengalaman
  - `keahlian_teknis` (text): Syarat keahlian teknis

#### 5. **Login Pelamar - Integrasi Node.js** ✅ UPDATED
- Sekarang menggunakan Node.js API: `POST /login-pelamar`
- Credential validation dilakukan di Node.js
- Response dari Node.js: `{ id, username, nama }`
- Try-catch untuk error handling
- Fallback message untuk server unavailable

#### 6. **History Lamaran Perusahaan** ✅ NEW
- Route: `GET /perusahaan/history`
- LamaranController::historyPerusahaan()
- Tampilkan semua lamaran (semua status) milik perusahaan
- Include pelamar, lowongan, dan metadata

#### 7. **PelamarController - Method Baru** ✅ UPDATED
- Method `logout()` - Flush session
- Method `destroy()` - Delete akun pelamar
- Perubahan di `login()` - Integrasi Node.js

#### 8. **AdminController - Filter & Search** ✅ UPDATED
- Method `daftarPerusahaan()` ditingkatkan
- Support filter by status_verifikasi
- Support search by nama_perusahaan atau email
- Menggunakan `$request->filled()` untuk checking

#### 9. **Views Baru** ✅ NEW
- `resources/views/indexPortofolio.blade.php` - List portfolio
- `resources/views/portofolio/tambahPortofolio.blade.php` - Form tambah portfolio
- `resources/views/wawancaraPelamar/wawancara.blade.php` - Jadwal wawancara pelamar
- `resources/views/perusahaan/wawancara.blade.php` - Jadwal wawancara perusahaan
- `resources/views/perusahaan/historyLamaran.blade.php` - History lamaran perusahaan

#### 10. **Database Migrations** ✅ NEW
- `2026_06_06_093236_add_qualifications_to_lowongans_table.php`
- Added: `pendidikan`, `pengalaman`, `keahlian_teknis`

#### 11. **API HTTP Headers** ✅ UPDATED
- WawancaraController::wawancara() menambahkan Content-Type header
- Fallback untuk field nama pelamar: `nama_lengkap ?? name`

### Breaking Changes
- Login Pelamar sekarang WAJIB menggunakan Node.js API
- LamaranController::jadwalWawancara() dipindahkan ke WawancaraController::wawancara()

### Migration Steps (jika upgrade)
1. Run migration: `php artisan migrate` (untuk fields lowongan baru)
2. Setup Node.js API endpoint: `http://localhost:3001/login-pelamar`
3. Update .env jika ada konfigurasi Node.js API URL yang berbeda

---

**Dokumen ini dibuat pada:** 2025-06-08  
**Versi:** 2.0 (Updated with latest features)
