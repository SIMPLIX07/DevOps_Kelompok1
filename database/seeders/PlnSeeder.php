<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Illuminate\Support\Facades\Hash;

class PlnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create PT PLN (Persero)
        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => 'PT PLN (Persero)',
            'email' => 'info@pln.co.id',
            'password' => Hash::make('password123'),
            'alamat' => 'Jl. Trunojoyo Blok M - I No. 135, Kebayoran Baru, Jakarta Selatan',
            'telepon' => '0217251234',
            'npwp' => '010000131093000',
            'sertifikat' => 'sertifikat/pln_sertifikat.pdf',
            'foto_profil' => 'perusahaan/profil/pln_logo.png',
            'status_verifikasi' => 'verified',
            'verified_by' => 1,
            'verified_at' => now(),
        ]);

        // 2. Create Job Vacancies
        // Vacancy 1: Electrical Engineer
        Lowongan::create([
            'perusahaan_id' => $perusahaan->id,
            'kategori_pekerjaan' => 'Teknik / Kelistrikan',
            'posisi_pekerjaan' => 'Electrical Engineer (Transmisi & Distribusi)',
            'jenis_pekerjaan' => 'Full-time',
            'gaji' => 'Rp 10.000.000 - Rp 15.000.000',
            'deskripsi_singkat' => 'Bertanggung jawab atas pemeliharaan dan pengoperasian jaringan transmisi serta distribusi listrik tegangan tinggi/menengah.',
            'deskripsi_pekerjaan' => "Melakukan monitoring, pengujian, dan pemeliharaan rutin pada peralatan gardu induk dan jaringan transmisi.\nMenganalisis gangguan sistem kelistrikan dan merumuskan solusi perbaikan yang cepat serta aman.\nMenyusun laporan teknis kinerja sistem transmisi dan distribusi secara berkala.\nBerkoordinasi dengan tim lapangan untuk penanganan gangguan darurat (blackout/trouble).",
            'syarat' => "Pendidikan minimal S1 Teknik Elektro (Arus Kuat).\nIPK minimal 3.00 dari perguruan tinggi terakreditasi.\nMemahami sistem proteksi tenaga listrik, SCADA, dan switchgear.\nMampu bekerja di bawah tekanan dan bersedia ditempatkan di seluruh unit PLN.",
            'provinsi' => 'DKI Jakarta',
            'kabupaten' => 'Jakarta Selatan',
            'kecamatan' => 'Kebayoran Baru',
            'alamat_lengkap' => 'Kantor Pusat PT PLN (Persero), Jl. Trunojoyo Blok M - I No. 135',
            'tanggal_mulai' => '2026-06-08',
            'tanggal_berakhir' => '2026-12-31',
            'gambar' => 'pln_electrical_banner.png',
            'pendidikan' => 'S1 Teknik Elektro (Arus Kuat)',
            'pengalaman' => 'Minimal 1-2 tahun (Fresh Graduate dengan sertifikasi dipersilakan)',
            'keahlian_teknis' => 'SCADA, ETAP, Proteksi Gardu Induk, AutoCAD',
        ]);

        // Vacancy 2: Software Engineer
        Lowongan::create([
            'perusahaan_id' => $perusahaan->id,
            'kategori_pekerjaan' => 'Teknologi Informasi',
            'posisi_pekerjaan' => 'Software Engineer (Backend Developer)',
            'jenis_pekerjaan' => 'Full-time',
            'gaji' => 'Rp 12.000.000 - Rp 18.000.000',
            'deskripsi_singkat' => 'Membangun dan mengoptimalkan sistem aplikasi internal serta layanan digital PLN (seperti PLN Mobile).',
            'deskripsi_pekerjaan' => "Merancang, mengembangkan, dan memelihara API/microservices yang andal untuk aplikasi PLN Mobile dan web internal.\nMelakukan optimasi query database dan performa sistem berskala besar.\nBerkolaborasi dengan Product Owner, UI/UX Designer, dan Frontend Engineer.\nMenerapkan praktik terbaik dalam penulisan kode (clean code, unit testing, CI/CD).",
            'syarat' => "Pendidikan minimal S1 Teknik Informatika / Sistem Informasi / Ilmu Komputer.\nMenguasai bahasa pemrograman PHP (Laravel/Lumen) atau Node.js (Express/NestJS).\nBerpengalaman dengan database SQL (PostgreSQL, MySQL) dan NoSQL (Redis, MongoDB).\nMemiliki pemahaman tentang Git version control dan RESTful API.",
            'provinsi' => 'DKI Jakarta',
            'kabupaten' => 'Jakarta Selatan',
            'kecamatan' => 'Kebayoran Baru',
            'alamat_lengkap' => 'Kantor Pusat PT PLN (Persero), Jl. Trunojoyo Blok M - I No. 135',
            'tanggal_mulai' => '2026-06-08',
            'tanggal_berakhir' => '2026-12-31',
            'gambar' => 'pln_software_banner.png',
            'pendidikan' => 'S1 Teknik Informatika / Sistem Informasi / Ilmu Komputer',
            'pengalaman' => 'Minimal 2 tahun di bidang Software Development',
            'keahlian_teknis' => 'PHP (Laravel), Node.js, PostgreSQL, Redis, RESTful API, Docker',
        ]);

        // Vacancy 3: Customer Relation Officer
        Lowongan::create([
            'perusahaan_id' => $perusahaan->id,
            'kategori_pekerjaan' => 'Layanan Pelanggan',
            'posisi_pekerjaan' => 'Customer Relation Officer',
            'jenis_pekerjaan' => 'Kontrak',
            'gaji' => 'Rp 6.000.000 - Rp 8.000.000',
            'deskripsi_singkat' => 'Mengelola komunikasi dan keluhan pelanggan PLN guna memastikan pelayanan publik berjalan dengan prima.',
            'deskripsi_pekerjaan' => "Melayani aduan, pertanyaan, dan kebutuhan pelanggan terkait penyambungan baru, perubahan daya, atau gangguan listrik.\nBerkomunikasi aktif dengan pelanggan melalui berbagai saluran (tatap muka, telepon, media sosial).\nMelakukan eskalasi masalah teknis ke tim lapangan secara cepat dan akurat.\nMenjaga tingkat kepuasan pelanggan sesuai standar pelayanan PLN.",
            'syarat' => "Pendidikan minimal D3/S1 semua jurusan (diutamakan Komunikasi, Hubungan Internasional, atau Administrasi).\nMemiliki kemampuan komunikasi yang persuasif, empati tinggi, dan ramah.\nMampu menggunakan komputer dengan baik (Microsoft Office).\nBersedia bekerja dalam sistem shift jika diperlukan.",
            'provinsi' => 'Jawa Barat',
            'kabupaten' => 'Bandung',
            'kecamatan' => 'Sumur Bandung',
            'alamat_lengkap' => 'PT PLN (Persero) Unit Induk Distribusi Jawa Barat, Jl. Asia Afrika No. 63',
            'tanggal_mulai' => '2026-06-08',
            'tanggal_berakhir' => '2026-12-31',
            'gambar' => 'pln_customer_banner.png',
            'pendidikan' => 'D3 / S1 Semua Jurusan',
            'pengalaman' => 'Minimal 1 tahun di bidang Layanan Pelanggan / Public Relations',
            'keahlian_teknis' => 'Customer Relations, Microsoft Office, Interpersonal Communication',
        ]);
    }
}
