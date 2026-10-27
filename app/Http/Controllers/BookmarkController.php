<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Lowongan;

class BookmarkController extends Controller
{
    public function index()
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return redirect('/login/pelamar');
        }

        $bookmarks = Bookmark::with(['lowongan.perusahaan'])
            ->where('pelamar_id', $pelamarId)
            ->latest()
            ->get();

        return view('bookmark', compact('bookmarks'));
    }

    public function toggle(Request $request)
    {
        $pelamarId = session('pelamar_id');

        if (!$pelamarId) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $lowonganId = $request->lowongan_id;

        $existing = Bookmark::where('pelamar_id', $pelamarId)
            ->where('lowongan_id', $lowonganId)
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['bookmarked' => false, 'message' => 'Lowongan dihapus dari bookmark']);
        } else {
            Bookmark::create([
                'pelamar_id'  => $pelamarId,
                'lowongan_id' => $lowonganId,
            ]);
            return response()->json(['bookmarked' => true, 'message' => 'Lowongan disimpan ke bookmark']);
        }
    }
}
