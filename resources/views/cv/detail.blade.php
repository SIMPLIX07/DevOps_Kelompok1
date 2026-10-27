<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profil {{ $cv->pelamar->nama_lengkap }} - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "inverse-primary": "#afc9e4",
                    "on-tertiary-container": "#00a499",
                    "on-primary": "#ffffff",
                    "secondary-fixed": "#94f2f0",
                    "primary-fixed": "#cde5ff",
                    "on-secondary-container": "#006e6d",
                    "on-tertiary-fixed": "#00201d",
                    "inverse-surface": "#2d3133",
                    "surface-bright": "#f7fafc",
                    "background": "#f7fafc",
                    "on-surface-variant": "#43474c",
                    "outline-variant": "#c3c7cd",
                    "on-primary-container": "#7b95ae",
                    "on-primary-fixed-variant": "#2f495f",
                    "on-secondary": "#ffffff",
                    "tertiary": "#001a18",
                    "on-secondary-fixed": "#00201f",
                    "surface-container": "#ebeef0",
                    "error-container": "#ffdad6",
                    "surface-container-high": "#e5e9eb",
                    "primary-container": "#112d42",
                    "on-secondary-fixed-variant": "#00504e",
                    "on-surface": "#181c1e",
                    "error": "#ba1a1a",
                    "surface-container-lowest": "#ffffff",
                    "secondary-container": "#91f0ed",
                    "on-tertiary-fixed-variant": "#00504a",
                    "on-background": "#181c1e",
                    "surface-container-low": "#f1f4f6",
                    "surface-container-highest": "#e0e3e5",
                    "on-error-container": "#93000a",
                    "tertiary-fixed-dim": "#5adace",
                    "surface-tint": "#476178",
                    "tertiary-fixed": "#79f7ea",
                    "on-tertiary": "#ffffff",
                    "on-error": "#ffffff",
                    "surface-variant": "#e0e3e5",
                    "primary-fixed-dim": "#afc9e4",
                    "inverse-on-surface": "#eef1f3",
                    "secondary-fixed-dim": "#77d6d3",
                    "secondary": "#006a68",
                    "primary": "#00182a",
                    "on-primary-fixed": "#001d31",
                    "surface-dim": "#d7dadc",
                    "outline": "#73777d",
                    "tertiary-container": "#00312d",
                    "surface": "#f7fafc"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "base": "4px",
                    "sm": "16px",
                    "lg": "40px",
                    "gutter": "24px",
                    "margin-mobile": "16px",
                    "md": "24px",
                    "margin-desktop": "48px",
                    "xs": "8px",
                    "xl": "64px"
            },
            "fontFamily": {
                    "headline-md": ["Manrope"],
                    "headline-lg": ["Manrope"],
                    "headline-xl": ["Manrope"],
                    "body-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-lg-mobile": ["Manrope"],
                    "label-md": ["Inter"],
                    "body-sm": ["Inter"],
                    "body-lg": ["Inter"]
            },
            "fontSize": {
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}]
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
    </style>
</head>
<body class="bg-background font-body-md text-on-background">

<!-- TopNavBar -->
<nav class="bg-surface-container-lowest text-primary docked full-width top-0 sticky z-50 shadow-sm h-16 flex items-center">
    <div class="flex justify-between items-center w-full px-margin-desktop max-w-7xl mx-auto">
        <a href="/" class="text-headline-md font-headline-md font-extrabold text-primary">KerjaYok</a>
        @if (session('perusahaan_id'))
        <nav class="hidden md:flex gap-8 items-center">
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md" href="/home-perusahaan">Lowongan Kerja</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md" href="/karyawanPerusahaan">Karyawan</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md" href="/perusahaan/wawancara">Wawancara</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md" href="{{ route('perusahaan.history') }}">History</a>
        </nav>
        @elseif (session('pelamar_id'))
        <nav class="hidden md:flex gap-8 items-center">
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md" href="{{ route('home') }}">Lowongan Kerja</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md" href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md" href="{{ route('pelamar.wawancara') }}">Wawancara</a>
        </nav>
        @endif
        <div class="flex items-center gap-4">
        </div>
    </div>
