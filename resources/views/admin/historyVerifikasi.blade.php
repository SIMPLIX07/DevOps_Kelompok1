<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Riwayat Verifikasi Perusahaan | KerjaYok Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "primary-container": "#112d42",
                    "surface-container": "#ebeef0",
                    "background": "#f7fafc",
                    "surface-variant": "#e0e3e5",
                    "inverse-surface": "#2d3133",
                    "tertiary-fixed": "#79f7ea",
                    "surface-container-lowest": "#ffffff",
                    "secondary-fixed": "#94f2f0",
                    "surface-container-low": "#f1f4f6",
                    "outline": "#73777d",
                    "surface-container-highest": "#e0e3e5",
                    "surface-bright": "#f7fafc",
                    "tertiary": "#001a18",
                    "on-secondary-fixed": "#00201f",
                    "tertiary-container": "#00312d",
                    "surface": "#f7fafc",
                    "on-primary": "#ffffff",
                    "secondary-container": "#91f0ed",
                    "on-primary-container": "#7b95ae",
                    "secondary": "#006a68",
                    "primary": "#00182a",
                    "on-tertiary": "#ffffff",
                    "on-secondary-container": "#006e6d",
                    "on-primary-fixed": "#001d31",
                    "primary-fixed-dim": "#afc9e4",
                    "outline-variant": "#c3c7cd",
                    "surface-dim": "#d7dadc",
                    "error-container": "#ffdad6",
                    "surface-tint": "#476178",
                    "inverse-primary": "#afc9e4",
                    "surface-container-high": "#e5e9eb",
                    "error": "#ba1a1a",
                    "tertiary-fixed-dim": "#5adace",
                    "on-background": "#181c1e",
                    "on-primary-fixed-variant": "#2f495f",
                    "on-error-container": "#93000a",
                    "on-tertiary-fixed-variant": "#00504a",
                    "secondary-fixed-dim": "#77d6d3",
                    "on-error": "#ffffff",
                    "on-surface-variant": "#43474c",
                    "on-secondary-fixed-variant": "#00504e",
                    "on-tertiary-fixed": "#00201d",
                    "on-surface": "#181c1e",
                    "inverse-on-surface": "#eef1f3",
                    "primary-fixed": "#cde5ff",
                    "on-tertiary-container": "#00a499",
                    "on-secondary": "#ffffff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "sm": "16px",
                    "lg": "40px",
                    "md": "24px",
                    "margin-mobile": "16px",
                    "margin-desktop": "48px",
                    "base": "4px",
                    "gutter": "24px",
                    "xs": "8px",
                    "xl": "64px"
            },
            "fontFamily": {
                    "headline-md": ["Manrope"],
                    "label-sm": ["Inter"],
                    "headline-lg": ["Manrope"],
                    "body-lg": ["Inter"],
                    "body-sm": ["Inter"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-lg-mobile": ["Manrope"],
                    "headline-xl": ["Manrope"]
            },
            "fontSize": {
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}]
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
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col selection:bg-secondary-fixed selection:text-on-secondary-fixed">

<!-- TopNavBar -->
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
            <a class="text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
            <a class="text-label-md text-primary font-semibold" href="{{ route('admin.historyVerifikasi') }}">Riwayat</a>
        </nav>
    </div>
    <div class="flex items-center gap-6">
        <!-- Profile Dropdown -->
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
        <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
        <a class="text-label-md text-primary font-semibold py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.historyVerifikasi') }}">Riwayat</a>
    </div>
</header>

