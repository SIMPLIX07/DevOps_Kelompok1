<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R2CariKeywordInvalidTest extends DuskTestCase
{
    /**
     * Test Rule 2: Pencarian lowongan dengan kata kunci yang tidak ada/tidak cocok.
     */
    public function test_cari_keyword_invalid(): void
    {
        $invalidKeyword = 'NonExistentJobTitle_' . time();

        $this->browse(function (Browser $browser) use ($invalidKeyword) {
            $browser->visit('/home-pelamar')
                ->type('q', $invalidKeyword)
                ->press('Cari Lowongan')
                ->waitForText('Tidak ada lowongan ditemukan')
                ->assertSee('Tidak ada lowongan ditemukan');
        });
    }
}
