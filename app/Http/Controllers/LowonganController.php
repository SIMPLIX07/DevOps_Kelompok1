<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Services\PelamarCsvExporter;

class LowonganController extends Controller
{
    private const LOGIN_ROUTE = '/login/perusahaan';

    public function index(Request $request) // Tambahkan Request $request
    {
        if (!session('perusahaan_id')) {
            return redirect(self::LOGIN_ROUTE);
        }

        // Ambil keyword dari input 'q'
        $search = $request->query('q');

        $lowongans = Lowongan::withCount(['lamarans' => function ($query) {
                $query->where('status', 'diproses');
            }])
            ->where('perusahaan_id', session('perusahaan_id'))
            // Logika Pencarian: mencari di posisi_pekerjaan atau kategori_pekerjaan
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('posisi_pekerjaan', 'like', "%{$search}%")
                    ->orWhere('kategori_pekerjaan', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('homePerusahaan', compact('lowongans'));
    }

    public function detail($id)
    {
        $lowongan = Lowongan::with('perusahaan')->findOrFail($id);

        $pelamarId = session('pelamar_id');
        $sudahMelamar = false;
        $sudahBookmark = false;

        if ($pelamarId) {
            $sudahMelamar = \App\Models\Lamaran::where('pelamar_id', $pelamarId)
                ->where('lowongan_id', $id)
                ->exists();
            $sudahBookmark = \App\Models\Bookmark::where('pelamar_id', $pelamarId)
                ->where('lowongan_id', $id)
                ->exists();
        }

        return view('lamar', compact('lowongan', 'sudahMelamar', 'sudahBookmark'));
    }

    public function create()
    {
        if (!session('perusahaan_id')) {
            return redirect(self::LOGIN_ROUTE);
        }

        return view('lowongan.tambahLowongan');
    }

    public function store(Request $request)
    {
        if (!session('perusahaan_id')) {
            return redirect(self::LOGIN_ROUTE);
        }

        $request->validate([
            'kategori'          => 'required',
            'posisi'            => 'required',
            'jenis'             => 'required',
            'gaji'              => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi'         => 'required',
            'syarat'            => 'required',
            'provinsi'          => 'required',
            'kota'              => 'required',
            'kecamatan'         => 'required',
            'alamat'            => 'required',
            'tanggal_mulai'     => 'required|date',
            'tanggal_akhir'     => 'required|date|after_or_equal:tanggal_mulai',
            'pendidikan'        => 'required',
            'pengalaman'        => 'required',
            'keahlian_teknis'   => 'required',
        ], [], [
            'syarat' => 'keterangan tambahan',
        ]);

        Lowongan::create([
            'perusahaan_id'        => session('perusahaan_id'),
            'kategori_pekerjaan'   => $request->kategori,
            'posisi_pekerjaan'     => $request->posisi,
            'jenis_pekerjaan'      => $request->jenis,
            'gaji'                 => $request->gaji,
            'deskripsi_singkat'    => $request->deskripsi_singkat,
            'deskripsi_pekerjaan'  => $request->deskripsi,
            'syarat'               => $request->syarat,
            'provinsi'             => $request->provinsi,
            'kabupaten'            => $request->kota,
            'kecamatan'            => $request->kecamatan,
            'alamat_lengkap'       => $request->alamat,
            'tanggal_mulai'        => $request->tanggal_mulai,
            'tanggal_berakhir'     => $request->tanggal_akhir,
            'pendidikan'           => $request->pendidikan,
            'pengalaman'           => $request->pengalaman,
            'keahlian_teknis'      => $request->keahlian_teknis,
        ]);

        return redirect('/home-perusahaan')->with('success', 'Lowongan berhasil dibuat');
    }

    public function showDetail($id)
    {
        if (!session('perusahaan_id')) {
            return redirect(self::LOGIN_ROUTE);
        }

        $lowongan = Lowongan::with(['perusahaan', 'lamarans.pelamar'])
            ->findOrFail($id);

        return view('perusahaan.detailLowongan', compact('lowongan'));
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect('/home-perusahaan')->with('success', 'Lowongan berhasil dihapus');
    }

    public function edit($id)
    {
        if (!session('perusahaan_id')) {
            return redirect(self::LOGIN_ROUTE);
        }

        $lowongan = Lowongan::findOrFail($id);
        return view('lowongan.editLowongan', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $request->validate([
            'kategori'          => 'required',
            'posisi'            => 'required',
            'jenis'             => 'required',
            'gaji'              => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi'         => 'required',
            'syarat'            => 'required',
            'provinsi'          => 'required',
            'kota'              => 'required',
            'kecamatan'         => 'required',
            'alamat'            => 'required',
            'tanggal_mulai'     => 'required|date',
            'tanggal_akhir'     => 'required|date|after_or_equal:tanggal_mulai',
            'pendidikan'        => 'required',
            'pengalaman'        => 'required',
            'keahlian_teknis'   => 'required',
        ], [], [
            'syarat' => 'keterangan tambahan',
        ]);

        $data = [
            'kategori_pekerjaan'   => $request->kategori,
            'posisi_pekerjaan'     => $request->posisi,
            'jenis_pekerjaan'      => $request->jenis,
            'gaji'                 => $request->gaji,
            'deskripsi_singkat'    => $request->deskripsi_singkat,
            'deskripsi_pekerjaan'  => $request->deskripsi,
            'syarat'               => $request->syarat,
            'provinsi'             => $request->provinsi,
            'kabupaten'            => $request->kota,
            'kecamatan'            => $request->kecamatan,
            'alamat_lengkap'       => $request->alamat,
            'tanggal_mulai'        => $request->tanggal_mulai,
            'tanggal_berakhir'     => $request->tanggal_akhir,
            'pendidikan'           => $request->pendidikan,
            'pengalaman'           => $request->pengalaman,
            'keahlian_teknis'      => $request->keahlian_teknis,
        ];

        $lowongan->update($data);

        return redirect()->route('perusahaan.lowongan.detail', $lowongan->id)->with('success', 'Lowongan berhasil diperbarui');
    }

    public function listPelamar(Request $request)
    {
        $acceptedLamaran = $this->checkAcceptedLamaran();

        $query = Lowongan::with('perusahaan')
            ->where('tanggal_berakhir', '>=', Carbon::today());

        $this->applySearchFilters($query, $request);
        $this->applyGajiFilter($query, $request->gaji_range);
        $this->applyJenisPekerjaanFilter($query, $request->jenis_pekerjaan);
        $this->applySorting($query, $request->query('sort', 'terbaru'));

        $lowongans = $query->paginate(12);
        $lokasiOptions = $this->getLokasiOptions();
        $bookmarkedIds = $this->getBookmarkedIds();

        return view('home', compact('lowongans', 'lokasiOptions', 'bookmarkedIds', 'acceptedLamaran'));
    }

    private function checkAcceptedLamaran()
    {
        $pelamarId = session('pelamar_id');
        if (!$pelamarId) {
            return null;
        }

        $acceptedLamaran = \App\Models\Lamaran::with('lowongan.perusahaan')
            ->where('pelamar_id', $pelamarId)
            ->where('status', 'diterima')
            ->where('popup_diterima_tampil', false)
            ->first();

        if ($acceptedLamaran) {
            $acceptedLamaran->update(['popup_diterima_tampil' => true]);
        }

        return $acceptedLamaran;
    }

    private function applySearchFilters($query, Request $request): void
    {
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('posisi_pekerjaan', 'like', "%{$search}%")
                  ->orWhere('kategori_pekerjaan', 'like', "%{$search}%")
                  ->orWhereHas('perusahaan', function ($qp) use ($search) {
                      $qp->where('nama_perusahaan', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('lokasi')) {
            $lokasi = trim(explode(',', $request->lokasi)[0]);
            $query->where(function ($q) use ($lokasi) {
                $q->where('kabupaten', 'like', "%{$lokasi}%")
                  ->orWhere('provinsi', 'like', "%{$lokasi}%")
                  ->orWhere('alamat_lengkap', 'like', "%{$lokasi}%");
            });
        }
    }

    private function applyGajiFilter($query, ?string $range): void
    {
        if (!$range) {
            return;
        }

        if (\DB::connection()->getDriverName() === 'sqlite') {
            $pdo = \DB::connection()->getPdo();
            $pdo->sqliteCreateFunction('SUBSTRING_INDEX', function ($string, $delim, $count) {
                if ($string === null) {
                    return null;
                }
                $parts = explode($delim, $string);
                if ($count > 0) {
                    return implode($delim, array_slice($parts, 0, $count));
                }
                return implode($delim, array_slice($parts, $count));
            });
        }

        $cleanSql = "CAST(SUBSTRING_INDEX(REPLACE(REPLACE(REPLACE(gaji, 'Rp', ''), '.', ''), ' ', ''), '-', 1) AS UNSIGNED)";
        $cleanSqlMax = "CAST(SUBSTRING_INDEX(REPLACE(REPLACE(REPLACE(gaji, 'Rp', ''), '.', ''), ' ', ''), '-', -1) AS UNSIGNED)";

        if ($range === 'under_5m') {
            $query->whereRaw("$cleanSql < 5000000");
        } elseif ($range === '5m_10m') {
            $query->whereRaw("$cleanSql <= 10000000 AND $cleanSqlMax >= 5000000");
        } elseif ($range === '10m_15m') {
            $query->whereRaw("$cleanSql <= 15000000 AND $cleanSqlMax >= 10000000");
        } elseif ($range === 'above_15m') {
            $query->whereRaw("$cleanSqlMax > 15000000");
        }
    }

    private function applyJenisPekerjaanFilter($query, ?string $jenis): void
    {
        if (!$jenis) {
            return;
        }

        if ($jenis === 'Full-time') {
            $query->where('jenis_pekerjaan', 'like', 'Full%');
        } elseif ($jenis === 'Part-time') {
            $query->where('jenis_pekerjaan', 'like', 'Part%');
        } else {
            $query->where('jenis_pekerjaan', 'like', "%{$jenis}%");
        }
    }

    private function applySorting($query, string $sort): void
    {
        if ($sort === 'terlama') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }
    }

    private function getLokasiOptions(): array
    {
        $dbLokasi = Lowongan::whereNotNull('kabupaten')
            ->where('kabupaten', '!=', '')
            ->whereRaw('LENGTH(TRIM(kabupaten)) >= 3')
            ->select('kabupaten', 'provinsi')
            ->get();

        $lokasiOptions = [];
        foreach ($dbLokasi as $row) {
            $kab = ucwords(strtolower(trim($row->kabupaten)));
            $prov = ucwords(strtolower(trim($row->provinsi ?? '')));
            $label = $prov ? "{$kab}, {$prov}" : $kab;
            $lokasiOptions[$label] = $label;
        }
        $lokasiOptions = array_values($lokasiOptions);
        sort($lokasiOptions);

        return $lokasiOptions;
    }

    private function getBookmarkedIds(): array
    {
        $pelamarId = session('pelamar_id');
        if (!$pelamarId) {
            return [];
        }

        return Bookmark::where('pelamar_id', $pelamarId)
            ->pluck('lowongan_id')
            ->toArray();
    }

    /**
     * Rekap pelamar pada lowongan spesifik ke file CSV.
     */
    public function exportPelamarCsv($id)
    {
        $perusahaanId = session('perusahaan_id');
        if (!$perusahaanId) {
            return redirect(self::LOGIN_ROUTE)->withErrors('Silakan login sebagai perusahaan.');
        }

        $lowongan = Lowongan::where('id', $id)
            ->where('perusahaan_id', $perusahaanId)
            ->firstOrFail();

        $lamarans = \App\Models\Lamaran::with(['pelamar', 'cv.pendidikans', 'cv.skills', 'portofolio'])
            ->where('lowongan_id', $id)
            ->latest()
            ->get();

        $safePosisi = \Illuminate\Support\Str::slug($lowongan->posisi_pekerjaan);
        $filename = "rekap-pelamar-{$safePosisi}-" . date('Y-m-d') . ".csv";

        return (new PelamarCsvExporter())->download($lamarans, $filename);
    }
}
