<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R1ApproveSuksesTest extends DuskTestCase
{
    /**
     * Test Rule 1: Menyetujui pendaftaran perusahaan yang valid (status = verified).
     */
    public function test_approve_perusahaan_sukses(): void
    {
        $uniqueId = time();
        $companyName = 'PT EQP Approve ' . $uniqueId;
        $email = 'eqpapprove' . $uniqueId . '@mail.com';

        // Buat data perusahaan pending secara dinamis di DB
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
                
                // Masuk ke halaman Daftar Perusahaan untuk mencari target
                ->clickLink('Daftar Perusahaan')
                ->waitForLocation('/admin/daftar-perusahaan')
                ->type('search', $companyName)
                ->press('Cari')
                ->waitForText($companyName)
                
                // Masuk ke Detail & Setujui
                ->clickLink('Lihat Detail')
                ->waitForLocation('/admin/detail-perusahaan/' . $perusahaan->id)
                ->assertSee($companyName)
                ->radio('status_verifikasi', 'verified')
                ->press('Simpan Keputusan')
                
                // Verifikasi hasil di dashboard
                ->waitForLocation('/admin/dashboard')
                ->assertSee('berhasil');
        });
    }
}
