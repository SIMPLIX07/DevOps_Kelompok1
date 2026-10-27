# 🔲 BLACK BOX TESTING - ADMIN VERIFICATION SYSTEM

## Format Kolom:
1. **Test Case ID**: Identifier unik untuk setiap test
2. **Description**: Deskripsi singkat tujuan test
3. **Test Data**: Data input yang digunakan
4. **Test Step**: Langkah-langkah eksekusi
5. **Expected Result**: Hasil yang diharapkan
6. **Actual Result**: Hasil sebenarnya (diisi saat testing)

---

## 1. LOGIN ADMIN TESTING

### TC-BBox-001: Login dengan Kredensial Valid

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-001 |
| **Description** | Admin dapat login dengan email dan password yang benar |
| **Test Data** | Email: admin@kerjakuy.com<br/>Password: admin123 |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Input email: admin@kerjakuy.com<br/>3. Input password: admin123<br/>4. Click tombol "Login"<br/>5. Observe hasil |
| **Expected Result** | ✓ Login berhasil<br/>✓ Session created (admin_id='admin', admin_email='admin@kerjakuy.com')<br/>✓ Redirect ke /admin/dashboard<br/>✓ Success message: "Login berhasil" tampil |
| **Actual Result** | [ ] |

---

### TC-BBox-002: Login dengan Email Salah

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-002 |
| **Description** | Login ditolak jika email tidak cocok dengan config |
| **Test Data** | Email: wrong@kerjakuy.com<br/>Password: admin123 |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Input email: wrong@kerjakuy.com<br/>3. Input password: admin123<br/>4. Click "Login"<br/>5. Observe error message |
| **Expected Result** | ✓ Login gagal<br/>✓ Error message: "Email atau password admin salah"<br/>✓ Tetap di halaman /admin/login<br/>✓ Session tidak dibuat |
| **Actual Result** | [ ] |

---

### TC-BBox-003: Login dengan Password Salah

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-003 |
| **Description** | Login ditolak jika password tidak cocok |
| **Test Data** | Email: admin@kerjakuy.com<br/>Password: wrongpassword |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Input email: admin@kerjakuy.com<br/>3. Input password: wrongpassword<br/>4. Click "Login"<br/>5. Observe error message |
| **Expected Result** | ✓ Login gagal<br/>✓ Error message: "Email atau password admin salah"<br/>✓ Tetap di halaman login<br/>✓ Session tidak dibuat |
| **Actual Result** | [ ] |

---

### TC-BBox-004: Login dengan Email Kosong

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-004 |
| **Description** | Validasi email field wajib diisi |
| **Test Data** | Email: (kosong)<br/>Password: admin123 |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Kosongkan field email<br/>3. Input password: admin123<br/>4. Click "Login"<br/>5. Observe validation error |
| **Expected Result** | ✓ Form validation error ditampilkan<br/>✓ Error message: "Email is required" atau sejenis<br/>✓ Request tidak dikirim ke server<br/>✓ Tetap di form login |
| **Actual Result** | [ ] |

---

### TC-BBox-005: Login dengan Password Kosong

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-005 |
| **Description** | Validasi password field wajib diisi |
| **Test Data** | Email: admin@kerjakuy.com<br/>Password: (kosong) |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Input email: admin@kerjakuy.com<br/>3. Kosongkan field password<br/>4. Click "Login"<br/>5. Observe validation error |
| **Expected Result** | ✓ Form validation error ditampilkan<br/>✓ Error message: "Password is required"<br/>✓ Request tidak dikirim ke server<br/>✓ Email field tetap terisi |
| **Actual Result** | [ ] |

---

### TC-BBox-006: Login dengan Kedua Field Kosong

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-006 |
| **Description** | Validasi kedua field wajib diisi |
| **Test Data** | Email: (kosong)<br/>Password: (kosong) |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Kosongkan kedua field<br/>3. Click "Login"<br/>4. Observe validation errors |
| **Expected Result** | ✓ Form validation errors ditampilkan<br/>✓ Minimal 2 error messages (Email required, Password required)<br/>✓ Request tidak dikirim<br/>✓ Tetap di form login |
| **Actual Result** | [ ] |

