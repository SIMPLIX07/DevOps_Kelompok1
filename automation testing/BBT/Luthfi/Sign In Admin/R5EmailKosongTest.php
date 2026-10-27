<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R5EmailKosongTest extends DuskTestCase
{
    /**
     * Test Rule 5: Sign in dengan email kosong.
     */
    public function test_login_email_kosong(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                // Hilangkan required di email agar bisa submit kosong
                ->script('document.getElementById("email").removeAttribute("required");');

            $browser->type('password', 'admin123')
                ->press('Masuk')
                ->waitForText('email')
                ->assertSee('email field is required');
        });
    }
}
