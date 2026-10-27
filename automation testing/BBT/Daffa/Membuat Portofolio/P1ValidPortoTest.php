<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pelamar;

class P1ValidPortoTest extends DuskTestCase
{
    /**
     * Test membuat portofolio dengan data valid lengkap.
     */
    public function test_membuat_portofolio_sukses(): void
    {
        $uniqueId = time();
        $username = 'daffaporto_' . $uniqueId;
        $email = 'daffaporto_' . $uniqueId . '@mail.com';

        // 1. Buat Pelamar di DB
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Daffa Portfolio Seeker ' . $uniqueId,
            'username'     => $username,
            'email'        => $email,
            'password'     => bcrypt('password123'),
        ]);

        $this->browse(function (Browser $browser) use ($pelamar) {
            $browser->visit('/login/pelamar')
                ->type('username', $pelamar->username)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-pelamar')
                
                // Masuk ke halaman Portofolio
                ->visit('/portofolio')
                ->waitForText('Daftar Portofolio')
                
                // Klik tombol "+ Tambah Portofolio"
                ->clickLink('+ Tambah Portofolio')
                ->waitForLocation('/portofolio/create')
                ->waitForText('Tambah Portofolio')
                
                // Isi form
                ->type('judul', 'Project KerjaYuk Dusk Daffa')
                ->type('kategori', 'Automated Testing')
                ->type('deskripsi', 'Pengujian fungsionalitas UI menggunakan Laravel Dusk.')
                ->type('teknologi', 'Laravel, Dusk, PHPUnit')
                ->type('link_demo', 'https://demo.kerjayuk.com')
                ->type('link_repo', 'https://github.com/daffa/kerjayuk-dusk');

            // Set tanggal menggunakan script JS untuk kestabilan input tipe date
            $browser->script("
                document.getElementsByName('tanggal_mulai')[0].value = '2026-06-01';
                document.getElementsByName('tanggal_selesai')[0].value = '2026-06-15';
            ");

            $browser->press('Simpan Portofolio')
                ->waitForLocation('/portofolio')
                ->assertSee('Project KerjaYuk Dusk Daffa');
        });
    }
}
