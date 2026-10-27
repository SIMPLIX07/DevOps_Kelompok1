<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;
use App\Models\Cv;
use App\Models\Wawancara;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class LamaranController extends Controller
{
    public function insertLamaran(Request $request)
    {
        $request->validate([
            'pelamar_id'     => 'required|integer|exists:pelamars,id',
            'lowongan_id'    => 'required|integer|exists:lowongans,id',
            'cv_id'          => 'required|integer|exists:cvs,id',
            'portofolio_id'  => 'nullable|integer|exists:portofolios,id',
        ]);

        $cek = Lamaran::where('pelamar_id', $request->pelamar_id)
            ->where('lowongan_id', $request->lowongan_id)
            ->first();

        if ($cek) {
            return response()->json([
                'message' => 'Anda sudah melamar lowongan ini'
            ], 409);
        }


        $lamaran = Lamaran::create([
            'pelamar_id'     => $request->pelamar_id,
            'lowongan_id'    => $request->lowongan_id,
            'cv_id'          => $request->cv_id,
            'portofolio_id'  => $request->portofolio_id,
            'status'         => 'diproses',
        ]);

        return response()->json([
            'message' => 'Lamaran berhasil dikirim',
            'data' => $lamaran
        ], 201);
    }

    public function terima($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $lamaran->update([
            'status' => 'diterima'
        ]);

        return back()->with('success', 'Lamaran berhasil diterima.');
    }
    public function tolak($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $lamaran->update([
            'status' => 'ditolak'
        ]);

        return back()->with('success', 'Lamaran pelamar ini telah ditolak.');
    }

    public function getCvPelamar()
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return response()->json([], 401);
        }

        return Cv::where('pelamar_id', $pelamarId)->get();
    }

    public function getPortofolioPelamar()
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return response()->json([], 401);
        }

        return \App\Models\Portofolio::where('pelamar_id', $pelamarId)->get();
    }

    public function index()
    {
        $pelamarId = session('pelamar_id');

        $lamarans = Lamaran::with(['lowongan.perusahaan'])
            ->where('pelamar_id', $pelamarId)
            ->latest()
            ->get();

        return view('Lamaran', compact('lamarans'));
    }

    public function historyPerusahaan(Request $request)
    {
        $perusahaanId = session('perusahaan_id');

        if (!$perusahaanId) {
            return redirect('/login/perusahaan');
        }

        $lamarans = Lamaran::with(['pelamar', 'lowongan', 'cv'])
            ->whereHas('lowongan', function ($q) use ($perusahaanId) {
                $q->where('perusahaan_id', $perusahaanId);
            })
            ->whereIn('status', ['diterima', 'ditolak'])
            ->latest('updated_at')
            ->get();

        return view('perusahaan.historyLamaran', compact('lamarans'));
    }

    public function tolakLamaran($id)
{
    $lamaran = Lamaran::findOrFail($id);
    $lamaran->delete(); 

    return back()->with('success', 'Lamaran berhasil ditolak.');
}

    public function jadwalWawancara(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'link_meet' => 'required|url',
        ]);

        $lamaran = Lamaran::findOrFail($id);

        // Pindah ke table wawancara
        Wawancara::create([
            'pelamar_id' => $lamaran->pelamar_id,
            'perusahaan_id' => session('perusahaan_id'),
            'lowongan_id' => $lamaran->lowongan_id,
            'status' => 'proses',
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'link_meet' => $request->link_meet,
            'pesan' => "Kami tertarik dengan CV kamu, ditunggu di wawancara nanti ya",
        ]);

        $lamaran->update(['status' => 'wawancara']);

        try {
            Log::info('MENGIRIM KE NODE.JS');

            $response = Http::timeout(5)->post(
                'http://127.0.0.1:3001/log-wawancara',
                [
                    'perusahaan' => $lamaran->lowongan->perusahaan->nama_perusahaan,
                    'pelamar'    => $lamaran->pelamar->nama_lengkap,
                    'room'       => $request->link_meet,
                ]
            );

            Log::info('NODE RESPONSE', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        } catch (\Exception $e) {
            Log::error('GAGAL KIRIM KE NODE', [
                'error' => $e->getMessage(),
            ]);
        }

        return back()->with('success', 'Undangan wawancara berhasil dikirim.');
    }
}
