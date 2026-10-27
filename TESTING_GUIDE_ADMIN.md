# 🧪 TESTING GUIDE - Admin Verifikasi Perusahaan

## Pre-Testing Checklist

Sebelum testing, pastikan:
- [ ] Database sudah di-migrate (`php artisan migrate`)
- [ ] Server running (`php artisan serve`)
- [ ] Browser cache di-clear
- [ ] Session di-reset

---

## 📋 Test Scenarios

### ✅ Test 1: Admin Login

**Steps:**
1. Buka `http://localhost:8000/admin/login`
2. Masukkan email: `admin@kerjakuy.com`
3. Masukkan password: `admin123`
4. Click "Login"

**Expected Result:**
- ✅ Login berhasil
- ✅ Redirect ke `/admin/dashboard`
- ✅ Session admin_id tersimpan
- ✅ Navbar menampilkan "KerjaKuy Admin"

**Troubleshooting jika gagal:**
```
❌ Pesan "Email atau password admin salah"
   → Cek config/admin.php atau .env untuk credentials
   
❌ Blank page atau 500 error
   → Check laravel.log
   → Pastikan AdminController.php valid
```

---

### ✅ Test 2: Admin Dashboard

**Steps:**
1. Login sebagai admin (Test 1)
2. Lihat dashboard

**Expected Result:**
- ✅ Statistik menampilkan angka benar:
  - Total Perusahaan (berdasarkan DB)
  - Menunggu Verifikasi (status = pending)
  - Terverifikasi (status = verified)
  - Ditolak (status = rejected)
- ✅ Table menampilkan perusahaan pending dengan pagination

**Check:**
```sql
-- Verifikasi statistik di dashboard
SELECT 
    COUNT(*) as total,
    SUM(IF(status_verifikasi = 'pending', 1, 0)) as pending,
    SUM(IF(status_verifikasi = 'verified', 1, 0)) as verified,
    SUM(IF(status_verifikasi = 'rejected', 1, 0)) as rejected
FROM perusahaans;
```

---

### ✅ Test 3: Perusahaan Registrasi

**Steps:**
1. Logout admin (atau buka incognito window)
2. Buka `http://localhost:8000/register/perusahaan`
3. Isi form lengkap:
   - Nama Perusahaan: PT Test Indonesia
   - Email: test@gmail.com
   - Password: test123456
   - Telepon: 0812345678
   - NPWP: 12345678901234
   - Sertifikat: Upload file PDF
   - Foto Profil: Upload file JPG/PNG (optional)
4. Click "Register"

**Expected Result:**
- ✅ Registrasi berhasil
- ✅ Redirect ke `/login/perusahaan`
- ✅ Pesan: "Registrasi berhasil, tunggu verifikasi admin"
- ✅ Data tersimpan di database dengan status = 'pending'

**Check:**
```sql
SELECT * FROM perusahaans 
WHERE email = 'test@gmail.com' 
AND status_verifikasi = 'pending';
```

---

### ✅ Test 4: Perusahaan Tidak Bisa Login Jika Pending

**Steps:**
1. Buka `http://localhost:8000/login/perusahaan`
2. Masukkan email: test@gmail.com (dari Test 3)
3. Masukkan password: test123456
4. Click "Login"

**Expected Result:**
- ❌ Login gagal
- ✅ Error message: "Akun Anda masih menunggu verifikasi dari admin"

**Troubleshooting jika berhasil login:**
```
❌ Perusahaan tidak seharusnya bisa login
   → Check PerusahaanController.php login() method
   → Pastikan pengecekan status_verifikasi ada
```

---

### ✅ Test 5: Admin Approve Perusahaan

**Steps:**
1. Login admin
2. Go to `/admin/daftar-perusahaan`
3. Cari perusahaan dari Test 3
4. Click "Lihat Detail"
5. Review informasi
6. Pilih "Verifikasi (Setujui)"
7. Click "Simpan Keputusan"

**Expected Result:**
- ✅ Redirect ke dashboard
- ✅ Success message: "Perusahaan ... berhasil diverifikasi!"
- ✅ Status di database berubah jadi 'verified'
- ✅ verified_at tersimpan dengan timestamp sekarang
- ✅ Perusahaan tidak lagi muncul di list pending

**Check:**
```sql
SELECT * FROM perusahaans 
WHERE email = 'test@gmail.com'
AND status_verifikasi = 'verified';
```

---

### ✅ Test 6: Perusahaan Bisa Login Setelah Diapprove

**Steps:**
1. Buka `http://localhost:8000/login/perusahaan`
2. Masukkan email: test@gmail.com
3. Masukkan password: test123456
4. Click "Login"

**Expected Result:**
- ✅ Login berhasil
- ✅ Redirect ke `/home-perusahaan`
- ✅ Session perusahaan_id tersimpan

---

### ✅ Test 7: Admin Reject Perusahaan

**Preparation:**
1. Registrasi perusahaan baru (beda email)
2. Go to admin detail perusahaan baru

**Steps:**
1. Login admin
2. Go to `/admin/detail-perusahaan/{id}` perusahaan baru
3. Pilih "Tolak"
4. Input alasan: "Dokumentasi tidak lengkap, NPWP tidak terlihat jelas"
5. Click "Simpan Keputusan"

**Expected Result:**
- ✅ Redirect ke dashboard
- ✅ Warning message: "Perusahaan ... ditolak"
- ✅ Status di database: 'rejected'
- ✅ alasan_penolakan tersimpan
- ✅ verified_at tersimpan

**Check:**
```sql
SELECT * FROM perusahaans 
WHERE status_verifikasi = 'rejected'
AND alasan_penolakan IS NOT NULL;
```

---

