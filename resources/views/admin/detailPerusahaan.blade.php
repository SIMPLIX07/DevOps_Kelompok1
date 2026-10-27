<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Perusahaan | KerjaYok Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts & Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary": "#ffffff",
                        "primary-fixed": "#cde5ff",
                        "inverse-primary": "#afc9e4",
                        "secondary-fixed-dim": "#77d6d3",
                        "on-primary-fixed-variant": "#2f495f",
                        "on-surface-variant": "#43474c",
                        "tertiary-container": "#00312d",
                        "secondary-container": "#91f0ed",
                        "secondary": "#006a68",
                        "surface-dim": "#d7dadc",
                        "on-error": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed-variant": "#00504a",
                        "on-primary-fixed": "#001d31",
                        "error": "#ba1a1a",
                        "surface-bright": "#f7fafc",
                        "on-tertiary-fixed": "#00201d",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#ebeef0",
                        "on-error-container": "#93000a",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#94f2f0",
                        "background": "#f7fafc",
                        "surface-container-highest": "#e0e3e5",
                        "on-secondary-container": "#006e6d",
                        "surface": "#f7fafc",
                        "primary-container": "#112d42",
                        "outline": "#73777d",
                        "surface-variant": "#e0e3e5",
                        "inverse-surface": "#2d3133",
                        "on-surface": "#181c1e",
                        "on-primary-container": "#7b95ae",
                        "tertiary-fixed-dim": "#5adace",
                        "outline-variant": "#c3c7cd",
                        "surface-container-high": "#e5e9eb",
                        "primary": "#00182a",
                        "surface-tint": "#476178",
                        "on-background": "#181c1e",
                        "tertiary-fixed": "#79f7ea",
                        "tertiary": "#001a18",
                        "primary-fixed-dim": "#afc9e4",
                        "on-primary": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "md": "24px",
                        "lg": "40px",
                        "base": "4px",
                        "margin-mobile": "16px",
                        "xl": "64px",
                        "gutter": "24px",
                        "sm": "16px",
                        "xs": "8px",
                        "margin-desktop": "48px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "headline-lg": ["Manrope"],
                        "label-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-xl": ["Manrope"],
                        "headline-md": ["Manrope"],
                        "body-sm": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {
                            "lineHeight": "14px",
                            "fontWeight": "500"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "headline-xl": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
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
            display: inline-block;
            vertical-align: middle;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #00182a 0%, #112d42 50%, #006a68 100%);
        }
    </style>
</head>

<body
    class="bg-background text-on-background font-body-md min-h-screen flex flex-col selection:bg-secondary-fixed selection:text-on-secondary-fixed">

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
            <a class="text-label-md text-primary font-semibold" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('admin.historyVerifikasi') }}">Riwayat</a>
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
        <a class="text-label-md text-primary font-semibold py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.daftarPerusahaan') }}">Daftar Perusahaan</a>
        <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('admin.historyVerifikasi') }}">Riwayat</a>
    </div>
