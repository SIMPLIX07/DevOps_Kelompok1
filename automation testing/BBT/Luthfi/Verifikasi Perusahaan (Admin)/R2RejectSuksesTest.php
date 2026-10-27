<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R2RejectSuksesTest extends DuskTestCase
{
    /**
     * Test Rule 2: Menolak pendaftaran perusahaan dengan alasan valid (status = rejected).
     */
    public function test_reject_perusahaan_sukses(): void
    {
        $uniqueId = time();
        $companyName = 'PT EQP Reject ' . $uniqueId;
        $email = 'eqpreject' . $uniqueId . '@mail.com';

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
                
                // Cari perusahaan
                ->clickLink('Daftar Perusahaan')
                ->waitForLocation('/admin/daftar-perusahaan')
                ->type('search', $companyName)
                ->press('Cari')
                ->waitForText($companyName)
                
                // Tolak perusahaan dengan menyertakan alasan
                ->clickLink('Lihat Detail')
                ->waitForLocation('/admin/detail-perusahaan/' . $perusahaan->id)
                ->radio('status_verifikasi', 'rejected')
                ->type('alasan_penolakan', 'Dokumen Sertifikat Perusahaan tidak valid/kadaluwarsa.')
                ->press('Simpan Keputusan')
                
                // Verifikasi hasil di dashboard
                ->waitForLocation('/admin/dashboard')
                ->assertSee('ditolak');
        });
    }
}
