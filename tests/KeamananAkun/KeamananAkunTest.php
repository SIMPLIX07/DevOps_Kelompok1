<?php

namespace Tests\KeamananAkun;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Hash;

class KeamananAkunTest extends TestCase
{
    use RefreshDatabase;

    private $pelamar;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Ahmad Pelamar',
            'username'     => 'ahmadp',
            'email'        => 'ahmad@example.com',
            'password'     => Hash::make('oldpassword123'),
        ]);
    }

    /**
     * Tamu yang belum login harus dialihkan ke halaman login saat membuka /pelamar/keamanan.
     */
    public function test_guest_redirected_when_accessing_keamanan_page()
    {
        $response = $this->get('/pelamar/keamanan');
        $response->assertRedirect('/login/pelamar');
    }

    /**
     * Pelamar yang sudah login dapat mengakses halaman keamanan dengan sukses.
     */
    public function test_authenticated_pelamar_can_view_keamanan_page()
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->get('/pelamar/keamanan');

        $response->assertStatus(200);
        $response->assertSee('Keamanan dan Kata Sandi');
        $response->assertSee($this->pelamar->email);
    }

    /**
     * Pelamar berhasil mengubah password jika password lama benar dan password baru valid.
     */
    public function test_pelamar_can_change_password_with_valid_current_password()
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->post('/pelamar/update-password', [
                'password_lama'              => 'oldpassword123',
                'password_baru'              => 'newpassword456',
                'password_baru_confirmation' => 'newpassword456',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success_password', 'Password berhasil diperbarui');

        $this->pelamar->refresh();
        $this->assertTrue(Hash::check('newpassword456', $this->pelamar->password));
    }

    /**
     * Gagal mengubah password jika password lama yang dimasukkan salah.
     */
    public function test_change_password_fails_if_current_password_is_incorrect()
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->post('/pelamar/update-password', [
                'password_lama'              => 'wrongpassword',
                'password_baru'              => 'newpassword456',
                'password_baru_confirmation' => 'newpassword456',
            ]);

        $response->assertSessionHasErrors(['password_lama']);

        $this->pelamar->refresh();
        $this->assertTrue(Hash::check('oldpassword123', $this->pelamar->password));
    }

    /**
     * Gagal jika konfirmasi password baru tidak cocok.
     */
    public function test_change_password_fails_if_password_confirmation_mismatched()
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->post('/pelamar/update-password', [
                'password_lama'              => 'oldpassword123',
                'password_baru'              => 'newpassword456',
                'password_baru_confirmation' => 'mismatched456',
            ]);

        $response->assertSessionHasErrors(['password_baru']);

        $this->pelamar->refresh();
        $this->assertTrue(Hash::check('oldpassword123', $this->pelamar->password));
    }

    /**
     * Gagal jika password baru sama dengan password lama (edge case).
     */
    public function test_change_password_fails_if_new_password_is_same_as_old_password()
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->post('/pelamar/update-password', [
                'password_lama'              => 'oldpassword123',
                'password_baru'              => 'oldpassword123',
                'password_baru_confirmation' => 'oldpassword123',
            ]);

        $response->assertSessionHasErrors(['password_baru']);
    }
}