<main class="flex-grow w-full max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop py-lg">
    <!-- Header Section -->
    <header class="mb-lg">
        <div class="flex items-center gap-xs mb-base">
            <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">history_edu</span>
            <h1 class="font-headline-md text-headline-md text-primary">Riwayat Verifikasi Perusahaan</h1>
        </div>
        <p class="font-body-md text-body-md text-on-surface-variant">Log komprehensif seluruh aktivitas verifikasi data perusahaan dalam platform KerjaYok.</p>
    </header>

    <!-- Search & Filter Controls -->
    <div class="flex flex-col md:flex-row gap-md mb-md">
        <!-- Search Form -->
        <form action="{{ route('admin.historyVerifikasi') }}" method="GET" class="relative flex-grow max-w-md">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline">search</span>
            <input name="search" value="{{ request('search') }}" id="searchInput" class="w-full pl-[48px] pr-md py-sm bg-white border border-outline-variant rounded-xl focus:ring-2 focus:ring-secondary/20 focus:outline-none transition-all font-body-sm text-body-sm" placeholder="Cari nama perusahaan atau email..." type="text">
        </form>

        <div class="flex gap-sm items-center">
            <!-- Filter Dropdown Button using Alpine.js -->
            <div class="relative" x-data="{ filterOpen: false }">
                <button @click="filterOpen = !filterOpen" type="button" class="flex items-center gap-xs px-md py-sm bg-white border border-outline-variant rounded-xl font-label-md text-label-md hover:bg-surface-container-low transition-all">
                    <span class="material-symbols-outlined text-outline">filter_list</span>
                    <span>Filter</span>
                </button>
                
                <!-- Dropdown List -->
                <div x-show="filterOpen" @click.outside="filterOpen = false" class="absolute left-0 md:right-0 md:left-auto mt-2 w-48 bg-white border border-outline-variant rounded-xl shadow-lg py-2 z-30" style="display: none;"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95">
                    <a href="{{ route('admin.historyVerifikasi', ['status' => 'verified', 'search' => request('search')]) }}" class="block px-4 py-2 text-body-sm text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px] text-secondary">check_circle</span>
                        <span>Terverifikasi</span>
                    </a>
                    <a href="{{ route('admin.historyVerifikasi', ['status' => 'rejected', 'search' => request('search')]) }}" class="block px-4 py-2 text-body-sm text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px] text-error">cancel</span>
                        <span>Ditolak</span>
                    </a>
                    <div class="border-t border-outline-variant my-1"></div>
                    <a href="{{ route('admin.historyVerifikasi', ['search' => request('search')]) }}" class="block px-4 py-2 text-body-sm text-secondary font-bold hover:bg-surface-container transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">clear_all</span>
                        <span>Semua Status</span>
                    </a>
                </div>
            </div>

            <!-- Active Filters Indicator / Reset -->
            @if(request()->filled('search') || request()->filled('status'))
                <a href="{{ route('admin.historyVerifikasi') }}" class="flex items-center gap-xs px-md py-sm bg-outline-variant text-on-surface-variant rounded-xl font-label-md text-label-md hover:bg-outline-variant/70 transition-colors">
                    Reset
                </a>
            @endif
        </div>
    </div>

    <!-- Verification Table -->
    <div class="bg-white rounded-xl border border-outline-variant shadow-sm overflow-hidden">
        <div class="overflow-x-auto flex-1">
            <table class="w-full text-left border-collapse">
                <thead class="bg-surface-container-low border-b border-outline-variant">
                    <tr>
                        <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant w-16">No</th>
                        <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Nama Perusahaan</th>
                        <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Email</th>
                        <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Status</th>
                        <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Tanggal Verifikasi</th>
                        <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant" id="historyTableBody">
                    @forelse ($history as $index => $p)
                        <tr class="hover:bg-surface-container-lowest transition-all hover:scale-[1.002] hover:shadow-sm cursor-pointer" onclick="window.location='{{ route('admin.detailPerusahaan', $p->id) }}'">
                            <td class="px-md py-md font-body-sm text-body-sm">
                                {{ ($history->currentPage() - 1) * $history->perPage() + $index + 1 }}
                            </td>
                            <td class="px-md py-md font-body-md text-body-md font-semibold text-primary company-name">
                                <a href="{{ route('admin.detailPerusahaan', $p->id) }}" class="hover:underline">{{ $p->nama_perusahaan }}</a>
                            </td>
                            <td class="px-md py-md font-body-sm text-body-sm text-on-surface-variant break-all">
                                {{ $p->email }}
                            </td>
                            <td class="px-md py-md">
                                @if ($p->status_verifikasi === 'verified')
                                    <span class="inline-flex items-center gap-1 px-sm py-1 rounded-full bg-secondary-container text-secondary font-label-sm text-label-sm">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-sm py-1 rounded-full bg-error-container text-error font-label-sm text-label-sm">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">cancel</span>
                                        Ditolak
                                    </span>
                                @endif
                            </td>
                            <td class="px-md py-md font-body-sm text-body-sm text-on-surface-variant">
                                {{ $p->verified_at ? $p->verified_at->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td class="px-md py-md font-body-sm text-body-sm break-words {{ $p->status_verifikasi === 'verified' ? 'text-secondary font-medium' : 'text-error font-medium' }}">
                                {{ $p->alasan_penolakan ?? 'Disetujui' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-md py-lg text-center font-body-md text-on-surface-variant italic bg-surface-container-lowest">
                                Belum ada riwayat verifikasi perusahaan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($history->hasPages())
            <div class="px-md py-md flex items-center justify-between border-t border-outline-variant bg-surface-container-lowest">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Menampilkan <span class="font-bold">{{ $history->firstItem() }}</span> sampai <span class="font-bold">{{ $history->lastItem() }}</span> dari <span class="font-bold">{{ $history->total() }}</span> entri
                </p>
                <div class="flex items-center gap-xs">
                    {{ $history->links() }}
                </div>
            </div>
        @endif
    </div>
</main>

<!-- Footer -->
<footer class="mt-xl py-6 px-margin-desktop border-t border-outline-variant bg-surface flex justify-between items-center">
    <p class="text-label-sm text-on-surface-variant">© 2024 KerjaYok Enterprise. Hak cipta dilindungi undang-undang.</p>
    <div class="flex gap-6">
        <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Kebijakan Privasi</a>
        <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Syarat & Ketentuan</a>
        <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Pusat Bantuan</a>
    </div>
</footer>

<script>
    // Client-side search for the current page rows
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#historyTableBody tr');
            
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(term) ? '' : 'none';
            });
        });
    }
</script>

</body>
</html>