---

### TC-BBox-007: Login dengan Format Email Invalid

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-007 |
| **Description** | Validasi format email harus valid |
| **Test Data** | Email: admin-invalid-format<br/>Password: admin123 |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Input email: admin-invalid-format<br/>3. Input password: admin123<br/>4. Click "Login"<br/>5. Observe validation error |
| **Expected Result** | ✓ Form validation error ditampilkan<br/>✓ Error message: "Email must be a valid email address"<br/>✓ Request tidak dikirim ke server<br/>✓ Validasi terjadi di client-side |
| **Actual Result** | [ ] |

---

### TC-BBox-008: Login dengan Password Spasi

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-008 |
| **Description** | Password dengan spasi dianggap salah |
| **Test Data** | Email: admin@kerjakuy.com<br/>Password: (spasi) |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Input email: admin@kerjakuy.com<br/>3. Input password: (spasi saja)<br/>4. Click "Login"<br/>5. Observe error |
| **Expected Result** | ✓ Login gagal<br/>✓ Error message: "Email atau password admin salah"<br/>✓ Spasi tidak dianggap valid sebagai password |
| **Actual Result** | [ ] |

---

### TC-BBox-009: Login dengan Case Sensitive Email

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-009 |
| **Description** | Email comparison seharusnya case-insensitive |
| **Test Data** | Email: ADMIN@KERJAKUY.COM<br/>Password: admin123 |
| **Test Step** | 1. Navigate ke /admin/login<br/>2. Input email: ADMIN@KERJAKUY.COM (uppercase)<br/>3. Input password: admin123<br/>4. Click "Login"<br/>5. Observe hasil |
| **Expected Result** | ✓ Login berhasil (case-insensitive)<br/>✓ Redirect ke dashboard<br/>✓ Session created |
| **Actual Result** | [ ] |

---

## 2. DASHBOARD TESTING

### TC-BBox-010: View Dashboard dengan Data Valid

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-010 |
| **Description** | Dashboard menampilkan statistik perusahaan dengan benar |
| **Test Data** | Database:<br/>- 5 perusahaan pending<br/>- 3 perusahaan verified<br/>- 2 perusahaan rejected<br/>- Total: 10 perusahaan |
| **Test Step** | 1. Login dengan admin valid<br/>2. System auto-redirect ke dashboard<br/>3. Observe statistik yang ditampilkan<br/>4. Hitung jumlah item di list pending |
| **Expected Result** | ✓ Widget Statistik menampilkan:<br/>  - Total Perusahaan: 10<br/>  - Menunggu Verifikasi: 5<br/>  - Terverifikasi: 3<br/>  - Ditolak: 2<br/>✓ List pending menampilkan 5 item (halaman 1)<br/>✓ Pagination menunjukkan page 1 of 1 |
| **Actual Result** | [ ] |

---

### TC-BBox-011: Dashboard Pagination dengan Data > 10

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-011 |
| **Description** | Pagination berfungsi untuk list > 10 items |
| **Test Data** | Database:<br/>- 15 perusahaan pending<br/>- 10 perusahaan verified<br/>- 5 perusahaan rejected |
| **Test Step** | 1. Login ke dashboard<br/>2. Observe halaman 1 (10 items pending)<br/>3. Click "Next" button<br/>4. Observe halaman 2<br/>5. Click "Previous"<br/>6. Observe halaman 1 lagi |
| **Expected Result** | ✓ Halaman 1: 10 perusahaan pending ditampilkan<br/>✓ Halaman 2: 5 perusahaan pending ditampilkan<br/>✓ URL page 1: /admin/dashboard?page=1<br/>✓ URL page 2: /admin/dashboard?page=2<br/>✓ Previous/Next buttons berfungsi |
| **Actual Result** | [ ] |

---

### TC-BBox-012: Access Dashboard Tanpa Login

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-012 |
| **Description** | Middleware proteksi dashboard dari akses tanpa login |
| **Test Data** | Session: kosong (tidak ada admin session) |
| **Test Step** | 1. Buka browser baru atau clear session<br/>2. Navigate langsung ke /admin/dashboard<br/>3. Observe redirect behavior |
| **Expected Result** | ✓ Access denied<br/>✓ Auto-redirect ke /admin/login<br/>✓ Tidak bisa view data apapun<br/>✓ Session check terpenuhi |
| **Actual Result** | [ ] |

