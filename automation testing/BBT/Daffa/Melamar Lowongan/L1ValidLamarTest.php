<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Portofolio;

class L1ValidLamarTest extends DuskTestCase
{
    /**
     * Test melamar lowongan dengan data CV dan Portofolio yang valid.
     */
    public function test_melamar_lowongan_sukses(): void
    {
        $uniqueId = time();

        // 1. Buat Perusahaan verified di DB
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Daffa Jaya ' . $uniqueId,
            'email'             => 'daffacorp_' . $uniqueId . '@company.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
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

        // 3. Buat Pelamar di DB
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Daffa Applicant ' . $uniqueId,
            'username'     => 'daffaapp_' . $uniqueId,
            'email'        => 'daffaapp_' . $uniqueId . '@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        // 4. Buat CV untuk pelamar di DB
        $cv = Cv::create([
            'pelamar_id'   => $pelamar->id,
            'umur'         => 22,
            'tentang_saya' => 'Saya Daffa, QA Engineer.',
            'kontak'       => '08123456789',
            'title'        => 'CV Daffa ' . $uniqueId,
            'subtitle'     => 'QA Automation Engineer',
        ]);

        // 5. Buat Portofolio untuk pelamar di DB
        $portofolio = Portofolio::create([
            'pelamar_id'   => $pelamar->id,
            'judul'        => 'Portofolio Daffa ' . $uniqueId,
            'kategori'     => 'Testing',
            'deskripsi'    => 'Project testing otomatis menggunakan Laravel Dusk.',
            'teknologi'    => 'Laravel, Dusk, PHPUnit',
        ]);

        $this->browse(function (Browser $browser) use ($pelamar, $lowongan, $cv, $portofolio) {
            $browser->visit('/login/pelamar')
                ->type('username', $pelamar->username)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-pelamar')
                
                // Cari lowongan
                ->type('q', $lowongan->posisi_pekerjaan)
                ->press('Cari Lowongan')
                ->waitForText($lowongan->posisi_pekerjaan)
                
                // Masuk ke halaman detail lowongan
                ->click('.job-card')
                ->waitForText('Lamar Sekarang')
                
                // Klik Lamar Sekarang untuk membuka modal
                ->press('Lamar Sekarang')
                ->waitForText('Pilih CV')
                
                // Pilih CV
                ->waitFor('#cvList .cv-card')
                ->click('#cvList .cv-card')
                
                // Pilih Portofolio
                ->waitFor('#portofolioList .cv-card')
                ->click('#portofolioList .cv-card')
                
                // Kirim Lamaran
                ->press('Kirim Lamaran')
                ->waitForText('Lamaran Berhasil')
                
                // Konfirmasi sukses
                ->press('Lihat Lamaran')
                ->waitForLocation('/lamaran-anda')
                ->assertSee($lowongan->posisi_pekerjaan);
        });
    }
}
