<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R5AlasanPanjangTest extends DuskTestCase
{
    /**
     * Test Rule 5: Menolak pendaftaran dengan deskripsi alasan terlalu panjang (> 500 karakter).
     */
    public function test_submit_alasan_terlalu_panjang(): void
    {
        $uniqueId = time();
        $companyName = 'PT EQP LongReason ' . $uniqueId;
        $email = 'eqplong' . $uniqueId . '@mail.com';

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

        // Buat string alasan penolakan 505 karakter (melebihi batas 500)
        $longReason = str_repeat('a', 505);

        $this->browse(function (Browser $browser) use ($adminEmail, $adminPassword, $companyName, $perusahaan, $longReason) {
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
                
                // Pilih Tolak dan ketik alasan 505 karakter
                ->radio('status_verifikasi', 'rejected')
                ->type('alasan_penolakan', $longReason)
                ->press('Simpan Keputusan')
                
                // Assert muncul pesan error validasi karakter
                ->waitForLocation('/admin/detail-perusahaan/' . $perusahaan->id)
                ->assertSee('alasan penolakan')
                ->assertSee('500');
        });
    }
}
