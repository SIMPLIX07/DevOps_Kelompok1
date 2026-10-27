<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R7SertifikatInvalidTest extends DuskTestCase
{
    /**
     * Test Rule 7: Gagal registrasi karena file sertifikat tidak valid (format TXT bukan PDF/JPG/PNG).
     */
    public function test_registrasi_sertifikat_invalid(): void
    {
        $uniqueId = time();
        $email = 'salmanreg' . $uniqueId . '@mail.com';
        $npwp = '00.000.000.0-000.' . substr($uniqueId, -3);

        // Buat file dummy TXT (format tidak valid)
        $invalidSertif = tempnam(sys_get_temp_dir(), 'sertif_') . '.txt';
        file_put_contents($invalidSertif, "This is an invalid text file format for certificate.");

        $this->browse(function (Browser $browser) use ($email, $npwp, $invalidSertif) {
            $browser->visit('/register/perusahaan')
                ->type('nama_perusahaan', 'PT Salman Tekno')
                ->type('email', $email)
                ->type('password', 'password123')
                ->type('telepon', '081234567890')
                ->type('npwp', $npwp)
                ->select('sektor_industri', 'Teknologi Informasi')
                ->type('alamat', 'Jl. Alamat')
                ->type('deskripsi', 'Deskripsi singkat')
                ->script("
                    document.getElementById('sertifikat-input').removeAttribute('hidden');
                ");

            $browser->element('#sertifikat-input')->sendKeys(realpath($invalidSertif));

            $browser->press('Daftar Sekarang')
                ->assertPathIs('/register/perusahaan')
                ->waitForText('must be a file of type')
                ->assertSee('sertifikat');
        });

        @unlink($invalidSertif);
    }
}
