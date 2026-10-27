<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R1LoginSuksesTest extends DuskTestCase
{
    /**
     * Test Rule 1: Sign in dengan email dan password admin yang benar.
     */
    public function test_login_sukses(): void
    {
        $adminEmail = config('admin.admin.email', 'admin@kerjayok.com');
        $adminPassword = config('admin.admin.password', 'admin123');

        $this->browse(function (Browser $browser) use ($adminEmail, $adminPassword) {
            $browser->visit('/admin/login')
                ->type('email', $adminEmail)
                ->type('password', $adminPassword)
                ->press('Masuk')
                ->waitForLocation('/admin/dashboard')
                ->assertPathIs('/admin/dashboard')
                ->assertSee('Dashboard Admin');
        });
    }
}
