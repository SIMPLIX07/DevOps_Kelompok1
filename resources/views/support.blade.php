<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Pusat Bantuan - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-surface": "#181c1e",
                    "surface": "#f7fafc",
                    "surface-bright": "#f7fafc",
                    "surface-dim": "#d7dadc",
                    "outline-variant": "#c3c7cd",
                    "tertiary": "#001a18",
                    "on-tertiary-fixed": "#00201d",
                    "tertiary-fixed": "#79f7ea",
                    "on-primary-fixed": "#001d31",
                    "on-background": "#181c1e",
                    "inverse-surface": "#2d3133",
                    "tertiary-container": "#00312d",
                    "surface-tint": "#476178",
                    "inverse-on-surface": "#eef1f3",
                    "primary-container": "#112d42",
                    "surface-container-lowest": "#ffffff",
                    "primary-fixed": "#cde5ff",
                    "error-container": "#ffdad6",
                    "on-error": "#ffffff",
                    "secondary-container": "#91f0ed",
                    "on-secondary-container": "#006e6d",
                    "on-primary-container": "#7b95ae",
                    "on-primary": "#ffffff",
                    "surface-variant": "#e0e3e5",
                    "on-primary-fixed-variant": "#2f495f",
                    "on-tertiary-fixed-variant": "#00504a",
                    "secondary-fixed": "#94f2f0",
                    "surface-container-highest": "#e0e3e5",
                    "secondary": "#006a68",
                    "primary-fixed-dim": "#afc9e4",
                    "inverse-primary": "#afc9e4",
                    "on-secondary": "#ffffff",
                    "surface-container-low": "#f1f4f6",
                    "on-tertiary": "#ffffff",
                    "on-tertiary-container": "#00a499",
                    "secondary-fixed-dim": "#77d6d3",
                    "on-secondary-fixed-variant": "#00504e",
                    "surface-container-high": "#e5e9eb",
                    "on-secondary-fixed": "#00201f",
                    "surface-container": "#ebeef0",
                    "outline": "#73777d",
                    "primary": "#00182a",
                    "background": "#f7fafc",
                    "tertiary-fixed-dim": "#5adace",
                    "on-surface-variant": "#43474c",
                    "on-error-container": "#93000a",
                    "error": "#ba1a1a"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "sm": "16px",
                    "base": "4px",
                    "margin-desktop": "48px",
                    "gutter": "24px",
                    "xl": "64px",
                    "md": "24px",
                    "margin-mobile": "16px",
                    "xs": "8px",
                    "lg": "40px"
            },
            "fontFamily": {
                    "body-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-lg-mobile": ["Manrope"],
                    "headline-lg": ["Manrope"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-xl": ["Manrope"],
                    "headline-md": ["Manrope"],
                    "body-sm": ["Inter"]
            },
            "fontSize": {
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
    <style>
        body { background-color: #f7fafc; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .vibrant-gradient {
            background: linear-gradient(135deg, #00182a 0%, #006a68 100%);
        }
        .search-container:focus-within {
            box-shadow: 0 0 0 2px #319795;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md text-body-md flex flex-col min-h-screen">
<!-- TopNavBar (Sama persis dengan Navbar Tentang Kami, tapi menu Dukungan aktif) -->
<header class="w-full top-0 sticky z-50 bg-[#00182a] shadow-md py-4">
    <nav class="mx-6 md:mx-16 flex justify-between items-center relative z-50 text-white">
        <!-- Logo Left -->
        <a href="/" class="flex items-center gap-3">
            <img src="/assets/index/asset/logo.png" alt="KerjaYok Logo" class="h-10 w-auto object-contain">
            <span class="font-bold text-xl md:text-2xl tracking-wide text-white">KerjaYok</span>
        </a>

        <!-- Desktop Navigation Middle -->
        <div class="hidden md:flex items-center gap-8 text-teal-100 font-medium">
            <a href="/blog" class="hover:text-white transition-colors duration-200">Blog</a>
            <a href="/tentang-kami" class="hover:text-white transition-colors duration-200">Tentang</a>
            <a href="/pusat-bantuan" class="text-white border-b-2 border-secondary-fixed pb-1">Dukungan</a>
        </div>

        <!-- Desktop Actions Right -->
        <div class="hidden md:flex items-center gap-6">
            <a href="/pilihRole" class="hover:text-teal-200 font-medium transition-colors duration-200">Daftar</a>
            
            <!-- Login Dropdown -->
            <div class="relative group py-2">
                <button class="bg-white/20 hover:bg-white/30 border border-white/40 px-6 py-2 rounded-full font-semibold transition-all duration-200 cursor-pointer flex items-center gap-1 text-white">
                    Login
                    <span class="material-symbols-outlined text-sm">keyboard_arrow_down</span>
                </button>
                <div class="absolute right-0 top-full pt-1 w-44 hidden group-hover:block z-50">
                    <div class="bg-white text-gray-800 rounded-2xl shadow-2xl py-2 border border-gray-150 backdrop-blur-md bg-white/95 transition-all duration-200">
                        <a href="/login/pelamar" class="block px-5 py-2.5 hover:bg-teal-50 hover:text-teal-600 transition-colors font-medium">Pelamar</a>
                        <a href="/login/perusahaan" class="block px-5 py-2.5 hover:bg-teal-50 hover:text-teal-600 transition-colors font-medium">Perusahaan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button id="menu-toggle" class="md:hidden text-white focus:outline-none p-2 rounded-lg hover:bg-white/10 transition-colors cursor-pointer" aria-label="Toggle Menu">
            <span class="material-symbols-outlined text-3xl">menu</span>
        </button>

        <!-- Mobile Drawer / Dropdown -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 right-0 mt-4 p-6 bg-[#00182a]/95 backdrop-blur-lg border border-white/10 rounded-2xl flex-col gap-6 shadow-2xl z-50 transition-all duration-300">
            <div class="flex flex-col gap-4 text-center font-medium text-white">
                <a href="/blog" class="py-2 hover:text-teal-300 transition-colors">Blog</a>
                <a href="/tentang-kami" class="py-2 hover:text-teal-300 transition-colors">Tentang</a>
                <a href="/pusat-bantuan" class="py-2 text-teal-300 font-bold border-b border-teal-300/30 pb-1">Dukungan</a>
            </div>
            <hr class="border-white/10">
            <div class="flex flex-col gap-4">
                <a href="/pilihRole" class="w-full py-3 bg-white/10 hover:bg-white/20 text-center rounded-xl font-semibold transition-all text-white">Daftar</a>
                <div class="flex flex-col gap-2">
                    <span class="text-xs text-teal-300 uppercase tracking-wider font-semibold text-center">Login Sebagai</span>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="/login/pelamar" class="py-3 bg-white text-[#000E3A] hover:bg-teal-100 text-center rounded-xl font-semibold transition-all">Pelamar</a>
                        <a href="/login/perusahaan" class="py-3 bg-teal-500 text-white hover:bg-teal-600 text-center rounded-xl font-semibold transition-all">Perusahaan</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="vibrant-gradient relative py-24 overflow-hidden">
        <div class="relative z-10 max-w-7xl mx-auto px-margin-desktop text-center">
            <h1 class="font-headline-xl text-headline-xl text-white mb-xs">Pusat Bantuan KerjaYok</h1>
            <p class="font-body-lg text-body-lg text-primary-fixed-dim mb-lg max-w-2xl mx-auto">Cari solusi untuk kendala karir Anda atau pelajari cara mengoptimalkan platform kami.</p>
            <div class="max-w-2xl mx-auto relative group">
                <div class="search-container flex items-center bg-surface-container-lowest rounded-xl p-base border border-outline-variant transition-all">
                    <span class="material-symbols-outlined ml-4 text-outline" data-icon="search">search</span>
                    <input id="search-input" aria-label="Cari bantuan" class="w-full bg-transparent border-none focus:ring-0 py-4 px-4 text-on-surface font-body-md" placeholder="Cari pertanyaan (misal: verifikasi, lamar, admin, cv)..." type="text">
                    <button id="search-btn" class="bg-[#319795] text-white px-8 py-3 rounded-lg font-label-md hover:bg-[#2c7a7b] transition-colors mr-1">Cari</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="py-xl max-w-7xl mx-auto px-margin-desktop">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
            <!-- For Candidates -->
            <div onclick="filterCategory('pelamar')" class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md hover:shadow-lg transition-all duration-300 group cursor-pointer">
                <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-secondary" data-icon="person">person</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-xs">Untuk Pelamar</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Panduan melamar, tracking status, dan tips wawancara kerja.</p>
            </div>
            <!-- For Employers -->
            <div onclick="filterCategory('perusahaan')" class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md hover:shadow-lg transition-all duration-300 group cursor-pointer">
                <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-secondary" data-icon="business">business</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-xs">Untuk Perusahaan</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Manajemen lowongan, sourcing kandidat, dan dashboard rekrutmen.</p>
            </div>
            <!-- Account Security -->
            <div onclick="filterCategory('keamanan')" class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md hover:shadow-lg transition-all duration-300 group cursor-pointer">
                <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-secondary" data-icon="security">security</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-xs">Keamanan Akun</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Lupa password, verifikasi 2-faktor, dan perlindungan data pribadi.</p>
            </div>
            <!-- CV Guide -->
            <div onclick="filterCategory('cv')" class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md hover:shadow-lg transition-all duration-300 group cursor-pointer">
                <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-secondary" data-icon="description">description</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-xs">Panduan CV</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Template CV ATS-friendly, optimasi resume, dan portofolio digital.</p>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="py-xl bg-surface-container-low" id="faq-section">
        <div class="max-w-7xl mx-auto px-margin-desktop">
            <div class="flex flex-col lg:flex-row gap-xl">
                <div class="lg:w-1/3">
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-sm">Pertanyaan Sering Diajukan</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-md">Kami merangkum jawaban tercepat untuk pertanyaan mengenai alur kerja dan fitur yang ada di platform KerjaYok.</p>
                    <div class="hidden sm:block">
                        <img alt="Team support illustration" class="w-full h-64 object-cover rounded-2xl" data-alt="A professional collaborative workspace in a modern tech office with large windows. Young professionals are discussing while looking at a digital tablet and laptop, with soft daylight and teal accent colors reflecting a corporate yet energetic and modern atmosphere. The focus is on a group discussion showing teamwork and reliable support." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCklXL4FJwoArzFcQM3LuQuiRpd-_n7AIkEY-OlHQ3DlhNLLbXTGZdfFISkRdSbHnE3ZsfP4IgOFltAsVfCIP8Tbj4uJFTYMxgvK9e_gmeeJGNU6Spq6nK3CJsKKcOSDnW4icDKoObwWEYEiz5eA_4nU4URc2SgopmkfuM7TL2_xQTLUYm1pkqL16R6q3SsUrBUnbbbq28pDTo467cAJqW5nm_ctr213hqYODXQ7GgPEY6-VCjG5YX2KsqpRoCOLCgo_mxwsI6M2jA">
                    </div>
                </div>
                <div class="lg:w-2/3 space-y-base" id="faq-accordion-container">
                    <!-- FAQ Item 1 (Pelamar) -->
                    <div class="faq-item bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden group transition-all duration-200" data-categories="pelamar cv">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container" onclick="toggleFaq(this)">
                            <span class="font-headline-md text-primary faq-question">Bagaimana cara melamar lowongan pekerjaan di KerjaYok?</span>
                            <span class="material-symbols-outlined transition-transform duration-300" data-icon="expand_more">expand_more</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md">
                                Anda dapat melamar lowongan dengan mendaftar terlebih dahulu sebagai Pelamar. Setelah itu, buat atau lengkapi profil CV & portofolio Anda di sistem. Buka halaman detail lowongan yang Anda inginkan, lalu klik tombol Lamar Sekarang. Semua riwayat dan status lamaran dapat dipantau langsung di halaman "Lamaran Anda" secara real-time.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 (Perusahaan / Keamanan) -->
                    <div class="faq-item bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden group transition-all duration-200" data-categories="perusahaan keamanan">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container" onclick="toggleFaq(this)">
                            <span class="font-headline-md text-primary faq-question">Mengapa akun Perusahaan saya tidak bisa login setelah registrasi?</span>
                            <span class="material-symbols-outlined transition-transform duration-300" data-icon="expand_more">expand_more</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md">
                                Demi menjaga kredibilitas lowongan kerja, setiap pendaftaran akun Perusahaan akan masuk ke antrean verifikasi dengan status "Pending" dan tidak bisa login. Tim Admin KerjaYok akan memvalidasi dokumen legalitas perusahaan Anda dalam kurun waktu maksimal 48 jam. Apabila disetujui, status Anda berubah menjadi "Verified" dan Anda dapat login. Apabila ditolak, Anda akan melihat alasan penolakan dan dapat mendaftar ulang.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 (Keamanan) -->
                    <div class="faq-item bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden group transition-all duration-200" data-categories="keamanan">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container" onclick="toggleFaq(this)">
                            <span class="font-headline-md text-primary faq-question">Bagaimana cara memulihkan kata sandi jika saya lupa?</span>
                            <span class="material-symbols-outlined transition-transform duration-300" data-icon="expand_more">expand_more</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md">
                                Klik tombol "Lupa Kata Sandi" pada halaman login (baik login Pelamar maupun login Perusahaan). Masukkan alamat email terdaftar Anda, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi baru secara aman langsung ke kotak masuk email Anda.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 (Pelamar) -->
                    <div class="faq-item bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden group transition-all duration-200" data-categories="pelamar keamanan">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container" onclick="toggleFaq(this)">
                            <span class="font-headline-md text-primary faq-question">Apakah saya bisa menghapus akun Pelamar saya secara mandiri?</span>
                            <span class="material-symbols-outlined transition-transform duration-300" data-icon="expand_more">expand_more</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md">
                                Ya, pelamar dapat menghapus akun mereka secara permanen. Masuk ke menu Pengaturan Profil, navigasikan ke bagian keamanan/pengaturan akun, lalu pilih Hapus Akun. Menghapus akun akan membersihkan semua data profil, riwayat lamaran, file CV, dan portofolio Anda secara permanen dari sistem KerjaYok.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 5 (Pelamar / Perusahaan) -->
                    <div class="faq-item bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden group transition-all duration-200" data-categories="pelamar perusahaan">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container" onclick="toggleFaq(this)">
                            <span class="font-headline-md text-primary faq-question">Bagaimana alur koordinasi dan pelaksanaan jadwal Wawancara kerja?</span>
                            <span class="material-symbols-outlined transition-transform duration-300" data-icon="expand_more">expand_more</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md">
                                Apabila berkas lamaran Anda dinilai cocok oleh Perusahaan, pihak HRD akan mengirimkan undangan beserta detail tanggal & waktu wawancara melalui dashboard rekrutmen. Pelamar dapat meninjau, memantau rincian jadwal, dan menyetujui jadwal wawancara tersebut secara langsung melalui menu "Wawancara" yang ada pada bar navigasi atas akun Pelamar.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 6 (Pelamar / CV) -->
                    <div class="faq-item bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden group transition-all duration-200" data-categories="pelamar cv">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container" onclick="toggleFaq(this)">
                            <span class="font-headline-md text-primary faq-question">Bagaimana cara menandai lowongan favorit untuk dilamar nanti?</span>
                            <span class="material-symbols-outlined transition-transform duration-300" data-icon="expand_more">expand_more</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md">
                                KerjaYok menyediakan fitur "Bookmark" untuk menyimpan lowongan kerja yang menarik perhatian Anda. Cukup klik ikon bookmark pada bagian kanan atas kartu lowongan di halaman pencarian. Anda dapat mengakses kembali daftar lowongan yang telah Anda simpan kapan saja lewat menu "Bookmark" pada profil akun Pelamar Anda.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 7 (Pelamar / CV) -->
                    <div class="faq-item bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden group transition-all duration-200" data-categories="pelamar cv">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container" onclick="toggleFaq(this)">
                            <span class="font-headline-md text-primary faq-question">Bagaimana cara mengunggah dan mengelola portofolio digital di KerjaYok?</span>
                            <span class="material-symbols-outlined transition-transform duration-300" data-icon="expand_more">expand_more</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md">
                                Setelah masuk sebagai Pelamar, navigasikan ke menu 'Portofolio' di dasbor Anda. Pilih 'Tambah Portofolio' untuk menambahkan rincian proyek Anda seperti nama proyek, deskripsi, peran Anda, tautan demonstrasi, dan lampiran file/gambar. Portofolio terunggah ini akan otomatis terlampir ketika Anda melamar pekerjaan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-xl bg-white">
        <div class="max-w-7xl mx-auto px-margin-desktop text-center">
            <div class="bg-primary text-white rounded-[32px] p-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="font-headline-lg text-headline-lg mb-xs text-white">Masih butuh bantuan?</h2>
                    <p class="font-body-lg text-body-lg text-primary-fixed-dim mb-lg max-w-xl mx-auto">Tim support kami siap membantu Anda 24/7. Jangan ragu untuk menghubungi kami jika kendala belum teratasi.</p>
                    <div class="flex flex-col sm:flex-row gap-sm justify-center items-center">
                        <a class="flex items-center gap-xs bg-[#319795] text-white px-lg py-md rounded-xl font-headline-md hover:bg-[#2c7a7b] transition-all transform hover:scale-105" href="mailto:support@kerjayok.com">
                            <span class="material-symbols-outlined" data-icon="mail">mail</span>
                            Hubungi Email Support
                        </a>
                    </div>
                </div>
                <!-- Decorative Element -->
                <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-secondary opacity-10 rounded-full blur-3xl"></div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="w-full mt-auto bg-surface-container-highest border-t border-outline-variant py-8">
    <div class="max-w-7xl mx-auto px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4 text-gray-800">
        <p class="font-body-sm text-body-sm text-on-surface-variant">© 2026 KerjaYok. Hubungkan Karir Anda dengan Kecepatan.</p>
        <div class="flex gap-gutter font-body-sm text-body-sm">
            <a class="text-on-surface-variant hover:text-secondary transition-all cursor-pointer" href="/tentang-kami">Tentang Kami</a>
            <a class="text-on-surface-variant hover:text-secondary transition-all cursor-pointer" href="/blog">Blog</a>
            <a class="text-on-surface-variant hover:text-secondary transition-all cursor-pointer" href="/pusat-bantuan">Pusat Bantuan</a>
        </div>
    </div>
</footer>

<script>
    // FAQ Accordion logic
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('.material-symbols-outlined');
        const allContents = document.querySelectorAll('.faq-content');
        const allIcons = document.querySelectorAll('.faq-item .material-symbols-outlined');

        // Close all others
        allContents.forEach(item => {
            if (item !== content) {
                item.style.maxHeight = null;
            }
        });
        allIcons.forEach(i => {
            if (i !== icon) {
                i.style.transform = 'rotate(0deg)';
            }
        });

        // Toggle current
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.style.transform = 'rotate(0deg)';
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.style.transform = 'rotate(180deg)';
        }
    }

    // Mobile menu toggle logic
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
            
            const icon = menuToggle.querySelector('.material-symbols-outlined');
            if (mobileMenu.classList.contains('hidden')) {
                icon.textContent = 'menu';
            } else {
                icon.textContent = 'close';
            }
        });

        // Close mobile menu on clicking a link
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                menuToggle.querySelector('.material-symbols-outlined').textContent = 'menu';
            });
        });
    }

    // --- Search & Filter Logic ---
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-btn');
    const faqItems = document.querySelectorAll('.faq-item');
    const container = document.getElementById('faq-accordion-container');
    
    // Create no-results element dynamically
    const noResultsDiv = document.createElement('div');
    noResultsDiv.id = 'no-results';
    noResultsDiv.className = 'hidden bg-surface-container-lowest p-xl rounded-xl border border-outline-variant text-center space-y-sm';
    noResultsDiv.innerHTML = `
        <span class="material-symbols-outlined text-secondary text-5xl">search_off</span>
        <h3 class="font-headline-md text-primary">Hasil tidak ditemukan</h3>
        <p class="text-on-surface-variant font-body-sm max-w-md mx-auto">Kami tidak dapat menemukan jawaban untuk kata kunci tersebut. Coba gunakan kata kunci lain seperti 'verifikasi', 'lamar', 'admin', atau 'wawancara'.</p>
    `;
    container.appendChild(noResultsDiv);

    let activeCategory = null;

    function filterFaqs() {
        const query = searchInput.value.toLowerCase().trim();
        let matchCount = 0;
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question').textContent.toLowerCase();
            const answer = item.querySelector('.faq-content').textContent.toLowerCase();
            const categories = item.getAttribute('data-categories').split(' ');
            
            const matchesQuery = question.includes(query) || answer.includes(query);
            const matchesCategory = !activeCategory || categories.includes(activeCategory);
            
            if (matchesQuery && matchesCategory) {
                item.classList.remove('hidden');
                matchCount++;
                
                // Highlight matched query items visually if query is not empty
                if (query !== '') {
                    item.classList.add('border-[#319795]', 'shadow-md');
                } else {
                    item.classList.remove('border-[#319795]', 'shadow-md');
                }
            } else {
                item.classList.add('hidden');
                // Auto collapse if hidden
                const content = item.querySelector('.faq-content');
                const icon = item.querySelector('.material-symbols-outlined');
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
            }
        });
        
        if (matchCount === 0) {
            noResultsDiv.classList.remove('hidden');
        } else {
            noResultsDiv.classList.add('hidden');
        }
    }

    function filterCategory(categoryName) {
        // Toggle category filter
        if (activeCategory === categoryName) {
            activeCategory = null;
        } else {
            activeCategory = categoryName;
        }

        // Highlight selected category visually
        const categoriesElements = document.querySelectorAll('[onclick^="filterCategory"]');
        categoriesElements.forEach(el => {
            const clickedCat = el.getAttribute('onclick').match(/'([^']+)'/)[1];
            if (activeCategory === clickedCat) {
                el.classList.add('border-[#319795]', 'bg-surface-container');
            } else {
                el.classList.remove('border-[#319795]', 'bg-surface-container');
            }
        });

        // Filter and smooth scroll to FAQ section
        filterFaqs();
        document.getElementById('faq-section').scrollIntoView({ behavior: 'smooth' });
    }

    // Input events
    searchInput.addEventListener('input', filterFaqs);
    searchButton.addEventListener('click', filterFaqs);
    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            filterFaqs();
        }
    });
</script>
</body>
</html>
