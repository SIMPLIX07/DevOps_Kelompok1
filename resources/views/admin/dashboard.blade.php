<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>KerjaYok Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "surface": "#f7fafc",
                      "on-primary-fixed": "#001d31",
                      "inverse-primary": "#afc9e4",
                      "tertiary-fixed-dim": "#5adace",
                      "on-primary-container": "#7b95ae",
                      "inverse-on-surface": "#eef1f3",
                      "surface-dim": "#d7dadc",
                      "surface-container": "#ebeef0",
                      "secondary": "#006a68",
                      "surface-container-low": "#f1f4f6",
                      "error-container": "#ffdad6",
                      "surface-bright": "#f7fafc",
                      "on-error": "#ffffff",
                      "secondary-fixed": "#94f2f0",
                      "surface-container-high": "#e5e9eb",
                      "on-tertiary": "#ffffff",
                      "on-background": "#181c1e",
                      "background": "#f7fafc",
                      "on-secondary-fixed-variant": "#00504e",
                      "on-secondary": "#ffffff",
                      "outline-variant": "#c3c7cd",
                      "inverse-surface": "#2d3133",
                      "tertiary-container": "#00312d",
                      "primary-fixed-dim": "#afc9e4",
                      "tertiary-fixed": "#79f7ea",
                      "tertiary": "#001a18",
                      "surface-variant": "#e0e3e5",
                      "secondary-container": "#91f0ed",
                      "on-primary": "#ffffff",
                      "surface-tint": "#476178",
                      "on-surface": "#181c1e",
                      "secondary-fixed-dim": "#77d6d3",
                      "on-error-container": "#93000a",
                      "primary-fixed": "#cde5ff",
                      "on-tertiary-fixed": "#00201d",
                      "on-tertiary-fixed-variant": "#00504a",
                      "surface-container-lowest": "#ffffff",
                      "outline": "#73777d",
                      "on-primary-fixed-variant": "#2f495f",
                      "primary-container": "#112d42",
                      "primary": "#00182a",
                      "on-surface-variant": "#43474c",
                      "on-tertiary-container": "#00a499",
                      "on-secondary-fixed": "#00201f",
                      "on-secondary-container": "#006e6d",
                      "error": "#ba1a1a",
                      "surface-container-highest": "#e0e3e5"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "spacing": {
                      "base": "4px",
                      "xl": "64px",
                      "margin-mobile": "16px",
                      "lg": "40px",
                      "gutter": "24px",
                      "xs": "8px",
                      "margin-desktop": "48px",
                      "md": "24px",
                      "sm": "16px"
              },
              "fontFamily": {
                      "headline-lg-mobile": ["Manrope"],
                      "headline-md": ["Manrope"],
                      "headline-xl": ["Manrope"],
                      "body-lg": ["Inter"],
                      "headline-lg": ["Manrope"],
                      "body-md": ["Inter"],
                      "body-sm": ["Inter"],
                      "label-sm": ["Inter"],
                      "label-md": ["Inter"]
              },
              "fontSize": {
                      "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                      "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                      "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                      "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                      "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                      "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                      "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                      "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                      "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}]
              }
            },
          },
        }
    </script>
    <style>
        body {
            background-color: #f7fafc;
            color: #181c1e;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .gradient-header {
            background: linear-gradient(135deg, #00182a 0%, #006a68 100%);
        }
        .bento-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .bento-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -10px rgba(0, 24, 42, 0.15);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f4f6;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c3c7cd;
            border-radius: 10px;
        }
    </style>
