<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lowongan</title>
    <link rel="stylesheet" href="/assets/lowongan/tambahLowongan.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <style>
        .is-invalid {
            border: 1px solid #b00000 !important;
            background-color: #fff5f5;
        }
        .char-counter {
            display: block;
            text-align: right;
            font-size: 0.8em;
            color: #999;
            margin-top: 2px;
            margin-bottom: 10px;
        }
        .char-counter.over-limit {
            color: #b00000;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="form-wrapper">
        <div class="form-container">
            <a href="{{ route('perusahaan.lowongan.detail', $lowongan->id) }}" style="text-decoration: none; color: #006a68; display: inline-flex; align-items: center; gap: 8px; margin-bottom: 20px; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 600; transition: color 0.2s;" onmouseover="this.style.color='#00182a'" onmouseout="this.style.color='#006a68'">
                <span class="material-symbols-outlined" style="font-size: 18px; vertical-align: middle;">arrow_back</span>
                Kembali ke Detail Lowongan
            </a>
            <h2>Edit Lowongan</h2>

            @if ($errors->any())
            <div style="background:#ffecec; color:#b00000; padding:15px; border-radius:8px; margin-bottom:20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h4>Tentang Pekerjaan</h4>
                <div class="grid-3">
                    <div>
                        <label>Kategori Pekerjaan</label>
                        <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $lowongan->kategori_pekerjaan) }}" data-maxlength="255" class="@error('kategori') is-invalid @enderror">
                        <small class="char-counter" id="counter-kategori"></small>
                    </div>
                    <div>
                        <label>Posisi Pekerjaan</label>
                        <input type="text" id="posisi" name="posisi" value="{{ old('posisi', $lowongan->posisi_pekerjaan) }}" data-maxlength="255" class="@error('posisi') is-invalid @enderror">
                        <small class="char-counter" id="counter-posisi"></small>
                    </div>
                    <div>
                        <label>Jenis Pekerjaan</label>
                        <select name="jenis" required class="@error('jenis') is-invalid @enderror">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Full-time" {{ (old('jenis', $lowongan->jenis_pekerjaan) == 'Full-time' || old('jenis', $lowongan->jenis_pekerjaan) == 'Fulltime' || old('jenis', $lowongan->jenis_pekerjaan) == 'Full Time') ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ (old('jenis', $lowongan->jenis_pekerjaan) == 'Part-time' || old('jenis', $lowongan->jenis_pekerjaan) == 'Parttime' || old('jenis', $lowongan->jenis_pekerjaan) == 'Part Time') ? 'selected' : '' }}>Part-time</option>
                            <option value="Kontrak" {{ old('jenis', $lowongan->jenis_pekerjaan) == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        </select>
                    </div>
                </div>

                <label>Gaji</label>
                <input type="text" id="gaji" name="gaji" value="{{ old('gaji', $lowongan->gaji) }}" data-maxlength="255" class="@error('gaji') is-invalid @enderror">
                <small class="char-counter" id="counter-gaji"></small>

                <label>Deskripsi Singkat</label>
                <input type="text" name="deskripsi_singkat" value="{{ old('deskripsi_singkat', $lowongan->deskripsi_singkat) }}" class="@error('deskripsi_singkat') is-invalid @enderror">

                <label>Deskripsi Pekerjaan</label>
                <textarea name="deskripsi" class="@error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $lowongan->deskripsi_pekerjaan) }}</textarea>

                <label>Keterangan Tambahan</label>
                <textarea name="syarat" placeholder="Contoh: Bersedia ditempatkan di luar kota, memiliki laptop sendiri, dll." class="@error('syarat') is-invalid @enderror">{{ old('syarat', $lowongan->syarat) }}</textarea>

                <!-- Syarat & Kualifikasi -->
                <h4>Syarat & Kualifikasi</h4>

                <div class="grid-2">
                    <div>
                        <label>Minimal Pendidikan</label>
                        <input type="text" id="pendidikan" name="pendidikan" placeholder="Contoh: Minimal S1 Teknik Informatika / Ilmu Komputer" value="{{ old('pendidikan', $lowongan->pendidikan) }}" data-maxlength="255" class="@error('pendidikan') is-invalid @enderror">
                        <small class="char-counter" id="counter-pendidikan"></small>
                    </div>
                    <div>
                        <label>Minimal Pengalaman</label>
                        <input type="text" id="pengalaman" name="pengalaman" placeholder="Contoh: Minimal 1 tahun di posisi terkait" value="{{ old('pengalaman', $lowongan->pengalaman) }}" data-maxlength="255" class="@error('pengalaman') is-invalid @enderror">
                        <small class="char-counter" id="counter-pengalaman"></small>
                    </div>
                </div>

                <label>Keahlian Teknis Utama (Pisahkan dengan koma)</label>
                <input type="text" name="keahlian_teknis" placeholder="Contoh: PHP (Laravel), Node.js (Express), PostgreSQL" value="{{ old('keahlian_teknis', $lowongan->keahlian_teknis) }}" class="@error('keahlian_teknis') is-invalid @enderror">

                <h4>Lokasi Pekerjaan</h4>
                <div class="grid-3">
                    <div>
                        <input type="text" id="provinsi" name="provinsi" value="{{ old('provinsi', $lowongan->provinsi) }}" placeholder="Provinsi" data-maxlength="255" class="@error('provinsi') is-invalid @enderror">
                        <small class="char-counter" id="counter-provinsi"></small>
                    </div>
                    <div>
                        <input type="text" id="kota" name="kota" value="{{ old('kota', $lowongan->kabupaten) }}" placeholder="Kabupaten/Kota" data-maxlength="255" class="@error('kota') is-invalid @enderror">
                        <small class="char-counter" id="counter-kota"></small>
                    </div>
                    <div>
                        <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $lowongan->kecamatan) }}" placeholder="Kecamatan" data-maxlength="255" class="@error('kecamatan') is-invalid @enderror">
                        <small class="char-counter" id="counter-kecamatan"></small>
                    </div>
                </div>

                <label>Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" data-maxlength="255" class="@error('alamat') is-invalid @enderror">{{ old('alamat', $lowongan->alamat_lengkap) }}</textarea>
                <small class="char-counter" id="counter-alamat"></small>

                <h4>Waktu lowongan</h4>
                <div class="grid-2">
                    <div>
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $lowongan->tanggal_mulai) }}" class="@error('tanggal_mulai') is-invalid @enderror">
                    </div>
                    <div>
                        <label>Tanggal Berakhir</label>
                        <input type="date" name="tanggal_akhir" value="{{ old('tanggal_akhir', $lowongan->tanggal_berakhir) }}" class="@error('tanggal_akhir') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('perusahaan.lowongan.detail', $lowongan->id) }}" class="btn-back">← Kembali</a>
                    <button type="submit" class="btn-submit">Selesai</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-maxlength]').forEach(function (field) {
                var max = parseInt(field.dataset.maxlength, 10);
                var counter = document.getElementById('counter-' + field.id);

                function check() {
                    var len = field.value.length;

                    if (len > max) {
                        field.classList.add('is-invalid');
                        if (counter) {
                            counter.classList.add('over-limit');
                            counter.textContent = 'Teks terlalu panjang! (' + len + '/' + max + ') — kurangi ' + (len - max) + ' karakter.';
                        }
                    } else {
                        field.classList.remove('is-invalid');
                        if (counter) {
                            counter.classList.remove('over-limit');
                            counter.textContent = len + ' / ' + max + ' karakter';
                        }
                    }
                }

                field.addEventListener('input', check);
                check(); // jalan sekali saat load, buat handle nilai old() yang kepanjangan
            });
        });
    </script>

</body>

</html>