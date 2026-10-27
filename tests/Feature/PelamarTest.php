<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Pelamar;
use App\Models\Keahlian;
use App\Models\Karyawan;

class PelamarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Menguji pendaftaran/registrasi pelamar baru beserta keahliannya berhasil.
     */
    public function test_register_pelamar_success()
    {
        $response = $this->post('/register/pelamar', [
            'nama_lengkap' => 'Pelamar Baru',
            'username'     => 'pelamarbaru',
            'email'        => 'pelamar@baru.com',
            'no_telp'      => '0812345678',
            'password'     => 'password123',
            'conf'         => 'password123',
            'keahlian'     => 'Laravel, PHP, VueJS'
        ]);

        $response->assertRedirect('/home-pelamar');
        $response->assertSessionHas('success', 'Registrasi berhasil!');
        $response->assertSessionHas('pelamar_username', 'pelamarbaru');
        $response->assertSessionHas('pelamar_nama', 'Pelamar Baru');

        $this->assertDatabaseHas('pelamars', [
            'nama_lengkap' => 'Pelamar Baru',
            'username'     => 'pelamarbaru',
            'email'        => 'pelamar@baru.com',
            'no_telp'      => '0812345678',
        ]);

        $pelamar = Pelamar::where('username', 'pelamarbaru')->first();
        $this->assertNotNull($pelamar);
        $this->assertTrue(Hash::check('password123', $pelamar->password));

        $this->assertDatabaseHas('keahlians', [
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'Laravel'
        ]);
        $this->assertDatabaseHas('keahlians', [
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'PHP'
        ]);
        $this->assertDatabaseHas('keahlians', [
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'VueJS'
        ]);
    }

    /**
     * Menguji kegagalan validasi pendaftaran pelamar.
     */
    public function test_register_pelamar_validation_fails()
    {
        $response = $this->post('/register/pelamar', [
            'nama_lengkap' => '',
            'username'     => '',
            'email'        => 'not-an-email',
            'password'     => '12',
            'conf'         => 'different-password',
        ], ['Accept' => 'application/json']);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nama_lengkap', 'username', 'email', 'password', 'conf']);
    }

    /**
     * Menguji login pelamar dengan kredensial yang valid berhasil.
     */
    public function test_login_pelamar_success()
    {
        Http::fake([
            'http://localhost:3001/login-pelamar' => Http::response([
                'id'       => 123,
                'username' => 'budi_santoso',
                'nama'     => 'Budi Santoso'
            ], 200)
        ]);

        $response = $this->post('/login/pelamar', [
            'username' => 'budi_santoso',
            'password' => 'password123'
        ]);

        $response->assertRedirect('/home-pelamar');
        $response->assertSessionHas('pelamar_id', 123);
        $response->assertSessionHas('pelamar_username', 'budi_santoso');
        $response->assertSessionHas('pelamar_nama', 'Budi Santoso');
    }

    /**
     * Menguji login pelamar gagal jika kredensial tidak valid pada server Node.js.
     */
    public function test_login_pelamar_fails_when_wrong_credentials()
    {
        Http::fake([
            'http://localhost:3001/login-pelamar' => Http::response([
                'message' => 'Username atau password salah'
            ], 401)
        ]);

        $response = $this->post('/login/pelamar', [
            'username' => 'wrong_user',
            'password' => 'wrong_pass'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['login']);
    }

    /**
     * Menguji login pelamar gagal jika server Node.js sedang offline.
     */
    public function test_login_pelamar_fails_when_server_offline()
    {
        Http::fake(function ($request) {
            throw new \Exception("Connection refused");
        });

        $response = $this->post('/login/pelamar', [
            'username' => 'budi_santoso',
            'password' => 'password123'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['login']);
    }

    /**
     * Menguji tampilan halaman pengaturan akun pelamar berhasil dimuat.
     */
    public function test_view_settings_page_success()
    {
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Santoso',
            'username'     => 'budis',
            'email'        => 'budi@mail.com',
            'password'     => bcrypt('password123')
        ]);

        Keahlian::create([
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'PHP'
        ]);

        $response = $this->withSession(['pelamar_id' => $pelamar->id])
            ->get('/pelamar/setting');

        $response->assertStatus(200);
        $response->assertViewIs('setting');
        $response->assertViewHas('pelamar');
        $response->assertViewHas('keahlianString', 'PHP');
    }

    /**
     * Menguji tampilan halaman pengaturan akun dialihkan ke halaman login jika diakses sebagai tamu (guest).
     */
    public function test_view_settings_page_redirect_when_guest()
    {
        $response = $this->get('/pelamar/setting');

        $response->assertRedirect('/login/pelamar');
    }

    /**
     * Menguji pembaruan profil pelamar beserta unggahan foto profil dan pembaruan keahlian berhasil.
     */
    public function test_update_profile_success()
    {
        Storage::fake('public');

        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Lama',
            'username'     => 'budilama',
            'email'        => 'budi@lama.com',
            'password'     => bcrypt('password123')
        ]);

        Keahlian::create([
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'CSS'
        ]);

        $file = UploadedFile::fake()->create('profil.jpg', 100, 'image/jpeg');

        $response = $this->withSession(['pelamar_id' => $pelamar->id])
            ->post('/pelamar/setting/update', [
                'nama_lengkap' => 'Budi Baru',
                'username'     => 'budibaru',
                'email'        => 'budi@baru.com',
                'no_telp'      => '0812345678',
                'foto_profil'  => $file,
                'keahlian'     => 'HTML, JS'
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Profil berhasil diperbarui!');

        $pelamar->refresh();
        $this->assertEquals('Budi Baru', $pelamar->nama_lengkap);
        $this->assertEquals('budibaru', $pelamar->username);
        $this->assertEquals('budi@baru.com', $pelamar->email);
        $this->assertEquals('0812345678', $pelamar->no_telp);
        $this->assertNotNull($pelamar->foto_profil);

        // Pastikan file tersimpan di storage
        Storage::disk('public')->assertExists($pelamar->foto_profil);

        // Pastikan keahlian terupdate (CSS terhapus, HTML & JS ditambahkan)
        $this->assertDatabaseMissing('keahlians', [
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'CSS'
        ]);
        $this->assertDatabaseHas('keahlians', [
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'HTML'
        ]);
        $this->assertDatabaseHas('keahlians', [
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'JS'
        ]);
    }

    /**
     * Menguji pembaruan password pelamar berhasil.
     */
    public function test_update_password_success()
    {
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Santoso',
            'username'     => 'budis',
            'email'        => 'budi@mail.com',
            'password'     => bcrypt('oldpassword')
        ]);

        $response = $this->withSession(['pelamar_id' => $pelamar->id])
            ->post('/pelamar/update-password', [
                'password_lama' => 'oldpassword',
                'password_baru' => 'newpassword123',
                'password_baru_confirmation' => 'newpassword123',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success_password', 'Password berhasil diperbarui');

        $pelamar->refresh();
        $this->assertTrue(Hash::check('newpassword123', $pelamar->password));
    }

    /**
     * Menguji kegagalan pembaruan password jika password lama salah.
     */
    public function test_update_password_fails_with_wrong_old_password()
    {
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Santoso',
            'username'     => 'budis',
            'email'        => 'budi@mail.com',
            'password'     => bcrypt('oldpassword')
        ]);

        $response = $this->withSession(['pelamar_id' => $pelamar->id])
            ->post('/pelamar/update-password', [
                'password_lama' => 'wrongoldpassword',
                'password_baru' => 'newpassword123',
                'password_baru_confirmation' => 'newpassword123',
            ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['password_lama']);
        
        $pelamar->refresh();
        $this->assertTrue(Hash::check('oldpassword', $pelamar->password));
    }

    /**
     * Menguji logout pelamar berhasil menghapus data session.
     */
    public function test_logout_pelamar()
    {
        $response = $this->withSession([
            'pelamar_id'       => 123,
            'pelamar_username' => 'budi',
        ])->post('/pelamar/logout');

        $response->assertRedirect('/');
        $response->assertSessionMissing('pelamar_id');
        $response->assertSessionMissing('pelamar_username');
    }

    /**
     * Menguji penghapusan akun pelamar berhasil beserta penghapusan keahlian dan file foto profil dari storage.
     */
    public function test_delete_account_success()
    {
        Storage::fake('public');

        // Simpan file pura-pura untuk foto profil
        $filePath = 'pelamar/profil/test.jpg';
        Storage::disk('public')->put($filePath, 'content');

        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Santoso',
            'username'     => 'budis',
            'email'        => 'budi@mail.com',
            'password'     => bcrypt('password123'),
            'foto_profil'  => $filePath
        ]);

        Keahlian::create([
            'pelamar_id'    => $pelamar->id,
            'nama_keahlian' => 'PHP'
        ]);

        $response = $this->withSession(['pelamar_id' => $pelamar->id])
            ->delete('/pelamar/hapus-akun');

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Akun berhasil dihapus');
        $response->assertSessionMissing('pelamar_id');

        // Cek database data terhapus
        $this->assertDatabaseMissing('pelamars', ['id' => $pelamar->id]);
        $this->assertDatabaseMissing('keahlians', ['pelamar_id' => $pelamar->id]);

        // Cek file foto profil dihapus
        Storage::disk('public')->assertMissing($filePath);
    }

    /**
     * Menguji bahwa menghapus akun pelamar juga menghapus data karyawannya.
     */
    public function test_delete_account_deletes_karyawan()
    {
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Karyawan',
            'username'     => 'budikaryawan',
            'email'        => 'budi@karyawan.com',
            'password'     => bcrypt('password123'),
        ]);

        Karyawan::create([
            'id_pelamar'        => $pelamar->id,
            'id_lowongan'       => 1,
            'id_perusahaan'     => 1,
            'kategori_pekerjaan' => 'IT',
            'posisi'            => 'Developer',
            'tanggal_mulai'     => now(),
            'status_karyawan'   => 'aktif',
        ]);

        $this->assertDatabaseHas('karyawans', [
            'id_pelamar' => $pelamar->id,
        ]);

        $response = $this->withSession(['pelamar_id' => $pelamar->id])
            ->delete('/pelamar/hapus-akun');

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Akun berhasil dihapus');

        $this->assertDatabaseMissing('pelamars', ['id' => $pelamar->id]);
        $this->assertDatabaseMissing('karyawans', ['id_pelamar' => $pelamar->id]);
    }
}
