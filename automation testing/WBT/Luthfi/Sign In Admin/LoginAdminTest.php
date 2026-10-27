<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginAdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * WBT 1: Menguji halaman login admin dapat dimuat.
     */
    public function test_admin_login_page_can_be_rendered(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertViewIs('admin.loginAdmin');
    }

    /**
     * WBT 2: Menguji login admin sukses dengan kredensial yang valid.
     */
    public function test_admin_can_login_with_valid_credentials(): void
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
     * WBT 3: Menguji login admin gagal jika password/email salah.
     */
    public function test_admin_cannot_login_with_invalid_credentials(): void
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
     * WBT 4: Menguji tamu tidak terautentikasi dialihkan saat mengakses dashboard.
     */
    public function test_unauthenticated_user_cannot_access_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
    }

    /**
     * WBT 5: Menguji admin dapat melakukan logout dari panel.
     */
    public function test_admin_can_logout(): void
    {
        $response = $this->withSession(['admin_id' => 'admin', 'admin_email' => 'admin@kerjayuk.com'])
            ->post('/admin/logout');

        $response->assertRedirect('/');
        $response->assertSessionMissing('admin_id');
        $response->assertSessionMissing('admin_email');
    }
}
