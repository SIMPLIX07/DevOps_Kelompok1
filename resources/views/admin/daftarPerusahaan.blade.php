<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KerjaYok Admin - Daftar Perusahaan</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "secondary-fixed-dim": "#77d6d3",
                    "secondary-container": "#91f0ed",
                    "error": "#ba1a1a",
                    "secondary-fixed": "#94f2f0",
                    "on-tertiary-fixed-variant": "#00504a",
                    "on-surface-variant": "#43474c",
                    "surface-dim": "#d7dadc",
                    "surface": "#f7fafc",
                    "on-secondary-container": "#006e6d",
                    "surface-tint": "#476178",
                    "primary": "#00182a",
                    "on-tertiary": "#ffffff",
                    "tertiary": "#001a18",
                    "on-tertiary-fixed": "#00201d",
                    "on-tertiary-container": "#00a499",
                    "on-primary-container": "#7b95ae",
                    "primary-fixed-dim": "#afc9e4",
                    "on-primary-fixed-variant": "#2f495f",
                    "surface-variant": "#e0e3e5",
                    "tertiary-fixed-dim": "#5adace",
                    "tertiary-fixed": "#79f7ea",
                    "surface-container-low": "#f1f4f6",
                    "surface-bright": "#f7fafc",
                    "surface-container-high": "#e5e9eb",
                    "on-error-container": "#93000a",
                    "inverse-on-surface": "#eef1f3",
                    "tertiary-container": "#00312d",
                    "outline-variant": "#c3c7cd",
                    "on-background": "#181c1e",
                    "outline": "#73777d",
                    "background": "#f7fafc",
                    "on-error": "#ffffff",
                    "on-secondary-fixed": "#00201f",
                    "surface-container-highest": "#e0e3e5",
                    "on-primary": "#ffffff",
                    "on-surface": "#181c1e",
                    "on-secondary-fixed-variant": "#00504e",
                    "surface-container": "#ebeef0",
                    "error-container": "#ffdad6",
                    "on-secondary": "#ffffff",
                    "inverse-primary": "#afc9e4",
                    "primary-container": "#112d42",
                    "inverse-surface": "#2d3133",
                    "secondary": "#006a68",
                    "surface-container-lowest": "#ffffff",
                    "primary-fixed": "#cde5ff",
                    "on-primary-fixed": "#001d31"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "xs": "8px",
                    "xl": "64px",
                    "margin-desktop": "48px",
                    "margin-mobile": "16px",
                    "md": "24px",
                    "base": "4px",
                    "sm": "16px",
                    "lg": "40px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "body-sm": ["Inter"],
                    "headline-md": ["Manrope"],
                    "headline-xl": ["Manrope"],
                    "body-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "label-md": ["Inter"],
                    "body-lg": ["Inter"],
                    "headline-lg-mobile": ["Manrope"],
                    "headline-lg": ["Manrope"]
            },
            "fontSize": {
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                    "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}]
            }
          },
        },
      }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.5);
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface min-h-screen flex flex-col selection:bg-secondary-fixed selection:text-on-secondary-fixed">
    <!-- TopAppBar -->
    <header class="sticky top-0 z-50 w-full bg-surface/80 backdrop-blur-md border-b border-outline-variant px-margin-desktop py-4 flex justify-between items-center" x-data="{ mobileMenuOpen: false }">
        <div class="flex items-center gap-4 md:gap-8">
            <!-- Hamburger Button for Mobile -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="block md:hidden text-on-surface-variant hover:bg-surface-container p-2 rounded-lg transition-all" type="button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="flex items-center gap-2">
                <span class="font-headline-md text-primary tracking-tight">KerjaYok</span>
            </div>
            <nav class="hidden md:flex items-center gap-6">
                <a class="text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="text-label-md text-primary font-semibold" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
                <a class="text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('admin.historyVerifikasi') }}">Riwayat</a>
            </nav>
        </div>
        <div class="flex items-center gap-6">
            <!-- Profile with Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <div @click="open = !open" class="flex items-center gap-3 cursor-pointer group">
                    <div class="text-right hidden xl:block">
                        <p class="text-label-md text-primary font-bold leading-none">Super Admin</p>
                        <p class="text-[10px] text-on-surface-variant uppercase tracking-widest mt-1">Kelola Ruang Kerja</p>
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-secondary flex items-center justify-center overflow-hidden">
                        <img alt="Profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1TKSAE9jduKpLDffHwesxf0pVM1OyEOXMte4OQpC4Qb21DqhO0_7p3QSNTApvXetQ5cqAReE1BIo6qI-EgOwyd9rc9cSXADMhnE52LgupjlqQjryBuVPctELbc2BoO1yZp9zqadj1frtc2gt7BGuxKWFtWT3Hcdfnn-sum5MrnMDo5V4KtQ-XPvQ5ccKuWyZYmI4gp2g8Mv11ZbPPppH393rx9uKoMmzwNKMNUHbNDBfVJsr9bxNNg2oeEsNn5zq3CON9WIEXV5s">
                    </div>
                </div>
                <!-- Dropdown Menu -->
                <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-lg py-2 z-50" style="display: none;">
                    <div class="px-4 py-2 border-b border-outline-variant">
                        <p class="text-label-md font-bold text-primary">Super Admin</p>
                        <p class="text-[11px] text-on-surface-variant truncate">{{ session('admin_email') }}</p>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" class="block w-full">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-body-sm text-error hover:bg-error-container/20 flex items-center gap-2 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">logout</span>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Mobile Dropdown Navigation Drawer -->
        <div x-show="mobileMenuOpen" @click.outside="mobileMenuOpen = false" class="absolute top-full left-0 w-full border-b border-outline-variant bg-surface/95 backdrop-blur-md py-4 px-margin-mobile flex flex-col gap-3 shadow-lg z-40 md:hidden" style="display: none;">
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="text-label-md text-primary font-semibold py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.historyVerifikasi') }}">Riwayat</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow w-full max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop py-lg space-y-lg">
        
        <!-- Header & Stats Summary / Accordion on Mobile -->
        <div class="space-y-md" x-data="{ statsOpen: false }">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md">
                <h1 class="font-headline-lg text-headline-lg text-primary">Daftar Semua Perusahaan</h1>
                <div class="flex items-center gap-xs text-on-surface-variant font-label-md text-label-md">
                    <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                    <span class="">{{ now()->translatedFormat('F Y') }}</span>
                </div>
            </div>

            <!-- Mobile Accordion Trigger -->
            <button @click="statsOpen = !statsOpen" class="w-full flex items-center justify-between bg-surface-container-lowest border border-outline-variant p-md rounded-xl sm:hidden text-primary hover:bg-surface-container transition-all" type="button">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">query_stats</span>
                    <span class="font-headline-md text-headline-md text-primary">Statistik Ringkasan</span>
                </div>
                <span class="material-symbols-outlined transform transition-transform duration-200" :class="statsOpen ? 'rotate-180' : ''">expand_more</span>
            </button>

            <!-- Stats Container Grid -->
            <div class="grid gap-gutter mt-4 sm:mt-0" :class="statsOpen ? 'grid-cols-1' : 'hidden sm:grid sm:grid-cols-2 lg:grid-cols-3'">
                <!-- Stat Card 1 -->
                <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm flex items-center gap-md hover:shadow-md transition-shadow">
                    <div class="p-sm bg-primary-container rounded-lg text-secondary-fixed-dim">
                        <span class="material-symbols-outlined text-[32px]">domain</span>
                    </div>
                    <div>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Total Perusahaan</p>
                        <p class="font-headline-md text-headline-md text-primary">{{ $totalPerusahaan }}</p>
                    </div>
                </div>
                <!-- Stat Card 2 -->
                <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm flex items-center gap-md hover:shadow-md transition-shadow">
                    <div class="p-sm bg-secondary-container rounded-lg text-on-secondary-container">
                        <span class="material-symbols-outlined text-[32px]">verified</span>
                    </div>
                    <div>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Aktif Terverifikasi</p>
                        <p class="font-headline-md text-headline-md text-secondary">{{ $verifiedPerusahaan }}</p>
                    </div>
                </div>
                <!-- Stat Card 3 -->
                <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm flex items-center gap-md hover:shadow-md transition-shadow">
                    <div class="p-sm bg-error-container rounded-lg text-on-error-container">
                        <span class="material-symbols-outlined text-[32px]">pending_actions</span>
                    </div>
                    <div>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Menunggu Verifikasi</p>
                        <p class="font-headline-md text-headline-md text-error">{{ $pendingPerusahaanCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search Section -->
        <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm">
            <form action="{{ route('admin.daftarPerusahaan') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-md items-end">
                    <div class="md:col-span-2">
                        <label class="block font-label-md text-label-md text-on-surface-variant mb-xs">Cari (Nama / Email)</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline">search</span>
                            <input name="search" class="w-full pl-xl pr-md py-xs bg-surface-container border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all font-body-md text-body-md" placeholder="Ketik nama atau email..." type="text" value="{{ request('search') }}">
                        </div>
                    </div>
                    <div>
                        <label class="block font-label-md text-label-md text-on-surface-variant mb-xs">Filter Status</label>
                        <select name="status" class="w-full py-xs px-md bg-surface-container border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all font-body-md text-body-md">
                            <option value="">Semua Status</option>
                            <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div class="flex gap-xs">
                        <button type="submit" class="flex-grow py-xs bg-secondary hover:bg-on-secondary-container text-on-secondary font-label-md text-label-md rounded-lg transition-colors active:scale-95 duration-150">Cari</button>
                        <a href="{{ route('admin.daftarPerusahaan') }}" class="flex-grow text-center py-xs bg-surface-container-high hover:bg-surface-dim text-on-surface font-label-md text-label-md rounded-lg transition-colors active:scale-95 duration-150 flex items-center justify-center">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low border-b border-outline-variant">
                            <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">No</th>
                            <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Nama Perusahaan</th>
                            <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Email</th>
                            <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Telepon</th>
                            <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Status</th>
                            <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Tanggal Daftar</th>
                            <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @forelse ($perusahaan as $index => $p)
                            <tr onclick="window.location='{{ route('admin.detailPerusahaan', $p->id) }}'" class="hover:bg-surface-container/30 transition-colors cursor-pointer">
                                <td class="px-md py-md font-body-sm text-body-sm text-on-surface-variant">
                                    {{ ($perusahaan->currentPage() - 1) * $perusahaan->perPage() + $index + 1 }}
                                </td>
                                <td class="px-md py-md font-label-md text-label-md text-primary">
                                    <a href="{{ route('admin.detailPerusahaan', $p->id) }}" class="hover:underline hover:text-secondary transition-colors" onclick="event.stopPropagation()">
                                        {{ $p->nama_perusahaan }}
                                    </a>
                                </td>
                                <td class="px-md py-md font-body-sm text-body-sm text-on-surface-variant">{{ $p->email }}</td>
                                <td class="px-md py-md font-body-sm text-body-sm text-on-surface-variant">{{ $p->telepon }}</td>
                                <td class="px-md py-md">
                                    @if ($p->status_verifikasi === 'pending')
                                        <span class="px-xs py-[2px] bg-tertiary-container text-tertiary-fixed font-label-sm text-[10px] uppercase tracking-wider rounded-full">Menunggu</span>
                                    @elseif ($p->status_verifikasi === 'verified')
                                        <span class="px-xs py-[2px] bg-secondary-container text-on-secondary-container font-label-sm text-[10px] uppercase tracking-wider rounded-full">Terverifikasi</span>
                                    @else
                                        <span class="px-xs py-[2px] bg-error-container text-on-error-container font-label-sm text-[10px] uppercase tracking-wider rounded-full">Ditolak</span>
                                    @endif
                                </td>
                                <td class="px-md py-md font-body-sm text-body-sm text-on-surface-variant">{{ $p->created_at->format('d/m/Y') }}</td>
                                <td class="px-md py-md text-center">
                                    <a href="{{ route('admin.detailPerusahaan', $p->id) }}" class="inline-block px-sm py-xs bg-secondary-fixed-dim/20 hover:bg-secondary-fixed-dim text-on-secondary-container border border-secondary-fixed-dim font-label-md text-label-md rounded-lg transition-all active:scale-95" onclick="event.stopPropagation()">Lihat Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-md py-8 text-center text-on-surface-variant bg-surface-container-lowest">
                                    Tidak ada data perusahaan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($perusahaan->count() > 0)
                <div class="px-md py-sm bg-surface-container-low border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-4">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">
                        Menampilkan {{ ($perusahaan->currentPage() - 1) * $perusahaan->perPage() + 1 }} - {{ min($perusahaan->currentPage() * $perusahaan->perPage(), $perusahaan->total()) }} dari {{ $perusahaan->total() }} perusahaan
                    </span>
                    <div class="flex items-center gap-2">
                        {{ $perusahaan->appends(request()->input())->links() }}
                    </div>
                </div>
            @endif
        </div>
    </main>

    <!-- Footer Decoration -->
    <footer class="mt-xl py-6 px-margin-desktop border-t border-outline-variant bg-surface flex justify-between items-center">
        <p class="text-label-sm text-on-surface-variant">© 2024 KerjaYok Enterprise. Hak cipta dilindungi undang-undang.</p>
        <div class="flex gap-6">
            <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Kebijakan Privasi</a>
            <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Syarat & Ketentuan</a>
            <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Pusat Bantuan</a>
        </div>
    </footer>
</body>
</html>
