<?php

namespace Tests\ExportCvPdf;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pelamar;
use App\Models\Cv;
use App\Models\Portofolio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class ExportCvPdfTest extends TestCase
{
    use RefreshDatabase;

    private $pelamar;
    private $cv;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Muhammad Salman',
            'username'     => 'salman',
            'email'        => 'salman@example.com',
            'no_telp'      => '081234567890',
            'password'     => bcrypt('password123'),
        ]);

        $this->cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'Saya seorang Fullstack Developer yang antusias dalam DevOps dan Cloud.',
            'kontak'       => '081234567890',
            'title'        => 'DevOps Engineer',
            'subtitle'     => 'Curriculum Vitae',
        ]);

        $this->cv->pendidikans()->create([
            'tingkat'     => 'S1',
            'universitas' => 'Telkom University',
            'jurusan'     => 'Teknik Informatika',
        ]);

        $this->cv->skills()->create([
            'skill'     => 'Laravel & Docker',
            'kemampuan' => 90,
        ]);

        $this->cv->pengalamans()->create([
            'pengalaman' => 'Backend Developer di Startup Tech',
            'durasi'     => '1 Tahun',
        ]);
    }

    /**
     * Test unit: Format nama file slug untuk download PDF sesuai nama pelamar.
     */
    public function test_cv_pdf_filename_slug_generation(): void
    {
        $safeName = Str::slug($this->cv->pelamar->nama_lengkap);
        $expectedFilename = "CV-{$safeName}.pdf";

        $this->assertEquals('CV-muhammad-salman.pdf', $expectedFilename);
    }

    /**
     * Test unit: View PDF CV dapat dirender tanpa error dan memuat data CV yang lengkap.
     */
    public function test_cv_pdf_view_renders_correctly(): void
    {
        $cv = $this->cv->load(['pelamar.portofolios', 'pendidikans', 'skills', 'pengalamans']);
        $attachedPortfolio = null;

        $renderedHtml = view('cv.pdf', compact('cv', 'attachedPortfolio'))->render();

        $this->assertStringContainsString('Muhammad Salman', $renderedHtml);
        $this->assertStringContainsString('DevOps Engineer', $renderedHtml);
        $this->assertStringContainsString('salman@example.com', $renderedHtml);
        $this->assertStringContainsString('Telkom University', $renderedHtml);
        $this->assertStringContainsString('Teknik Informatika', $renderedHtml);
        $this->assertStringContainsString('Laravel &amp; Docker', $renderedHtml);
        $this->assertStringContainsString('Backend Developer di Startup Tech', $renderedHtml);
    }

    /**
     * Test unit: View PDF CV dengan portofolio terlampir.
     */
    public function test_cv_pdf_view_with_attached_portfolio(): void
    {
        $portfolio = Portofolio::create([
            'pelamar_id' => $this->pelamar->id,
            'judul' => 'Sistem CI/CD Otomatis',
            'kategori' => 'DevOps',
            'teknologi' => 'GitHub Actions, Docker',
            'deskripsi' => 'Automasi pipeline testing dan deployment.',
            'link_demo' => 'https://demo.salman.dev',
            'link_repo' => 'https://github.com/salman/cicd',
        ]);

        $cv = $this->cv->load(['pelamar.portofolios', 'pendidikans', 'skills', 'pengalamans']);
        $attachedPortfolio = $portfolio;

        $renderedHtml = view('cv.pdf', compact('cv', 'attachedPortfolio'))->render();

        $this->assertStringContainsString('Portofolio Terlampir', $renderedHtml);
        $this->assertStringContainsString('Sistem CI/CD Otomatis', $renderedHtml);
        $this->assertStringContainsString('GitHub Actions, Docker', $renderedHtml);
    }

    /**
     * Test unit: DomPDF menghasilkan data biner PDF yang valid (%PDF-).
     */
    public function test_dompdf_generates_valid_pdf_binary(): void
    {
        $cv = $this->cv->load(['pelamar.portofolios', 'pendidikans', 'skills', 'pengalamans']);
        $attachedPortfolio = null;

        $pdf = Pdf::loadView('cv.pdf', compact('cv', 'attachedPortfolio'))->setPaper('a4', 'portrait');
        $output = $pdf->output();

        $this->assertNotEmpty($output);
        // Header PDF standar selalu diawali dengan %PDF-
        $this->assertStringStartsWith('%PDF-', $output);
    }

    /**
     * Test unit: Endpoint export-pdf mengembalikan response 200 dan content-type application/pdf.
     */
    public function test_export_pdf_endpoint_returns_pdf_stream(): void
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->get(route('cv.exportPdf', $this->cv->id));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }

    /**
     * Test unit: Pelamar lain tidak diizinkan mendownload CV yang bukan miliknya (403 Forbidden).
     */
    public function test_export_pdf_forbidden_for_unauthorized_pelamar(): void
    {
        $otherPelamar = Pelamar::create([
            'nama_lengkap' => 'Orang Lain',
            'username'     => 'oranglain',
            'email'        => 'lain@example.com',
            'password'     => bcrypt('secret123'),
        ]);

        $response = $this->withSession(['pelamar_id' => $otherPelamar->id])
            ->get(route('cv.exportPdf', $this->cv->id));

        $response->assertStatus(403);
    }
}

