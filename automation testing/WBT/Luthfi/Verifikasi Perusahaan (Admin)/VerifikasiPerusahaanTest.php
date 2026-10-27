<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;

class VerifikasiPerusahaanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * WBT 1: Menguji admin dapat melihat daftar perusahaan pending di dashboard.
     */
    public function test_admin_can_see_pending_companies_on_dashboard(): void
    {
        $pendingCompany = Perusahaan::create([
            'nama_perusahaan'   => 'PT Pending Sejahtera',
            'email'             => 'pending@sejahtera.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Jl. Pending No. 1',
            'telepon'           => '081234567890',
            'npwp'              => '123456789',
            'status_verifikasi' => 'pending',
        ]);

        $verifiedCompany = Perusahaan::create([
            'nama_perusahaan'   => 'PT Verified Sejahtera',
            'email'             => 'verified@sejahtera.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Jl. Verified No. 2',
            'telepon'           => '081234567891',
            'npwp'              => '123456780',
            'status_verifikasi' => 'verified',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('PT Pending Sejahtera');
        $response->assertDontSee('PT Verified Sejahtera');
    }

    /**
     * WBT 2: Menguji detail perusahaan dapat diakses oleh admin.
     */
    public function test_admin_can_view_detail_perusahaan(): void
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Detail Uji',
            'email'             => 'detail@uji.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Jl. Uji No. 5',
            'telepon'           => '081234567894',
            'npwp'              => '123456783',
            'status_verifikasi' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/detail-perusahaan/' . $perusahaan->id);

        $response->assertStatus(200);
        $response->assertSee('PT Detail Uji');
        $response->assertViewHas('perusahaan');
    }

    /**
     * WBT 3: Menguji logika approve perusahaan mengubah status verifikasi di database.
     */
    public function test_admin_can_approve_company(): void
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Calon Mitra',
            'email'             => 'calon@mitra.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Jl. Mitra No. 6',
            'telepon'           => '081234567895',
            'npwp'              => '123456784',
            'status_verifikasi' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->post('/admin/verifikasi-perusahaan/' . $perusahaan->id, [
                'status_verifikasi' => 'verified',
            ]);

        $response->assertRedirect('/admin/dashboard');
        $response->assertSessionHas('success');

        $perusahaan->refresh();
        $this->assertEquals('verified', $perusahaan->status_verifikasi);
        $this->assertNotNull($perusahaan->verified_at);
        $this->assertNull($perusahaan->alasan_penolakan);
    }

    /**
     * WBT 4: Menguji logika reject perusahaan dengan menyimpan alasan penolakan ke database.
     */
    public function test_admin_can_reject_company_with_reason(): void
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Dokumen Palsu',
            'email'             => 'palsu@dokumen.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Jl. Palsu No. 7',
            'telepon'           => '081234567896',
            'npwp'              => '123456785',
            'status_verifikasi' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->post('/admin/verifikasi-perusahaan/' . $perusahaan->id, [
                'status_verifikasi' => 'rejected',
                'alasan_penolakan'  => 'NPWP tidak valid dan sertifikat buram.',
            ]);

        $response->assertRedirect('/admin/dashboard');
        $response->assertSessionHas('warning');

        $perusahaan->refresh();
        $this->assertEquals('rejected', $perusahaan->status_verifikasi);
        $this->assertEquals('NPWP tidak valid dan sertifikat buram.', $perusahaan->alasan_penolakan);
        $this->assertNotNull($perusahaan->verified_at);
    }

    /**
     * WBT 5: Menguji admin dapat menyaring dan mencari perusahaan berdasarkan kata kunci.
     */
    public function test_admin_can_filter_and_search_companies(): void
    {
        Perusahaan::create([
            'nama_perusahaan'   => 'PT Indah Makmur',
            'email'             => 'indah@makmur.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Jl. Indah No. 3',
            'telepon'           => '081234567892',
            'npwp'              => '123456781',
            'status_verifikasi' => 'verified',
        ]);

        Perusahaan::create([
            'nama_perusahaan'   => 'CV Sukses Abadi',
            'email'             => 'sukses@abadi.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Jl. Sukses No. 4',
            'telepon'           => '081234567893',
            'npwp'              => '123456782',
            'status_verifikasi' => 'rejected',
        ]);

        // Cari 'Sukses' -> harus melihat CV Sukses Abadi tapi tidak PT Indah Makmur
        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/daftar-perusahaan?search=Sukses');

        $response->assertStatus(200);
        $response->assertSee('CV Sukses Abadi');
        $response->assertDontSee('PT Indah Makmur');
    }
}
