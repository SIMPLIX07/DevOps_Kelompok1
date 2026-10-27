<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R5AksesTanpaLoginTest extends DuskTestCase
{
    /**
     * Test Rule 5: Gagal mengakses form tambah lowongan tanpa login (akan diredirect ke login perusahaan).
     */
    public function test_akses_tambah_lowongan_tanpa_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->visit('/lowongan/tambah')
                ->waitForLocation('/login/perusahaan')
                ->assertPathIs('/login/perusahaan')
                ->assertSee('Masuk ke Akun Perusahaan');
        });
    }
}
