<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Login Admin
    public function showLoginForm()
    {
        return view('admin.loginAdmin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Admin credentials dari config
        $adminEmail = config('admin.admin.email');
        $adminPassword = config('admin.admin.password');

        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            session(['admin_id' => 'admin', 'admin_email' => $adminEmail]);
            return redirect('/admin/dashboard')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['email' => 'Email atau password admin salah']);
    }

    // Dashboard Admin - List Perusahaan Menunggu Verifikasi
    public function dashboard()
    {
        $pendingPerusahaan = Perusahaan::where('status_verifikasi', 'pending')
            ->latest()
            ->paginate(10);

        $verifiedPerusahaan = Perusahaan::where('status_verifikasi', 'verified')
            ->count();

        $rejectedPerusahaan = Perusahaan::where('status_verifikasi', 'rejected')
            ->count();

        $totalPerusahaan = Perusahaan::count();

        // Hitung growth rate pendaftaran perusahaan (7 hari terakhir vs 7 hari sebelumnya)
        $recentRegistrations = Perusahaan::where('created_at', '>=', now()->subDays(7))->count();
        $previousRegistrations = Perusahaan::where('created_at', '>=', now()->subDays(14))
            ->where('created_at', '<', now()->subDays(7))
            ->count();

        if ($previousRegistrations > 0) {
            $growthRate = round((($recentRegistrations - $previousRegistrations) / $previousRegistrations) * 100);
            $growthFormatted = ($growthRate >= 0 ? '+' : '') . $growthRate . '%';
        } else {
            $growthFormatted = $recentRegistrations > 0 ? '+' . ($recentRegistrations * 100) . '%' : '+0%';
        }

        // Ambil data trend registrasi selama 7 hari terakhir
        $trends = [];
        $dayMap = [
            'Mon' => 'Sen',
            'Tue' => 'Sel',
            'Wed' => 'Rab',
            'Thu' => 'Kam',
            'Fri' => 'Jum',
            'Sat' => 'Sab',
            'Sun' => 'Min'
        ];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $count = Perusahaan::whereDate('created_at', $date->toDateString())->count();
            $dayEnglish = $date->format('D');
            $trends[] = [
                'day' => $dayMap[$dayEnglish] ?? $dayEnglish,
                'count' => $count,
                'date_label' => $date->format('d M')
            ];
        }

        // Ambil data trend registrasi selama 30 hari terakhir (4 Minggu)
        $trends30 = [];
        $weeks = [
            [
                'day' => 'Minggu 1',
                'start' => now()->subDays(30)->startOfDay(),
                'end' => now()->subDays(22)->endOfDay(),
            ],
            [
                'day' => 'Minggu 2',
                'start' => now()->subDays(21)->startOfDay(),
                'end' => now()->subDays(15)->endOfDay(),
            ],
            [
                'day' => 'Minggu 3',
                'start' => now()->subDays(14)->startOfDay(),
                'end' => now()->subDays(8)->endOfDay(),
            ],
            [
                'day' => 'Minggu 4',
                'start' => now()->subDays(7)->startOfDay(),
                'end' => now(),
            ]
        ];

        foreach ($weeks as $week) {
            $count = Perusahaan::whereBetween('created_at', [$week['start'], $week['end']])->count();
            $trends30[] = [
                'day' => $week['day'],
                'count' => $count,
                'date_label' => $week['start']->format('d M') . ' - ' . $week['end']->format('d M')
            ];
        }

        $maxTrendCount = max(array_column($trends, 'count'));

        return view('admin.dashboard', compact(
            'pendingPerusahaan',
            'verifiedPerusahaan',
            'rejectedPerusahaan',
            'totalPerusahaan',
            'growthFormatted',
            'trends',
            'trends30',
            'maxTrendCount'
        ));
    }

    // List Semua Perusahaan dengan Filter
    public function daftarPerusahaan(Request $request)
    {
        $query = Perusahaan::query();

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status_verifikasi', $request->status);
        }

        // Search berdasarkan nama atau email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_perusahaan', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $perusahaan = $query->latest()->paginate(15);

        // Hitung statistik secara dinamis
        $totalPerusahaan = Perusahaan::count();
        $verifiedPerusahaan = Perusahaan::where('status_verifikasi', 'verified')->count();
        $pendingPerusahaanCount = Perusahaan::where('status_verifikasi', 'pending')->count();

        return view('admin.daftarPerusahaan', compact(
            'perusahaan',
            'totalPerusahaan',
            'verifiedPerusahaan',
            'pendingPerusahaanCount'
        ));
    }

    // Detail Perusahaan untuk Verifikasi
    public function detailPerusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('admin.detailPerusahaan', compact('perusahaan'));
    }

    // Verifikasi Perusahaan
    public function verifikasiPerusahaan(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $request->validate([
            'status_verifikasi' => 'required|in:verified,rejected',
            'alasan_penolakan' => 'nullable|string|max:500'
        ]);

        try {
            if ($request->status_verifikasi === 'verified') {
                $perusahaan->status_verifikasi = 'verified';
                $perusahaan->verified_by = 1; // Admin ID (future: dari Users table)
                $perusahaan->verified_at = now();
                $perusahaan->alasan_penolakan = null;
                $perusahaan->save();

                return redirect()->route('admin.dashboard')
                    ->with('success', 'Perusahaan ' . $perusahaan->nama_perusahaan . ' berhasil diverifikasi!');
            } else {
                $perusahaan->status_verifikasi = 'rejected';
                $perusahaan->alasan_penolakan = $request->alasan_penolakan;
                $perusahaan->verified_by = 1; // Admin ID (future: dari Users table)
                $perusahaan->verified_at = now();
                $perusahaan->save();

                return redirect()->route('admin.dashboard')
                    ->with('warning', 'Perusahaan ' . $perusahaan->nama_perusahaan . ' ditolak.');
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    // Halaman History Verifikasi
    public function historyVerifikasi(Request $request)
    {
        $query = Perusahaan::where('status_verifikasi', '!=', 'pending');

        if ($request->filled('status')) {
            $query->where('status_verifikasi', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_perusahaan', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $history = $query->latest('verified_at')
            ->paginate(20);

        return view('admin.historyVerifikasi', compact('history'));
    }

    // Logout Admin
    public function logout()
    {
        session()->forget(['admin_id', 'admin_email']);
        return redirect('/')->with('success', 'Anda telah logout dari panel admin');
    }
}