---

### TC-BBox-013: Dashboard dengan Expired Session

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-013 |
| **Description** | Dashboard tidak dapat diakses dengan session expired |
| **Test Data** | Session: expired (session timeout > 12 jam) |
| **Test Step** | 1. Login ke dashboard<br/>2. Clear session via browser dev tools (delete cookies)<br/>3. Refresh halaman dashboard<br/>4. Observe hasil |
| **Expected Result** | ✓ Auto-redirect ke /admin/login<br/>✓ Error message: session expired<br/>✓ Session data kosong |
| **Actual Result** | [ ] |

---

### TC-BBox-014: Dashboard dengan Data Kosong

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-014 |
| **Description** | Dashboard berfungsi normal dengan data kosong |
| **Test Data** | Database:<br/>- 0 perusahaan semua status |
| **Test Step** | 1. Login ke dashboard<br/>2. Observe statistik dan list |
| **Expected Result** | ✓ Widget Statistik: semua nilai 0<br/>✓ List pending: "Tidak ada data" message<br/>✓ Page tidak error<br/>✓ No exception thrown |
| **Actual Result** | [ ] |

---

## 3. DAFTAR PERUSAHAAN TESTING

### TC-BBox-015: View List Semua Perusahaan

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-015 |
| **Description** | View list menampilkan semua perusahaan dengan benar |
| **Test Data** | Database:<br/>- 25 total perusahaan<br/>- Berbagai status |
| **Test Step** | 1. Login ke admin<br/>2. Navigate ke /admin/daftar-perusahaan<br/>3. Observe list yang ditampilkan<br/>4. Check kolom yang visible |
| **Expected Result** | ✓ List menampilkan 15 items per page<br/>✓ Kolom visible: Nama, Email, Status, Tanggal Daftar, Action<br/>✓ Status badge dengan color berbeda<br/>✓ Pagination: page 1 of 2<br/>✓ Sorting: terbaru duluan (created_at DESC) |
| **Actual Result** | [ ] |

---

### TC-BBox-016: Search Perusahaan by Nama

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-016 |
| **Description** | Search berdasarkan nama perusahaan |
| **Test Data** | Database:<br/>- "PT. Maju Jaya"<br/>- "CV. Teknologi Maju"<br/>- "PT. Bangun Sejahtera"<br/>Search input: "Maju" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Input "Maju" di search field<br/>3. Click "Search" atau auto-search<br/>4. Observe hasil |
| **Expected Result** | ✓ Hanya 2 perusahaan ditampilkan:<br/>  - "PT. Maju Jaya"<br/>  - "CV. Teknologi Maju"<br/>✓ "PT. Bangun Sejahtera" tidak ada<br/>✓ URL: /admin/daftar-perusahaan?search=Maju<br/>✓ Search case-insensitive |
| **Actual Result** | [ ] |

---

### TC-BBox-017: Search Perusahaan by Email

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-017 |
| **Description** | Search juga bekerja untuk email |
| **Test Data** | Database:<br/>- info@majujaya.com<br/>- hello@teknologimaju.com<br/>- support@bangun.com<br/>Search input: "teknologi" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Input "teknologi" di search field<br/>3. Click Search<br/>4. Observe hasil |
| **Expected Result** | ✓ Menemukan perusahaan dengan email "hello@teknologimaju.com"<br/>✓ Search mencari di field email<br/>✓ Minimal 1 perusahaan ditampilkan |
| **Actual Result** | [ ] |

---

### TC-BBox-018: Search dengan No Results

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-018 |
| **Description** | Search dengan keyword yang tidak ada |
| **Test Data** | Database:<br/>- Data ada tapi tidak cocok<br/>Search input: "xyzabc123" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Input "xyzabc123" di search field<br/>3. Click Search<br/>4. Observe hasil |
| **Expected Result** | ✓ Message: "Tidak ada data" atau "No results"<br/>✓ List kosong<br/>✓ URL: /admin/daftar-perusahaan?search=xyzabc123<br/>✓ Pagination hidden |
| **Actual Result** | [ ] |

