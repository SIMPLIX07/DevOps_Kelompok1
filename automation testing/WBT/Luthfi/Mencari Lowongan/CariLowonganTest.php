<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Perusahaan;
use App\Models\Lowongan;

class CariLowonganTest extends TestCase
{
    use RefreshDatabase;

    private Perusahaan $perusahaan;

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
     * WBT 1: Menguji pencarian lowongan pelamar berdasarkan kata kunci valid & tidak valid.
     */
    public function test_pelamar_can_view_job_seeker_home_and_search(): void
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

        // Cek halaman utama menampilkan Akuntan
        $response = $this->get('/home-pelamar');
        $response->assertStatus(200);
        $response->assertSee('Akuntan');

        // Pencarian valid
        $responseValid = $this->get('/home-pelamar?q=Akuntan');
        $responseValid->assertStatus(200);
        $this->assertEquals(1, $responseValid->viewData('lowongans')->count());

        // Pencarian tidak valid (Security) -> harus 0
        $responseInvalid = $this->get('/home-pelamar?q=Security');
        $responseInvalid->assertStatus(200);
        $this->assertEquals(0, $responseInvalid->viewData('lowongans')->count());
    }

    /**
     * WBT 2: Menguji penyaringan berdasarkan lokasi (kabupaten) dan pengurutan (sorting) data.
     */
    public function test_pelamar_can_filter_location_sort_and_paginate(): void
    {
        // Lowongan 1 di Bandung (Lama)
        $bandungJob = new Lowongan([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Teknologi',
            'posisi_pekerjaan'    => 'Developer Bandung',
            'jenis_pekerjaan'     => 'Fulltime',
            'gaji'                => '5000000',
            'deskripsi_singkat'   => 'Job BDG',
            'deskripsi_pekerjaan' => 'Desc BDG',
            'syarat'              => 'Syarat BDG',
            'provinsi'            => 'Jawa Barat',
            'kabupaten'           => 'Bandung',
            'kecamatan'           => 'Coblong',
            'alamat_lengkap'      => 'Ganesha',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);
        $bandungJob->created_at = now()->subDays(5);
        $bandungJob->save();

        // Lowongan 2 di Jakarta (Baru)
        $jakartaJob = new Lowongan([
            'perusahaan_id'       => $this->perusahaan->id,
            'kategori_pekerjaan'  => 'Pemasaran',
            'posisi_pekerjaan'    => 'Sales Manager Jakarta',
            'jenis_pekerjaan'     => 'Fulltime',
            'gaji'                => '8000000',
            'deskripsi_singkat'   => 'Sales JKT',
            'deskripsi_pekerjaan' => 'Selling JKT',
            'syarat'              => 'Syarat JKT',
            'provinsi'            => 'DKI Jakarta',
            'kabupaten'           => 'Jakarta Pusat',
            'kecamatan'           => 'Gambir',
            'alamat_lengkap'      => 'Monas',
            'tanggal_mulai'       => '2026-06-01',
            'tanggal_berakhir'    => '2026-07-01',
        ]);
        $jakartaJob->created_at = now();
        $jakartaJob->save();

        // 1. Filter Lokasi: Jakarta -> Hanya Jakarta yang tampil
        $responseFilter = $this->get('/home-pelamar?lokasi=Jakarta');
        $responseFilter->assertStatus(200);
        $this->assertEquals(1, $responseFilter->viewData('lowongans')->count());
        $this->assertEquals('Sales Manager Jakarta', $responseFilter->viewData('lowongans')->first()->posisi_pekerjaan);

        // 2. Sorting: Terbaru (Default) -> Jakarta (Sales Manager) di atas
        $responseNewest = $this->get('/home-pelamar');
        $this->assertEquals('Sales Manager Jakarta', $responseNewest->viewData('lowongans')->first()->posisi_pekerjaan);

        // 3. Sorting: Terlama -> Bandung (Developer Bandung) di atas
        $responseOldest = $this->get('/home-pelamar?sort=terlama');
        $this->assertEquals('Developer Bandung', $responseOldest->viewData('lowongans')->first()->posisi_pekerjaan);
    }

    /**
     * WBT 3: Menguji penyaringan berdasarkan jenis pekerjaan dan rentang gaji.
     */
    public function test_pelamar_can_filter_salary_range_and_job_type(): void
    {
        // Lowongan 1: Gaji Rp 3.000.000, Full-time
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

        // Lowongan 2: Gaji Rp 12.000.000, Part-time
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

        // 1. Filter Gaji: under_5m -> harus menghasilkan Junior Dev
        $responseSalary = $this->get('/home-pelamar?gaji_range=under_5m');
        $responseSalary->assertStatus(200);
        $this->assertEquals(1, $responseSalary->viewData('lowongans')->count());
        $this->assertEquals('Junior Dev', $responseSalary->viewData('lowongans')->first()->posisi_pekerjaan);

        // 2. Filter Jenis Pekerjaan: Part-time -> harus menghasilkan Mid Dev
        $responseType = $this->get('/home-pelamar?jenis_pekerjaan=Part-time');
        $responseType->assertStatus(200);
        $this->assertEquals(1, $responseType->viewData('lowongans')->count());
        $this->assertEquals('Mid Dev', $responseType->viewData('lowongans')->first()->posisi_pekerjaan);
    }
}