</head>
<body class="font-body-md text-body-md flex min-h-screen">
    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-h-screen relative overflow-hidden">
        <!-- TopNavBar Component -->
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
                    <a class="text-label-md text-primary font-semibold" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a class="text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
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
            </div>
            <!-- Mobile Dropdown Navigation Drawer -->
            <div x-show="mobileMenuOpen" @click.outside="mobileMenuOpen = false" class="absolute top-full left-0 w-full border-b border-outline-variant bg-surface/95 backdrop-blur-md py-4 px-margin-mobile flex flex-col gap-3 shadow-lg z-40 md:hidden" style="display: none;">
                <a class="text-label-md text-primary font-semibold py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
                <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.historyVerifikasi') }}">Riwayat</a>
            </div>
        </header>

        <!-- Dashboard Canvas -->
        <div class="p-margin-desktop flex-1 overflow-y-auto custom-scrollbar">
            <!-- Alerts -->
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-secondary-container text-on-secondary-container text-body-sm font-semibold border border-secondary/20 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px]">task_alt</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('warning'))
                <div class="mb-6 p-4 rounded-lg bg-error-container text-on-error-container text-body-sm font-semibold border border-error/20 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px] text-error" data-icon="error">error</span>
                    <span>{{ session('warning') }}</span>
                </div>
            @endif

            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-lg gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="inline-block w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
                        <span class="text-label-sm font-medium text-secondary uppercase tracking-widest">Sistem Operasional</span>
                    </div>
                    <h2 class="font-headline-lg text-headline-lg text-primary">Dashboard Admin</h2>
                    <p class="text-body-md text-on-surface-variant mt-1">Selamat datang kembali, Login Berhasil pada {{ now()->format('h:i A') }}.</p>
                </div>
            </div>

            <!-- Statistic Cards Grid / Accordion on Mobile -->
            <div x-data="{ statsOpen: false }" class="mb-lg">
                <!-- Mobile Accordion Trigger -->
                <button @click="statsOpen = !statsOpen" class="w-full flex items-center justify-between bg-surface-container-lowest border border-outline-variant p-md rounded-2xl sm:hidden text-primary hover:bg-surface-container transition-all" type="button">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">query_stats</span>
                        <span class="font-headline-md text-headline-md text-primary">Statistik Ringkasan</span>
                    </div>
                    <span class="material-symbols-outlined transform transition-transform duration-200" :class="statsOpen ? 'rotate-180' : ''">expand_more</span>
                </button>

                <!-- Stats Container -->
                <div class="grid gap-gutter mt-4 sm:mt-0" :class="statsOpen ? 'grid-cols-1' : 'hidden sm:grid sm:grid-cols-2 xl:grid-cols-4'">
                    <!-- Total Perusahaan -->
                    <div class="bento-card bg-surface-container-lowest border border-outline-variant p-md rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-[80px]">corporate_fare</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 bg-primary-fixed rounded-xl flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined" style="font-variation-settings: &quot;FILL&quot; 1;">corporate_fare</span>
                            </div>
                            <span class="text-secondary font-semibold text-label-sm bg-secondary-container px-2 py-1 rounded-full">{{ $growthFormatted }}</span>
                        </div>
                        <div>
                            <p class="text-label-md text-on-surface-variant font-medium">Total Perusahaan</p>
                            <h3 class="font-headline-xl text-headline-xl text-primary mt-1">{{ $totalPerusahaan }}</h3>
                        </div>
                    </div>

                    <!-- Menunggu Verifikasi -->
                    <div class="bento-card bg-surface-container-lowest border border-outline-variant p-md rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-[80px]">pending_actions</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 bg-tertiary-fixed rounded-xl flex items-center justify-center text-on-tertiary-fixed-variant">
                                <span class="material-symbols-outlined" style="font-variation-settings: &quot;FILL&quot; 1;">pending_actions</span>
                            </div>
                            <span class="text-on-tertiary-container font-semibold text-label-sm bg-tertiary-container/10 px-2 py-1 rounded-full">Butuh Tindakan</span>
                        </div>
                        <div>
                            <p class="text-label-md text-on-surface-variant font-medium">Menunggu Verifikasi</p>
                            <h3 class="font-headline-xl text-headline-xl text-primary mt-1">{{ $pendingPerusahaan->total() }}</h3>
                        </div>
                    </div>

                    <!-- Terverifikasi -->
                    <div class="bento-card bg-surface-container-lowest border border-outline-variant p-md rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-[80px]">verified</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 bg-secondary-fixed rounded-xl flex items-center justify-center text-on-secondary-fixed-variant">
                                <span class="material-symbols-outlined" style="font-variation-settings: &quot;FILL&quot; 1;">verified</span>
                            </div>
                            <span class="text-secondary font-semibold text-label-sm bg-secondary-container px-2 py-1 rounded-full">Kepercayaan Tinggi</span>
                        </div>
                        <div>
                            <p class="text-label-md text-on-surface-variant font-medium">Terverifikasi</p>
                            <h3 class="font-headline-xl text-headline-xl text-primary mt-1">{{ $verifiedPerusahaan }}</h3>
                        </div>
                    </div>

                    <!-- Ditolak -->
                    <div class="bento-card bg-surface-container-lowest border border-outline-variant p-md rounded-2xl flex flex-col gap-4 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-[80px]">block</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 bg-error-container rounded-xl flex items-center justify-center text-error">
                                <span class="material-symbols-outlined" style="font-variation-settings: &quot;FILL&quot; 1;">block</span>
                            </div>
                            <span class="text-error font-semibold text-label-sm bg-error-container/50 px-2 py-1 rounded-full">Ditolak</span>
                        </div>
                        <div>
                            <p class="text-label-md text-on-surface-variant font-medium">Ditolak</p>
                            <h3 class="font-headline-xl text-headline-xl text-primary mt-1">{{ $rejectedPerusahaan }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verification Table Section -->
            <section class="bg-surface-container-lowest border border-outline-variant rounded-2xl shadow-sm overflow-hidden mb-lg">
                <div class="p-md border-b border-outline-variant flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-secondary/10 rounded-lg">
                            <span class="material-symbols-outlined text-secondary">fact_check</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-primary">Perusahaan Menunggu Verifikasi</h3>
                    </div>
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="relative w-full sm:w-64">
                            <input id="tableSearch" class="w-full border-outline-variant rounded-xl py-2 pl-10 focus:ring-2 focus:ring-secondary focus:border-secondary transition-all text-body-sm" placeholder="Saring nama..." type="text">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">filter_list</span>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low">
                                <th class="px-md py-4 text-label-md text-on-surface-variant uppercase tracking-wider font-semibold">No</th>
                                <th class="px-md py-4 text-label-md text-on-surface-variant uppercase tracking-wider font-semibold">Nama Perusahaan</th>
                                <th class="px-md py-4 text-label-md text-on-surface-variant uppercase tracking-wider font-semibold">Email</th>
                                <th class="px-md py-4 text-label-md text-on-surface-variant uppercase tracking-wider font-semibold">Telepon</th>
                                <th class="px-md py-4 text-label-md text-on-surface-variant uppercase tracking-wider font-semibold">Tanggal Daftar</th>
                                <th class="px-md py-4 text-label-md text-on-surface-variant uppercase tracking-wider font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="pendingTableBody" class="divide-y divide-outline-variant">
                            @forelse ($pendingPerusahaan as $index => $perusahaan)
                                <tr onclick="window.location='{{ route('admin.detailPerusahaan', $perusahaan->id) }}'" class="hover:bg-surface-container transition-colors group cursor-pointer">
                                    <td class="px-md py-5 text-body-sm font-medium text-on-surface-variant">
                                        {{ ($pendingPerusahaan->currentPage() - 1) * $pendingPerusahaan->perPage() + $index + 1 }}
                                    </td>
                                    <td class="px-md py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center font-bold text-primary text-[12px]">
                                                {{ strtoupper(substr($perusahaan->nama_perusahaan, 0, 2)) }}
                                            </div>
                                            <a href="{{ route('admin.detailPerusahaan', $perusahaan->id) }}" class="company-name text-body-md font-semibold text-primary group-hover:text-secondary group-hover:underline transition-colors" onclick="event.stopPropagation()">
                                                {{ $perusahaan->nama_perusahaan }}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-md py-5 text-body-sm text-on-surface-variant">{{ $perusahaan->email }}</td>
                                    <td class="px-md py-5 text-body-sm text-on-surface-variant">{{ $perusahaan->telepon }}</td>
                                    <td class="px-md py-5">
                                        <div class="flex flex-col">
                                            <span class="text-body-sm text-primary font-medium">{{ $perusahaan->created_at->format('d M Y') }}</span>
                                            <span class="text-[10px] text-on-surface-variant uppercase">{{ $perusahaan->created_at->format('h:i A') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-md py-5 text-center">
                                        <a href="{{ route('admin.detailPerusahaan', $perusahaan->id) }}" class="inline-block bg-primary text-on-primary px-4 py-2 rounded-lg text-label-sm font-medium hover:bg-primary-container transition-all active:scale-95">Lihat Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-md py-8 text-center text-on-surface-variant bg-surface-container-lowest">
                                        Tidak ada perusahaan yang menunggu verifikasi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Component -->
                @if ($pendingPerusahaan->count() > 0)
                    <div class="p-md bg-surface-container-low border-t border-outline-variant flex flex-col sm:flex-row justify-between items-center gap-4">
                        <p class="text-label-sm text-on-surface-variant font-medium">
                            Menampilkan {{ ($pendingPerusahaan->currentPage() - 1) * $pendingPerusahaan->perPage() + 1 }} sampai 
                            {{ min($pendingPerusahaan->currentPage() * $pendingPerusahaan->perPage(), $pendingPerusahaan->total()) }} dari 
                            {{ $pendingPerusahaan->total() }} entri
                        </p>
                        <div class="flex items-center gap-2">
                            {{ $pendingPerusahaan->links() }}
                        </div>
                    </div>
                @endif
            </section>

            <!-- Secondary Insight Grid (Visual Polish) -->
            <div class="grid grid-cols-1 gap-gutter">
                <div class="bg-surface-container-lowest border border-outline-variant rounded-2xl p-md"
                     x-data="{
                         period: '7',
                         trends7: {{ json_encode($trends) }},
                         trends30: {{ json_encode($trends30) }},
                         get currentTrends() {
                             return this.period === '7' ? this.trends7 : this.trends30;
                         },
                         getHeight(count) {
                             if (count === 0) return '4%';
                             return (Math.min(count, 50) / 50 * 100) + '%';
                         },
                         getBarColor(count, index, total) {
                             if (count === 0) return '#ebeef0'; // Slate-100 like surface-container
                             let ratio = total > 1 ? index / (total - 1) : 0;
                             let h = Math.round(190 + ratio * 28);
                             let s = 80;
                             let l = Math.round(65 - ratio * 13);
                             return 'hsl(' + h + ', ' + s + '%, ' + l + '%)';
                         }
                     }">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <h4 class="font-headline-md text-headline-md text-primary">Tren Pendaftaran</h4>
                        <select x-model="period" class="w-full sm:w-auto bg-surface border-outline-variant rounded-lg text-label-sm py-1.5 focus:ring-secondary">
                            <option value="7">7 Hari Terakhir</option>
                            <option value="30">30 Hari Terakhir</option>
                        </select>
                    </div>
                    <div class="flex gap-4">
                        <!-- Y-Axis Labels -->
                        <div class="flex flex-col justify-between text-right text-[10px] text-on-surface-variant font-bold h-64 pb-4 select-none w-8">
                            <span>50</span>
                            <span>40</span>
                            <span>30</span>
                            <span>20</span>
                            <span>10</span>
                            <span>0</span>
                        </div>
                        <!-- Chart Area -->
                        <div class="flex-1 relative h-64">
                            <!-- Grid Lines -->
                            <div class="absolute inset-0 flex flex-col justify-between pb-4 pointer-events-none">
                                <div class="border-t border-outline-variant/30 w-full"></div>
                                <div class="border-t border-outline-variant/30 w-full"></div>
                                <div class="border-t border-outline-variant/30 w-full"></div>
                                <div class="border-t border-outline-variant/30 w-full"></div>
                                <div class="border-t border-outline-variant/30 w-full"></div>
                                <div class="border-b border-outline-variant w-full"></div>
                            </div>
                            <!-- Bars -->
                            <div class="absolute inset-0 flex items-end gap-2 sm:gap-4 pb-4 px-2">
                                <template x-for="(t, index) in currentTrends" :key="index">
                                    <div class="flex-1 rounded-t-lg group relative hover:opacity-90 transition-all cursor-pointer" 
                                         :style="{ 
                                             height: getHeight(t.count), 
                                             backgroundColor: getBarColor(t.count, index, currentTrends.length) 
                                         }">
                                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-primary text-on-primary text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-20">
                                            <span x-text="t.count + ' Baru'"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <!-- X-Axis Labels -->
                    <div class="flex gap-4">
                        <div class="w-8"></div>
                        <div class="flex-1 flex justify-between mt-4 px-2 text-[10px] sm:text-xs text-on-surface-variant font-bold uppercase tracking-widest">
                            <template x-for="(t, index) in currentTrends" :key="index">
                                <span class="flex-1 text-center" :title="t.date_label" x-text="t.day"></span>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Decoration -->
        <footer class="mt-xl py-6 px-margin-desktop border-t border-outline-variant bg-surface flex justify-between items-center">
            <p class="text-label-sm text-on-surface-variant">© 2024 KerjaYok Enterprise. Hak cipta dilindungi undang-undang.</p>
            <div class="flex gap-6">
                <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Kebijakan Privasi</a>
                <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Syarat & Ketentuan</a>
                <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Pusat Bantuan</a>
            </div>
        </footer>
    </main>


    <script>
        // Interactive table filter (client-side)
        const tableSearch = document.getElementById('tableSearch');
        if (tableSearch) {
            tableSearch.addEventListener('input', function(e) {
                const query = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#pendingTableBody tr');
                
                rows.forEach(row => {
                    const companyNameEl = row.querySelector('.company-name');
                    if (companyNameEl) {
                        const companyName = companyNameEl.textContent.toLowerCase();
                        if (companyName.includes(query)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            });
        }
    </script>
</body>
</html>