---

### TC-BBox-019: Filter by Status Pending

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-019 |
| **Description** | Filter menampilkan hanya perusahaan pending |
| **Test Data** | Database:<br/>- 5 pending<br/>- 8 verified<br/>- 3 rejected<br/>Filter: Status = "Pending" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Select filter: "Menunggu Verifikasi"<br/>3. Click "Filter"<br/>4. Observe hasil |
| **Expected Result** | ✓ Hanya 5 perusahaan pending ditampilkan<br/>✓ URL: /admin/daftar-perusahaan?status=pending<br/>✓ Status badge: "Menunggu"<br/>✓ Verified dan rejected tidak ada |
| **Actual Result** | [ ] |

---

### TC-BBox-020: Filter by Status Verified

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-020 |
| **Description** | Filter menampilkan hanya perusahaan verified |
| **Test Data** | Database:<br/>- 5 pending<br/>- 8 verified<br/>- 3 rejected<br/>Filter: Status = "Verified" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Select filter: "Terverifikasi"<br/>3. Click "Filter"<br/>4. Observe hasil |
| **Expected Result** | ✓ Hanya 8 perusahaan verified ditampilkan<br/>✓ URL: /admin/daftar-perusahaan?status=verified<br/>✓ Status badge: "Terverifikasi" (hijau)<br/>✓ Pending dan rejected tidak ada |
| **Actual Result** | [ ] |

---

### TC-BBox-021: Filter by Status Rejected

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-021 |
| **Description** | Filter menampilkan hanya perusahaan rejected |
| **Test Data** | Database:<br/>- 5 pending<br/>- 8 verified<br/>- 3 rejected<br/>Filter: Status = "Rejected" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Select filter: "Ditolak"<br/>3. Click "Filter"<br/>4. Observe hasil |
| **Expected Result** | ✓ Hanya 3 perusahaan rejected ditampilkan<br/>✓ URL: /admin/daftar-perusahaan?status=rejected<br/>✓ Status badge: "Ditolak" (merah)<br/>✓ Pending dan verified tidak ada |
| **Actual Result** | [ ] |

---

### TC-BBox-022: Kombinasi Search + Filter

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-022 |
| **Description** | Search dan filter dapat dikombinasikan |
| **Test Data** | Database:<br/>- "PT. Maju" (pending)<br/>- "PT. Maju" (verified)<br/>Search: "Maju", Filter: "pending" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Input search: "Maju"<br/>3. Select filter: "Menunggu Verifikasi"<br/>4. Click "Search"<br/>5. Observe hasil |
| **Expected Result** | ✓ Hanya "PT. Maju" dengan status pending ditampilkan<br/>✓ URL: /admin/daftar-perusahaan?search=Maju&status=pending<br/>✓ Filter dan search bekerja bersama<br/>✓ Hanya 1 item ditampilkan |
| **Actual Result** | [ ] |

---

### TC-BBox-023: Click "Lihat Detail" dari List

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-023 |
| **Description** | Navigasi ke detail perusahaan dari list |
| **Test Data** | Perusahaan di list dengan ID: 5<br/>Nama: "PT. Test Company" |
| **Test Step** | 1. Navigate ke /admin/daftar-perusahaan<br/>2. Find perusahaan dengan ID 5<br/>3. Click tombol "Lihat Detail"<br/>4. Observe redirect dan data |
| **Expected Result** | ✓ Redirect ke /admin/detail-perusahaan/5<br/>✓ Halaman detail terbuka<br/>✓ Data PT. Test Company ditampilkan<br/>✓ Informasi lengkap visible |
| **Actual Result** | [ ] |

---

## 4. DETAIL PERUSAHAAN & VERIFIKASI TESTING

