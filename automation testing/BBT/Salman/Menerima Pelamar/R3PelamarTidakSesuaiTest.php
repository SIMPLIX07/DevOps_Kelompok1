<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R3PelamarTidakSesuaiTest extends DuskTestCase
{
    /**
     * Test Rule 3: Gagal menerima pelamar karena ID Wawancara tidak terdaftar (Pelamar tidak sesuai).
     */
    public function test_terima_pelamar_tidak_sesuai(): void
    {
        $uniqueId = time();
        $email = 'salmanperusahaan' . $uniqueId . '@mail.com';

        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Wawancara Salman ' . $uniqueId,
            'email'             => $email,
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '12.345.678.9-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        $this->browse(function (Browser $browser) use ($email) {
            $browser->visit('/login/perusahaan')
                ->type('email', $email)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-perusahaan')
                
                ->visit('/perusahaan/wawancara')
                ->waitForText('Jadwal Wawancara');

            // Jalankan fetch dengan ID wawancara fiktif (999999)
            $browser->script("
                window.lastResponseStatus = null;
                fetch('/perusahaan/wawancara/999999/terima', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]').content,
                        'Content-Type': 'application/json'
                    }
                }).then(res => {
                    window.lastResponseStatus = res.status;
                });
            ");

            // Tunggu hingga status response didapatkan
            $browser->waitUntil("return window.lastResponseStatus !== null;", 5);
            $statusVal = $browser->script("return window.lastResponseStatus;");
            $status = is_array($statusVal) ? ($statusVal[0] ?? null) : $statusVal;

            // Memastikan server mengembalikan status 404 (Not Found)
            $this->assertEquals(404, (int)$status);
        });
    }
}
