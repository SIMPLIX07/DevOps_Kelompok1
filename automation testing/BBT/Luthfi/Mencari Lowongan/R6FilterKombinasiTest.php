<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Carbon\Carbon;

class R6FilterKombinasiTest extends DuskTestCase
{
    /**
     * Test Rule 6: Penggabungan beberapa filter (Kombinasi).
     */
    public function test_filter_kombinasi(): void
    {
        $uniqueId = time();
        $companyName = 'PT Combo Co ' . $uniqueId;
        $perfectMatchTitle = 'React Developer ' . $uniqueId;
        $wrongLocationTitle = 'React Developer Jakarta ' . $uniqueId;
        $wrongKeywordTitle = 'PHP Backend Developer ' . $uniqueId;

        // Buat perusahaan
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => 'combocompany' . $uniqueId . '@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '081234567894',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // Job 1: Perfect Match (React Developer, Bandung, Part-time, Rp 4.000.000)
        Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'IT',
            'posisi_pekerjaan'    => $perfectMatchTitle,
            'jenis_pekerjaan'     => 'Part-time',
            'gaji'                => 'Rp 4.000.000',
            'deskripsi_singkat'   => 'Dusk Combo Match Short',
            'deskripsi_pekerjaan' => 'Dusk Combo Match Long',
            'syarat'              => 'Dusk Combo Match Req',
            'provinsi'            => '',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '1 Tahun',
            'keahlian_teknis'     => 'React, JS',
        ]);

        // Job 2: Wrong Location (React Developer, Jakarta, Part-time, Rp 4.000.000)
        Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'IT',
            'posisi_pekerjaan'    => $wrongLocationTitle,
            'jenis_pekerjaan'     => 'Part-time',
            'gaji'                => 'Rp 4.000.000',
            'deskripsi_singkat'   => 'Dusk Combo Match Short WL',
            'deskripsi_pekerjaan' => 'Dusk Combo Match Long WL',
            'syarat'              => 'Dusk Combo Match Req WL',
            'provinsi'            => '',
            'kabupaten'           => 'Jakarta',
            'kecamatan'           => 'Menteng',
            'alamat_lengkap'      => 'Jl. Thamrin No. 5',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '1 Tahun',
            'keahlian_teknis'     => 'React, JS',
        ]);

        // Job 3: Wrong Keyword (PHP Backend Developer, Bandung, Part-time, Rp 4.000.000)
        Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'IT',
            'posisi_pekerjaan'    => $wrongKeywordTitle,
            'jenis_pekerjaan'     => 'Part-time',
            'gaji'                => 'Rp 4.000.000',
            'deskripsi_singkat'   => 'Dusk Combo Match Short WK',
            'deskripsi_pekerjaan' => 'Dusk Combo Match Long WK',
            'syarat'              => 'Dusk Combo Match Req WK',
            'provinsi'            => '',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '1 Tahun',
            'keahlian_teknis'     => 'PHP, Laravel',
        ]);

        $this->browse(function (Browser $browser) use ($perfectMatchTitle, $wrongLocationTitle, $wrongKeywordTitle) {
            $browser->visit('/home-pelamar')
                // 1. Ketik kata kunci 'React Developer'
                ->type('q', 'React Developer')
                // 2. Pilih lokasi 'Bandung'
                ->click('#lokasi-dropdown-btn')
                ->click('#lokasi-options-list li[data-value="Bandung"]')
                // 3. Tekan Cari
                ->press('Cari Lowongan')
                ->waitForText($perfectMatchTitle)
                
                // 4. Klik Filter
                ->click('#btn-filter-toggle')
                ->waitFor('#filter-panel')
                // 5. Pilih jenis 'Part-time' & range 'under_5m'
                ->select('jenis_pekerjaan', 'Part-time')
                ->select('gaji_range', 'under_5m')
                // 6. Terapkan
                ->press('Terapkan Filter')
                
                // Pastikan hanya lowongan Perfect Match yang muncul
                ->waitForText($perfectMatchTitle)
                ->assertSee($perfectMatchTitle)
                ->assertDontSee($wrongLocationTitle)
                ->assertDontSee($wrongKeywordTitle);
        });
    }
}
