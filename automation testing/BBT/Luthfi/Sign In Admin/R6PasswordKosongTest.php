<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R6PasswordKosongTest extends DuskTestCase
{
    /**
     * Test Rule 6: Sign in dengan password kosong.
     */
    public function test_login_password_kosong(): void
    {
        $adminEmail = config('admin.admin.email', 'admin@kerjayok.com');

        $this->browse(function (Browser $browser) use ($adminEmail) {
            $browser->visit('/admin/login')
                // Hilangkan required di password agar bisa submit kosong
                ->script('document.getElementById("password").removeAttribute("required");');

            $browser->type('email', $adminEmail)
                ->press('Masuk')
                ->waitForText('password')
                ->assertSee('password field is required');
        });
    }
}
