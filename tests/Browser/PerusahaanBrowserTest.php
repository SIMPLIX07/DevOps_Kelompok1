<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class PerusahaanBrowserTest extends DuskTestCase
{
    /**
     * Test perusahaan registration and pending message verification.
     */
    public function test_perusahaan_registration(): void
    {
        $uniqueId = time();
        $email = 'duskcompanyreg' . $uniqueId . '@mail.com';
        $companyName = 'Dusk Reg Company ' . $uniqueId;

        // Buat dummy file pdf dengan valid header agar mime-type terdeteksi sebagai application/pdf
        $dummySertif = tempnam(sys_get_temp_dir(), 'sertif_') . '.pdf';
        file_put_contents($dummySertif, "%PDF-1.5\n%EOF");

        $this->browse(function (Browser $browser) use ($email, $companyName, $uniqueId, $dummySertif) {
            $browser->visit('/register/perusahaan')
                ->type('nama_perusahaan', $companyName)
                ->type('email', $email)
                ->type('password', 'password123')
                ->type('telepon', '089988776655')
                ->type('npwp', '12.345.678.9-' . substr($uniqueId, -4))
                ->script("document.getElementById('fileInput').style.display = 'block';");

            $browser->element('#fileInput')->sendKeys(realpath($dummySertif));

            $browser->press('Lanjut')
                ->waitForText('Menunggu Verifikasi') // modal title
                ->assertSee('Akun Anda sedang di verifikasi');
        });

        // Hapus file dummy
        @unlink($dummySertif);
    }

    /**
     * Test perusahaan login, settings view, and logout.
     */
    public function test_perusahaan_login_and_account_management(): void
    {
        $uniqueId = time();
        $email = 'duskcompany' . $uniqueId . '@mail.com';

        // Buat perusahaan verified di DB secara dinamis
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'Dusk Company Corp',
            'email'             => $email,
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '12.345.678.9-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        $this->browse(function (Browser $browser) use ($email) {
            $browser->visit('/login/perusahaan')
                ->assertSee('Login Perusahaan')
                ->type('email', $email)
                ->type('password', 'password123')
                ->press('Lanjut')
                ->waitForLocation('/home-perusahaan')
                
                // Menuju halaman pengaturan
                ->visit('/perusahaan/pengaturan')
                ->waitForText('Akun')
                
                // Log out menggunakan tombol "Keluar"
                ->press('Keluar')
                ->waitForLocation('/');
        });
    }

    /**
     * Test perusahaan login and job vacancy posting.
     */
    public function test_perusahaan_login_and_job_posting(): void
    {
        $uniqueId = time();
        $email = 'duskcompanyjob' . $uniqueId . '@mail.com';
        $companyName = 'Dusk Job Company ' . $uniqueId;

        // Buat perusahaan verified di DB secara dinamis
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => $email,
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '12.345.678.9-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        $this->browse(function (Browser $browser) use ($email) {
            $browser->visit('/login/perusahaan')
                ->type('email', $email)
                ->type('password', 'password123')
                ->press('Lanjut')
                ->waitForLocation('/home-perusahaan')
                
                // Akses halaman tambah lowongan (No 9)
                ->visit('/lowongan/tambah')
                ->waitForText('Tambah lowongan')
                ->type('kategori', 'IT')
                ->type('posisi', 'Senior Web Developer Dusk')
                ->type('jenis', 'Full Time')
                ->type('gaji', 'Rp 10.000.000')
                ->type('deskripsi_singkat', 'Dusk automated test job description.')
                ->type('deskripsi', 'Dusk automated test job description full body details.')
                ->type('syarat', 'PHP, Laravel, Dusk, testing.')
                ->type('pendidikan', 'S1 Teknik Informatika')
                ->type('pengalaman', 'Minimal 2 tahun')
                ->type('keahlian_teknis', 'Laravel, Dusk')
                ->type('provinsi', 'Jawa Barat')
                ->type('kota', 'Bandung')
                ->type('kecamatan', 'Coblong')
                ->type('alamat', 'Jl. Ganesha No. 10');

            $browser->script("document.getElementsByName('tanggal_mulai')[0].value = '2026-06-07'; document.getElementsByName('tanggal_akhir')[0].value = '2026-07-07';");

            $browser->press('Buat')
                ->waitForLocation('/home-perusahaan')
                ->assertSee('Senior Web Developer Dusk');
        });
    }
}