### TC-BBox-024: View Detail Perusahaan Lengkap

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-024 |
| **Description** | Detail page menampilkan informasi perusahaan lengkap |
| **Test Data** | Perusahaan ID: 5<br/>- Nama: PT. Maju Jaya<br/>- Email: info@majujaya.com<br/>- Telepon: 08123456789<br/>- NPWP: 12.345.678.9-012.345<br/>- Status: pending |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/5<br/>2. Observe semua section<br/>3. Check dokumen links<br/>4. Scroll untuk melihat semua info |
| **Expected Result** | ✓ Section "Informasi Dasar":<br/>  - Nama, Email, Telepon, NPWP<br/>✓ Section "Alamat":<br/>  - Provinsi, Kota, Kecamatan, Alamat Lengkap<br/>✓ Section "Dokumen":<br/>  - Link download Sertifikat<br/>  - Link download Foto Profil<br/>✓ Section "Verifikasi":<br/>  - Tombol "Setujui"<br/>  - Tombol "Tolak"<br/>  - Input alasan |
| **Actual Result** | [ ] |

---

### TC-BBox-025: Download Sertifikat

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-025 |
| **Description** | Download file sertifikat berfungsi |
| **Test Data** | File: storage/sertifikat/perusahaan_5.pdf<br/>File size: 500 KB<br/>Format: PDF |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/5<br/>2. Find section "Dokumen"<br/>3. Click "Download Sertifikat"<br/>4. Check download folder<br/>5. Verify file |
| **Expected Result** | ✓ File sertifikat berhasil didownload<br/>✓ Filename sesuai<br/>✓ File type: PDF<br/>✓ File ukuran sesuai (~500 KB)<br/>✓ File dapat dibuka |
| **Actual Result** | [ ] |

---

### TC-BBox-026: Download Foto Profil

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-026 |
| **Description** | Download file foto profil berfungsi |
| **Test Data** | File: storage/foto/perusahaan_5.jpg<br/>File size: 200 KB<br/>Format: JPG |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/5<br/>2. Find section "Dokumen"<br/>3. Click "Download Foto Profil"<br/>4. Check download folder<br/>5. Verify file |
| **Expected Result** | ✓ File foto berhasil didownload<br/>✓ Filename sesuai<br/>✓ File type: JPG/PNG<br/>✓ File size: ~200 KB<br/>✓ File dapat dibuka dengan image viewer |
| **Actual Result** | [ ] |

---

### TC-BBox-027: Approve Perusahaan (Verified)

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-027 |
| **Description** | Admin dapat approve perusahaan |
| **Test Data** | Perusahaan:<br/>- ID: 3<br/>- Status: pending<br/>- Nama: PT. Test Approve |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/3<br/>2. Click tombol "Setujui"<br/>3. Observe processing/konfirmasi<br/>4. Check hasil |
| **Expected Result** | ✓ Status berubah menjadi "verified"<br/>✓ Field verified_by dan verified_at terisi<br/>✓ Success message: "Perusahaan PT. Test Approve berhasil diverifikasi!"<br/>✓ Redirect ke dashboard<br/>✓ Perusahaan hilang dari list pending<br/>✓ Count "Menunggu Verifikasi" berkurang 1 |
| **Actual Result** | [ ] |

---

### TC-BBox-028: Reject Perusahaan dengan Alasan

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-028 |
| **Description** | Admin dapat reject perusahaan dengan alasan |
| **Test Data** | Perusahaan:<br/>- ID: 4<br/>- Status: pending<br/>- Nama: PT. Test Reject<br/>Alasan: "Dokumentasi NPWP tidak lengkap" |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/4<br/>2. Click tombol "Tolak"<br/>3. Form muncul untuk input alasan<br/>4. Input alasan<br/>5. Click "Kirim" |
| **Expected Result** | ✓ Status berubah menjadi "rejected"<br/>✓ Field alasan_penolakan terisi: "Dokumentasi NPWP tidak lengkap"<br/>✓ Warning message: "Perusahaan PT. Test Reject ditolak."<br/>✓ Redirect ke dashboard<br/>✓ Count "Ditolak" bertambah 1<br/>✓ Perusahaan tidak ada di list pending |
| **Actual Result** | [ ] |

---

