<?php

namespace Tests\WBT\Salman\MenerimaPelamar;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class R2ErrorLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * WBT R2: Gagal mengakses halaman kelola pelamar/wawancara karena belum login.
     */
    public function test_akses_wawancara_tanpa_login(): void
    {
        $response = $this->get('/perusahaan/wawancara');

        $response->assertRedirect('/login/perusahaan');
    }
}
