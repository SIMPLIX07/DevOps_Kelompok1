<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R3StatusKosongTest extends DuskTestCase
{
    /**
     * Test Rule 3: Mengirim keputusan verifikasi tanpa memilih status (status_verifikasi = kosong).
     */
    public function test_submit_status_kosong(): void
    {
        $uniqueId = time();
        $companyName = 'PT EQP EmptyStatus ' . $uniqueId;
        $email = 'eqpempty' . $uniqueId . '@mail.com';

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
            $browser->visit('/admin/login')
                ->type('email', $adminEmail)
                ->type('password', $adminPassword)
                ->press('Masuk')
                ->waitForLocation('/admin/dashboard')
                
                // Cari dan buka detail
                ->clickLink('Daftar Perusahaan')
                ->waitForLocation('/admin/daftar-perusahaan')
                ->type('search', $companyName)
                ->press('Cari')
                ->waitForText($companyName)
                ->clickLink('Lihat Detail')
                ->waitForLocation('/admin/detail-perusahaan/' . $perusahaan->id)
                
                // Langsung tekan tombol simpan tanpa memilih status_verifikasi (verified/rejected)
                ->press('Simpan Keputusan')
                
                // Karena ada HTML5 required validation, browser tidak mengirim form
                // dan tetap bertahan pada halaman detail (tidak diarahkan ke dashboard)
                ->assertPathIs('/admin/detail-perusahaan/' . $perusahaan->id);
        });
    }
}
