<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R2EmailSalahTest extends DuskTestCase
{
    /**
     * Test Rule 2: Sign in dengan email admin yang salah.
     */
    public function test_login_email_salah(): void
    {
        $adminPassword = config('admin.admin.password', 'admin123');

        $this->browse(function (Browser $browser) use ($adminPassword) {
            $browser->visit('/admin/login')
                ->type('email', 'emailsalah@kerjayok.com')
                ->type('password', $adminPassword)
                ->press('Masuk')
                ->waitForText('Email atau password admin salah')
                ->assertSee('Email atau password admin salah');
        });
    }
}
