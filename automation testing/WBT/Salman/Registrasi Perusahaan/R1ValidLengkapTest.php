<?php

namespace Tests\WBT\Salman\RegistrasiPerusahaan;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Perusahaan;

class R1ValidLengkapTest extends TestCase
{
    use RefreshDatabase;

    /**
     * WBT R1: Registrasi Perusahaan dengan data lengkap & berkas valid.
     */
    public function test_registrasi_valid_lengkap(): void
    {
        Storage::fake('public');

        $sertifikat = UploadedFile::fake()->create('sertifikat.pdf', 500, 'application/pdf');
        $fotoProfil = UploadedFile::fake()->create('logo.png', 100, 'image/png');

        $response = $this->post('/register/perusahaan', [
            'nama_perusahaan' => 'PT Salman WBT Lengkap',
            'email'           => 'salmanwbt@mail.com',
            'password'        => 'password123',
            'telepon'         => '081234567890',
            'npwp'            => '00.000.000.0-000.123',
            'sektor_industri' => 'Teknologi Informasi',
            'alamat'          => 'Jl. WBT Lengkap No. 12',
            'deskripsi'       => 'Deskripsi lengkap perusahaan WBT.',
            'website'         => 'https://salmanwbt.com',
            'sertifikat'      => $sertifikat,
            'foto_profil'     => $fotoProfil,
        ]);

        $response->assertRedirect('/login/perusahaan');
        $response->assertSessionHas('info');

        $this->assertDatabaseHas('perusahaans', [
            'nama_perusahaan'   => 'PT Salman WBT Lengkap',
            'email'             => 'salmanwbt@mail.com',
            'status_verifikasi' => 'pending',
            'website'           => 'https://salmanwbt.com',
        ]);

        $perusahaan = Perusahaan::where('email', 'salmanwbt@mail.com')->first();
        Storage::disk('public')->assertExists($perusahaan->sertifikat);
        Storage::disk('public')->assertExists($perusahaan->foto_profil);
    }
}
