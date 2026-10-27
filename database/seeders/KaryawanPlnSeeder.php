<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;

class KaryawanPlnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Get PT PLN (Persero)
        $perusahaan = Perusahaan::where('email', 'info@pln.co.id')->first();

        if (!$perusahaan) {
            $this->command->error("Perusahaan PLN tidak ditemukan! Pastikan PlnSeeder sudah dijalankan.");
            return;
        }

        // 2. Get Vacancies
        $electricalJob = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->where('posisi_pekerjaan', 'like', '%Electrical Engineer%')
            ->first();

        $softwareJob = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->where('posisi_pekerjaan', 'like', '%Software Engineer%')
            ->first();

        $customerJob = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->where('posisi_pekerjaan', 'like', '%Customer Relation%')
            ->first();

        if (!$electricalJob || !$softwareJob || !$customerJob) {
            $this->command->error("Salah satu lowongan PLN tidak ditemukan!");
            return;
        }

        // 3. Create Applicants (Pelamars)
        $aditya = Pelamar::create([
            'nama_lengkap' => 'Aditya Pratama',
            'username' => 'aditya',
            'email' => 'aditya.pratama@mail.com',
            'no_telp' => '081234567890',
            'password' => Hash::make('password123'),
            'foto_profil' => 'pelamar/aditya.png',
        ]);

        $budi = Pelamar::create([
            'nama_lengkap' => 'Budi Santoso',
            'username' => 'budi',
            'email' => 'budi.santoso@mail.com',
            'no_telp' => '081234567891',
            'password' => Hash::make('password123'),
            'foto_profil' => 'pelamar/budi.png',
        ]);

        $citra = Pelamar::create([
            'nama_lengkap' => 'Citra Lestari',
            'username' => 'citra',
            'email' => 'citra.lestari@mail.com',
            'no_telp' => '081234567892',
            'password' => Hash::make('password123'),
            'foto_profil' => 'pelamar/citra.png',
        ]);

        // 4. Create Karyawans (Accepted Employees)
        Karyawan::create([
            'id_pelamar' => $aditya->id,
            'id_lowongan' => $electricalJob->id,
            'id_perusahaan' => $perusahaan->id,
            'kategori_pekerjaan' => 'Teknik / Kelistrikan',
            'posisi' => 'Electrical Engineer',
            'tanggal_mulai' => '2026-06-08',
            'status_karyawan' => 'aktif',
        ]);

        Karyawan::create([
            'id_pelamar' => $budi->id,
            'id_lowongan' => $softwareJob->id,
            'id_perusahaan' => $perusahaan->id,
            'kategori_pekerjaan' => 'Teknologi Informasi',
            'posisi' => 'Backend Developer',
            'tanggal_mulai' => '2026-06-08',
            'status_karyawan' => 'aktif',
        ]);

        Karyawan::create([
            'id_pelamar' => $citra->id,
            'id_lowongan' => $customerJob->id,
            'id_perusahaan' => $perusahaan->id,
            'kategori_pekerjaan' => 'Layanan Pelanggan',
            'posisi' => 'Customer Relation Officer',
            'tanggal_mulai' => '2026-06-08',
            'status_karyawan' => 'aktif',
        ]);

        $this->command->info("Karyawan PLN berhasil di-inject!");
    }
}
