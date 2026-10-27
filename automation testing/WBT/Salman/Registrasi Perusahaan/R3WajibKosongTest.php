<?php

namespace Tests\WBT\Salman\RegistrasiPerusahaan;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class R3WajibKosongTest extends TestCase
{
    use RefreshDatabase;

    /**
     * WBT R3: Gagal registrasi karena field wajib kosong (nama_perusahaan).
     */
    public function test_registrasi_wajib_kosong(): void
    {
        $response = $this->post('/register/perusahaan', [
            'nama_perusahaan' => '', // Sengaja kosong
            'email'           => 'salman@mail.com',
            'password'        => 'password123',
            'telepon'         => '081234567890',
            'npwp'            => '00.000.000.0-000.123',
            'sektor_industri' => 'Teknologi Informasi',
            'alamat'          => 'Jl. Alamat',
            'deskripsi'       => 'Deskripsi singkat.',
        ]);

        $response->assertStatus(302); // Redirect back
        $response->assertSessionHasErrors(['nama_perusahaan']);
    }
}
