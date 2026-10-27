<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KerjaYok - Temukan Karir Impian Anda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-tertiary-fixed": "#00201d",
                        "surface-container-lowest": "#ffffff",
                        "inverse-surface": "#2d3133",
                        "on-primary-fixed-variant": "#2f495f",
                        "surface-container-highest": "#e0e3e5",
                        "error-container": "#ffdad6",
                        "surface-container-low": "#f1f4f6",
                        "on-primary-container": "#7b95ae",
                        "tertiary-container": "#00312d",
                        "primary-fixed": "#cde5ff",
                        surface: "#f7fafc",
                        "primary-fixed-dim": "#afc9e4",
                        "on-secondary-fixed-variant": "#00504e",
                        "on-surface": "#181c1e",
                        "on-secondary-fixed": "#00201f",
                        "secondary-container": "#91f0ed",
                        primary: "#00182a",
                        outline: "#73777d",
                        "on-primary": "#ffffff",
                        "on-primary-fixed": "#001d31",
                        "surface-variant": "#e0e3e5",
                        "on-secondary": "#ffffff",
                        "tertiary-fixed-dim": "#5adace",
                        "on-secondary-container": "#006e6d",
                        "surface-tint": "#476178",
                        "outline-variant": "#c3c7cd",
                        "surface-container": "#ebeef0",
                        "surface-bright": "#f7fafc",
                        "on-tertiary-fixed-variant": "#00504a",
                        "inverse-primary": "#afc9e4",
                        "inverse-on-surface": "#eef1f3",
                        background: "#f7fafc",
                        "surface-dim": "#d7dadc",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed": "#79f7ea",
                        "on-tertiary-container": "#00a499",
                        "on-error": "#ffffff",
                        "on-surface-variant": "#43474c",
                        secondary: "#006a68",
                        "on-background": "#181c1e",
                        "surface-container-high": "#e5e9eb",
                        "on-error-container": "#93000a",
                        tertiary: "#001a18",
                        "secondary-fixed-dim": "#77d6d3",
                        "secondary-fixed": "#94f2f0",
                        "primary-container": "#112d42",
                        error: "#ba1a1a",
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px",
                    },
                    spacing: {
                        xs: "8px",
                        sm: "16px",
                        base: "4px",
                        "margin-desktop": "48px",
                        lg: "40px",
                        gutter: "24px",
                        md: "24px",
                        "margin-mobile": "16px",
                        xl: "64px",
                    },
                    fontFamily: {
                        "headline-xl": ["Manrope"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-lg": ["Manrope"],
                        "body-md": ["Inter"],
                        "headline-md": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "label-sm": ["Inter"],
                    },
                    fontSize: {
                        "headline-xl": ["40px", {
                            lineHeight: "48px",
                            letterSpacing: "-0.02em",
                            fontWeight: "700"
                        }],
                        "body-lg": ["18px", {
                            lineHeight: "28px",
                            fontWeight: "400"
                        }],
                        "label-md": ["14px", {
                            lineHeight: "16px",
                            letterSpacing: "0.05em",
                            fontWeight: "600"
                        }],
                        "body-sm": ["14px", {
                            lineHeight: "20px",
                            fontWeight: "400"
                        }],
                        "headline-lg": ["32px", {
                            lineHeight: "40px",
                            letterSpacing: "-0.01em",
                            fontWeight: "700"
                        }],
                        "body-md": ["16px", {
                            lineHeight: "24px",
                            fontWeight: "400"
                        }],
                        "headline-md": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "600"
                        }],
                        "headline-lg-mobile": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "700"
                        }],
                        "label-sm": ["12px", {
                            lineHeight: "14px",
                            fontWeight: "500"
                        }],
                    },
                },
            },
        }
    </script>

    <style>
        body {
            background-color: #f7fafc;
            color: #181c1e;
        }

        .pattern-dots {
            background-image: radial-gradient(#c3c7cd 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .job-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .job-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 24, 42, 0.1), 0 8px 10px -6px rgba(0, 24, 42, 0.1);
            border-color: #006a68;
        }

        .job-card-fixed {
            min-height: 320px;
        }

        .job-title-clamp {
            display: -webkit-box;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            min-height: 64px;
        }

        .job-company-clamp {
            min-height: 24px;
        }

        .btn-primary {
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            box-shadow: 0 0 15px rgba(0, 106, 104, 0.4);
        }

        .search-input:focus-within {
            box-shadow: 0 0 0 2px rgba(0, 106, 104, 0.2);
            border-color: #006a68;
        }
    </style>
</head>

<body class="font-body-md text-body-md antialiased relative min-h-screen flex flex-col">
    <!-- Ambient Background Shapes -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-[-1]">
        <div
            class="absolute top-[-10%] right-[-5%] w-[40%] h-[40%] rounded-full bg-primary-fixed opacity-30 blur-3xl mix-blend-multiply">
        </div>
        <div
            class="absolute bottom-[-10%] left-[-5%] w-[50%] h-[50%] rounded-full bg-secondary-fixed opacity-20 blur-3xl mix-blend-multiply">
        </div>
        <div
            class="absolute inset-0 pattern-dots opacity-30 [mask-image:linear-gradient(to_bottom,transparent,black,transparent)]">
        </div>
    </div>

    <!-- TopNavBar -->
    <header class="bg-surface-container-lowest text-primary sticky top-0 z-50 shadow-sm">
    <div class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop max-w-7xl mx-auto h-16">

        <div class="flex items-center gap-4">
            <button onclick="toggleMobileMenu()"
                class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all"
                type="button"
                aria-label="Buka menu navigasi">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <a href="{{ route('home') }}"
                class="text-headline-md font-headline-md font-extrabold text-primary">KerjaYok</a>
        </div>

        <nav class="hidden md:flex gap-8 items-center">
            <a class="text-primary border-b-2 border-primary pb-1 font-bold text-label-md font-label-md"
                href="{{ route('home') }}">Lowongan Kerja</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                href="{{ route('pelamar.wawancara') }}">Wawancara</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                href="{{ route('pelamar.bookmark') }}">Bookmark</a>
        </nav>

        <a href="{{ route('pelamar.settings') }}"
            class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low transition-colors text-primary">
            @if(session('pelamar_foto'))
                <img src="{{ asset('storage/' . session('pelamar_foto')) }}" alt="Profil"
                    class="w-8 h-8 rounded-full object-cover border border-outline-variant">
            @else
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">account_circle</span>
            @endif
            <span class="hidden sm:inline text-label-md font-label-md">{{ session('pelamar_nama') ?? 'Profil' }}</span>
        </a>
    </div>

    {{-- Mobile Dropdown: flex-col tanpa flex, toggle via JS --}}
    <div id="mobile-menu"
        class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex-col gap-3 shadow-lg z-40 md:hidden">
        <a class="text-label-md text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all"
            href="{{ route('home') }}">Lowongan Kerja</a>
        <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
            href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
        <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
            href="{{ route('pelamar.wawancara') }}">Wawancara</a>
        <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
            href="{{ route('pelamar.bookmark') }}">Bookmark</a>
    </div>
</header>

    <main class="flex-grow w-full">
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-primary-container via-primary to-secondary py-24 px-margin-mobile md:px-margin-desktop flex items-center justify-center">
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div
                    class="absolute -top-24 -right-24 w-96 h-96 bg-secondary-container rounded-full mix-blend-overlay filter blur-3xl opacity-50">
                </div>
                <div
                    class="absolute top-1/2 -left-24 w-72 h-72 bg-tertiary-container rounded-full mix-blend-overlay filter blur-3xl opacity-50">
                </div>
            </div>

            <div class="relative z-10 w-full max-w-7xl flex flex-col items-center text-center">
                <h1 class="text-headline-xl font-headline-xl text-on-primary mb-6 max-w-3xl leading-tight">Temukan Karir
                    Impian Anda</h1>
                <p class="text-body-lg font-body-lg text-primary-fixed-dim mb-12 max-w-2xl">Akselerasi masa depan Anda
                    dengan ribuan lowongan pekerjaan terbaik dari perusahaan terkemuka di Indonesia.</p>

                <!-- Search Bar -->
                <form action="{{ route('home') }}" method="GET"
                    class="w-full max-w-4xl bg-surface-container-lowest rounded-xl shadow-lg p-2 flex flex-col md:flex-row gap-2 items-center">
                    @if (request()->filled('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}" />
                    @endif
                    @if (request()->filled('gaji_range'))
                        <input type="hidden" name="gaji_range" value="{{ request('gaji_range') }}" />
                    @endif
                    @if (request()->filled('jenis_pekerjaan'))
                        <input type="hidden" name="jenis_pekerjaan" value="{{ request('jenis_pekerjaan') }}" />
                    @endif
                    <div
                        class="flex-1 w-full flex items-center bg-surface-container-low rounded-lg px-4 py-3 search-input transition-colors group">
                        <span class="material-symbols-outlined text-outline group-focus-within:text-secondary mr-3"
                            style="font-variation-settings: 'FILL' 0;">search</span>
                        <input
                            class="w-full bg-transparent border-none focus:ring-0 text-on-surface text-body-md font-body-md placeholder-outline p-0"
                            placeholder="Posisi, kata kunci, atau perusahaan" type="text" name="q"
                            value="{{ request('q') }}" />
                    </div>

                    <div class="hidden md:block w-px h-8 bg-outline-variant"></div>

                    <!-- Custom Searchable Location Dropdown -->
                    <div class="relative w-full md:w-64">
                        <button type="button" id="lokasi-dropdown-btn"
                            class="w-full flex items-center bg-surface-container-low rounded-lg px-4 py-3 search-input transition-colors group text-left justify-between focus:outline-none focus:ring-2 focus:ring-secondary">
                            <div class="flex items-center min-w-0">
                                <span
                                    class="material-symbols-outlined text-outline group-focus-within:text-secondary mr-3 flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 0;">location_on</span>
                                <span id="lokasi-selected-text"
                                    class="text-on-surface text-body-md font-body-md truncate">
                                    {{ request('lokasi') ?: 'Semua Lokasi' }}
                                </span>
                            </div>
                            <span
                                class="material-symbols-outlined text-outline ml-2 transition-transform duration-200 flex-shrink-0"
                                id="lokasi-dropdown-arrow" style="font-variation-settings: 'FILL' 0;">expand_more</span>
                        </button>
                        <input type="hidden" name="lokasi" id="input-lokasi" value="{{ request('lokasi') }}">

                        <!-- Dropdown Panel -->
                        <div id="lokasi-dropdown-panel"
                            class="absolute z-[9999] left-0 right-0 mt-2 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-lg p-3 hidden transition-all duration-150 ease-out origin-top scale-95 opacity-0">
                            <!-- Search Input -->
                            <div
                                class="flex items-center bg-surface-container-low rounded-lg px-3 py-2 mb-2 focus-within:ring-1 focus-within:ring-secondary">
                                <span
                                    class="material-symbols-outlined text-outline text-[18px] mr-2 flex-shrink-0">search</span>
                                <input type="text" id="search-lokasi-input"
                                    class="w-full bg-transparent border-none focus:ring-0 text-on-surface text-body-sm p-0 placeholder-outline"
                                    placeholder="Cari lokasi...">
                            </div>
                            <!-- Options List -->
                            <ul id="lokasi-options-list" class="max-h-60 overflow-y-auto space-y-1">
                                <li data-value=""
                                    class="px-3 py-2 rounded-lg text-body-sm cursor-pointer hover:bg-surface-container-high transition-colors select-none text-on-surface flex items-center justify-between {{ request('lokasi') == '' ? 'bg-surface-container-low font-semibold' : '' }}">
                                    <span>Semua Lokasi</span>
                                    @if (request('lokasi') == '')
                                        <span
                                            class="material-symbols-outlined text-secondary text-[16px] flex-shrink-0">check</span>
                                    @endif
                                </li>
                                @foreach ($lokasiOptions as $locOption)
                                    <li data-value="{{ $locOption }}"
                                        class="px-3 py-2 rounded-lg text-body-sm cursor-pointer hover:bg-surface-container-high transition-colors select-none text-on-surface flex items-center justify-between {{ request('lokasi') == $locOption ? 'bg-surface-container-low font-semibold' : '' }}">
                                        <span class="truncate">{{ $locOption }}</span>
                                        @if (request('lokasi') == $locOption)
                                            <span
                                                class="material-symbols-outlined text-secondary text-[16px] flex-shrink-0">check</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <div id="lokasi-no-results"
                                class="px-3 py-2 text-body-sm text-outline text-center hidden">
                                Tidak ada lokasi ditemukan
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full md:w-auto bg-primary-container hover:bg-secondary text-on-primary text-label-md font-label-md py-4 px-8 rounded-lg flex items-center justify-center gap-2 btn-primary transition-colors">Cari
                        Lowongan</button>
                </form>

                <div class="mt-8 flex flex-wrap justify-center gap-2 text-primary-fixed text-label-sm font-label-sm">
                    <span class="opacity-70 mr-2 self-center">Pencarian Populer:</span>
                    <span class="px-3 py-1 bg-white/10 rounded-full backdrop-blur-sm">Frontend Developer</span>
                    <span class="px-3 py-1 bg-white/10 rounded-full backdrop-blur-sm">Data Analyst</span>
                    <span class="px-3 py-1 bg-white/10 rounded-full backdrop-blur-sm">Product Manager</span>
                </div>
            </div>
        </section>

        <!-- Job Listings Section -->
        <section class="py-16 px-margin-mobile md:px-margin-desktop w-full max-w-7xl mx-auto">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-headline-lg font-headline-lg text-on-surface mb-2">Rekomendasi Pekerjaan</h2>
                    <p class="text-body-md font-body-md text-on-surface-variant">Berdasarkan profil dan pencarian Anda
                        sebelumnya.</p>
                </div>
                <div class="flex gap-2">
                    <button type="button" id="btn-filter-toggle"
                        class="px-4 py-2 bg-surface-container-high text-on-surface rounded-lg text-label-md font-label-md hover:bg-surface-variant transition-colors flex items-center gap-2 relative">
                        <span class="material-symbols-outlined text-[18px]"
                            style="font-variation-settings: 'FILL' 0;">filter_list</span>
                        Filter
                        @if (request()->filled('gaji_range') || request()->filled('jenis_pekerjaan'))
                            <span
                                class="absolute -top-1 -right-1 w-3 h-3 bg-secondary rounded-full border-2 border-surface"></span>
                        @endif
                    </button>
                    <a href="{{ request()->fullUrlWithQuery(['sort' => request('sort') === 'terlama' ? 'terbaru' : 'terlama']) }}"
                        class="px-4 py-2 {{ request('sort', 'terbaru') === 'terbaru' ? 'bg-secondary text-white' : 'bg-surface-container-high text-on-surface hover:bg-surface-variant' }} rounded-lg text-label-md font-label-md transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]"
                            style="font-variation-settings: 'FILL' 0;">
                            {{ request('sort', 'terbaru') === 'terbaru' ? 'arrow_downward' : 'arrow_upward' }}
                        </span>
                        Terbaru
                    </a>
                </div>
            </div>

            <!-- Filter Panel (Collapsible) -->
            <div id="filter-panel"
                class="{{ request()->filled('gaji_range') || request()->filled('jenis_pekerjaan') ? '' : 'hidden' }} mb-8 p-6 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-[0_4px_20px_-2px_rgba(17,45,66,0.08)]">
                <form action="{{ route('home') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                    <!-- Preserve search and sort query parameters -->
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="lokasi" value="{{ request('lokasi') }}">
                    <input type="hidden" name="sort" value="{{ request('sort') }}">

                    <div>
                        <label class="block text-label-sm font-semibold text-on-surface mb-2">Rentang Gaji</label>
                        <select name="gaji_range"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 text-on-surface text-body-md focus:border-secondary focus:ring-secondary cursor-pointer">
                            <option value="">Semua Gaji</option>
                            <option value="under_5m" {{ request('gaji_range') === 'under_5m' ? 'selected' : '' }}>
                                < Rp 5.000.000</option>
                            <option value="5m_10m" {{ request('gaji_range') === '5m_10m' ? 'selected' : '' }}>Rp
                                5.000.000 - Rp 10.000.000</option>
                            <option value="10m_15m" {{ request('gaji_range') === '10m_15m' ? 'selected' : '' }}>Rp
                                10.000.000 - Rp 15.000.000</option>
                            <option value="above_15m" {{ request('gaji_range') === 'above_15m' ? 'selected' : '' }}>>
                                Rp 15.000.000</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-label-sm font-semibold text-on-surface mb-2">Jenis Pekerjaan</label>
                        <select name="jenis_pekerjaan"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 text-on-surface text-body-md focus:border-secondary focus:ring-secondary cursor-pointer">
                            <option value="">Semua Jenis</option>
                            <option value="Full-time"
                                {{ request('jenis_pekerjaan') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time"
                                {{ request('jenis_pekerjaan') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                            class="flex-1 bg-secondary text-white hover:bg-opacity-90 py-2.5 px-4 rounded-lg text-label-md font-label-md flex items-center justify-center gap-2 transition-colors">
                            Terapkan Filter
                        </button>
                        @if (request()->filled('gaji_range') || request()->filled('jenis_pekerjaan'))
                            <a href="{{ route('home', request()->only(['q', 'lokasi', 'sort'])) }}"
                                class="bg-surface-container-high text-on-surface hover:bg-surface-variant py-2.5 px-4 rounded-lg text-label-md font-label-md flex items-center justify-center transition-colors">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">
                @forelse ($lowongans as $lowongan)
                    @php
                        $lokasi = trim(
                            ($lowongan->kabupaten ?? '') .
                                (empty($lowongan->provinsi) ? '' : ', ' . $lowongan->provinsi),
                        );
                        if ($lokasi === ',') {
                            $lokasi = '';
                        }
                    @endphp

                    <a href="{{ route('lowongan.detail', $lowongan->id) }}"
                        class="job-card job-card-fixed bg-surface-container-lowest rounded-xl p-5 border border-outline-variant shadow-[0_4px_20px_-2px_rgba(17,45,66,0.08)] flex flex-col h-full cursor-pointer relative overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 w-1 h-full bg-secondary opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>

                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant">
                                @if (!empty($lowongan->perusahaan?->foto_profil))
                                    <img alt="Logo {{ $lowongan->perusahaan?->nama_perusahaan ?? 'Perusahaan' }}"
                                        class="w-full h-full object-cover"
                                        src="{{ asset('storage/' . $lowongan->perusahaan->foto_profil) }}" />
                                @else
                                    <span class="material-symbols-outlined text-outline"
                                        style="font-variation-settings: 'FILL' 0;">apartment</span>
                                @endif
                            </div>

                            <button type="button"
                                class="bookmark-btn p-1 rounded-full hover:bg-surface-container-low transition-colors focus:outline-none"
                                data-id="{{ $lowongan->id }}"
                                data-bookmarked="{{ in_array($lowongan->id, $bookmarkedIds ?? []) ? 'true' : 'false' }}"
                                onclick="event.preventDefault(); toggleBookmark(this)" aria-label="Bookmark lowongan">
                                <span
                                    class="material-symbols-outlined transition-colors {{ in_array($lowongan->id, $bookmarkedIds ?? []) ? 'text-yellow-400' : 'text-outline hover:text-secondary' }}"
                                    style="font-variation-settings: '{{ in_array($lowongan->id, $bookmarkedIds ?? []) ? "FILL' 1" : "FILL' 0" }};">bookmark</span>
                            </button>
                        </div>

                        <div class="mb-4 flex-grow">
                            <h3
                                class="job-title-clamp text-headline-md font-headline-md text-on-surface mb-1 group-hover:text-primary transition-colors">
                                {{ $lowongan->posisi_pekerjaan }}</h3>
                            <p class="job-company-clamp text-body-sm font-body-sm text-on-surface-variant font-medium">
                                {{ $lowongan->perusahaan?->nama_perusahaan ?? '-' }}</p>
                        </div>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <span
                                class="px-2.5 py-1 bg-surface-container text-on-surface text-label-sm font-label-sm rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]"
                                    style="font-variation-settings: 'FILL' 0;">location_on</span>
                                {{ $lokasi !== '' ? $lokasi : $lowongan->alamat_lengkap }}
                            </span>

                            @if (!empty($lowongan->jenis_pekerjaan))
                                <span
                                    class="px-2.5 py-1 bg-primary-fixed text-on-primary-fixed text-label-sm font-label-sm rounded-md">{{ $lowongan->jenis_pekerjaan }}</span>
                            @endif

                            @if (!empty($lowongan->gaji))
                                <span
                                    class="px-2.5 py-1 bg-secondary-container text-on-secondary-container text-label-sm font-label-sm rounded-md">{{ $lowongan->gaji }}</span>
                            @endif
                        </div>

                        <div class="mt-auto pt-4 border-t border-outline-variant flex items-center justify-between">
                            <span class="text-label-sm font-label-sm text-outline">Diposting
                                {{ optional($lowongan->created_at)->diffForHumans() ?? 'Baru diposting' }}</span>
                            <span
                                class="bg-primary group-hover:bg-secondary text-on-primary text-label-sm font-label-sm px-4 py-2 rounded-lg btn-primary">Lamar</span>
                        </div>
                    </a>
                @empty
                    <div
                        class="col-span-full bg-surface-container-lowest border border-outline-variant rounded-xl p-8 text-center">
                        <h3 class="text-headline-md font-headline-md text-on-surface">Tidak ada lowongan ditemukan</h3>
                        <p class="mt-2 text-body-md font-body-md text-on-surface-variant">Coba ubah kata kunci
                            pencarian Anda.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12 flex justify-center">
                {{ $lowongans->withQueryString()->links() }}
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer
        class="bg-inverse-surface text-inverse-primary w-full px-margin-mobile md:px-margin-desktop py-12 border-t border-outline-variant">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-headline-md font-headline-md font-bold text-inverse-on-surface">KerjaYok</div>
            <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
                <a class="text-inverse-on-surface hover:text-secondary-fixed text-label-sm font-label-sm transition-colors duration-200"
                    href="#">Kebijakan Privasi</a>
                <a class="text-inverse-on-surface hover:text-secondary-fixed text-label-sm font-label-sm transition-colors duration-200"
                    href="#">Syarat &amp; Ketentuan</a>
                <a class="text-inverse-on-surface hover:text-secondary-fixed text-label-sm font-label-sm transition-colors duration-200"
                    href="#">Bantuan</a>
                <a class="text-inverse-on-surface hover:text-secondary-fixed text-label-sm font-label-sm transition-colors duration-200"
                    href="#">Karir</a>
            </nav>
            <div class="text-body-sm font-body-sm text-inverse-on-surface text-center md:text-right">© 2024 KerjaYok.
                Hubungi Kami untuk percepatan karir Anda.</div>
        </div>
    </footer>
    <!-- Congratulations Popup -->
    @if (isset($acceptedLamaran) && $acceptedLamaran)
        <div id="congratsModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm animate-fade-in">
            <div
                class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 mx-margin-mobile border border-outline-variant relative overflow-hidden flex flex-col items-center text-center">
                <!-- Celebration decorative icon -->
                <div
                    class="w-20 h-20 rounded-full bg-secondary/10 flex items-center justify-center text-secondary mb-6 animate-bounce">
                    <span class="material-symbols-outlined text-4xl"
                        style="font-variation-settings: 'FILL' 1;">celebration</span>
                </div>

                <h2 class="text-headline-lg font-headline font-bold text-secondary mb-2">Selamat, Anda Diterima! 🎉
                </h2>
                <p class="text-body-md font-body text-on-surface-variant mb-6 leading-relaxed">
                    Anda telah resmi diterima untuk posisi <strong
                        class="text-primary font-bold">{{ $acceptedLamaran->lowongan->posisi_pekerjaan }}</strong> di
                    <strong
                        class="text-primary font-bold">{{ $acceptedLamaran->lowongan->perusahaan->nama_perusahaan }}</strong>.
                </p>

                <div
                    class="w-full bg-surface-container-low p-4 rounded-xl text-left border border-outline-variant/60 mb-6">
                    <div class="flex items-center gap-sm mb-xs">
                        <span class="material-symbols-outlined text-secondary text-[20px]"
                            style="font-variation-settings: 'FILL' 1;">apartment</span>
                        <span
                            class="text-body-sm font-semibold text-on-surface ml-1">{{ $acceptedLamaran->lowongan->perusahaan->nama_perusahaan }}</span>
                    </div>
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-secondary text-[20px]">work</span>
                        <span
                            class="text-body-sm font-semibold text-on-surface ml-1">{{ $acceptedLamaran->lowongan->posisi_pekerjaan }}</span>
                    </div>
                </div>

                <button type="button" id="btnDismissCongrats"
                    class="w-full py-4 bg-secondary text-white font-bold rounded-xl hover:bg-opacity-90 transition-all active:scale-95 shadow-md">
                    Terima Kasih
                </button>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const congratsModal = document.getElementById('congratsModal');
                const btnDismiss = document.getElementById('btnDismissCongrats');
                if (btnDismiss && congratsModal) {
                    btnDismiss.addEventListener('click', () => {
                        congratsModal.classList.add('hidden');
                        congratsModal.classList.remove('flex');
                    });
                }
            });
        </script>
    @endif
</body>

<script>
    const BOOKMARK_TOGGLE_URL = '{{ route('bookmark.toggle') }}';
    const CSRF_TOKEN = '{{ csrf_token() }}';
    const IS_LOGGED_IN = {{ session('pelamar_id') ? 'true' : 'false' }};

    function toggleBookmark(btn) {
        if (!IS_LOGGED_IN) {
            window.location.href = '/login/pelamar';
            return;
        }

        const lowonganId = btn.dataset.id;
        const isBookmarked = btn.dataset.bookmarked === 'true';
        const icon = btn.querySelector('.material-symbols-outlined');

        // Optimistic UI update
        if (isBookmarked) {
            btn.dataset.bookmarked = 'false';
            icon.style.fontVariationSettings = "'FILL' 0";
            icon.classList.remove('text-yellow-400');
            icon.classList.add('text-outline');
        } else {
            btn.dataset.bookmarked = 'true';
            icon.style.fontVariationSettings = "'FILL' 1";
            icon.classList.remove('text-outline');
            icon.classList.add('text-yellow-400');
        }

        fetch(BOOKMARK_TOGGLE_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    lowongan_id: lowonganId
                }),
            })
            .then(res => res.json())
            .then(data => {
                // Sync state with server response
                const serverBookmarked = data.bookmarked;
                btn.dataset.bookmarked = serverBookmarked ? 'true' : 'false';
                if (serverBookmarked) {
                    icon.style.fontVariationSettings = "'FILL' 1";
                    icon.classList.remove('text-outline');
                    icon.classList.add('text-yellow-400');
                } else {
                    icon.style.fontVariationSettings = "'FILL' 0";
                    icon.classList.remove('text-yellow-400');
                    icon.classList.add('text-outline');
                }
            })
            .catch(() => {
                // Revert on error
                if (isBookmarked) {
                    btn.dataset.bookmarked = 'true';
                    icon.style.fontVariationSettings = "'FILL' 1";
                    icon.classList.remove('text-outline');
                    icon.classList.add('text-yellow-400');
                } else {
                    btn.dataset.bookmarked = 'false';
                    icon.style.fontVariationSettings = "'FILL' 0";
                    icon.classList.remove('text-yellow-400');
                    icon.classList.add('text-outline');
                }
            });
    }

    document.getElementById('btn-filter-toggle').addEventListener('click', function() {
        const panel = document.getElementById('filter-panel');
        panel.classList.toggle('hidden');
    });

    // Searchable Location Dropdown Logic
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownBtn = document.getElementById('lokasi-dropdown-btn');
        const dropdownPanel = document.getElementById('lokasi-dropdown-panel');
        const dropdownArrow = document.getElementById('lokasi-dropdown-arrow');
        const searchInput = document.getElementById('search-lokasi-input');
        const optionsList = document.getElementById('lokasi-options-list');
        const noResults = document.getElementById('lokasi-no-results');
        const selectedText = document.getElementById('lokasi-selected-text');
        const inputLokasi = document.getElementById('input-lokasi');

        if (!dropdownBtn || !dropdownPanel) return;

        function toggleDropdown() {
            const isHidden = dropdownPanel.classList.contains('hidden');
            if (isHidden) {
                dropdownPanel.classList.remove('hidden');
                dropdownArrow.style.transform = 'rotate(180deg)';
                setTimeout(() => {
                    dropdownPanel.classList.remove('scale-95', 'opacity-0');
                    dropdownPanel.classList.add('scale-100', 'opacity-100');
                }, 10);
                searchInput.focus();
            } else {
                dropdownPanel.classList.remove('scale-100', 'opacity-100');
                dropdownPanel.classList.add('scale-95', 'opacity-0');
                dropdownArrow.style.transform = 'rotate(0deg)';
                setTimeout(() => {
                    dropdownPanel.classList.add('hidden');
                }, 150);
            }
        }

        dropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleDropdown();
        });

        // Close on click outside
        document.addEventListener('click', function(e) {
            if (!dropdownBtn.contains(e.target) && !dropdownPanel.contains(e.target)) {
                if (!dropdownPanel.classList.contains('hidden')) {
                    dropdownPanel.classList.remove('scale-100', 'opacity-100');
                    dropdownPanel.classList.add('scale-95', 'opacity-0');
                    dropdownArrow.style.transform = 'rotate(0deg)';
                    setTimeout(() => {
                        dropdownPanel.classList.add('hidden');
                    }, 150);
                }
            }
        });

        // Search functionality
        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase().trim();
            const items = optionsList.querySelectorAll('li');
            let matches = 0;

            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(filter)) {
                    item.classList.remove('hidden');
                    matches++;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (matches === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });

        // Option selection
        optionsList.querySelectorAll('li').forEach(item => {
            item.addEventListener('click', function(e) {
                e.stopPropagation();
                const val = this.dataset.value;
                const text = this.querySelector('span').textContent.trim();

                inputLokasi.value = val;
                selectedText.textContent = text;

                // Also update any other hidden inputs in the page that have name="lokasi"
                // (e.g. inside the filter panel form)
                const otherLokasiInputs = document.querySelectorAll('input[name="lokasi"]');
                otherLokasiInputs.forEach(input => {
                    if (input !== inputLokasi) {
                        input.value = val;
                    }
                });

                // Update checked indicators in the dropdown list
                optionsList.querySelectorAll('li').forEach(li => {
                    li.classList.remove('bg-surface-container-low', 'font-semibold');
                    const check = li.querySelector('.material-symbols-outlined');
                    if (check) check.remove();
                });

                this.classList.add('bg-surface-container-low', 'font-semibold');
                const checkSpan = document.createElement('span');
                checkSpan.className =
                    'material-symbols-outlined text-secondary text-[16px] flex-shrink-0';
                checkSpan.textContent = 'check';
                this.appendChild(checkSpan);

                // Close dropdown
                toggleDropdown();

                // Clear search input filter
                searchInput.value = '';
                optionsList.querySelectorAll('li').forEach(li => li.classList.remove('hidden'));
                noResults.classList.add('hidden');
            });
        });
    });

    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            menu.classList.add('flex');
        } else {
            menu.classList.remove('flex');
            menu.classList.add('hidden');
        }
    }
</script>

</html>
