<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class P3AksesTanpaLoginTest extends DuskTestCase
{
    /**
     * Test tamu diarahkan ke halaman login jika mencoba mengakses halaman tambah portofolio tanpa login.
     */
    public function test_tamu_akses_tambah_portofolio_dialihkan_ke_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->visit('/portofolio/create')
                ->waitForLocation('/login/pelamar')
                ->assertSee('Username');
        });
    }
}
