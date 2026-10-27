<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R4EmailFormatInvalidTest extends DuskTestCase
{
    /**
     * Test Rule 4: Sign in dengan format email yang tidak valid.
     */
    public function test_login_email_format_invalid(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                // Matikan validasi HTML5 bawaan browser lewat Javascript
                ->script([
                    'document.getElementById("email").removeAttribute("required");',
                    'document.getElementById("email").setAttribute("type", "text");'
                ]);

            $browser->type('email', 'admin.kerjayok.com')
                ->type('password', 'admin123')
                ->press('Masuk')
                ->waitForText('email') // Menunggu aserasi pesan error validasi email Laravel
                ->assertSee('valid email');
        });
    }
}
