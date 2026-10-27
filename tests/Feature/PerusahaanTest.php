<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Perusahaan;
use App\Models\Karyawan;
use App\Models\Pelamar;
use App\Models\Lowongan;

class PerusahaanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Menguji pendaftaran perusahaan baru beserta unggahan file dokumen NPWP/sertifikat dan foto profil berhasil.
     */
    public function test_register_perusahaan_success()
    {
        Storage::fake('public');

        $sertifikat = UploadedFile::fake()->create('sertifikat.pdf', 500, 'application/pdf');
        $fotoProfil = UploadedFile::fake()->create('logo.png', 100, 'image/png');

        $response = $this->post('/register/perusahaan', [
            'nama_perusahaan' => 'PT Test Indonesia',
            'email'           => 'test@perusahaan.com',
            'password'        => 'secret123',
            'telepon'         => '081234567890',
            'npwp'            => '12.345.678.9-012.000',
            'sertifikat'      => $sertifikat,
            'foto_profil'     => $fotoProfil,
        ]);

        $response->assertRedirect('/login/perusahaan');
        $response->assertSessionHas('info');

        $this->assertDatabaseHas('perusahaans', [
            'nama_perusahaan'   => 'PT Test Indonesia',
            'email'             => 'test@perusahaan.com',
            'telepon'           => '081234567890',
            'npwp'              => '12.345.678.9-012.000',
            'status_verifikasi' => 'pending',
        ]);

        $perusahaan = Perusahaan::where('email', 'test@perusahaan.com')->first();
        $this->assertNotNull($perusahaan);
        $this->assertTrue(Hash::check('secret123', $perusahaan->password));
        
        Storage::disk('public')->assertExists($perusahaan->sertifikat);
        Storage::disk('public')->assertExists($perusahaan->foto_profil);
    }

    /**
     * Menguji kegagalan validasi pendaftaran perusahaan.
     */
    public function test_register_perusahaan_validation_fails()
    {
        $response = $this->post('/register/perusahaan', [], ['Accept' => 'application/json']);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nama_perusahaan', 'email', 'password', 'telepon', 'npwp', 'sertifikat']);
    }

    /**
     * Menguji login berhasil untuk perusahaan yang sudah terverifikasi.
     */
    public function test_login_verified_perusahaan_success()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Verified',
            'email'             => 'verified@perusahaan.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
        ]);

        $response = $this->post('/login/perusahaan', [
            'email'    => 'verified@perusahaan.com',
            'password' => 'password123'
        ]);

        $response->assertRedirect('/home-perusahaan');
        $response->assertSessionHas('perusahaan_id', $perusahaan->id);
        $response->assertSessionHas('perusahaan_nama', 'PT Verified');
        $response->assertSessionHas('perusahaan_email', 'verified@perusahaan.com');
    }

    /**
     * Menguji login gagal untuk perusahaan yang status verifikasinya masih pending.
     */
    public function test_login_pending_perusahaan_fails()
    {
        Perusahaan::create([
            'nama_perusahaan'   => 'PT Pending',
            'email'             => 'pending@perusahaan.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'pending',
        ]);

        $response = $this->post('/login/perusahaan', [
            'email'    => 'pending@perusahaan.com',
            'password' => 'password123'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
        
        $errors = session('errors')->get('email');
        $this->assertStringContainsString('menunggu verifikasi', $errors[0]);
    }

    /**
     * Menguji login gagal untuk perusahaan yang status verifikasinya ditolak (rejected) beserta tampil alasannya.
     */
    public function test_login_rejected_perusahaan_fails()
    {
        Perusahaan::create([
            'nama_perusahaan'   => 'PT Rejected',
            'email'             => 'rejected@perusahaan.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'rejected',
            'alasan_penolakan'  => 'Dokumen palsu',
        ]);

        $response = $this->post('/login/perusahaan', [
            'email'    => 'rejected@perusahaan.com',
            'password' => 'password123'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);

        $errors = session('errors')->get('email');
        $this->assertStringContainsString('ditolak. Alasan: Dokumen palsu', $errors[0]);
    }

    /**
     * Menguji login perusahaan gagal jika menggunakan password yang salah.
     */
    public function test_login_wrong_password_fails()
    {
        Perusahaan::create([
            'nama_perusahaan'   => 'PT Verified',
            'email'             => 'verified@perusahaan.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
        ]);

        $response = $this->post('/login/perusahaan', [
            'email'    => 'verified@perusahaan.com',
            'password' => 'wrongpass'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
    }

    /**
     * Menguji tampilan halaman pengaturan akun perusahaan dapat dimuat.
     */
    public function test_view_pengaturan_akun_success()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Test',
            'email'             => 'test@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
        ]);

        $response = $this->withSession(['perusahaan_id' => $perusahaan->id])
            ->get('/perusahaan/pengaturan');

        $response->assertStatus(200);
        $response->assertViewIs('perusahaan.settingPerusahaan');
        $response->assertViewHas('perusahaan');
    }

    /**
     * Menguji halaman pengaturan akun dialihkan ke login jika diakses oleh tamu (guest).
     */
    public function test_view_pengaturan_akun_guest_redirects()
    {
        $response = $this->get('/perusahaan/pengaturan');

        $response->assertRedirect('/login/perusahaan');
    }

    /**
     * Menguji pembaruan data pengaturan akun perusahaan berhasil.
     */
    public function test_update_pengaturan_akun_success()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Awal',
            'email'             => 'awal@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
        ]);

        $response = $this->withSession(['perusahaan_id' => $perusahaan->id])
            ->post('/perusahaan/pengaturan', [
                'nama_perusahaan' => 'PT Baru',
                'email'           => 'baru@mail.com',
                'telepon'         => '08999',
                'lokasi'          => 'Jakarta',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Pengaturan akun berhasil diperbarui!');
        $response->assertSessionHas('perusahaan_nama', 'PT Baru');
        $response->assertSessionHas('perusahaan_email', 'baru@mail.com');

        $perusahaan->refresh();
        $this->assertEquals('PT Baru', $perusahaan->nama_perusahaan);
        $this->assertEquals('baru@mail.com', $perusahaan->email);
        $this->assertEquals('08999', $perusahaan->telepon);
        $this->assertEquals('Jakarta', $perusahaan->alamat);
    }

    /**
     * Menguji pembaruan foto profil perusahaan berhasil menghapus foto lama dan menyimpan foto baru.
     */
    public function test_update_foto_profil_success()
    {
        Storage::fake('public');

        $oldFoto = 'perusahaan/profil/old.png';
        Storage::disk('public')->put($oldFoto, 'content');

        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Test',
            'email'             => 'test@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
            'foto_profil'       => $oldFoto
        ]);

        $newFoto = UploadedFile::fake()->create('logo_new.png', 100, 'image/png');

        $response = $this->withSession(['perusahaan_id' => $perusahaan->id])
            ->post('/perusahaan/pengaturan/update-foto', [
                'foto_profil' => $newFoto
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Foto profil berhasil diperbarui!');

        $perusahaan->refresh();
        $this->assertNotEquals($oldFoto, $perusahaan->foto_profil);
        Storage::disk('public')->assertMissing($oldFoto);
        Storage::disk('public')->assertExists($perusahaan->foto_profil);
    }

    /**
     * Menguji pembaruan password perusahaan berhasil.
     */
    public function test_update_password_perusahaan_success()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Test',
            'email'             => 'test@mail.com',
            'password'          => bcrypt('oldpass'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
        ]);

        $response = $this->withSession(['perusahaan_id' => $perusahaan->id])
            ->post('/perusahaan/pengaturan/update-password', [
                'password_lama' => 'oldpass',
                'password_baru' => 'newpassword123',
                'password_baru_confirmation' => 'newpassword123',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Password berhasil diperbarui!');

        $perusahaan->refresh();
        $this->assertTrue(Hash::check('newpassword123', $perusahaan->password));
    }

    /**
     * Menguji logout perusahaan berhasil menghapus data session.
     */
    public function test_logout_perusahaan_success()
    {
        $response = $this->withSession([
            'perusahaan_id'    => 123,
            'perusahaan_nama'  => 'PT Test',
            'perusahaan_email' => 'test@mail.com',
        ])->post('/perusahaan/logout');

        $response->assertRedirect('/');
        $response->assertSessionMissing('perusahaan_id');
        $response->assertSessionMissing('perusahaan_nama');
        $response->assertSessionMissing('perusahaan_email');
    }

    /**
     * Menguji dashboard kategori karyawan aktif perusahaan dapat dimuat dengan jumlah kategori yang benar.
     */
    public function test_kategori_karyawan_success()
    {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Test',
            'email'             => 'test@mail.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
        ]);

        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Santoso',
            'username'     => 'budis',
            'email'        => 'budi@mail.com',
            'password'     => bcrypt('password123')
        ]);

        $lowongan = Lowongan::create([
            'perusahaan_id'       => $perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Developer',
            'jenis_pekerjaan'     => 'Fulltime',
            'gaji'                => '5000000',
            'deskripsi_singkat'   => 'Desk',
            'deskripsi_pekerjaan' => 'Desk full',
            'syarat'              => 'Syarat',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        Karyawan::create([
            'id_pelamar'         => $pelamar->id,
            'id_lowongan'        => $lowongan->id,
            'id_perusahaan'      => $perusahaan->id,
            'kategori_pekerjaan' => 'Teknologi',
            'posisi'             => 'Developer',
            'tanggal_mulai'      => now(),
            'status_karyawan'    => 'aktif'
        ]);

        $response = $this->withSession(['perusahaan_id' => $perusahaan->id])
            ->get('/karyawanPerusahaan');

        $response->assertStatus(200);
        $response->assertViewIs('karyawanPerusahaan');
        $response->assertViewHas('kategori');
        $response->assertViewHas('karyawans');

        $kategoriData = $response->viewData('kategori');
        $this->assertEquals(1, $kategoriData->first()->jumlah);
        $this->assertEquals('Teknologi', $kategoriData->first()->kategori_pekerjaan);
    }
}
