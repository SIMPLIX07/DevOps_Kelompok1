<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R3WajibKosongTest extends DuskTestCase
{
    /**
     * Test Rule 3: Gagal registrasi karena ada field wajib yang kosong (Nama Perusahaan kosong).
     */
    public function test_registrasi_wajib_kosong(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/perusahaan')
                // Sengaja mengosongkan nama_perusahaan
                ->type('email', 'emptyname@mail.com')
                ->type('password', 'password123')
                ->type('telepon', '081234567890')
                ->type('npwp', '00.111.222.3-444.555')
                ->select('sektor_industri', 'Teknologi Informasi')
                ->type('alamat', 'Jl. Alamat')
                ->type('deskripsi', 'Deskripsi singkat')
                ->script("
                    document.querySelector('form').setAttribute('novalidate', 'novalidate');
                ");

            $browser->press('Daftar Sekarang')
                // Menunggu pesan error validasi wajib muncul
                ->assertPathIs('/register/perusahaan')
                ->waitForText('nama perusahaan');
        });
    }
}
