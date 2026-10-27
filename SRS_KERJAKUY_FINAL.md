# 📋 SOFTWARE REQUIREMENTS SPECIFICATION (SRS)
## Platform KerjaKuy - Job Recruitment & Matching System

**Versi**: 2.0 | **Tanggal Update**: April 2026 | **Status**: Active Development ✅

---

## 📑 DAFTAR ISI
1. [Pendahuluan](#pendahuluan)
2. [Gambaran Produk](#gambaran-produk)
3. [Fitur & Fungsionalitas](#fitur--fungsionalitas)
4. [Kebutuhan Fungsional](#kebutuhan-fungsional)
5. [Kebutuhan Non-Fungsional](#kebutuhan-non-fungsional)
6. [Sistem & Integrasi](#sistem--integrasi)
7. [Database Schema](#database-schema)

---

## 1. PENDAHULUAN

### 1.1 Tujuan Dokumen
Dokumen ini mendefinisikan spesifikasi kebutuhan perangkat lunak untuk aplikasi **KerjaKuy**, sebuah platform digital untuk menghubungkan pencari kerja dengan perusahaan yang membuka lowongan.

### 1.2 Ruang Lingkup
Sistem mencakup:
- **User Management** untuk 3 tipe pengguna (Pelamar, Perusahaan, Admin)
- **Job Recruitment Workflow** dari pencarian lowongan hingga hiring
- **Admin Verification** untuk validasi perusahaan
- **Interview Scheduling** untuk proses wawancara
- **Profile Management** dengan CV dan keterampilan

### 1.3 Dokumen Referensi
- Database Schema (lihat bagian Database Schema)
- Architecture Documentation
- Dokumentasi Fitur Admin Verifikasi (DOKUMENTASI_FITUR_ADMIN.md)

---

## 2. GAMBARAN PRODUK

### 2.1 Visi Produk
KerjaKuy adalah platform job recruitment online yang memudahkan pencari kerja menemukan pekerjaan impian mereka, sambil memberikan perusahaan akses ke pool talent berkualitas dengan proses verifikasi yang ketat.

### 2.2 Persona Pengguna

#### 👤 **Pelamar (Job Seeker)**
- **Usia**: 18-40 tahun
- **Tujuan**: Mencari pekerjaan sesuai keahlian
- **Kebutuhan**: 
  - Browse lowongan dengan filter
  - Mengirim lamaran
  - Manage CV & skill
  - Jadwal wawancara

#### 🏢 **Perusahaan (Recruiter)**
- **Tipe**: Perusahaan berbagai industri
- **Tujuan**: Merekrut talenta terbaik
- **Kebutuhan**:
  - Post lowongan pekerjaan
  - Review lamaran masuk
  - Jadwal wawancara
  - Manage data karyawan baru

#### 👨‍💼 **Admin (System Administrator)**
- **Tujuan**: Memastikan platform berjalan aman & valid
- **Kebutuhan**:
  - Verifikasi perusahaan baru
  - Monitor statistik
  - Kelola history verifikasi

### 2.3 Ekosistem Platform
```
┌─────────────────────────────────────────────────────┐
│                    KerjaKuy Platform                │
├─────────────────┬──────────────────┬────────────────┤
│   PELAMAR       │   PERUSAHAAN     │     ADMIN      │
├─────────────────┼──────────────────┼────────────────┤
│ • Login/Register│ • Login/Register │ • Login        │
│ • Browse Jobs   │ • Post Lowongan  │ • Dashboard    │
│ • Apply Job    │ • Review Lamaran │ • Verification │
│ • Manage CV    │ • Schedule IW    │ • History      │
│ • Schedule IW  │ • Hire Candidate │ • Statistics   │
└─────────────────┴──────────────────┴────────────────┘
         │                  │                  │
         └──────────────────┴──────────────────┘
              Connected via Database
```

---

## 3. FITUR & FUNGSIONALITAS

### 3.1 FITUR UNTUK PELAMAR (Job Seeker)

#### ✅ 3.1.1 Registrasi Pelamar
**Path**: `POST /register/pelamar`

| Requirement | Detail |
|------------|--------|
| **Input Fields** | Nama lengkap, username, email, no. telepon, password |
| **Validasi** | Email unique, username unique, password min 8 char |
| **Output** | Redirect ke login page dengan pesan sukses |
| **Error Handling** | Show error jika duplikat atau input invalid |
| **Database** | Insert ke tabel `pelamars` |

#### ✅ 3.1.2 Login Pelamar
**Path**: `POST /login/pelamar`

| Requirement | Detail |
|------------|--------|
| **Input Fields** | Username & password |
| **Validasi** | Check di database, verify password |
| **Session** | Set session `pelamar_id`, `pelamar_username`, `pelamar_nama` |
| **Redirect** | `/home-pelamar` (home page) |
| **Failed Login** | Show error message, stay di login page |

#### ✅ 3.1.3 Browse Lowongan Pekerjaan
**Path**: `GET /home-pelamar`

| Requirement | Detail |
|------------|--------|
| **Tujuan** | Menampilkan list lowongan yang tersedia |
| **Data Ditampilkan** | Nama perusahaan, posisi, gaji, lokasi, kategori, gambar |
| **Filters** | Kategori, lokasi (provinsi/kabupaten), rentang gaji |
| **Search** | Pencarian berdasarkan posisi atau perusahaan |
| **Pagination** | 10-20 items per halaman |
| **Peringatan** | Hanya tampilkan lowongan dari perusahaan verified |
| **Action** | Click untuk lihat detail & kirim lamaran |

#### ✅ 3.1.4 Lihat Detail Lowongan
**Path**: `GET /lowongan/{id}`

| Requirement | Detail |
|------------|--------|
| **Data Ditampilkan** | Posisi, gaji, deskripsi, syarat, durasi, lokasi detail, foto perusahaan |
| **Button** | "Kirim Lamaran" (jika belum apply di lowongan ini) |
| **Kondisi** | Jika sudah apply, tampilkan "Status Lamaran: [status]" |
| **Syarat** | User harus login, pelamar bisa akses |

#### ✅ 3.1.5 Kirim Lamaran (Apply Job)
**Path**: `POST /lamaran/insert`

| Requirement | Detail |
|------------|--------|
| **Input** | Pilih CV yang ingin dikrim |
| **Validasi** | User harus punya minimal 1 CV |
| **Proses** | Insert ke tabel `lamarans` dengan status `diproses` |
| **Output** | Redirect ke `/lamaran-anda` dengan pesan sukses |
| **Database** | Create record: pelamar_id, lowongan_id, cv_id, status=diproses |
| **Timestamp** | created_at otomatis |

#### ✅ 3.1.6 Lihat Status Lamaran Saya
**Path**: `GET /lamaran-anda`

| Requirement | Detail |
|------------|--------|
| **Data Ditampilkan** | List lamaran: nama perusahaan, posisi, status, tanggal apply |
| **Status Options** | diproses, diterima, ditolak, wawancara |
| **Filter** | By status, by date |
| **Action** | Click untuk detail lamaran & lihat feedback |
| **Pagination** | 10 items per halaman |

#### ✅ 3.1.7 Manage CV
**Path**: `GET /pelamar/cv`

| Requirement | Detail |
|------------|--------|
| **View CV** | List semua CV pelamar dengan preview |
| **Field CV** | Umur, tentang saya, kontak, title, subtitle |
| **Sub-sections** | Pendidikan, Pengalaman, Skills |
| **Actions** | Create, Edit, Delete CV |
| **Validasi** | Minimal 1 CV untuk bisa apply |

**Create/Edit CV Sub-sections**:
- **Pendidikan**: Tingkat, universitas, jurusan
- **Pengalaman**: Nama pekerjaan, durasi
- **Skills**: Skill, level kemampuan (Junior/Senior/Expert)

#### ✅ 3.1.8 Manage Keahlian (Skills)
**Path**: `GET /pelamar/keahlian` (atau integrated dengan CV)

| Requirement | Detail |
|------------|--------|
| **Data** | List keahlian independent dari CV |
| **Fields** | Nama keahlian, deskripsi, tingkat kemampuan |
| **Actions** | Add, Edit, Delete keahlian |
| **Tujuan** | Bisa digunakan di CV atau profile pelamar |

#### ✅ 3.1.9 Update Profile Pelamar
**Path**: `GET /pelamar/setting` & `POST /pelamar/setting/update`

| Requirement | Detail |
|------------|--------|
| **Edit Fields** | Nama lengkap, email, no. telepon, foto profil |
| **Foto** | Upload & preview, format JPG/PNG |
| **Validasi** | Email unique (exclude current), phone format |
| **Save** | Update ke tabel pelamars |
| **Feedback** | Pesan sukses/error |

#### ✅ 3.1.10 Update Password Pelamar
**Path**: `POST /pelamar/update-password`

| Requirement | Detail |
|------------|--------|
| **Input** | Current password, new password, confirm password |
| **Validasi** | Current password match, new password min 8 char |
| **Proses** | Hash password baru, update di database |
| **Feedback** | Pesan sukses/error |

#### ✅ 3.1.11 Jadwal Wawancara
**Path**: `GET /pelamar/wawancara`

| Requirement | Detail |
|------------|--------|
| **Menampilkan** | Daftar jadwal wawancara untuk pelamar |
| **Info** | Perusahaan, posisi, tanggal, jam, link meet |
| **Filter** | By date, by company, by status |
| **Status** | Scheduled, Completed, Cancelled |
| **Link** | Klik link untuk join meeting (Google Meet/Zoom) |

#### ✅ 3.1.12 Logout Pelamar
**Path**: `POST /pelamar/logout`

| Requirement | Detail |
|------------|--------|
| **Proses** | Hapus session pelamar |
| **Redirect** | `/login/pelamar` dengan pesan "Logout sukses" |

#### ✅ 3.1.13 Hapus Akun (Optional)
**Path**: `DELETE /pelamar/hapus-akun`

| Requirement | Detail |
|------------|--------|
| **Konfirmasi** | Tampilkan modal warning sebelum delete |
| **Proses** | Soft delete atau hard delete sesuai policy |
| **Data** | Delete pelamar + relasi (CV, keahlian, lamaran) |
| **Feedback** | Redirect ke home dengan pesan akun deleted |

---

### 3.2 FITUR UNTUK PERUSAHAAN (Recruiter)

#### ✅ 3.2.1 Registrasi Perusahaan
**Path**: `POST /register/perusahaan`

| Requirement | Detail |
|------------|--------|
| **Input Fields** | Nama perusahaan, email, password, telepon, alamat, NPWP, sertifikat (file) |
| **Validasi** | Email unique, NPWP format, file format (PDF/image) |
| **Status Default** | `pending` (tunggu verifikasi admin) |
| **Output** | Redirect ke login dengan pesan "Tunggu verifikasi admin" |
| **Upload** | Simpan sertifikat ke `/storage/perusahaan_docs/` |

#### ✅ 3.2.2 Login Perusahaan
**Path**: `POST /login/perusahaan`

| Requirement | Detail |
|------------|--------|
| **Input Fields** | Email & password |
| **Validasi** | Check credentials + check status_verifikasi |
| **Status Verified** | Login allowed, set session `perusahaan_id`, `perusahaan_nama` |
| **Status Pending** | Show error "Tunggu verifikasi dari admin sebelum login" |
| **Status Rejected** | Show error dengan alasan penolakan dari admin |

#### ✅ 3.2.3 Post Lowongan Pekerjaan
**Path**: `POST /lowongan/tambah`

| Requirement | Detail |
|------------|--------|
| **Input Fields** | Kategori, posisi, jenis pekerjaan, gaji, deskripsi, syarat, lokasi (provinsi/kabupaten/kecamatan), tanggal mulai, tanggal berakhir, gambar |
| **Validasi** | Semua field required, gaji numeric, file image |
| **Proses** | Insert ke tabel lowongans dengan perusahaan_id |
| **Upload** | Simpan gambar ke `/storage/lowongan_images/` |
| **Default Status** | `active` |
| **Output** | Redirect ke home-perusahaan dengan pesan sukses |

#### ✅ 3.2.4 Lihat & Edit Lowongan Saya
**Path**: `GET /home-perusahaan` & `GET /lowongan/edit/{id}` & `PUT /lowongan/update/{id}`

| Requirement | Detail |
|------------|--------|
| **List Lowongan** | Tampilkan semua lowongan milik perusahaan |
| **Info Per Lowongan** | Posisi, gaji, status, jumlah lamaran, tanggal posting |
| **Actions** | View detail, Edit, Delete, View Applicants |
| **Edit Fields** | Bisa update semua field kecuali perusahaan_id |
| **Delete** | Soft delete atau hard delete sesuai policy |

#### ✅ 3.2.5 Lihat Lamaran Masuk
**Path**: `GET /lowongan/detail/{id}`

| Requirement | Detail |
|------------|--------|
| **Data Ditampilkan** | List pelamar yang apply: nama, foto, posisi terakhir, keahlian utama |
| **Status Lamaran** | diproses, diterima, ditolak, wawancara |
| **Filter** | By status |
| **Action** | Click untuk lihat detail pelamar + CV |
| **Count** | Jumlah lamaran pending di title/badge |

#### ✅ 3.2.6 Lihat Detail Pelamar & CV
**Path**: `GET /pelamar/{id}` (dalam konteks review lamaran)

| Requirement | Detail |
|------------|--------|
| **Data Pelamar** | Nama, foto, email, no. telepon, tentang, keahlian |
| **Data CV** | Pendidikan, pengalaman, skills |
| **Action** | Accept, Reject, Jadwal Wawancara |

#### ✅ 3.2.7 Tolak Lamaran
**Path**: `POST /lowongan/lamaran/{id}/tolak`

| Requirement | Detail |
|------------|--------|
| **Input** | Alasan penolakan (optional) |
| **Proses** | Update status lamaran = `ditolak`, simpan alasan |
| **Notifikasi** | Optional: email ke pelamar |
| **Output** | Back ke list lamaran dengan pesan sukses |

#### ✅ 3.2.8 Terima Lamaran
**Path**: `POST /lamaran/terima/{id}`

| Requirement | Detail |
|------------|--------|
| **Proses** | Update status lamaran = `diterima` |
| **Next Step** | Show option untuk jadwal wawancara |
| **Output** | Redirect dengan pesan sukses |

#### ✅ 3.2.9 Jadwal Wawancara
**Path**: `POST /lowongan/lamaran/{id}/jadwal-wawancara`

| Requirement | Detail |
|------------|--------|
| **Input Fields** | Tanggal, jam mulai, jam selesai, link meet (Google Meet/Zoom), pesan untuk pelamar |
| **Validasi** | Tanggal harus > hari ini, jam valid, link format |
| **Proses** | Create record di tabel wawancaras, update status lamaran = `wawancara` |
| **Database** | Insert: pelamar_id, perusahaan_id, lowongan_id, tanggal, jam_mulai, jam_selesai, link_meet, pesan |
| **Notifikasi** | Optional: email/SMS ke pelamar dengan detail jadwal |

#### ✅ 3.2.10 Lihat Jadwal Wawancara
**Path**: `GET /perusahaan/wawancara`

| Requirement | Detail |
|------------|--------|
| **Data Ditampilkan** | List wawancara yang dijadwalkan: pelamar, posisi, tanggal, jam, status |
| **Status** | Scheduled, Completed, Cancelled |
| **Action** | View detail, mark as completed, tolak, lihat hasil |
| **Filter** | By date, by pelamar, by status |

#### ✅ 3.2.11 Terima Hasil Wawancara (Hire)
**Path**: `POST /perusahaan/wawancara/{id}/terima`

| Requirement | Detail |
|------------|--------|
| **Proses** | Update status wawancara = `accepted`, create record di tabel karyawans |
| **Database** | Insert ke karyawans: pelamar_id, lowongan_id, perusahaan_id, kategori, posisi, tanggal_mulai, status_karyawan |
| **Output** | Redirect dengan pesan "Pelamar resmi dipekerjakan" |
| **Notifikasi** | Optional: email ke pelamar |

#### ✅ 3.2.12 Tolak Hasil Wawancara
**Path**: `POST /perusahaan/wawancara/{id}/tolak`

| Requirement | Detail |
|------------|--------|
| **Input** | Alasan penolakan (optional) |
| **Proses** | Update status wawancara = `rejected`, simpan alasan |
| **Output** | Back ke list wawancara |

#### ✅ 3.2.13 Update Profile Perusahaan
**Path**: `GET /perusahaan/pengaturan` & `POST /perusahaan/pengaturan/update-foto`

| Requirement | Detail |
|------------|--------|
| **Edit Fields** | Nama perusahaan, email, telepon, alamat (read-only: NPWP) |
| **Foto Profil** | Upload & preview, format JPG/PNG |
| **Validasi** | Email unique, phone format |
| **Save** | Update ke tabel perusahaans |

#### ✅ 3.2.14 Logout Perusahaan
**Path**: `POST /perusahaan/logout`

| Requirement | Detail |
|------------|--------|
| **Proses** | Hapus session perusahaan |
| **Redirect** | `/login/perusahaan` dengan pesan sukses |

---

### 3.3 FITUR UNTUK ADMIN (System Administrator)

#### ✅ 3.3.1 Login Admin
**Path**: `GET /admin/login` & `POST /admin/login`

| Requirement | Detail |
|------------|--------|
| **Form** | Email & password |
| **Credentials Default** | Email: `admin@kerjakuy.com`, Password: `admin123` |
| **Validasi** | Check credentials, jika benar set session `admin_id` |
| **Redirect** | `/admin/dashboard` jika berhasil |
| **Error** | Show error jika gagal |
| **Config** | Credentials bisa diubah di `.env` atau `config/admin.php` |

#### ✅ 3.3.2 Dashboard Admin
**Path**: `GET /admin/dashboard`

| Requirement | Detail |
|------------|--------|
| **Statistik Cards** | Total Perusahaan, Menunggu Verifikasi, Terverifikasi, Ditolak |
| **Chart Optional** | Grafik verifikasi per bulan, pie chart status |
| **Table** | List perusahaan menunggu verifikasi (pagination 10/page) |
| **Info Per Row** | Nama, email, telepon, tanggal daftar, action (view detail) |
| **Count** | Real-time count dari database |

#### ✅ 3.3.3 Daftar Semua Perusahaan
**Path**: `GET /admin/daftar-perusahaan`

| Requirement | Detail |
|------------|--------|
| **View** | List semua perusahaan dengan status |
| **Info Per Row** | Nama, email, NPWP, status, tanggal daftar, action |
| **Search** | By nama perusahaan atau email |
| **Filter Status** | Semua / Menunggu / Terverifikasi / Ditolak |
| **Action** | Click untuk lihat detail & verifikasi |
| **Pagination** | 15 items per halaman |
| **Sort** | By tanggal daftar (terbaru duluan) |

#### ✅ 3.3.4 Detail & Verifikasi Perusahaan
**Path**: `GET /admin/detail-perusahaan/{id}` & `POST /admin/verifikasi-perusahaan/{id}`

| Requirement | Detail |
|------------|--------|
| **Data Ditampilkan** | Nama, email, telepon, NPWP, alamat, tanggal daftar, foto profil, dokumen (sertifikat) |
| **Download Dokumen** | Klik untuk download sertifikat |
| **Status** | Tampilkan status verifikasi saat ini |
| **Form Verifikasi** | Hanya jika status = `pending` |
| **Action Buttons** | **Verifikasi (Approve)** - Terima, **Tolak** - Dengan alasan mandatory |
| **Verifikasi Proses** | Update status = `verified`, set verified_by = admin_id, verified_at = now |
| **Tolak Proses** | Update status = `rejected`, set alasan_penolakan, verified_by, verified_at |
| **Notifikasi** | Optional: email ke perusahaan |

#### ✅ 3.3.5 History Verifikasi
**Path**: `GET /admin/history-verifikasi`

| Requirement | Detail |
|------------|--------|
| **Data Ditampilkan** | List semua perusahaan yang sudah diverifikasi (approved/rejected) |
| **Info Per Row** | Nama, email, status (verified/rejected), tanggal verifikasi, alasan (jika rejected), verified_by (admin name) |
| **Filter** | By status, by tanggal |
| **Pagination** | 20 items per halaman |
| **Sort** | By tanggal verifikasi (terbaru duluan) |
| **Search** | By nama perusahaan |

#### ✅ 3.3.6 Logout Admin
**Path**: `POST /admin/logout`

| Requirement | Detail |
|------------|--------|
| **Proses** | Hapus session admin |
| **Redirect** | `/admin/login` dengan pesan sukses |

---

## 4. KEBUTUHAN FUNGSIONAL

### 4.1 Authentication & Authorization

#### F4.1.1 Session Management
- **Requirement**: Aplikasi support 3 jenis session simultan (pelamar, perusahaan, admin)
- **Implementation**: Session-based, stored di server
- **Session Variables**: 
  - Pelamar: `pelamar_id`, `pelamar_username`, `pelamar_nama`
  - Perusahaan: `perusahaan_id`, `perusahaan_nama`
  - Admin: `admin_id`
- **Timeout**: 24 jam atau configurable
- **CSRF Protection**: Laravel CSRF token di semua forms

#### F4.1.2 Password Security
- **Hashing**: Menggunakan `Hash::make()` (bcrypt)
- **Minimum Length**: 8 karakter
- **Complexity**: Optional (huruf besar, angka, simbol)
- **Update Password**: Require current password verification

#### F4.1.3 Email Verification
- **Requirement**: Optional, untuk masa depan
- **Current**: Email unique constraint saja

#### F4.1.4 Authorization Middleware
- **AdminMiddleware**: Proteksi semua `/admin/*` routes
- **PelamarMiddleware**: Proteksi routes pelamar (optional)
- **PerusahaanMiddleware**: Check status verified sebelum allow login

### 4.2 Business Logic

#### F4.2.1 Recruitment Workflow
```
1. Perusahaan Register → Status PENDING
2. Admin Verifikasi → Status VERIFIED atau REJECTED
3. Perusahaan Login (hanya jika VERIFIED)
4. Perusahaan Post Lowongan
5. Pelamar Browse & Apply
6. Perusahaan Review Lamaran
7. Jadwal Wawancara
8. Hasil Wawancara
9. Hire Candidate (Create Karyawan record)
```

#### F4.2.2 Lamaran Status Flow
```
DIPROSES → (Diterima → WAWANCARA → (Diterima/Ditolak)) OR DITOLAK
```

#### F4.2.3 Verifikasi Perusahaan Status
```
PENDING → (VERIFIED atau REJECTED)
```

#### F4.2.4 Unique Constraints
- Email pelamar unique
- Email perusahaan unique
- Username pelamar unique
- NPWP perusahaan unique

#### F4.2.5 Data Integrity
- Cascade delete untuk relasi (perusahaan delete → lowongan delete)
- Soft delete optional untuk audit trail
- Timestamp tracking (created_at, updated_at)

### 4.3 File Handling

#### F4.3.1 Upload File Types
| Jenis | Size Limit | Format | Storage |
|-------|-----------|--------|---------|
| CV | 5 MB | PDF | `/storage/cv/` |
| Foto Profil (Pelamar/Perusahaan) | 2 MB | JPG, PNG | `/storage/profiles/` |
| Sertifikat Perusahaan | 5 MB | PDF, JPG, PNG | `/storage/perusahaan_docs/` |
| Gambar Lowongan | 3 MB | JPG, PNG | `/storage/lowongan_images/` |

#### F4.3.2 File Validation
- MIME type check
- File size check
- Virus scan optional

#### F4.3.3 Download/View Files
- Authenticated users hanya bisa download milik sendiri
- Admin bisa download sertifikat untuk verifikasi

### 4.4 Notification

#### F4.4.1 In-App Notification
- Toast messages untuk success/error
- Modal untuk confirmasi action penting

#### F4.4.2 Email Notification (Optional/Future)
- Perusahaan verifikasi → email confirmation
- Jadwal wawancara → email ke pelamar
- Lamaran status change → email notification

#### F4.4.3 SMS Notification (Optional/Future)
- Jadwal wawancara → SMS reminder
- Account activation → SMS

### 4.5 Search & Filter

#### F4.5.1 Search Lowongan
- By posisi, perusahaan, keyword deskripsi
- Real-time search dengan debounce

#### F4.5.2 Filter Lowongan
- By kategori pekerjaan
- By lokasi (provinsi, kabupaten)
- By rentang gaji
- By jenis pekerjaan (full-time, part-time, dll)

#### F4.5.3 Search Perusahaan (Admin)
- By nama perusahaan
- By email

#### F4.5.4 Filter Perusahaan (Admin)
- By status verifikasi

### 4.6 Pagination & Performance
- **Pagination Size**: 10-20 items per halaman
- **Query Optimization**: Eager loading dengan `with()`, indexing database
- **Caching**: Optional untuk data statis

---

## 5. KEBUTUHAN NON-FUNGSIONAL

### 5.1 Performance

#### 5.1.1 Response Time
- Homepage load time: < 3 detik
- List page load time: < 2 detik
- Detail page load time: < 1.5 detik
- Form submission: < 1 detik

#### 5.1.2 Database Optimization
- Indexing pada kolom frequently searched
- Pagination mandatory untuk list > 100 records
- Query optimization dengan eager loading

#### 5.1.3 Caching Strategy
- Cache list lowongan: 1 jam
- Cache statistics admin: 15 menit
- Cache static assets: 30 hari

### 5.2 Security

#### 5.2.1 Data Protection
- Password hashing dengan bcrypt
- CSRF protection di semua forms
- SQL injection prevention (use ORM/parameterized queries)
- XSS prevention (escape output, sanitize input)

#### 5.2.2 Access Control
- Role-based access (Pelamar, Perusahaan, Admin)
- Middleware untuk route protection
- Own data access (user hanya bisa akses data milik sendiri)

#### 5.2.3 SSL/TLS
- HTTPS untuk production
- Certificate dari trusted provider

#### 5.2.4 Data Privacy
- Encrypt sensitive data (password, dokumen)
- GDPR compliance optional

### 5.3 Reliability

#### 5.3.1 Availability
- Uptime target: 99.5%
- Backup database: Daily
- Disaster recovery plan

#### 5.3.2 Error Handling
- Custom error pages (400, 403, 404, 500)
- Error logging & monitoring
- User-friendly error messages

#### 5.3.3 Data Consistency
- Transaction support untuk critical operations
- Referential integrity dengan foreign keys

### 5.4 Maintainability

#### 5.4.1 Code Quality
- Follow Laravel conventions
- Proper indentation & naming
- Code documentation (comments & docblocks)
- Unit testing (PHPUnit)

#### 5.4.2 Logging
- Application logs: `/storage/logs/`
- Log levels: debug, info, warning, error, critical
- Daily log rotation

#### 5.4.3 Database Versioning
- Migrations untuk schema changes
- Seeders untuk testing data

### 5.5 Scalability

#### 5.5.1 Horizontal Scaling
- Stateless application design
- Load balancing ready
- Separate session storage (Redis/Memcached) optional

#### 5.5.2 Vertical Scaling
- Query optimization untuk large datasets
- Caching strategy
- Database replication optional

### 5.6 Usability

#### 5.6.1 User Interface
- Responsive design (Mobile, Tablet, Desktop)
- Intuitive navigation
- Consistent branding & styling

#### 5.6.2 Accessibility
- WCAG 2.1 Level AA compliance
- Keyboard navigation support
- Screen reader support

#### 5.6.3 Internationalization
- Language support: Bahasa Indonesia, English (optional)
- Date/time localization

### 5.7 Compatibility

#### 5.7.1 Browser Compatibility
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

#### 5.7.2 Device Compatibility
- Desktop (Windows, Mac, Linux)
- Mobile (iOS, Android)
- Tablet

---

## 6. SISTEM & INTEGRASI

### 6.1 Technology Stack

#### Backend
- **Framework**: Laravel 11.x
- **Language**: PHP 8.1+
- **Database**: MySQL 8.0+
- **Cache**: Redis/Memcached (optional)

#### Frontend
- **HTML/CSS**: Bootstrap 5
- **JavaScript**: Vue.js / jQuery (as needed)
- **Build Tool**: Vite

#### External Services
- **Email**: SMTP (Gmail, Mailgun, etc) - optional
- **File Storage**: Local storage, AWS S3 optional
- **Video Meeting**: Google Meet, Zoom API - optional

### 6.2 Node.js Integration

#### Node Auth Server
**Port**: localhost:3001

**Endpoints**:
- `POST /login-pelamar` - Authenticate pelamar
- `POST /log-wawancara` - Log interview schedule

**Usage**: 
- Called dari laravel controller untuk additional authentication
- Logging untuk audit trail wawancara

**Requirements**:
- Node.js 16+
- Must be running when application starts
- Located di folder `/node-auth/`

### 6.3 Third-party Integration (Optional)

#### 6.3.1 Email Service
- **SMTP Configuration**: `.env` variables
- **Provider**: Gmail, Mailgun, SendGrid, AWS SES

#### 6.3.2 File Storage
- **Local**: `/storage/app/` (default)
- **S3**: AWS S3 bucket configuration
- **Azure**: Azure Blob Storage configuration

#### 6.3.3 Payment Gateway (Optional)
- **Purpose**: Jika ada premium features
- **Provider**: Midtrans, Stripe, etc

### 6.4 API Endpoints (Summary)

#### Public Endpoints
```
GET  /                              Home page
GET  /lamar                        Halaman lamar
GET  /register/pelamar             Register form
GET  /register/perusahaan          Register form
GET  /login/pelamar                Login form
GET  /login/perusahaan             Login form
GET  /admin/login                  Admin login form
```

#### Pelamar Endpoints (Session: pelamar_id)
```
POST /register/pelamar             Register
POST /login/pelamar                Login
GET  /home-pelamar                 Browse lowongan
GET  /lowongan/{id}                Detail lowongan
POST /lamaran/insert               Kirim lamaran
GET  /lamaran-anda                 Lihat lamaran saya
GET  /pelamar/cv                   Manage CV
POST /pelamar/cv/store             Create CV
PUT  /pelamar/cv/{id}/update       Edit CV
DELETE /pelamar/cv/{id}            Delete CV
GET  /pelamar/keahlian             Manage keahlian
POST /pelamar/keahlian/store       Add keahlian
PUT  /pelamar/keahlian/{id}/update Edit keahlian
DELETE /pelamar/keahlian/{id}      Delete keahlian
GET  /pelamar/setting              Profile settings
POST /pelamar/setting/update       Update profile
POST /pelamar/update-password      Update password
GET  /pelamar/wawancara            Jadwal wawancara
POST /pelamar/logout               Logout
DELETE /pelamar/hapus-akun         Delete account
```

#### Perusahaan Endpoints (Session: perusahaan_id)
```
POST /register/perusahaan          Register
POST /login/perusahaan             Login
GET  /home-perusahaan              List lowongan saya
POST /lowongan/tambah              Create lowongan
GET  /lowongan/edit/{id}           Edit form
PUT  /lowongan/update/{id}         Update lowongan
DELETE /lowongan/{id}              Delete lowongan
GET  /lowongan/detail/{id}         Detail lowongan & lamaran
POST /lowongan/lamaran/{id}/tolak  Reject lamaran
POST /lowongan/lamaran/{id}/jadwal-wawancara  Jadwal wawancara
POST /lamaran/terima/{id}          Accept lamaran
GET  /perusahaan/pengaturan        Settings
POST /perusahaan/pengaturan/update-foto Update foto
GET  /perusahaan/wawancara         Jadwal wawancara
POST /perusahaan/wawancara/{id}/terima      Accept & hire
POST /perusahaan/wawancara/{id}/tolak       Reject
POST /perusahaan/logout            Logout
```

#### Admin Endpoints (Protected: AdminMiddleware)
```
GET  /admin/login                  Login form
POST /admin/login                  Login
GET  /admin/dashboard              Dashboard
GET  /admin/daftar-perusahaan      List perusahaan
GET  /admin/detail-perusahaan/{id} Detail & verifikasi
POST /admin/verifikasi-perusahaan/{id}     Approve/Reject
GET  /admin/history-verifikasi     History
POST /admin/logout                 Logout
```

---

## 7. DATABASE SCHEMA

### 7.1 Tabel & Kolom

#### pelamars
```sql
id (PK)
nama_lengkap (string)
username (string, unique)
email (string, unique)
no_telp (string)
password (string, hashed)
foto_profil (string, nullable)
created_at, updated_at
```

#### perusahaans
```sql
id (PK)
nama_perusahaan (string)
email (string, unique)
password (string, hashed)
telepon (string)
alamat (text)
npwp (string, unique)
sertifikat (string, nullable)
foto_profil (string, nullable)
status_verifikasi (enum: pending, verified, rejected) DEFAULT pending
alasan_penolakan (text, nullable)
verified_by (bigint, FK→users.id, nullable)
verified_at (timestamp, nullable)
created_at, updated_at
```

#### lowongans
```sql
id (PK)
perusahaan_id (FK→perusahaans.id)
kategori_pekerjaan (string)
posisi_pekerjaan (string)
jenis_pekerjaan (string) -- full-time, part-time, etc
gaji (integer)
deskripsi (text)
syarat (text)
lokasi_provinsi (string)
lokasi_kabupaten (string)
lokasi_kecamatan (string)
tanggal_mulai (date)
tanggal_berakhir (date)
gambar (string, nullable)
created_at, updated_at
```

#### lamarans
```sql
id (PK)
pelamar_id (FK→pelamars.id)
lowongan_id (FK→lowongans.id)
cv_id (FK→cvs.id)
status (enum: diproses, diterima, ditolak, wawancara) DEFAULT diproses
created_at, updated_at
```

#### wawancaras
```sql
id (PK)
pelamar_id (FK→pelamars.id)
perusahaan_id (FK→perusahaans.id)
lowongan_id (FK→lowongans.id)
status (enum: scheduled, completed, cancelled, rejected) DEFAULT scheduled
tanggal (date)
jam_mulai (time)
jam_selesai (time)
link_meet (string)
pesan (text, nullable)
created_at, updated_at
```

#### karyawans
```sql
id (PK)
pelamar_id (FK→pelamars.id)
lowongan_id (FK→lowongans.id)
perusahaan_id (FK→perusahaans.id)
kategori_pekerjaan (string)
posisi_pekerjaan (string)
tanggal_mulai (date)
status_karyawan (enum: active, inactive) DEFAULT active
created_at, updated_at
```

#### cvs
```sql
id (PK)
pelamar_id (FK→pelamars.id)
umur (integer)
tentang_saya (text)
kontak (string)
title (string)
subtitle (string)
created_at, updated_at
```

#### skill_cvs
```sql
id (PK)
cv_id (FK→cvs.id)
skill (string)
kemampuan (enum: junior, mid, senior) DEFAULT mid
created_at, updated_at
```

#### pengalamen
```sql
id (PK)
cv_id (FK→cvs.id)
pengalaman (string)
durasi (string) -- "2 tahun", "1.5 tahun", etc
created_at, updated_at
```

#### pendidikans
```sql
id (PK)
cv_id (FK→cvs.id)
tingkat (enum: SMA, D3, S1, S2, S3)
universitas (string)
jurusan (string)
created_at, updated_at
```

#### keahlians
```sql
id (PK)
pelamar_id (FK→pelamars.id)
nama_keahlian (string)
deskripsi (text, nullable)
tingkat_kemampuan (enum: junior, mid, senior) DEFAULT mid
created_at, updated_at
```

#### users
```sql
id (PK)
name (string)
email (string, unique)
password (string)
created_at, updated_at
```

### 7.2 Relasi Diagram

```
Perusahaan (1) ──[onDelete: cascade]──> (N) Lowongan
Lowongan (1) ──[onDelete: cascade]──> (N) Lamaran
Pelamar (1) ──[onDelete: cascade]──> (N) Lamaran
Pelamar (1) ──[onDelete: cascade]──> (N) CV
CV (1) ──[onDelete: cascade]──> (N) Pendidikan
CV (1) ──[onDelete: cascade]──> (N) SkillCV
CV (1) ──[onDelete: cascade]──> (N) Pengalaman
Lamaran (1) ──[onDelete: cascade]──> (N) Wawancara
Pelamar (1) ──[onDelete: cascade]──> (N) Wawancara
Perusahaan (1) ──[onDelete: cascade]──> (N) Wawancara
Pelamar (1) ──[onDelete: cascade]──> (N) Keahlian
Pelamar (1) ──[onDelete: cascade]──> (N) Karyawan
Lowongan (1) ──[onDelete: cascade]──> (N) Karyawan
Perusahaan (1) ──[onDelete: cascade]──> (N) Karyawan
```

### 7.3 Indexes (Recommended)

```sql
-- Pelamars
CREATE INDEX idx_pelamars_username ON pelamars(username);
CREATE INDEX idx_pelamars_email ON pelamars(email);

-- Perusahaans
CREATE INDEX idx_perusahaans_email ON perusahaans(email);
CREATE INDEX idx_perusahaans_status_verifikasi ON perusahaans(status_verifikasi);
CREATE INDEX idx_perusahaans_created_at ON perusahaans(created_at);

-- Lowongans
CREATE INDEX idx_lowongans_perusahaan_id ON lowongans(perusahaan_id);
CREATE INDEX idx_lowongans_kategori ON lowongans(kategori_pekerjaan);
CREATE INDEX idx_lowongans_lokasi ON lowongans(lokasi_provinsi, lokasi_kabupaten);
CREATE INDEX idx_lowongans_tanggal_berakhir ON lowongans(tanggal_berakhir);

-- Lamarans
CREATE INDEX idx_lamarans_pelamar_id ON lamarans(pelamar_id);
CREATE INDEX idx_lamarans_lowongan_id ON lamarans(lowongan_id);
CREATE INDEX idx_lamarans_status ON lamarans(status);
CREATE INDEX idx_lamarans_created_at ON lamarans(created_at);

-- Wawancaras
CREATE INDEX idx_wawancaras_pelamar_id ON wawancaras(pelamar_id);
CREATE INDEX idx_wawancaras_perusahaan_id ON wawancaras(perusahaan_id);
CREATE INDEX idx_wawancaras_tanggal ON wawancaras(tanggal);
CREATE INDEX idx_wawancaras_status ON wawancaras(status);

-- CVs
CREATE INDEX idx_cvs_pelamar_id ON cvs(pelamar_id);

-- Keahlians
CREATE INDEX idx_keahlians_pelamar_id ON keahlians(pelamar_id);
```

---

## 8. TESTING STRATEGY

### 8.1 Unit Testing
- Test model methods
- Test validation rules
- Test business logic

### 8.2 Feature Testing
- Test controller actions
- Test complete workflows
- Test edge cases

### 8.3 Test Cases Examples
```php
// Auth Testing
- test_pelamar_can_register()
- test_pelamar_cannot_login_with_wrong_password()
- test_perusahaan_pending_cannot_login()

// Job Posting Testing
- test_perusahaan_verified_can_post_lowongan()
- test_lowongan_appears_in_pelamar_list()
- test_pelamar_can_apply_lowongan()

// Interview Testing
- test_perusahaan_can_schedule_wawancara()
- test_pelamar_sees_scheduled_wawancara()
- test_perusahaan_can_hire_after_wawancara()

// Admin Testing
- test_admin_can_verify_perusahaan()
- test_admin_dashboard_shows_statistics()
- test_rejected_perusahaan_cannot_login()
```

### 8.4 Test Coverage Target
- Minimum 70% code coverage
- 100% coverage untuk critical paths (auth, verification, hiring)

---

## 9. DEPLOYMENT

### 9.1 Environment
- **Development**: localhost:8000
- **Staging**: staging.kerjakuy.com
- **Production**: kerjakuy.com

### 9.2 Requirements
- PHP 8.1+
- MySQL 8.0+
- Node.js 16+ (untuk /node-auth server)
- Composer
- npm/yarn

### 9.3 Installation Steps
```bash
# 1. Clone repository
git clone <repo>

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure database
# Edit .env dengan database credentials

# 5. Run migrations
php artisan migrate

# 6. Seed data (optional)
php artisan db:seed

# 7. Start Node auth server
cd node-auth && npm start

# 8. Start Laravel development server
php artisan serve
```

### 9.4 Production Checklist
- [ ] Set `APP_DEBUG=false` di .env
- [ ] Set `APP_ENV=production`
- [ ] Configure proper database backups
- [ ] Setup SSL certificate
- [ ] Configure email service
- [ ] Setup file storage (S3 atau local)
- [ ] Configure session storage (Redis/Memcached)
- [ ] Setup logging & monitoring
- [ ] Create admin user
- [ ] Test complete workflow

---

## 10. APPENDIX

### 10.1 Configuration Files
- `.env` - Environment variables
- `config/app.php` - Application config
- `config/database.php` - Database config
- `config/auth.php` - Authentication config
- `config/admin.php` - Admin credentials

### 10.2 Documentation References
- [Laravel Documentation](https://laravel.com/docs)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Bootstrap Documentation](https://getbootstrap.com/docs)

### 10.3 Glossary

| Term | Definisi |
|------|----------|
| Pelamar | Job seeker/pencari kerja |
| Perusahaan | Employer/pemberi kerja |
| Lowongan | Job posting |
| Lamaran | Application/apply |
| Wawancara | Interview |
| Karyawan | Employee (after hired) |
| Verifikasi | Verification process for company |
| Keahlian | Skills/expertise |
| CV | Curriculum Vitae |

### 10.4 Version History

| Versi | Tanggal | Perubahan | Status |
|-------|---------|----------|--------|
| 1.0 | - | Initial version | Archived |
| 2.0 | April 2026 | Sesuai implementasi kode actual, tambah fitur admin verifikasi, struktur db lengkap | ✅ Current |

---

**Document Owner**: Development Team  
**Last Updated**: April 30, 2026  
**Next Review**: August 2026

---

