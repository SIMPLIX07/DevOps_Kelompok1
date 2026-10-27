<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pelamar;

class PelamarBrowserTest extends DuskTestCase
{
    /**
     * Test pelamar registration, view setting profile, and logout.
     */
    public function test_pelamar_registration_and_profile_management(): void
    {
        $uniqueId = time();
        $username = 'duskpelamar' . $uniqueId;
        $email = 'duskpelamar' . $uniqueId . '@mail.com';

        $this->browse(function (Browser $browser) use ($username, $email) {
            // 1. Registrasi Pelamar baru
            $browser->visit('/register/pelamar')
                ->type('nama_lengkap', 'Dusk Seeker')
                ->type('username', $username)
                ->type('email', $email)
                ->type('no_telp', '0812345678')
                ->type('password', 'password123')
                ->type('conf', 'password123')
                ->type('keahlian', 'PHP, Dusk, testing')
                ->press('Lanjut')
                ->waitForLocation('/home-pelamar')
                ->assertSee('KerjaYuk')
                
                // 2. Akses halaman setting
                ->visit('/pelamar/setting')
                ->waitForText('Akun')
                ->assertInputValue('nama_lengkap', 'Dusk Seeker')
                
                // 3. Update profil (mengubah nama lengkap)
                ->type('nama_lengkap', 'Dusk Seeker Updated')
                ->press('Simpan Perubahan')
                ->waitForText('Profil berhasil diperbarui!')
                ->assertInputValue('nama_lengkap', 'Dusk Seeker Updated')
                
                // 4. Logout
                ->press('Keluar')
                ->waitForLocation('/');
        });
    }

    /**
     * Test CV creation and portfolio management.
     */
    public function test_pelamar_cv_and_portofolio(): void
    {
        $uniqueId = time();
        $username = 'duskcvpelamar' . $uniqueId;
        $email = 'duskcvpelamar' . $uniqueId . '@mail.com';

        $this->browse(function (Browser $browser) use ($username, $email) {
            // 1. Registrasi Pelamar baru agar login
            $browser->visit('/register/pelamar')
                ->type('nama_lengkap', 'Dusk CV Seeker')
                ->type('username', $username)
                ->type('email', $email)
                ->type('no_telp', '0812345678')
                ->type('password', 'password123')
                ->type('conf', 'password123')
                ->type('keahlian', 'Laravel, Dusk')
                ->press('Lanjut')
                ->waitForLocation('/home-pelamar')
                
                // 2. Akses halaman CV (No 7)
                ->visit('/cv')
                ->waitForText('Daftar CV')
                ->clickLink('+ Tambah CV')
                ->waitForLocation('/cv/create')
                
                // 3. Isi form CV
                ->type('umur', '22')
                ->type('kontak', '081234567890')
                ->type('title', 'Software Engineer')
                ->type('subtitle', 'Backend Developer')
                ->type('tentang_saya', 'Saya adalah pengembang backend yang berdedikasi.')
                ->type('pendidikan[0][tingkat]', 'S1')
                ->type('pendidikan[0][universitas]', 'Universitas KerjaYuk')
                ->type('pendidikan[0][jurusan]', 'Teknik Informatika')
                ->press('Simpan CV')
                ->waitForLocation('/cv')
                ->assertSee('Software Engineer')
                
                // 4. Akses halaman Portofolio
                ->visit('/portofolio')
                ->waitForText('Daftar Portofolio')
                ->clickLink('+ Tambah Portofolio')
                ->waitForLocation('/portofolio/create')
                
                // 5. Isi form Portofolio
                ->type('judul', 'Project KerjaYuk Dusk')
                ->type('kategori', 'Testing')
                ->type('deskripsi', 'Automated testing project.')
                ->type('teknologi', 'Laravel Dusk')
                ->press('Simpan Portofolio')
                ->waitForLocation('/portofolio')
                ->assertSee('Project KerjaYuk Dusk')
                
                // 6. Hapus Portofolio
                ->press('Hapus')
                ->waitForLocation('/portofolio')
                ->assertDontSee('Project KerjaYuk Dusk')
                
                // 7. Keluar
                ->press('Keluar')
                ->waitForLocation('/');
        });
    }
}
