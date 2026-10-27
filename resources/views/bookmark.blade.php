<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookmark - KerjaYok</title>
    <meta name="description" content="Kelola lowongan kerja yang Anda simpan di KerjaYok">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            background-image: radial-gradient(#e0e3e5 1px, transparent 1px);
            background-size: 24px 24px;
            color: #181c1e;
        }

        .card-soft {
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .card-soft:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 24, 42, 0.08);
            border-color: #006a68;
        }

        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-body-md text-on-surface antialiased">

    <!-- Navbar -->
    <header
        class="bg-surface-container-lowest text-primary sticky top-0 z-50 shadow-sm border-b border-outline-variant">
        <div class="flex justify-between items-center w-full px-4 md:px-12 max-w-7xl mx-auto h-16">

            <div class="flex items-center gap-4">
                <button onclick="toggleMobileMenu()"
                    class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all"
                    type="button" aria-label="Buka menu navigasi">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="{{ route('home') }}"
                    class="text-[24px] leading-8 font-extrabold text-primary font-headline-md">KerjaYok</a>
            </div>

            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold"
                    href="{{ route('home') }}">Lowongan Kerja</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold"
                    href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold"
                    href="{{ route('pelamar.wawancara') }}">Wawancara</a>
                <a class="text-primary border-b-2 border-primary pb-1 font-bold text-[14px]"
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
                    class="hidden md:inline text-[14px] font-semibold">{{ session('pelamar_nama') ?? 'Profil' }}</span>
            </a>
        </div>

        {{-- Mobile Dropdown --}}
        <div id="mobile-menu"
            class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex-col gap-3 shadow-lg z-40 md:hidden">
            <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ route('home') }}">Lowongan Kerja</a>
            <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
            <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ route('pelamar.wawancara') }}">Wawancara</a>
            <a class="text-[14px] font-bold text-primary py-2.5 px-4 bg-surface-container-low rounded-xl transition-all"
                href="{{ route('pelamar.bookmark') }}">Bookmark</a>
        </div>
    </header>


    <!-- Content -->
    <main class="flex-grow max-w-7xl mx-auto w-full px-4 md:px-12 py-xl">
        @if ($bookmarks->isEmpty())
            <!-- Empty State -->
            <div class="flex items-center justify-center py-16">
                <div
                    class="bg-surface-container-lowest rounded-2xl border border-outline-variant shadow-sm p-10 text-center max-w-lg w-full">
                    <div
                        class="w-20 h-20 rounded-full bg-primary-fixed mx-auto mb-6 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[40px]"
                            style="font-variation-settings: 'FILL' 0;">bookmark_border</span>
                    </div>
                    <h2 class="text-headline-md font-headline-md text-on-surface mb-3">Belum ada bookmark</h2>
                    <p class="text-body-md text-on-surface-variant mb-6">
                        Temukan lowongan yang menarik dan klik ikon bookmark untuk menyimpannya di sini.
                    </p>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary text-on-primary font-label-md hover:bg-secondary transition-colors">
                        <span class="material-symbols-outlined text-[18px]">search</span>
                        Cari Lowongan
                    </a>
                </div>
            </div>
        @else
            <div class="mb-8 flex items-center justify-between">
                <p class="text-on-surface-variant text-body-md">{{ $bookmarks->count() }} lowongan tersimpan</p>
                <a href="{{ route('home') }}"
                    class="flex items-center gap-2 text-secondary font-semibold text-[14px] hover:underline">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    Cari Lowongan Lain
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                @foreach ($bookmarks as $bookmark)
                    @php
                        $lowongan = $bookmark->lowongan;
                        $perusahaan = $lowongan->perusahaan;
                    @endphp
                    <article
                        class="card-soft bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm p-6 flex flex-col justify-between relative overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 w-1 h-full bg-secondary opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>

                        <div>
                            <!-- Company Header -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant flex-shrink-0">
                                        @if (!empty($perusahaan?->foto_profil))
                                            <img src="{{ asset('storage/' . $perusahaan->foto_profil) }}"
                                                alt="{{ $perusahaan->nama_perusahaan }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <span class="material-symbols-outlined text-outline"
                                                style="font-variation-settings: 'FILL' 0;">apartment</span>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-[16px] font-bold text-on-surface leading-tight">
                                            {{ $lowongan->posisi_pekerjaan }}</h3>
                                        <p class="text-[13px] text-on-surface-variant font-medium mt-0.5">
                                            {{ $perusahaan->nama_perusahaan ?? '-' }}</p>
                                    </div>
                                </div>
                                <!-- Remove Bookmark -->
                                <button type="button"
                                    class="bookmark-remove p-1.5 rounded-full hover:bg-error/10 text-error transition-colors"
                                    data-lowongan-id="{{ $lowongan->id }}" title="Hapus dari bookmark">
                                    <span class="material-symbols-outlined text-[20px]"
                                        style="font-variation-settings: 'FILL' 1;">bookmark</span>
                                </button>
                            </div>

                            <!-- Job Info -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                @if ($lowongan->jenis_pekerjaan)
                                    <span
                                        class="px-2.5 py-1 bg-secondary-container text-on-secondary-container rounded-full text-[12px] font-semibold">{{ $lowongan->jenis_pekerjaan }}</span>
                                @endif
                                @if ($lowongan->kabupaten)
                                    <span class="flex items-center gap-1 text-[12px] text-on-surface-variant">
                                        <span class="material-symbols-outlined text-[14px]">location_on</span>
                                        {{ $lowongan->kabupaten }}
                                    </span>
                                @endif
                            </div>

                            @if ($lowongan->gaji)
                                <p class="text-[14px] font-semibold text-secondary mb-4">
                                    <span class="material-symbols-outlined text-[16px] align-middle">payments</span>
                                    {{ $lowongan->gaji }}
                                </p>
                            @endif

                            @if ($lowongan->deskripsi_singkat)
                                <p class="text-[13px] text-on-surface-variant leading-relaxed line-clamp-2 mb-4">
                                    {{ $lowongan->deskripsi_singkat }}</p>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2 mt-2">
                            <a href="{{ route('lowongan.detail', $lowongan->id) }}"
                                class="flex-1 py-2.5 bg-primary text-on-primary text-center rounded-lg font-label-md text-[13px] font-bold hover:bg-secondary transition-colors">
                                Lihat Lowongan
                            </a>
                        </div>

                        <p class="text-[11px] text-outline mt-3 text-right">Disimpan
                            {{ $bookmark->created_at->diffForHumans() }}</p>
                    </article>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-surface-container-highest border-t border-outline-variant mt-auto">
        <div
            class="w-full px-4 md:px-12 py-lg flex flex-col md:flex-row justify-between items-center gap-md max-w-7xl mx-auto">
            <div class="font-headline-md text-headline-md font-bold text-primary">KerjaYok</div>
            <ul class="flex flex-wrap justify-center gap-md font-label-sm text-label-sm">
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Tentang
                        Kami</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Pusat
                        Bantuan</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Kebijakan
                        Privasi</a></li>
            </ul>
            <div class="font-body-sm text-body-sm text-primary">© 2024 KerjaYok. Empowering your next career move.
            </div>
        </div>
    </footer>

    <script>
        // Remove bookmark
        document.querySelectorAll('.bookmark-remove').forEach(btn => {
            btn.addEventListener('click', async function() {
                const lowonganId = this.dataset.lowonganId;
                const card = this.closest('article');

                if (!confirm('Hapus lowongan ini dari bookmark?')) return;

                try {
                    const resp = await fetch('{{ route('bookmark.toggle') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        },
                        body: JSON.stringify({
                            lowongan_id: lowonganId
                        })
                    });
                    const data = await resp.json();
                    if (!data.bookmarked) {
                        card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            card.remove();
                            // Check if grid is empty
                            const grid = document.querySelector('.grid');
                            if (grid && grid.children.length === 0) {
                                location.reload();
                            }
                        }, 300);
                    }
                } catch (err) {
                    console.error(err);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
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
</body>

</html>
