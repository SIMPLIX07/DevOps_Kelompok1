<?php

namespace Tests\RekapPelamarCsv;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Portofolio;
use App\Models\Lamaran;

class RekapPelamarCsvTest extends TestCase
{
    use RefreshDatabase;

    private $perusahaan;
    private $lowongan;
    private $pelamar;
    private $cv;

    protected function setUp(): void
    {
        parent::setUp();

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
            'posisi_pekerjaan'    => 'DevOps Specialist',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => '15000000',
            'deskripsi_singkat'   => 'DevOps Lead',
            'deskripsi_pekerjaan' => 'Kubernetes & CI/CD pipeline management',
            'syarat'              => 'Pengalaman minimal 2 tahun',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Jl. Japati No. 1',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Muhammad Salman',
            'username'     => 'salman',
            'email'        => 'salman@telkom.dev',
            'no_telp'      => '08123456789',
            'password'     => bcrypt('password123'),
        ]);

        $this->cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 24,
            'tentang_saya' => 'DevOps Engineer passionate with automation',
            'kontak'       => '08123456789',
            'title'        => 'DevOps Engineer',
            'subtitle'     => 'Resume',
        ]);

        $this->cv->pendidikans()->create([
            'tingkat'     => 'S1',
            'universitas' => 'Telkom University',
            'jurusan'     => 'Informatika',
        ]);

        $this->cv->skills()->create([
            'skill'     => 'Docker',
            'kemampuan' => 95,
        ]);

        $this->cv->skills()->create([
            'skill'     => 'Kubernetes',
            'kemampuan' => 85,
        ]);
    }

    /**
     * Test unit: Ekspor CSV per lowongan menghasilkan response 200 dan header text/csv.
     */
    public function test_export_pelamar_csv_by_lowongan(): void
    {
        Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get(route('perusahaan.lowongan.exportCsv', $this->lowongan->id));

        $response->assertStatus(200);
        $this->assertStringContainsString('text/csv', $response->headers->get('content-type'));

        // Cek isi stream CSV
        $content = $response->streamedContent();
        $this->assertStringContainsString('Muhammad Salman', $content);
        $this->assertStringContainsString('salman@telkom.dev', $content);
        $this->assertStringContainsString('DevOps Specialist', $content);
        $this->assertStringContainsString('S1 Informatika - Telkom University', $content);
        $this->assertStringContainsString('Docker, Kubernetes', $content);
    }

    /**
     * Test unit: Output CSV diawali dengan UTF-8 BOM untuk kompatibilitas Microsoft Excel.
     */
    public function test_csv_output_contains_utf8_bom(): void
    {
        Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diproses',
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get(route('perusahaan.lowongan.exportCsv', $this->lowongan->id));

        $content = $response->streamedContent();
        $expectedBom = chr(0xEF) . chr(0xBB) . chr(0xBF);

        $this->assertStringStartsWith($expectedBom, $content);
    }

    /**
     * Test unit: CSV memuat struktur header kolom yang benar.
     */
    public function test_csv_has_correct_column_headers(): void
    {
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get(route('perusahaan.lowongan.exportCsv', $this->lowongan->id));

        $content = $response->streamedContent();

        $this->assertStringContainsString('No', $content);
        $this->assertStringContainsString('Nama Pelamar', $content);
        $this->assertStringContainsString('Email', $content);
        $this->assertStringContainsString('No. Telepon / Kontak', $content);
        $this->assertStringContainsString('Posisi Lowongan', $content);
        $this->assertStringContainsString('Status Lamaran', $content);
        $this->assertStringContainsString('Tanggal Melamar', $content);
        $this->assertStringContainsString('Pendidikan Terakhir', $content);
        $this->assertStringContainsString('Keahlian (Skills)', $content);
        $this->assertStringContainsString('Portofolio Terlampir', $content);
    }

    /**
     * Test unit: Rekap semua pelamar perusahaan dengan filter status.
     */
    public function test_export_all_pelamar_with_status_filter(): void
    {
        $pelamar2 = Pelamar::create([
            'nama_lengkap' => 'Pelamar Ditolak',
            'username'     => 'ditolak',
            'email'        => 'ditolak@mail.com',
            'password'     => bcrypt('secret'),
        ]);

        Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'diterima',
        ]);

        Lamaran::create([
            'pelamar_id'  => $pelamar2->id,
            'lowongan_id' => $this->lowongan->id,
            'status'      => 'ditolak',
        ]);

        // Filter status diterima
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get(route('perusahaan.rekapPelamarCsv', ['status' => 'diterima']));

        $content = $response->streamedContent();
        $this->assertStringContainsString('Muhammad Salman', $content);
        $this->assertStringNotContainsString('Pelamar Ditolak', $content);

        // Filter status ditolak
        $response2 = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get(route('perusahaan.rekapPelamarCsv', ['status' => 'ditolak']));

        $content2 = $response2->streamedContent();
        $this->assertStringContainsString('Pelamar Ditolak', $content2);
        $this->assertStringNotContainsString('Muhammad Salman', $content2);
    }

    /**
     * Test unit: Data portofolio terlampir tercantum dengan benar di dalam CSV.
     */
    public function test_csv_includes_portfolio_information(): void
    {
        $portofolio = Portofolio::create([
            'pelamar_id' => $this->pelamar->id,
            'judul'      => 'Microservices Platform Kubernetes',
            'kategori'   => 'Infrastructure',
            'teknologi'  => 'Golang, K8s',
        ]);

        Lamaran::create([
            'pelamar_id'    => $this->pelamar->id,
            'lowongan_id'   => $this->lowongan->id,
            'cv_id'         => $this->cv->id,
            'portofolio_id' => $portofolio->id,
            'status'        => 'diproses',
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get(route('perusahaan.lowongan.exportCsv', $this->lowongan->id));

        $content = $response->streamedContent();
        $this->assertStringContainsString('Microservices Platform Kubernetes', $content);
    }
}

