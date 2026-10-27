<?php

namespace Tests\WBT\Salman\MembuatLowongan;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;

class R2FieldKosongTest extends TestCase
{
    use RefreshDatabase;

    private $perusahaan;

    protected function setUp(): void
    {
        parent::setUp();

        $this->perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Salman WBT Tekno',
            'email'             => 'salmanwbt@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '081234567890',
            'npwp'              => '12.345.678.9-000.000',
            'status_verifikasi' => 'verified',
        ]);
    }

    /**
     * WBT R2: Gagal membuat lowongan karena field wajib kosong
     */
    public function test_store_lowongan_field_kosong(): void
    {
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->post('/lowongan/tambah', [
                'kategori'          => '', // Kosong
                'posisi'            => '', // Kosong
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['kategori', 'posisi']);
    }
}
