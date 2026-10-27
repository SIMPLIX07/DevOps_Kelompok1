<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="pelamar-id" content="{{ session('pelamar_id') }}">
    <meta name="lowongan-id" content="{{ $lowongan->id }}">

    <title>{{ $lowongan->posisi_pekerjaan }} - {{ $lowongan->perusahaan->nama_perusahaan }} | KerjaYok</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#00182a',
                        secondary: '#006a68',
                        'primary-container': '#112d42',
                        'primary-fixed': '#cde5ff',
                        'secondary-fixed': '#94f2f0',
                        'secondary-container': '#91f0ed',
                        'surface': '#f7fafc',
                        'surface-container-lowest': '#ffffff',
                        'surface-container-low': '#f1f4f6',
                        'surface-container': '#ebeef0',
                        'surface-container-high': '#e5e9eb',
                        'surface-variant': '#e0e3e5',
                        'surface-bright': '#f7fafc',
                        'background': '#f7fafc',
                        'on-surface': '#181c1e',
                        'on-surface-variant': '#43474c',
                        'outline': '#73777d',
                        'outline-variant': '#c3c7cd',
                        'on-primary': '#ffffff',
                        'on-primary-fixed': '#001d31',
                        'on-primary-fixed-variant': '#2f495f',
                        'on-secondary-container': '#006e6d',
                        'on-secondary-fixed': '#00201f',
                        'on-secondary-fixed-variant': '#00504e',
                        'on-tertiary': '#ffffff',
                        'on-tertiary-fixed': '#00201d',
                        'on-tertiary-fixed-variant': '#00504a',
                        'on-tertiary-container': '#00a499',
                        'on-error': '#ffffff',
                        'on-error-container': '#93000a',
                        'inverse-surface': '#2d3133',
                        'inverse-on-surface': '#eef1f3',
                        'inverse-primary': '#afc9e4',
                        tertiary: '#001a18',
                        'tertiary-container': '#00312d',
                        'tertiary-fixed': '#79f7ea',
                        'tertiary-fixed-dim': '#5adace',
                        error: '#ba1a1a',
                        'error-container': '#ffdad6'
                    },
                    fontFamily: {
                        headline: ['Manrope'],
                        body: ['Inter']
                    },
                    borderRadius: {
                        xl: '0.75rem',
                        lg: '0.5rem',
                        full: '9999px'
                    }
                }
            }
        };
    </script>

    <style>
        :root {
            color-scheme: light;
        }

        body {
            background: #f7fafc;
            color: #181c1e;
        }

        .page-grid {
            background-image: radial-gradient(#e0e3e5 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .glass-panel {
            box-shadow: 0 2px 14px rgba(0, 24, 42, 0.08);
        }

        .action-button {
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .action-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 20px rgba(0, 106, 104, 0.18);
        }

        .content-card {
            box-shadow: 0 2px 12px rgba(0, 24, 42, 0.06);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-body text-body antialiased bg-background text-on-surface page-grid">
    <header class="bg-surface-container-lowest sticky top-0 z-50 shadow-sm border-b border-outline-variant">
    <div class="flex justify-between items-center w-full px-4 md:px-12 max-w-7xl mx-auto h-16">
        
        {{-- Kiri: tombol hamburger + logo --}}
        <div class="flex items-center gap-4">
            <button 
                onclick="toggleMobileMenu()" 
                class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all" 
                type="button"
                aria-label="Buka menu navigasi">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <a href="{{ route('home') }}" class="text-[24px] leading-8 font-extrabold text-primary font-headline">KerjaYok</a>
        </div>

        {{-- Tengah: nav desktop --}}
        <nav class="hidden md:flex gap-8 items-center">
            <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold" href="{{ route('home') }}">Lowongan Kerja</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold" href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold" href="{{ route('pelamar.wawancara') }}">Wawancara</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold" href="{{ route('pelamar.bookmark') }}">Bookmark</a>
        </nav>

        {{-- Kanan: avatar/profil --}}
        <a href="{{ route('pelamar.settings') }}" class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low transition-colors text-primary" aria-label="Pengaturan akun">
            @if(session('pelamar_foto'))
                <img src="{{ asset('storage/' . session('pelamar_foto')) }}" alt="Profil" class="w-8 h-8 rounded-full object-cover border border-outline-variant">
            @else
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">account_circle</span>
            @endif
            <span class="hidden md:inline text-[14px] font-semibold">{{ session('pelamar_nama') ?? 'Profil' }}</span>
        </a>
    </div>

    {{-- Mobile Dropdown Menu — TANPA class flex di sini --}}
    <div id="mobile-menu" class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex-col gap-3 shadow-lg z-40 md:hidden">
        <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('home') }}">Lowongan Kerja</a>
        <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
        <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('pelamar.wawancara') }}">Wawancara</a>
        <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('pelamar.bookmark') }}">Bookmark</a>
    </div>
