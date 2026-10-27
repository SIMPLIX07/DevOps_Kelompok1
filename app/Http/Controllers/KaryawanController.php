<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Lamaran;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function storeFromWawancara($wawancaraId)
    {
        DB::transaction(function () use ($wawancaraId) {

            $wawancara = Wawancara::with('lowongan')->findOrFail($wawancaraId);
            $wawancara->update([
                'status' => 'selesai'
            ]);
            Lamaran::where('pelamar_id', $wawancara->pelamar_id)
                ->where('lowongan_id', $wawancara->lowongan_id)
                ->update([
                    'status' => 'diterima'
                ]);
            Karyawan::create([
                'id_pelamar'        => $wawancara->pelamar_id,
                'id_lowongan'       => $wawancara->lowongan_id,
                'id_perusahaan'     => $wawancara->perusahaan_id,
                'kategori_pekerjaan' => $wawancara->lowongan->kategori_pekerjaan,
                'posisi'            => $wawancara->lowongan->posisi_pekerjaan,
                'tanggal_mulai'     => now(),
                'status_karyawan'   => 'aktif',
            ]);
        });

        return response()->json([
            'message' => 'Pelamar berhasil diterima dan menjadi karyawan'
        ]);
    }

    public function ajaxByKategori($kategori)
    {
        $perusahaanId = session('perusahaan_id');

        $karyawans = Karyawan::where('id_perusahaan', $perusahaanId)
            ->where('kategori_pekerjaan', $kategori)
            ->whereHas('pelamar')
            ->with('pelamar')
            ->get()
            ->map(function ($k) {
                return [
                    'nama'   => $k->pelamar?->nama_lengkap ?? 'Akun Dihapus',
                    'posisi' => $k->posisi
                ];
            });

        return response()->json($karyawans);
    }
}
