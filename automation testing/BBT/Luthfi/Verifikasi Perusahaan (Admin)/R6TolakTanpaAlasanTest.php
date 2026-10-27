<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R6TolakTanpaAlasanTest extends DuskTestCase
{
    /**
     * Test Rule 6: Menolak pendaftaran tanpa menyertakan alasan penolakan.
     */
    public function test_submit_tolak_tanpa_alasan(): void
    {
        $uniqueId = time();
        $companyName = 'PT EQP NoReason ' . $uniqueId;
        $email = 'eqpnoreason' . $uniqueId . '@mail.com';

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
                
                // Cari perusahaan
                ->clickLink('Daftar Perusahaan')
                ->waitForLocation('/admin/daftar-perusahaan')
                ->type('search', $companyName)
                ->press('Cari')
                ->waitForText($companyName)
                ->clickLink('Lihat Detail')
                ->waitForLocation('/admin/detail-perusahaan/' . $perusahaan->id)
                
                // Pilih 'Tolak' (status_verifikasi = rejected), biarkan alasan_penolakan kosong
                ->radio('status_verifikasi', 'rejected')
                ->press('Simpan Keputusan')
                
                // Karena JavaScript memicu input alasan menjadi 'required', browser memblokir pengiriman form
                // sehingga admin tetap berada di halaman detail perusahaan (tidak berpindah ke dashboard)
                ->assertPathIs('/admin/detail-perusahaan/' . $perusahaan->id);
        });
    }
}
