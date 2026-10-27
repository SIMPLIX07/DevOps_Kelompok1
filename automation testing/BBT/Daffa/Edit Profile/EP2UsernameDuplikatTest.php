<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pelamar;

class EP2UsernameDuplikatTest extends DuskTestCase
{
    /**
     * Test Mengubah profil dengan username yang sudah digunakan oleh pelamar lain.
     */
    public function test_edit_profile_username_duplikat(): void
    {
        $uniqueId = time();
        $usernameA = 'daffa_a_' . $uniqueId;
        $usernameB = 'daffa_b_' . $uniqueId;

        // 1. Buat Pelamar A
        $pelamarA = Pelamar::create([
            'nama_lengkap' => 'Daffa Pelamar A',
            'username'     => $usernameA,
            'email'        => 'daffa_a_' . $uniqueId . '@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        // 2. Buat Pelamar B
        $pelamarB = Pelamar::create([
            'nama_lengkap' => 'Daffa Pelamar B',
            'username'     => $usernameB,
            'email'        => 'daffa_b_' . $uniqueId . '@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        $this->browse(function (Browser $browser) use ($pelamarA, $usernameB) {
            $browser->visit('/login/pelamar')
                ->type('username', $pelamarA->username)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-pelamar')
                
                // Masuk ke halaman setting
                ->visit('/pelamar/setting')
                ->waitForText('Akun')
                
                // Ubah username Pelamar A menjadi username Pelamar B
                ->type('username', $usernameB)
                
                // Simpan Perubahan
                ->press('Simpan Perubahan')
                
                // Assert bahwa validation error duplikasi username muncul
                ->waitForText('The username has already been taken.')
                ->assertSee('The username has already been taken.');
        });
    }
}
