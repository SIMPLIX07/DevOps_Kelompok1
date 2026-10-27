<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R1ValidLengkapTest extends DuskTestCase
{
    /**
     * Test Rule 1: Registrasi Perusahaan dengan data valid dan lengkap (termasuk Foto Profil & Website).
     */
    public function test_registrasi_valid_lengkap(): void
    {
        $uniqueId = time();
        $email = 'salmanreg' . $uniqueId . '@mail.com';
        $npwp = '00.000.000.0-000.' . substr($uniqueId, -3);

        // Berkas dummy 
        $dummySertif = 'C:\\Telkom\\Tumbal\\Kerjakuy\\Perusahaan\\Sertifikat.pdf';
        $dummyPhoto = 'C:\\Telkom\\Tumbal\\Kerjakuy\\Perusahaan\\foto profil.png';

        $this->browse(function (Browser $browser) use ($email, $npwp, $dummySertif, $dummyPhoto) {
            $browser->visit('/register/perusahaan')
                ->type('nama_perusahaan', 'PT Salman Tekno Lengkap')
                ->type('email', $email)
                ->type('password', 'password123')
                ->type('telepon', '081234567890')
                ->type('npwp', $npwp)
                ->select('sektor_industri', 'Teknologi Informasi')
                ->type('alamat', 'Jl. Sudirman No. 12, Jakarta')
                ->type('deskripsi', 'Perusahaan teknologi yang bergerak di bidang software.')
                ->type('website', 'https://salmantekno.com')
                ->script("
                    document.getElementById('foto-profil-input').removeAttribute('hidden');
                    document.getElementById('sertifikat-input').removeAttribute('hidden');
                ");

            $browser->element('#foto-profil-input')->sendKeys(realpath($dummyPhoto));
            $browser->element('#sertifikat-input')->sendKeys(realpath($dummySertif));

            $browser->press('Daftar Sekarang')
                ->waitForLocation('/login/perusahaan')
                ->assertSee('Registrasi berhasil! Tunggu verifikasi dari admin');
        });
    }
}
