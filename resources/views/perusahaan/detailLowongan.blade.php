<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Lowongan: {{ $lowongan->posisi_pekerjaan }} | KerjaYok</title>

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
    <!-- Top Navigation Bar -->
    <header class="bg-surface-container-lowest sticky top-0 z-50 shadow-sm border-b border-outline-variant">
        <div class="flex justify-between items-center w-full px-4 md:px-12 max-w-7xl mx-auto h-16">
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all" type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="/" class="text-[24px] leading-8 font-extrabold text-primary font-headline">KerjaYok</a>
            </div>
            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-primary border-b-2 border-primary pb-1 font-bold text-[14px]" href="/home-perusahaan">Lowongan Anda</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold" href="/karyawanPerusahaan">Karyawan</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold" href="/perusahaan/wawancara">Wawancara</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-[14px] font-semibold" href="{{ route('perusahaan.history') }}">History</a>
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
            <a class="text-[14px] font-semibold text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all" href="/home-perusahaan">Lowongan Anda</a>
            <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/karyawanPerusahaan">Karyawan</a>
            <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="/perusahaan/wawancara">Wawancara</a>
            <a class="text-[14px] font-semibold text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all" href="{{ route('perusahaan.history') }}">History</a>
        </div>
    </header>

    <!-- Success Alerts -->
    @if(session('success'))
    <div id="successToast" class="fixed top-20 left-1/2 -translate-x-1/2 z-50 bg-[#E6FFFA] text-[#006e6d] border border-[#91f0ed] px-lg py-sm rounded-xl shadow-lg flex items-center gap-2 font-semibold">
        <span class="material-symbols-outlined text-secondary">task_alt</span>
        <span>{{ session('success') }}</span>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('successToast');
            if (toast) toast.remove();
        }, 3000);
    </script>
    @endif

    <!-- Vacancy Header -->
    <header class="bg-gradient-to-br from-primary to-[#003B5C] text-on-primary px-4 md:px-12 py-10 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30 mix-blend-overlay"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="/home-perusahaan" class="inline-flex items-center gap-2 text-primary-fixed-dim hover:text-on-primary transition-colors text-[14px] font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg backdrop-blur-sm">
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

                <!-- Actions buttons in hero -->
                <div class="w-full md:w-auto mt-2 md:mt-0 flex gap-3 justify-start md:justify-end">
                    <a href="{{ route('lowongan.edit', $lowongan->id) }}" class="button action-button bg-secondary hover:bg-opacity-95 text-white font-semibold text-[14px] px-6 py-3 rounded-lg flex items-center gap-2 shadow-sm">
                        <span class="material-symbols-outlined text-[20px]">edit</span>
                        Edit Lowongan
                    </a>
                    <form action="{{ route('perusahaan.lowongan.delete', $lowongan->id) }}" method="POST" onsubmit="return confirm('Hapus lowongan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button action-button bg-error hover:bg-opacity-90 text-white font-semibold text-[14px] px-6 py-3 rounded-lg flex items-center gap-2 shadow-sm">
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                            Hapus
                        </button>
                    </form>
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

    <!-- Main Content Area -->
    <main class="flex-grow px-4 md:px-12 py-8 max-w-7xl mx-auto w-full flex flex-col lg:flex-row gap-6">
        <!-- Left Side Details -->
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

        <!-- Right Side Sidebar -->
        <aside class="lg:w-1/3 space-y-6">
            <div class="sticky top-[150px] space-y-6">
                <!-- Deadline & Details Summary -->
                <div class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 text-center glass-panel">
                    <p class="text-[14px] leading-5 text-on-surface-variant">
                        Batas akhir pendaftaran: <span class="font-semibold text-on-surface">{{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d F Y') }}</span>
                    </p>
                </div>

                <!-- Tentang Perusahaan -->
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
                            <a class="text-[14px] leading-5 text-secondary hover:underline" href="/home-perusahaan">Kembali ke beranda</a>
                        </div>
                    </div>

                    <p class="text-[14px] leading-6 text-on-surface-variant line-clamp-4">
                        {{ $lowongan->perusahaan->deskripsi ?? 'Perusahaan ini membuka peluang karir untuk talenta terbaik di bidang teknologi dan pengembangan digital.' }}
                    </p>
                </div>

                <!-- List Pelamar (Employer Side Only) -->
                <div class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 glass-panel space-y-4">
                    <h3 class="text-[20px] font-headline font-bold text-on-surface flex items-center gap-2 border-b border-surface-container pb-3">
                        <span class="material-symbols-outlined text-secondary">group</span>
                        Pelamar ({{ $lowongan->lamarans->where('status', 'diproses')->count() }})
                    </h3>
                    
                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-1">
                        @forelse($lowongan->lamarans->where('status', 'diproses') as $lamaran)
                            <div class="flex items-center justify-between p-3 rounded-lg border border-surface-container hover:bg-surface-container-low transition-colors gap-3">
                                <div class="flex items-center gap-3 min-w-0">
                                    <img src="{{ $lamaran->pelamar->foto_profil ? asset('storage/' . $lamaran->pelamar->foto_profil) : 'https://cdn-icons-png.flaticon.com/512/847/847969.png' }}" class="w-10 h-10 rounded-full object-cover shrink-0 border border-outline-variant">
                                    <div class="min-w-0">
                                        <p class="font-semibold text-body-sm text-on-surface truncate leading-tight">{{ $lamaran->pelamar->nama_lengkap }}</p>
                                        <a href="{{ route('cv.show', ['cv' => $lamaran->cv_id, 'lamaran_id' => $lamaran->id]) }}" target="_blank" class="text-[12px] text-secondary hover:underline flex items-center gap-0.5 leading-none mt-1">
                                            <span class="material-symbols-outlined text-[14px]">description</span>
                                            Resume.pdf
                                        </a>
                                    </div>
                                </div>
                                <div class="flex gap-1.5 shrink-0">
                                    <!-- Schedule Interview Action -->
                                    <button class="p-2 bg-secondary text-white rounded-lg hover:bg-opacity-90 active:scale-95 transition-all flex items-center justify-center btn-wawancara"
                                        data-id="{{ $lamaran->id }}"
                                        data-nama="{{ $lamaran->pelamar->nama_lengkap }}"
                                        title="Jadwalkan Wawancara">
                                        <span class="material-symbols-outlined text-[18px]">calendar_month</span>
                                    </button>
                                    
                                    <!-- Reject Action -->
                                    <form id="reject-form-{{ $lamaran->id }}" action="{{ route('lamaran.tolak', $lamaran->id) }}" method="POST">
                                        @csrf
                                        <button type="button" onclick="openRejectModal({{ $lamaran->id }}, '{{ $lamaran->pelamar->nama_lengkap }}')" class="p-2 bg-error text-white rounded-lg hover:bg-opacity-90 active:scale-95 transition-all flex items-center justify-center" title="Tolak Lamaran">
                                            <span class="material-symbols-outlined text-[18px]">close</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-body-sm text-on-surface-muted text-center py-6">Belum ada pelamar untuk lowongan ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </aside>
    </main>

    <!-- Footer -->
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

    <!-- Scheduling Interview Modal -->
    <div id="wawancaraModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-[60] backdrop-blur-sm animate-fade-in">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden glass-card">
            <form id="wawancaraForm" method="POST" action="">
                @csrf
                <div class="px-6 py-5 border-b border-outline-variant flex items-center justify-between">
                    <h3 class="text-[20px] font-headline font-bold text-on-surface">Jadwal Wawancara</h3>
                    <button id="btnCancelModal" type="button" class="p-2 rounded-full hover:bg-surface-container-low text-on-surface-variant">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <div class="p-6 space-y-4">
                    <p class="text-body-sm text-on-surface-variant">Menjadwalkan wawancara untuk: <strong id="wawancaraPelamarNama" class="text-on-surface font-semibold"></strong></p>
                    
                    <div>
                        <label class="block text-body-sm font-semibold text-on-surface-variant mb-1">Tanggal Wawancara</label>
                        <input type="date" name="tanggal" class="w-full px-4 py-2.5 rounded-lg border border-outline-variant focus:ring-2 focus:ring-secondary focus:border-secondary text-body-sm text-on-surface bg-surface-container-lowest outline-none" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-body-sm font-semibold text-on-surface-variant mb-1">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="w-full px-4 py-2.5 rounded-lg border border-outline-variant focus:ring-2 focus:ring-secondary focus:border-secondary text-body-sm text-on-surface bg-surface-container-lowest outline-none" required>
                        </div>
                        <div>
                            <label class="block text-body-sm font-semibold text-on-surface-variant mb-1">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="w-full px-4 py-2.5 rounded-lg border border-outline-variant focus:ring-2 focus:ring-secondary focus:border-secondary text-body-sm text-on-surface bg-surface-container-lowest outline-none" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-body-sm font-semibold text-on-surface-variant mb-1">Link Wawancara (Zoom/GMeet)</label>
                        <input type="url" name="link_meet" class="w-full px-4 py-2.5 rounded-lg border border-outline-variant focus:ring-2 focus:ring-secondary focus:border-secondary text-body-sm text-on-surface bg-surface-container-lowest outline-none" placeholder="https://..." required>
                    </div>

                    <div class="bg-surface-container-low p-3 rounded-lg border border-outline-variant text-[12px] text-on-surface-variant leading-relaxed">
                        <span class="font-bold flex items-center gap-1 mb-1">
                            <span class="material-symbols-outlined text-[16px] text-secondary">info</span>
                            Pesan Otomatis Dikirim ke Pelamar
                        </span>
                        "Kami tertarik dengan CV kamu, ditunggu di wawancara nanti ya"
                    </div>
                </div>

                <div class="px-6 py-4 bg-surface-container-low border-t border-outline-variant flex gap-3 justify-end">
                    <button type="button" id="btnCancelModalBtn" class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high text-xs font-semibold">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-secondary text-white font-semibold hover:opacity-90 active:scale-95 transition-all text-xs">
                        Kirim Undangan
                    </button>
                </div>
            </form>
    <!-- Custom Reject Confirmation Popup -->
    <div class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-40 hidden animate-fade-in" id="confirmDialog">
        <div class="glass-card p-6 rounded-xl shadow-2xl max-w-sm w-full mx-4 border border-outline-variant bg-white text-center">
            <div class="flex flex-col items-center gap-4">
                <span class="material-symbols-outlined text-5xl text-error">error_outline</span>
                <div>
                    <h4 class="font-headline text-xl font-bold text-on-surface">Tolak Lamaran</h4>
                    <p class="mt-2 text-body-sm text-on-surface-variant" id="confirmDialogText">Apakah Anda yakin ingin menolak lamaran pelamar ini?</p>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button id="confirmDialogCancel" type="button" class="flex-1 py-3 bg-surface-variant text-on-surface rounded-xl font-semibold hover:bg-surface-container transition-all active:scale-95">Batal</button>
                <button id="confirmDialogBtn" type="button" class="flex-1 py-3 bg-error text-white rounded-xl font-semibold hover:bg-opacity-90 transition-all active:scale-95">Tolak</button>
            </div>
        </div>
    </div>

    <script>
        let activeFormId = null;
        function openRejectModal(lamaranId, namaPelamar) {
            activeFormId = `reject-form-${lamaranId}`;
            document.getElementById('confirmDialogText').textContent = `Apakah Anda yakin ingin menolak lamaran dari ${namaPelamar}?`;
            const confirmDialog = document.getElementById('confirmDialog');
            confirmDialog.classList.remove('hidden');
            confirmDialog.classList.add('flex');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('wawancaraModal');
            const cancelModalBtn = document.getElementById('btnCancelModal');
            const cancelModalBtn2 = document.getElementById('btnCancelModalBtn');
            const wawancaraForm = document.getElementById('wawancaraForm');
            const pelamarNamaSpan = document.getElementById('wawancaraPelamarNama');

            const confirmDialog = document.getElementById('confirmDialog');
            const confirmDialogCancel = document.getElementById('confirmDialogCancel');
            const confirmDialogBtn = document.getElementById('confirmDialogBtn');

            if (confirmDialogCancel) {
                confirmDialogCancel.addEventListener('click', () => {
                    confirmDialog.classList.add('hidden');
                    confirmDialog.classList.remove('flex');
                    activeFormId = null;
                });
            }

            if (confirmDialogBtn) {
                confirmDialogBtn.addEventListener('click', () => {
                    if (activeFormId) {
                        document.getElementById(activeFormId).submit();
                    }
                });
            }

            document.querySelectorAll('.btn-wawancara').forEach(button => {
                button.addEventListener('click', () => {
                    const lamaranId = button.dataset.id;
                    const pelamarNama = button.dataset.nama;
                    
                    pelamarNamaSpan.textContent = pelamarNama;
                    wawancaraForm.action = `/lowongan/lamaran/${lamaranId}/jadwal-wawancara`;
                    
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            const hideModal = () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            };

            if (cancelModalBtn) cancelModalBtn.addEventListener('click', hideModal);
            if (cancelModalBtn2) cancelModalBtn2.addEventListener('click', hideModal);
            
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) hideModal();
                });
            }
        });
    </script>
</body>

</html>