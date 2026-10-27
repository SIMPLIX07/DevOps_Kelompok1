<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Karyawan;

class RekrutmenBrowserTest extends DuskTestCase
{

    public function test_job_application_interview_and_hiring_flow(): void
    {
        $uniqueId = time();

        // 1. Buat Perusahaan verified di DB
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'Dusk Recruitment Corp ' . $uniqueId,
            'email'             => 'duskrec_' . $uniqueId . '@company.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08122334455',
            'npwp'              => '33.444.555.6-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // 2. Buat Lowongan untuk perusahaan tersebut
        $lowongan = Lowongan::create([
            'perusahaan_id'      => $perusahaan->id,
            'kategori_pekerjaan' => 'IT',
            'posisi_pekerjaan'   => 'Dusk Integration Engineer ' . $uniqueId,
            'jenis_pekerjaan'    => 'Full Time',
            'gaji'               => '15000000',
            'deskripsi_singkat'  => 'Automated test job.',
            'deskripsi_pekerjaan'=> 'Develop automated Dusk browser test cases.',
            'syarat'             => 'Experience with Laravel Dusk.',
            'pendidikan'         => 'S1',
            'pengalaman'         => '1 tahun',
            'keahlian_teknis'    => 'Laravel, PHP',
            'provinsi'           => 'Jawa Barat',
            'kabupaten'          => 'Bandung',
            'kecamatan'          => 'Coblong',
            'alamat_lengkap'     => 'Jl. Coblong No. 4',
            'tanggal_mulai'      => '2026-06-07',
            'tanggal_berakhir'   => '2026-07-07',
        ]);

        // 3. Buat Pelamar di DB
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Dusk Applicant ' . $uniqueId,
            'username'     => 'duskapp_' . $uniqueId,
            'email'        => 'duskapp_' . $uniqueId . '@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        // 4. Buat CV untuk pelamar di DB
        $cv = Cv::create([
            'pelamar_id'   => $pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'Dusk applicant resume details.',
            'kontak'       => '082233445566',
            'title'        => 'Resume Dusk ' . $uniqueId,
            'subtitle'     => 'Dusk Automation Engineer',
        ]);

        $this->browse(function (Browser $browser) use ($pelamar, $perusahaan, $lowongan) {
            // STEP 1: Pelamar melamar lowongan 
            $browser->visit('/login/pelamar')
                ->type('username', $pelamar->username)
                ->type('password', 'password123')
                ->press('Lanjut')
                ->waitForLocation('/home-pelamar')
                
                // Cari lowongan
                ->type('q', $lowongan->posisi_pekerjaan)
                ->press('Cari Lowongan')
                ->waitForText($lowongan->posisi_pekerjaan)
                ->click('.job-card')
                
                // Pada halaman detail lowongan pelamar
                ->waitForText('Lamar Sekarang')
                ->press('Lamar Sekarang')
                ->waitForText('Pilih CV')
                ->waitFor('.cv-card')
                ->click('.cv-card') // memilih CV
                ->press('Kirim Lamaran')
                ->waitForText('Lamaran Berhasil')
                ->press('Lihat Lamaran')
                ->waitForLocation('/lamaran-anda')
                ->assertSee($lowongan->posisi_pekerjaan)
                ->visit('/pelamar/setting')
                ->waitForText('Akun')
                ->press('Keluar')
                ->waitForLocation('/');

            // STEP 2: Perusahaan menjadwalkan wawancara 
            $browser->visit('/login/perusahaan')
                ->type('email', $perusahaan->email)
                ->type('password', 'password123')
                ->press('Lanjut')
                ->waitForLocation('/home-perusahaan')
                
                // Buka detail lowongan
                ->clickLink('Detail')
                ->waitForText('Pelamar (1)')
                
                // Jadwalkan wawancara
                ->click('.btn-wawancara')
                ->waitForText('Jadwal Wawancara');

            $browser->script("
                document.getElementsByName('tanggal')[0].value = '2026-06-08';
                document.getElementsByName('jam_mulai')[0].value = '10:00';
                document.getElementsByName('jam_selesai')[0].value = '11:00';
            ");

            $browser->type('link_meet', 'https://meet.google.com/abc-defg-hij')
                ->press('Kirim Undangan')
                ->waitForText('Pelamar (0)')
                
                // Logout
                ->visit('/perusahaan/pengaturan')
                ->waitForText('Akun')
                ->press('Keluar')
                ->waitForLocation('/');

            // STEP 3: Pelamar melihat undangan wawancara
            $browser->visit('/login/pelamar')
                ->type('username', $pelamar->username)
                ->type('password', 'password123')
                ->press('Lanjut')
                ->waitForLocation('/home-pelamar')
                ->visit('/wawancara')
                ->waitForText($lowongan->posisi_pekerjaan)
                ->assertSee('Akan Datang')
                ->visit('/pelamar/setting')
                ->waitForText('Akun')
                ->press('Keluar')
                ->waitForLocation('/');

            // STEP 4: Perusahaan menerima pelamar sebagai Karyawan 
            $browser->visit('/login/perusahaan')
                ->type('email', $perusahaan->email)
                ->type('password', 'password123')
                ->press('Lanjut')
                ->waitForLocation('/home-perusahaan')
                
                // Akses halaman Wawancara Perusahaan
                ->visit('/perusahaan/wawancara')
                ->waitForText($lowongan->posisi_pekerjaan)
                ->press('Lihat Detail')
                ->waitForText('Terima Pelamar')
                
                // Terima pelamar
                ->press('Terima Pelamar')
                ->acceptDialog() // Dialog confirm
                ->pause(1500)
                ->acceptDialog() // Dialog success alert
                
                // Cek apakah pelamar masuk list Karyawan
                ->visit('/karyawanPerusahaan')
                ->waitForText('Karyawan')
                ->assertSee($pelamar->nama_lengkap);
        });
    }
}
