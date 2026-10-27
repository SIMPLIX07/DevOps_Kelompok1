<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\Models\Perusahaan;

class AdminLoginBrowserTest extends DuskTestCase
{
 
    public function test_admin_can_login_and_view_dashboard(): void
    {
        $adminEmail = config('admin.admin.email') ?? 'admin@kerjayuk.com';
        $adminPassword = config('admin.admin.password') ?? 'admin123';

        $this->browse(function (Browser $browser) use ($adminEmail, $adminPassword) {
            $browser->visit('/admin/login')
                ->assertSee('Admin')
                ->type('email', $adminEmail)
                ->type('password', $adminPassword)
                ->press('Login')
                ->waitForLocation('/admin/dashboard')
                ->assertSee('Daftar Perusahaan')
                ->press('Logout')
                ->waitForLocation('/');
        });
    }

    /**
     * Test admin filter dan verify perusahaan
     */
    public function test_admin_can_filter_and_verify_perusahaan(): void
    {
        $uniqueId = time();
        $companyName = 'Dusk Pending Company ' . $uniqueId;
        $email = 'duskpending' . $uniqueId . '@mail.com';

        // Buat perusahaan pending di DB secara dinamis
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => $email,
            'password'          => bcrypt('password123'),
            'telepon'           => '08987654321',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
            'status_verifikasi' => 'pending',
        ]);

        $adminEmail = config('admin.admin.email') ?? 'admin@kerjayuk.com';
        $adminPassword = config('admin.admin.password') ?? 'admin123';

        $this->browse(function (Browser $browser) use ($adminEmail, $adminPassword, $companyName, $perusahaan) {
            // 1. Login Admin
            $browser->visit('/admin/login')
                ->type('email', $adminEmail)
                ->type('password', $adminPassword)
                ->press('Login')
                ->waitForLocation('/admin/dashboard')
                
                // 2. Akses halaman Daftar Perusahaan
                ->clickLink('Daftar Perusahaan')
                ->waitForLocation('/admin/daftar-perusahaan')
                
                // 3. Filter / Pencarian Perusahaan
                ->type('search', $companyName)
                ->press('Cari')
                ->waitForText($companyName)
                ->assertSee($companyName)
                
                // 4. Lihat Detail & Verifikasi Perusahaan 
                ->clickLink('Lihat Detail')
                ->waitForLocation('/admin/detail-perusahaan/' . $perusahaan->id)
                ->assertSee($companyName)
                ->radio('status_verifikasi', 'verified')
                ->press('Simpan Keputusan')
                
                // 5. Kembali ke dashboard dan verifikasi sukses
                ->waitForLocation('/admin/dashboard')
                ->assertSee('berhasil') // memverifikasi session success/status updated
                
                // 6. Logout
                ->press('Logout')
                ->waitForLocation('/');
        });
    }
}
