<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Edit Portofolio - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-surface": "#181c1e",
                        "outline": "#73777d",
                        "on-tertiary-container": "#00a499",
                        "tertiary": "#001a18",
                        "on-surface-variant": "#43474c",
                        "inverse-on-surface": "#eef1f3",
                        "primary-container": "#112d42",
                        "surface-container": "#ebeef0",
                        "on-primary-container": "#7b95ae",
                        "on-secondary-fixed-variant": "#00504e",
                        "on-secondary": "#ffffff",
                        "surface": "#f7fafc",
                        "secondary-container": "#91f0ed",
                        "primary-fixed-dim": "#afc9e4",
                        "inverse-surface": "#2d3133",
                        "background": "#f7fafc",
                        "on-error-container": "#93000a",
                        "on-tertiary": "#ffffff",
                        "surface-dim": "#d7dadc",
                        "on-tertiary-fixed": "#00201d",
                        "tertiary-fixed": "#79f7ea",
                        "surface-container-low": "#f1f4f6",
                        "outline-variant": "#c3c7cd",
                        "inverse-primary": "#afc9e4",
                        "on-background": "#181c1e",
                        "surface-variant": "#e0e3e5",
                        "secondary-fixed-dim": "#77d6d3",
                        "on-primary-fixed": "#001d31",
                        "on-tertiary-fixed-variant": "#00504a",
                        "surface-container-high": "#e5e9eb",
                        "surface-bright": "#f7fafc",
                        "on-secondary-fixed": "#00201f",
                        "primary-fixed": "#cde5ff",
                        "on-primary": "#ffffff",
                        "error": "#ba1a1a",
                        "secondary": "#006a68",
                        "primary": "#00182a",
                        "tertiary-fixed-dim": "#5adace",
                        "surface-container-highest": "#e0e3e5",
                        "error-container": "#ffdad6",
                        "on-primary-fixed-variant": "#2f495f",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed": "#94f2f0",
                        "on-error": "#ffffff",
                        "tertiary-container": "#00312d",
                        "on-secondary-container": "#006e6d",
                        "surface-tint": "#476178"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xl": "64px",
                        "sm": "16px",
                        "md": "24px",
                        "lg": "40px",
                        "margin-desktop": "48px",
                        "gutter": "24px",
                        "xs": "8px",
                        "margin-mobile": "16px",
                        "base": "4px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "headline-lg": ["Manrope"],
                        "body-lg": ["Inter"],
                        "body-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-xl": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-md": ["Manrope"],
                        "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .form-card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .vibrant-gradient {
            background: linear-gradient(135deg, #00182a 0%, #112d42 50%, #006a68 100%);
        }
    </style>
</head>