### ✅ Test 8: Perusahaan Ditolak Melihat Alasan Penolakan

**Steps:**
1. Buka `http://localhost:8000/login/perusahaan`
2. Masukkan email perusahaan yang ditolak
3. Masukkan password yang benar
4. Click "Login"

**Expected Result:**
- ❌ Login gagal
- ✅ Error message: "Akun Anda ditolak. Alasan: Dokumentasi tidak lengkap, NPWP tidak terlihat jelas"

---

### ✅ Test 9: Admin History Verifikasi

**Steps:**
1. Login admin
2. Go to `/admin/history-verifikasi`

**Expected Result:**
- ✅ Table menampilkan semua perusahaan yang sudah diverifikasi (bukan pending)
- ✅ Menampilkan kolom: No, Nama, Email, Status, Tanggal Verifikasi, Keterangan
- ✅ Pagination bekerja

---

### ✅ Test 10: Admin Daftar Perusahaan dengan Filter

**Steps:**
1. Login admin
2. Go to `/admin/daftar-perusahaan`

**Test Filter Status:**
- Filter "Menunggu Verifikasi" → Hanya tampil yang status = pending
- Filter "Terverifikasi" → Hanya tampil yang status = verified
- Filter "Ditolak" → Hanya tampil yang status = rejected
- Filter "Semua" → Tampil semua

**Test Search:**
- Search "PT" → Tampil perusahaan dengan nama mengandung "PT"
- Search "gmail" → Tampil perusahaan dengan email mengandung "gmail"

**Expected Result:**
- ✅ Filter bekerja sesuai
- ✅ Search case-insensitive
- ✅ Hasil pagination benar

---

### ✅ Test 11: Admin Logout

**Steps:**
1. Login admin
2. Di navbar, click "Logout"

**Expected Result:**
- ✅ Redirect ke home page
- ✅ Session admin cleared
- ✅ Message: "Anda telah logout dari panel admin"
- ✅ Tidak bisa akses `/admin/dashboard` tanpa login

**Troubleshooting:**
```
❌ Masih bisa akses dashboard setelah logout
   → Check AdminMiddleware
   → Pastikan session().forget() bekerja
```

---

### ✅ Test 12: Admin Middleware Protection

**Steps:**
1. Logout admin (atau hapus session)
2. Coba akses `/admin/dashboard`

**Expected Result:**
- ✅ Redirect ke `/admin/login`
- ✅ Error message: "Anda harus login sebagai admin terlebih dahulu"

---

### ✅ Test 13: Download Dokumen di Detail Perusahaan

**Steps:**
1. Login admin
2. Go to detail perusahaan yang punya dokumen
3. Click "Download Sertifikat" atau "Lihat Foto"

**Expected Result:**
- ✅ File dibuka dalam tab baru atau di-download
- ✅ File adalah file yang benar (bukan placeholder)

**Troubleshooting:**
```
❌ 404 file not found
   → Check path storage (public/storage/...)
   → Pastikan symlink public/storage ke storage sudah dibuat
   → Run: php artisan storage:link
```

---

### ✅ Test 14: Database Migration

**Steps:**
```bash
php artisan migrate
```

**Expected Result:**
- ✅ Migration berjalan tanpa error
- ✅ Output: "2025_04_13_000000_add_verification_to_perusahaans_table .... DONE"
- ✅ Kolom baru ada di tabel perusahaans

**Check:**
```sql
DESCRIBE perusahaans;
-- Cek kolom: status_verifikasi, alasan_penolakan, verified_by, verified_at
```

---

## 🐛 Common Issues & Solutions

### Issue 1: "Table perusahaans doesn't have a column named status_verifikasi"

**Solution:**
```bash
php artisan migrate
php artisan migrate:refresh  # Jika masih error
```

---

### Issue 2: Admin Login Selalu Gagal

**Solution:**
1. Check config/admin.php:
   ```php
   // Harus match dengan yang di-input form
   'email' => env('ADMIN_EMAIL', 'admin@kerjakuy.com'),
   'password' => env('ADMIN_PASSWORD', 'admin123'),
   ```

2. Atau set di .env:
   ```
   ADMIN_EMAIL=admin@kerjakuy.com
   ADMIN_PASSWORD=admin123
   ```

---

### Issue 3: Middleware Admin Tidak Bekerja

**Solution:**
1. Pastikan di bootstrap/app.php sudah ada:
   ```php
   $middleware->alias([
       'admin' => AdminMiddleware::class,
   ]);
   ```

2. Routes harus pakai middleware:
   ```php
   Route::middleware('admin')->group(function () {
       Route::get('/dashboard', ...);
   });
   ```

---

### Issue 4: File Sertifikat/Foto Tidak Muncul

**Solution:**
```bash
php artisan storage:link
```

---

### Issue 5: Session Admin Hilang Setelah Refresh

**Solution:**
1. Cek .env `SESSION_DRIVER` (harus `file` atau `database`)
2. Pastikan `storage/framework/sessions/` writable
3. Clear cache: `php artisan cache:clear`

---

## ✅ Final Checklist

Sebelum go live:
- [ ] Database migration berhasil
- [ ] Admin login berfungsi
- [ ] Admin bisa verifikasi perusahaan
- [ ] Perusahaan tidak bisa login jika belum verified
- [ ] Perusahaan bisa login setelah verified
- [ ] Perusahaan ditolak melihat alasan penolakan
- [ ] History verifikasi menampilkan data benar
- [ ] Filter & search bekerja
- [ ] Download dokumen berfungsi
- [ ] Pagination bekerja di semua halaman
- [ ] Logout bekerja & session di-clear
- [ ] Middleware protection aktif

---

**Last Updated**: 13 April 2026
