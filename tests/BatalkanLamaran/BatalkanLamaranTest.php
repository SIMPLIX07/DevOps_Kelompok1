<?php

namespace Tests\BatalkanLamaran;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Lamaran;
use App\Models\Wawancara;

class BatalkanLamaranTest extends TestCase
{
    use RefreshDatabase;

    private $pelamar;
    private $perusahaan;
    private $lowongan;
    private $cv;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Muhammad Salman',
            'username'     => 'salman',
            'email'        => 'salman@example.com',
            'password'     => bcrypt('password123'),
        ]);

        $this->perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Telkom Indonesia',
            'email'             => 'hrd@telkom.co.id',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Bandung',
            'telepon'           => '022123456',
            'npwp'              => '1234567890',
            'status_verifikasi' => 'verified',
        ]);

        $this->lowongan = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'DevOps Engineer',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => '12000000',
            'deskripsi_singkat'   => 'Lowongan DevOps',
            'deskripsi_pekerjaan' => 'Mengelola pipeline CI/CD dan Kubernetes',
            'syarat'              => 'Memahami Docker dan Linux',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Japati No. 1',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $this->cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'DevOps enthusiast',
            'kontak'       => '081234567890',
            'title'        => 'DevOps CV',
            'subtitle'     => 'Curriculum Vitae',
        ]);
    }

    /**
     * Test unit: Membatalkan lamaran berstatus 'diproses' menghapus lamaran dari database.
     */
    public function test_batalkan_lamaran_status_diproses(): void
    {
        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        $this->assertDatabaseHas('lamarans', ['id' => $lamaran->id]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->delete(route('lamaran.batalkan', $lamaran->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Lamaran berhasil dibatalkan.');
        $this->assertDatabaseMissing('lamarans', ['id' => $lamaran->id]);
    }

    /**
     * Test unit: Membatalkan lamaran juga menghapus jadwal wawancara terkait jika ada.
     */
    public function test_batalkan_lamaran_cleans_up_associated_interview(): void
    {
        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'wawancara',
        ]);

        $wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-15',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
            'link_meet'     => 'https://meet.google.com/test-meet',
        ]);

        $this->assertDatabaseHas('wawancaras', ['id' => $wawancara->id]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->delete(route('lamaran.batalkan', $lamaran->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('lamarans', ['id' => $lamaran->id]);
        $this->assertDatabaseMissing('wawancaras', ['id' => $wawancara->id]);
    }

    /**
     * Test unit: Lamaran yang sudah berstatus 'diterima' tidak dapat dibatalkan.
     */
    public function test_cannot_cancel_already_accepted_lamaran(): void
    {
        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diterima',
        ]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->delete(route('lamaran.batalkan', $lamaran->id));

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('lamarans', ['id' => $lamaran->id, 'status' => 'diterima']);
    }

    /**
     * Test unit: Pelamar tidak dapat membatalkan lamaran milik pelamar lain.
     */
    public function test_cannot_cancel_other_pelamar_lamaran(): void
    {
        $otherPelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Utomo',
            'username'     => 'budiu',
            'email'        => 'budiu@example.com',
            'password'     => bcrypt('secret123'),
        ]);

        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        // Coba batalkan menggunakan session pelamar lain
        $response = $this->withSession(['pelamar_id' => $otherPelamar->id])
            ->delete(route('lamaran.batalkan', $lamaran->id));

        $response->assertStatus(404);
        $this->assertDatabaseHas('lamarans', ['id' => $lamaran->id]);
    }

    /**
     * Test unit: Pembatalan lamaran melalui request JSON mengembalikan respons JSON 200.
     */
    public function test_batalkan_lamaran_returns_json_response(): void
    {
        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->deleteJson(route('lamaran.batalkan', $lamaran->id));

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Lamaran berhasil dibatalkan.'
        ]);
        $this->assertDatabaseMissing('lamarans', ['id' => $lamaran->id]);
    }
}

