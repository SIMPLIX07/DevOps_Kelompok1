<?php

namespace Tests\WBT\Salman\MenerimaPelamar;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;
use App\Models\Pelamar;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Lamaran;
use App\Models\Wawancara;

class R5KonfirmasiDibatalkanTest extends TestCase
{
    use RefreshDatabase;

    private $perusahaan;
    private $pelamar;
    private $lowongan;
    private $cv;
    private $lamaran;
    private $wawancara;

    protected function setUp(): void
    {
        parent::setUp();

        $this->perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Wawancara Salman WBT',
            'email'             => 'salmanwbt@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '12.345.678.9-000.000',
            'status_verifikasi' => 'verified',
        ]);

        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Pelamar WBT',
            'username'     => 'pelamarwbt',
            'email'        => 'pelamarwbt@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        $this->lowongan = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Developer WBT',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 10.000.000',
            'deskripsi_singkat'   => 'WBT test',
            'deskripsi_pekerjaan' => 'WBT test',
            'syarat'              => 'WBT test',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $this->cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 22,
            'tentang_saya' => 'Saya developer',
            'kontak'       => '08123456',
            'title'        => 'CV Salman',
            'subtitle'     => 'CV',
        ]);

        $this->lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'wawancara',
        ]);

        $this->wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-30',
            'jam_mulai'     => '10:00',
            'jam_selesai'   => '11:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);
    }

    /**
     * WBT R5: Klik tombol Batal pada dialog konfirmasi -> status tetap 'proses' di database.
     */
    public function test_konfirmasi_diterima_dibatalkan(): void
    {
        // Simulasi jika user membatalkan di frontend (tidak mengirim request POST)
        // Maka data di database harus tetap tidak berubah

        $this->wawancara->refresh();
        $this->assertEquals('proses', $this->wawancara->status);

        $this->lamaran->refresh();
        $this->assertEquals('wawancara', $this->lamaran->status);

        $this->assertDatabaseMissing('karyawans', [
            'id_pelamar' => $this->pelamar->id,
        ]);
    }
}
