<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jadwal Wawancara | KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Tailwind Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "on-tertiary-container": "#00948a",
                        "on-tertiary": "#ffffff",
                        "surface-container-high": "#e5e9eb",
                        "surface-container-low": "#f1f4f6",
                        "on-primary-fixed": "#041d2f",
                        "outline-variant": "#c3c7cd",
                        "on-secondary-container": "#10706e",
                        "surface-container": "#ebeef0",
                        "surface-bright": "#f7fafc",
                        "inverse-surface": "#2d3133",
                        "on-surface-muted": "#43474c",
                        "inverse-on-surface": "#eef1f3",
                        "error": "#ba1a1a",
                        "background": "#f7fafc",
                        "on-error": "#ffffff",
                        "primary-fixed": "#cee5fe",
                        "on-background": "#181c1e",
                        "hero-gradient-start": "#00182a",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#b2c9e1",
                        "on-tertiary-fixed-variant": "#00504a",
                        "on-error-container": "#93000a",
                        "surface-container-highest": "#e0e3e5",
                        "secondary": "#006a68",
                        "on-primary-container": "#70869c",
                        "inverse-primary": "#b2c9e1",
                        "surface": "#f7fafc",
                        "primary": "#000000",
                        "tertiary-fixed": "#7cf6ea",
                        "on-tertiary-fixed": "#00201d",
                        "surface-tint": "#4b6175",
                        "surface-glass": "rgba(255, 255, 255, 0.95)",
                        "on-surface-variant": "#43474c",
                        "on-secondary-fixed-variant": "#00504e",
                        "on-primary-fixed-variant": "#33495d",
                        "on-surface": "#181c1e",
                        "on-secondary-fixed": "#00201f",
                        "secondary-container": "#a0f1ed",
                        "tertiary-fixed-dim": "#5ddacd",
                        "tertiary-container": "#00201d",
                        "secondary-fixed-dim": "#84d4d1",
                        "surface-dim": "#d7dadc",
                        "hero-gradient-end": "#006a68",
                        "outline": "#73777d",
                        "tertiary": "#000000",
                        "error-container": "#ffdad6",
                        "success-accent": "#79f7ea",
                        "secondary-fixed": "#a0f1ed",
                        "primary-container": "#041d2f",
                        "surface-variant": "#e0e3e5"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-mobile": "16px",
                        "xl": "64px",
                        "xs": "8px",
                        "margin-desktop": "48px",
                        "sm": "16px",
                        "gutter": "24px",
                        "lg": "40px",
                        "md": "24px"
                    },
                    "fontFamily": {
                        "headline-xl": ["Manrope"],
                        "label-md": ["Inter"],
                        "headline-lg": ["Manrope"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-lg-mobile": ["Manrope"],
                        "body-sm": ["Inter"],
                        "headline-md": ["Manrope"]
                    },
                    "fontSize": {
                        "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid #E2E8F0;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #00182a 0%, #006a68 100%);
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body-md selection:bg-secondary-container selection:text-on-secondary-container min-h-screen flex flex-col">
    <!-- Top Navigation Bar -->
    <nav class="bg-surface-container-lowest text-primary docked full-width top-0 sticky z-50 shadow-sm">
        <div class="flex justify-between items-center w-full px-4 md:px-margin-desktop max-w-7xl mx-auto h-16">
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all" type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="/" class="text-headline-md font-headline-md font-extrabold text-primary">KerjaYok</a>
            </div>
            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="/home-perusahaan">Lowongan Kerja</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="/karyawanPerusahaan">Karyawan</a>
                <a class="text-primary border-b-2 border-primary pb-1 font-bold text-label-md font-label-md active:scale-95 transition-transform duration-150" href="/perusahaan/wawancara">Wawancara</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="{{ route('perusahaan.history') }}">History</a>
            </nav>
            <div class="flex items-center gap-4">
                <a href="{{ route('perusahaan.settings') }}" class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low transition-colors text-primary text-label-md font-label-md">
                    @if(session('perusahaan_foto'))
                        <img src="{{ asset('storage/' . session('perusahaan_foto')) }}" alt="Logo Perusahaan" class="w-8 h-8 rounded-full object-cover border border-outline-variant">
                    @else
                        <span class="material-symbols-outlined">account_circle</span>
                    @endif
                    <span class="hidden sm:inline">{{ session('perusahaan_nama') ?? 'Perusahaan' }}</span>
                </a>
            </div>
        </div>
        <!-- Mobile Dropdown Navigation Menu -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex flex-col gap-3 shadow-lg z-40 md:hidden">
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/home-perusahaan">Lowongan Kerja</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/karyawanPerusahaan">Karyawan</a>
            <a class="text-label-md text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all" href="/perusahaan/wawancara">Wawancara</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('perusahaan.history') }}">History</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-gradient relative overflow-hidden py-xl">
        <div class="max-w-7xl mx-auto px-margin-desktop text-center relative z-10">
            <h1 class="font-headline-xl text-headline-xl text-on-primary mb-4">Jadwal Wawancara</h1>
            <p class="font-body-lg text-body-lg text-secondary-fixed/80 mb-10">Pantau dan kelola jadwal wawancara Anda di sini.</p>
            <div class="max-w-2xl mx-auto relative group">
                <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-outline">search</span>
                <input id="searchInput" class="w-full pl-14 pr-6 py-4 rounded-full border-none bg-surface-container-lowest focus:ring-4 focus:ring-secondary/20 transition-all font-body-md text-on-surface shadow-lg" placeholder="Cari nama pelamar atau posisi lowongan..." type="text">
            </div>
        </div>
        <!-- Atmospheric circles -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-secondary/20 rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary-fixed/10 rounded-full blur-[100px]"></div>
    </header>

    <!-- Filter & Content Section -->
    <main class="flex-grow max-w-7xl mx-auto px-margin-desktop -mt-10 relative z-20 pb-xl w-full">
        <!-- Filter Tabs -->
        <div id="filterTabs" class="glass-card rounded-xl p-2 flex gap-2 w-fit mx-auto mb-lg shadow-md">
            <button class="px-8 py-3 rounded-lg font-label-md text-label-md bg-secondary text-on-secondary shadow-sm transition-all" data-tab="semua">Semua</button>
            <button class="px-8 py-3 rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-surface-container transition-all" data-tab="proses">Akan Datang</button>
            <button class="px-8 py-3 rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-surface-container transition-all" data-tab="selesai">Selesai</button>
        </div>

        <!-- Grid of Interview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter" id="interviewGrid">
            @forelse ($wawancarans as $wawancara)
            @php
            $uiStatus = $wawancara->status === 'proses' ? 'proses' : 'selesai';
            $statusLabel = $uiStatus === 'proses' ? 'Akan Datang' : 'Selesai';
            $company = $wawancara->pelamar?->nama_lengkap ?? 'Pelamar';
            @endphp
            
            <!-- Card -->
            <div class="card-wawancara glass-card p-6 rounded-xl hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group flex flex-col justify-between"
                data-status="{{ $uiStatus }}"
                data-posisi="{{ $wawancara->lowongan->posisi_pekerjaan }}"
                data-nama="{{ $company }}">
                
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 rounded-xl bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant flex-shrink-0">
                            @if (!empty($wawancara->pelamar?->foto_profil))
                            <img alt="Applicant Logo" class="w-full h-full object-cover" src="{{ asset('storage/' . $wawancara->pelamar->foto_profil) }}">
                            @else
                            <span class="material-symbols-outlined text-primary text-3xl">account_circle</span>
                            @endif
                        </div>
                        <span class="{{ $uiStatus === 'proses' ? 'bg-secondary-container text-on-secondary-container' : 'bg-surface-container-high text-on-surface-variant' }} px-3 py-1 rounded-full text-label-sm font-label-sm font-semibold">
                            {{ $statusLabel }}
                        </span>
                    </div>
                    <h3 class="posisi-pekerjaan font-headline-md text-headline-md mb-1 group-hover:text-secondary transition-colors leading-snug">{{ $wawancara->lowongan->posisi_pekerjaan }}</h3>
                    <p class="nama-perusahaan font-body-md text-body-md text-on-surface-muted mb-6">Pelamar: <strong class="text-on-surface font-bold">{{ $company }}</strong></p>
                    
                    <div class="space-y-3 mb-8 {{ $uiStatus === 'selesai' ? 'opacity-60' : '' }}">
                        <div class="flex items-center gap-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                            <span class="text-body-sm font-body-sm">{{ \Carbon\Carbon::parse($wawancara->tanggal)->format('d M Y') }}, {{ $wawancara->jam_mulai }} WIB</span>
                        </div>
                        @if ($wawancara->status === 'proses')
                        <div class="flex items-center gap-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">video_camera_front</span>
                            <a href="{{ $wawancara->link_meet }}" target="_blank" class="text-body-sm font-body-sm text-secondary hover:underline flex items-center gap-1 font-semibold">
                                Join Meeting
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <button class="detail-btn w-full border border-secondary text-secondary py-3 rounded-xl font-bold hover:bg-secondary hover:text-on-secondary transition-all active:scale-95"
                    data-id="{{ $wawancara->id }}"
                    data-posisi="{{ $wawancara->lowongan->posisi_pekerjaan }}"
                    data-nama="{{ $company }}"
                    data-tanggal="{{ \Carbon\Carbon::parse($wawancara->tanggal)->format('d M Y') }}"
                    data-jam="{{ $wawancara->jam_mulai }} - {{ $wawancara->jam_selesai }}"
                    data-pesan="{{ $wawancara->pesan ?? 'Tidak ada pesan khusus.' }}"
                    data-link="{{ $wawancara->link_meet }}"
                    data-status="{{ $uiStatus }}"
                    data-logo="{{ !empty($wawancara->pelamar?->foto_profil) ? asset('storage/' . $wawancara->pelamar->foto_profil) : '' }}">
                    Lihat Detail
                </button>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-span-full w-full flex justify-center py-10">
                <div class="glass-card text-center py-20 rounded-2xl shadow-sm border border-outline-variant max-w-lg mx-auto px-6 space-y-md">
                    <div class="w-16 h-16 rounded-full bg-surface-container mx-auto flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-3xl">event_busy</span>
                    </div>
                    <div class="space-y-xs">
                        <h3 class="text-headline-md font-headline-md font-bold text-on-surface">Belum ada wawancara</h3>
                        <p class="text-body-sm text-on-surface-muted max-w-sm mx-auto">
                            Belum ada jadwal wawancara untuk lowongan Anda saat ini.
                        </p>
                    </div>
                    <div class="pt-2">
                        <a href="/home-perusahaan" class="inline-flex px-lg py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:opacity-90 active:scale-95 transition-all text-white font-semibold">
                            Kembali ke Lowongan
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($wawancarans->count() > 0)
        <div class="mt-xl flex justify-center items-center gap-4">
            <button class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface-variant hover:bg-surface-container transition-all">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <div class="flex gap-2">
                <button class="w-10 h-10 rounded-full flex items-center justify-center bg-secondary text-on-secondary font-bold">1</button>
            </div>
            <button class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface-variant hover:bg-surface-container transition-all">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
        @endif
    </main>

    <!-- Detail Modal -->
    <div class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden animate-fade-in animate-duration-200" id="detailModal">
        <div class="glass-card p-6 rounded-xl shadow-xl w-full max-w-lg mx-margin-mobile md:mx-0 max-h-[90vh] overflow-y-auto relative flex flex-col animate-scale-up">
            <!-- Close Button -->
            <button class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface" id="closeModal">
                <span class="material-symbols-outlined">close</span>
            </button>
            
            <!-- Modal Content -->
            <div class="flex flex-col items-center text-center mt-6">
                <div class="w-16 h-16 rounded-xl bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant mb-4" id="modalLogoWrapper">
                    <span class="material-symbols-outlined text-primary-container text-3xl" id="modalDefaultLogo">account_circle</span>
                    <img id="modalLogo" alt="" class="w-full h-full object-cover hidden" src="">
                </div>
                <h3 class="font-headline-md text-2xl font-bold text-on-surface mb-1" id="modalPosisi"></h3>
                <p class="font-label-md text-secondary font-semibold mb-2" id="modalNama"></p>
                <span id="modalStatus" class="px-3 py-1 rounded-full text-xs font-semibold mb-6 inline-block"></span>
                
                <!-- Message Box -->
                <div class="w-full bg-surface-container-low p-4 rounded-xl text-left mb-6 border border-outline-variant">
                    <span class="font-label-sm text-on-surface-muted block mb-1">Pesan / Undangan</span>
                    <p class="font-body-sm text-on-surface leading-relaxed whitespace-pre-line" id="modalPesan"></p>
                </div>

                <!-- Details Grid -->
                <div class="w-full text-left space-y-3 border-t border-outline-variant pt-4 mb-6">
                    <div class="flex justify-between py-2 border-b border-surface-container-low">
                        <span class="font-label-sm text-on-surface-muted">Tanggal</span>
                        <span class="font-body-sm font-semibold text-on-surface" id="modalTanggal"></span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-surface-container-low">
                        <span class="font-label-sm text-on-surface-muted">Waktu</span>
                        <span class="font-body-sm font-semibold text-on-surface" id="modalJam"></span>
                    </div>
                    <div class="flex justify-between py-2 items-center" id="modalLinkContainer">
                        <span class="font-label-sm text-on-surface-muted">Link Pertemuan</span>
                        <a id="modalLink" href="" target="_blank" class="px-4 py-2 bg-secondary text-white font-semibold rounded-lg font-label-md text-xs hover:opacity-90 active:scale-95 transition-all text-center">
                            Gabung Pertemuan
                        </a>
                    </div>
                </div>

                <!-- Action buttons (Accept / Reject) -->
                <div class="flex gap-4 w-full" id="modalActions">
                    <button id="btnTerima" class="flex-1 py-3 bg-secondary text-white font-bold rounded-xl hover:bg-opacity-90 transition-all active:scale-95 shadow-md">
                        Terima Pelamar
                    </button>
                    <button id="btnTolak" class="flex-1 py-3 bg-error text-white font-bold rounded-xl hover:bg-opacity-90 transition-all active:scale-95 shadow-md">
                        Tolak Lamaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation popup -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden" id="confirmDialog">
        <div class="glass-card p-6 rounded-xl shadow-2xl max-w-sm w-full mx-4 border border-outline-variant">
            <div class="flex flex-col items-center text-center gap-4">
                <span class="material-symbols-outlined text-5xl text-secondary" id="confirmDialogIcon">help_outline</span>
                <div>
                    <h4 class="font-headline-md text-xl font-bold text-on-surface" id="confirmDialogTitle">Konfirmasi tindakan</h4>
                    <p class="mt-2 text-body-sm text-on-surface-variant" id="confirmDialogText">Apakah Anda yakin ingin melanjutkan?</p>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button id="confirmDialogCancel" class="flex-1 py-3 bg-surface-variant text-on-surface rounded-xl font-semibold hover:bg-surface-container transition-all active:scale-95">Batal</button>
                <button id="confirmDialogBtn" class="flex-1 py-3 bg-secondary text-white rounded-xl font-semibold hover:bg-opacity-90 transition-all active:scale-95">Lanjutkan</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="actionToast" class="fixed top-20 left-1/2 -translate-x-1/2 z-50 hidden bg-[#E6FFFA] text-[#006e6d] border border-[#91f0ed] px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 font-semibold">
        <span class="material-symbols-outlined text-secondary" id="actionToastIcon">task_alt</span>
        <span id="actionToastMessage">Berhasil!</span>
    </div>

    <!-- Footer -->
    <footer class="bg-surface-container-lowest border-t border-outline-variant mt-auto">
        <div class="max-w-7xl mx-auto px-margin-desktop py-lg flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex flex-col items-center md:items-start gap-4">
                <span class="font-headline-md text-headline-md font-bold text-primary">KerjaYok</span>
                <p class="font-body-sm text-body-sm text-on-surface-muted max-w-sm text-center md:text-left">© 2024 KerjaYok Career Portal. Empowering professional growth with advanced recruitment tools and career insights.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-8">
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:underline transition-all" href="#">About Us</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:underline transition-all" href="#">Privacy Policy</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:underline transition-all" href="#">Terms of Service</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:underline transition-all" href="#">Contact</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('#filterTabs button');
            const cards = document.querySelectorAll('.card-wawancara');
            const searchInput = document.getElementById('searchInput');
            let wawancaraId = null;

            // Tab / Instant search filtering logic
            const filterAll = () => {
                const activeTab = document.querySelector('#filterTabs button.bg-secondary');
                const activeStatus = activeTab ? activeTab.dataset.tab : 'semua';
                const query = searchInput.value.toLowerCase().trim();

                cards.forEach(card => {
                    const status = card.dataset.status; // 'proses' or 'selesai'
                    const matchesStatus = (activeStatus === 'semua') || (status === activeStatus);
                    
                    const posisi = card.dataset.posisi.toLowerCase();
                    const nama = card.dataset.nama.toLowerCase();
                    const matchesSearch = posisi.includes(query) || nama.includes(query);

                    if (matchesStatus && matchesSearch) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            // Micro-interaction for filter buttons
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(btn => {
                        btn.classList.remove('bg-secondary', 'text-on-secondary', 'shadow-sm');
                        btn.classList.add('text-on-surface-variant', 'hover:bg-surface-container');
                    });
                    tab.classList.add('bg-secondary', 'text-on-secondary', 'shadow-sm');
                    tab.classList.remove('text-on-surface-variant', 'hover:bg-surface-container');
                    filterAll();
                });
            });

            if (searchInput) {
                searchInput.addEventListener('input', filterAll);
            }

            // Modal triggering
            const modal = document.getElementById('detailModal');
            const closeModal = document.getElementById('closeModal');

            document.querySelectorAll('.detail-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    wawancaraId = btn.dataset.id;
                    const status = btn.dataset.status;

                    document.getElementById('modalPosisi').textContent = btn.dataset.posisi;
                    document.getElementById('modalNama').textContent = btn.dataset.nama;
                    document.getElementById('modalTanggal').textContent = btn.dataset.tanggal;
                    document.getElementById('modalJam').textContent = btn.dataset.jam;
                    document.getElementById('modalPesan').textContent = btn.dataset.pesan || '-';

                    const statusText = btn.dataset.status === 'proses' ? 'Akan Datang' : 'Selesai';
                    const statusBadge = document.getElementById('modalStatus');
                    statusBadge.textContent = statusText;
                    if (btn.dataset.status === 'proses') {
                        statusBadge.className = 'px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-xs font-semibold mb-6 inline-block';
                    } else {
                        statusBadge.className = 'px-3 py-1 bg-surface-container text-on-surface-variant rounded-full text-xs font-semibold mb-6 inline-block';
                    }

                    const modalLogo = document.getElementById('modalLogo');
                    const modalDefaultLogo = document.getElementById('modalDefaultLogo');
                    if (btn.dataset.logo) {
                        modalLogo.src = btn.dataset.logo;
                        modalLogo.classList.remove('hidden');
                        modalDefaultLogo.classList.add('hidden');
                    } else {
                        modalLogo.classList.add('hidden');
                        modalDefaultLogo.classList.remove('hidden');
                    }

                    const modalLink = document.getElementById('modalLink');
                    const modalLinkContainer = document.getElementById('modalLinkContainer');
                    if (btn.dataset.link && status === 'proses') {
                        modalLink.href = btn.dataset.link;
                        modalLinkContainer.style.display = 'flex';
                    } else {
                        modalLinkContainer.style.display = 'none';
                    }

                    // Sembunyikan tombol Terima/Tolak jika sudah selesai
                    const modalActions = document.getElementById('modalActions');
                    if (status === 'selesai') {
                        modalActions.style.display = 'none';
                    } else {
                        modalActions.style.display = 'flex';
                    }

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            const confirmDialog = document.getElementById('confirmDialog');
            const confirmDialogTitle = document.getElementById('confirmDialogTitle');
            const confirmDialogText = document.getElementById('confirmDialogText');
            const confirmDialogBtn = document.getElementById('confirmDialogBtn');
            const confirmDialogCancel = document.getElementById('confirmDialogCancel');
            let pendingDecision = null;

            const closeConfirmDialog = () => {
                pendingDecision = null;
                confirmDialog.classList.add('hidden');
            };

            const openConfirmDialog = (action) => {
                pendingDecision = action;
                confirmDialogTitle.textContent = action === 'terima' ? 'Terima Pelamar' : 'Tolak Lamaran';
                confirmDialogText.textContent = action === 'terima'
                    ? 'Apakah Anda yakin ingin menerima pelamar ini sebagai karyawan?'
                    : 'Apakah Anda yakin ingin menolak lamaran pelamar ini?';
                confirmDialogBtn.textContent = action === 'terima' ? 'Terima' : 'Tolak';
                confirmDialogBtn.classList.toggle('bg-secondary', action === 'terima');
                confirmDialogBtn.classList.toggle('bg-error', action === 'tolak');
                confirmDialog.classList.remove('hidden');
            };

            const toastElement = document.getElementById('actionToast');
            const toastMessage = document.getElementById('actionToastMessage');
            const toastIcon = document.getElementById('actionToastIcon');
            let toastTimeout = null;

            const showToast = (message, type = 'success') => {
                if (!toastElement) return;

                clearTimeout(toastTimeout);
                toastMessage.textContent = message;
                toastIcon.textContent = type === 'error' ? 'error' : 'task_alt';
                toastElement.classList.remove('hidden');
                toastElement.classList.toggle('bg-[#FEE2E2]', type === 'error');
                toastElement.classList.toggle('border-[#FECACA]', type === 'error');
                toastElement.classList.toggle('text-[#B91C1C]', type === 'error');
                toastElement.classList.toggle('bg-[#E6FFFA]', type !== 'error');
                toastElement.classList.toggle('border-[#91f0ed]', type !== 'error');
                toastElement.classList.toggle('text-[#006e6d]', type !== 'error');

                toastTimeout = setTimeout(() => {
                    toastElement.classList.add('hidden');
                }, 3000);
            };

            const executeDecision = (action) => {
                if (!wawancaraId || !action) return;

                const url = action === 'terima'
                    ? `/perusahaan/wawancara/${wawancaraId}/terima`
                    : `/perusahaan/wawancara/${wawancaraId}/tolak`;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    closeConfirmDialog();
                    modal.classList.add('hidden');
                    showToast(`Berhasil! ${data.message}`, 'success');
                    setTimeout(() => location.reload(), 1200);
                })
                .catch(err => {
                    console.error(err);
                    closeConfirmDialog();
                    showToast('Terjadi kesalahan saat memproses data.', 'error');
                });
            };

            // Tombol Terima
            document.getElementById('btnTerima').addEventListener('click', (e) => {
                e.stopPropagation();
                if (!wawancaraId) return;
                openConfirmDialog('terima');
            });

            // Tombol Tolak
            document.getElementById('btnTolak').addEventListener('click', (e) => {
                e.stopPropagation();
                if (!wawancaraId) return;
                openConfirmDialog('tolak');
            });

            confirmDialogBtn.addEventListener('click', () => {
                executeDecision(pendingDecision);
            });

            confirmDialogCancel.addEventListener('click', (e) => {
                e.stopPropagation();
                closeConfirmDialog();
            });

            if (closeModal) {
                closeModal.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    closeConfirmDialog();
                });
            }

            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    }
                });
            }

            // Initial filter run
            filterAll();
        });
    </script>
</body>

</html>