</header>

    <!-- Main Content Area -->
    <main class="max-w-5xl mx-auto px-margin-mobile md:px-margin-desktop py-lg flex-1 w-full">
        <!-- Alerts / Flash Messages -->
        @if (session('success'))
            <div
                class="mb-md p-md rounded-lg bg-secondary-container text-on-secondary-container text-body-sm font-semibold border border-secondary/20 flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px]">task_alt</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div
                class="mb-md p-md rounded-lg bg-error-container text-on-error-container text-body-sm font-semibold border border-error/20 flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px]">error</span>
                <span>{{ session('error') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-md p-md bg-error-container text-on-error-container border border-error/20 rounded-xl">
                <ul class="list-disc list-inside text-body-sm font-semibold">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Back Link -->
        <a class="flex items-center gap-xs text-secondary font-label-md text-label-md mb-md hover:underline group"
            href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            <span class="">Kembali ke Dashboard</span>
        </a>

        <!-- Company Detail Card -->
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 overflow-hidden shadow-sm">
            <!-- Hero Profile Header -->
            <div class="hero-gradient px-lg py-xl text-white relative">
                <div class="absolute top-0 left-0 w-full h-full opacity-10 overflow-hidden pointer-events-none">
                    <div
                        class="absolute -top-1/2 -left-1/4 w-[150%] h-[200%] rotate-12 bg-gradient-to-b from-white/20 to-transparent">
                    </div>
                </div>
                <div
                    class="relative z-10 flex flex-col md:flex-row items-center md:items-start gap-6 max-w-4xl mx-auto text-center md:text-left">
                    <!-- Foto Profil di Samping Kiri Nama Perusahaan -->
                    <div
                        class="w-24 h-24 md:w-32 md:h-32 rounded-2xl border-4 border-white/20 overflow-hidden bg-white/10 flex items-center justify-center flex-shrink-0 shadow-lg">
                        @if ($perusahaan->foto_profil)
                            <img alt="Logo Perusahaan" class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $perusahaan->foto_profil) }}">
                        @else
                            <span class="material-symbols-outlined text-white text-[48px] md:text-[64px]"
                                style="font-variation-settings: 'FILL' 0;">business</span>
                        @endif
                    </div>
                    <div class="flex-grow py-2">
                        <h1 class="font-headline-xl text-headline-xl mb-xs leading-tight break-words">
                            {{ $perusahaan->nama_perusahaan }}</h1>
                        <p class="font-body-md text-body-md text-white/80 font-medium tracking-wide uppercase">
                            {{ $perusahaan->sektor_industri ?? 'Sektor Industri Belum Ditentukan' }}</p>
                    </div>
                </div>
            </div>

            <div class="p-lg space-y-lg">
                <!-- Informasi Dasar -->
                <section>
                    <div class="flex items-center gap-sm pb-sm border-b border-outline-variant/40 mb-md">
                        <span class="material-symbols-outlined text-secondary"
                            style="font-variation-settings: 'FILL' 1;">description</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Informasi Dasar</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-md gap-x-lg">
                        <div class="break-words">
                            <p class="font-label-sm text-label-sm text-outline uppercase mb-xs tracking-wider">Nama
                                Perusahaan</p>
                            <p class="font-body-md text-body-md text-on-surface font-semibold">
                                {{ $perusahaan->nama_perusahaan }}</p>
                        </div>
                        <div class="break-words">
                            <p class="font-label-sm text-label-sm text-outline uppercase mb-xs tracking-wider">Email</p>
                            <p class="font-body-md text-body-md text-on-surface break-all">{{ $perusahaan->email }}</p>
                        </div>
                        <div class="break-words">
                            <p class="font-label-sm text-label-sm text-outline uppercase mb-xs tracking-wider">Telepon
                            </p>
                            <p class="font-body-md text-body-md text-on-surface">{{ $perusahaan->telepon }}</p>
                        </div>
                        <div class="break-words">
                            <p class="font-label-sm text-label-sm text-outline uppercase mb-xs tracking-wider">NPWP</p>
                            <p class="font-body-md text-body-md text-on-surface">{{ $perusahaan->npwp }}</p>
                        </div>
                        <div class="break-words">
                            <p class="font-label-sm text-label-sm text-outline uppercase mb-xs tracking-wider">Alamat
                            </p>
                            @if ($perusahaan->alamat)
                                <p class="font-body-md text-body-md text-on-surface">{{ $perusahaan->alamat }}</p>
                            @else
                                <p class="font-body-md text-body-md text-on-surface-variant italic">Belum diisi</p>
                            @endif
                        </div>
                        <div class="break-words">
                            <p class="font-label-sm text-label-sm text-outline uppercase mb-xs tracking-wider">Tanggal
                                Pendaftaran</p>
                            <p class="font-body-md text-body-md text-on-surface">
                                {{ $perusahaan->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </section>

                <!-- Dokumen -->
                <section>
                    <div class="flex items-center gap-sm pb-sm border-b border-outline-variant/40 mb-md">
                        <span class="material-symbols-outlined text-secondary"
                            style="font-variation-settings: 'FILL' 1;">folder_open</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Dokumen</h2>
                    </div>
                    <div class="grid grid-cols-1 gap-md">
                        <!-- Sertifikat -->
                        <div
                            class="flex items-start gap-md p-md bg-surface-container-low rounded-lg border border-outline-variant/20 hover:border-secondary/30 transition-all cursor-pointer group">
                            <div
                                class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined">verified_user</span>
                            </div>
                            <div>
                                <p class="font-label-sm text-label-sm text-outline uppercase mb-xs tracking-wider">
                                    Sertifikat Perusahaan</p>
                                @if ($perusahaan->sertifikat)
                                    <a class="flex items-center gap-xs text-secondary font-label-md text-label-md font-bold"
                                        href="{{ Storage::url($perusahaan->sertifikat) }}" target="_blank">

                                        <span class="material-symbols-outlined text-[20px]">
                                            download
                                        </span>
                                        Download Sertifikat
                                    </a>
                                @else
                                    <p class="font-body-md text-body-md text-on-surface-variant italic">Belum
                                        ditambahkan</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Status Verifikasi -->
                <section>
                    <div class="flex items-center gap-sm pb-sm border-b border-outline-variant/40 mb-md">
                        <span class="material-symbols-outlined text-secondary"
                            style="font-variation-settings: 'FILL' 1;">fact_check</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Status Verifikasi</h2>
                    </div>
                    <div class="flex flex-col gap-xs">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Status Saat Ini
                        </p>
                        @if ($perusahaan->status_verifikasi === 'pending')
                            <div
                                class="inline-flex items-center gap-xs px-md py-xs bg-amber-50 text-amber-700 border border-amber-200 rounded-full w-fit">
                                <span class="material-symbols-outlined text-[18px]">hourglass_empty</span>
                                <span class="font-label-md text-label-md font-bold">Menunggu Verifikasi</span>
                            </div>
                        @elseif($perusahaan->status_verifikasi === 'verified')
                            <div
                                class="inline-flex items-center gap-xs px-md py-xs bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-full w-fit">
                                <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                <span class="font-label-md text-label-md font-bold">Terverifikasi</span>
                            </div>
                        @else
                            <div
                                class="inline-flex items-center gap-xs px-md py-xs bg-rose-50 text-rose-700 border border-rose-200 rounded-full w-fit">
                                <span class="material-symbols-outlined text-[18px]">cancel</span>
                                <span class="font-label-md text-label-md font-bold">Ditolak</span>
                            </div>
                        @endif

                        @if ($perusahaan->alasan_penolakan)
                            <div class="mt-md p-md bg-rose-50/50 rounded-lg border border-rose-100 max-w-xl">
                                <p class="font-label-sm text-rose-800 uppercase mb-xs tracking-wider">Alasan Penolakan
                                </p>
                                <p class="font-body-md text-rose-950">{{ $perusahaan->alasan_penolakan }}</p>
                            </div>
                        @endif
                    </div>
                </section>

                <!-- Aksi Verifikasi -->
                @if ($perusahaan->status_verifikasi === 'pending')
                    <section class="bg-secondary-container/10 p-md rounded-xl border border-secondary/10">
                        <div class="flex items-center gap-sm pb-sm border-b border-outline-variant/40 mb-md">
                            <span class="material-symbols-outlined text-secondary"
                                style="font-variation-settings: 'FILL' 1;">settings</span>
                            <h2 class="font-headline-md text-headline-md text-primary">Aksi Verifikasi</h2>
                        </div>
                        <form action="{{ route('admin.verifikasiPerusahaan', $perusahaan->id) }}" method="POST">
                            @csrf
                            <div class="space-y-md">
                                <p class="font-label-md text-label-md text-on-surface font-bold">Pilih Tindakan:</p>
                                <div class="flex flex-wrap gap-lg">
                                    <label class="flex items-center gap-sm cursor-pointer group">
                                        <div class="relative flex items-center justify-center">
                                            <input
                                                class="w-6 h-6 border-outline text-secondary focus:ring-secondary cursor-pointer"
                                                name="status_verifikasi" type="radio" value="verified"
                                                id="status_verified" required onchange="toggleRejectSection()"
                                                {{ old('status_verifikasi') == 'verified' ? 'checked' : '' }}>
                                        </div>
                                        <div class="flex items-center gap-xs">
                                            <span
                                                class="material-symbols-outlined text-green-600 font-bold text-[20px]">check</span>
                                            <span class="font-body-md text-body-md text-on-surface">Verifikasi
                                                (Setujui)</span>
                                        </div>
                                    </label>
                                    <label class="flex items-center gap-sm cursor-pointer group">
                                        <div class="relative flex items-center justify-center">
                                            <input
                                                class="w-6 h-6 border-outline text-error focus:ring-error cursor-pointer"
                                                name="status_verifikasi" type="radio" value="rejected"
                                                id="status_rejected" onchange="toggleRejectSection()"
                                                {{ old('status_verifikasi') == 'rejected' ? 'checked' : '' }}>
                                        </div>
                                        <div class="flex items-center gap-xs">
                                            <span
                                                class="material-symbols-outlined text-error font-bold text-[20px]">close</span>
                                            <span class="font-body-md text-body-md text-on-surface">Tolak</span>
                                        </div>
                                    </label>
                                </div>

                                <!-- Textarea for reject reason -->
                                <div class="{{ old('status_verifikasi') == 'rejected' ? '' : 'hidden' }}"
                                    id="rejectSection">
                                    <div class="flex flex-col gap-xs mt-md">
                                        <label for="alasan_penolakan"
                                            class="font-label-md text-label-md text-on-surface font-bold">Alasan
                                            Penolakan (Wajib jika ditolak):</label>
                                        <textarea id="alasan_penolakan" name="alasan_penolakan" rows="3"
                                            class="w-full max-w-xl border border-outline-variant text-on-surface rounded-xl py-2 px-3 focus:ring-2 focus:ring-error focus:border-error"
                                            placeholder="Jelaskan alasan penolakan...">{{ old('alasan_penolakan') }}</textarea>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-md pt-md">
                                    <button type="submit"
                                        class="px-xl py-sm bg-secondary text-white rounded-lg font-label-md text-label-md hover:opacity-90 active:scale-95 transition-all shadow-md shadow-secondary/20">
                                        Simpan Keputusan
                                    </button>
                                    <a href="{{ route('admin.daftarPerusahaan') }}"
                                        class="px-xl py-sm bg-outline-variant text-on-surface-variant rounded-lg font-label-md text-label-md hover:bg-outline-variant/70 active:scale-95 transition-all text-center">
                                        Batal
                                    </a>
                                </div>
                            </div>
                        </form>
                    </section>
                @else
                    <section class="bg-surface-container-low p-md rounded-xl border border-outline-variant/20">
                        <p class="text-body-md text-on-surface-variant font-medium">
                            Perusahaan ini telah diproses dan status verifikasi tidak dapat diubah kembali.
                            @if ($perusahaan->verified_at)
                                <br><span class="text-xs text-outline mt-1 block">Diproses pada:
                                    {{ \Carbon\Carbon::parse($perusahaan->verified_at)->format('d/m/Y H:i') }}</span>
                            @endif
                        </p>
                    </section>
                @endif
            </div>
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
        function toggleRejectSection() {
            const rejectSection = document.getElementById('rejectSection');
            const statusRejected = document.getElementById('status_rejected');
            const alasanField = document.getElementById('alasan_penolakan');

            if (statusRejected && statusRejected.checked) {
                rejectSection.classList.remove('hidden');
                alasanField.required = true;
            } else if (rejectSection) {
                rejectSection.classList.add('hidden');
                alasanField.required = false;
                alasanField.value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleRejectSection();
        });
    </script>

</body>

</html>
