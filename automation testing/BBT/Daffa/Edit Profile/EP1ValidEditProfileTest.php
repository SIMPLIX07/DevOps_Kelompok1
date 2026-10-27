<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pelamar;

class EP1ValidEditProfileTest extends DuskTestCase
{
    /**
     * Test mengubah profil pelamar dengan data valid.
     */
    public function test_edit_profile_sukses(): void
    {
        $uniqueId = time();
        $username = 'daffaprofile_' . $uniqueId;
        $email = 'daffaprofile_' . $uniqueId . '@mail.com';

        // 1. Buat Pelamar di DB
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Daffa Profile Editor ' . $uniqueId,
            'username'     => $username,
            'email'        => $email,
            'password'     => bcrypt('password123'),
        ]);

        $this->browse(function (Browser $browser) use ($pelamar, $uniqueId) {
            $updatedName = 'Daffa Profile Updated ' . $uniqueId;
            $updatedSkills = 'Laravel, PHP, Dusk Testing';
            $updatedUsername = 'daffanew_' . $uniqueId;
            $updatedEmail = 'daffanew_' . $uniqueId . '@mail.com';
            $updatedPhone = '08987654321';

            $browser->visit('/login/pelamar')
                ->type('username', $pelamar->username)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-pelamar')
                
                // Masuk ke halaman setting/profil
                ->visit('/pelamar/setting')
                ->waitForText('Akun')
                
                // Isi form dengan data baru
                ->type('nama_lengkap', $updatedName)
                ->type('keahlian', $updatedSkills)
                ->type('username', $updatedUsername)
                ->type('email', $updatedEmail)
                ->type('no_telp', $updatedPhone)
                
                // Simpan Perubahan
                ->press('Simpan Perubahan')
                ->waitForText('Profil berhasil diperbarui!')
                
                // Cek apakah nilai ter-update
                ->assertInputValue('nama_lengkap', $updatedName)
                ->assertInputValue('keahlian', $updatedSkills)
                ->assertInputValue('username', $updatedUsername)
                ->assertInputValue('email', $updatedEmail)
                ->assertInputValue('no_telp', $updatedPhone);
        });
    }
}
