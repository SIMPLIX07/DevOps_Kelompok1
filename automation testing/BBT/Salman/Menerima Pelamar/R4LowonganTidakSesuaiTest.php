<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Pelamar;
use App\Models\Cv;
use App\Models\Lamaran;
use App\Models\Wawancara;

class R4LowonganTidakSesuaiTest extends DuskTestCase
{
    /**
     * Test Rule 4: Gagal menerima pelamar karena Lowongan tidak sesuai/tidak ditemukan.
     */
    public function test_terima_pelamar_lowongan_tidak_sesuai(): void
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

        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Pelamar Salman ' . $uniqueId,
            'username'     => 'pelamarsalman' . $uniqueId,
            'email'        => 'pelamarsalman' . $uniqueId . '@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        $cv = Cv::create([
            'pelamar_id'   => $pelamar->id,
            'umur'         => 22,
            'tentang_saya' => 'Saya developer',
            'kontak'       => '08123456',
            'title'        => 'CV Salman',
            'subtitle'     => 'CV',
        ]);

        // Buat Wawancara dengan lowongan_id fiktif (999999) dengan menonaktifkan foreign key checks sementara
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        $wawancara = Wawancara::create([
            'pelamar_id'    => $pelamar->id,
            'perusahaan_id' => $perusahaan->id,
            'lowongan_id'   => 999999, // Lowongan fiktif
            'status'        => 'proses',
            'tanggal'       => '2026-06-30',
            'jam_mulai'     => '10:00',
            'jam_selesai'   => '11:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $this->browse(function (Browser $browser) use ($email, $wawancara) {
            $browser->visit('/login/perusahaan')
                ->type('email', $email)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-perusahaan')
                
                ->visit('/perusahaan/pengaturan')
                ->waitForText('Akun Perusahaan');

            // Kirim request terima ke Wawancara yang lowongannya tidak ada
            $browser->script("
                window.lastResponseStatus = null;
                let token = document.querySelector('input[name=\"_token\"]').value;
                fetch('/perusahaan/wawancara/" . $wawancara->id . "/terima', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Content-Type': 'application/json'
                    }
                }).then(res => {
                    window.lastResponseStatus = res.status;
                });
            ");

            $browser->waitUntil("return window.lastResponseStatus !== null;", 5);
            $statusVal = $browser->script("return window.lastResponseStatus;");
            $status = is_array($statusVal) ? ($statusVal[0] ?? null) : $statusVal;

            // Server harus mengembalikan status error (tidak boleh 200 OK)
            $this->assertNotEquals(200, (int)$status);
        });
    }
}
