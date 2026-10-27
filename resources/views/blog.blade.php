<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Blog KerjaYok - Tips Karir &amp; Tren Industri</title>
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 24, 42, 0.05), 0 2px 4px -1px rgba(0, 24, 42, 0.03);
        }
        .modal-active {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md text-body-md flex flex-col min-h-screen">

<!-- TopNavBar (Konsisten dengan Tentang Kami & Pusat Bantuan) -->
<header class="w-full top-0 sticky z-50 bg-[#00182a] shadow-md py-4">
    <nav class="mx-6 md:mx-16 flex justify-between items-center relative z-50 text-white">
        <!-- Logo Left -->
        <a href="/" class="flex items-center gap-3">
            <img src="/assets/index/asset/logo.png" alt="KerjaYok Logo" class="h-10 w-auto object-contain">
            <span class="font-bold text-xl md:text-2xl tracking-wide text-white">KerjaYok</span>
        </a>

        <!-- Desktop Navigation Middle -->
        <div class="hidden md:flex items-center gap-8 text-teal-100 font-medium">
            <a href="/blog" class="text-white border-b-2 border-secondary-fixed pb-1">Blog</a>
            <a href="/tentang-kami" class="hover:text-white transition-colors duration-200">Tentang</a>
            <a href="/pusat-bantuan" class="hover:text-white transition-colors duration-200">Dukungan</a>
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
                <a href="/blog" class="py-2 text-teal-300 font-bold border-b border-teal-300/30 pb-1">Blog</a>
                <a href="/tentang-kami" class="py-2 hover:text-teal-300 transition-colors">Tentang</a>
                <a href="/pusat-bantuan" class="py-2 hover:text-teal-300 transition-colors">Dukungan</a>
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
    <!-- Featured Post Hero -->
    <section class="relative w-full overflow-hidden bg-primary py-xl">
        <div class="absolute inset-0 opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-margin-desktop z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
                <div class="space-y-md">
                    <span class="inline-block px-sm py-1 bg-secondary-fixed text-on-secondary-container rounded-full text-label-md uppercase tracking-wider">Tren Industri</span>
                    <h1 class="text-headline-xl text-on-primary font-headline-xl leading-tight">Navigasi Karir di Era AI: Apa yang Perlu Anda Persiapkan?</h1>
                    <p class="text-on-primary-container text-body-lg max-w-xl">
                        Dunia kerja terus berubah dengan cepat. Temukan strategi jitu untuk tetap relevan dan unggul di tengah gelombang transformasi digital dan kecerdasan buatan.
                    </p>
                    <div class="pt-sm flex items-center gap-md">
                        <button onclick="openFeaturedPost()" class="px-lg py-md bg-secondary text-on-secondary rounded-xl font-bold flex items-center gap-xs hover:bg-secondary-fixed hover:text-on-secondary-container transition-all active:scale-95 shadow-md">
                            Baca Selengkapnya 
                            <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
                        </button>
                        <span class="text-on-primary-container font-label-md flex items-center gap-xs">
                            <span class="material-symbols-outlined text-sm" data-icon="schedule">schedule</span> 8 Menit Membaca
                        </span>
                    </div>
                </div>
                <div class="hidden lg:block relative group cursor-pointer" onclick="openFeaturedPost()">
                    <div class="absolute -inset-2 bg-secondary rounded-xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                    <img class="rounded-xl w-full h-[450px] object-cover shadow-2xl relative transition-transform duration-300 group-hover:scale-[1.01]" alt="A professional woman working on a high-tech laptop in a modern corporate office" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCz1n7yQNt8U3g7jaWFkefOz5V_--Y7H5UyiPHO4uR5_oUHcVy18tNQcSKZeNq4hSDWIRd0AtRyhpcbtXW5mu9MrhE_GqwT2qWVVkz90F98EuudcvufywfgNmmEilC9Y6XSzUUBLLzZ-v9jvW7E14Fz4YRVAfrTRGQpjGJp3Q5F2S2mqrwAcMPaJ2gPxnhI2epvPf2MzLPSpKVIQa7TaLT7VtX18ZB9t1rgRPfrsZk2XMEL0bQqkJcvcIReoCsSlL8WbisrlodebUE">
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Feed & Sidebar -->
    <section class="max-w-7xl mx-auto px-margin-desktop py-xl" id="blog-content-section">
        <div class="flex flex-col lg:flex-row gap-gutter">
            <!-- Main Content: Latest Articles -->
            <div class="lg:w-2/3">
                <div class="flex items-center justify-between mb-lg">
                    <h2 class="text-headline-lg font-headline-lg text-primary">Artikel Terbaru</h2>
                    <div class="flex gap-xs bg-surface-container p-1 rounded-xl">
                        <button id="grid-view-btn" onclick="setViewMode('grid')" class="p-2 bg-surface-container-lowest text-secondary rounded-lg font-bold shadow-sm transition-all focus:outline-none flex items-center justify-center">
                            <span class="material-symbols-outlined" data-icon="grid_view">grid_view</span>
                        </button>
                        <button id="list-view-btn" onclick="setViewMode('list')" class="p-2 text-on-surface-variant hover:text-primary rounded-lg transition-all focus:outline-none flex items-center justify-center">
                            <span class="material-symbols-outlined" data-icon="view_list">view_list</span>
                        </button>
                    </div>
                </div>

                <!-- Articles Container -->
                <div id="articles-container" class="grid grid-cols-1 md:grid-cols-2 gap-gutter transition-all duration-300">
                    <!-- Cards will be populated by JS -->
                </div>

                <!-- Empty State (Hidden by default) -->
                <div id="no-results-state" class="hidden bg-surface-container-lowest border border-outline-variant p-xl rounded-2xl text-center space-y-md my-6">
                    <span class="material-symbols-outlined text-secondary text-5xl">search_off</span>
                    <h3 class="font-headline-md text-primary">Artikel Tidak Ditemukan</h3>
                    <p class="text-on-surface-variant font-body-sm max-w-md mx-auto">Kami tidak dapat menemukan artikel dengan kata kunci tersebut. Coba gunakan kategori populer atau kata kunci lain.</p>
                    <button onclick="resetFilters()" class="px-md py-sm bg-secondary text-on-secondary rounded-lg font-label-md active:scale-95 transition-all">Reset Pencarian</button>
                </div>

                <!-- Pagination -->
                <div id="pagination-container" class="mt-xl flex items-center justify-center gap-sm">
                    <!-- Pagination buttons populated by JS -->
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:w-1/3 space-y-gutter">
                <!-- Search Widget -->
                <div class="bg-surface-container-high p-md rounded-xl space-y-sm">
                    <h4 class="text-label-md font-label-md text-primary uppercase">Cari Artikel</h4>
                    <div class="relative">
                        <input id="search-input" class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg pl-md pr-12 py-sm focus:ring-2 focus:ring-secondary focus:border-transparent transition-all outline-none" placeholder="Kata kunci..." type="text">
                        <span id="search-icon-btn" class="material-symbols-outlined absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant cursor-pointer hover:text-secondary transition-colors" data-icon="search">search</span>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl space-y-md">
                    <h4 class="text-label-md font-label-md text-primary uppercase">Kategori Populer</h4>
                    <div class="flex flex-wrap gap-xs" id="categories-container">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <!-- Trending Posts -->
                <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl space-y-md">
                    <h4 class="text-label-md font-label-md text-primary uppercase">Sedang Ramai</h4>
                    <div class="space-y-md" id="trending-container">
                        <!-- Populated by JS -->
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-secondary/10 py-xl mt-lg">
        <div class="max-w-7xl mx-auto px-margin-desktop text-center space-y-md">
            <h2 class="text-headline-lg font-headline-lg text-primary">Siap Melangkah Lebih Jauh?</h2>
            <p class="text-body-lg text-on-surface-variant max-w-2xl mx-auto">
                Ribuan peluang karir menanti Anda. Daftar sekarang dan biarkan profil Anda ditemukan oleh perusahaan-perusahaan ternama.
            </p>
            <div class="flex justify-center gap-sm">
                <a href="/pilihRole" class="px-xl py-md bg-secondary text-on-secondary rounded-xl font-bold hover:shadow-lg transition-all active:scale-95 text-center flex items-center justify-center">Buat Profil Sekarang</a>
                <a href="/" class="px-xl py-md border-2 border-secondary text-secondary rounded-xl font-bold hover:bg-secondary-container transition-all active:scale-95 text-center flex items-center justify-center">Jelajahi Lowongan</a>
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

<!-- Full Detailed Article Modal -->
<div id="detail-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-primary/40 backdrop-blur-sm transition-opacity duration-300">
    <div class="bg-surface rounded-2xl shadow-2xl max-w-3xl w-full max-h-[85vh] overflow-hidden flex flex-col border border-outline-variant transform scale-95 transition-transform duration-300 relative">
        <!-- Close Button -->
        <button onclick="closeModal()" class="absolute top-4 right-4 z-20 w-10 h-10 bg-white/80 hover:bg-white text-primary rounded-full flex items-center justify-center shadow-md border border-outline-variant hover:scale-105 active:scale-95 transition-all">
            <span class="material-symbols-outlined">close</span>
        </button>

        <!-- Scrollable content -->
        <div class="overflow-y-auto flex-grow">
            <!-- Modal Header Image -->
            <div class="relative h-64 md:h-80 w-full overflow-hidden bg-primary-container">
                <img id="modal-image" src="" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent flex items-end p-md">
                    <span id="modal-category" class="px-sm py-1 bg-secondary text-on-secondary rounded-full text-label-sm font-bold uppercase tracking-wider"></span>
                </div>
            </div>

            <!-- Modal Content Body -->
            <div class="p-md md:p-lg space-y-md">
                <div class="flex items-center justify-between text-body-sm text-on-surface-variant">
                    <span id="modal-date" class="flex items-center gap-1"></span>
                    <span id="modal-read-time" class="flex items-center gap-1"></span>
                </div>
                <h2 id="modal-title" class="text-headline-lg font-headline-lg text-primary leading-tight"></h2>
                
                <hr class="border-outline-variant">

                <div id="modal-body-content" class="prose max-w-none text-on-surface-variant font-body-md leading-relaxed space-y-4 pt-sm">
                    <!-- Populated dynamically -->
                </div>
            </div>
        </div>

        <!-- Modal Footer Actions -->
        <div class="p-md bg-surface-container border-t border-outline-variant flex justify-between items-center">
            <span class="text-body-sm text-on-surface-variant font-medium">Bagikan artikel ini:</span>
            <div class="flex gap-sm">
                <button onclick="shareLink('copy')" class="w-10 h-10 bg-surface-container-lowest text-secondary rounded-lg border border-outline-variant flex items-center justify-center hover:bg-secondary-container transition-colors active:scale-95" title="Salin Tautan">
                    <span class="material-symbols-outlined text-md">link</span>
                </button>
                <button onclick="shareLink('twitter')" class="w-10 h-10 bg-surface-container-lowest text-secondary rounded-lg border border-outline-variant flex items-center justify-center hover:bg-secondary-container transition-colors active:scale-95" title="Bagikan ke X">
                    <span class="material-symbols-outlined text-md">share</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Blog articles data array
    const articles = [
        {
            id: 1,
            title: "Navigasi Karir di Era AI: Apa yang Perlu Anda Persiapkan?",
            category: "Tren Industri",
            date: "15 Jun 2026",
            readTime: "8 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuCz1n7yQNt8U3g7jaWFkefOz5V_--Y7H5UyiPHO4uR5_oUHcVy18tNQcSKZeNq4hSDWIRd0AtRyhpcbtXW5mu9MrhE_GqwT2qWVVkz90F98EuudcvufywfgNmmEilC9Y6XSzUUBLLzZ-v9jvW7E14Fz4YRVAfrTRGQpjGJp3Q5F2S2mqrwAcMPaJ2gPxnhI2epvPf2MzLPSpKVIQa7TaLT7VtX18ZB9t1rgRPfrsZk2XMEL0bQqkJcvcIReoCsSlL8WbisrlodebUE",
            excerpt: "Dunia kerja terus berubah dengan cepat. Temukan strategi jitu untuk tetap relevan dan unggul di tengah gelombang transformasi digital dan kecerdasan buatan.",
            content: `
            <p>Dunia kerja terus berubah dengan cepat. Transformasi digital dan kehadiran Kecerdasan Buatan (AI) telah mengubah lanskap pekerjaan di berbagai industri secara global. Banyak peran yang dahulu dilakukan secara manual kini telah terotomatisasi, namun di saat yang sama, peluang baru yang belum pernah ada sebelumnya pun turut bermunculan.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Bagaimana AI Mengubah Tempat Kerja?</h4>
            <p>Kecerdasan Buatan bukan lagi sekadar masa depan; ia ada di sini hari ini. Dari penulisan kode pemrograman otomatis, pembuatan konten, hingga analisis data keuangan yang rumit, AI membantu meningkatkan produktivitas secara signifikan.</p>
            
            <p>Untuk tetap unggul di era baru ini, Anda harus mempersiapkan beberapa strategi kunci:</p>
            <ul class="list-disc pl-md space-y-xs my-sm">
                <li><strong>Lakukan Upskilling Secara Proaktif</strong>: Pelajari cara berkolaborasi dengan AI, seperti teknik <em>prompt engineering</em> dan analisis data berbasis AI.</li>
                <li><strong>Kembangkan Soft Skills</strong>: Kemampuan seperti empati, kepemimpinan, pemecahan masalah yang kompleks, dan kecerdasan emosional adalah aspek-aspek manusiawi yang tidak bisa ditiru oleh AI.</li>
                <li><strong>Miliki Fleksibilitas Belajar</strong>: Pola pikir pembelajar sepanjang hayat (<em>lifelong learner</em>) menjadi syarat wajib agar Anda dapat beradaptasi dengan alat kerja baru yang terus berkembang setiap tahunnya.</li>
            </ul>
            
            <p>KerjaYok berkomitmen untuk terus menghubungkan Anda dengan perusahaan-perusahaan maju yang menghargai sinergi antara kemampuan manusia dan teknologi modern.</p>
            `
        },
        {
            id: 2,
            title: "5 Cara Efektif Menegosiasikan Gaji Pertama Anda",
            category: "Tips Karir",
            date: "12 Jan 2024",
            readTime: "6 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuAXFC_jN6k09s9q62O5p4vChfDqCRK5CSiUpjDJCDhzwy5kOJ5PmMjFuV51cdi6CKayHpmlyxGq4ku61Wpimc-cn82TCzUNAqtRRijqvJ7wB4SUf7_5Iu6A2xzAS1hUPzjqtbVv9jRk-2D415DMZu2b62Azn9xiNYSPObmVP6oyrBSjliK9Q2KKqnh2Pd_WnrMvQyypZevJXbaSzSBwk_f96oaFzDxCshooX1rUoqhhM0om-08655toVvKplSCaK9Gk3GPhl3RvHbg",
            excerpt: "Menegosiasikan gaji bukan hal yang menakutkan jika Anda tahu strateginya. Pelajari riset pasar hingga teknik komunikasi yang tepat untuk mendapatkan hak Anda.",
            content: `
            <p>Bagi banyak lulusan baru (<em>fresh graduates</em>), menegosiasikan gaji pertama bisa terasa menegangkan dan menakutkan. Rasa takut bahwa tawaran pekerjaan akan ditarik kembali seringkali membuat mereka menerima angka berapa pun yang diajukan oleh perusahaan pertama kali. Namun, menegosiasikan gaji adalah praktik profesional yang sangat wajar.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Strategi Jitu Negosiasi Gaji:</h4>
            <ul class="list-disc pl-md space-y-xs my-sm">
                <li><strong>Lakukan Riset Pasar Terlebih Dahulu</strong>: Gunakan platform seperti KerjaYok untuk membandingkan rata-rata gaji untuk peran serupa di kota Anda dengan tingkat pengalaman yang Anda miliki.</li>
                <li><strong>Fokus pada Nilai yang Anda Berikan</strong>: Jelaskan kontribusi apa yang bisa Anda bawa untuk perusahaan. Sebutkan pencapaian Anda selama magang atau organisasi kampus.</li>
                <li><strong>Gunakan Angka Kisaran yang Fleksibel</strong>: Alih-alih menyebutkan satu angka pasti, berikan rentang gaji (misalnya, Rp 6.000.000 - Rp 7.500.000) dengan batas bawah sebagai angka minimal yang Anda harapkan.</li>
                <li><strong>Pertimbangkan Total Paket Kompensasi</strong>: Negosiasi tidak terbatas pada gaji pokok. Tunjangan kesehatan, subsidi transportasi, opsi kerja remote, dan bonus performa juga memiliki nilai yang signifikan.</li>
            </ul>
            
            <p>Ingatlah bahwa negosiasi adalah diskusi dua arah yang saling menghormati untuk mencari jalan tengah yang memuaskan bagi kedua belah pihak.</p>
            `
        },
        {
            id: 3,
            title: "Pertanyaan Jebakan Saat Interview dan Cara Menjawabnya",
            category: "Wawancara",
            date: "10 Jan 2024",
            readTime: "5 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuAjRbAey22QOdD_Nboy_Qss-xsqXGA7S58Vx5-lA_4VmyrOtfIFm-axoI8iu060ic_62tyF0xN1veGklXr30ilitBtzaK2GVOHeNCD4QaYcqT6ztSQCL4fa8iBcTHCKzUn9rdZNgpQOmH88PEP3z5_DKoT82NY26XAqI0tts0JyPbMmbRIejUZ04QoSBpK66YHj3KpIpmAEya8MPyqm1lYUwhsIdZ2U2A_b8ZGEaiWYL76f4m_nAU5Ol_SzShWklNUj9ZBoiB-ZqJ8",
            excerpt: "\"Apa kelemahan terbesar Anda?\" Simak jawaban cerdas untuk pertanyaan-pertanyaan sulit yang sering muncul di meja wawancara agar Anda terpilih.",
            content: `
            <p>Wawancara kerja dirancang untuk mengenal Anda lebih dalam, tetapi terkadang pewawancara menanyakan pertanyaan yang terasa menjebak. Pertanyaan-pertanyaan ini sebenarnya bertujuan untuk menguji tingkat kesadaran diri (<em>self-awareness</em>), kejujuran, dan bagaimana Anda bereaksi di bawah tekanan.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Pertanyaan Jebakan Klasik & Solusinya:</h4>
            
            <p class="font-bold text-secondary mt-sm">1. "Apa Kelemahan Terbesar Anda?"</p>
            <p class="pl-md"><strong>Tujuan:</strong> Menilai kesadaran diri dan kemauan untuk berkembang.</p>
            <p class="pl-md"><strong>Jawaban Cerdas:</strong> Sebutkan kelemahan nyata yang sedang aktif Anda perbaiki. Misalnya: <em>"Saya kadang kesulitan mengatur prioritas ketika banyak tugas datang bersamaan, tetapi sekarang saya mengatasinya dengan menggunakan aplikasi Trello untuk manajemen tugas harian."</em></p>
            
            <p class="font-bold text-secondary mt-sm">2. "Mengapa Anda Ingin Resign dari Pekerjaan Saat Ini?"</p>
            <p class="pl-md"><strong>Tujuan:</strong> Menilai profesionalisme dan sikap Anda terhadap konflik.</p>
            <p class="pl-md"><strong>Jawaban Cerdas:</strong> Hindari menjelek-jelekkan perusahaan sebelumnya. Fokus pada masa depan dan peluang berkembang: <em>"Saya sangat bersyukur atas pengalaman saya di perusahaan sebelumnya, namun saya mencari tantangan baru di mana saya dapat mengaplikasikan keahlian analisis data saya secara lebih mendalam."</em></p>
            
            <p class="font-bold text-secondary mt-sm">3. "Di Mana Anda Melihat Diri Anda dalam 5 Tahun Ke Depan?"</p>
            <p class="pl-md"><strong>Tujuan:</strong> Mengukur loyalitas dan keselarasan tujuan karir Anda dengan visi perusahaan.</p>
            <p class="pl-md"><strong>Jawaban Cerdas:</strong> Nyatakan minat Anda untuk bertumbuh bersama perusahaan tersebut: <em>"Dalam 5 tahun, saya berharap telah menguasai bidang ini sepenuhnya dan dapat memimpin inisiatif strategis yang berkontribusi langsung pada ekspansi bisnis perusahaan Anda."</em></p>
            `
        },
        {
            id: 4,
            title: "Membangun Networking di LinkedIn Secara Organik",
            category: "Tips Karir",
            date: "08 Jan 2024",
            readTime: "7 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuCZFyKDy2gxplnu25pO3WCE_tDuChbCMxYoJqsf325B83dWHJjHlv-aFeE1ICYID753FV3f1dqLWEaHIeEg9InbxN329TXpvQ79DQ4Y6D6zguBbLSvnUJKdhOUGa3GYqztJpSfWPo2F00UbAGMBrx_HBZOW-RthMtKZBL4viWD3hsJuJCyCaSU_rjKKSF5JdG4Cgp2cAs4g6RjxFQtcLd2VqCWQ8RynMbflgqQRc_udM9K7vCTmr_eZjpiuUwWIdwq8z8aVYZJdUiQ",
            excerpt: "Networking bukan sekadar menambah koneksi. Ketahui etika mengirim pesan dan cara membangun hubungan profesional yang bermakna di LinkedIn.",
            content: `
            <p>Banyak orang berpikir bahwa mencari kerja hanya tentang mengirimkan puluhan CV secara acak. Faktanya, lebih dari 70% lowongan kerja diisi melalui jalur <em>networking</em> atau jaringan profesional. Di era digital saat ini, LinkedIn adalah tempat terbaik untuk membangun koneksi tersebut secara organik.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Langkah Membangun Jaringan LinkedIn:</h4>
            <ul class="list-disc pl-md space-y-xs my-sm">
                <li><strong>Optimalkan Profil Anda Terlebih Dahulu</strong>: Pastikan foto profil Anda profesional, rangkuman profil (<em>summary</em>) menceritakan nilai keahlian Anda, dan daftar riwayat kerja terdokumentasi dengan baik.</li>
                <li><strong>Tulis Pesan Koneksi yang Personal</strong>: Ketika menekan tombol 'Hubungkan' (<em>Connect</em>), jangan kirimkan undangan kosong. Tulis pesan singkat yang menjelaskan mengapa Anda ingin terhubung dengan mereka (misal: memuji artikel yang mereka tulis atau menyatakan kekaguman pada karir mereka).</li>
                <li><strong>Bagikan Konten yang Bermanfaat</strong>: Jangan ragu untuk menulis pemikiran Anda seputar industri yang Anda geluti, membagikan studi kasus yang Anda pelajari, atau mendiskusikan tren terkini. Ini membangun kredibilitas Anda di mata perekrut secara tidak langsung.</li>
            </ul>
            
            <p>Ingat, hubungan profesional dibangun atas rasa saling menghargai dan memberi nilai tambah, bukan sekadar meminta pekerjaan secara instan.</p>
            `
        },
        {
            id: 5,
            title: "Sektor Industri yang Banyak Membuka Lowongan di 2026",
            category: "Tren Industri",
            date: "05 Jan 2024",
            readTime: "6 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuBRtmZ4lur9-5WB1sV8G6SkYtpoWvVI1-iN0sXF8f6fpyxzFN7DI8vhMFkXvzWKAl2IzCTf7SDbTHbGnvIMbW-oAQ5mgf7eYiHvXeIXxL8et5qD9Wr_d0127cwqEhC9SiaKYB34QFPWUYS_VUDrNwibfWl9NtSkSpD6oCtW178UtBKdnxYZ7rhYN3im1ODTtI-xYGpiLtz41jl-ijv3j927cMpaAIB8FJd5hh9aZ2onunhlZIjrI-qtRmhV46_MN-SzzVxLS2n7ZCE",
            excerpt: "Berdasarkan data terkini, sektor teknologi hijau dan kesehatan diprediksi akan terus tumbuh pesat. Cek apakah bidang Anda termasuk di dalamnya.",
            content: `
            <p>Memilih karir di industri yang sedang tumbuh memberikan kepastian keamanan kerja yang lebih tinggi dan potensi kenaikan pendapatan yang lebih cepat. Sepanjang tahun 2026, analisis pasar menunjukkan adanya pergeseran fokus rekrutmen di Indonesia.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Sektor-Sektor yang Sedang Naik Daun:</h4>
            
            <p class="font-bold text-secondary mt-sm">1. Teknologi Hijau (Green Tech) &amp; Energi Terbarukan</p>
            <p class="pl-md">Fokus global pada pengurangan emisi karbon mendorong perusahaan berinvestasi pada energi surya, pengolahan limbah ramah lingkungan, dan kendaraan listrik. Peran seperti insinyur energi terbarukan dan konsultan keberlanjutan (<em>sustainability consultants</em>) sangat diminati.</p>
            
            <p class="font-bold text-secondary mt-sm">2. Kesehatan dan Teknologi Kesehatan (HealthTech)</p>
            <p class="pl-md">Pasca-pandemi, digitalisasi sektor kesehatan berkembang pesat. Telemedisin, sistem informasi rumah sakit, dan bioinformatika membuka peluang besar bagi pengembang perangkat lunak dengan spesialisasi medis.</p>
            
            <p class="font-bold text-secondary mt-sm">3. E-commerce &amp; Logistik Cerdas</p>
            <p class="pl-md">Rantai pasokan (<em>supply chain</em>) yang lebih efisien membutuhkan ahli logistik, analis data rantai pasok, dan pengembang otomatisasi gudang.</p>
            
            <p class="mt-sm">Jika bidang Anda saat ini tidak termasuk, jangan khawatir. Anda selalu dapat mencari celah irisan keahlian Anda (misalnya, menjadi akuntan di perusahaan teknologi hijau) untuk tetap dapat menikmati pertumbuhan sektor ini.</p>
            `
        },
        {
            id: 6,
            title: "Tips Mengatur Portofolio untuk UI/UX Designer",
            category: "Tips Karir",
            date: "03 Jan 2024",
            readTime: "7 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuCEZmy-cv6gZXMrOlLfjLUC2914Crmjr2E127ny1OoITTnyvRxfAcMyEpGcGmTVpM4QDB2075iBRXc8szlTC-pnl8BFZX2T2J7M0kXQjB75jCTJVbKaVB6bnAqhWTRbKbAyiYMsTlVe0vQX-lBUtiyiWi2vUnZcvHWapLdlyJqG5Y5qEz3-Az9Nd1Chf9m4qVta4js2pEVqLfnGSMbewLnCCTHRxN2k2rtUR3sUcRUNtkhfLv28M7Qk0yP8DB_F150jbkmg0BhvWzk",
            excerpt: "Portofolio adalah senjata utama desainer UI/UX. Pelajari cara mengkurasi studi kasus, menampilkan visual yang menarik, dan menjelaskan proses desain Anda.",
            content: `
            <p>Bagi seorang desainer UI/UX, portofolio bukan sekadar galeri gambar visual yang indah. Perekrut dan manajer desain ingin melihat cara Anda memikirkan masalah dan bagaimana solusi desain Anda menjawab kebutuhan pengguna serta bisnis.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Formula Studi Kasus UI/UX yang Menarik:</h4>
            <ul class="list-disc pl-md space-y-xs my-sm">
                <li><strong>Tentukan Ringkasan Proyek</strong>: Jelaskan tantangan utama, peran Anda dalam tim, dan lini masa pengerjaan proyek.</li>
                <li><strong>Gambarkan Proses Riset Pengguna</strong>: Tunjukkan bagaimana Anda memahami pengguna, seperti melalui wawancara, survei, atau pembuatan <em>user persona</em>.</li>
                <li><strong>Visualisasikan Proses Iterasi</strong>: Jangan langsung melompat ke desain final. Tunjukkan <em>wireframe</em> coretan tangan, bagan alur pengguna (<em>user flow</em>), hingga hasil pengujian kegunaan (<em>usability testing</em>) yang membuktikan perbaikan desain Anda.</li>
                <li><strong>Tampilkan Desain Akhir dengan Kualitas Tinggi</strong>: Gunakan mockups beresolusi tinggi dan animasi interaktif jika memungkinkan untuk memamerkan detail antarmuka yang bersih.</li>
            </ul>
            
            <p>Sebuah studi kasus yang ditulis dengan baik jauh lebih bernilai dibanding 10 desain acak tanpa konteks proses di belakangnya.</p>
            `
        },
        {
            id: 7,
            title: "Cara Menjelaskan Gap Year di CV Anda",
            category: "Wawancara",
            date: "01 Jan 2024",
            readTime: "5 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuB69SLsjKlyXSL7fnrsOqBb-dCbdbuakSvi9WdKeDRXbiq6H-ZWivbXsFHOkCV8_8WRdtbEvy8lfvKzhBCu3z5G5opUhNgLnhuDpcjY-Mm8xbHyluifp_Z7yBrmeDWKPP4y2h5tiKDMnpjIu7qoYacAE_1KdG4jRJdFEF6oQQEbzjDpzwO4jPwq_NTOO99aSRhObMQRlWA5iIwql_TWZSALtq5hYcqt4RpIr306NC3n4-R_RydBqfXFpGyO2DksndjYuVhuYWijLic",
            excerpt: "Mengambil waktu istirahat dari karir bukanlah akhir dari segalanya. Ketahui cara mengemas gap year sebagai kelebihan di resume Anda saat melamar.",
            content: `
            <p>Memiliki celah kosong dalam riwayat pekerjaan (<em>gap year</em>) seringkali dianggap sebagai kartu merah bagi pelamar kerja. Namun, jika dijelaskan dengan jujur dan dikemas dengan sudut pandang yang tepat, gap year justru dapat menjadi poin kekuatan Anda.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Cara Menjelaskan Gap Year Secara Profesional:</h4>
            <ol class="list-decimal pl-md space-y-xs my-sm">
                <li><strong>Jujur dan Singkat</strong>: Jangan mencoba menutupi atau berbohong tentang tanggal kerja Anda. Sebutkan alasan umum mengapa Anda beristirahat (seperti merawat anggota keluarga, fokus pada kesehatan diri, atau perjalanan edukatif).</li>
                <li><strong>Soroti Kegiatan Selama Istirahat</strong>: Perekrut ingin tahu bahwa Anda tidak membuang waktu secara sia-sia. Apakah Anda mengambil sertifikasi online? Melakukan kerja lepas (<em>freelancing</em>)? Menjadi sukarelawan?</li>
                <li><strong>Hubungkan Kembali dengan Pekerjaan</strong>: Jelaskan bagaimana pengalaman selama gap year tersebut mempersiapkan Anda untuk kembali bekerja dengan energi baru dan perspektif yang lebih matang.</li>
            </ol>
            
            <p>Setiap orang memiliki perjalanan hidup yang unik, dan perusahaan modern menghargai kandidat yang memiliki kedewasaan untuk mengelola kehidupan pribadi dan profesional mereka secara seimbang.</p>
            `
        },
        {
            id: 8,
            title: "Pentingnya Keseimbangan Kerja (Work-Life Balance)",
            category: "Gaya Hidup Kerja",
            date: "28 Dec 2023",
            readTime: "6 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuAP6kpMKGZLdgMs8Xpt2EJy2zDi7SL-xbyA9EPP1xNOFNGgpOLx0rvWD689v5n-pRXbgz7zWYKXTsCHVHOwUqORyrgLHBWnUqo99lxqQKUDCbgTwVrbt9g4GzlD-1JLz1lvB2scbAQfHIlvgZbkAsaw3fW66geZax7XVywLncJP-b3iXVj9YHPfeB5B83q7DoOTKnGyikKUj8N9Gq0M9pibhvgw5X-0bgo9U9v9wkugTXU7MKEopHZ06W_-z0-oJp3H-fmSjdnf96E",
            excerpt: "Mempertahankan produktivitas tanpa mengorbankan kesehatan mental. Temukan cara menetapkan batasan antara waktu kerja dan waktu pribadi Anda.",
            content: `
            <p>Bekerja dari rumah (<em>work from home</em>) atau pola kerja hybrid menawarkan fleksibilitas yang luar biasa. Namun, ia juga membawa tantangan tersendiri: batas antara dunia kerja dan kehidupan pribadi menjadi sangat kabur. Banyak profesional mendapati diri mereka memeriksa email di malam hari atau bekerja melewati jam kerja resmi.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Langkah Menjaga Batasan Kerja:</h4>
            <ul class="list-disc pl-md space-y-xs my-sm">
                <li><strong>Tetapkan Jam Mulai dan Selesai yang Jelas</strong>: Samakan jam kerja remote Anda dengan jam kantor reguler. Ketika jam kerja selesai, matikan notifikasi aplikasi chat pekerjaan Anda.</li>
                <li><strong>Buat Ruang Kerja Khusus</strong>: Hindari bekerja di atas tempat tidur. Memiliki meja khusus membantu otak Anda menyadari kapan waktunya bekerja dan kapan waktunya bersantai.</li>
                <li><strong>Ambil Istirahat Teratur</strong>: Gunakan teknik Pomodoro (25 menit bekerja, 5 menit istirahat) untuk menyegarkan pikiran dan menjaga mata Anda dari kelelahan menatap layar.</li>
            </ul>
            
            <p>Keseimbangan kerja bukan berarti Anda tidak produktif; sebaliknya, pekerja yang bahagia dan cukup istirahat terbukti menghasilkan kualitas kerja yang jauh lebih baik dalam jangka panjang.</p>
            `
        },
        {
            id: 9,
            title: "Meningkatkan Soft Skills di Tempat Kerja",
            category: "Soft Skills",
            date: "25 Dec 2023",
            readTime: "5 Menit Membaca",
            image: "https://lh3.googleusercontent.com/aida-public/AB6AXuAjRbAey22QOdD_Nboy_Qss-xsqXGA7S58Vx5-lA_4VmyrOtfIFm-axoI8iu060ic_62tyF0xN1veGklXr30ilitBtzaK2GVOHeNCD4QaYcqT6ztSQCL4fa8iBcTHCKzUn9rdZNgpQOmH88PEP3z5_DKoT82NY26XAqI0tts0JyPbMmbRIejUZ04QoSBpK66YHj3KpIpmAEya8MPyqm1lYUwhsIdZ2U2A_b8ZGEaiWYL76f4m_nAU5Ol_SzShWklNUj9ZBoiB-ZqJ8",
            excerpt: "Mengembangkan komunikasi interpersonal, empati, dan kepemimpinan untuk menunjang performa karir profesional Anda secara berkelanjutan.",
            content: `
            <p>Banyak orang terlalu fokus mengasah kemampuan teknis (<em>hard skills</em>), padahal kesuksesan karir jangka panjang sangat dipengaruhi oleh kekuatan <em>soft skills</em> Anda. Kemampuan untuk berkomunikasi dengan efektif, bekerja sama dalam tim, dan beradaptasi adalah apa yang membedakan seorang karyawan biasa dengan pemimpin masa depan.</p>
            
            <h4 class="text-headline-md font-bold text-primary mt-md mb-xs">Soft Skills Utama yang Wajib Ditingkatkan:</h4>
            <ul class="list-disc pl-md space-y-xs my-sm">
                <li><strong>Komunikasi Aktif</strong>: Belajar mendengarkan lebih banyak daripada berbicara. Pastikan Anda menyampaikan argumen Anda secara jelas, ringkas, dan profesional baik lisan maupun tertulis.</li>
                <li><strong>Kecerdasan Emosional (EQ)</strong>: Pahami emosi Anda sendiri dan cobalah berempati terhadap rekan kerja Anda ketika menghadapi situasi penuh tekanan.</li>
                <li><strong>Penyelesaian Masalah (Problem Solving)</strong>: Fokus pada pencarian solusi daripada menyalahkan keadaan ketika sebuah masalah muncul di proyek kerja.</li>
            </ul>
            
            <p>Meningkatkan soft skills memerlukan latihan dan pembiasaan sehari-hari, namun investasinya akan memberikan dampak positif yang sangat besar pada akselerasi karir Anda.</p>
            `
        }
    ];

    // State Variables
    let currentSearch = "";
    let activeCategory = null;
    let currentPage = 1;
    const itemsPerPage = 4;
    let viewMode = "grid"; // 'grid' or 'list'

    // Categories list generated dynamically from data
    const categories = ["Semua Kategori", "Tips Karir", "Tren Industri", "Wawancara", "Gaya Hidup Kerja", "Soft Skills"];

    // Trending articles (ids 6 and 7)
    const trendingIds = [6, 7];

    // DOM Elements
    const searchInput = document.getElementById("search-input");
    const searchIconBtn = document.getElementById("search-icon-btn");
    const articlesContainer = document.getElementById("articles-container");
    const categoriesContainer = document.getElementById("categories-container");
    const trendingContainer = document.getElementById("trending-container");
    const paginationContainer = document.getElementById("pagination-container");
    const noResultsState = document.getElementById("no-results-state");
    
    // Modal Elements
    const detailModal = document.getElementById("detail-modal");
    const modalImage = document.getElementById("modal-image");
    const modalCategory = document.getElementById("modal-category");
    const modalDate = document.getElementById("modal-date");
    const modalReadTime = document.getElementById("modal-read-time");
    const modalTitle = document.getElementById("modal-title");
    const modalBodyContent = document.getElementById("modal-body-content");

    // Initialize application
    document.addEventListener("DOMContentLoaded", () => {
        initCategories();
        initTrending();
        render();

        // Search inputs
        searchInput.addEventListener("input", (e) => {
            currentSearch = e.target.value;
            currentPage = 1; // reset to first page on search
            render();
        });
        
        searchIconBtn.addEventListener("click", () => {
            render();
        });

        // Close modal on escape key
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                closeModal();
            }
        });

        // Setup mobile menu
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
        }
    });

    // Populate Popular Categories
    function initCategories() {
        categoriesContainer.innerHTML = "";
        categories.forEach(cat => {
            const btn = document.createElement("button");
            btn.className = "px-sm py-2 bg-surface-container hover:bg-secondary-container text-on-surface-variant hover:text-secondary rounded-lg font-label-md transition-all active:scale-95";
            btn.textContent = cat;
            
            // Set 'Semua Kategori' as initially highlighted
            if (cat === "Semua Kategori" && activeCategory === null) {
                btn.className += " bg-secondary-container text-secondary font-bold ring-1 ring-secondary";
            }

            btn.onclick = () => {
                if (cat === "Semua Kategori") {
                    activeCategory = null;
                } else {
                    activeCategory = cat;
                }
                
                // Highlight active button
                document.querySelectorAll("#categories-container button").forEach(b => {
                    b.classList.remove("bg-secondary-container", "text-secondary", "font-bold", "ring-1", "ring-secondary");
                });
                
                btn.classList.add("bg-secondary-container", "text-secondary", "font-bold", "ring-1", "ring-secondary");
                currentPage = 1;
                render();
                
                // Smooth scroll to feed section
                document.getElementById("blog-content-section").scrollIntoView({ behavior: 'smooth' });
            };
            categoriesContainer.appendChild(btn);
        });
    }

    // Populate Trending Widget
    function initTrending() {
        trendingContainer.innerHTML = "";
        trendingIds.forEach(id => {
            const article = articles.find(a => a.id === id);
            if (!article) return;

            const link = document.createElement("a");
            link.className = "flex gap-sm group cursor-pointer";
            link.onclick = (e) => {
                e.preventDefault();
                openArticleModal(article.id);
            };

            link.innerHTML = `
                <div class="w-16 h-16 flex-shrink-0 bg-surface-container rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" src="${article.image}" alt="${article.title}">
                </div>
                <div class="space-y-1">
                    <h5 class="text-body-sm font-bold text-primary group-hover:text-secondary transition-colors line-clamp-2 leading-tight">${article.title}</h5>
                    <span class="text-[12px] text-on-surface-variant flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">visibility</span> 2.4k Pembaca
                    </span>
                </div>
            `;
            trendingContainer.appendChild(link);
        });
    }

    // Handle layouts toggle
    function setViewMode(mode) {
        viewMode = mode;
        const gridBtn = document.getElementById("grid-view-btn");
        const listBtn = document.getElementById("list-view-btn");

        if (mode === "grid") {
            gridBtn.classList.add("bg-surface-container-lowest", "text-secondary", "shadow-sm");
            gridBtn.classList.remove("text-on-surface-variant");
            listBtn.classList.remove("bg-surface-container-lowest", "text-secondary", "shadow-sm");
            listBtn.classList.add("text-on-surface-variant");

            articlesContainer.className = "grid grid-cols-1 md:grid-cols-2 gap-gutter transition-all duration-300";
        } else {
            listBtn.classList.add("bg-surface-container-lowest", "text-secondary", "shadow-sm");
            listBtn.classList.remove("text-on-surface-variant");
            gridBtn.classList.remove("bg-surface-container-lowest", "text-secondary", "shadow-sm");
            gridBtn.classList.add("text-on-surface-variant");

            articlesContainer.className = "flex flex-col gap-gutter transition-all duration-300";
        }
        render();
    }

    // Render Articles and Pagination
    function render() {
        // 1. Filter articles by category and search
        let filtered = articles;

        if (activeCategory) {
            filtered = filtered.filter(a => a.category === activeCategory);
        }

        if (currentSearch.trim() !== "") {
            const query = currentSearch.toLowerCase().trim();
            filtered = filtered.filter(a => 
                a.title.toLowerCase().includes(query) || 
                a.excerpt.toLowerCase().includes(query) || 
                a.content.toLowerCase().includes(query)
            );
        }

        // 2. Render articles feed
        articlesContainer.innerHTML = "";
        
        if (filtered.length === 0) {
            noResultsState.classList.remove("hidden");
            paginationContainer.classList.add("hidden");
            return;
        } else {
            noResultsState.classList.add("hidden");
            paginationContainer.classList.remove("hidden");
        }

        // 3. Paginate
        const totalItems = filtered.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        
        // Ensure currentPage is valid
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }
        if (currentPage < 1) {
            currentPage = 1;
        }

        const startIndex = (currentPage - 1) * itemsPerPage;
        const paginatedItems = filtered.slice(startIndex, startIndex + itemsPerPage);

        // 4. Render Cards
        paginatedItems.forEach(article => {
            const card = document.createElement("article");
            
            if (viewMode === "grid") {
                card.className = "bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden hover:shadow-lg transition-all group flex flex-col cursor-pointer";
                card.innerHTML = `
                    <div class="h-48 overflow-hidden relative" onclick="openArticleModal(${article.id})">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="${article.image}" alt="${article.title}">
                    </div>
                    <div class="p-md space-y-xs flex-grow flex flex-col justify-between" onclick="openArticleModal(${article.id})">
                        <div class="space-y-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-label-sm font-label-sm text-secondary bg-secondary-container px-xs py-1 rounded-full">${article.category}</span>
                                <span class="text-body-sm text-on-surface-variant">${article.date}</span>
                            </div>
                            <h3 class="text-headline-md font-headline-md text-primary leading-snug group-hover:text-secondary transition-colors line-clamp-2">${article.title}</h3>
                            <p class="text-body-sm text-on-surface-variant line-clamp-3">${article.excerpt}</p>
                        </div>
                        <div class="pt-sm flex items-center justify-between text-secondary font-bold text-label-sm">
                            <span>Baca Artikel →</span>
                            <span class="text-on-surface-variant font-normal text-[12px] flex items-center gap-0.5">
                                <span class="material-symbols-outlined text-xs">schedule</span> ${article.readTime}
                            </span>
                        </div>
                    </div>
                `;
            } else {
                // List View Card (Horizontal)
                card.className = "bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden hover:shadow-lg transition-all group flex flex-col md:flex-row cursor-pointer";
                card.innerHTML = `
                    <div class="h-48 md:h-auto md:w-2/5 overflow-hidden relative" onclick="openArticleModal(${article.id})">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="${article.image}" alt="${article.title}">
                    </div>
                    <div class="p-md space-y-xs flex-grow flex flex-col justify-between" onclick="openArticleModal(${article.id})">
                        <div class="space-y-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-label-sm font-label-sm text-secondary bg-secondary-container px-xs py-1 rounded-full">${article.category}</span>
                                <span class="text-body-sm text-on-surface-variant">${article.date}</span>
                            </div>
                            <h3 class="text-headline-md font-headline-md text-primary leading-snug group-hover:text-secondary transition-colors line-clamp-2">${article.title}</h3>
                            <p class="text-body-sm text-on-surface-variant line-clamp-3">${article.excerpt}</p>
                        </div>
                        <div class="pt-sm flex items-center justify-between text-secondary font-bold text-label-sm border-t border-outline-variant/50">
                            <span>Baca Artikel →</span>
                            <span class="text-on-surface-variant font-normal text-[12px] flex items-center gap-0.5">
                                <span class="material-symbols-outlined text-xs">schedule</span> ${article.readTime}
                            </span>
                        </div>
                    </div>
                `;
            }

            // Custom hover effects
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-4px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });

            articlesContainer.appendChild(card);
        });

        // 5. Render Pagination controls
        renderPagination(totalPages);
    }

    // Render Pagination Controls
    function renderPagination(totalPages) {
        paginationContainer.innerHTML = "";
        
        if (totalPages <= 1) {
            paginationContainer.classList.add("hidden");
            return;
        } else {
            paginationContainer.classList.remove("hidden");
        }

        // Previous button
        const prevBtn = document.createElement("button");
        prevBtn.className = "w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-on-surface hover:bg-secondary-container transition-colors active:scale-95";
        prevBtn.innerHTML = `<span class="material-symbols-outlined text-md">chevron_left</span>`;
        if (currentPage === 1) {
            prevBtn.disabled = true;
            prevBtn.classList.add("opacity-50", "cursor-not-allowed");
        } else {
            prevBtn.onclick = () => {
                currentPage--;
                render();
                document.getElementById("blog-content-section").scrollIntoView({ behavior: 'smooth' });
            };
        }
        paginationContainer.appendChild(prevBtn);

        // Page buttons
        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement("button");
            pageBtn.className = "w-10 h-10 rounded-lg font-bold transition-all active:scale-95 ";
            pageBtn.textContent = i;
            
            if (i === currentPage) {
                pageBtn.className += "bg-secondary text-on-secondary shadow-md";
            } else {
                pageBtn.className += "border border-outline-variant text-on-surface hover:bg-secondary-container";
                pageBtn.onclick = () => {
                    currentPage = i;
                    render();
                    document.getElementById("blog-content-section").scrollIntoView({ behavior: 'smooth' });
                };
            }
            paginationContainer.appendChild(pageBtn);
        }

        // Next button
        const nextBtn = document.createElement("button");
        nextBtn.className = "w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-on-surface hover:bg-secondary-container transition-colors active:scale-95";
        nextBtn.innerHTML = `<span class="material-symbols-outlined text-md">chevron_right</span>`;
        if (currentPage === totalPages) {
            nextBtn.disabled = true;
            nextBtn.classList.add("opacity-50", "cursor-not-allowed");
        } else {
            nextBtn.onclick = () => {
                currentPage++;
                render();
                document.getElementById("blog-content-section").scrollIntoView({ behavior: 'smooth' });
            };
        }
        paginationContainer.appendChild(nextBtn);
    }

    // Featured Hero click handler
    function openFeaturedPost() {
        openArticleModal(1);
    }

    // Reset all filters
    function resetFilters() {
        searchInput.value = "";
        currentSearch = "";
        activeCategory = null;
        currentPage = 1;
        
        // Reset category button highlight
        document.querySelectorAll("#categories-container button").forEach((b, idx) => {
            b.classList.remove("bg-secondary-container", "text-secondary", "font-bold", "ring-1", "ring-secondary");
            if (idx === 0) { // 'Semua Kategori' is the first child
                b.classList.add("bg-secondary-container", "text-secondary", "font-bold", "ring-1", "ring-secondary");
            }
        });

        render();
    }

    // Modal Operations
    function openArticleModal(id) {
        const article = articles.find(a => a.id === id);
        if (!article) return;

        modalImage.src = article.image;
        modalImage.alt = article.title;
        modalCategory.textContent = article.category;
        
        modalDate.innerHTML = `<span class="material-symbols-outlined text-sm">calendar_month</span> ${article.date}`;
        modalReadTime.innerHTML = `<span class="material-symbols-outlined text-sm">schedule</span> ${article.readTime}`;
        
        modalTitle.textContent = article.title;
        modalBodyContent.innerHTML = article.content;

        // Show Modal
        detailModal.classList.remove("hidden");
        detailModal.classList.add("flex");
        document.body.classList.add("modal-active");
        
        // Add zoom anim
        setTimeout(() => {
            detailModal.firstElementChild.classList.remove("scale-95");
            detailModal.firstElementChild.classList.add("scale-100");
        }, 50);
    }

    function closeModal() {
        detailModal.firstElementChild.classList.remove("scale-100");
        detailModal.firstElementChild.classList.add("scale-95");
        
        setTimeout(() => {
            detailModal.classList.remove("flex");
            detailModal.classList.add("hidden");
            document.body.classList.remove("modal-active");
        }, 150);
    }

    // Share simulated links
    function shareLink(platform) {
        const url = window.location.href;
        if (platform === 'copy') {
            navigator.clipboard.writeText(url).then(() => {
                alert("Tautan artikel berhasil disalin ke papan klip!");
            });
        } else if (platform === 'twitter') {
            const tweet = encodeURIComponent(`Membaca artikel menarik: "${modalTitle.textContent}" di KerjaYok!`);
            window.open(`https://twitter.com/intent/tweet?text=${tweet}&url=${encodeURIComponent(url)}`, '_blank');
        }
    }
</script>
</body>
</html>
