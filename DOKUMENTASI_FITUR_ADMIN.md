# 📋 Dokumentasi Fitur Admin Verifikasi Perusahaan

## Ringkasan Fitur
Fitur ini memungkinkan admin untuk memverifikasi perusahaan yang baru mendaftar sebelum mereka dapat menggunakan aplikasi.

## Alur Kerja

### 1. Pendaftaran Perusahaan
- Perusahaan melakukan registrasi melalui `/register/perusahaan`
- Status perusahaan otomatis diset ke **"pending"** (menunggu verifikasi)
- Perusahaan **tidak dapat login** sampai diverifikasi oleh admin
- Pesan feedback diberikan: "Tunggu verifikasi dari admin sebelum login"

### 2. Login Admin
- URL: `http://localhost:8000/admin/login`
- **Email**: admin@kerjakuy.com
- **Password**: admin123
- Credentials dapat diubah di file `.env` atau di `config/services.php`

### 3. Dashboard Admin
- URL: `http://localhost:8000/admin/dashboard`
- Menampilkan statistik:
  - Total Perusahaan
  - Perusahaan Menunggu Verifikasi (jumlah)
  - Perusahaan Terverifikasi (jumlah)
  - Perusahaan Ditolak (jumlah)
- List perusahaan yang menunggu verifikasi dengan pagination

### 4. Fitur Daftar Perusahaan
- URL: `http://localhost:8000/admin/daftar-perusahaan`
- Menampilkan semua perusahaan dengan filter:
  - **Pencarian**: Berdasarkan nama perusahaan atau email
  - **Filter Status**: Semua Status / Menunggu / Terverifikasi / Ditolak
- Pagination untuk kemudahan navigasi

### 5. Fitur Verifikasi Detail Perusahaan
- URL: `http://localhost:8000/admin/detail-perusahaan/{id}`
- Menampilkan informasi lengkap perusahaan:
  - Nama, Email, Telepon, NPWP, Alamat
  - Tanggal Pendaftaran
  - Dokumen (Sertifikat, Foto Profil) yang dapat didownload
  - Status verifikasi saat ini

- **Opsi Verifikasi** (hanya jika status pending):
  1. **Verifikasi (Setujui)**: Perusahaan bisa login
  2. **Tolak**: Dengan alasan penolakan wajib diisi

### 6. History Verifikasi
- URL: `http://localhost:8000/admin/history-verifikasi`
- Menampilkan semua perusahaan yang telah diverifikasi (disetujui/ditolak)
- Informasi: Nama, Email, Status, Tanggal Verifikasi, Alasan Penolakan

## Struktur Database

### Kolom Baru di Tabel `perusahaans`:
```sql
- status_verifikasi (enum: pending, verified, rejected) - default: pending
- alasan_penolakan (text) - nullable, untuk menyimpan alasan tolak
- verified_by (unsigned big integer) - nullable, ID admin yang memverifikasi
- verified_at (timestamp) - nullable, waktu verifikasi
```

## File-File yang Ditambahkan

### Controllers
- `app/Http/Controllers/AdminController.php` - Logika admin

### Middleware
- `app/Http/Middleware/AdminMiddleware.php` - Proteksi routes admin

### Views
- `resources/views/admin/loginAdmin.blade.php` - Login admin
- `resources/views/admin/dashboard.blade.php` - Dashboard admin
- `resources/views/admin/daftarPerusahaan.blade.php` - Daftar semua perusahaan
- `resources/views/admin/detailPerusahaan.blade.php` - Detail & verifikasi perusahaan
- `resources/views/admin/historyVerifikasi.blade.php` - History verifikasi

### Routes
```php
// Routes admin ada di routes/web.php dengan prefix /admin
Route::prefix('admin')->group(function () {
    Route::get('/login', ...) // Public
    Route::post('/login', ...)
    
    // Protected routes (memerlukan middleware 'admin')
    Route::get('/dashboard', ...)
    Route::get('/daftar-perusahaan', ...)
    Route::get('/detail-perusahaan/{id}', ...)
    Route::post('/verifikasi-perusahaan/{id}', ...)
    Route::get('/history-verifikasi', ...)
    Route::post('/logout', ...)
});
```

