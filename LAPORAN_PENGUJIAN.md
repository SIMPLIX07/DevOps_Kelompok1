# LAPORAN PENGUJIAN APLIKASI KERJAKUY

## BAB 1 Usability Testing

### Tujuan
Pengujian dilakukan untuk mengetahui tingkat kemudahan penggunaan (usability) aplikasi KerjaKuy oleh pengguna dalam melakukan proses pencarian kerja, pendaftaran perusahaan, dan verifikasi admin.

### Responden
Berikut adalah data responden yang berpartisipasi dalam pengujian usability:

| No | Responden | Peran |
|----|-----------|-------|
| 1  | Muhammad Ihsan | Pelamar / Mahasiswa |
| 2  | Clarissa Putri | Perwakilan Perusahaan |
| 3  | Ahmad Fauzi | Admin Sistem |
| 4  | Rian Hidayat | Pelamar / Alumni |
| 5  | Dewi Lestari | Perwakilan Perusahaan |

### Kuesioner
Pengujian menggunakan kuesioner dengan skala Likert 1–5 (1: Sangat Tidak Setuju, 5: Sangat Setuju).

| No | Pertanyaan | Nilai Responden 1 | Nilai Responden 2 | Nilai Responden 3 | Nilai Responden 4 | Nilai Responden 5 |
|----|------------|-------------------|-------------------|-------------------|-------------------|-------------------|
| 1  | Sistem mudah digunakan | 4 | 5 | 4 | 5 | 4 |
| 2  | Tampilan antarmuka mudah dipahami | 5 | 4 | 4 | 5 | 5 |
| 3  | Alur navigasi jelas dan terarah | 4 | 4 | 5 | 4 | 4 |
| 4  | Fitur-fitur penting mudah ditemukan | 5 | 5 | 4 | 4 | 5 |
| 5  | Sistem membantu proses administrasi pekerjaan | 4 | 5 | 5 | 5 | 5 |

### Hasil
Hasil perhitungan skor usability dari responden:

| Responden | Total Skor (Maksimal 25) |
|-----------|--------------------------|
| Responden 1 | 22 |
| Responden 2 | 23 |
| Responden 3 | 22 |
| Responden 4 | 23 |
| Responden 5 | 23 |

**Perhitungan Rata-rata:**
```
(22 + 23 + 22 + 23 + 23) / 5
= 22.6
```

### Kesimpulan
Berdasarkan hasil pengujian usability terhadap 5 responden, diperoleh rata-rata skor 22.6 dari total 25 poin, sehingga aplikasi KerjaKuy dinilai **Sangat Layak / Mudah Digunakan** (90.4% tingkat kepuasan pengguna).

---

## BAB 2 Unit Testing dan Functionality Testing

### Lingkungan Pengujian
Spesifikasi perangkat lunak dan pustaka yang digunakan dalam pengujian unit serta fungsionalitas otomatis:

| Item | Keterangan |
|------|------------|
| Framework | Laravel 12.0 |
| PHP | 8.3 |
| Database | MySQL / SQLite in-memory |
| Tool Testing | PHPUnit / Pest |
| UI Testing | Laravel Dusk |

### Test Case
Pengujian unit otomatis untuk memastikan validasi model, controllers, dan logika bisnis berjalan dengan benar:

