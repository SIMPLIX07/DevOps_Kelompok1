<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;

class AdminVerifikasiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Menguji halaman login admin dapat dimuat.
     */
    public function test_admin_login_page_can_be_rendered()
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertViewIs('admin.loginAdmin');
    }

    /**
     * Menguji admin dapat login dengan kredensial yang valid dari config.
     */
    public function test_admin_can_login_with_valid_credentials()
    {
        $adminEmail = config('admin.admin.email') ?? 'admin@kerjayuk.com';
        $adminPassword = config('admin.admin.password') ?? 'admin123';

        $response = $this->post('/admin/login', [
            'email' => $adminEmail,
            'password' => $adminPassword,
        ]);

        $response->assertRedirect('/admin/dashboard');
        $response->assertSessionHas('admin_id', 'admin');
        $response->assertSessionHas('admin_email', $adminEmail);
    }

    /**
     * Menguji login admin gagal jika kredensial tidak valid.
     */
    public function test_admin_cannot_login_with_invalid_credentials()
    {
        $response = $this->post('/admin/login', [
            'email' => 'wrongadmin@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
        $response->assertSessionMissing('admin_id');
    }

    /**
     * Menguji tamu / pengguna yang tidak terautentikasi dialihkan oleh AdminMiddleware.
     */
    public function test_unauthenticated_user_cannot_access_dashboard()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
        $response->assertSessionHas('error', 'Anda harus login sebagai admin terlebih dahulu');
    }

    /**
     * Menguji admin dapat mengakses dashboard ketika sudah terautentikasi.
     */
    public function test_admin_can_access_dashboard_when_authenticated()
    {
        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard');
        $response->assertViewHasAll(['pendingPerusahaan', 'verifiedPerusahaan', 'rejectedPerusahaan', 'totalPerusahaan']);
    }

    /**
     * Menguji admin dapat melihat daftar perusahaan berstatus pending di dashboard.
     */
    public function test_admin_can_see_pending_companies_on_dashboard()
    {
        // Buat perusahaan pending
        $pendingCompany = Perusahaan::create([
            'nama_perusahaan' => 'PT Pending Sejahtera',
            'email' => 'pending@sejahtera.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Pending No. 1',
            'telepon' => '081234567890',
            'npwp' => '123456789',
            'status_verifikasi' => 'pending',
        ]);

        // Buat perusahaan verified (tidak boleh muncul di dashboard pendingPerusahaan)
        $verifiedCompany = Perusahaan::create([
            'nama_perusahaan' => 'PT Verified Sejahtera',
            'email' => 'verified@sejahtera.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Verified No. 2',
            'telepon' => '081234567891',
            'npwp' => '123456780',
            'status_verifikasi' => 'verified',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('PT Pending Sejahtera');
        $response->assertDontSee('PT Verified Sejahtera');
    }

    /**
     * Menguji admin dapat memfilter dan mencari di daftar perusahaan.
     */
    public function test_admin_can_filter_and_search_companies()
    {
        Perusahaan::create([
            'nama_perusahaan' => 'PT Indah Makmur',
            'email' => 'indah@makmur.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Indah No. 3',
            'telepon' => '081234567892',
            'npwp' => '123456781',
            'status_verifikasi' => 'verified',
        ]);

        Perusahaan::create([
            'nama_perusahaan' => 'CV Sukses Abadi',
            'email' => 'sukses@abadi.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Sukses No. 4',
            'telepon' => '081234567893',
            'npwp' => '123456782',
            'status_verifikasi' => 'rejected',
        ]);

        // Uji filter verified
        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/daftar-perusahaan?status=verified');

        $response->assertStatus(200);
        $response->assertSee('PT Indah Makmur');
        $response->assertDontSee('CV Sukses Abadi');

        // Uji search
        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/daftar-perusahaan?search=Sukses');

        $response->assertStatus(200);
        $response->assertSee('CV Sukses Abadi');
        $response->assertDontSee('PT Indah Makmur');
    }

    /**
     * Menguji tampilan halaman detail perusahaan.
     */
    public function test_admin_can_view_detail_perusahaan()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => 'PT Detail Uji',
            'email' => 'detail@uji.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Uji No. 5',
            'telepon' => '081234567894',
            'npwp' => '123456783',
            'status_verifikasi' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/detail-perusahaan/' . $perusahaan->id);

        $response->assertStatus(200);
        $response->assertSee('PT Detail Uji');
        $response->assertViewHas('perusahaan');
    }

    /**
     * Menguji admin dapat menyetujui (approve) perusahaan.
     */
    public function test_admin_can_approve_company()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => 'PT Calon Mitra',
            'email' => 'calon@mitra.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Mitra No. 6',
            'telepon' => '081234567895',
            'npwp' => '123456784',
            'status_verifikasi' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->post('/admin/verifikasi-perusahaan/' . $perusahaan->id, [
                'status_verifikasi' => 'verified',
            ]);

        $response->assertRedirect('/admin/dashboard');
        $response->assertSessionHas('success');

        // Pastikan di database berubah
        $perusahaan->refresh();
        $this->assertEquals('verified', $perusahaan->status_verifikasi);
        $this->assertNotNull($perusahaan->verified_at);
        $this->assertNull($perusahaan->alasan_penolakan);
    }

    /**
     * Menguji admin dapat menolak (reject) perusahaan beserta alasannya.
     */
    public function test_admin_can_reject_company_with_reason()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => 'PT Dokumen Palsu',
            'email' => 'palsu@dokumen.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Palsu No. 7',
            'telepon' => '081234567896',
            'npwp' => '123456785',
            'status_verifikasi' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->post('/admin/verifikasi-perusahaan/' . $perusahaan->id, [
                'status_verifikasi' => 'rejected',
                'alasan_penolakan' => 'NPWP tidak valid dan sertifikat buram.',
            ]);

        $response->assertRedirect('/admin/dashboard');
        $response->assertSessionHas('warning');

        // Pastikan di database status ditolak dan alasan tersimpan
        $perusahaan->refresh();
        $this->assertEquals('rejected', $perusahaan->status_verifikasi);
        $this->assertEquals('NPWP tidak valid dan sertifikat buram.', $perusahaan->alasan_penolakan);
        $this->assertNotNull($perusahaan->verified_at);
    }

    /**
     * Menguji admin dapat melihat riwayat verifikasi.
     */
    public function test_admin_can_view_verification_history()
    {
        Perusahaan::create([
            'nama_perusahaan' => 'PT Histori Sukses',
            'email' => 'histori@sukses.com',
            'password' => bcrypt('password123'),
            'alamat' => 'Jl. Histori No. 8',
            'telepon' => '081234567897',
            'npwp' => '123456786',
            'status_verifikasi' => 'verified',
            'verified_at' => now(),
        ]);

        $response = $this->withSession(['admin_id' => 'admin'])
            ->get('/admin/history-verifikasi');

        $response->assertStatus(200);
        $response->assertSee('PT Histori Sukses');
        $response->assertViewHas('history');
    }

    /**
     * Menguji admin dapat melakukan logout.
     */
    public function test_admin_can_logout()
    {
        $response = $this->withSession(['admin_id' => 'admin', 'admin_email' => 'admin@kerjayuk.com'])
            ->post('/admin/logout');

        $response->assertRedirect('/');
        $response->assertSessionMissing('admin_id');
        $response->assertSessionMissing('admin_email');
        $response->assertSessionHas('success', 'Anda telah logout dari panel admin');
    }
}
