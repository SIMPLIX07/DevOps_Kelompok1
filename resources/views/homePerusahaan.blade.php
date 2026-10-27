<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lowongan Anda - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-background": "#181c1e",
                        "inverse-on-surface": "#eef1f3",
                        "surface-dim": "#d7dadc",
                        "on-error": "#ffffff",
                        "tertiary-container": "#00312d",
                        "secondary-fixed-dim": "#77d6d3",
                        "secondary-fixed": "#94f2f0",
                        "on-primary": "#ffffff",
                        "on-tertiary-fixed-variant": "#00504a",
                        "surface-variant": "#e0e3e5",
                        "on-secondary": "#ffffff",
                        "surface-container-low": "#f1f4f6",
                        "inverse-surface": "#2d3133",
                        "on-secondary-fixed-variant": "#00504e",
                        "error": "#ba1a1a",
                        "on-secondary-fixed": "#00201f",
                        "on-secondary-container": "#006e6d",
                        "surface-container": "#ebeef0",
                        "secondary-container": "#91f0ed",
                        "primary-fixed-dim": "#afc9e4",
                        "tertiary-fixed-dim": "#5adace",
                        "primary-fixed": "#cde5ff",
                        "on-surface": "#181c1e",
                        "on-tertiary-fixed": "#00201d",
                        "inverse-primary": "#afc9e4",
                        "on-primary-fixed-variant": "#2f495f",
                        "background": "#f7fafc",
                        "error-container": "#ffdad6",
                        "on-surface-variant": "#43474c",
                        "on-primary-container": "#7b95ae",
                        "on-error-container": "#93000a",
                        "surface-container-high": "#e5e9eb",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed": "#001d31",
                        "tertiary": "#001a18",
                        "on-tertiary-container": "#00a499",
                        "surface-tint": "#476178",
                        "outline-variant": "#c3c7cd",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed": "#79f7ea",
                        "outline": "#73777d",
                        "primary": "#00182a",
                        "surface-bright": "#f7fafc",
                        "surface-container-highest": "#e0e3e5",
                        "surface": "#f7fafc",
                        "secondary": "#006a68",
                        "primary-container": "#112d42"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "lg": "40px",
                        "gutter": "24px",
                        "xl": "64px",
                        "sm": "16px",
                        "md": "24px",
                        "base": "4px",
                        "margin-mobile": "16px",
                        "xs": "8px",
                        "margin-desktop": "48px"
                    },
                    "fontFamily": {
                        "headline-lg": ["Manrope"],
                        "body-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-md": ["Manrope"],
                        "headline-xl": ["Manrope"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "700"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "headline-xl": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "14px",
                            "fontWeight": "500"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #00182a 0%, #006a68 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid #E2E8F0;
        }

        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-md antialiased">
    <header class="bg-surface-container-lowest dark:bg-surface-container-lowest text-primary dark:text-primary-fixed-dim docked full-width top-0 sticky z-50 shadow-sm dark:shadow-none">
        <div class="flex justify-between items-center w-full px-4 md:px-margin-desktop max-w-7xl mx-auto h-16">
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="block md:hidden text-primary dark:text-primary-fixed-dim hover:bg-surface-container-low dark:hover:bg-surface-container-low p-2 rounded-lg transition-all" type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="/" class="text-headline-md font-headline-md font-extrabold text-primary dark:text-primary-fixed-dim">KerjaYok</a>
            </div>
            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-primary dark:text-primary-fixed-dim border-b-2 border-primary dark:border-primary-fixed-dim pb-1 font-bold text-label-md font-label-md active:scale-95 transition-transform duration-150" href="/home-perusahaan">Lowongan Anda</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors text-label-md font-label-md hover:bg-surface-container-low dark:hover:bg-surface-container-low transition-all duration-200" href="/karyawanPerusahaan">Karyawan</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors text-label-md font-label-md hover:bg-surface-container-low dark:hover:bg-surface-container-low transition-all duration-200" href="/perusahaan/wawancara">Wawancara</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors text-label-md font-label-md hover:bg-surface-container-low dark:hover:bg-surface-container-low transition-all duration-200" href="{{ route('perusahaan.history') }}">History</a>
            </nav>
            <div class="flex items-center gap-4">
                <a href="{{ route('perusahaan.settings') }}" class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low dark:hover:bg-surface-container-low transition-colors text-primary dark:text-primary-fixed-dim text-label-md font-label-md">
                    @if(session('perusahaan_foto'))
                        <img src="{{ asset('storage/' . session('perusahaan_foto')) }}" alt="Logo Perusahaan" class="w-8 h-8 rounded-full object-cover border border-outline-variant">
                    @else
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">account_circle</span>
                    @endif
                    <span class="hidden sm:inline">{{ session('perusahaan_nama') }}</span>
                </a>
            </div>
        </div>
        <!-- Mobile Dropdown Navigation Menu -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex flex-col gap-3 shadow-lg z-40 md:hidden">
            <a class="text-label-md text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all" href="/home-perusahaan">Lowongan Anda</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/karyawanPerusahaan">Karyawan</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/perusahaan/wawancara">Wawancara</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('perusahaan.history') }}">History</a>
        </div>
    </header>
    <main>
        <!-- Hero Section -->
        <section class="hero-gradient py-xl px-margin-desktop text-on-primary">
            <div class="max-w-7xl mx-auto space-y-lg">
                <div class="space-y-xs">
                    <h1 class="font-headline-xl text-headline-xl">Lowongan Anda</h1>
                    <p class="font-body-lg text-body-lg opacity-90">Kelola dan pantau proses rekrutmen perusahaan Anda dengan efisien.</p>
                </div>
                <div class="max-w-2xl">
                    <form action="/home-perusahaan" method="GET" class="relative flex items-center w-full">
                        <span class="material-symbols-outlined absolute left-sm text-outline">search</span>
                        <input name="q" value="{{ request('q') }}" class="search-input w-full pl-xl pr-[100px] py-md rounded-xl bg-surface-container-lowest text-on-surface border-none shadow-lg focus:ring-2 focus:ring-secondary transition-all" placeholder="Filter lowongan..." type="text">
                        <button type="submit" class="absolute right-xs px-lg py-sm bg-secondary text-on-secondary font-label-md rounded-lg hover:opacity-90 active:scale-95 transition-all">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- Content Area -->
        <section class="py-lg px-margin-desktop max-w-7xl mx-auto mt-8">
            <!-- Job Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                <!-- Add New Card -->
                @if(!request('q'))
                <a href="/lowongan/tambah" class="group flex flex-col items-center justify-center p-xl border-2 border-dashed border-outline-variant rounded-xl bg-surface-container-low hover:bg-surface-container-lowest hover:border-secondary transition-all duration-300 min-h-[280px]">
                    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-secondary text-[32px]">add</span>
                    </div>
                    <span class="font-headline-md text-headline-md text-secondary">Tambah Lowongan Baru</span>
                </a>
                @endif

                @if ($lowongans->isEmpty())
                    @if (request('q'))
                    <div class="col-span-full text-center py-xl bg-surface-container-low rounded-xl">
                        <p class="font-body-lg text-on-surface-variant">Tidak ada lowongan ditemukan dengan kata kunci "{{ request('q') }}"</p>
                    </div>
                    @endif
                @else
                    @foreach ($lowongans as $lowongan)
                    <!-- Job Card -->
                    <div class="glass-card p-md rounded-xl flex flex-col justify-between hover:shadow-lg transition-all duration-300 border border-outline-variant group min-h-[280px] h-full" style="transform: translateY(0px);">
                        <div class="space-y-xs">
                            <h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-secondary transition-colors">{{ $lowongan->posisi_pekerjaan }}</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">{{ $lowongan->deskripsi_singkat }}</p>
                        </div>
                        <div class="space-y-sm mt-4">
                            <div class="flex items-center justify-between text-body-sm">
                                <div class="flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-outline text-[20px] align-middle">group</span>
                                    <span class="text-on-surface-variant align-middle">Pelamar: <span class="font-bold text-on-surface">{{ $lowongan->lamarans_count }}</span></span>
                                </div>
                                <span class="text-outline text-[12px] align-middle">
                                    {{ \Carbon\Carbon::parse($lowongan->tanggal_mulai)->format('d-m-Y') }} – {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d-m-Y') }}
                                </span>
                            </div>
                            <a href="{{ route('perusahaan.lowongan.detail', $lowongan->id) }}" class="w-full block text-center py-2 bg-secondary text-on-secondary rounded-lg font-label-md hover:opacity-90 active:scale-95 transition-all text-white font-semibold hover:text-white">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- Statistics Bar -->
        <section class="max-w-7xl mx-auto px-margin-desktop mb-xl">
            <div class="bg-primary text-on-primary rounded-2xl p-lg grid grid-cols-1 md:grid-cols-3 gap-lg text-center divide-y md:divide-y-0 md:divide-x divide-on-primary-container">
                <div class="py-md md:py-0">
                    <p class="font-label-md uppercase tracking-wider text-on-primary-container mb-base">Total Lowongan</p>
                    <p class="font-headline-xl text-headline-xl text-secondary-fixed">
                        {{ \App\Models\Lowongan::where('perusahaan_id', session('perusahaan_id'))->count() }}
                    </p>
                </div>
                <div class="py-md md:py-0">
                    <p class="font-label-md uppercase tracking-wider text-on-primary-container mb-base">Total Pelamar</p>
                    <p class="font-headline-xl text-headline-xl text-secondary-fixed">
                        {{ \App\Models\Lamaran::whereIn('lowongan_id', \App\Models\Lowongan::where('perusahaan_id', session('perusahaan_id'))->pluck('id'))->count() }}
                    </p>
                </div>
                <div class="py-md md:py-0">
                    <p class="font-label-md uppercase tracking-wider text-on-primary-container mb-base">Wawancara Minggu Ini</p>
                    <div class="flex items-center justify-center gap-xs">
                        <span class="font-headline-xl text-headline-xl text-secondary-fixed">
                            {{ \App\Models\Wawancara::where('perusahaan_id', session('perusahaan_id'))->whereBetween('tanggal', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->count() }}
                        </span>
                        <span class="material-symbols-outlined text-tertiary-fixed">trending_up</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-surface-container-lowest dark:bg-inverse-surface border-t border-outline-variant dark:border-outline">
        <div class="w-full py-xl px-margin-desktop flex flex-col md:flex-row justify-between items-center max-w-7xl mx-auto">
            <div class="mb-md md:mb-0">
                <span class="font-headline-md text-headline-md font-black text-secondary dark:text-secondary-fixed">KerjaYok</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant mt-base">© 2024 KerjaYok. All rights reserved.</p>
            </div>
            <div class="flex gap-lg flex-wrap justify-center">
                <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-all" href="#">Tentang Kami</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-all" href="#">Kebijakan Privasi</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-all" href="#">Hubungi Kami</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-all" href="#">Pusat Bantuan</a>
            </div>
        </div>
    </footer>
    <script>
        // Micro-interactions for job cards
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-4px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Search form reset on empty search
        const searchInput = document.querySelector('.search-input');
        const searchForm = document.querySelector('form');

        if (searchInput && searchForm) {
            searchInput.addEventListener('input', function() {
                if (this.value === '') {
                    searchForm.submit();
                }
            });
        }
    </script>
</body>

</html>