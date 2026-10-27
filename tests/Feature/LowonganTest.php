<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\Lamaran;
use App\Models\Cv;

class LowonganTest extends TestCase
{
    use RefreshDatabase;

    private $perusahaan;

    protected function setUp(): void
    {
        parent::setUp();

        $this->perusahaan = Perusahaan::create([
            'nama_perusahaan'   => 'PT Teknologi Baru',
            'email'             => 'tech@baru.com',
            'password'          => bcrypt('password123'),
            'telepon'           => '08123',
            'npwp'              => '12345',
            'status_verifikasi' => 'verified',
        ]);
    }

    /**
     * Menguji perusahaan dapat melihat daftar lowongan pekerjaan mereka dan mencari lowongan.
     */
    public function test_perusahaan_can_view_job_list_and_search()
    {
        $lowongan1 = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Backend Developer',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => '7000000',
            'deskripsi_singkat'   => 'Lowongan Backend',
            'deskripsi_pekerjaan' => 'Kerja Laravel',
            'syarat'              => 'S1 IT',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $lowongan2 = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Desain',
            'posisi_pekerjaan'    => 'UIUX Designer',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => '6000000',
            'deskripsi_singkat'   => 'Lowongan Desain',
            'deskripsi_pekerjaan' => 'Kerja Figma',
            'syarat'              => 'S1 DKV',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        // Cek redirect jika belum login
        $response = $this->get('/home-perusahaan');
        $response->assertRedirect('/login/perusahaan');

        // Uji index (logged in)
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get('/home-perusahaan');

        $response->assertStatus(200);
        $response->assertViewIs('homePerusahaan');
        $response->assertViewHas('lowongans');
        
        $lowongansInView = $response->viewData('lowongans');
        $this->assertEquals(2, $lowongansInView->count());

        // Uji search
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get('/home-perusahaan?q=Backend');

        $response->assertStatus(200);
        $lowongansInView = $response->viewData('lowongans');
        $this->assertEquals(1, $lowongansInView->count());
        $this->assertEquals('Backend Developer', $lowongansInView->first()->posisi_pekerjaan);
    }

    /**
     * Menguji halaman tambah lowongan pekerjaan dapat dimuat.
     */
    public function test_view_tambah_lowongan_page()
    {
        $response = $this->get('/lowongan/tambah');
        $response->assertRedirect('/login/perusahaan');

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get('/lowongan/tambah');
        $response->assertStatus(200);
        $response->assertViewIs('lowongan.tambahLowongan');
    }

    /**
     * Menguji penyimpanan lowongan baru berhasil.
     */
    public function test_store_lowongan_success()
    {
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->post('/lowongan/tambah', [
                'kategori'          => 'Teknologi',
                'posisi'            => 'Frontend Developer',
                'jenis'             => 'Full-time',
                'gaji'              => '8000000',
                'deskripsi_singkat' => 'Bekerja dengan React',
                'deskripsi'         => 'Deskripsi lengkap rekrutmen react developer',
                'syarat'            => 'Minimal D3',
                'provinsi'          => 'DKI Jakarta',
                'kota'              => 'Jakarta Pusat',
                'kecamatan'         => 'Gambir',
                'alamat'            => 'Merdeka Barat No. 15',
                'tanggal_mulai'     => '2026-06-10',
                'tanggal_akhir'     => '2026-07-10',
                'pendidikan'        => 'D3/S1',
                'pengalaman'        => 'Minimal 1 Tahun',
                'keahlian_teknis'   => 'React, CSS, Git',
            ]);

        $response->assertRedirect('/home-perusahaan');
        $response->assertSessionHas('success', 'Lowongan berhasil dibuat');

        $this->assertDatabaseHas('lowongans', [
            'perusahaan_id'      => $this->perusahaan->id,
            'posisi_pekerjaan'   => 'Frontend Developer',
            'kategori_pekerjaan' => 'Teknologi',
            'gaji'               => '8000000',
        ]);
    }

