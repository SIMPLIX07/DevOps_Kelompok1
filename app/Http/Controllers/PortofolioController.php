<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar');
        }

        $portofolios = Portofolio::where('pelamar_id', $pelamarId)
            ->latest()
            ->get();

        return view('indexPortofolio', compact('portofolios'));
    }

    public function create()
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar')->withErrors('Silakan login dulu');
        }

        $pelamar = Pelamar::findOrFail($pelamarId);

        return view('portofolio.tambahPortofolio', compact('pelamar'));
    }

    public function store(Request $request)
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'teknologi' => 'nullable|string|max:255',
            'link_demo' => 'nullable|string|max:255',
            'link_repo' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        Portofolio::create([
            'pelamar_id' => $pelamarId,
            ...$validated,
        ]);

        return redirect('/portofolio')->with('success', 'Portofolio berhasil disimpan');
    }

    public function edit($id)
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar')->withErrors('Silakan login dulu');
        }

        $portofolio = Portofolio::where('id', $id)
            ->where('pelamar_id', $pelamarId)
            ->firstOrFail();

        return view('portofolio.editPortofolio', compact('portofolio'));
    }

    public function update(Request $request, $id)
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'teknologi' => 'nullable|string|max:255',
            'link_demo' => 'nullable|string|max:255',
            'link_repo' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $portofolio = Portofolio::where('id', $id)
            ->where('pelamar_id', $pelamarId)
            ->firstOrFail();

        $portofolio->update($validated);

        return redirect('/portofolio')->with('success', 'Portofolio berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar');
        }

        Portofolio::where('id', $id)
            ->where('pelamar_id', $pelamarId)
            ->delete();

        return redirect('/portofolio')->with('success', 'Portofolio berhasil dihapus');
    }
}
