<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R3PasswordSalahTest extends DuskTestCase
{
    /**
     * Test Rule 3: Sign in dengan password admin yang salah.
     */
    public function test_login_password_salah(): void
    {
        $adminEmail = config('admin.admin.email', 'admin@kerjayok.com');

        $this->browse(function (Browser $browser) use ($adminEmail) {
            $browser->visit('/admin/login')
                ->type('email', $adminEmail)
                ->type('password', 'passwordsalah123')
                ->press('Masuk')
                ->waitForText('Email atau password admin salah')
                ->assertSee('Email atau password admin salah');
        });
    }
}
