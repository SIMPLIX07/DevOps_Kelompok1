<?php

namespace Tests\WBT\Salman\MembuatLowongan;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class R3AksesTanpaLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * WBT R3: Gagal membuat lowongan / dialihkan karena akses tanpa login perusahaan
     */
    public function test_store_lowongan_akses_tanpa_login(): void
    {
        $response = $this->post('/lowongan/tambah', [
            'kategori'          => 'Teknologi Informasi',
            'posisi'            => 'WBT Specialist',
        ]);

        $response->assertRedirect('/login/perusahaan');
    }
}
