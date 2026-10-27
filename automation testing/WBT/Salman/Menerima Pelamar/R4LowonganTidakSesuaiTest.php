<?php

namespace Tests\WBT\Salman\MenerimaPelamar;

$_ENV['DB_FOREIGN_KEYS'] = false;
$_SERVER['DB_FOREIGN_KEYS'] = false;
putenv('DB_FOREIGN_KEYS=false');

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;
use App\Models\Pelamar;
use App\Models\Wawancara;
use Illuminate\Support\Facades\Schema;

class R4LowonganTidakSesuaiTest extends TestCase
{
    use RefreshDatabase;

    private $perusahaan;
    private $pelamar;
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

        // Buat Wawancara dengan lowongan_id fiktif (999999) dengan menonaktifkan foreign key checks sementara
        Schema::disableForeignKeyConstraints();
        $this->wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => 999999, // Lowongan fiktif
            'status'        => 'proses',
            'tanggal'       => '2026-06-30',
            'jam_mulai'     => '10:00',
            'jam_selesai'   => '11:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);
        Schema::enableForeignKeyConstraints();
    }

    /**
     * WBT R4: Gagal menerima pelamar karena Lowongan tidak sesuai/tidak ditemukan.
     */
    public function test_terima_pelamar_lowongan_tidak_sesuai(): void
    {
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->post('/perusahaan/wawancara/' . $this->wawancara->id . '/terima');

        // Harus gagal (bukan 200 OK karena lowongan tidak ditemukan untuk dihubungkan sebagai karyawan)
        $response->assertStatus(500);
    }

    protected function tearDown(): void
    {
        $_ENV['DB_FOREIGN_KEYS'] = true;
        $_SERVER['DB_FOREIGN_KEYS'] = true;
        putenv('DB_FOREIGN_KEYS=true');

        parent::tearDown();
    }
}