### TC-BBox-029: Reject tanpa Alasan

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-029 |
| **Description** | Validasi alasan penolakan wajib diisi |
| **Test Data** | Perusahaan ID: 6<br/>Alasan: (kosong) |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/6<br/>2. Click tombol "Tolak"<br/>3. Kosongkan field alasan<br/>4. Click "Kirim" |
| **Expected Result** | ✓ Form validation error ditampilkan<br/>✓ Error message: "Alasan penolakan wajib diisi"<br/>✓ Form tidak ter-submit<br/>✓ Status perusahaan tetap 'pending'<br/>✓ Data tidak berubah di database |
| **Actual Result** | [ ] |

---

### TC-BBox-030: Reject dengan Alasan > 500 Karakter

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-030 |
| **Description** | Validasi max length alasan = 500 karakter |
| **Test Data** | Perusahaan ID: 7<br/>Alasan: "a" × 501 (501 karakter) |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/7<br/>2. Click tombol "Tolak"<br/>3. Input alasan dengan 501 karakter<br/>4. Click "Kirim" |
| **Expected Result** | ✓ Form validation error ditampilkan<br/>✓ Error message: "Alasan maksimal 500 karakter"<br/>✓ Form tidak ter-submit<br/>✓ Status tetap pending |
| **Actual Result** | [ ] |

---

### TC-BBox-031: View Detail Perusahaan Verified

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-031 |
| **Description** | UI berbeda untuk perusahaan yang sudah verified |
| **Test Data** | Perusahaan:<br/>- ID: 10<br/>- Status: verified<br/>- verified_at: 2026-05-01 10:30:00 |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/10<br/>2. Observe semua element<br/>3. Check section verifikasi |
| **Expected Result** | ✓ Section verifikasi (tombol approve/reject) TIDAK ditampilkan<br/>✓ Status badge: "Terverifikasi" (hijau)<br/>✓ Menampilkan verified_at: "2026-05-01 10:30:00"<br/>✓ Back button tetap ada<br/>✓ Document download tetap berfungsi |
| **Actual Result** | [ ] |

---

### TC-BBox-032: View Detail Perusahaan Rejected

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-032 |
| **Description** | UI untuk perusahaan yang ditolak |
| **Test Data** | Perusahaan:<br/>- ID: 11<br/>- Status: rejected<br/>- Alasan: "Sertifikat tidak valid" |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/11<br/>2. Observe status dan alasan<br/>3. Check section verifikasi |
| **Expected Result** | ✓ Status badge: "Ditolak" (merah)<br/>✓ Field "Alasan Penolakan" visible<br/>✓ Isi alasan: "Sertifikat tidak valid"<br/>✓ Section verifikasi TIDAK ditampilkan<br/>✓ Dokumentasi tetap dapat didownload |
| **Actual Result** | [ ] |

---

### TC-BBox-033: Access Perusahaan yang Tidak Ada

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-033 |
| **Description** | Error handling untuk ID perusahaan yang tidak ada |
| **Test Data** | Perusahaan ID: 9999 (tidak ada di database) |
| **Test Step** | 1. Navigate ke /admin/detail-perusahaan/9999<br/>2. Observe response |
| **Expected Result** | ✓ 404 Error page ditampilkan<br/>✓ Message: "Not Found" atau "Perusahaan tidak ditemukan"<br/>✓ Link back ke dashboard tersedia<br/>✓ No exception error visible |
| **Actual Result** | [ ] |

---

## 5. HISTORY VERIFIKASI TESTING

### TC-BBox-034: View History Semua Verifikasi

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-034 |
| **Description** | History menampilkan semua perusahaan yang sudah diverifikasi |
| **Test Data** | Database:<br/>- 5 perusahaan verified<br/>- 3 perusahaan rejected<br/>- 2 perusahaan pending (tidak ditampilkan) |
| **Test Step** | 1. Login ke admin<br/>2. Navigate ke /admin/history-verifikasi<br/>3. Observe list yang ditampilkan<br/>4. Count items |
| **Expected Result** | ✓ Menampilkan 8 perusahaan (5 verified + 3 rejected)<br/>✓ Perusahaan pending TIDAK ditampilkan<br/>✓ Setiap item menampilkan:<br/>  - Nama Perusahaan<br/>  - Email<br/>  - Status<br/>  - Tanggal Verifikasi<br/>  - Alasan Penolakan (jika reject)<br/>✓ Pagination: 20 per halaman |
| **Actual Result** | [ ] |

