<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Carbon\Carbon;

class R3FilterLokasiTest extends DuskTestCase
{
    /**
     * Test Rule 3: Penyaringan (Filter) berdasarkan Lokasi yang valid.
     */
    public function test_filter_lokasi_valid(): void
    {
        $uniqueId = time();
        $companyName = 'PT Location Co ' . $uniqueId;
        $jobTitle = 'Frontend Engineer ' . $uniqueId;
        $location = 'Bandung';

        // Buat perusahaan
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => 'loccompany' . $uniqueId . '@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '081234567891',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // Buat lowongan aktif di Bandung
        $lowongan = Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'IT',
            'posisi_pekerjaan'    => $jobTitle,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 6.000.000',
            'deskripsi_singkat'   => 'Dusk Test Short Desc',
            'deskripsi_pekerjaan' => 'Dusk Test Long Desc',
            'syarat'              => 'Dusk Test Requirements',
            'provinsi'            => '',
            'kabupaten'           => $location,
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '1 Tahun',
            'keahlian_teknis'     => 'CSS, HTML, JS',
        ]);

        $this->browse(function (Browser $browser) use ($jobTitle, $location) {
            $browser->visit('/home-pelamar')
                // Klik dropdown lokasi untuk membukanya
                ->click('#lokasi-dropdown-btn')
                // Klik opsi lokasi 'Bandung' (kita gunakan selector data-value)
                ->click('#lokasi-options-list li[data-value="' . $location . '"]')
                // Kirim pencarian
                ->press('Cari Lowongan')
                ->waitForText($jobTitle)
                ->assertSee($jobTitle);
        });
    }
}
