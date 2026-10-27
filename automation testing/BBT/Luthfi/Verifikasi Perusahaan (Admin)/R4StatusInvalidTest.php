<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R4StatusInvalidTest extends DuskTestCase
{
    /**
     * Test Rule 4: Mengirim status verifikasi yang tidak valid (manipulasi HTML/API).
     */
    public function test_submit_status_invalid(): void
    {
        $uniqueId = time();
        $companyName = 'PT EQP InvalidStatus ' . $uniqueId;
        $email = 'eqpinvalid' . $uniqueId . '@mail.com';

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
                
                // Manipulasi value radio button menggunakan Javascript agar mengirim status 'pending' ke controller
                ->script([
                    "document.getElementById('status_verified').checked = true;",
                    "document.getElementById('status_verified').value = 'pending';"
                ]);

            // Submit form
            $browser->press('Simpan Keputusan')
                
                // Assert halaman kembali ke detail dengan menampilkan box error validasi
                ->waitForLocation('/admin/detail-perusahaan/' . $perusahaan->id)
                ->assertSee('status verifikasi')
                ->assertSee('invalid');
        });
    }
}
