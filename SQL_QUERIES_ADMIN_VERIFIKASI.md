# 🔍 SQL QUERIES - Admin Verifikasi Perusahaan

Berikut SQL queries yang berguna untuk checking dan debugging fitur verifikasi.

## 1️⃣ Lihat Struktur Tabel Perusahaan

```sql
DESCRIBE perusahaans;
```

## 2️⃣ Lihat Semua Perusahaan & Status Verifikasi

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    status_verifikasi,
    created_at,
    verified_at
FROM perusahaans
ORDER BY created_at DESC;
```

## 3️⃣ Hitung Statistik Verifikasi

```sql
SELECT 
    status_verifikasi,
    COUNT(*) as jumlah
FROM perusahaans
GROUP BY status_verifikasi;
```

## 4️⃣ Lihat Hanya Perusahaan PENDING

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    telepon,
    created_at
FROM perusahaans
WHERE status_verifikasi = 'pending'
ORDER BY created_at DESC;
```

## 5️⃣ Lihat Hanya Perusahaan TERVERIFIKASI

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    verified_at
FROM perusahaans
WHERE status_verifikasi = 'verified'
ORDER BY verified_at DESC;
```

## 6️⃣ Lihat Hanya Perusahaan DITOLAK

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    alasan_penolakan,
    verified_at
FROM perusahaans
WHERE status_verifikasi = 'rejected'
ORDER BY verified_at DESC;
```

## 7️⃣ Cari Perusahaan Berdasarkan Nama

```sql
SELECT * FROM perusahaans
WHERE nama_perusahaan LIKE '%PT%'
OR email LIKE '%@gmail.com'
ORDER BY created_at DESC;
```

## 8️⃣ Lihat Detail Lengkap Perusahaan

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    telepon,
    npwp,
    alamat,
    sertifikat,
    status_verifikasi,
    alasan_penolakan,
    verified_by,
    verified_at,
    created_at,
    updated_at
FROM perusahaans
WHERE id = 1; -- Ganti dengan ID yang ingin dicek
```

## 9️⃣ Hitung Total Waktu Verifikasi (Hours)

```sql
SELECT 
    nama_perusahaan,
    created_at,
    verified_at,
    TIMESTAMPDIFF(HOUR, created_at, verified_at) as jam_tunggu_verifikasi
FROM perusahaans
WHERE status_verifikasi = 'verified'
ORDER BY jam_tunggu_verifikasi DESC;
```

## 🔟 Lihat Perusahaan yang Belum Diverifikasi Lebih dari 24 Jam

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    created_at,
    TIMESTAMPDIFF(HOUR, created_at, NOW()) as jam_menunggu
FROM perusahaans
WHERE status_verifikasi = 'pending'
AND TIMESTAMPDIFF(HOUR, created_at, NOW()) > 24
ORDER BY jam_menunggu DESC;
```

## 1️⃣1️⃣ Reset Status Perusahaan ke PENDING (untuk testing)

```sql
-- ⚠️ HATI-HATI: Query ini akan mereset semua perusahaan ke pending!
UPDATE perusahaans
SET 
    status_verifikasi = 'pending',
    alasan_penolakan = NULL,
    verified_by = NULL,
    verified_at = NULL
WHERE id = 1; -- Spesifik satu perusahaan atau remove WHERE untuk semua
```

## 1️⃣2️⃣ Verifikasi Manual Perusahaan di Database

```sql
-- Approve perusahaan
UPDATE perusahaans
SET 
    status_verifikasi = 'verified',
    verified_by = 1,
    verified_at = NOW()
WHERE id = 1;

-- Reject perusahaan
UPDATE perusahaans
SET 
    status_verifikasi = 'rejected',
    alasan_penolakan = 'Dokumentasi tidak lengkap',
    verified_by = 1,
    verified_at = NOW()
WHERE id = 2;
```

## 1️⃣3️⃣ Hapus Data Perusahaan (untuk reset database)

```sql
-- Hapus satu perusahaan
DELETE FROM perusahaans WHERE id = 1;

-- ⚠️ HATI-HATI: Hapus SEMUA perusahaan
DELETE FROM perusahaans;

-- Reset auto increment
ALTER TABLE perusahaans AUTO_INCREMENT = 1;
```

## 1️⃣4️⃣ Export Data Perusahaan ke CSV

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    telepon,
    npwp,
    status_verifikasi,
    verified_at,
    alasan_penolakan
FROM perusahaans
INTO OUTFILE '/tmp/perusahaan_data.csv'
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n';
```

## 1️⃣5️⃣ Laporan Verifikasi Per Hari

```sql
SELECT 
    DATE(verified_at) as tanggal,
    COUNT(*) as total_verifikasi,
    SUM(IF(status_verifikasi = 'verified', 1, 0)) as disetujui,
    SUM(IF(status_verifikasi = 'rejected', 1, 0)) as ditolak
FROM perusahaans
WHERE verified_at IS NOT NULL
GROUP BY DATE(verified_at)
ORDER BY tanggal DESC;
```

## 1️⃣6️⃣ Cek Perusahaan yang Belum Punya Sertifikat

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    sertifikat,
    status_verifikasi
FROM perusahaans
WHERE sertifikat IS NULL OR sertifikat = '';
```

## 1️⃣7️⃣ Cek Perusahaan yang Belum Punya Foto Profil

```sql
SELECT 
    id,
    nama_perusahaan,
    email,
    foto_profil,
    status_verifikasi
FROM perusahaans
WHERE foto_profil IS NULL OR foto_profil = '';
```

## 1️⃣8️⃣ Duplicate Check - Email Perusahaan

```sql
SELECT 
    email,
    COUNT(*) as jumlah_duplikat
FROM perusahaans
GROUP BY email
HAVING COUNT(*) > 1;
```

## 1️⃣9️⃣ Duplicate Check - NPWP Perusahaan

```sql
SELECT 
    npwp,
    COUNT(*) as jumlah_duplikat
FROM perusahaans
GROUP BY npwp
HAVING COUNT(*) > 1;
```

## 2️⃣0️⃣ Summary Dashboard - All Stats

```sql
SELECT 
    'Total Perusahaan' as stat,
    COUNT(*) as nilai
FROM perusahaans

UNION ALL

SELECT 
    'Menunggu Verifikasi' as stat,
    COUNT(*) as nilai
FROM perusahaans
WHERE status_verifikasi = 'pending'

UNION ALL

SELECT 
    'Terverifikasi' as stat,
    COUNT(*) as nilai
FROM perusahaans
WHERE status_verifikasi = 'verified'

UNION ALL

SELECT 
    'Ditolak' as stat,
    COUNT(*) as nilai
FROM perusahaans
WHERE status_verifikasi = 'rejected';
```

---

## 💡 TIPS

1. **Backup sebelum menjalankan query DELETE atau UPDATE**:
   ```sql
   BACKUP TABLE perusahaans;
   -- atau gunakan mysqldump
   ```

2. **Test query dengan WHERE clause dulu sebelum UPDATE/DELETE**:
   ```sql
   -- Test dulu
   SELECT * FROM perusahaans WHERE status_verifikasi = 'pending';
   
   -- Jika benar, baru UPDATE
   UPDATE perusahaans SET status_verifikasi = 'verified' WHERE ...;
   ```

3. **Gunakan LIMIT untuk safe deletion**:
   ```sql
   DELETE FROM perusahaans WHERE id > 100 LIMIT 10;
   ```

---

**Last Updated**: 13 April 2026