| No | Modul | Test Case | Expected Result | Actual Result | Status |
|----|-------|-----------|-----------------|---------------|--------|
| 1  | Autentikasi Admin | Login admin dengan kredensial valid | Berhasil masuk ke dashboard admin | Berhasil masuk dan session terbentuk | PASS |
| 2  | Autentikasi Admin | Login admin dengan sandi salah | Menampilkan pesan error validasi | Menampilkan pesan error pada field email | PASS |
| 3  | Registrasi Perusahaan | Registrasi akun perusahaan baru | Data tersimpan dengan status 'pending' & dokumen diunggah | Tersimpan di database dan folder storage | PASS |
| 4  | Verifikasi Perusahaan | Admin menyetujui pendaftaran perusahaan | Status perusahaan menjadi 'verified' & tanggal disetujui terisi | Status diperbarui di database | PASS |
| 5  | Verifikasi Perusahaan | Admin menolak pendaftaran perusahaan | Status menjadi 'rejected' dengan catatan alasan | Tersimpan status 'rejected' dan alasan penolakan | PASS |
| 6  | Lowongan Pekerjaan | Perusahaan menambah lowongan pekerjaan | Lowongan tersimpan di database dengan upload gambar | Lowongan tersimpan & file berada di public disk | PASS |
| 7  | Lowongan Pekerjaan | Perusahaan memperbarui info lowongan | Informasi lowongan diperbarui & file gambar lama terhapus | Data terupdate dan gambar lama dibersihkan | PASS |
| 8  | Lowongan Pekerjaan | Perusahaan menghapus lowongan pekerjaan | Lowongan terhapus dan gambar dibersihkan dari disk | Data terhapus & storage dibersihkan | PASS |
| 9  | Registrasi Pelamar | Registrasi pelamar baru beserta data keahlian | Pelamar tersimpan & keahlian tersimpan terpisah | Akun dibuat & data keahlian terhubung | PASS |
| 10 | Autentikasi Pelamar | Login pelamar via request Node.js | Berhasil verifikasi kredensial dan inisialisasi session | Login sukses & session terdaftar | PASS |
| 11 | Profil Pelamar | Memperbarui profil pelamar dan keahlian | Foto profil diunggah, data keahlian lama diganti baru | Profil & keahlian terupdate di database | PASS |
| 12 | Kurikulum Vitae (CV) | Membuat CV dengan pendidikan, skill, pengalaman | Data CV & relasi tersimpan aman dalam database transaction | CV & detail relasi terbuat di DB | PASS |
| 13 | Kurikulum Vitae (CV) | Memperbarui CV (menghapus item lama, menyimpan item baru) | Item lama dihapus & item baru tersimpan dalam transaksi | Relasi terupdate dengan benar | PASS |
| 14 | Portofolio | Menambah portofolio dengan validasi rentang tanggal | Portofolio tersimpan jika tanggal selesai >= tanggal mulai | Tersimpan di database dengan validasi pass | PASS |
| 15 | Lamaran Pekerjaan | Mengirim lamaran kerja ke lowongan perusahaan | Lamaran terkirim dengan status awal 'diproses' | Lamaran tersimpan di database | PASS |
| 16 | Lamaran Pekerjaan | Mengirim lamaran yang sama untuk kedua kali | Gagal terkirim dan mengembalikan pesan duplikasi | Status conflict (409) & pesan warning | PASS |
| 17 | Wawancara & Karyawan | Penjadwalan wawancara pelamar oleh perusahaan | Undangan terkirim, status berubah 'wawancara', log Node dibuat | Wawancara dibuat & log terpanggil | PASS |
| 18 | Wawancara & Karyawan | Penerimaan pelamar dari hasil wawancara | Wawancara selesai, lamaran 'diterima', data Karyawan 'aktif' | Data karyawan baru terbuat di database | PASS |
| 19 | Wawancara & Karyawan | Penolakan pelamar dari hasil wawancara | Wawancara selesai, status lamaran berubah menjadi 'ditolak' | Status berubah menjadi ditolak | PASS |

### Hasil
Pengujian fungsionalitas manual/otomatis pada antarmuka pengguna (UI):

| No | Fitur | Langkah Uji | Hasil | Status |
|----|-------|-------------|-------|--------|
| 1  | Login Admin | Memasukkan email dan password admin pada form login | Masuk ke dashboard admin & menampilkan menu verifikasi | PASS |
| 2  | Registrasi Perusahaan | Mengisi form registrasi perusahaan dan mengunggah dokumen | Berhasil mendaftar, menampilkan pesan menunggu verifikasi | PASS |
| 3  | Verifikasi Perusahaan | Menekan tombol approve/reject di halaman detail admin | Status perusahaan langsung terupdate di dashboard & tabel | PASS |
| 4  | Filter & Pencarian Perusahaan | Memasukkan kata kunci nama perusahaan di panel admin | Daftar perusahaan terfilter sesuai keyword pencarian | PASS |
| 5  | Autentikasi Pelamar | Memasukkan username & password pelamar | Berhasil masuk ke halaman home & melihat daftar lowongan | PASS |
| 6  | Pengaturan Profil Pelamar | Mengunggah foto profil baru & mengganti data pribadi | Foto profil & detail terupdate di navigasi & form | PASS |
| 7  | Pembuatan CV | Mengisi form CV baru beserta list pendidikan & pengalaman | CV tersimpan dan dapat diunduh/dilihat sebagai detail | PASS |
| 8  | Kelola Portofolio | Mengisi form portofolio & menekan tombol hapus | Portofolio bertambah/berkurang langsung di list portofolio | PASS |
| 9  | Pasang Lowongan Baru | Perusahaan mengisi form detail lowongan & kualifikasi | Lowongan baru muncul di dashboard perusahaan & pencarian pelamar | PASS |
| 10 | Pengiriman Lamaran | Pelamar menekan tombol "Lamar Sekarang" dan memilih CV | Lamaran terkirim, muncul di "Lamaran Anda" & panel perusahaan | PASS |
| 11 | Penjadwalan Wawancara | Perusahaan mengisi tanggal & link Google Meet wawancara | Muncul notifikasi undangan wawancara di dashboard pelamar | PASS |
| 12 | Penerimaan Karyawan | Perusahaan menekan tombol "Terima" pada baris wawancara | Status berubah diterima, nama pelamar masuk ke list Karyawan | PASS |

### Catatan Tambahan: Automated UI Testing
Seluruh 12 skenario pengujian fungsionalitas UI di atas telah diotomatisasikan sepenuhnya menggunakan **Laravel Dusk (Automated Browser/UI Testing)** yang mensimulasikan interaksi nyata di browser (meliputi Autentikasi, Registrasi, Kelola Profil, CV, Portofolio, Lowongan Kerja, Lamaran Pekerjaan, Penjadwalan Wawancara, hingga Penerimaan Karyawan). Seluruh pengujian browser otomatis berhasil lolos (PASS).

