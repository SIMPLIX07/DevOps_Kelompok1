<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>History - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed": "#cbe8e4",
                        "surface-container-low": "#f1f4f6",
                        "surface-tint": "#4b6175",
                        "secondary": "#006a68",
                        "inverse-surface": "#2d3133",
                        "tertiary-fixed-dim": "#b0ccc8",
                        "surface-dim": "#d7dadc",
                        "tertiary-container": "#04201d",
                        "primary-fixed": "#cee5fe",
                        "on-secondary": "#ffffff",
                        "surface-variant": "#e0e3e5",
                        "on-tertiary-fixed": "#04201d",
                        "on-secondary-container": "#006e6d",
                        "surface-container": "#ebeef0",
                        "on-primary-container": "#70869c",
                        "on-secondary-fixed": "#00201f",
                        "on-primary": "#ffffff",
                        "inverse-on-surface": "#eef1f3",
                        "surface-container-highest": "#e0e3e5",
                        "surface-bright": "#f7fafc",
                        "on-tertiary": "#ffffff",
                        "on-tertiary-fixed-variant": "#324b49",
                        "secondary-container": "#91f0ed",
                        "on-tertiary-container": "#6e8986",
                        "on-secondary-fixed-variant": "#00504e",
                        "error-container": "#ffdad6",
                        "background": "#f7fafc",
                        "on-surface": "#181c1e",
                        "on-surface-variant": "#43474c",
                        "primary-fixed-dim": "#b2c9e1",
                        "primary-container": "#112d42",
                        "primary": "#000000",
                        "error": "#ba1a1a",
                        "tertiary": "#000000",
                        "on-background": "#181c1e",
                        "secondary-fixed-dim": "#84d4d1",
                        "surface-container-lowest": "#ffffff",
                        "on-error-container": "#93000a",
                        "surface-container-high": "#e5e9eb",
                        "on-primary-fixed-variant": "#33495d",
                        "inverse-primary": "#b2c9e1",
                        "outline-variant": "#c3c7cd",
                        "on-error": "#ffffff",
                        "on-primary-fixed": "#041d2f",
                        "secondary-fixed": "#a0f1ed",
                        "outline": "#73777d",
                        "surface": "#f7fafc"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "md": "24px",
                        "xs": "8px",
                        "xl": "64px",
                        "margin-mobile": "16px",
                        "base": "4px",
                        "margin-desktop": "48px",
                        "gutter": "24px",
                        "sm": "16px",
                        "lg": "40px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "body-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-xl": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Manrope"],
                        "headline-lg": ["Manrope"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {
                            "lineHeight": "14px",
                            "fontWeight": "500"
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
                        "headline-xl": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
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
            background: linear-gradient(135deg, #001f3f 0%, #006a68 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 106, 104, 0.1);
        }

        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body class="bg-background font-body-md text-on-background min-h-screen flex flex-col antialiased">
    <!-- TopNavBar -->
    <header class="bg-surface-container-lowest text-primary sticky top-0 z-50 shadow-sm">
        <div class="flex justify-between items-center w-full px-4 md:px-margin-desktop max-w-7xl mx-auto h-16">
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all" type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="/" class="text-headline-md font-headline-md font-extrabold text-primary">KerjaYok</a>
            </div>
            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="/home-perusahaan">Lowongan Anda</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="/karyawanPerusahaan">Karyawan</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="/perusahaan/wawancara">Wawancara</a>
                <a class="text-primary border-b-2 border-primary pb-1 font-bold text-label-md font-label-md active:scale-95 transition-transform duration-150" href="{{ route('perusahaan.history') }}">History</a>
            </nav>
            <div class="flex items-center gap-4">
                <a href="{{ route('perusahaan.settings') }}" class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low transition-colors text-primary text-label-md font-label-md">
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
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/home-perusahaan">Lowongan Anda</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/karyawanPerusahaan">Karyawan</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/perusahaan/wawancara">Wawancara</a>
            <a class="text-label-md text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all" href="{{ route('perusahaan.history') }}">History</a>
        </div>
    </header>

    <main class="flex-grow">
        <!-- Hero Section - Vibrant Velocity Style -->
        <section class="hero-gradient pt-xl pb-lg relative overflow-hidden">
            <!-- Decorative Blobs -->
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-secondary/20 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 -right-32 w-96 h-96 bg-primary-container/30 rounded-full blur-3xl"></div>
            <div class="max-w-7xl mx-auto px-margin-desktop relative z-10 text-center">
                <h1 class="font-headline-xl text-headline-xl text-white mb-xs">History</h1>
                <p class="font-body-lg text-body-lg text-white/80 max-w-2xl mx-auto">Pantau riwayat pelamar dan proses rekrutmen perusahaan Anda dalam satu tempat yang terorganisir.</p>
            </div>
        </section>

        <!-- Content Section -->
        <div class="max-w-7xl mx-auto px-margin-desktop pb-xl">
            <!-- Filter Tabs -->
            <div class="flex justify-center mb-xl mt-xl">
                <div class="bg-surface-container-high p-base rounded-full flex gap-base shadow-md">
                    <button class="tab-btn px-xl py-xs rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md transition-all" data-tab="diterima">
                        Diterima
                    </button>
                    <button class="tab-btn px-xl py-xs rounded-full text-on-surface-variant hover:bg-surface-container-low font-label-md text-label-md transition-all" data-tab="ditolak">
                        Ditolak
                    </button>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter" id="historyGrid">
                @forelse ($lamarans as $lamaran)
                    <div class="glass-card card-history-item p-md rounded-xl flex flex-col justify-between hover:shadow-lg transition-all duration-300 border border-outline-variant/20 group h-full"
                         style="transform: translateY(0px);"
                         data-status="{{ $lamaran->status }}"
                         data-nama="{{ $lamaran->pelamar->nama_lengkap ?? '' }}"
                         data-posisi="{{ $lamaran->lowongan->posisi_pekerjaan ?? '' }}">
                         
                        <div class="space-y-sm">
                            <div class="flex justify-between items-start gap-xs">
                                <h3 class="font-headline-md text-xl font-bold text-on-surface group-hover:text-secondary transition-colors line-clamp-2">
                                    {{ $lamaran->lowongan->posisi_pekerjaan ?? '-' }}
                                </h3>
                                <!-- Status Badge -->
                                @if ($lamaran->status === 'diterima')
                                    <span class="px-2 py-1 bg-secondary-container text-on-secondary-container text-label-sm rounded font-medium shrink-0">
                                        Diterima
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-error-container text-on-error-container text-label-sm rounded font-medium shrink-0">
                                        Ditolak
                                    </span>
                                @endif
                            </div>

                            <div class="flex items-center gap-xs text-on-surface-variant">
                                <span class="material-symbols-outlined text-[20px]">account_circle</span>
                                <span class="font-label-md font-semibold text-on-surface">{{ $lamaran->pelamar->nama_lengkap ?? '-' }}</span>
                            </div>

                            <div class="space-y-xs text-body-sm text-on-surface-variant pt-xs border-t border-outline-variant/10">
                                @if ($lamaran->pelamar?->email)
                                    <div class="flex items-center gap-xs">
                                        <span class="material-symbols-outlined text-[18px] text-outline">mail</span>
                                        <span>{{ $lamaran->pelamar->email }}</span>
                                    </div>
                                @endif

                                @if ($lamaran->cv_id)
                                    <div class="flex items-center gap-xs">
                                        <span class="material-symbols-outlined text-[18px] text-outline">description</span>
                                        <span class="font-medium text-on-surface-variant">CV:</span>
                                        <a href="{{ route('cv.show', ['cv' => $lamaran->cv_id, 'lamaran_id' => $lamaran->id]) }}" target="_blank" class="text-secondary hover:underline flex items-center gap-1 font-semibold text-decoration-none">
                                            Resume.pdf
                                            <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-md pt-sm border-t border-outline-variant/10 text-body-sm">
                            <span class="text-outline text-[12px] flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                                {{ optional($lamaran->updated_at)->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                @empty
                    <!-- Server-side empty placeholder, which we'll handle gracefully -->
                @endforelse
            </div>

            <!-- Empty State Card -->
            <div class="flex justify-center mt-lg" id="emptyState" style="display:none;">
                <div class="glass-card w-full max-w-2xl p-xl rounded-xl shadow-sm text-center flex flex-col items-center hover:shadow-md transition-shadow">
                    <div class="w-20 h-20 bg-surface-container-low rounded-full flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-[40px] text-on-secondary-container" data-icon="history_toggle_off">history_toggle_off</span>
                    </div>
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Belum ada history</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-sm" id="emptyStateText">
                        Belum ada history lamaran yang diproses.
                    </p>
                    <a href="/home-perusahaan" class="mt-xl flex items-center gap-xs font-label-md text-label-md text-secondary border border-secondary px-lg py-sm rounded-lg hover:bg-secondary/5 transition-all active:scale-95 text-decoration-none">
                        <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                        Kelola Lowongan
                    </a>
                </div>
            </div>

            <!-- Decorative Visual (Bento-style placeholder for empty space, shown when empty) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mt-xl opacity-40 grayscale pointer-events-none" id="decorativeGrid" style="display:none;">
                <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm h-32 border border-outline-variant/20"></div>
                <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm h-32 border border-outline-variant/20"></div>
                <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm h-32 border border-outline-variant/20"></div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-primary dark:bg-tertiary-container border-t border-outline-variant/20">
        <div class="flex flex-col md:flex-row justify-between items-center px-margin-desktop py-lg w-full max-w-7xl mx-auto">
            <div class="flex flex-col gap-xs mb-md md:mb-0">
                <span class="text-headline-sm font-headline-sm text-white font-bold">KerjaYok</span>
                <span class="font-label-md text-label-md text-surface-variant">© 2024 KerjaYok. All rights reserved.</span>
            </div>
            <div class="flex flex-wrap justify-center gap-lg">
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors text-decoration-none" href="#">Tentang Kami</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors text-decoration-none" href="#">Pusat Bantuan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors text-decoration-none" href="#">Ketentuan Layanan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors text-decoration-none" href="#">Kebijakan Privasi</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-btn');
            const cards = document.querySelectorAll('.card-history-item');
            const emptyState = document.getElementById('emptyState');
            const emptyStateText = document.getElementById('emptyStateText');
            const decorativeGrid = document.getElementById('decorativeGrid');

            function applyFilter(activeStatus) {
                let visibleCount = 0;

                cards.forEach(card => {
                    const cocok = card.dataset.status === activeStatus;
                    card.style.display = cocok ? 'flex' : 'none';
                    if (cocok) visibleCount++;
                });

                if (visibleCount === 0) {
                    emptyState.style.display = 'flex';
                    if (decorativeGrid) decorativeGrid.style.display = 'grid';
                    if (emptyStateText) {
                        emptyStateText.textContent = `Belum ada history lamaran dengan status ${activeStatus}.`;
                    }
                } else {
                    emptyState.style.display = 'none';
                    if (decorativeGrid) decorativeGrid.style.display = 'none';
                }
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => {
                        t.classList.remove('bg-primary-container', 'text-on-primary-container');
                        t.classList.add('text-on-surface-variant', 'hover:bg-surface-container-low');
                    });
                    tab.classList.add('bg-primary-container', 'text-on-primary-container');
                    tab.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-low');
                    applyFilter(tab.dataset.tab);
                });
            });

            // Initialize active tab class
            const activeTab = document.querySelector('.tab-btn[data-tab="diterima"]');
            if (activeTab) {
                activeTab.classList.add('bg-primary-container', 'text-on-primary-container');
                activeTab.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-low');
            }

            applyFilter('diterima');

            // Atmosphere & Hover Micro-interactions
            document.querySelectorAll('.glass-card').forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-4px)';
                    card.style.transition = 'transform 0.2s ease, box-shadow 0.2s ease';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                    card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
                });
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const mouseX = e.clientX - rect.left;
                    const mouseY = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const angleX = (mouseY - centerY) / -15;
                    const angleY = (mouseX - centerX) / 15;
                    card.style.transform = `perspective(1000px) translateY(-4px) rotateX(${angleX}deg) rotateY(${angleY}deg)`;
                });
            });
        });
    </script>
</body>

</html>
