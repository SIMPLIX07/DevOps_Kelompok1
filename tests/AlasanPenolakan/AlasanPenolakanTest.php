<?php

namespace Tests\AlasanPenolakan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Lamaran;

class AlasanPenolakanTest extends TestCase
{
    use RefreshDatabase;

    private $pelamar;
    private $perusahaan;
    private $lowongan;
    private $cv;

    protected function setUp(): void
    {
        parent::setUp();

        // 1. Buat Pelamar
        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Santoso',
            'username'     => 'budis',
            'email'        => 'budi@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        // 2. Buat Perusahaan
        $this->perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Teknologi Indonesia',
            'email'             => 'tech@indonesia.com',
            'password'          => bcrypt('password123'),
            'alamat'            => 'Bandung',
            'telepon'           => '0221234567',
            'npwp'              => '0123456789',
            'status_verifikasi' => 'verified',
        ]);

        // 3. Buat Lowongan
        $this->lowongan = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Web Developer',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => '8000000',
            'deskripsi_singkat'   => 'Lowongan Web Developer',
            'deskripsi_pekerjaan' => 'Mengembangkan web app Laravel',
            'syarat'              => 'Minimal S1',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Ganesha No. 10',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        // 4. Buat Cv
        $this->cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 22,
            'tentang_saya' => 'Saya lulusan IT',
            'kontak'       => '081234567890',
            'title'        => 'Software Engineer CV',
            'subtitle'     => 'Curriculum Vitae',
        ]);
    }

    /**
     * Menguji penolakan lamaran dengan menyertakan alasan berhasil dan tersimpan di database.
     */
    public function test_reject_lamaran_with_reason_stores_note()
    {
        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        $alasan = 'Kualifikasi pengalaman kerja belum memenuhi kriteria posisi ini.';
        $response = $this->post('/lowongan/lamaran/' . $lamaran->id . '/tolak', [
            'alasan_penolakan' => $alasan,
        ]);

        $response->assertRedirect();

        $lamaran->refresh();
        $this->assertEquals('ditolak', $lamaran->status);
        $this->assertEquals($alasan, $lamaran->alasan_penolakan);
    }

    /**
     * Menguji penolakan lamaran tanpa alasan tetap berhasil (alasan bernilai null/opsional).
     */
    public function test_reject_lamaran_without_reason_stores_null_note()
    {
        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        $response = $this->post('/lowongan/lamaran/' . $lamaran->id . '/tolak', []);

        $response->assertRedirect();

        $lamaran->refresh();
        $this->assertEquals('ditolak', $lamaran->status);
        $this->assertNull($lamaran->alasan_penolakan);
    }

    /**
     * Menguji validasi gagal jika alasan penolakan melebihi batas maksimum 500 karakter (edge case).
     */
    public function test_reject_lamaran_fails_if_reason_too_long()
    {
        $lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        $longReason = str_repeat('a', 501);
        $response = $this->post('/lowongan/lamaran/' . $lamaran->id . '/tolak', [
            'alasan_penolakan' => $longReason,
        ]);

        $response->assertSessionHasErrors(['alasan_penolakan']);

        $lamaran->refresh();
        $this->assertEquals('diproses', $lamaran->status);
    }

    /**
     * Menguji pelamar dapat melihat alasan penolakan di halaman riwayat lamaran Anda.
     */
    public function test_applicant_can_see_rejection_reason_on_applications_page()
    {
        $alasan = 'Mohon maaf posisi sudah terisi.';
        $lamaran = Lamaran::create([
            'pelamar_id'       => $this->pelamar->id,
            'lowongan_id'      => $this->lowongan->id,
            'cv_id'            => $this->cv->id,
            'status'           => 'ditolak',
            'alasan_penolakan' => $alasan,
        ]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->get('/lamaran-anda');

        $response->assertStatus(200);
        $response->assertSee($alasan);
    }
}

