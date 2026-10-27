<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Carbon\Carbon;

class R4FilterJenisPekerjaanTest extends DuskTestCase
{
    /**
     * Test Rule 4: Penyaringan (Filter) berdasarkan Jenis Pekerjaan.
     */
    public function test_filter_jenis_pekerjaan(): void
    {
        $uniqueId = time();
        $companyName = 'PT JobType Co ' . $uniqueId;
        $partTimeTitle = 'Part-Time Designer ' . $uniqueId;
        $fullTimeTitle = 'Full-Time Manager ' . $uniqueId;

        // Buat perusahaan
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => 'jtcompany' . $uniqueId . '@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '081234567892',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // Buat lowongan Part-time
        Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'Design',
            'posisi_pekerjaan'    => $partTimeTitle,
            'jenis_pekerjaan'     => 'Part-time',
            'gaji'                => 'Rp 3.500.000',
            'deskripsi_singkat'   => 'Dusk Test Short Desc PT',
            'deskripsi_pekerjaan' => 'Dusk Test Long Desc PT',
            'syarat'              => 'Dusk Test Requirements PT',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'SMA/SMK',
            'pengalaman'          => 'Tanpa Pengalaman',
            'keahlian_teknis'     => 'Figma, Canva',
        ]);

        // Buat lowongan Full-time
        Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'Management',
            'posisi_pekerjaan'    => $fullTimeTitle,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 12.000.000',
            'deskripsi_singkat'   => 'Dusk Test Short Desc FT',
            'deskripsi_pekerjaan' => 'Dusk Test Long Desc FT',
            'syarat'              => 'Dusk Test Requirements FT',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '3 Tahun',
            'keahlian_teknis'     => 'Management, Leadership',
        ]);

        $this->browse(function (Browser $browser) use ($partTimeTitle, $fullTimeTitle) {
            $browser->visit('/home-pelamar')
                // Klik tombol Filter untuk memunculkan panel filter
                ->click('#btn-filter-toggle')
                ->waitFor('#filter-panel')
                // Pilih opsi "Part-time" pada dropdown jenis_pekerjaan
                ->select('jenis_pekerjaan', 'Part-time')
                ->press('Terapkan Filter')
                // Pastikan lowongan Part-time tampil, dan lowongan Full-time tidak tampil
                ->waitForText($partTimeTitle)
                ->assertSee($partTimeTitle)
                ->assertDontSee($fullTimeTitle);
        });
    }
}
