<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;

class R4TglAkhirInvalidTest extends DuskTestCase
{
    /**
     * Test Rule 4: Gagal membuat lowongan karena Tanggal Akhir sebelum Tanggal Mulai.
     */
    public function test_membuat_lowongan_tgl_akhir_invalid(): void
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
            $browser->visit('/login/perusahaan')
                ->type('email', $email)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-perusahaan')
                
                ->visit('/lowongan/tambah')
                ->waitForText('Tambah Lowongan')
                ->type('kategori', 'Teknologi')
                ->type('posisi', 'Developer Salman')
                ->select('jenis', 'Full-time')
                ->type('gaji', 'Rp 12.000.000')
                ->type('deskripsi_singkat', 'Membangun dan memelihara aplikasi web berbasis Laravel.')
                ->type('deskripsi', 'Kami sedang mencari Software Developer yang berbakat untuk bergabung dengan tim kami. Tanggung jawab meliputi menulis kode yang bersih, merancang arsitektur database, serta berkolaborasi dengan tim produk.')
                ->type('syarat', 'Memiliki pemahaman yang kuat tentang OOP dan MVC.')
                ->type('pendidikan', 'S1 Teknik Informatika')
                ->type('pengalaman', 'Minimal 1 tahun')
                ->type('keahlian_teknis', 'PHP, Laravel, MySQL, Git')
                ->type('provinsi', 'Jawa Barat')
                ->type('kota', 'Bandung')
                ->type('kecamatan', 'Coblong')
                ->type('alamat', 'Jl. Ganesha No. 10');

            // Set tanggal_akhir sebelum tanggal_mulai
            $browser->script("
                document.getElementsByName('tanggal_mulai')[0].value = '2026-06-10';
                document.getElementsByName('tanggal_akhir')[0].value = '2026-06-05';
            ");

            $browser->press('Buat')
                ->waitForText('The tanggal akhir field must be a date after or equal to')
                ->assertPathIs('/lowongan/tambah')
                ->assertSee('The tanggal akhir field must be a date after or equal to');
        });
    }
}
