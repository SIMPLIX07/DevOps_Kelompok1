<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Perusahaan;
use App\Models\Pelamar;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Lamaran;
use App\Models\Wawancara;

class R1SuksesDiterimaTest extends DuskTestCase
{
    /**
     * Test Rule 1: Sukses menerima pelamar.
     */
    public function test_sukses_menerima_pelamar(): void
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

        $lowongan = Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Developer ' . $uniqueId,
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 10.000.000',
            'deskripsi_singkat'   => 'Dusk test',
            'deskripsi_pekerjaan' => 'Dusk test',
            'syarat'              => 'Dusk test',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
            'pendidikan'          => 'S1',
            'pengalaman'          => '1 tahun',
            'keahlian_teknis'     => 'PHP',
        ]);

        $cv = Cv::create([
            'pelamar_id'   => $pelamar->id,
            'umur'         => 22,
            'tentang_saya' => 'Saya developer',
            'kontak'       => '08123456',
            'title'        => 'CV Salman',
            'subtitle'     => 'CV',
        ]);

        $lamaran = Lamaran::create([
            'pelamar_id'  => $pelamar->id,
            'lowongan_id' => $lowongan->id,
            'cv_id'       => $cv->id,
            'status'      => 'wawancara',
        ]);

        $wawancara = Wawancara::create([
            'pelamar_id'    => $pelamar->id,
            'perusahaan_id' => $perusahaan->id,
            'lowongan_id'   => $lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-30',
            'jam_mulai'     => '10:00',
            'jam_selesai'   => '11:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);

        $this->browse(function (Browser $browser) use ($email, $uniqueId) {
            $browser->visit('/login/perusahaan')
                ->type('email', $email)
                ->type('password', 'password123')
                ->press('Masuk')
                ->waitForLocation('/home-perusahaan')
                
                ->visit('/perusahaan/wawancara')
                ->waitForText('Jadwal Wawancara')
                ->waitForText('Pelamar Salman ' . $uniqueId)
                ->press('Lihat Detail')
                ->waitForText('Undangan')
                ->press('Terima Pelamar')
                ->waitForText('Apakah Anda yakin')
                ->press('Terima')
                ->waitForText('Berhasil!')
                ->pause(1500); // Tunggu proses reload halaman
        });

        // Verifikasi database
        $wawancara->refresh();
        $this->assertEquals('selesai', $wawancara->status);

        $lamaran->refresh();
        $this->assertEquals('diterima', $lamaran->status);
    }
}