### Migration
- `database/migrations/2025_04_13_000000_add_verification_to_perusahaans_table.php`

## Perubahan di Controller Existing

### PerusahaanController
1. **login()**: Tambahan pengecekan status verifikasi
   - Jika pending: Tampilkan error "Akun masih menunggu verifikasi"
   - Jika rejected: Tampilkan error dengan alasan penolakan
   - Jika verified: Izinkan login

2. **register()**: 
   - Status perusahaan otomatis diset ke 'pending'
   - Redirect ke login page bukan langsung ke home
   - Tampilkan pesan "Registrasi berhasil, tunggu verifikasi admin"

## Alur Login Perusahaan yang Ditolak

1. Admin menolak perusahaan dengan alasan (misal: "Dokumentasi tidak lengkap")
2. Perusahaan berusaha login
3. Sistem menampilkan pesan: "Akun Anda ditolak. Alasan: Dokumentasi tidak lengkap"
4. Perusahaan dapat mendaftar ulang dengan dokumentasi yang benar

## Keamanan

### Current Implementation
- Menggunakan session untuk login admin
- Middleware `admin` melindungi routes yang sensitif
- Credentials admin tersimpan di environment variables (bisa di `.env`)

### Rekomendasi untuk Production
1. **Gunakan Users table untuk Admin**:
   ```php
   // Daripada hardcoded credentials, gunakan:
   if ($admin = User::where('email', $request->email)->where('role', 'admin')->first()) {
       if (Hash::check($request->password, $admin->password)) {
           // Login admin
       }
   }
   ```

2. **Implementasi 2FA (Two-Factor Authentication)**

3. **Activity Logging**: Catat setiap aksi admin (verifikasi, penolakan)

4. **Rate Limiting**: Proteksi login dari brute force

## Customization

### Mengubah Credentials Admin
Buka `app/Http/Controllers/AdminController.php` dan ubah:
```php
$adminEmail = 'email_admin_baru@kerjakuy.com';
$adminPassword = 'password_baru';
```

Atau gunakan `.env`:
```
ADMIN_EMAIL=admin@kerjakuy.com
ADMIN_PASSWORD=admin123
```

Lalu di controller:
```php
$adminEmail = env('ADMIN_EMAIL', 'admin@kerjakuy.com');
$adminPassword = env('ADMIN_PASSWORD', 'admin123');
```

## Troubleshooting

### Admin tidak bisa login
- Pastikan credentials sudah benar
- Periksa `.env` jika menggunakan environment variables

### Tombol Verifikasi tidak muncul
- Pastikan status perusahaan adalah 'pending'
- Refresh halaman

### Perusahaan tidak bisa login setelah diverifikasi
- Cek database, pastikan `status_verifikasi` = 'verified'
- Cek bahwa session admin berhasil logout

## API Endpoints

| Endpoint | Method | Auth | Deskripsi |
|----------|--------|------|-----------|
| `/admin/login` | GET | - | Form login admin |
| `/admin/login` | POST | - | Proses login admin |
| `/admin/dashboard` | GET | Admin | Dashboard dengan stats |
| `/admin/daftar-perusahaan` | GET | Admin | List semua perusahaan |
| `/admin/detail-perusahaan/{id}` | GET | Admin | Detail perusahaan |
| `/admin/verifikasi-perusahaan/{id}` | POST | Admin | Verifikasi perusahaan |
| `/admin/history-verifikasi` | GET | Admin | History verifikasi |
| `/admin/logout` | POST | Admin | Logout admin |

## Fitur yang Bisa Ditambahkan di Masa Depan

1. **Email Notification**: Kirim email ke perusahaan saat diverifikasi/ditolak
2. **Admin Dashboard Enhanced**: 
   - Chart statistik verifikasi
   - Analisis waktu verifikasi rata-rata
   - Export data perusahaan
3. **Multiple Admin**: Dukung multiple admin dengan role berbeda
4. **Audit Log**: Catat setiap aksi admin
5. **Bulk Action**: Verifikasi multiple perusahaan sekaligus
6. **Admin Edit Perusahaan**: Admin bisa mengedit data perusahaan jika ada kesalahan

---

**Created: 13 April 2026**  
**Version: 1.0**
