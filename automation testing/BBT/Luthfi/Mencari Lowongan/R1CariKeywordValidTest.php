<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Carbon\Carbon;

class R1CariKeywordValidTest extends DuskTestCase
{
    /**
     * Test Rule 1: Pencarian lowongan dengan kata kunci posisi yang valid.
     */
    public function test_cari_keyword_valid(): void
    {
        $uniqueId = time();
        $companyName = 'PT Search Company ' . $uniqueId;
        $jobTitle = 'Laravel Senior Developer ' . $uniqueId;

        // Buat perusahaan
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => 'searchcompany' . $uniqueId . '@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '081234567890',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // Buat lowongan aktif
        $lowongan = Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'IT',
            'posisi_pekerjaan'    => $jobTitle,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 8.000.000',
            'deskripsi_singkat'   => 'Dusk Test Short Desc',
            'deskripsi_pekerjaan' => 'Dusk Test Long Desc',
            'syarat'              => 'Dusk Test Requirements',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '2 Tahun',
            'keahlian_teknis'     => 'PHP, Laravel',
        ]);

        $this->browse(function (Browser $browser) use ($jobTitle) {
            $browser->visit('/home-pelamar')
                ->type('q', $jobTitle)
                ->press('Cari Lowongan')
                ->waitForText($jobTitle)
                ->assertSee($jobTitle);
        });
    }
}
