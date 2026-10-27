<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Pelamar;
use App\Models\Cv;
use App\Models\Pendidikan;
use App\Models\SkillCv;
use App\Models\Pengalaman;

class CvTest extends TestCase
{
    use RefreshDatabase;

    private $pelamar;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi CV',
            'username'     => 'budicv',
            'email'        => 'budi.cv@mail.com',
            'password'     => bcrypt('password123'),
        ]);
    }

    /**
     * Menguji halaman utama CV menampilkan daftar CV untuk pengguna yang masuk.
     */
    public function test_cv_index_page()
    {
        $response = $this->get('/cv');
        $response->assertRedirect('/login');

        Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'IT Graduate',
            'kontak'       => '0812',
            'title'        => 'CV IT',
            'subtitle'     => 'Resume',
        ]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->get('/cv');

        $response->assertStatus(200);
        $response->assertViewIs('indexCv');
        $response->assertViewHas('cvs');
        $this->assertEquals(1, $response->viewData('cvs')->count());
    }

    /**
     * Menguji halaman pembuatan CV baru dapat dimuat.
     */
    public function test_create_cv_page()
    {
        $response = $this->get('/cv/create');
        $response->assertRedirect('/login');

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->get('/cv/create');
        
        $response->assertStatus(200);
        $response->assertViewIs('cv.tambahCv');
        $response->assertViewHas('pelamar');
    }

    /**
     * Menguji berhasil menyimpan CV baru beserta relasi pendidikan, skill, dan pengalaman.
     */
    public function test_store_cv_success()
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->post('/cv', [
                'umur'         => 24,
                'kontak'       => '0812345678',
                'title'        => 'Software Engineer Resume',
                'subtitle'     => 'Curriculum Vitae',
                'tentang_saya' => 'I love coding in Laravel and testing.',
                'pendidikan'   => [
                    [
                        'tingkat'     => 'S1',
                        'universitas' => 'ITB',
                        'jurusan'     => 'Teknik Informatika'
                    ]
                ],
                'skill' => [
                    [
                        'skill'     => 'PHP',
                        'kemampuan' => 'Advance'
                    ]
                ],
                'pengalaman' => [
                    [
                        'pengalaman' => 'Web Developer PT Tech',
                        'durasi'     => '2 Tahun'
                    ]
                ]
            ]);

        $response->assertRedirect('/cv');
        $response->assertSessionHas('success', 'CV berhasil disimpan');

        $this->assertDatabaseHas('cvs', [
            'pelamar_id' => $this->pelamar->id,
            'umur'       => 24,
            'title'      => 'Software Engineer Resume',
        ]);

        $cv = Cv::where('pelamar_id', $this->pelamar->id)->first();
        $this->assertNotNull($cv);

        $this->assertDatabaseHas('pendidikans', [
            'cv_id'       => $cv->id,
            'tingkat'     => 'S1',
            'universitas' => 'ITB',
            'jurusan'     => 'Teknik Informatika'
        ]);

        $this->assertDatabaseHas('skill_cvs', [
            'cv_id'     => $cv->id,
            'skill'     => 'PHP',
            'kemampuan' => 'Advance'
        ]);

        $this->assertDatabaseHas('pengalamen', [
            'cv_id'      => $cv->id,
            'pengalaman' => 'Web Developer PT Tech',
            'durasi'     => '2 Tahun'
        ]);
    }

    /**
     * Menguji kegagalan validasi saat menyimpan CV dengan data kosong.
     */
    public function test_store_cv_validation_fails()
    {
        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->post('/cv', [], ['Accept' => 'application/json']);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['umur', 'kontak', 'title', 'subtitle', 'tentang_saya', 'pendidikan']);
    }

    /**
     * Menguji halaman detail CV dapat diakses dan menampilkan data CV.
     */
    public function test_show_detail_cv()
    {
        $cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'IT Graduate',
            'kontak'       => '0812',
            'title'        => 'CV IT',
            'subtitle'     => 'Resume',
        ]);

        $response = $this->get('/cv/detail/' . $cv->id);

        $response->assertStatus(200);
        $response->assertViewIs('cv.detail');
        $response->assertViewHas('cv');
    }

    /**
     * Menguji halaman edit CV dapat dimuat.
     */
    public function test_edit_cv_page()
    {
        $cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'IT Graduate',
            'kontak'       => '0812',
            'title'        => 'CV IT',
            'subtitle'     => 'Resume',
        ]);

        $response = $this->get('/cv/' . $cv->id . '/edit');
        
        $response->assertStatus(200);
        $response->assertViewIs('cv.editCv');
        $response->assertViewHas('cv');
    }

    /**
     * Menguji pembaruan data CV berhasil menghapus relasi lama dan menyimpan data relasi baru.
     */
    public function test_update_cv_success()
    {
        $cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'Lama',
            'kontak'       => '0812',
            'title'        => 'CV Lama',
            'subtitle'     => 'Resume',
        ]);

        // Tambah data lama
        $pendidikanLama = $cv->pendidikans()->create([
            'tingkat'     => 'SMA',
            'universitas' => 'SMA 1',
            'jurusan'     => 'IPA'
        ]);

        $skillLama = $cv->skills()->create([
            'skill'     => 'CSS',
            'kemampuan' => 'Basic'
        ]);

        $pengalamanLama = $cv->pengalamans()->create([
            'pengalaman' => 'Internship',
            'durasi'     => '3 Bulan'
        ]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->put('/cv/' . $cv->id, [
                'umur'         => 25,
                'kontak'       => '089999',
                'title'        => 'CV Baru',
                'subtitle'     => 'Resume Baru',
                'tentang_saya' => 'Baru sekali',
                'pendidikan'   => [
                    [
                        'tingkat'     => 'S1',
                        'universitas' => 'Telkom University',
                        'jurusan'     => 'Sistem Informasi'
                    ]
                ],
                'skill' => [
                    [
                        'skill'     => 'Laravel',
                        'kemampuan' => 'Intermediate'
                    ]
                ],
                'pengalaman' => [
                    [
                        'pengalaman' => 'Backend Engineer',
                        'durasi'     => '1 Tahun'
                    ]
                ]
            ]);

        $response->assertRedirect('/cv');
        $response->assertSessionHas('success', 'CV berhasil diperbarui');

        $cv->refresh();
        $this->assertEquals(25, $cv->umur);
        $this->assertEquals('CV Baru', $cv->title);

        // Pastikan SMA, CSS, Internship terhapus
        $this->assertDatabaseMissing('pendidikans', ['id' => $pendidikanLama->id]);
        $this->assertDatabaseMissing('skill_cvs', ['id' => $skillLama->id]);
        $this->assertDatabaseMissing('pengalamen', ['id' => $pengalamanLama->id]);

        // Pastikan data baru masuk
        $this->assertDatabaseHas('pendidikans', [
            'cv_id'       => $cv->id,
            'tingkat'     => 'S1',
            'universitas' => 'Telkom University',
            'jurusan'     => 'Sistem Informasi'
        ]);
    }

    /**
     * Menguji penghapusan CV berhasil menghapus data CV beserta relasi terkait.
     */
    public function test_delete_cv_success()
    {
        $cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'Lama',
            'kontak'       => '0812',
            'title'        => 'CV Lama',
            'subtitle'     => 'Resume',
        ]);

        $skill = $cv->skills()->create([
            'skill'     => 'CSS',
            'kemampuan' => 'Basic'
        ]);

        $pengalaman = $cv->pengalamans()->create([
            'pengalaman' => 'Internship',
            'durasi'     => '3 Bulan'
        ]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->delete('/cv/' . $cv->id);

        $response->assertRedirect('/cv');
        $response->assertSessionHas('success', 'CV berhasil dihapus');

        $this->assertDatabaseMissing('cvs', ['id' => $cv->id]);
        $this->assertDatabaseMissing('skill_cvs', ['id' => $skill->id]);
        $this->assertDatabaseMissing('pengalamen', ['id' => $pengalaman->id]);
    }

    /**
     * Menguji halaman detail CV menampilkan portofolio terlampir jika lamaran_id dikirimkan.
     */
    public function test_show_detail_cv_with_attached_portfolio()
    {
        $cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 23,
            'tentang_saya' => 'IT Graduate',
            'kontak'       => '0812',
            'title'        => 'CV IT',
            'subtitle'     => 'Resume',
        ]);

        $perusahaan = \App\Models\Perusahaan::create([
            'nama_perusahaan'   => 'PT Test',
            'email'             => 'test@company.com',
            'password'          => bcrypt('password153'),
            'telepon'           => '0812',
            'npwp'              => '12.345.678.9-1234',
            'status_verifikasi' => 'verified',
        ]);

        $lowongan = \App\Models\Lowongan::create([
            'perusahaan_id'      => $perusahaan->id,
            'kategori_pekerjaan' => 'IT',
            'posisi_pekerjaan'   => 'Software Engineer',
            'jenis_pekerjaan'    => 'Full Time',
            'gaji'               => '10000000',
            'deskripsi_singkat'  => 'Short desc',
            'deskripsi_pekerjaan'=> 'Long desc',
            'syarat'             => 'PHP',
            'pendidikan'         => 'S1',
            'pengalaman'         => '1 tahun',
            'keahlian_teknis'    => 'PHP',
            'provinsi'           => 'Jawa Barat',
            'kabupaten'          => 'Bandung',
            'kecamatan'          => 'Coblong',
            'alamat_lengkap'     => 'Jl Ganesha No 10',
            'tanggal_mulai'      => '2026-06-07',
            'tanggal_berakhir'   => '2026-07-07',
        ]);

        $portofolio = \App\Models\Portofolio::create([
            'pelamar_id' => $this->pelamar->id,
            'judul' => 'Sistem Reservasi Online',
            'kategori' => 'Web App',
            'teknologi' => 'Laravel, Vue.js',
            'deskripsi' => 'Aplikasi web reservasi.',
            'link_demo' => 'https://demo.example.com',
            'link_repo' => 'https://github.com/repo',
            'tanggal_mulai' => '2025-01-01',
            'tanggal_selesai' => '2025-06-01',
        ]);

        $lamaran = \App\Models\Lamaran::create([
            'pelamar_id' => $this->pelamar->id,
            'lowongan_id' => $lowongan->id,
            'cv_id' => $cv->id,
            'portofolio_id' => $portofolio->id,
            'status' => 'diproses',
        ]);

        $response = $this->get('/cv/detail/' . $cv->id . '?lamaran_id=' . $lamaran->id);

        $response->assertStatus(200);
        $response->assertViewIs('cv.detail');
        $response->assertViewHas('cv');
        $response->assertViewHas('attachedPortfolio');
        $response->assertSee('Portofolio Terlampir');
        $response->assertSee('Sistem Reservasi Online');
    }
}
