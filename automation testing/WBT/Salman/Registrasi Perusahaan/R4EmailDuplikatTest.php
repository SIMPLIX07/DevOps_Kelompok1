<?php

namespace Tests\WBT\Salman\RegistrasiPerusahaan;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;

class R4EmailDuplikatTest extends TestCase
{
    use RefreshDatabase;

    private $duplicateEmail = 'salmanduplicate@mail.com';

    protected function setUp(): void
    {
        parent::setUp();

        // Buat data perusahaan di database dengan email tersebut
        Perusahaan::create([
            'nama_perusahaan'   => 'Perusahaan Lama',
            'email'             => $this->duplicateEmail,
            'password'          => bcrypt('password123'),
            'telepon'           => '0812345678',
            'npwp'              => '12.345.678.9-000.999',
            'status_verifikasi' => 'verified',
        ]);
    }

    /**
     * WBT R4: Gagal registrasi karena email sudah terdaftar.
     */
    public function test_registrasi_email_duplikat(): void
    {
        $response = $this->post('/register/perusahaan', [
            'nama_perusahaan' => 'PT Baru Salman',
            'email'           => $this->duplicateEmail, // Email duplikat
            'password'        => 'password123',
            'telepon'         => '081234567800',
            'npwp'              => '99.888.777.6-555.444',
            'sektor_industri' => 'Teknologi Informasi',
            'alamat'            => 'Jl. Baru',
            'deskripsi'         => 'Deskripsi baru',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }
}
