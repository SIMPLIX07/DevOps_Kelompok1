<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Carbon\Carbon;

class R7SortingTerlamaTest extends DuskTestCase
{
    /**
     * Test Rule 7: Pengurutan lowongan berdasarkan tanggal rilis.
     */
    public function test_sorting_lowongan(): void
    {
        $uniqueId = time();
        $companyName = 'PT Sort Co ' . $uniqueId;
        $commonKeyword = 'SortingJob_' . $uniqueId;
        $oldJobTitle = 'Old Job ' . $commonKeyword;
        $newJobTitle = 'New Job ' . $commonKeyword;

        // Buat perusahaan
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => $companyName,
            'email'             => 'sortcompany' . $uniqueId . '@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '081234567895',
            'npwp'              => '11.222.333.4-' . substr($uniqueId, -4),
            'status_verifikasi' => 'verified',
        ]);

        // Buat lowongan lama (5 hari yang lalu)
        $oldLowongan = Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'IT',
            'posisi_pekerjaan'    => $oldJobTitle,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 7.000.000',
            'deskripsi_singkat'   => 'Dusk Test Old',
            'deskripsi_pekerjaan' => 'Dusk Test Old Long',
            'syarat'              => 'Dusk Test Old Req',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->subDays(10)->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '1 Tahun',
            'keahlian_teknis'     => 'Java',
        ]);
        // Set tanggal buatan di masa lalu
        $oldLowongan->created_at = Carbon::now()->subDays(5);
        $oldLowongan->save();

        // Buat lowongan baru (hari ini)
        $newLowongan = Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'IT',
            'posisi_pekerjaan'    => $newJobTitle,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 8.000.000',
            'deskripsi_singkat'   => 'Dusk Test New',
            'deskripsi_pekerjaan' => 'Dusk Test New Long',
            'syarat'              => 'Dusk Test New Req',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => Carbon::today()->toDateString(),
            'tanggal_berakhir'    => Carbon::tomorrow()->toDateString(),
            'pendidikan'          => 'S1',
            'pengalaman'          => '1 Tahun',
            'keahlian_teknis'     => 'Java',
        ]);

        $this->browse(function (Browser $browser) use ($commonKeyword, $oldJobTitle, $newJobTitle) {
            $browser->visit('/home-pelamar')
                // Cari menggunakan keyword unik agar hanya kedua lowongan ini yang tampil
                ->type('q', $commonKeyword)
                ->press('Cari Lowongan')
                ->waitForText($newJobTitle)
                ->waitForText($oldJobTitle);

            // Verifikasi default (terbaru pertama): lowongan baru berada di atas lowongan lama
            $indexNewDefault = $browser->script("
                var titles = Array.from(document.querySelectorAll('.job-title-clamp')).map(el => el.textContent.trim());
                return titles.indexOf('" . $newJobTitle . "');
            ");
            $indexOldDefault = $browser->script("
                var titles = Array.from(document.querySelectorAll('.job-title-clamp')).map(el => el.textContent.trim());
                return titles.indexOf('" . $oldJobTitle . "');
            ");

            $this->assertLessThan($indexOldDefault, $indexNewDefault, 'Secara default (Terbaru), lowongan baru harus berada di atas lowongan lama.');

            // Klik pengurutan 'Terbaru' (yang link-nya akan mengubah sort ke 'terlama')
            $browser->clickLink('Terbaru')
                // Tunggu halaman reload dengan order baru
                ->waitForText($oldJobTitle);

            // Verifikasi setelah diurutkan terlama: lowongan lama berada di atas lowongan baru
            $indexNewSorted = $browser->script("
                var titles = Array.from(document.querySelectorAll('.job-title-clamp')).map(el => el.textContent.trim());
                return titles.indexOf('" . $newJobTitle . "');
            ");
            $indexOldSorted = $browser->script("
                var titles = Array.from(document.querySelectorAll('.job-title-clamp')).map(el => el.textContent.trim());
                return titles.indexOf('" . $oldJobTitle . "');
            ");

            $this->assertLessThan($indexNewSorted, $indexOldSorted, 'Setelah diurutkan Terlama, lowongan lama harus berada di atas lowongan baru.');
        });
    }
}
