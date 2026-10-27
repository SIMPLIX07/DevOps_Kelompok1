<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EP3AksesTanpaLoginTest extends DuskTestCase
{
    /**
     * Test tamu diarahkan ke halaman login jika mencoba mengakses halaman pengaturan profil tanpa login.
     */
    public function test_tamu_akses_setting_dialihkan_ke_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->visit('/pelamar/setting')
                ->waitForLocation('/login/pelamar')
                ->assertSee('Username');
        });
    }
}
