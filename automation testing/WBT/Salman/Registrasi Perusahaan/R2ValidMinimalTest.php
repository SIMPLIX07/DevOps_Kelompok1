<?php

namespace Tests\WBT\Salman\RegistrasiPerusahaan;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Perusahaan;

class R2ValidMinimalTest extends TestCase
{
    use RefreshDatabase;

    /**
     * WBT R2: Registrasi Perusahaan dengan data minimal (tanpa website dan foto_profil).
     */
    public function test_registrasi_valid_minimal(): void
    {
        Storage::fake('public');

        $sertifikat = UploadedFile::fake()->create('sertifikat.pdf', 500, 'application/pdf');

        $response = $this->post('/register/perusahaan', [
            'nama_perusahaan' => 'PT Salman WBT Minimal',
            'email'           => 'salmanwbtmin@mail.com',
            'password'        => 'password123',
            'telepon'         => '081234567890',
            'npwp'            => '00.000.000.0-000.456',
            'sektor_industri' => 'Teknologi Informasi',
            'alamat'          => 'Jl. WBT Minimal No. 12',
            'deskripsi'       => 'Deskripsi minimal perusahaan WBT.',
            'sertifikat'      => $sertifikat,
            // Opsional dikosongkan: website, foto_profil
        ]);

        $response->assertRedirect('/login/perusahaan');
        $response->assertSessionHas('info');

        $this->assertDatabaseHas('perusahaans', [
            'nama_perusahaan'   => 'PT Salman WBT Minimal',
            'email'             => 'salmanwbtmin@mail.com',
            'status_verifikasi' => 'pending',
            'website'           => null,
            'foto_profil'       => null,
        ]);

        $perusahaan = Perusahaan::where('email', 'salmanwbtmin@mail.com')->first();
        Storage::disk('public')->assertExists($perusahaan->sertifikat);
    }
}