---

### TC-BBox-035: History Pagination

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-035 |
| **Description** | Pagination di history page berfungsi |
| **Test Data** | Database:<br/>- 50 perusahaan verified/rejected |
| **Test Step** | 1. Navigate ke /admin/history-verifikasi<br/>2. Observe halaman 1 (20 items)<br/>3. Click "Next"<br/>4. Observe halaman 2<br/>5. Click "Previous" |
| **Expected Result** | ✓ Halaman 1: 20 items pertama<br/>✓ Halaman 2: 20 items berikutnya<br/>✓ Halaman 3: sisa items<br/>✓ URL berubah dengan ?page parameter<br/>✓ Navigation buttons berfungsi |
| **Actual Result** | [ ] |

---

### TC-BBox-036: Verified Perusahaan di History

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-036 |
| **Description** | Detail history untuk perusahaan verified |
| **Test Data** | Perusahaan:<br/>- Nama: PT. Accepted<br/>- Status: verified<br/>- verified_at: 2026-05-05 14:30:00 |
| **Test Step** | 1. Navigate ke /admin/history-verifikasi<br/>2. Find "PT. Accepted"<br/>3. Observe informasi ditampilkan |
| **Expected Result** | ✓ Status badge: "Terverifikasi" (hijau)<br/>✓ Tanggal verifikasi ditampilkan: 2026-05-05 14:30:00<br/>✓ Alasan penolakan: kosong/tidak visible<br/>✓ Informasi lengkap visible |
| **Actual Result** | [ ] |

---

### TC-BBox-037: Rejected Perusahaan di History

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-037 |
| **Description** | Detail history untuk perusahaan rejected |
| **Test Data** | Perusahaan:<br/>- Nama: PT. Rejected<br/>- Status: rejected<br/>- Alasan: "Dokumentasi tidak lengkap" |
| **Test Step** | 1. Navigate ke /admin/history-verifikasi<br/>2. Find "PT. Rejected"<br/>3. Observe status dan alasan |
| **Expected Result** | ✓ Status badge: "Ditolak" (merah)<br/>✓ Alasan penolakan ditampilkan lengkap: "Dokumentasi tidak lengkap"<br/>✓ Tanggal verifikasi visible<br/>✓ Informasi lengkap |
| **Actual Result** | [ ] |

---

## 6. LOGOUT TESTING

### TC-BBox-038: Logout dari Dashboard

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-038 |
| **Description** | Admin dapat logout dengan benar |
| **Test Data** | Session active dengan admin login |
| **Test Step** | 1. Login ke dashboard<br/>2. Locate tombol "Logout" di navbar<br/>3. Click "Logout"<br/>4. Observe redirect dan session |
| **Expected Result** | ✓ Session 'admin_id' dan 'admin_email' terhapus<br/>✓ Redirect ke homepage (/)<br/>✓ Success message: "Anda telah logout dari panel admin"<br/>✓ Cookies terhapus<br/>✓ Session data kosong |
| **Actual Result** | [ ] |

---

### TC-BBox-039: Access Protected Route Setelah Logout

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-039 |
| **Description** | Middleware proteksi setelah logout |
| **Test Data** | Session: sudah logout |
| **Test Step** | 1. Logout dari admin<br/>2. Navigate ke /admin/dashboard<br/>3. Observe redirect |
| **Expected Result** | ✓ Redirect ke /admin/login<br/>✓ Tidak bisa melihat dashboard<br/>✓ Tidak bisa melihat data apapun<br/>✓ Harus login ulang untuk akses |
| **Actual Result** | [ ] |

---

