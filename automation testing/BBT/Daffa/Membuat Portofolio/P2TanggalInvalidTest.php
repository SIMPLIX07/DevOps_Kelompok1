<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pelamar;

class P2TanggalInvalidTest extends DuskTestCase
{
    /**
     * Test Membuat Portofolio dengan tanggal selesai sebelum tanggal mulai.
     */
    public function test_membuat_portofolio_tanggal_selesai_invalid(): void
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
                
                // Masuk ke halaman tambah portofolio
                ->visit('/portofolio/create')
                ->waitForText('Tambah Portofolio')
                
                // Isi form
                ->type('judul', 'Project Date Invalid Daffa')
                ->type('kategori', 'Testing');

            // Set tanggal_selesai sebelum tanggal_mulai
            $browser->script("
                document.getElementsByName('tanggal_mulai')[0].value = '2026-06-15';
                document.getElementsByName('tanggal_selesai')[0].value = '2026-06-01';
            ");

            $browser->press('Simpan Portofolio')
                ->waitForText('The tanggal selesai field must be a date after or equal to')
                ->assertPathIs('/portofolio/create')
                ->assertSee('The tanggal selesai field must be a date after or equal to');
        });
    }
}
