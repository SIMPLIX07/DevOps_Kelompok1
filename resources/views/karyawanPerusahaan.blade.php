<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daftar Karyawan - KerjaYok</title>
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

<body class="bg-background text-on-surface font-body-md antialiased min-h-screen flex flex-col">
    <!-- Top Navigation Bar -->
    <header class="bg-surface-container-lowest text-primary docked full-width top-0 sticky z-50 shadow-sm">
        <div class="flex justify-between items-center w-full px-4 md:px-margin-desktop max-w-7xl mx-auto h-16">
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all" type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="/" class="text-headline-md font-headline-md font-extrabold text-primary">KerjaYok</a>
            </div>
            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="/home-perusahaan">Lowongan Kerja</a>
                <a class="text-primary border-b-2 border-primary pb-1 font-bold text-label-md font-label-md active:scale-95 transition-transform duration-150" href="/karyawanPerusahaan">Karyawan</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="/perusahaan/wawancara">Wawancara</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md hover:bg-surface-container-low transition-all duration-200" href="{{ route('perusahaan.history') }}">History</a>
            </nav>
            <div class="flex items-center gap-4">
                <a href="{{ route('perusahaan.settings') }}" class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low transition-colors text-primary text-label-md font-label-md">
                    @if(session('perusahaan_foto'))
                        <img src="{{ asset('storage/' . session('perusahaan_foto')) }}" alt="Logo Perusahaan" class="w-8 h-8 rounded-full object-cover border border-outline-variant">
                    @else
                        <span class="material-symbols-outlined">account_circle</span>
                    @endif
                    <span class="hidden sm:inline">{{ session('perusahaan_nama') }}</span>
                </a>
            </div>
        </div>
        <!-- Mobile Dropdown Navigation Menu -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex flex-col gap-3 shadow-lg z-40 md:hidden">
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/home-perusahaan">Lowongan Kerja</a>
            <a class="text-label-md text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all" href="/karyawanPerusahaan">Karyawan</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/perusahaan/wawancara">Wawancara</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('perusahaan.history') }}">History</a>
        </div>
    </header>

    <!-- Hero Section -->
    <header class="hero-gradient py-xl text-white">
        <div class="max-w-7xl mx-auto px-margin-desktop text-center space-y-md">
            <div class="space-y-xs">
                <h1 class="font-headline-xl text-headline-xl">Daftar Karyawan</h1>
                <p class="font-body-lg text-body-lg text-secondary-fixed opacity-90 max-w-2xl mx-auto">Kelola dan pantau informasi tim Anda dengan mudah.</p>
            </div>
            <div class="relative max-w-3xl mx-auto">
                <div class="flex items-center bg-white rounded-xl shadow-lg overflow-hidden p-2">
                    <span class="material-symbols-outlined text-outline ml-md">search</span>
                    <input id="searchInput" class="flex-1 border-none focus:ring-0 text-on-surface font-body-md px-md" placeholder="Cari nama karyawan atau posisi..." type="text">
                    <button id="searchButton" class="bg-secondary text-white px-xl py-3 rounded-lg font-label-md hover:bg-opacity-90 transition-transform active:scale-95">
                        Cari
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Grid -->
    <main class="flex-grow max-w-7xl mx-auto px-margin-desktop -mt-sm mb-xl z-10 relative w-full">
        @if ($karyawans->isEmpty())
        <div class="glass-card text-center py-20 rounded-2xl shadow-sm border border-outline-variant max-w-2xl mx-auto mt-8 px-6 space-y-md">
            <div class="w-20 h-20 bg-surface-container rounded-full flex items-center justify-center mx-auto text-secondary">
                <span class="material-symbols-outlined text-4xl">group_off</span>
            </div>
            <div class="space-y-xs">
                <h3 class="font-headline-md text-headline-md text-on-surface font-bold">Belum ada karyawan</h3>
                <p class="font-body-sm text-on-surface-muted max-w-md mx-auto">Terima pelamar dari hasil proses seleksi & wawancara terlebih dahulu agar karyawan tampil di sini.</p>
            </div>
            <div class="pt-4 flex gap-4 justify-center">
                <a href="/home-perusahaan" class="px-lg py-2.5 bg-secondary text-on-secondary font-label-md rounded-lg hover:opacity-90 active:scale-95 transition-all text-white font-semibold">
                    Cek Lowongan Aktif
                </a>
                <a href="{{ route('lowongan.create') }}" class="px-lg py-2.5 border border-secondary text-secondary font-label-md rounded-lg hover:bg-surface-container-low active:scale-95 transition-all font-semibold">
                    Buat Lowongan
                </a>
            </div>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter" id="employeeGrid">
            @foreach ($karyawans as $k)
            <!-- Employee Card -->
            <div class="employee-card glass-card p-md rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 group flex flex-col justify-between"
                style="transform: translateY(0px);"
                data-nama="{{ $k->pelamar->nama_lengkap ?? 'Akun Dihapus' }}"
                data-posisi="{{ $k->posisi }}"
                data-kategori="{{ $k->kategori_pekerjaan }}"
                data-lokasi="{{ $k->lowongan ? $k->lowongan->kabupaten : '' }}">
                
                <div class="flex flex-col items-center text-center">
                    <div class="w-24 h-24 rounded-full overflow-hidden mb-md border-4 border-surface-container relative">
                        <img alt="{{ $k->pelamar->nama_lengkap ?? 'Akun Dihapus' }}" class="w-full h-full object-cover" src="{{ ($k->pelamar && $k->pelamar->foto_profil) ? asset('storage/' . $k->pelamar->foto_profil) : 'https://cdn-icons-png.flaticon.com/512/847/847969.png' }}">
                    </div>
                    <h3 class="font-headline-md text-xl font-bold text-on-surface mb-xs">{{ $k->pelamar->nama_lengkap ?? 'Akun Dihapus' }}</h3>
                    <p class="font-label-md text-secondary font-semibold mb-xs">{{ $k->posisi }}</p>
                    <p class="font-body-sm text-on-surface-muted mb-md">{{ $k->kategori_pekerjaan }}</p>
                    
                    <div class="flex gap-xs mb-lg flex-wrap justify-center">
                        <span class="px-xs py-1 bg-surface-container rounded font-label-sm text-on-surface-variant flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">location_on</span>
                            {{ $k->lowongan ? $k->lowongan->kabupaten : 'Remote' }}
                        </span>
                        <span class="px-xs py-1 bg-secondary-container rounded font-label-sm text-on-secondary-container flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">bolt</span>
                            {{ ucfirst($k->status_karyawan) }}
                        </span>
                    </div>
                </div>

                <div>
                    <button class="btn-detail w-full py-2 border border-secondary text-secondary rounded-lg font-label-md hover:bg-secondary hover:text-white transition-colors active:scale-95"
                        data-nama="{{ $k->pelamar->nama_lengkap ?? 'Akun Dihapus' }}"
                        data-email="{{ $k->pelamar->email ?? '-' }}"
                        data-telepon="{{ $k->pelamar->no_telp ?? '-' }}"
                        data-posisi="{{ $k->posisi }}"
                        data-kategori="{{ $k->kategori_pekerjaan }}"
                        data-mulai="{{ $k->tanggal_mulai ? \Carbon\Carbon::parse($k->tanggal_mulai)->format('d M Y') : '-' }}"
                        data-status="{{ ucfirst($k->status_karyawan) }}"
                        data-lokasi="{{ $k->lowongan ? ($k->lowongan->alamat_lengkap . ', ' . $k->lowongan->kabupaten . ', ' . $k->lowongan->provinsi) : 'Tidak Terikat Lokasi (Remote)' }}"
                        data-foto="{{ ($k->pelamar && $k->pelamar->foto_profil) ? asset('storage/' . $k->pelamar->foto_profil) : 'https://cdn-icons-png.flaticon.com/512/847/847969.png' }}">
                        Lihat Detail
                    </button>
                </div>
            </div>
            @endforeach

            <!-- Add New Ghost Card -->
            <a href="{{ route('lowongan.create') }}" class="glass-card p-md rounded-xl border-2 border-dashed border-outline-variant hover:border-secondary flex flex-col items-center justify-center text-center group cursor-pointer transition-all duration-300 min-h-[300px]">
                <div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center mb-md group-hover:bg-secondary-container transition-colors">
                    <span class="material-symbols-outlined text-3xl text-outline group-hover:text-secondary">add</span>
                </div>
                <h3 class="font-headline-md text-lg font-bold text-on-surface group-hover:text-secondary mb-xs">Tambah Lowongan</h3>
                <p class="font-body-sm text-on-surface-muted max-w-[200px]">Buat lowongan pekerjaan baru untuk merekrut anggota tim baru.</p>
            </a>
        </div>
        @endif
    </main>

    <!-- Detail Modal -->
    <div class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden" id="employeeModal">
        <div class="glass-card p-md rounded-xl shadow-xl w-full max-w-lg mx-margin-mobile md:mx-0 max-h-[90vh] overflow-y-auto relative flex flex-col">
            <!-- Close Button -->
            <button class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface" id="closeModalBtn">
                <span class="material-symbols-outlined">close</span>
            </button>
            
            <!-- Modal Content -->
            <div class="flex flex-col items-center text-center mt-md">
                <div class="w-24 h-24 rounded-full overflow-hidden mb-md border-4 border-surface-container relative">
                    <img id="modalFoto" alt="" class="w-full h-full object-cover" src="">
                </div>
                <h3 class="font-headline-md text-2xl font-bold text-on-surface mb-xs" id="modalNama"></h3>
                <p class="font-label-md text-secondary font-semibold mb-xs" id="modalPosisi"></p>
                <p class="font-body-sm text-on-surface-muted mb-md" id="modalKategori"></p>
                <span id="modalStatus" class="px-3 py-1 rounded-full text-xs font-semibold mb-lg"></span>
                
                <!-- Details Grid -->
                <div class="w-full text-left space-y-sm border-t border-outline-variant pt-md">
                    <div class="flex flex-col sm:flex-row justify-between py-2 border-b border-surface-container-low">
                        <span class="font-label-sm text-on-surface-muted">Email</span>
                        <span class="font-body-sm font-semibold text-on-surface" id="modalEmail"></span>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between py-2 border-b border-surface-container-low">
                        <span class="font-label-sm text-on-surface-muted">No. Telepon</span>
                        <span class="font-body-sm font-semibold text-on-surface" id="modalTelepon"></span>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between py-2 border-b border-surface-container-low">
                        <span class="font-label-sm text-on-surface-muted">Tanggal Mulai</span>
                        <span class="font-body-sm font-semibold text-on-surface" id="modalMulai"></span>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between py-2">
                        <span class="font-label-sm text-on-surface-muted">Lokasi Penempatan</span>
                        <span class="font-body-sm font-semibold text-on-surface sm:text-right" id="modalLokasi"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full py-lg mt-xl bg-surface-container-low border-t border-outline-variant">
        <div class="max-w-7xl mx-auto px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-md">
            <div class="flex flex-col gap-xs items-center md:items-start">
                <span class="font-headline-md text-headline-md text-secondary font-bold">KerjaYok</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant">© 2024 KerjaYok. All rights reserved.</p>
            </div>
            <div class="flex gap-md">
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Help Center</a>
                <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Contact Us</a>
            </div>
        </div>
    </footer>

    <script>
        // Micro-interaction for the search input focus
        const searchContainer = document.querySelector('.relative.max-w-3xl');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const employeeCards = document.querySelectorAll('.employee-card');
        
        if (searchInput && searchContainer) {
            searchInput.addEventListener('focus', () => {
                searchContainer.querySelector('.flex').classList.add('ring-2', 'ring-secondary', 'ring-opacity-20');
            });
            
            searchInput.addEventListener('blur', () => {
                searchContainer.querySelector('.flex').classList.remove('ring-2', 'ring-secondary', 'ring-opacity-20');
            });
        }

        // Hover effect for cards
        employeeCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-4px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Instant search logic
        const filterEmployees = () => {
            const query = searchInput.value.toLowerCase().trim();
            employeeCards.forEach(card => {
                const name = card.dataset.nama.toLowerCase();
                const posisi = card.dataset.posisi.toLowerCase();
                const kategori = card.dataset.kategori.toLowerCase();
                const lokasi = card.dataset.lokasi.toLowerCase();
                
                if (name.includes(query) || posisi.includes(query) || kategori.includes(query) || lokasi.includes(query)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        };

        if (searchInput) {
            searchInput.addEventListener('input', filterEmployees);
        }
        if (searchButton) {
            searchButton.addEventListener('click', filterEmployees);
        }

        // Modal triggers
        const modal = document.getElementById('employeeModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('modalFoto').src = button.dataset.foto;
                document.getElementById('modalNama').textContent = button.dataset.nama;
                document.getElementById('modalPosisi').textContent = button.dataset.posisi;
                document.getElementById('modalKategori').textContent = button.dataset.kategori;
                document.getElementById('modalEmail').textContent = button.dataset.email;
                document.getElementById('modalTelepon').textContent = button.dataset.telepon;
                document.getElementById('modalMulai').textContent = button.dataset.mulai;
                document.getElementById('modalLokasi').textContent = button.dataset.lokasi;
                
                const statusBadge = document.getElementById('modalStatus');
                const statusText = button.dataset.status;
                statusBadge.textContent = statusText;
                
                if (statusText.toLowerCase() === 'aktif' || statusText.toLowerCase() === 'active') {
                    statusBadge.className = 'px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-xs font-semibold';
                } else {
                    statusBadge.className = 'px-3 py-1 bg-surface-container text-on-surface-variant rounded-full text-xs font-semibold';
                }
                
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
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
    </script>
</body>

</html>