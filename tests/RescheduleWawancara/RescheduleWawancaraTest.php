<?php

namespace Tests\RescheduleWawancara;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Lamaran;
use App\Models\Wawancara;

class RescheduleWawancaraTest extends TestCase
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
     * Menguji tamu (guest) tidak dapat melakukan reschedule wawancara dan dialihkan ke login.
     */
    public function test_guest_cannot_reschedule_interview()
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

        $response = $this->put('/perusahaan/wawancara/' . $wawancara->id . '/reschedule', [
            'tanggal'     => '2026-06-25',
            'jam_mulai'   => '13:00',
            'jam_selesai' => '14:00',
        ]);

        $response->assertRedirect('/login/perusahaan');
    }

    /**
     * Menguji perusahaan berhasil melakukan reschedule jadwal wawancara aktif.
     */
    public function test_perusahaan_can_reschedule_active_interview_successfully()
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

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->put('/perusahaan/wawancara/' . $wawancara->id . '/reschedule', [
                'tanggal'            => '2026-06-25',
                'jam_mulai'          => '14:00',
                'jam_selesai'        => '15:30',
                'link_meet'          => 'https://meet.google.com/new-room-123',
                'catatan_reschedule' => 'User interviewer berhalangan hadir pada jadwal sebelumnya.',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Jadwal wawancara berhasil diperbarui.');

        $wawancara->refresh();
        $this->assertEquals('2026-06-25', $wawancara->tanggal);
        $this->assertEquals('14:00', $wawancara->jam_mulai);
        $this->assertEquals('15:30', $wawancara->jam_selesai);
        $this->assertEquals('https://meet.google.com/new-room-123', $wawancara->link_meet);
        $this->assertEquals('User interviewer berhalangan hadir pada jadwal sebelumnya.', $wawancara->catatan_reschedule);
    }

    /**
     * Menguji validasi gagal jika jam selesai lebih awal dari jam mulai (edge case).
     */
    public function test_reschedule_fails_if_end_time_is_before_start_time()
    {
        $wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-20',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->put('/perusahaan/wawancara/' . $wawancara->id . '/reschedule', [
                'tanggal'     => '2026-06-25',
                'jam_mulai'   => '14:00',
                'jam_selesai' => '13:00',
            ]);

        $response->assertSessionHasErrors(['jam_selesai']);

        $wawancara->refresh();
        $this->assertEquals('09:00', $wawancara->jam_mulai);
    }

    /**
     * Menguji proteksi otorisasi: Perusahaan lain tidak boleh mengubah jadwal wawancara perusahaan berbeda (STRIDE IDOR).
     */
    public function test_reschedule_fails_if_interview_belongs_to_another_company()
    {
        $otherCompany = Perusahaan::create([
            'nama_perusahaan'   => 'PT Lain Sebelah',
            'email'             => 'lain@company.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08999',
            'npwp'              => '999999',
            'status_verifikasi' => 'verified',
        ]);

        $wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'proses',
            'tanggal'       => '2026-06-20',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
        ]);

        $response = $this->withSession(['perusahaan_id' => $otherCompany->id])
            ->put('/perusahaan/wawancara/' . $wawancara->id . '/reschedule', [
                'tanggal'     => '2026-06-25',
                'jam_mulai'   => '14:00',
                'jam_selesai' => '15:00',
            ]);

        $response->assertStatus(403);
    }

    /**
     * Menguji wawancara yang sudah berstatus selesai tidak dapat dijadwalkan ulang.
     */
    public function test_reschedule_fails_if_interview_is_already_completed()
    {
        $wawancara = Wawancara::create([
            'pelamar_id'    => $this->pelamar->id,
            'perusahaan_id' => $this->perusahaan->id,
            'lowongan_id'   => $this->lowongan->id,
            'status'        => 'selesai',
            'tanggal'       => '2026-06-20',
            'jam_mulai'     => '09:00',
            'jam_selesai'   => '10:00',
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->put('/perusahaan/wawancara/' . $wawancara->id . '/reschedule', [
                'tanggal'     => '2026-06-25',
                'jam_mulai'   => '14:00',
                'jam_selesai' => '15:00',
            ]);

        $response->assertSessionHasErrors(['status']);

        $wawancara->refresh();
        $this->assertEquals('2026-06-20', $wawancara->tanggal);
    }
}

