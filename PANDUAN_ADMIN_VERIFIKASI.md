# 🚀 Quick Start - Fitur Verifikasi Admin Perusahaan

## Informasi Penting ⚠️

Fitur verifikasi admin telah ditambahkan ke KerjaKuy. Berikut panduan penggunaannya.

## Login Admin

**URL:** `http://localhost:8000/admin/login`

**Credentials Default:**
- Email: `admin@kerjakuy.com`
- Password: `admin123`

⚠️ **Ubah kredensial ini di production!**

Untuk mengubah kredensial, edit file `.env`:
```
ADMIN_EMAIL=email_anda@kerjakuy.com
ADMIN_PASSWORD=password_anda_yang_kuat
```

---

## Alur Kerja Verifikasi Perusahaan

### Step 1️⃣: Perusahaan Mendaftar
Perusahaan mengakses `/register/perusahaan` dan mengisi form registrasi.

**Output:**
- ✅ Akun berhasil dibuat
- ⏳ Status: **Menunggu Verifikasi**
- ❌ Belum bisa login, perlu menunggu admin verifasi

### Step 2️⃣: Admin Memverifikasi
1. Admin login ke `/admin/login`
2. Lihat **Dashboard** → Daftar perusahaan yang menunggu verifikasi
3. Klik **"Lihat Detail"** pada perusahaan yang ingin diverifikasi
4. Review dokumen dan informasi perusahaan
5. Pilih aksi:
   - ✅ **Verifikasi (Setujui)** → Perusahaan bisa login
   - ❌ **Tolak** → Isi alasan penolakan

### Step 3️⃣: Perusahaan Dapat Login
Setelah diverifikasi, perusahaan bisa login dengan kredensial mereka ke `/login/perusahaan`

---

## Menu Admin

### 📊 Dashboard
- Statistik overview (Total, Pending, Verified, Rejected)
- List perusahaan menunggu verifikasi

### 📋 Daftar Perusahaan
- View semua perusahaan
- Filter berdasarkan status atau cari nama/email
- Tindakan cepat untuk melihat detail

### ✅ Verifikasi Detail
- Info lengkap perusahaan
- Download dokumen (sertifikat, foto profil)
- Tombol approve/reject untuk perusahaan pending

### 📜 History Verifikasi
- Riwayat semua perusahaan yang sudah diverifikasi
- Status akhir (disetujui/ditolak)
- Alasan jika ditolak

---

## Status Perusahaan

| Status | Deskripsi | Bisa Login? |
|--------|-----------|-----------|
| ⏳ **Pending** | Menunggu verifikasi admin | ❌ Tidak |
| ✅ **Verified** | Sudah diverifikasi & disetujui | ✅ Ya |
| ❌ **Rejected** | Ditolak oleh admin | ❌ Tidak |

---

## Pesan Error yang Mungkin Muncul

### Saat Perusahaan Login
| Pesan | Arti | Solusi |
|-------|------|--------|
| "Akun masih menunggu verifikasi" | Status pending | Admin harus verifikasi |
| "Akun Anda ditolak. Alasan: ..." | Status rejected | Perusahaan daftar ulang dengan dokumen benar |
| "Email atau password salah" | Credentials error | Periksa email & password |

---

## Fitur Speed Tips ⚡

1. **Search cepat**: Di halaman "Daftar Perusahaan", gunakan search untuk menemukan perusahaan tertentu

2. **Filter Status**: Gunakan dropdown status untuk melihat hanya perusahaan pending/verified/rejected

3. **Pagination**: Navigate pages di list untuk melihat lebih banyak perusahaan

4. **Download Dokumen**: Klik link sertifikat/foto untuk preview atau download di halaman detail

---

## Database Structure

Kolom baru ditambahkan di tabel `perusahaans`:

```
✅ status_verifikasi: 'pending' | 'verified' | 'rejected'
📝 alasan_penolakan: (text) - Alasan jika ditolak
👤 verified_by: ID admin peverifikasi
🕐 verified_at: Waktu verifikasi
```

---

## API Endpoints (untuk developer)

```
GET  /admin/login                    → Form login admin
POST /admin/login                    → Proses login
GET  /admin/dashboard                → Dashboard
GET  /admin/daftar-perusahaan        → Daftar perusahaan
GET  /admin/detail-perusahaan/{id}   → Detail perusahaan
POST /admin/verifikasi-perusahaan/{id} → Verifikasi
GET  /admin/history-verifikasi       → History
POST /admin/logout                   → Logout admin
```

---

## Troubleshooting

### ❓ Admin tidak bisa login
- Cek email & password di form
- Jika lupa, reset di file `.env` atau admin.php
- Cek browser cookies jika sempat login tapi logout sendiri

### ❓ Tombol verifikasi tidak ada
- Periksa status perusahaan di database
- Status harus 'pending' untuk muncul tombol verifikasi
- Refresh halaman browser

### ❓ Kolom verifikasi tidak ada di database
- Pastikan migration sudah jalan: `php artisan migrate`
- Cek file `database/migrations/2025_04_13_000000_add_verification_to_perusahaans_table.php`

---

## Pengaturan Lanjutan

Email notifikasi akan ditambahkan di versi selanjutnya. Untuk sekarang, admin harus memberitahu perusahaan via email secara manual.

---

**Versi**: 1.0  
**Dibuat**: 13 April 2026  
**Status**: ✅ Production Ready
