<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R2ErrorLoginTest extends DuskTestCase
{
    /**
     * Test Rule 2: Gagal mengakses halaman kelola pelamar/wawancara karena belum login.
     */
    public function test_akses_wawancara_tanpa_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->visit('/perusahaan/wawancara')
                ->waitForLocation('/login/perusahaan')
                ->assertPathIs('/login/perusahaan')
                ->assertSee('Masuk ke Akun Perusahaan');
        });
    }
}
