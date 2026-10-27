<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Lamaran;
use App\Models\Wawancara;
use App\Models\Karyawan;

class WawancaraTest extends TestCase
{
    use RefreshDatabase;

    private $pelamar;
    private $perusahaan;
    private $lowongan;
    private $cv;
    private $lamaran;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Rekrut',
            'username'     => 'budirekrut',
            'email'        => 'rekrut@mail.com',
            'password'     => bcrypt('password123'),
        ]);

        $this->perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT HR Indonesia',
            'email'             => 'hr@indonesia.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '123456',
            'status_verifikasi' => 'verified',
        ]);

        $this->lowongan = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'DevOps Engineer',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => '10000000',
            'deskripsi_singkat'   => 'Lowongan DevOps',
            'deskripsi_pekerjaan' => 'Mengelola server CI/CD',
            'syarat'              => 'Kubernetes skill',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $this->cv = Cv::create([
            'pelamar_id'   => $this->pelamar->id,
            'umur'         => 24,
            'tentang_saya' => 'DevOps specialist',
            'kontak'       => '08123',
            'title'        => 'DevOps CV',
            'subtitle'     => 'Resume',
        ]);

        $this->lamaran = Lamaran::create([
            'pelamar_id'  => $this->pelamar->id,
            'lowongan_id' => $this->lowongan->id,
            'cv_id'       => $this->cv->id,
            'status'      => 'wawancara'
        ]);
    }

    /**
     * Menguji pelamar dapat melihat daftar wawancara mereka.
     */
    public function test_pelamar_view_wawancara_list()
    {
        // Dialihkan jika diakses sebagai tamu (guest)
        $response = $this->get('/wawancara');
        $response->assertRedirect('/login/pelamar');

        // Buat data wawancara
        Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-20',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);

        $response = $this->withSession(['pelamar_id' => $this->pelamar->id])
            ->get('/wawancara');

        $response->assertStatus(200);
        $response->assertViewIs('wawancaraPelamar.wawancara');
        $response->assertViewHas('wawancarans');
        
        $wawancarans = $response->viewData('wawancarans');
        $this->assertEquals(1, $wawancarans->count());
        $this->assertEquals('wawancara', $wawancarans->first()->lamaran_status);
    }

    /**
     * Menguji perusahaan dapat melihat daftar wawancara perusahaan.
     */
    public function test_perusahaan_view_wawancara_list()
    {
        // Dialihkan jika diakses sebagai tamu (guest)
        $response = $this->get('/perusahaan/wawancara');
        $response->assertRedirect('/login/perusahaan');

        Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-20',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get('/perusahaan/wawancara');

        $response->assertStatus(200);
        $response->assertViewIs('perusahaan.wawancara');
        $response->assertViewHas('wawancarans');
        $this->assertEquals(1, $response->viewData('wawancarans')->count());
    }

    /**
     * Menguji penerimaan kandidat dari wawancara: memperbarui status wawancara/lamaran dan membuat data karyawan aktif baru.
     */
    public function test_perusahaan_accept_wawancara_success()
    {
        $wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-20',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);

        // Memicu KaryawanController@storeFromWawancara
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->post('/perusahaan/wawancara/' . $wawancara->id . '/terima');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Pelamar berhasil diterima dan menjadi karyawan'
        ]);

        $wawancara->refresh();
        $this->assertEquals('selesai', $wawancara->status);

        $this->lamaran->refresh();
        $this->assertEquals('diterima', $this->lamaran->status);

        $this->assertDatabaseHas('karyawans', [
            'id_pelamar'         => $this->pelamar->id,
            'id_lowongan'        => $this->lowongan->id,
            'id_perusahaan'      => $this->perusahaan->id,
            'kategori_pekerjaan' => 'Teknologi',
            'posisi'             => 'DevOps Engineer',
            'status_karyawan'    => 'aktif'
        ]);
    }

    /**
     * Menguji penolakan kandidat dari wawancara: memperbarui status wawancara/lamaran menjadi selesai/ditolak.
     */
    public function test_perusahaan_reject_wawancara_success()
    {
        $wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-20',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
            'link_meet'     => 'https://meet.google.com/abc-defg-hij',
        ]);

        // Memicu WawancaraController@tolak
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->post('/perusahaan/wawancara/' . $wawancara->id . '/tolak');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Pelamar ditolak'
        ]);

        $wawancara->refresh();
        $this->assertEquals('selesai', $wawancara->status);

        $this->lamaran->refresh();
        $this->assertEquals('ditolak', $this->lamaran->status);

        $this->assertDatabaseMissing('karyawans', [
            'id_pelamar' => $this->pelamar->id,
        ]);
    }

    /**
     * Menguji rute AJAX mendapatkan daftar karyawan berdasarkan kategori pekerjaan.
     */
    public function test_ajax_get_employees_by_category()
    {
        Karyawan::create([
            'id_pelamar'         => $this->pelamar->id,
            'id_lowongan'        => $this->lowongan->id,
            'id_perusahaan'      => $this->perusahaan->id,
            'kategori_pekerjaan' => 'Teknologi',
            'posisi'             => 'DevOps Engineer',
            'tanggal_mulai'      => now(),
            'status_karyawan'    => 'aktif'
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get('/perusahaan/karyawan/by-kategori/Teknologi');

        $response->assertStatus(200);
        $response->assertJson([
            [
                'nama'   => 'Budi Rekrut',
                'posisi' => 'DevOps Engineer'
            ]
        ]);
    }
}