### TC-BBox-040: Multiple Logout Attempts

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-BBox-040 |
| **Description** | Multiple logout tidak menyebabkan error |
| **Test Data** | Session: sudah logout sebelumnya |
| **Test Step** | 1. Logout pertama kali<br/>2. Redirect ke homepage<br/>3. Navigate ke /admin/logout<br/>4. Click logout lagi |
| **Expected Result** | ✓ Logout kedua tidak error<br/>✓ Success message tetap ditampilkan<br/>✓ Redirect ke homepage<br/>✓ Session tetap kosong<br/>✓ No exception thrown |
| **Actual Result** | [ ] |

---

## SUMMARY & TRACKING

### Test Execution Summary

| Kategori | Test Cases | Status |
|:---|:---:|:---:|
| Login Admin | TC-BBox-001 to TC-BBox-009 | 9 cases |
| Dashboard | TC-BBox-010 to TC-BBox-014 | 5 cases |
| Daftar Perusahaan | TC-BBox-015 to TC-BBox-023 | 9 cases |
| Detail & Verifikasi | TC-BBox-024 to TC-BBox-033 | 10 cases |
| History Verifikasi | TC-BBox-034 to TC-BBox-037 | 4 cases |
| Logout | TC-BBox-038 to TC-BBox-040 | 3 cases |
| **TOTAL BLACK BOX** | **40 Test Cases** | **100%** |

---

## EXECUTION CHECKLIST

### Test Case Status Tracking

**Login Testing**
- [ ] TC-BBox-001 - [ ] TC-BBox-002 - [ ] TC-BBox-003 - [ ] TC-BBox-004 - [ ] TC-BBox-005
- [ ] TC-BBox-006 - [ ] TC-BBox-007 - [ ] TC-BBox-008 - [ ] TC-BBox-009

**Dashboard Testing**
- [ ] TC-BBox-010 - [ ] TC-BBox-011 - [ ] TC-BBox-012 - [ ] TC-BBox-013 - [ ] TC-BBox-014

**Daftar Perusahaan Testing**
- [ ] TC-BBox-015 - [ ] TC-BBox-016 - [ ] TC-BBox-017 - [ ] TC-BBox-018 - [ ] TC-BBox-019
- [ ] TC-BBox-020 - [ ] TC-BBox-021 - [ ] TC-BBox-022 - [ ] TC-BBox-023

**Detail & Verifikasi Testing**
- [ ] TC-BBox-024 - [ ] TC-BBox-025 - [ ] TC-BBox-026 - [ ] TC-BBox-027 - [ ] TC-BBox-028
- [ ] TC-BBox-029 - [ ] TC-BBox-030 - [ ] TC-BBox-031 - [ ] TC-BBox-032 - [ ] TC-BBox-033

**History Verifikasi Testing**
- [ ] TC-BBox-034 - [ ] TC-BBox-035 - [ ] TC-BBox-036 - [ ] TC-BBox-037

**Logout Testing**
- [ ] TC-BBox-038 - [ ] TC-BBox-039 - [ ] TC-BBox-040

---

## NOTES FOR TESTER

### Pre-Test Checklist:
- ✓ Database sudah di-seed dengan test data
- ✓ Laravel development server running
- ✓ Browser dev tools opened
- ✓ Test data sesuai pre-conditions
- ✓ Admin config ter-setup
- ✓ Session storage working

### Result Filling Guide:
1. Isi kolom "Actual Result" setelah test execution
2. Bandingkan dengan "Expected Result"
3. Status: **PASS** jika actual = expected
4. Status: **FAIL** jika ada perbedaan
5. Dokumentasikan screenshot untuk FAIL cases

### Test Data Seeding (SQL):
```sql
-- Seed test data untuk testing
INSERT INTO perusahaans (nama_perusahaan, email, status_verifikasi, created_at) 
VALUES 
('PT. Maju Jaya', 'info@majujaya.com', 'pending', NOW()),
('CV. Teknologi Maju', 'hello@teknologimaju.com', 'verified', NOW()),
('PT. Bangun Sejahtera', 'support@bangun.com', 'rejected', NOW());
-- ... lebih banyak data sesuai kebutuhan
```

---

**Document Version**: 1.0  
**Format**: Black Box Testing (Detailed Format)  
**Total Test Cases**: 40  
**Coverage**: 100% Happy Path & Edge Cases  
**Ready for Execution**: YES
