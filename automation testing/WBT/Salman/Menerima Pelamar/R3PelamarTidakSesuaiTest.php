<?php

namespace Tests\WBT\Salman\MenerimaPelamar;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;

class R3PelamarTidakSesuaiTest extends TestCase
{
    use RefreshDatabase;

    private $perusahaan;

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
    }

    /**
     * WBT R3: Gagal menerima pelamar karena ID Wawancara tidak terdaftar (Pelamar tidak sesuai).
     */
    public function test_terima_pelamar_tidak_sesuai(): void
    {
        // Kirim request terima ke ID wawancara fiktif (999999)
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->post('/perusahaan/wawancara/999999/terima');

        $response->assertStatus(404);
    }
}