<body class="bg-surface text-on-surface font-body-md selection:bg-secondary-container selection:text-on-secondary-container">
    <!-- TopNavBar -->
    <header class="bg-primary dark:bg-on-primary-fixed docked full-width top-0 shadow-md z-50">
        <div class="flex justify-between items-center px-margin-desktop w-full h-20 max-w-7xl mx-auto bg-gradient-to-r from-primary via-primary-container to-secondary">
            <div class="flex items-center gap-xl">
                <a class="text-headline-md font-headline-md font-bold text-white tracking-tight" href="{{ route('home') }}">KerjaYok</a>
                <nav class="hidden md:flex items-center gap-lg">
                    <a class="font-body-md text-body-md text-white/80 hover:text-white transition-colors" href="{{ route('home') }}">Lowongan Kerja</a>
                    <a class="font-body-md text-body-md text-white/80 hover:text-white transition-colors" href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
                    <a class="font-body-md text-body-md text-white/80 hover:text-white transition-colors" href="{{ route('pelamar.wawancara') }}">Wawancara</a>
                </nav>
            </div>
            <div class="flex items-center gap-md">
                <a href="{{ route('pelamar.settings') }}" class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-white/10 transition-colors text-white" aria-label="Pengaturan akun">
                    @if(session('pelamar_foto'))
                        <img src="{{ asset('storage/' . session('pelamar_foto')) }}" alt="Profil" class="w-8 h-8 rounded-full object-cover border-2 border-white/50">
                    @else
                        <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 0;">account_circle</span>
                    @endif
                    <span class="hidden md:inline text-white text-[14px] font-semibold">{{ session('pelamar_nama') ?? 'Profil' }}</span>
                </a>
            </div>
        </div>
    </header>

    <main class="min-h-screen pb-xl">
        <!-- Hero Section -->
        <section class="vibrant-gradient pt-32 pb-xl px-margin-desktop text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-tertiary-fixed blur-[100px] rounded-full"></div>
                <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-secondary-fixed blur-[80px] rounded-full"></div>
            </div>
            <div class="max-w-3xl mx-auto relative z-10">
                <h1 class="font-headline-xl text-headline-xl mb-sm">Edit Portofolio Anda</h1>
                <p class="font-body-lg text-body-lg text-white/90">Perbarui data portofolio Anda agar tetap relevan dengan karya dan proyek terbaru Anda.</p>
            </div>
        </section>

        <!-- Form Section -->
        <section class="max-w-5xl mx-auto -mt-16 px-margin-mobile md:px-0 relative z-20">
            <form class="space-y-gutter" id="portofolio-form" action="{{ route('portofolio.update', $portofolio->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Session Alert -->
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-[#00a499]/10 border border-[#00a499]/20 text-[#00a499] flex items-center gap-3">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-error/10 border border-error/20 text-error space-y-2">
                        <div class="flex items-center gap-3 font-semibold">
                            <span class="material-symbols-outlined">error</span>
                            <span>Terdapat beberapa kesalahan:</span>
                        </div>
                        <ul class="list-disc list-inside pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Data Utama Portofolio -->
                <div class="bg-white p-md md:p-lg rounded-xl border border-outline-variant/30 form-card-shadow">
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">folder</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Informasi Portofolio</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                        <div class="space-y-base">
                            <label class="font-label-md text-label-md text-outline">Judul Portofolio</label>
                            <input class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" placeholder="Masukkan nama proyek atau portofolio" type="text" name="judul" required value="{{ old('judul', $portofolio->judul) }}">
                        </div>
                        <div class="space-y-base">
                            <label class="font-label-md text-label-md text-outline">Kategori (Opsional)</label>
                            <input class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" placeholder="Web / Mobile / UI/UX / dll" type="text" name="kategori" value="{{ old('kategori', $portofolio->kategori) }}">
                        </div>
                        <div class="space-y-base md:col-span-2">
                            <label class="font-label-md text-label-md text-outline">Teknologi/Tools (Opsional)</label>
                            <input class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" placeholder="Laravel, MySQL, Figma, ..." type="text" name="teknologi" value="{{ old('teknologi', $portofolio->teknologi) }}">
                        </div>
                        <div class="space-y-base md:col-span-2">
                            <label class="font-label-md text-label-md text-outline">Deskripsi Project (Opsional)</label>
                            <textarea class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" placeholder="Ceritakan singkat tentang deskripsi proyek ini..." rows="4" name="deskripsi">{{ old('deskripsi', $portofolio->deskripsi) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Link & Tanggal -->
                <div class="bg-white p-md md:p-lg rounded-xl border border-outline-variant/30 form-card-shadow">
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">link</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Tautan & Waktu Pelaksanaan</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                        <div class="space-y-base">
                            <label class="font-label-md text-label-md text-outline">Link Demo (Opsional)</label>
                            <input class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" placeholder="https://..." type="text" name="link_demo" value="{{ old('link_demo', $portofolio->link_demo) }}">
                        </div>
                        <div class="space-y-base">
                            <label class="font-label-md text-label-md text-outline">Link Repository (Opsional)</label>
                            <input class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" placeholder="https://github.com/..." type="text" name="link_repo" value="{{ old('link_repo', $portofolio->link_repo) }}">
                        </div>
                        <div class="space-y-base">
                            <label class="font-label-md text-label-md text-outline">Tanggal Mulai (Opsional)</label>
                            <input class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $portofolio->tanggal_mulai) }}">
                        </div>
                        <div class="space-y-base">
                            <label class="font-label-md text-label-md text-outline">Tanggal Selesai (Opsional)</label>
                            <input class="w-full p-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all bg-white" type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $portofolio->tanggal_selesai) }}">
                        </div>
                    </div>
                </div>

                <!-- Action CTA -->
                <div class="pt-lg flex flex-col sm:flex-row justify-center md:justify-end gap-md">
                    <a href="{{ route('portofolio.index') }}" class="group border border-outline text-outline hover:bg-surface-container hover:text-primary px-xl py-md rounded-xl font-headline-md text-headline-md transition-all active:scale-95 flex items-center justify-center gap-md">
                        <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span>
                        <span>Kembali</span>
                    </a>
                    <button class="group relative overflow-hidden bg-secondary hover:bg-on-secondary-container text-white px-xl py-md rounded-xl font-headline-md text-headline-md transition-all active:scale-95 shadow-lg flex items-center justify-center gap-md" type="submit">
                        <span class="relative z-10">Update Portofolio</span>
                        <span class="material-symbols-outlined relative z-10 group-hover:translate-x-1 transition-transform">send</span>
                        <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-primary dark:bg-tertiary-container border-t border-outline-variant/20">
        <div class="flex flex-col md:flex-row justify-between items-center px-margin-desktop py-lg w-full max-w-7xl mx-auto">
            <div class="mb-md md:mb-0">
                <span class="text-headline-sm font-headline-sm text-white font-bold">KerjaYok</span>
                <p class="font-label-md text-label-md text-surface-variant mt-xs">© 2024 KerjaYok. All rights reserved.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-lg">
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors" href="#">Tentang Kami</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors" href="#">Pusat Bantuan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors" href="#">Ketentuan Layanan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white hover:underline transition-colors" href="#">Kebijakan Privasi</a>
            </div>
        </div>
    </footer>

    <script>
        // Simple micro-interaction for the form inputs
        document.querySelectorAll('input, textarea').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.querySelector('label')?.classList.add('text-secondary');
            });
            input.addEventListener('blur', () => {
                input.parentElement.querySelector('label')?.classList.remove('text-secondary');
            });
        });

        // Form submission effect
        document.getElementById('portofolio-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin">refresh</span> <span>Memperbarui...</span>';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = '<span class="material-symbols-outlined">check_circle</span> <span>Berhasil!</span>';
                btn.classList.replace('bg-secondary', 'bg-on-tertiary-container');
                setTimeout(() => {
                    e.target.submit(); // Submit the form to the backend
                }, 1000);
            }, 1000);
        });
    </script>
</body>

</html>