</nav>

<main class="pb-xl">
    <!-- Hero Section -->
    <section class="hero-gradient relative py-xl px-gutter text-on-primary overflow-hidden">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-lg relative z-10">
            <div class="relative group">
                <div class="w-40 h-40 md:w-48 md:h-48 rounded-2xl overflow-hidden border-4 border-on-tertiary-container/30 shadow-xl">
                    <img class="w-full h-full object-cover" alt="Foto Profil" src="{{ $cv->pelamar->foto_profil ? asset('storage/' . $cv->pelamar->foto_profil) : 'https://cdn-icons-png.flaticon.com/512/847/847969.png' }}">
                </div>
                <div class="absolute -bottom-2 -right-2 bg-on-tertiary-container p-base rounded-lg shadow-lg">
                    <span class="material-symbols-outlined text-on-primary" style="font-variation-settings: &quot;FILL&quot; 1;">verified</span>
                </div>
            </div>
            <div class="text-center md:text-left">
                <h1 class="font-headline-xl text-headline-xl mb-base">{{ $cv->pelamar->nama_lengkap }}</h1>
                <p class="font-headline-md text-headline-md text-secondary-fixed mb-sm">{{ $cv->title }}</p>
                <div class="flex flex-wrap justify-center md:justify-start gap-sm mt-md">
                    <span class="bg-white/10 backdrop-blur-md px-md py-base rounded-full border border-white/20 flex items-center gap-xs">
                        <span class="material-symbols-outlined text-sm">location_on</span> Jakarta, Indonesia
                    </span>
                    <span class="bg-white/10 backdrop-blur-md px-md py-base rounded-full border border-white/20 flex items-center gap-xs">
                        <span class="material-symbols-outlined text-sm">mail</span> {{ $cv->pelamar->email }}
                    </span>
                    <span class="bg-white/10 backdrop-blur-md px-md py-base rounded-full border border-white/20 flex items-center gap-xs">
                        <span class="material-symbols-outlined text-sm">calendar_today</span> {{ $cv->umur }} Tahun
                    </span>
                </div>
            </div>
        </div>
        <!-- Abstract background shape -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-on-tertiary-container/10 skew-x-12 transform translate-x-20"></div>
    </section>

    <!-- Main Content Area -->
    <div class="max-w-6xl mx-auto px-gutter mt-[-40px] relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-md">
            <!-- Left Column (Bio, Education & Experience) -->
            <div class="lg:col-span-2 space-y-md">
                <!-- About Me Card -->
                <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-sm mb-md">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">person</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Tentang Saya</h2>
                    </div>
                    <p class="text-on-surface-variant font-body-md leading-relaxed whitespace-pre-line">
                        {{ $cv->tentang_saya }}
                    </p>
                </div>

                <!-- Experience Row -->
                <div class="space-y-md">
                    @if ($cv->pengalamans->count() > 0)
                    <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-sm mb-md">
                            <span class="material-symbols-outlined text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">work</span>
                            <h2 class="font-headline-md text-headline-md text-primary">Pengalaman</h2>
                        </div>
                        <div class="space-y-md">
                            @foreach ($cv->pengalamans as $pengalaman)
                            <div class="flex gap-md p-md rounded-lg bg-surface-container-low border border-outline-variant/50">
                                <div class="bg-primary-container p-sm rounded-xl flex items-center justify-center h-fit">
                                    <span class="material-symbols-outlined text-on-primary-container">business</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <h3 class="font-headline-md text-body-lg text-primary font-bold">{{ $pengalaman->pengalaman }}</h3>
                                        <span class="bg-secondary-container text-on-secondary-container text-xs font-bold px-sm py-1 rounded-full">{{ $pengalaman->durasi }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Portofolio Terlampir -->
                @if (isset($attachedPortfolio) && $attachedPortfolio)
                <div class="bg-surface-container-lowest p-md rounded-xl border-2 border-secondary/50 shadow-md hover:shadow-lg transition-shadow bg-gradient-to-br from-white to-secondary/5">
                    <div class="flex items-center justify-between mb-md">
                        <div class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">folder_special</span>
                            <h2 class="font-headline-md text-headline-md text-primary font-bold">Portofolio Terlampir</h2>
                        </div>
                        <span class="bg-secondary text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                            <span class="material-symbols-outlined text-[14px]">attachment</span>
                            Terlampir pada Lamaran
                        </span>
                    </div>
                    <div class="p-md rounded-xl bg-white border border-outline-variant/60 shadow-sm">
                        <div class="flex flex-col gap-sm">
                            <div class="flex flex-wrap justify-between gap-4 items-start">
                                <div>
                                    <h3 class="font-headline-md text-body-lg text-primary font-bold">{{ $attachedPortfolio->judul }}</h3>
                                    <p class="text-on-surface-variant font-body-sm">{{ $attachedPortfolio->kategori ?? '-' }}</p>
                                </div>
                                <span class="bg-secondary-container text-on-secondary-container text-xs font-bold px-sm py-1 rounded-full">{{ $attachedPortfolio->teknologi ?? '—' }}</span>
                            </div>
                            @if($attachedPortfolio->deskripsi)
                            <p class="text-on-surface-variant font-body-md leading-relaxed whitespace-pre-line">{{ $attachedPortfolio->deskripsi }}</p>
                            @endif
                            <div class="flex flex-wrap gap-2 mt-2">
                                @if ($attachedPortfolio->link_demo)
                                <a href="{{ $attachedPortfolio->link_demo }}" target="_blank" class="inline-flex items-center gap-2 px-sm py-2 rounded-lg bg-secondary text-white text-label-md hover:opacity-90 transition-all shadow-sm">
                                    <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                                    <span>Demo</span>
                                </a>
                                @endif
                                @if ($attachedPortfolio->link_repo)
                                <a href="{{ $attachedPortfolio->link_repo }}" target="_blank" class="inline-flex items-center gap-2 px-sm py-2 rounded-lg bg-surface-container-high text-on-surface hover:bg-surface-container transition-all border border-outline-variant shadow-sm">
                                    <span class="material-symbols-outlined text-[18px]">code</span>
                                    <span>Repository</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Portfolio Card -->
                @php
                    $otherPortfolios = $cv->pelamar->portofolios->filter(function($p) use ($attachedPortfolio) {
                        return !$attachedPortfolio || $p->id !== $attachedPortfolio->id;
                    });
                @endphp

                @if ($otherPortfolios->count() > 0)
                <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-sm mb-md">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">folder</span>
                        <h2 class="font-headline-md text-headline-md text-primary">{{ (isset($attachedPortfolio) && $attachedPortfolio) ? 'Portofolio Lainnya' : 'Portofolio' }}</h2>
                    </div>
                    <div class="space-y-md">
                        @foreach ($otherPortfolios as $portfolio)
                        <div class="p-md rounded-xl bg-surface-container-low border border-outline-variant/50">
                            <div class="flex flex-col gap-sm">
                                <div class="flex flex-wrap justify-between gap-4 items-start">
                                    <div>
                                        <h3 class="font-headline-md text-body-lg text-primary font-bold">{{ $portfolio->judul }}</h3>
                                        <p class="text-on-surface-variant font-body-sm">{{ $portfolio->kategori ?? '-' }}</p>
                                    </div>
                                    <span class="bg-secondary-container text-on-secondary-container text-xs font-bold px-sm py-1 rounded-full">{{ $portfolio->teknologi ?? '—' }}</span>
                                </div>
                                @if($portfolio->deskripsi)
                                <p class="text-on-surface-variant font-body-md leading-relaxed whitespace-pre-line">{{ $portfolio->deskripsi }}</p>
                                @endif
                                <div class="flex flex-wrap gap-2">
                                    @if ($portfolio->link_demo)
                                    <a href="{{ $portfolio->link_demo }}" target="_blank" class="inline-flex items-center gap-2 px-sm py-2 rounded-lg bg-secondary text-white text-label-md hover:opacity-90 transition-all">
                                        <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                                        <span>Demo</span>
                                    </a>
                                    @endif
                                    @if ($portfolio->link_repo)
                                    <a href="{{ $portfolio->link_repo }}" target="_blank" class="inline-flex items-center gap-2 px-sm py-2 rounded-lg bg-surface-container-high text-on-surface hover:bg-surface-container transition-all border border-outline-variant">
                                        <span class="material-symbols-outlined text-[18px]">code</span>
                                        <span>Repository</span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column (Skills & Quick Info) -->
            <div class="space-y-md">
                <!-- Skills Card -->
                @if ($cv->skills->count() > 0)
                <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-sm mb-md">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">bolt</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Kemampuan</h2>
                    </div>
                    <div class="space-y-md">
                        @foreach ($cv->skills as $skill)
                        <div>
                            <div class="flex justify-between mb-xs">
                                <span class="font-label-md text-primary">{{ $skill->skill }}</span>
                                <span class="font-label-md text-secondary">{{ $skill->kemampuan }}%</span>
                            </div>
                            <div class="w-full bg-surface-container-high rounded-full h-2">
                                <div class="bg-secondary h-2 rounded-full transition-all duration-1000" style="width: {{ $skill->kemampuan }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Education Card -->
                @if ($cv->pendidikans->count() > 0)
                <div class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-sm mb-md">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">school</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Pendidikan</h2>
                    </div>
                    <div class="space-y-md">
                        @foreach ($cv->pendidikans as $pendidikan)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md p-md rounded-lg border-2 border-dashed border-outline-variant">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-outline mb-1 font-bold">Jenjang</p>
                                <p class="font-headline-md text-body-lg text-primary">{{ $pendidikan->tingkat }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wider text-outline mb-1 font-bold">Institusi</p>
                                <p class="font-headline-md text-body-lg text-primary">{{ $pendidikan->universitas }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-xs uppercase tracking-wider text-outline mb-1 font-bold">Jurusan</p>
                                <p class="font-headline-md text-body-lg text-primary">{{ $pendidikan->jurusan }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- CTA Card -->
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-surface-container-lowest dark:bg-inverse-surface border-t border-outline-variant dark:border-outline"><div class="max-w-6xl mx-auto px-gutter py-lg flex flex-col md:flex-row justify-between items-center gap-md">
  <div class="flex flex-col items-center md:items-start">
    <span class="font-headline-lg text-headline-lg font-bold text-secondary">KerjaYok</span>
    <p class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant mt-xs">© 2024 KerjaYok. All rights reserved.</p>
  </div>
  <nav class="flex flex-wrap justify-center gap-md">
    <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors" href="#">Tentang Kami</a>
    <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors" href="#">Pusat Bantuan</a>
    <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors" href="#">Kebijakan Privasi</a>
    <a class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors" href="#">Syarat &amp; Ketentuan</a>
  </nav>
</div></footer>

<script>
    // Micro-interactions for skill bars on scroll
    window.addEventListener('scroll', () => {
        const skillBars = document.querySelectorAll('.bg-secondary.h-2');
        skillBars.forEach(bar => {
            const rect = bar.getBoundingClientRect();
            if (rect.top < window.innerHeight) {
                bar.style.width = bar.dataset.width || bar.style.width;
            }
        });
    });
</script>
</body>
</html>
