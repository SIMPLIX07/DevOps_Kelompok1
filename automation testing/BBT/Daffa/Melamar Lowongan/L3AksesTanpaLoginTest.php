<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;

class L3AksesTanpaLoginTest extends DuskTestCase
{
    /**
     * Test tamu diarahkan ke halaman login jika mencoba melamar tanpa masuk.
     */
    public function test_tamu_melamar_dialihkan_ke_login(): void
    {
        $uniqueId = time();

        // 1. Buat Perusahaan verified di DB
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Daffa Guest ' . $uniqueId,
            'email'             => 'daffaguest_' . $uniqueId . '@company.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '11.222.333.6-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // 2. Buat Lowongan untuk perusahaan tersebut
        $lowongan = Lowongan::create([
            'perusahaan_id'      => $perusahaan->id,
            'kategori_pekerjaan' => 'IT',
            'posisi_pekerjaan'   => 'Daffa QA Engineer ' . $uniqueId,
            'jenis_pekerjaan'    => 'Full-time',
            'gaji'               => '10000000',
            'deskripsi_singkat'  => 'Pekerjaan test untuk QA Engineer.',
            'deskripsi_pekerjaan'=> 'Melakukan testing otomatis.',
            'syarat'             => 'Paham Laravel Dusk.',
            'pendidikan'         => 'S1',
            'pengalaman'         => '1 tahun',
            'keahlian_teknis'    => 'Laravel, Dusk',
            'provinsi'           => 'Jawa Barat',
            'kabupaten'          => 'Bandung',
            'kecamatan'          => 'Coblong',
            'alamat_lengkap'     => 'Jl. Daffa No. 1',
            'tanggal_mulai'      => '2026-06-01',
            'tanggal_berakhir'   => '2026-07-01',
        ]);

        $this->browse(function (Browser $browser) use ($lowongan) {
            // Pastikan session kosong / user keluar
            $browser->visit('/')
                ->visit('/lowongan/' . $lowongan->id)
                ->waitForText('Lamar Sekarang')
                ->press('Lamar Sekarang')
                ->waitForLocation('/login/pelamar');
        });
    }
}
