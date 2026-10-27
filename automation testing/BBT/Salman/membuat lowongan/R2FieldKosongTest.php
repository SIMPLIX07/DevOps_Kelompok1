<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R2FieldKosongTest extends DuskTestCase
{
    /**
     * Test Rule 2: Gagal membuat lowongan karena ada field wajib yang kosong.
     */
    public function test_membuat_lowongan_field_kosong(): void
    {
        $uniqueId = time();
        $email = 'salmanperusahaan' . $uniqueId . '@mail.com';

        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Salman Sukses ' . $uniqueId,
            'email'             => $email,
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '12.345.678.9-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        $this->browse(function (Browser $browser) use ($email) {
            //proses login
            $browser->visit('/login/perusahaan')
                ->type('email', $email)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-perusahaan')
                //proses tambah lowongan
                ->visit('/lowongan/tambah')
                ->waitForText('Tambah Lowongan')
                //hanya mengisi gaji dan deskripsi singkat
                ->type('gaji', 'Rp 12.000.000')
                ->type('deskripsi_singkat', 'Membangun dan memelihara aplikasi web berbasis Laravel.');

            $browser->script("document.querySelector('form').setAttribute('novalidate', 'novalidate');");

            $browser->press('Buat')
                ->waitForText('The kategori field is required.')
                // Tetap berada di halaman tambah lowongan dan melihat pesan error
                ->assertPathIs('/lowongan/tambah')
                ->assertSee('The kategori field is required.')
                ->assertSee('The posisi field is required.');
        });
    }
}
