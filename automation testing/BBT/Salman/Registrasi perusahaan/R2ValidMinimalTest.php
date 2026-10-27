<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class R2ValidMinimalTest extends DuskTestCase
{
    /**
     * Test Rule 2: Registrasi Perusahaan dengan data minimal yang valid (Tanpa Foto Profil & Website).
     */
    public function test_registrasi_valid_minimal(): void
    {
        $uniqueId = time();
        $email = 'salmanregmin' . $uniqueId . '@mail.com';
        $npwp = '00.000.000.0-000.' . substr($uniqueId, -3);

        // Berkas dummy
        $dummySertif = 'C:\\Telkom\\Tumbal\\Kerjakuy\\Perusahaan\\Sertifikat.pdf';

        $this->browse(function (Browser $browser) use ($email, $npwp, $dummySertif) {
            $browser->visit('/register/perusahaan')
                ->type('nama_perusahaan', 'PT Salman Tekno Minimal')
                ->type('email', $email)
                ->type('password', 'password123')
                ->type('telepon', '081234567890')
                ->type('npwp', $npwp)
                ->select('sektor_industri', 'Teknologi Informasi')
                ->type('alamat', 'Jl. Sudirman No. 12, Jakarta')
                ->type('deskripsi', 'Perusahaan teknologi minimal.')
                // Kosongkan foto_profil dan website
                ->script("
                    document.getElementById('sertifikat-input').removeAttribute('hidden');
                ");

            $browser->element('#sertifikat-input')->sendKeys(realpath($dummySertif));

            $browser->press('Daftar Sekarang')
                ->waitForLocation('/login/perusahaan')
                ->assertSee('Registrasi berhasil! Tunggu verifikasi dari admin');
        });
    }
}
