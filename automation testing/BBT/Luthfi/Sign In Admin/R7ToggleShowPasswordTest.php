<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R7ToggleShowPasswordTest extends DuskTestCase
{
    /**
     * Test Rule 7: Fungsionalitas Toggle Tampilkan/Sembunyikan Password.
     */
    public function test_toggle_show_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login');

            // 1. Awalnya type field password harus "password" dan icon "visibility"
            $typeBefore = $browser->attribute('#password', 'type');
            $this->assertEquals('password', $typeBefore, 'Tipe input awal harus password');
            $browser->assertSeeIn('#password-toggle-icon', 'visibility');

            // 2. Klik tombol toggle mata
            $browser->click('#password-toggle-icon')
                ->pause(200); // Tunggu sebentar untuk rendering JS

            // 3. Tipe input harus berubah menjadi "text" dan icon menjadi "visibility_off"
            $typeAfterClick1 = $browser->attribute('#password', 'type');
            $this->assertEquals('text', $typeAfterClick1, 'Tipe input setelah klik pertama harus text');
            $browser->assertSeeIn('#password-toggle-icon', 'visibility_off');

            // 4. Klik lagi tombol toggle mata
            $browser->click('#password-toggle-icon')
                ->pause(200);

            // 5. Tipe input harus kembali menjadi "password" dan icon menjadi "visibility"
            $typeAfterClick2 = $browser->attribute('#password', 'type');
            $this->assertEquals('password', $typeAfterClick2, 'Tipe input setelah klik kedua harus kembali ke password');
            $browser->assertSeeIn('#password-toggle-icon', 'visibility');
        });
    }
}