</header>

    <header class="bg-gradient-to-br from-primary to-[#003B5C] text-on-primary px-4 md:px-12 py-10 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30 mix-blend-overlay"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-primary-fixed-dim hover:text-on-primary transition-colors text-[14px] font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg backdrop-blur-sm">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    <span>Kembali ke Lowongan</span>
                </a>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-5">
                    <div class="w-24 h-24 bg-surface-container-lowest rounded-xl shadow-lg flex items-center justify-center p-2 shrink-0 overflow-hidden">
                        @if (!empty($lowongan->perusahaan?->foto_profil))
                        <img alt="{{ $lowongan->perusahaan->nama_perusahaan }}" class="w-full h-full object-contain" src="{{ asset('storage/' . $lowongan->perusahaan->foto_profil) }}">
                        @else
                        <span class="material-symbols-outlined text-primary text-[44px]">business_center</span>
                        @endif
                    </div>
                    <div>
                        <h1 class="font-headline text-[24px] md:text-[32px] leading-8 md:leading-10 font-bold text-on-primary">{{ $lowongan->posisi_pekerjaan }}</h1>
                        <p class="text-[18px] leading-7 text-primary-fixed-dim">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
                    </div>
                </div>

                <div class="w-full md:w-auto mt-2 md:mt-0 flex justify-start md:justify-end">
                    @if ($sudahMelamar)
                    <button type="button" disabled class="w-full md:w-auto bg-gray-400 text-white font-semibold text-[14px] px-6 py-3 rounded-lg whitespace-nowrap shadow-sm cursor-not-allowed opacity-60">
                        Sudah Dilamar
                    </button>
                    @else
                    <button type="button" class="button action-button w-full md:w-auto bg-[#319795] hover:bg-[#287e7c] text-on-primary font-semibold text-[14px] px-6 py-3 rounded-lg whitespace-nowrap shadow-sm">
                        Lamar Sekarang
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div class="bg-surface-container-lowest border-b border-outline-variant px-4 md:px-12 py-3 sticky top-16 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto flex flex-wrap gap-6 items-center text-on-surface-variant text-[14px]">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary text-[20px]">payments</span>
                <span>IDR {{ is_numeric($lowongan->gaji) ? number_format((float) $lowongan->gaji, 0, ',', '.') : $lowongan->gaji }} / Bulan</span>
            </div>
            <div class="hidden md:block w-px h-4 bg-outline-variant"></div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary text-[20px]">work</span>
                <span>{{ $lowongan->jenis_pekerjaan }}</span>
            </div>
            <div class="hidden md:block w-px h-4 bg-outline-variant"></div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary text-[20px]">location_on</span>
                <span>{{ $lowongan->kabupaten }}, {{ $lowongan->provinsi }}</span>
            </div>
        </div>
    </div>

    <main class="flex-grow px-4 md:px-12 py-8 max-w-7xl mx-auto w-full flex flex-col lg:flex-row gap-6">
        <div class="lg:w-2/3 space-y-6">
            <section class="content-card bg-surface-container-lowest border border-surface-variant rounded-xl p-6">
                <h2 class="text-[24px] leading-8 font-headline font-bold text-on-surface mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">info</span>
                    Deskripsi Singkat
                </h2>
                <p class="text-[16px] leading-7 text-on-surface-variant">
                    {{ $lowongan->deskripsi_singkat }}
                </p>
            </section>

            <section class="content-card bg-surface-container-lowest border border-surface-variant rounded-xl p-6">
                <h2 class="text-[24px] leading-8 font-headline font-bold text-on-surface mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">code</span>
                    Deskripsi Pekerjaan
                </h2>
                <div class="space-y-3 text-[16px] leading-7 text-on-surface-variant">
                    {!! nl2br(e($lowongan->deskripsi_pekerjaan)) !!}
                </div>
            </section>

            <section class="content-card bg-surface-container-lowest border border-surface-variant rounded-xl p-6">
                <h2 class="text-[24px] leading-8 font-headline font-bold text-on-surface mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">fact_check</span>
                    Syarat &amp; Kualifikasi
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-surface rounded-lg p-4 border border-surface-variant">
                        <p class="text-[12px] leading-4 text-on-surface-variant mb-1 uppercase tracking-wider">Pendidikan</p>
                        <p class="text-[16px] leading-6 text-on-surface font-semibold">{{ $lowongan->pendidikan ?? '-' }}</p>
                    </div>
                    <div class="bg-surface rounded-lg p-4 border border-surface-variant">
                        <p class="text-[12px] leading-4 text-on-surface-variant mb-1 uppercase tracking-wider">Pengalaman</p>
                        <p class="text-[16px] leading-6 text-on-surface font-semibold">{{ $lowongan->pengalaman ?? '-' }}</p>
                    </div>
                    <div class="bg-surface rounded-lg p-4 border border-surface-variant sm:col-span-2">
                        <p class="text-[12px] leading-4 text-on-surface-variant mb-2 uppercase tracking-wider">Keahlian Teknis Utama</p>
                        <div class="flex flex-wrap gap-2">
                            @if(!empty($lowongan->keahlian_teknis))
                                @foreach(explode(',', $lowongan->keahlian_teknis) as $skill)
                                    @if(trim($skill) !== '')
                                        <span class="px-3 py-1 bg-[#E6FFFA] text-[#006e6d] rounded-full text-[12px] font-semibold border border-[#91f0ed]">{{ trim($skill) }}</span>
                                    @endif
                                @endforeach
                            @else
                                <span class="text-on-surface-variant text-[14px]">-</span>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <section class="content-card bg-surface-container-lowest border border-surface-variant rounded-xl p-6">
                <h2 class="text-[24px] leading-8 font-headline font-bold text-on-surface mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">description</span>
                    Keterangan Tambahan
                </h2>
                <div class="text-[16px] leading-7 text-on-surface-variant">
                    {!! nl2br(e($lowongan->syarat)) !!}
                </div>
            </section>
        </div>

        <aside class="lg:w-1/3">
            <div class="sticky top-[150px] space-y-6">
                <div class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 text-center glass-panel">
                    <p class="text-[14px] leading-5 text-on-surface-variant mb-4">
                        Batas akhir pendaftaran: <span class="font-semibold text-on-surface">{{ $lowongan->tanggal_berakhir ? \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d F Y') : '-' }}</span>
                    </p>

                    @if ($sudahMelamar)
                    <button type="button" disabled class="w-full bg-gray-400 text-white font-semibold text-[14px] px-6 py-3 rounded-lg mb-3 flex items-center justify-center gap-2 cursor-not-allowed opacity-60">
                        <span class="material-symbols-outlined text-[20px]">task_alt</span>
                        Sudah Dilamar
                    </button>
                    @else
                    <button type="button" class="button action-button w-full bg-[#319795] hover:bg-[#287e7c] text-on-primary font-semibold text-[14px] px-6 py-3 rounded-lg mb-3 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">send</span>
                        Lamar Sekarang
                    </button>
                    @endif

                    <button
                        type="button"
                        id="btnBookmarkDetail"
                        data-id="{{ $lowongan->id }}"
                        data-bookmarked="{{ $sudahBookmark ? 'true' : 'false' }}"
                        class="w-full border-2 {{ $sudahBookmark ? 'border-yellow-500 text-yellow-600 bg-yellow-50/50' : 'border-outline-variant hover:border-secondary hover:text-secondary text-on-surface-variant' }} font-semibold text-[14px] px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2"
                    >
                        <span class="material-symbols-outlined text-[20px] transition-colors {{ $sudahBookmark ? 'text-yellow-500' : '' }}"
                              style="font-variation-settings: '{{ $sudahBookmark ? "FILL' 1" : "FILL' 0" }}';">bookmark</span>
                        <span id="textBookmarkDetail">{{ $sudahBookmark ? 'Tersimpan' : 'Simpan Lowongan' }}</span>
                    </button>
                </div>

                <div class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 glass-panel">
                    <h3 class="text-[24px] leading-8 font-headline font-bold text-on-surface mb-4">Tentang Perusahaan</h3>

                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-surface rounded-lg p-1 border border-surface-variant shrink-0 overflow-hidden flex items-center justify-center">
                            @if (!empty($lowongan->perusahaan?->foto_profil))
                            <img alt="{{ $lowongan->perusahaan->nama_perusahaan }}" class="w-full h-full object-contain" src="{{ asset('storage/' . $lowongan->perusahaan->foto_profil) }}">
                            @else
                            <span class="material-symbols-outlined text-secondary">domain</span>
                            @endif
                        </div>
                        <div>
                            <p class="text-[16px] leading-6 font-semibold text-on-surface">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
                            @if(!empty($lowongan->perusahaan->website))
                            <a class="text-[14px] leading-5 text-secondary hover:underline" href="{{ str_starts_with($lowongan->perusahaan->website, 'http://') || str_starts_with($lowongan->perusahaan->website, 'https://') ? $lowongan->perusahaan->website : 'https://' . $lowongan->perusahaan->website }}" target="_blank" rel="noopener noreferrer">Lihat profil perusahaan</a>
                            @endif
                        </div>
                    </div>

                    <p class="text-[14px] leading-6 text-on-surface-variant line-clamp-4">
                        {{ $lowongan->perusahaan->deskripsi ?? 'Perusahaan ini membuka peluang karir untuk talenta terbaik di bidang teknologi dan pengembangan digital.' }}
                    </p>
                </div>
            </div>
        </aside>
    </main>

    <footer class="bg-surface-container-lowest w-full py-8 mt-auto border-t border-outline-variant">
        <div class="flex flex-col md:flex-row justify-between items-center px-4 md:px-12 max-w-7xl mx-auto gap-4">
            <div class="text-[18px] leading-7 font-bold text-primary font-headline">KerjaYok</div>
            <div class="flex flex-wrap justify-center gap-6 text-[14px] leading-5">
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Syarat &amp; Ketentuan</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Hubungi Kami</a>
            </div>
            <div class="text-[14px] leading-5 text-primary">© 2024 KerjaYok. Seluruh hak cipta dilindungi.</div>
        </div>
    </footer>

    <div id="modalCv" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-[60]">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col">
            <div class="px-6 py-5 border-b border-outline-variant flex items-center justify-between">
                <h3 class="text-[24px] leading-8 font-headline font-bold text-on-surface">Pilih CV &amp; Portofolio</h3>
                <button id="btnTutup" type="button" class="p-2 rounded-full hover:bg-surface-container-low text-on-surface-variant" aria-label="Tutup modal">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <div class="p-6 space-y-6 max-h-[60vh] overflow-y-auto">
                <div>
                    <h4 class="text-[16px] font-bold text-on-surface mb-3">Pilih CV <span class="text-error">*</span></h4>
                    <div id="cvList" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                </div>

                <div>
                    <h4 class="text-[16px] font-bold text-on-surface mb-3">Pilih Portofolio (Opsional)</h4>
                    <div id="portofolioList" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                </div>
            </div>

            <div class="px-6 py-5 border-t border-outline-variant flex flex-col sm:flex-row gap-3 justify-end">
                <button id="btnKirimLamaran" type="button" disabled class="action-button px-6 py-3 rounded-lg bg-primary text-on-primary font-semibold disabled:opacity-50 disabled:cursor-not-allowed">
                    Kirim Lamaran
                </button>
                <button id="btnBatal" type="button" class="px-6 py-3 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-low">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <div id="successModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-[70]">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-6 text-center">
            <div class="w-16 h-16 rounded-full bg-secondary-container mx-auto mb-4 flex items-center justify-center text-secondary">
                <span class="material-symbols-outlined text-[32px]">task_alt</span>
            </div>
            <h3 class="text-[24px] leading-8 font-headline font-bold text-on-surface">Lamaran Berhasil 🎉</h3>
            <p class="mt-3 text-[16px] leading-6 text-on-surface-variant">Lamaran kamu berhasil dikirim. Silakan menunggu proses selanjutnya.</p>
            <button id="btnOk" type="button" class="mt-6 px-6 py-3 rounded-lg bg-primary text-on-primary font-semibold w-full">Lihat Lamaran</button>
        </div>
    </div>

    <script src="/assets/pageLamar/lamar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnBookmark = document.getElementById('btnBookmarkDetail');
            if (btnBookmark) {
                btnBookmark.addEventListener('click', function() {
                    const isLoggedIn = {{ session('pelamar_id') ? 'true' : 'false' }};
                    if (!isLoggedIn) {
                        window.location.href = '/login/pelamar';
                        return;
                    }

                    const lowonganId = this.dataset.id;
                    const isBookmarked = this.dataset.bookmarked === 'true';
                    const icon = this.querySelector('.material-symbols-outlined');
                    const text = document.getElementById('textBookmarkDetail');

                    // Optimistic UI update
                    if (isBookmarked) {
                        this.dataset.bookmarked = 'false';
                        this.className = "w-full border-2 border-outline-variant hover:border-secondary hover:text-secondary text-on-surface-variant font-semibold text-[14px] px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2";
                        icon.style.fontVariationSettings = "'FILL' 0";
                        icon.classList.remove('text-yellow-500');
                        text.textContent = 'Simpan Lowongan';
                    } else {
                        this.dataset.bookmarked = 'true';
                        this.className = "w-full border-2 border-yellow-500 text-yellow-600 bg-yellow-50/50 font-semibold text-[14px] px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2";
                        icon.style.fontVariationSettings = "'FILL' 1";
                        icon.classList.add('text-yellow-500');
                        text.textContent = 'Tersimpan';
                    }

                    fetch('{{ route('bookmark.toggle') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ lowongan_id: lowonganId }),
                    })
                    .then(res => res.json())
                    .then(data => {
                        // Sync state with server response
                        const serverBookmarked = data.bookmarked;
                        this.dataset.bookmarked = serverBookmarked ? 'true' : 'false';
                        if (serverBookmarked) {
                            this.className = "w-full border-2 border-yellow-500 text-yellow-600 bg-yellow-50/50 font-semibold text-[14px] px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2";
                            icon.style.fontVariationSettings = "'FILL' 1";
                            icon.classList.add('text-yellow-500');
                            text.textContent = 'Tersimpan';
                        } else {
                            this.className = "w-full border-2 border-outline-variant hover:border-secondary hover:text-secondary text-on-surface-variant font-semibold text-[14px] px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2";
                            icon.style.fontVariationSettings = "'FILL' 0";
                            icon.classList.remove('text-yellow-500');
                            text.textContent = 'Simpan Lowongan';
                        }
                    })
                    .catch(() => {
                        // Revert on error
                        if (isBookmarked) {
                            this.dataset.bookmarked = 'true';
                            this.className = "w-full border-2 border-yellow-500 text-yellow-600 bg-yellow-50/50 font-semibold text-[14px] px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2";
                            icon.style.fontVariationSettings = "'FILL' 1";
                            icon.classList.add('text-yellow-500');
                            text.textContent = 'Tersimpan';
                        } else {
                            this.dataset.bookmarked = 'false';
                            this.className = "w-full border-2 border-outline-variant hover:border-secondary hover:text-secondary text-on-surface-variant font-semibold text-[14px] px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2";
                            icon.style.fontVariationSettings = "'FILL' 0";
                            icon.classList.remove('text-yellow-500');
                            text.textContent = 'Simpan Lowongan';
                        }
                    });
                });
            }
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