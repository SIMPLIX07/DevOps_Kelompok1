<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamaran Anda - KerjaYok</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-primary": "#ffffff",
                        "secondary-fixed": "#94f2f0",
                        "surface-dim": "#d7dadc",
                        "on-error-container": "#93000a",
                        "tertiary-container": "#00312d",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed-variant": "#2f495f",
                        "inverse-on-surface": "#eef1f3",
                        "surface-container": "#ebeef0",
                        "on-tertiary-container": "#00a499",
                        "surface-bright": "#f7fafc",
                        "surface-tint": "#476178",
                        "on-tertiary": "#ffffff",
                        "surface-container-low": "#f1f4f6",
                        "on-secondary-container": "#006e6d",
                        "on-secondary-fixed-variant": "#00504e",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#5adace",
                        "on-secondary": "#ffffff",
                        "on-background": "#181c1e",
                        "primary-fixed-dim": "#afc9e4",
                        "outline-variant": "#c3c7cd",
                        "tertiary-fixed": "#79f7ea",
                        "on-primary-container": "#7b95ae",
                        secondary: "#006a68",
                        "on-tertiary-fixed": "#00201d",
                        surface: "#f7fafc",
                        "inverse-primary": "#afc9e4",
                        background: "#f7fafc",
                        tertiary: "#001a18",
                        "secondary-container": "#91f0ed",
                        "secondary-fixed-dim": "#77d6d3",
                        "surface-variant": "#e0e3e5",
                        "surface-container-high": "#e5e9eb",
                        "on-surface": "#181c1e",
                        "on-surface-variant": "#43474c",
                        "error-container": "#ffdad6",
                        "on-primary-fixed": "#001d31",
                        "primary-container": "#112d42",
                        outline: "#73777d",
                        "on-tertiary-fixed-variant": "#00504a",
                        "inverse-surface": "#2d3133",
                        primary: "#00182a",
                        "surface-container-highest": "#e0e3e5",
                        "on-secondary-fixed": "#00201f",
                        "primary-fixed": "#cde5ff",
                        error: "#ba1a1a"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        base: "4px",
                        xl: "64px",
                        sm: "16px",
                        md: "24px",
                        lg: "40px",
                        xs: "8px",
                        gutter: "24px",
                        "margin-mobile": "16px",
                        "margin-desktop": "48px"
                    },
                    fontFamily: {
                        "headline-lg-mobile": ["Manrope"],
                        "body-md": ["Inter"],
                        "headline-md": ["Manrope"],
                        "body-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-xl": ["Manrope"],
                        "headline-lg": ["Manrope"],
                        "label-sm": ["Inter"]
                    },
                    fontSize: {
                        "headline-lg-mobile": ["24px", {
                            lineHeight: "32px",
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
                        "body-sm": ["14px", {
                            lineHeight: "20px",
                            fontWeight: "400"
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
                        "headline-xl": ["40px", {
                            lineHeight: "48px",
                            letterSpacing: "-0.02em",
                            fontWeight: "700"
                        }],
                        "headline-lg": ["32px", {
                            lineHeight: "40px",
                            letterSpacing: "-0.01em",
                            fontWeight: "700"
                        }],
                        "label-sm": ["12px", {
                            lineHeight: "14px",
                            fontWeight: "500"
                        }]
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #f7fafc;
            color: #181c1e;
            background-image: radial-gradient(#e0e3e5 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .app-shell {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .card-soft {
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .card-soft:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 24, 42, 0.08);
            border-color: #006a68;
        }

        .tab-active {
            background: #112d42;
            color: #ffffff;
        }

        .tab-btn {
            transition: all 0.2s ease;
        }

        .tab-btn:hover {
            background: #ebeef0;
        }
    </style>
</head>

<body class="app-shell font-body-md text-body-md text-on-surface antialiased">
    <header class="bg-surface-container-lowest sticky top-0 z-50 shadow-sm">
        <div
            class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop max-w-7xl mx-auto h-16">

            <div class="flex items-center gap-4">
                <button onclick="toggleMobileMenu()"
                    class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all"
                    type="button" aria-label="Buka menu navigasi">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="{{ route('home') }}"
                    class="text-headline-md font-headline-md font-extrabold text-primary">KerjaYok</a>
            </div>

            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                    href="{{ route('home') }}">Lowongan Kerja</a>
                <a class="text-primary border-b-2 border-primary pb-1 font-bold text-label-md font-label-md"
                    href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                    href="{{ route('pelamar.wawancara') }}">Wawancara</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                    href="{{ route('pelamar.bookmark') }}">Bookmark</a>
            </nav>

            <a href="{{ route('pelamar.settings') }}"
                class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low transition-colors text-primary"
                aria-label="Pengaturan akun">
                @if (session('pelamar_foto'))
                    <img src="{{ asset('storage/' . session('pelamar_foto')) }}" alt="Profil"
                        class="w-8 h-8 rounded-full object-cover border border-outline-variant">
                @else
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 0;">account_circle</span>
                @endif
                <span
                    class="hidden md:inline text-label-md font-label-md">{{ session('pelamar_nama') ?? 'Profil' }}</span>
            </a>
        </div>

        {{-- Mobile Dropdown --}}
        <div id="mobile-menu"
            class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex-col gap-3 shadow-lg z-40 md:hidden">
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ route('home') }}">Lowongan Kerja</a>
            <a class="text-label-md text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all"
                href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ route('pelamar.wawancara') }}">Wawancara</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ route('pelamar.bookmark') }}">Bookmark</a>
        </div>
    </header>

    <section
        class="relative overflow-hidden bg-gradient-to-br from-primary via-primary-container to-secondary py-16 md:py-20 px-margin-mobile md:px-margin-desktop text-center">
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-secondary-fixed/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-tertiary-fixed/10 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4 pointer-events-none">
        </div>

        <div class="max-w-3xl mx-auto relative z-10">
            <h1 class="font-headline-xl text-headline-xl text-on-primary mb-md">Lamaran Anda</h1>
            <p class="font-body-lg text-body-lg text-primary-fixed-dim mb-lg">Pantau status lamaran kerja Anda dengan
                mudah.</p>

            <div class="relative w-full max-w-2xl mx-auto">
                <span
                    class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">search</span>
                <input type="text" placeholder="Cari posisi atau perusahaan..."
                    class="search-input w-full pl-[56px] pr-md py-[16px] rounded-full border border-outline-variant focus:ring-2 focus:ring-secondary text-on-surface shadow-md font-body-md text-body-md outline-none bg-surface-container-lowest">
            </div>
        </div>
    </section>

    <main
        class="flex-grow flex flex-col items-center px-margin-mobile md:px-margin-desktop py-xl max-w-7xl mx-auto w-full">
        <div
            class="bg-surface-container-lowest p-xs rounded-full shadow-sm mb-xl inline-flex border border-surface-variant flex-wrap justify-center gap-2">
            <button
                class="tab-btn px-lg py-sm rounded-full font-label-md text-label-md text-on-surface-variant hover:bg-surface-container"
                data-tab="semua">Semua</button>
            <button
                class="tab-btn tab-active px-lg py-sm rounded-full font-label-md text-label-md bg-primary-container text-on-primary"
                data-tab="diproses">Diproses</button>
            <button
                class="tab-btn px-lg py-sm rounded-full font-label-md text-label-md text-on-surface-variant hover:bg-surface-container"
                data-tab="diterima">Diterima</button>
            <button
                class="tab-btn px-lg py-sm rounded-full font-label-md text-label-md text-on-surface-variant hover:bg-surface-container"
                data-tab="ditolak">Ditolak</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter w-full max-w-7xl cards-container">
            @foreach ($lamarans as $lamaran)
                @php
                    $uiStatus = $lamaran->status === 'wawancara' ? 'diproses' : $lamaran->status;
                    $company = $lamaran->lowongan->perusahaan->nama_perusahaan ?? 'Perusahaan';
                @endphp

                <article
                    class="card card-soft bg-surface-container-lowest rounded-xl p-6 border border-outline-variant shadow-sm relative overflow-hidden group"
                    data-status="{{ $uiStatus }}">
                    <div
                        class="absolute top-0 left-0 w-1 h-full bg-secondary opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>

                    <div class="flex items-start justify-between mb-4">
                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant">
                                @if (!empty($lamaran->lowongan->perusahaan?->foto_profil))
                                    <img alt="Logo {{ $company }}" class="w-full h-full object-cover"
                                        src="{{ asset('storage/' . $lamaran->lowongan->perusahaan->foto_profil) }}">
                                @else
                                    <span class="material-symbols-outlined text-outline"
                                        style="font-variation-settings: 'FILL' 0;">apartment</span>
                                @endif
                            </div>
                            <div>
                                <h3 class="card-title text-headline-md font-headline-md text-on-surface mb-0.5">
                                    {{ $lamaran->lowongan->posisi_pekerjaan }}</h3>
                                <p class="card-company text-body-sm font-medium text-on-surface-variant">
                                    {{ $company }}</p>
                            </div>
                        </div>

                        <span
                            class="px-3 py-1 rounded-full text-label-sm font-bold {{ $uiStatus === 'diterima' ? 'bg-tertiary-fixed text-on-tertiary-fixed-variant' : ($uiStatus === 'ditolak' ? 'bg-error-container text-on-error-container' : 'bg-secondary-container text-on-secondary-container') }}">
                            {{ ucfirst($uiStatus) }}
                        </span>
                    </div>

                    <div class="space-y-4">
                        <p class="text-body-md text-on-surface-variant leading-relaxed">
                            @if ($lamaran->status === 'diproses' || $lamaran->status === 'wawancara')
                                Lamaran kamu sedang diproses
                            @elseif ($lamaran->status === 'diterima')
                                Selamat! Kamu diterima 🎉
                            @else
                                Maaf, kamu belum lolos
                            @endif
                        </p>

                        <div class="flex justify-between items-center gap-4 flex-wrap">
                            <span class="text-body-sm text-outline">Dilamar pada
                                {{ optional($lamaran->created_at)->format('d M Y') }}</span>
                            <a href="{{ route('lowongan.detail', $lamaran->lowongan->id) }}"
                                class="py-2.5 px-4 border border-primary text-primary hover:bg-primary-container/10 rounded-lg text-label-md transition-colors">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach

            <!-- Empty State Container -->
            <div id="empty-state" class="col-span-full w-full flex items-center justify-center py-10 hidden">
                <div
                    class="bg-surface-container-lowest rounded-2xl border border-outline-variant shadow-sm p-8 md:p-10 text-center max-w-xl w-full">
                    <div
                        class="w-16 h-16 rounded-full bg-primary-fixed mx-auto mb-4 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">work</span>
                    </div>
                    <h3 class="text-headline-md font-headline-md text-on-surface" id="empty-state-title">Belum ada
                        lamaran</h3>
                    <p class="mt-3 text-body-md text-on-surface-variant" id="empty-state-text">
                        Kamu belum mengirim lamaran ke lowongan mana pun.<br>
                        Silakan cari lowongan dan mulai melamar.
                    </p>
                    <a href="{{ route('home') }}" id="empty-state-button"
                        class="inline-flex mt-6 px-6 py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-secondary transition-colors">
                        Cari Lowongan
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-surface-container-highest border-t border-outline-variant mt-auto full-width flat no shadows">
        <div
            class="w-full px-margin-mobile md:px-margin-desktop py-lg flex flex-col md:flex-row justify-between items-center gap-md max-w-7xl mx-auto">
            <div class="font-headline-md text-headline-md font-bold text-primary">KerjaYok</div>

            <ul class="flex flex-wrap justify-center gap-md font-label-sm text-label-sm">
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Tentang
                        Kami</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Pusat
                        Bantuan</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Kebijakan
                        Privasi</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Syarat
                        &amp; Ketentuan</a></li>
            </ul>

            <div class="font-body-sm text-body-sm text-primary">© 2024 KerjaYok. Empowering your next career move.
            </div>
        </div>
    </footer>

    <script src="/assets/LamaranAnda/Lamaran.js"></script>
    <script>
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
</body>

</html>
