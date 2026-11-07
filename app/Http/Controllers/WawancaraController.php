<?php

namespace App\Http\Controllers;

use App\Models\Wawancara;
use App\Models\Lamaran;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class WawancaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar');
        }

        $wawancarans = Wawancara::with(['lowongan.perusahaan'])
            ->where('pelamar_id', $pelamarId)
            ->whereIn('status', ['proses', 'selesai'])
            ->orderBy('tanggal', 'asc')
            ->get();

        foreach ($wawancarans as $wawancara) {
            $lamaran = \App\Models\Lamaran::where('pelamar_id', $pelamarId)
                ->where('lowongan_id', $wawancara->lowongan_id)
                ->first();
            $wawancara->lamaran_status = $lamaran ? $lamaran->status : 'wawancara';
        }

        return view('wawancaraPelamar.wawancara', compact('wawancarans'));
    }

    public function indexPerusahaan()
    {
        $perusahaanId = session('perusahaan_id');

        if (!$perusahaanId) {
            return redirect('/login/perusahaan');
        }

        $wawancarans = Wawancara::with(['lowongan', 'pelamar'])
            ->where('perusahaan_id', $perusahaanId)
            ->whereIn('status', ['proses', 'selesai'])
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('perusahaan.wawancara', compact('wawancarans'));
    }

    public function terima($id)
    {
        $wawancara = Wawancara::with('lowongan')->findOrFail($id);

        $wawancara->update(['status' => 'selesai']);

        Lamaran::where('pelamar_id', $wawancara->pelamar_id)
            ->where('lowongan_id', $wawancara->lowongan_id)
            ->update(['status' => 'diterima']);

        Karyawan::create([
            'id_pelamar'     => $wawancara->pelamar_id,
            'id_lowongan'    => $wawancara->lowongan_id,
            'id_perusahaan'  => $wawancara->perusahaan_id,
            'kategori_pekerjaan' => $wawancara->lowongan->kategori_pekerjaan,
            'posisi'         => $wawancara->lowongan->posisi_pekerjaan,
            'tanggal_mulai'  => now(),
            'status_karyawan' => 'aktif'
        ]);

        return response()->json(['message' => 'Pelamar diterima']);
    }

    public function tolak($id)
    {
        DB::transaction(function () use ($id) {

            $wawancara = Wawancara::findOrFail($id);

            $wawancara->update([
                'status' => 'selesai'
            ]);

            Lamaran::where('pelamar_id', $wawancara->pelamar_id)
                ->where('lowongan_id', $wawancara->lowongan_id)
                ->update([
                    'status' => 'ditolak'
                ]);
        });

        return response()->json([
            'message' => 'Pelamar ditolak'
        ]);
    }

    public function wawancara(Request $request, $id)
    {
        $lamaran = Lamaran::with(['pelamar', 'lowongan.perusahaan'])->findOrFail($id);

        $wawancara = Wawancara::create([
            'pelamar_id'    => $lamaran->pelamar_id,
            'perusahaan_id' => $lamaran->lowongan->perusahaan_id,
            'lowongan_id'   => $lamaran->lowongan_id,
            'status'        => 'proses',
            'tanggal'       => $request->tanggal,
            'jam_mulai'     => $request->jam_mulai,
            'jam_selesai'   => $request->jam_selesai,
            'link_meet'     => $request->link_meet,
            'pesan'         => "Kami tertarik dengan CV kamu, ditunggu di wawancara nanti ya",
        ]);

        $lamaran->update(['status' => 'wawancara']);

        try {

            $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->timeout(5)
                ->post('http://127.0.0.1:3001/log-wawancara', [
                    'perusahaan' => $lamaran->lowongan->perusahaan->nama_perusahaan,
                    'pelamar'    => $lamaran->pelamar->nama_lengkap ?? $lamaran->pelamar->name,
                    'room'       => $request->link_meet,
                ]);

        } catch (\Throwable $e) {
            Log::error('GAGAL KIRIM KE NODE', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return redirect()->back()->with('success', 'Undangan wawancara berhasil dikirim!');
    }

    /**
     * Reschedule / Ubah jadwal wawancara oleh perusahaan.
     */
    public function reschedule(Request $request, $id)
    {
        $perusahaanId = session('perusahaan_id');
        if (!$perusahaanId) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            return redirect('/login/perusahaan');
        }

        $request->validate([
            'tanggal'            => 'required|date',
            'jam_mulai'          => 'required',
            'jam_selesai'        => 'required|after:jam_mulai',
            'link_meet'          => 'nullable|string',
            'catatan_reschedule' => 'nullable|string|max:500',
        ], [
            'tanggal.required'     => 'Tanggal wawancara wajib diisi.',
            'jam_mulai.required'   => 'Jam mulai wajib diisi.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.after'    => 'Jam selesai harus lebih akhir dari jam mulai.',
        ]);

        $wawancara = Wawancara::findOrFail($id);

        // Otorisasi: Pastikan wawancara milik perusahaan yang sedang login
        if ((int)$wawancara->perusahaan_id !== (int)$perusahaanId) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden'], 403);
            }
            abort(403, 'Akses ditolak: Wawancara ini bukan milik perusahaan Anda.');
        }

        // Cek status wawancara
        if ($wawancara->status === 'selesai') {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Wawancara yang sudah selesai tidak dapat dijadwalkan ulang.'], 422);
            }
            return back()->withErrors(['status' => 'Wawancara yang sudah selesai tidak dapat dijadwalkan ulang.']);
        }

        $wawancara->update([
            'tanggal'            => $request->tanggal,
            'jam_mulai'          => $request->jam_mulai,
            'jam_selesai'        => $request->jam_selesai,
            'link_meet'          => $request->filled('link_meet') ? $request->link_meet : $wawancara->link_meet,
            'catatan_reschedule' => $request->input('catatan_reschedule'),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Jadwal wawancara berhasil diubah',
                'data'    => $wawancara,
            ], 200);
        }

        return back()->with('success', 'Jadwal wawancara berhasil diperbarui.');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wawancara $wawancara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wawancara $wawancara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wawancara $wawancara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wawancara $wawancara)
    {
        //
    }
}
