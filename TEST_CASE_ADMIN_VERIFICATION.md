# 📋 TEST CASE - ADMIN VERIFICATION SYSTEM

## Daftar Isi
1. [Black Box Testing](#black-box-testing)
2. [White Box Testing](#white-box-testing)
3. [Test Execution Summary](#test-execution-summary)

---

# BLACK BOX TESTING

> **Definisi**: Testing berdasarkan spesifikasi fungsional tanpa mengetahui detail kode internal. Fokus pada input dan output yang diharapkan.

## 1. LOGIN ADMIN TEST CASES

### TC-BBox-Login-001: Login dengan Kredensial Valid
**Objective**: Memverifikasi admin dapat login dengan kredensial yang benar
```
Pre-conditions:
  - Admin belum login
  - Database terhubung dengan baik
  - Kredensial admin tersedia di config/admin.php
  
Steps:
  1. Navigate ke /admin/login
  2. Input email: admin@kerjakuy.com
  3. Input password: admin123
  4. Click "Login"
  
Expected Result:
  ✓ Admin berhasil login
  ✓ Session created: admin_id='admin', admin_email='admin@kerjakuy.com'
  ✓ Redirect ke /admin/dashboard
  ✓ Tampil success message: "Login berhasil"
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Login-002: Login dengan Email Salah
**Objective**: Memverifikasi sistem reject login dengan email yang tidak sesuai
```
Pre-conditions:
  - Admin belum login
  - Database terhubung
  
Steps:
  1. Navigate ke /admin/login
  2. Input email: admin_salah@kerjakuy.com
  3. Input password: admin123
  4. Click "Login"
  
Expected Result:
  ✓ Login gagal
  ✓ Error message: "Email atau password admin salah"
  ✓ Kembali ke halaman login
  ✓ Field form tetap terisi (except password)
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Login-003: Login dengan Password Salah
**Objective**: Memverifikasi sistem reject login dengan password yang tidak sesuai
```
Pre-conditions:
  - Admin belum login
  
Steps:
  1. Navigate ke /admin/login
  2. Input email: admin@kerjakuy.com
  3. Input password: wrongpassword123
  4. Click "Login"
  
Expected Result:
  ✓ Login gagal
  ✓ Error message: "Email atau password admin salah"
  ✓ Kembali ke halaman login
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Login-004: Login dengan Email Kosong
**Objective**: Memverifikasi validasi email field
```
Pre-conditions:
  - Admin belum login
  
Steps:
  1. Navigate ke /admin/login
  2. Kosongkan field email
  3. Input password: admin123
  4. Click "Login"
  
Expected Result:
  ✓ Form validation error ditampilkan
  ✓ Error message: "Email is required" atau sejenis
  ✓ Request tidak dikirim ke server
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Login-005: Login dengan Password Kosong
**Objective**: Memverifikasi validasi password field
```
Pre-conditions:
  - Admin belum login
  
Steps:
  1. Navigate ke /admin/login
  2. Input email: admin@kerjakuy.com
  3. Kosongkan field password
  4. Click "Login"
  
Expected Result:
  ✓ Form validation error ditampilkan
  ✓ Error message: "Password is required"
  ✓ Request tidak dikirim ke server
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Login-006: Email Format Invalid
**Objective**: Memverifikasi validasi format email
```
Pre-conditions:
  - Admin belum login
  
Steps:
  1. Navigate ke /admin/login
  2. Input email: invalidemailformat
  3. Input password: admin123
  4. Click "Login"
  
Expected Result:
  ✓ Form validation error ditampilkan
  ✓ Error message: "Email must be valid email"
  ✓ Request tidak dikirim ke server
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 2. DASHBOARD ADMIN TEST CASES

### TC-BBox-Dashboard-001: View Dashboard dengan Data Valid
**Objective**: Memverifikasi dashboard menampilkan statistik dengan benar
```
Pre-conditions:
  - Admin sudah login
  - Database berisi minimal 5 perusahaan dengan berbagai status:
    - 2 perusahaan status 'pending'
    - 2 perusahaan status 'verified'
    - 1 perusahaan status 'rejected'
  
Steps:
  1. Login dengan kredensial admin
  2. System auto redirect ke /admin/dashboard
  3. Observe statistik yang ditampilkan
  
Expected Result:
  ✓ Total Perusahaan = 5
  ✓ Perusahaan Menunggu Verifikasi = 2
  ✓ Perusahaan Terverifikasi = 2
  ✓ Perusahaan Ditolak = 1
  ✓ List 10 perusahaan pending ditampilkan (pagination)
  ✓ Setiap item list menampilkan: nama, email, tanggal daftar, tombol "Lihat Detail"
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Dashboard-002: Access Dashboard tanpa Login
**Objective**: Memverifikasi middleware proteksi dashboard
```
Pre-conditions:
  - Admin belum login (session kosong)
  
Steps:
  1. Navigate langsung ke /admin/dashboard
  2. Observe redirect behavior
  
Expected Result:
  ✓ Access denied
  ✓ Redirect ke /admin/login
  ✓ Tidak bisa view data apapun
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Dashboard-003: Pagination Works Correctly
**Objective**: Memverifikasi pagination untuk list perusahaan pending
```
Pre-conditions:
  - Admin sudah login
  - Database berisi > 10 perusahaan pending
  
Steps:
  1. View dashboard
  2. Observe list perusahaan (halaman 1)
  3. Click "Next" pagination button
  4. Observe list perusahaan (halaman 2)
  
Expected Result:
  ✓ Halaman 1 menampilkan 10 items pertama
  ✓ Halaman 2 menampilkan 10 items berikutnya
  ✓ Previous/Next button berfungsi dengan benar
  ✓ URL berubah dengan parameter ?page=2
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 3. DAFTAR PERUSAHAAN TEST CASES

### TC-BBox-Daftar-001: View List Semua Perusahaan
**Objective**: Memverifikasi list view menampilkan semua perusahaan
```
Pre-conditions:
  - Admin sudah login
  - Database berisi 20 perusahaan dengan berbagai status
  
Steps:
  1. Navigate ke /admin/daftar-perusahaan
  2. Observe list yang ditampilkan
  
Expected Result:
  ✓ Menampilkan list semua perusahaan (15 per page)
  ✓ Setiap item menampilkan: nama, email, status, tanggal daftar
  ✓ Status ditampilkan dengan badge color (pending=kuning, verified=hijau, rejected=merah)
  ✓ Pagination menampilkan 2 halaman
  ✓ Default sorting: latest first (terbaru duluan)
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Daftar-002: Search Perusahaan by Nama
**Objective**: Memverifikasi fitur search berdasarkan nama perusahaan
```
Pre-conditions:
  - Admin sudah login
  - Database berisi perusahaan dengan nama:
    - "PT. Maju Jaya"
    - "CV. Teknologi Maju"
    - "PT. Bangun Sejahtera"
  
Steps:
  1. Navigate ke /admin/daftar-perusahaan
  2. Input "Maju" di search field
  3. Click "Search" atau auto-search
  4. Observe hasil
  
Expected Result:
  ✓ Hanya 2 perusahaan ditampilkan:
    - "PT. Maju Jaya"
    - "CV. Teknologi Maju"
  ✓ "PT. Bangun Sejahtera" tidak ditampilkan
  ✓ URL berisi parameter: ?search=Maju
  ✓ Search adalah case-insensitive
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Daftar-003: Search Perusahaan by Email
**Objective**: Memverifikasi search juga bekerja untuk email
```
Pre-conditions:
  - Admin sudah login
  - Database berisi perusahaan dengan email:
    - info@majujaya.com
    - hello@teknologimaju.com
    - support@bangun.com
  
Steps:
  1. Navigate ke /admin/daftar-perusahaan
  2. Input "teknologi" di search field
  3. Click Search
  4. Observe hasil
  
Expected Result:
  ✓ Menemukan perusahaan dengan email "hello@teknologimaju.com"
  ✓ Minimal 1 perusahaan ditampilkan
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Daftar-004: Filter by Status Pending
**Objective**: Memverifikasi filter status pending
```
Pre-conditions:
  - Admin sudah login
  - Database berisi perusahaan dengan berbagai status
  
Steps:
  1. Navigate ke /admin/daftar-perusahaan
  2. Select filter: "Status Pending"
  3. Click "Filter"
  
Expected Result:
  ✓ Hanya perusahaan dengan status_verifikasi='pending' ditampilkan
  ✓ URL berisi parameter: ?status=pending
  ✓ Semua item menampilkan status badge 'Menunggu'
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Daftar-005: Filter by Status Verified
**Objective**: Memverifikasi filter status terverifikasi
```
Pre-conditions:
  - Admin sudah login
  - Database berisi ≥ 3 perusahaan verified
  
Steps:
  1. Navigate ke /admin/daftar-perusahaan
  2. Select filter: "Status Terverifikasi"
  3. Click "Filter"
  
Expected Result:
  ✓ Hanya perusahaan dengan status_verifikasi='verified' ditampilkan
  ✓ URL berisi parameter: ?status=verified
  ✓ Semua item menampilkan status badge 'Terverifikasi'
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Daftar-006: Filter by Status Rejected
**Objective**: Memverifikasi filter status ditolak
```
Pre-conditions:
  - Admin sudah login
  - Database berisi ≥ 2 perusahaan rejected
  
Steps:
  1. Navigate ke /admin/daftar-perusahaan
  2. Select filter: "Status Ditolak"
  3. Click "Filter"
  
Expected Result:
  ✓ Hanya perusahaan dengan status_verifikasi='rejected' ditampilkan
  ✓ URL berisi parameter: ?status=rejected
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Daftar-007: Combine Search + Filter
**Objective**: Memverifikasi search dan filter dapat dikombinasikan
```
Pre-conditions:
  - Admin sudah login
  - Database berisi perusahaan "Teknologi Maju" dengan status pending
  
Steps:
  1. Navigate ke /admin/daftar-perusahaan
  2. Input search: "Maju"
  3. Select filter: "Status Pending"
  4. Click "Search"
  
Expected Result:
  ✓ Hanya "Teknologi Maju" dengan status pending ditampilkan
  ✓ URL berisi: ?search=Maju&status=pending
  ✓ Filter dan search bekerja bersama
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Daftar-008: Click Detail dari List
**Objective**: Memverifikasi navigasi ke detail perusahaan
```
Pre-conditions:
  - Admin sudah login
  - Sudah di halaman daftar perusahaan
  
Steps:
  1. Click tombol "Lihat Detail" pada salah satu perusahaan
  2. Observe redirect
  
Expected Result:
  ✓ Redirect ke /admin/detail-perusahaan/{id}
  ✓ Halaman detail perusahaan ditampilkan
  ✓ Data yang ditampilkan sesuai perusahaan yang diklik
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 4. DETAIL PERUSAHAAN & VERIFIKASI TEST CASES

### TC-BBox-Detail-001: View Detail Perusahaan Lengkap
**Objective**: Memverifikasi detail page menampilkan info lengkap
```
Pre-conditions:
  - Admin sudah login
  - Perusahaan dengan ID 5 ada di database
  - Perusahaan memiliki semua data lengkap
  
Steps:
  1. Navigate ke /admin/detail-perusahaan/5
  2. Observe semua informasi yang ditampilkan
  
Expected Result:
  ✓ Menampilkan section "Informasi Dasar":
    - Nama Perusahaan
    - Email
    - Telepon
    - NPWP
  ✓ Menampilkan section "Alamat":
    - Provinsi
    - Kota/Kabupaten
    - Kecamatan
    - Alamat Lengkap
  ✓ Menampilkan section "Dokumen":
    - Link download Sertifikat
    - Link download Foto Profil
  ✓ Menampilkan section "Verifikasi" (jika status pending)
    - Tombol "Setujui"
    - Tombol "Tolak"
    - Input alasan (jika akan ditolak)
  ✓ Header menampilkan nama perusahaan
  ✓ Navbar terdapat link back to dashboard
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-002: Download Sertifikat
**Objective**: Memverifikasi download file sertifikat
```
Pre-conditions:
  - Admin sudah login
  - Di halaman detail perusahaan
  - Perusahaan memiliki file sertifikat
  
Steps:
  1. Click link "Download Sertifikat"
  2. Observe file download
  
Expected Result:
  ✓ File sertifikat berhasil didownload
  ✓ Filename sesuai dengan nama file di storage
  ✓ File type dan ukuran sesuai
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-003: Download Foto Profil
**Objective**: Memverifikasi download file foto profil
```
Pre-conditions:
  - Admin sudah login
  - Di halaman detail perusahaan
  - Perusahaan memiliki foto profil
  
Steps:
  1. Click link "Download Foto Profil"
  2. Observe file download
  
Expected Result:
  ✓ File foto berhasil didownload
  ✓ File adalah image (jpg, png, etc)
  ✓ File dapat dibuka dengan image viewer
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-004: Approve Perusahaan (Status Verified)
**Objective**: Memverifikasi fitur approve perusahaan
```
Pre-conditions:
  - Admin sudah login
  - Di halaman detail perusahaan dengan status pending
  - Perusahaan ID: 3
  
Steps:
  1. Click tombol "Setujui"
  2. Observe konfirmasi atau processing
  3. Observe hasil
  
Expected Result:
  ✓ Status perusahaan berubah menjadi "verified"
  ✓ Field verified_by dan verified_at terisi
  ✓ Success message ditampilkan: "Perusahaan [nama] berhasil diverifikasi!"
  ✓ Redirect ke dashboard
  ✓ Perusahaan hilang dari list "Menunggu Verifikasi"
  ✓ Count "Perusahaan Terverifikasi" bertambah 1
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-005: Reject Perusahaan dengan Alasan
**Objective**: Memverifikasi fitur reject dengan alasan
```
Pre-conditions:
  - Admin sudah login
  - Di halaman detail perusahaan dengan status pending
  - Perusahaan ID: 4
  
Steps:
  1. Click tombol "Tolak"
  2. Muncul form/modal untuk input alasan
  3. Input alasan: "Dokumentasi NPWP tidak lengkap"
  4. Click "Kirim" atau "Confirm"
  
Expected Result:
  ✓ Status perusahaan berubah menjadi "rejected"
  ✓ Field alasan_penolakan terisi: "Dokumentasi NPWP tidak lengkap"
  ✓ Warning message ditampilkan: "Perusahaan [nama] ditolak."
  ✓ Redirect ke dashboard
  ✓ Count "Perusahaan Ditolak" bertambah 1
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-006: Reject tanpa Alasan
**Objective**: Memverifikasi validasi alasan wajib saat reject
```
Pre-conditions:
  - Admin sudah login
  - Di halaman detail perusahaan
  
Steps:
  1. Click tombol "Tolak"
  2. Kosongkan field alasan
  3. Click "Kirim"
  
Expected Result:
  ✓ Form validation error ditampilkan
  ✓ Error message: "Alasan penolakan wajib diisi" atau sejenis
  ✓ Form tidak ter-submit
  ✓ Status perusahaan tetap 'pending'
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-007: Reject dengan Alasan Terlalu Panjang
**Objective**: Memverifikasi validasi max length alasan
```
Pre-conditions:
  - Admin sudah login
  - Di halaman detail perusahaan
  
Steps:
  1. Click tombol "Tolak"
  2. Input alasan dengan 501 karakter (max adalah 500)
  3. Click "Kirim"
  
Expected Result:
  ✓ Form validation error ditampilkan
  ✓ Error message: "Alasan max 500 karakter"
  ✓ Form tidak ter-submit
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-008: View Detail Perusahaan Verified (Status sudah approved)
**Objective**: Memverifikasi UI berbeda untuk perusahaan yang sudah verified
```
Pre-conditions:
  - Admin sudah login
  - Perusahaan dengan status 'verified' ada
  - ID: 10
  
Steps:
  1. Navigate ke /admin/detail-perusahaan/10
  2. Observe element yang ditampilkan
  
Expected Result:
  ✓ Section verifikasi (tombol approve/reject) TIDAK ditampilkan
  ✓ Status badge menampilkan "Terverifikasi" (warna hijau)
  ✓ Menampilkan informasi verified_at
  ✓ Back button masih ada untuk kembali
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-009: View Detail Perusahaan Rejected
**Objective**: Memverifikasi UI untuk perusahaan yang ditolak
```
Pre-conditions:
  - Admin sudah login
  - Perusahaan dengan status 'rejected' ada
  - ID: 11
  
Steps:
  1. Navigate ke /admin/detail-perusahaan/11
  2. Observe element yang ditampilkan
  
Expected Result:
  ✓ Status badge menampilkan "Ditolak" (warna merah)
  ✓ Menampilkan field "Alasan Penolakan" dengan isi
  ✓ Section verifikasi TIDAK ditampilkan
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Detail-010: Access Non-Existent Perusahaan
**Objective**: Memverifikasi error handling untuk ID tidak valid
```
Pre-conditions:
  - Admin sudah login
  - Perusahaan dengan ID 9999 tidak ada
  
Steps:
  1. Navigate ke /admin/detail-perusahaan/9999
  2. Observe response
  
Expected Result:
  ✓ 404 error page ditampilkan
  ✓ Message: "Not Found" atau "Perusahaan tidak ditemukan"
  ✓ Link back ke dashboard tersedia
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 5. HISTORY VERIFIKASI TEST CASES

### TC-BBox-History-001: View History Semua Verifikasi
**Objective**: Memverifikasi history page menampilkan data dengan benar
```
Pre-conditions:
  - Admin sudah login
  - Database berisi:
    - 5 perusahaan dengan status 'verified'
    - 3 perusahaan dengan status 'rejected'
  
Steps:
  1. Navigate ke /admin/history-verifikasi
  2. Observe list yang ditampilkan
  
Expected Result:
  ✓ Menampilkan 8 perusahaan (5 verified + 3 rejected)
  ✓ Tidak menampilkan perusahaan dengan status 'pending'
  ✓ Setiap item menampilkan:
    - Nama Perusahaan
    - Email
    - Status
    - Tanggal Verifikasi (verified_at)
    - Alasan Penolakan (jika rejected)
  ✓ Sorting: terbaru duluan (by verified_at DESC)
  ✓ Pagination: 20 per halaman
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-History-002: History Pagination
**Objective**: Memverifikasi pagination di history page
```
Pre-conditions:
  - Admin sudah login
  - Database berisi > 20 perusahaan verified/rejected
  
Steps:
  1. Navigate ke /admin/history-verifikasi
  2. Observe halaman 1 (20 items)
  3. Click "Next"
  4. Observe halaman 2
  
Expected Result:
  ✓ Halaman 1: 20 items pertama
  ✓ Halaman 2: 20 items berikutnya
  ✓ Navigation buttons berfungsi
  ✓ URL berubah dengan parameter ?page=2
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-History-003: Verified Perusahaan di History
**Objective**: Memverifikasi detail history untuk perusahaan verified
```
Pre-conditions:
  - Admin sudah login
  - History page terbuka
  - Minimal 1 perusahaan status 'verified'
  
Steps:
  1. Observe perusahaan dengan status 'Terverifikasi'
  2. Check informasi yang ditampilkan
  
Expected Result:
  ✓ Status badge menampilkan "Terverifikasi" (hijau)
  ✓ Tanggal verifikasi ditampilkan (verified_at)
  ✓ Alasan penolakan: KOSONG/tidak ditampilkan
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-History-004: Rejected Perusahaan di History
**Objective**: Memverifikasi detail history untuk perusahaan rejected
```
Pre-conditions:
  - Admin sudah login
  - History page terbuka
  - Minimal 1 perusahaan status 'rejected'
  
Steps:
  1. Observe perusahaan dengan status 'Ditolak'
  2. Check informasi yang ditampilkan
  
Expected Result:
  ✓ Status badge menampilkan "Ditolak" (merah)
  ✓ Tanggal verifikasi ditampilkan
  ✓ Alasan penolakan ditampilkan lengkap
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 6. LOGOUT TEST CASES

### TC-BBox-Logout-001: Logout dari Dashboard
**Objective**: Memverifikasi admin dapat logout dengan benar
```
Pre-conditions:
  - Admin sudah login
  - Berada di halaman dashboard atau halaman manapun
  
Steps:
  1. Click tombol "Logout" di navbar
  2. Observe redirect dan session
  
Expected Result:
  ✓ Session 'admin_id' dan 'admin_email' terhapus
  ✓ Redirect ke homepage (/)
  ✓ Success message ditampilkan: "Anda telah logout dari panel admin"
  ✓ Admin tidak dapat mengakses /admin/dashboard (redirect ke login)
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-BBox-Logout-002: Access Protected Route setelah Logout
**Objective**: Memverifikasi middleware proteksi setelah logout
```
Pre-conditions:
  - Admin baru saja logout
  
Steps:
  1. Navigate ke /admin/dashboard
  2. Observe redirect
  
Expected Result:
  ✓ Redirect ke /admin/login
  ✓ Tidak bisa melihat data apapun
  ✓ Harus login ulang
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

# WHITE BOX TESTING

> **Definisi**: Testing berdasarkan pengetahuan detail internal code. Fokus pada logic, branch, dan code path.

## 1. LOGIN METHOD - WHITE BOX TEST CASES

### TC-WBox-Login-001: Validasi Request Input
**Objective**: Memverifikasi validation rules di login method
```
Code Location: AdminController::login() - line 15-18

Test Input:
  - email: null, password: null
  - email: "invalid-email", password: "valid"
  - email: valid@test.com, password: null
  
Expected Behavior:
  ✓ Request validation ditrigger
  ✓ Validation rules: email required|email, password required
  ✓ Error response returned jika validation gagal
  ✓ Database query tidak dieksekusi jika validation fail

Code Path Tested:
  $request->validate([
    'email'    => 'required|email',
    'password' => 'required'
  ]);
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Login-002: Config Reading
**Objective**: Memverifikasi config admin dibaca dengan benar
```
Code Location: AdminController::login() - line 21-22

Test Input:
  config/admin.php terdapat:
  'admin' => [
    'email' => 'admin@kerjakuy.com',
    'password' => 'admin123'
  ]
  
Expected Behavior:
  ✓ config('admin.admin.email') returns 'admin@kerjakuy.com'
  ✓ config('admin.admin.password') returns 'admin123'
  ✓ Nilai yang dibaca sesuai dengan config file
  
Code Path Tested:
  $adminEmail = config('admin.admin.email');
  $adminPassword = config('admin.admin.password');
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Login-003: Credential Matching (True Branch)
**Objective**: Memverifikasi kondisi email dan password cocok
```
Code Location: AdminController::login() - line 24-28

Test Input:
  email = 'admin@kerjakuy.com' (matched dengan config)
  password = 'admin123' (matched dengan config)
  
Expected Behavior:
  ✓ if condition: (email === $adminEmail && password === $adminPassword) TRUE
  ✓ Branch: TRUE dieksekusi
  ✓ Session data set dengan keys: admin_id, admin_email
  ✓ session(['admin_id' => 'admin', 'admin_email' => $adminEmail]) dijalankan
  ✓ Redirect ke /admin/dashboard dijalankan
  ✓ with('success', 'Login berhasil') ditambahkan
  
Code Path Tested:
  if ($request->email === $adminEmail && $request->password === $adminPassword) {
    session(['admin_id' => 'admin', 'admin_email' => $adminEmail]);
    return redirect('/admin/dashboard')->with('success', 'Login berhasil');
  }
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Login-004: Credential Mismatch (False Branch)
**Objective**: Memverifikasi kondisi email/password tidak cocok
```
Code Location: AdminController::login() - line 30

Test Input:
  email = 'admin@kerjakuy.com'
  password = 'wrongpassword'
  
Expected Behavior:
  ✓ if condition: FALSE (password tidak cocok)
  ✓ Branch: FALSE dieksekusi
  ✓ return back()->withErrors([...]) dijalankan
  ✓ Error message: 'Email atau password admin salah'
  ✓ Session TIDAK di-set
  ✓ Redirect ke halaman sebelumnya
  
Code Path Tested:
  return back()->withErrors(['email' => 'Email atau password admin salah']);
  
Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Login-005: Boolean Short-Circuit Evaluation
**Objective**: Memverifikasi && operator dalam kondisi
```
Code Location: AdminController::login() - line 24

Test Scenario 1:
  email = 'wrong@email.com' (FALSE)
  password = 'admin123' (matched)
  Expected: FALSE && TRUE = FALSE → Else branch
  
Test Scenario 2:
  email = 'admin@kerjakuy.com' (matched)
  password = 'wrong' (FALSE)
  Expected: TRUE && FALSE = FALSE → Else branch
  
Test Scenario 3:
  email = 'admin@kerjakuy.com' (matched)
  password = 'admin123' (matched)
  Expected: TRUE && TRUE = TRUE → If branch

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 2. DASHBOARD METHOD - WHITE BOX TEST CASES

### TC-WBox-Dashboard-001: Database Query - Pending Perusahaan
**Objective**: Memverifikasi query untuk pending perusahaan
```
Code Location: AdminController::dashboard() - line 38-40

Code:
  $pendingPerusahaan = Perusahaan::where('status_verifikasi', 'pending')
    ->latest()
    ->paginate(10);

Expected Behavior:
  ✓ WHERE clause: status_verifikasi = 'pending' applied
  ✓ ORDER BY: created_at DESC (from latest())
  ✓ LIMIT: 10 (from paginate(10))
  ✓ Query result: Collection<Perusahaan>
  ✓ Pagination meta: total, per_page, current_page

Test Data:
  Database: 5 pending, 3 verified, 2 rejected
  Expected: Query returns 5 items, paginated to 10 per page

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Dashboard-002: Database Query - Verified Count
**Objective**: Memverifikasi count query untuk verified
```
Code Location: AdminController::dashboard() - line 42-43

Code:
  $verifiedPerusahaan = Perusahaan::where('status_verifikasi', 'verified')
    ->count();

Expected Behavior:
  ✓ WHERE clause applied: status_verifikasi = 'verified'
  ✓ COUNT aggregate function executed
  ✓ Result: Integer (count)
  ✓ No pagination (count only)

Test Data:
  Database: 3 verified perusahaan
  Expected: count() returns 3

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Dashboard-003: Database Query - Rejected Count
**Objective**: Memverifikasi count query untuk rejected
```
Code Location: AdminController::dashboard() - line 45-46

Code:
  $rejectedPerusahaan = Perusahaan::where('status_verifikasi', 'rejected')
    ->count();

Expected Behavior:
  ✓ WHERE clause: status_verifikasi = 'rejected'
  ✓ COUNT executed
  ✓ Result: Integer

Test Data:
  Database: 2 rejected
  Expected: count() returns 2

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Dashboard-004: Database Query - Total Count
**Objective**: Memverifikasi total count tanpa WHERE
```
Code Location: AdminController::dashboard() - line 48

Code:
  $totalPerusahaan = Perusahaan::count();

Expected Behavior:
  ✓ No WHERE clause
  ✓ COUNT all records
  ✓ Result: Integer

Test Data:
  Database: 10 total perusahaan (any status)
  Expected: count() returns 10

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Dashboard-005: View Data Passing
**Objective**: Memverifikasi variabel di-pass ke view
```
Code Location: AdminController::dashboard() - line 50

Code:
  return view('admin.dashboard', compact('pendingPerusahaan', 'verifiedPerusahaan', 'rejectedPerusahaan', 'totalPerusahaan'));

Expected Behavior:
  ✓ compact() creates array of variables
  ✓ Keys: pendingPerusahaan, verifiedPerusahaan, rejectedPerusahaan, totalPerusahaan
  ✓ Values passed to view template
  ✓ View file: resources/views/admin/dashboard.blade.php loaded

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 3. DAFTAR PERUSAHAAN METHOD - WHITE BOX TEST CASES

### TC-WBox-Daftar-001: Query Builder Initialization
**Objective**: Memverifikasi query builder di-inisialisasi
```
Code Location: AdminController::daftarPerusahaan() - line 54

Code:
  $query = Perusahaan::query();

Expected Behavior:
  ✓ Query builder instance created
  ✓ Base query: SELECT * FROM perusahaans
  ✓ Ready untuk ditambah kondisi WHERE, ORDER BY, etc

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Daftar-002: Status Filter - Has Status Parameter
**Objective**: Memverifikasi filter status ketika parameter ada
```
Code Location: AdminController::daftarPerusahaan() - line 57-59

Code:
  if ($request->has('status') && $request->status !== '') {
    $query->where('status_verifikasi', $request->status);
  }

Test Cases:
  Case 1: $request->has('status') = TRUE, $request->status = 'verified'
    Expected: WHERE clause added, query filters by status='verified'
  
  Case 2: $request->has('status') = TRUE, $request->status = ''
    Expected: Condition FALSE, WHERE clause NOT added
  
  Case 3: $request->has('status') = FALSE
    Expected: Condition FALSE, WHERE clause NOT added

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Daftar-003: Search Filter - Has Search Parameter
**Objective**: Memverifikasi search ketika parameter ada
```
Code Location: AdminController::daftarPerusahaan() - line 62-68

Code:
  if ($request->has('search') && $request->search !== '') {
    $search = $request->search;
    $query->where(function ($q) use ($search) {
      $q->where('nama_perusahaan', 'like', "%$search%")
        ->orWhere('email', 'like', "%$search%");
    });
  }

Expected Behavior:
  ✓ Closure passed to where()
  ✓ Inside closure: OR logic untuk nama_perusahaan dan email
  ✓ LIKE operator dengan wildcard: "%search%"
  ✓ Case-insensitive search

Test Input:
  search = 'Maju'
  Query: WHERE (nama_perusahaan LIKE '%Maju%' OR email LIKE '%Maju%')

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Daftar-004: Query Execution & Pagination
**Objective**: Memverifikasi query dijalankan dengan pagination
```
Code Location: AdminController::daftarPerusahaan() - line 70

Code:
  $perusahaan = $query->latest()->paginate(15);

Expected Behavior:
  ✓ Query yang sudah di-build dijalankan
  ✓ latest() = ORDER BY created_at DESC
  ✓ paginate(15) = LIMIT 15 dengan pagination metadata
  ✓ Result: LengthAwarePaginator instance

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 4. DETAIL PERUSAHAAN METHOD - WHITE BOX TEST CASES

### TC-WBox-Detail-001: Find by Primary Key
**Objective**: Memverifikasi query find by ID
```
Code Location: AdminController::detailPerusahaan() - line 75

Code:
  $perusahaan = Perusahaan::findOrFail($id);

Expected Behavior:
  ✓ Query: SELECT * FROM perusahaans WHERE id = $id
  ✓ If found: Return Perusahaan model instance
  ✓ If not found: Throw ModelNotFoundException → 404 error

Test Cases:
  Case 1: $id = 5 (exists in database)
    Expected: Model returned, no exception
  
  Case 2: $id = 9999 (not exists)
    Expected: Exception thrown, 404 response
  
  Case 3: $id = "invalid" (string)
    Expected: Database query handles it

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Detail-002: View Rendering
**Objective**: Memverifikasi view rendering dengan data
```
Code Location: AdminController::detailPerusahaan() - line 76

Code:
  return view('admin.detailPerusahaan', compact('perusahaan'));

Expected Behavior:
  ✓ View template loaded: resources/views/admin/detailPerusahaan.blade.php
  ✓ Variable 'perusahaan' passed to view
  ✓ In view: dapat mengakses $perusahaan->nama_perusahaan, dll

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 5. VERIFIKASI PERUSAHAAN METHOD - WHITE BOX TEST CASES

### TC-WBox-Verifikasi-001: Validation Rules
**Objective**: Memverifikasi request validation
```
Code Location: AdminController::verifikasiPerusahaan() - line 84-87

Code:
  $request->validate([
    'status_verifikasi' => 'required|in:verified,rejected',
    'alasan_penolakan' => 'nullable|string|max:500'
  ]);

Expected Behavior:
  ✓ status_verifikasi: REQUIRED dan hanya 'verified' atau 'rejected'
  ✓ alasan_penolakan: NULLABLE (optional), harus string, max 500 karakter
  ✓ Validation fail: error response returned
  ✓ Validation pass: continue to next code

Test Cases:
  Case 1: status_verifikasi = null
    Expected: Validation error
  
  Case 2: status_verifikasi = 'pending' (invalid value)
    Expected: Validation error
  
  Case 3: alasan_penolakan = 501 characters
    Expected: Validation error
  
  Case 4: alasan_penolakan = null, status_verifikasi = 'verified'
    Expected: Validation pass

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Verifikasi-002: Find Perusahaan
**Objective**: Memverifikasi query find
```
Code Location: AdminController::verifikasiPerusahaan() - line 81

Code:
  $perusahaan = Perusahaan::findOrFail($id);

Expected Behavior:
  ✓ Sama dengan detailPerusahaan method
  ✓ If not found: Exception → 404
  ✓ If found: Model instance returned

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Verifikasi-003: Verified Branch (True Path)
**Objective**: Memverifikasi logic ketika status = 'verified'
```
Code Location: AdminController::verifikasiPerusahaan() - line 89-95

Code:
  if ($request->status_verifikasi === 'verified') {
    $perusahaan->status_verifikasi = 'verified';
    $perusahaan->verified_by = 1;
    $perusahaan->verified_at = now();
    $perusahaan->alasan_penolakan = null;
    $perusahaan->save();
    return redirect()->route('admin.dashboard')
      ->with('success', 'Perusahaan ' . $perusahaan->nama_perusahaan . ' berhasil diverifikasi!');
  }

Expected Behavior:
  ✓ Condition: $request->status_verifikasi === 'verified' TRUE
  ✓ Model attributes updated:
    - status_verifikasi = 'verified'
    - verified_by = 1
    - verified_at = current timestamp
    - alasan_penolakan = null
  ✓ Model saved to database (UPDATE query)
  ✓ Redirect to dashboard
  ✓ Success message with company name

Test Data:
  Input: status_verifikasi = 'verified'
  Before: status = 'pending', verified_at = null
  After: status = 'verified', verified_at = timestamp

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Verifikasi-004: Rejected Branch (False Path)
**Objective**: Memverifikasi logic ketika status = 'rejected'
```
Code Location: AdminController::verifikasiPerusahaan() - line 96-103

Code:
  else {
    $perusahaan->status_verifikasi = 'rejected';
    $perusahaan->alasan_penolakan = $request->alasan_penolakan;
    $perusahaan->verified_by = 1;
    $perusahaan->verified_at = now();
    $perusahaan->save();
    return redirect()->route('admin.dashboard')
      ->with('warning', 'Perusahaan ' . $perusahaan->nama_perusahaan . ' ditolak.');
  }

Expected Behavior:
  ✓ Condition: status !== 'verified' → Else executed
  ✓ Model attributes updated:
    - status_verifikasi = 'rejected'
    - alasan_penolakan = input dari request
    - verified_by = 1
    - verified_at = current timestamp
  ✓ Model saved to database
  ✓ Redirect to dashboard
  ✓ Warning message with company name

Test Data:
  Input: status = 'rejected', alasan = 'Dokumentasi tidak lengkap'
  After: status = 'rejected', alasan_penolakan = 'Dokumentasi tidak lengkap'

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Verifikasi-005: Exception Handling
**Objective**: Memverifikasi try-catch block
```
Code Location: AdminController::verifikasiPerusahaan() - line 88 (try) & line 104 (catch)

Code:
  try {
    if ($request->status_verifikasi === 'verified') {
      // ... verified logic
    } else {
      // ... rejected logic
    }
  } catch (\Exception $e) {
    return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
  }

Expected Behavior:
  ✓ Normal path: No exception → continue normal flow
  ✓ Error path: Exception thrown → catch block executed
  ✓ Error message returned dengan detail exception

Test Cases:
  Case 1: Normal update (no exception)
    Expected: Redirect with success/warning
  
  Case 2: Database connection error (exception thrown)
    Expected: Caught by catch, error message with exception detail

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 6. HISTORY VERIFIKASI METHOD - WHITE BOX TEST CASES

### TC-WBox-History-001: Query WHERE NOT EQUAL
**Objective**: Memverifikasi query dengan NOT EQUAL condition
```
Code Location: AdminController::historyVerifikasi() - line 107

Code:
  $history = Perusahaan::where('status_verifikasi', '!=', 'pending')
    ->latest('verified_at')
    ->paginate(20);

Expected Behavior:
  ✓ WHERE clause: status_verifikasi != 'pending'
  ✓ Result: Hanya perusahaan dengan status 'verified' atau 'rejected'
  ✓ ORDER BY: verified_at DESC (latest by verified_at)
  ✓ LIMIT: 20 per page
  ✓ Result: LengthAwarePaginator instance

Test Data:
  Database: 2 pending, 5 verified, 3 rejected
  Expected: Query returns 8 (5+3), tidak termasuk 2 pending

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-History-002: Latest by Specific Column
**Objective**: Memverifikasi latest() dengan specific column
```
Code Location: AdminController::historyVerifikasi() - line 108

Code:
  ->latest('verified_at')

Expected Behavior:
  ✓ Default latest() = ORDER BY created_at DESC
  ✓ latest('verified_at') = ORDER BY verified_at DESC
  ✓ Most recent verification first
  ✓ Verified perusahaan dengan verified_at terbaru = TOP

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## 7. LOGOUT METHOD - WHITE BOX TEST CASES

### TC-WBox-Logout-001: Session Forget
**Objective**: Memverifikasi session data dihapus
```
Code Location: AdminController::logout() - line 113

Code:
  session()->forget(['admin_id', 'admin_email']);

Expected Behavior:
  ✓ Session key 'admin_id' deleted
  ✓ Session key 'admin_email' deleted
  ✓ session('admin_id') = null (no longer exists)
  ✓ session('admin_email') = null (no longer exists)
  ✓ Other session data intact (if any)

Test Scenario:
  Before: session = [admin_id => 'admin', admin_email => 'admin@kerjakuy.com', lang => 'id']
  After: session = [lang => 'id'] (only non-admin keys)

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

### TC-WBox-Logout-002: Redirect with Success Message
**Objective**: Memverifikasi redirect dan message
```
Code Location: AdminController::logout() - line 114

Code:
  return redirect('/')->with('success', 'Anda telah logout dari panel admin');

Expected Behavior:
  ✓ Redirect to home (/) route
  ✓ Flash message in session: key='success', value='Anda telah logout dari panel admin'
  ✓ Message available di view setelah redirect
  ✓ HTTP status: 302 (Found / Redirect)

Actual Result: [Fill after testing]
Status: [PASS/FAIL]
```

---

## TEST EXECUTION SUMMARY

### Test Results Summary Table

| Test Case ID | Category | Description | Status | Notes |
|:---|:---|:---|:---:|---|
| TC-BBox-Login-001 | Black Box | Login valid credentials | ☐ | |
| TC-BBox-Login-002 | Black Box | Login invalid email | ☐ | |
| TC-BBox-Login-003 | Black Box | Login invalid password | ☐ | |
| TC-BBox-Login-004 | Black Box | Email field empty | ☐ | |
| TC-BBox-Login-005 | Black Box | Password field empty | ☐ | |
| TC-BBox-Login-006 | Black Box | Invalid email format | ☐ | |
| TC-BBox-Dashboard-001 | Black Box | View dashboard statistics | ☐ | |
| TC-BBox-Dashboard-002 | Black Box | Access dashboard without login | ☐ | |
| TC-BBox-Dashboard-003 | Black Box | Pagination functionality | ☐ | |
| TC-BBox-Daftar-001 | Black Box | View all companies | ☐ | |
| TC-BBox-Daftar-002 | Black Box | Search by company name | ☐ | |
| TC-BBox-Daftar-003 | Black Box | Search by email | ☐ | |
| TC-BBox-Daftar-004 | Black Box | Filter status pending | ☐ | |
| TC-BBox-Daftar-005 | Black Box | Filter status verified | ☐ | |
| TC-BBox-Daftar-006 | Black Box | Filter status rejected | ☐ | |
| TC-BBox-Daftar-007 | Black Box | Combine search + filter | ☐ | |
| TC-BBox-Daftar-008 | Black Box | Navigate to detail | ☐ | |
| TC-BBox-Detail-001 | Black Box | View complete details | ☐ | |
| TC-BBox-Detail-002 | Black Box | Download certificate | ☐ | |
| TC-BBox-Detail-003 | Black Box | Download profile photo | ☐ | |
| TC-BBox-Detail-004 | Black Box | Approve company | ☐ | |
| TC-BBox-Detail-005 | Black Box | Reject with reason | ☐ | |
| TC-BBox-Detail-006 | Black Box | Reject without reason | ☐ | |
| TC-BBox-Detail-007 | Black Box | Reason max length validation | ☐ | |
| TC-BBox-Detail-008 | Black Box | View verified company details | ☐ | |
| TC-BBox-Detail-009 | Black Box | View rejected company details | ☐ | |
| TC-BBox-Detail-010 | Black Box | Access non-existent company | ☐ | |
| TC-BBox-History-001 | Black Box | View verification history | ☐ | |
| TC-BBox-History-002 | Black Box | History pagination | ☐ | |
| TC-BBox-History-003 | Black Box | Verified company in history | ☐ | |
| TC-BBox-History-004 | Black Box | Rejected company in history | ☐ | |
| TC-BBox-Logout-001 | Black Box | Logout from dashboard | ☐ | |
| TC-BBox-Logout-002 | Black Box | Access protected route after logout | ☐ | |
| **TC-WBox-Login-001** | **White Box** | **Validate request input** | ☐ | |
| TC-WBox-Login-002 | White Box | Config reading | ☐ | |
| TC-WBox-Login-003 | White Box | Credential matching (true) | ☐ | |
| TC-WBox-Login-004 | White Box | Credential matching (false) | ☐ | |
| TC-WBox-Login-005 | White Box | Boolean short-circuit | ☐ | |
| TC-WBox-Dashboard-001 | White Box | Query pending perusahaan | ☐ | |
| TC-WBox-Dashboard-002 | White Box | Query verified count | ☐ | |
| TC-WBox-Dashboard-003 | White Box | Query rejected count | ☐ | |
| TC-WBox-Dashboard-004 | White Box | Query total count | ☐ | |
| TC-WBox-Dashboard-005 | White Box | View data passing | ☐ | |
| TC-WBox-Daftar-001 | White Box | Query builder init | ☐ | |
| TC-WBox-Daftar-002 | White Box | Status filter logic | ☐ | |
| TC-WBox-Daftar-003 | White Box | Search filter logic | ☐ | |
| TC-WBox-Daftar-004 | White Box | Query execution & pagination | ☐ | |
| TC-WBox-Detail-001 | White Box | Find by primary key | ☐ | |
| TC-WBox-Detail-002 | White Box | View rendering | ☐ | |
| TC-WBox-Verifikasi-001 | White Box | Validation rules | ☐ | |
| TC-WBox-Verifikasi-002 | White Box | Find perusahaan | ☐ | |
| TC-WBox-Verifikasi-003 | White Box | Verified branch logic | ☐ | |
| TC-WBox-Verifikasi-004 | White Box | Rejected branch logic | ☐ | |
| TC-WBox-Verifikasi-005 | White Box | Exception handling | ☐ | |
| TC-WBox-History-001 | White Box | Query NOT EQUAL | ☐ | |
| TC-WBox-History-002 | White Box | Latest by specific column | ☐ | |
| TC-WBox-Logout-001 | White Box | Session forget | ☐ | |
| TC-WBox-Logout-002 | White Box | Redirect with message | ☐ | |

### Statistics
- **Total Test Cases**: 57
- **Black Box Tests**: 32
- **White Box Tests**: 25
- **Passed**: ☐
- **Failed**: ☐
- **Skipped**: ☐

---

## Notes untuk Tester

### Checklist Sebelum Testing:
- ☐ Database sudah di-seed dengan test data
- ☐ Laravel development server running (php artisan serve)
- ☐ Browser developer tools opened (untuk check network/console)
- ☐ Test data sudah disiapkan sesuai pre-conditions
- ☐ Admin config sudah ter-setup di config/admin.php
- ☐ Session storage working properly

### Tools yang Dibutuhkan:
- Web Browser (Chrome/Firefox dengan DevTools)
- Database viewer (untuk check data sebelum/sesudah test)
- Text editor (untuk dokumentasi hasil)
- Postman/Insomnia (optional, untuk API testing)

### Best Practices:
1. Jalankan black box tests terlebih dahulu (lebih general)
2. Catat semua error/bug ditemukan dengan screenshot
3. Untuk white box, cek database setelah setiap operation
4. Verifikasi timestamps (verified_at) sudah ter-update
5. Test pada berbagai condition/edge cases
6. Dokumentasikan setiap hasil testing

---

**Document Version**: 1.0  
**Last Updated**: [Date]  
**Test Execution Date**: [Date]  
**Tester Name**: [Name]  
**Status**: Ready for Testing