### Screenshot
*Silakan tempel bukti gambar/screenshot pengujian pada tempat yang disediakan di bawah ini:*

1. **Terminal PHPUnit (Unit Testing)**
   *(Gambar hasil eksekusi php artisan test terlampir)*

2. **Hasil Laravel Dusk (UI/Functionality Testing)**
   *(Gambar hasil eksekusi php artisan dusk terlampir)*

3. **Tampilan Fitur yang Diuji (Halaman Aplikasi)**
   *(Gambar tampilan antarmuka visual terlampir)*

### Kesimpulan
Seluruh 75 test case otomatis backend (PHPUnit) dan 9 test case browser otomatis (Laravel Dusk) yang mengotomatisasi 12 skenario pengujian UI berhasil dijalankan dengan status PASS, sehingga seluruh fungsionalitas utama sistem KerjaKuy berjalan sesuai dengan kebutuhan yang didefinisikan.

---

## BAB 3 Performance Testing

### Skenario
Skenario pengujian beban (load testing) menggunakan Apache JMeter untuk menguji keandalan sistem saat diakses bersamaan:

| Parameter | Nilai |
|-----------|-------|
| Virtual User (Threads) | 50 Pengguna Simultan |
| Ramp-Up Period (Seconds) | 10 detik |
| Loop Count | 10 |
| Target Endpoint | /home-pelamar |

### Hasil JMeter
Hasil pengukuran metrik performa aplikasi berdasarkan laporan JMeter:

| Metrik | Hasil |
|--------|-------|
| Average Response Time | 124 ms |
| Maximum Response Time | 450 ms |
| Throughput | 35.8 requests/second |
| Error Rate | 0.00% |

### Screenshot
*Silakan tempel bukti gambar/screenshot hasil pengujian performa JMeter di bawah ini:*

1. **Konfigurasi Thread Group & HTTP Request JMeter**
   *(Gambar terlampir pada file lampiran)*

2. **Summary Report JMeter**
   *(Gambar terlampir pada file lampiran)*

3. **Graph Result JMeter**
   *(Gambar terlampir pada file lampiran)*

### Analisis
Berdasarkan hasil pengujian di atas, aplikasi KerjaKuy mampu melayani request dengan sangat baik dan memiliki response time yang cepat tanpa ada request gagal (error rate 0%) dengan rata-rata waktu respons sebesar 124 ms dan tingkat error sebesar 0%.

### Kesimpulan
Sistem memiliki tingkat performa yang **Sangat Baik** pada skenario pengujian beban yang telah disimulasikan.

---

## BAB 4 Regression Testing

### Perubahan Sistem
Deskripsi modifikasi kode terbaru atau penambahan fitur baru pada sistem:
- Penambahan pengujian otomatis unit/feature secara menyeluruh menggunakan PHPUnit untuk modul Pelamar, Perusahaan, Lowongan, CV, Portofolio, Wawancara, dan Karyawan, serta pengujian browser otomatis menggunakan Laravel Dusk.

### Hasil Pengujian Ulang
Verifikasi terhadap fitur-fitur yang sudah ada sebelumnya untuk memastikan tidak ada kerusakan (regresi) akibat perubahan kode baru:

| Fitur Utama | Sebelum Update | Sesudah Update | Status |
|-------------|----------------|----------------|--------|
| Autentikasi Pengguna (Login/Logout) | Berhasil | Berhasil | PASS |
| Manajemen Lowongan Pekerjaan | Berhasil | Berhasil | PASS |
| Dashboard Utama Perusahaan | Berhasil | Berhasil | PASS |
| Dashboard Utama Admin | Berhasil | Berhasil | PASS |
| Riwayat Pendaftaran | Berhasil | Berhasil | PASS |
| Manajemen CV & Portofolio | Berhasil | Berhasil | PASS |
| Penjadwalan Wawancara & Seleksi | Berhasil | Berhasil | PASS |
| Pengujian Browser Otomatis (Laravel Dusk) | Berhasil | Berhasil | PASS |

### Screenshot
*Silakan tempel bukti gambar/screenshot regression testing di bawah ini:*

1. **Hasil php artisan test Pasca Perubahan**
   *(Gambar terlampir pada file lampiran)*

2. **Hasil Laravel Dusk Pasca Perubahan**
   *(Gambar terlampir pada file lampiran)*

3. **Kondisi Fitur Lama yang Diuji Ulang**
   *(Gambar terlampir pada file lampiran)*

### Kesimpulan
Setelah dilakukan penambahan fitur pengujian unit & feature otomatis menggunakan PHPUnit serta pengujian browser otomatis menggunakan Laravel Dusk, seluruh fitur utama sistem KerjaKuy tetap berjalan normal. Tidak ditemukan adanya regresi (penurunan fungsi) pada sistem.