    /**
     * Menguji kegagalan validasi penyimpanan lowongan (misalnya tanggal akhir sebelum tanggal mulai).
     */
    public function test_store_lowongan_validation_fails()
    {
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->post('/lowongan/tambah', [
                'tanggal_mulai' => '2026-06-10',
                'tanggal_akhir' => '2026-06-05', // Tanggal akhir sebelum tanggal mulai
            ], ['Accept' => 'application/json']);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['kategori', 'posisi', 'tanggal_akhir']);
    }

    /**
     * Menguji halaman detail lowongan pekerjaan dapat dimuat dengan baik untuk perusahaan maupun pelamar.
     */
    public function test_view_detail_lowongan_success()
    {
        $lowongan = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Android Dev',
            'jenis_pekerjaan'     => 'Remote',
            'gaji'                => '9000000',
            'deskripsi_singkat'   => 'Lowongan Android',
            'deskripsi_pekerjaan' => 'Kotlin',
            'syarat'              => 'Kotlin',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Budi Android',
            'username'     => 'budiandroid',
            'email'        => 'android@mail.com',
            'password'     => bcrypt('password123')
        ]);

        $cv = Cv::create([
            'pelamar_id'   => $pelamar->id,
            'umur'         => 25,
            'tentang_saya' => 'Saya Android dev',
            'kontak'       => '08123',
            'title'        => 'Android CV',
            'subtitle'     => 'Resume',
        ]);

        Lamaran::create([
            'pelamar_id'  => $pelamar->id,
            'lowongan_id' => $lowongan->id,
            'cv_id'       => $cv->id,
            'status'      => 'diproses'
        ]);

        // Detail di sisi perusahaan
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get('/lowongan/detail/' . $lowongan->id);

        $response->assertStatus(200);
        $response->assertViewIs('perusahaan.detailLowongan');
        $response->assertViewHas('lowongan');

        // Detail di sisi pelamar
        $response = $this->get('/lowongan/' . $lowongan->id);
        $response->assertStatus(200);
        $response->assertViewIs('lamar');
        $response->assertViewHas('lowongan');
    }

    /**
     * Menguji halaman edit lowongan dapat dimuat dan pembaruan data lowongan berhasil.
     */
    public function test_edit_and_update_lowongan_success()
    {
        $lowongan = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Vue Dev',
            'jenis_pekerjaan'     => 'Remote',
            'gaji'                => '9000000',
            'deskripsi_singkat'   => 'VueJS',
            'deskripsi_pekerjaan' => 'VueJS logic',
            'syarat'              => 'VueJS skill',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        // Halaman edit
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->get('/lowongan/edit/' . $lowongan->id);
        $response->assertStatus(200);
        $response->assertViewIs('lowongan.editLowongan');

        // Pembaruan
        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->put('/lowongan/update/' . $lowongan->id, [
                'kategori'          => 'Teknologi Modern',
                'posisi'            => 'Vue Senior Dev',
                'jenis'             => 'Full-time',
                'gaji'              => '12000000',
                'deskripsi_singkat' => 'VueJS senior',
                'deskripsi'         => 'Deskripsi lengkap',
                'syarat'            => 'Minimal 3 tahun',
                'provinsi'          => 'Jabar',
                'kota'              => 'Bandung',
                'kecamatan'         => 'Coblong',
                'alamat'            => 'Ganesha Baru',
                'tanggal_mulai'     => '2026-06-01',
                'tanggal_akhir'     => '2026-07-01',
                'pendidikan'        => 'S1',
                'pengalaman'        => '3 tahun',
                'keahlian_teknis'   => 'Vue, Vuex',
            ]);

        $response->assertRedirect(route('perusahaan.lowongan.detail', $lowongan->id));
        $response->assertSessionHas('success', 'Lowongan berhasil diperbarui');

        $lowongan->refresh();
        $this->assertEquals('Vue Senior Dev', $lowongan->posisi_pekerjaan);
        $this->assertEquals('Teknologi Modern', $lowongan->kategori_pekerjaan);
        $this->assertEquals('Ganesha Baru', $lowongan->alamat_lengkap);
    }

    /**
     * Menguji penghapusan lowongan pekerjaan berhasil.
     */
    public function test_delete_lowongan_success()
    {
        $lowongan = Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Vue Dev',
            'jenis_pekerjaan'     => 'Remote',
            'gaji'                => '9000000',
            'deskripsi_singkat'   => 'VueJS',
            'deskripsi_pekerjaan' => 'VueJS logic',
            'syarat'              => 'VueJS skill',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $response = $this->withSession(['perusahaan_id' => $this->perusahaan->id])
            ->delete('/lowongan/delete/' . $lowongan->id);

        $response->assertRedirect('/home-perusahaan');
        $response->assertSessionHas('success', 'Lowongan berhasil dihapus');

        $this->assertDatabaseMissing('lowongans', ['id' => $lowongan->id]);
    }

    /**
     * Menguji pelamar dapat melihat halaman utama lowongan dan mencari lowongan pekerjaan.
     */
    public function test_pelamar_can_view_job_seeker_home_and_search()
    {
        Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Keuangan',
            'posisi_pekerjaan'    => 'Akuntan',
            'jenis_pekerjaan'     => 'Fulltime',
            'gaji'                => '6000000',
            'deskripsi_singkat'   => 'Akunting',
            'deskripsi_pekerjaan' => 'Jurnal',
            'syarat'              => 'Syarat akunting',
            'provinsi'            => 'Jabar',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        $response = $this->get('/home-pelamar');
        $response->assertStatus(200);
        $response->assertViewIs('home');
        $response->assertViewHas('lowongans');
        $this->assertEquals(1, $response->viewData('lowongans')->count());

        // Cari pencarian tidak cocok
        $response = $this->get('/home-pelamar?q=Security');
        $response->assertStatus(200);
        $this->assertEquals(0, $response->viewData('lowongans')->count());
    }

    /**
     * Menguji filter lokasi, pengurutan, dan paginasi pada halaman pelamar.
     */
    public function test_pelamar_can_filter_location_sort_and_paginate()
    {
        // Buat 15 lowongan: 14 di Bandung, 1 di Jakarta
        for ($i = 1; $i <= 14; $i++) {
            $lowongan = new Lowongan([
                'perusahaan_id'       => $this->perusahaan->id,
                'kategori_pekerjaan'  => 'Teknologi',
                'posisi_pekerjaan'    => 'Developer ' . $i,
                'jenis_pekerjaan'     => 'Fulltime',
                'gaji'                => '5000000',
                'deskripsi_singkat'   => 'Job ' . $i,
                'deskripsi_pekerjaan' => 'Desc ' . $i,
                'syarat'              => 'Syarat ' . $i,
                'provinsi'            => 'Jawa Barat',
                'kabupaten'           => 'Bandung',
                'kecamatan'           => 'Coblong',
                'alamat_lengkap'      => 'Ganesha',
                'tanggal_mulai'       => '2026-06-01',
                'tanggal_berakhir'    => '2026-07-01',
            ]);
            $lowongan->created_at = now()->subDays(15 - $i);
            $lowongan->save();
        }

        // Lowongan di Jakarta (Paling Baru)
        $jakartaJob = new Lowongan([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Pemasaran',
            'posisi_pekerjaan'    => 'Sales Manager',
            'jenis_pekerjaan'     => 'Fulltime',
            'gaji'                => '8000000',
            'deskripsi_singkat'   => 'Sales',
            'deskripsi_pekerjaan' => 'Selling',
            'syarat'              => 'Syarat sales',
            'provinsi'            => 'DKI Jakarta',
            'kabupaten'           => 'Jakarta Pusat',
            'kecamatan'           => 'Gambir',
            'alamat_lengkap'      => 'Monas',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);
        $jakartaJob->created_at = now();
        $jakartaJob->save();

        // 1. Uji Filter Lokasi (Jakarta Pusat)
        $response = $this->get('/home-pelamar?lokasi=Jakarta');
        $response->assertStatus(200);
        $this->assertEquals(1, $response->viewData('lowongans')->total());
        $this->assertEquals('Sales Manager', $response->viewData('lowongans')->first()->posisi_pekerjaan);

        // 2. Uji Pagination (12 item per halaman)
        $response = $this->get('/home-pelamar');
        $response->assertStatus(200);
        $response->assertViewHas('lokasiOptions');
        // Total data lowongan ada 15 (14 Bandung + 1 Jakarta)
        $this->assertEquals(15, $response->viewData('lowongans')->total());
        // Satu halaman hanya menampilkan 12 data
        $this->assertEquals(12, $response->viewData('lowongans')->count());

        // 3. Uji Sorting Terbaru (default/terbaru)
        // Item pertama halaman 1 (terbaru) harusnya lowongan Jakarta (Sales Manager)
        $this->assertEquals('Sales Manager', $response->viewData('lowongans')->first()->posisi_pekerjaan);

        // 4. Uji Sorting Terlama
        $response = $this->get('/home-pelamar?sort=terlama');
        $response->assertStatus(200);
        // Item pertama halaman 1 (terlama) harusnya Developer 1
        $this->assertEquals('Developer 1', $response->viewData('lowongans')->first()->posisi_pekerjaan);
    }

    /**
     * Menguji filter rentang gaji dan jenis pekerjaan pada halaman pelamar.
     */
    public function test_pelamar_can_filter_salary_range_and_job_type()
    {
        // Lowongan 1: Gaji 3jt, Full-time
        Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Junior Dev',
            'jenis_pekerjaan'     => 'Full-time',
            'gaji'                => 'Rp 3.000.000',
            'deskripsi_singkat'   => 'Job 1',
            'deskripsi_pekerjaan' => 'Desc 1',
            'syarat'              => 'Syarat 1',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        // Lowongan 2: Gaji 12jt, Part-time
        Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Mid Dev',
            'jenis_pekerjaan'     => 'Part-time',
            'gaji'                => 'Rp 12.000.000',
            'deskripsi_singkat'   => 'Job 2',
            'deskripsi_pekerjaan' => 'Desc 2',
            'syarat'              => 'Syarat 2',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        // Lowongan 3: Gaji 16jt, Kontrak
        Lowongan::create([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Senior Dev',
            'jenis_pekerjaan'     => 'Kontrak',
            'gaji'                => 'Rp 16.000.000',
            'deskripsi_singkat'   => 'Job 3',
            'deskripsi_pekerjaan' => 'Desc 3',
            'syarat'              => 'Syarat 3',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);

        // 1. Filter Rentang Gaji: under_5m (< 5jt) -> should return Junior Dev
        $response = $this->get('/home-pelamar?gaji_range=under_5m');
        $response->assertStatus(200);
        $this->assertEquals(1, $response->viewData('lowongans')->count());
        $this->assertEquals('Junior Dev', $response->viewData('lowongans')->first()->posisi_pekerjaan);

        // 2. Filter Rentang Gaji: 10m_15m -> should return Mid Dev
        $response = $this->get('/home-pelamar?gaji_range=10m_15m');
        $response->assertStatus(200);
        $this->assertEquals(1, $response->viewData('lowongans')->count());
        $this->assertEquals('Mid Dev', $response->viewData('lowongans')->first()->posisi_pekerjaan);

        // 3. Filter Rentang Gaji: above_15m -> should return Senior Dev
        $response = $this->get('/home-pelamar?gaji_range=above_15m');
        $response->assertStatus(200);
        $this->assertEquals(1, $response->viewData('lowongans')->count());
        $this->assertEquals('Senior Dev', $response->viewData('lowongans')->first()->posisi_pekerjaan);

        // 4. Filter Jenis Pekerjaan: Full-time -> should return Junior Dev
        $response = $this->get('/home-pelamar?jenis_pekerjaan=Full-time');
        $response->assertStatus(200);
        $this->assertEquals(1, $response->viewData('lowongans')->count());
        $this->assertEquals('Junior Dev', $response->viewData('lowongans')->first()->posisi_pekerjaan);

        // 5. Filter Jenis Pekerjaan: Kontrak -> should return Senior Dev
        $response = $this->get('/home-pelamar?jenis_pekerjaan=Kontrak');
        $response->assertStatus(200);
        $this->assertEquals(1, $response->viewData('lowongans')->count());
        $this->assertEquals('Senior Dev', $response->viewData('lowongans')->first()->posisi_pekerjaan);
    }
}

