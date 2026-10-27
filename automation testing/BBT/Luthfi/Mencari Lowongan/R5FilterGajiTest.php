<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Carbon\Carbon;

class R5FilterGajiTest extends DuskTestCase
{
    /**
     * Test Rule 5: Penyaringan (Filter) berdasarkan Rentang Gaji.
     */
    public function test_filter_rentang_gaji(): void
    {
        $uniqueId = time();
        $companyName = 'PT Salary Co ' . $uniqueId;
        $lowSalaryTitle = 'Intern Clerk ' . $uniqueId;
        $highSalaryTitle = 'Expert Consultant ' . $uniqueId;

        // Buat perusahaan
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => 'salcompany' . $uniqueId . '@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '081234567893',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // Buat lowongan Gaji Rendah (Rp 3.500.000)
        Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'Administration',
            'posisi_pekerjaan'    => $lowSalaryTitle,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 3.500.000',
            'deskripsi_singkat'   => 'Dusk Test Short Desc LS',
            'deskripsi_pekerjaan' => 'Dusk Test Long Desc LS',
            'syarat'              => 'Dusk Test Requirements LS',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'SMA/SMK',
            'pengalaman'          => 'Tanpa Pengalaman',
            'keahlian_teknis'     => 'Admin, Excel',
        ]);

        // Buat lowongan Gaji Tinggi (Rp 18.000.000)
        Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'Consulting',
            'posisi_pekerjaan'    => $highSalaryTitle,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 18.000.000',
            'deskripsi_singkat'   => 'Dusk Test Short Desc HS',
            'deskripsi_pekerjaan' => 'Dusk Test Long Desc HS',
            'syarat'              => 'Dusk Test Requirements HS',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '5 Tahun',
            'keahlian_teknis'     => 'Consultancy, Strategy',
        ]);

        $this->browse(function (Browser $browser) use ($lowSalaryTitle, $highSalaryTitle) {
            $browser->visit('/home-pelamar')
                // Klik tombol Filter untuk memunculkan panel filter
                ->click('#btn-filter-toggle')
                ->waitFor('#filter-panel')
                // Pilih opsi "under_5m" (gaji < 5 juta)
                ->select('gaji_range', 'under_5m')
                ->press('Terapkan Filter')
                // Pastikan lowongan dengan gaji rendah tampil, dan gaji tinggi tersembunyi
                ->waitForText($lowSalaryTitle)
                ->assertSee($lowSalaryTitle)
                ->assertDontSee($highSalaryTitle);
        });
    }
}
