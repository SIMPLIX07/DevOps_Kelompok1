<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tentang KerjaYok | Career Velocity</title>
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
        .hero-gradient {
            background: linear-gradient(135deg, #00182a 0%, #004d4b 100%);
        }
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 24, 42, 0.05), 0 2px 4px -1px rgba(0, 24, 42, 0.03);
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md text-body-md flex flex-col min-h-screen">
<!-- TopNavBar (Sama persis dengan Navbar Index) -->
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
            <a href="/tentang-kami" class="text-white border-b-2 border-secondary-fixed pb-1">Tentang</a>
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
                <a href="/blog" class="py-2 hover:text-teal-300 transition-colors">Blog</a>
                <a href="/tentang-kami" class="py-2 text-teal-300 font-bold border-b border-teal-300/30 pb-1">Tentang</a>
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
<!-- Hero Section (POV Perusahaan) -->
<section class="hero-gradient text-surface-container-lowest py-xl px-margin-mobile md:px-margin-desktop overflow-hidden relative">
<div class="max-w-7xl mx-auto relative z-10 flex flex-col md:flex-row items-center gap-xl">
<div class="md:w-1/2 space-y-md">
<h1 class="font-headline-xl text-headline-xl leading-tight">Mempercepat Perekrutan & Pertumbuhan Bisnis Anda</h1>
<p class="font-body-lg text-body-lg text-surface-variant opacity-90 max-w-xl">KerjaYok lebih dari sekadar portal lowongan kerja biasa. Kami membangun ekosistem rekrutmen cerdas berbasis AI yang dirancang untuk memotong administrasi yang lambat, mempertemukan bisnis Anda dengan talenta-talenta terbaik secara instan, aman, dan efisien.</p>
<div class="flex flex-wrap gap-md pt-base">
<a href="#visi-misi" class="bg-[#319795] text-white px-8 py-3 rounded-xl font-label-md text-label-md font-bold hover:brightness-110 transition-all shadow-lg text-center flex items-center justify-center">Misi Rekrutmen</a>
<a href="/register/perusahaan" class="border border-secondary-fixed text-secondary-fixed px-8 py-3 rounded-xl font-label-md text-label-md font-bold hover:bg-secondary-fixed/10 transition-all text-center flex items-center justify-center">Mulai Merekrut</a>
</div>
</div>
<div class="md:w-1/2 relative">
<div class="bg-surface-container-lowest/10 backdrop-blur-md p-base rounded-2xl border border-surface-container-lowest/20">
<img alt="Team collaborating" class="rounded-xl w-full h-80 object-cover shadow-2xl" data-alt="A professional team of diverse individuals in a high-tech modern office space, collaborating over laptops and digital displays. The lighting is bright and airy, emphasizing a light mode aesthetic with clean whites and teal accents. The atmosphere is energetic and focused, capturing the essence of career velocity and professional innovation in a corporate tech environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAP6kpMKGZLdgMs8Xpt2EJy2zDi7SL-xbyA9EPP1xNOFNGgpOLx0rvWD689v5n-pRXbgz7zWYKXTsCHVHOwUqORyrgLHBWnUqo99lxqQKUDCbgTwVrbt9g4GzlD-1JLz1lvB2scbAQfHIlvgZbkAsaw3fW66geZax7XVywLncJP-b3iXVj9YHPfeB5B83q7DoOTKnGyikKUj8N9Gq0M9pibhvgw5X-0bgo9U9v9wkugTXU7MKEopHZ06W_-z0-oJp3H-fmSjdnf96E"/>
</div>
</div>
</div>
<!-- Decorative Element -->
<div class="absolute -right-20 -bottom-20 w-96 h-96 bg-secondary opacity-10 rounded-full blur-3xl"></div>
</section>

<!-- Our Story (POV Perusahaan) -->
<section class="py-xl px-margin-mobile md:px-margin-desktop bg-surface">
<div class="max-w-7xl mx-auto">
<div class="grid grid-cols-1 md:grid-cols-2 gap-xl items-center">
<div class="order-2 md:order-1">
<div class="grid grid-cols-2 gap-md">
<div class="space-y-md mt-lg">
<div class="bg-white p-base rounded-2xl card-shadow border border-outline-variant">
<img alt="Meeting room" class="rounded-xl h-48 w-full object-cover" data-alt="A modern, minimalist meeting room with floor-to-ceiling glass walls, looking out over a metropolitan skyline at midday. The interior is decorated in neutral tones with crisp teal furniture accents. The scene reflects transparency and professional clarity, perfectly aligned with a corporate light mode design language." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDM-50vp3tQQxbI0GaKjTxrlSngUX606IR1375Ltg8_FkFAghJJcfNlZwc7vNC4HM_9HsCpTyx-PZSac40wKPgj98ryhyCL0OU7iJvmnHn8Ujtf4MrkKjCT_S4xhlpAhfz_yHmjYtnOA0ik9N6uxZ9zfXEFGWNdaw_DIefslQfCkGuEZLNrkAJSU3yx2SAwTpNoJjFSuqftm2JDgsAhUtSLZmDu0g2V5kCyAkUvzoxIiIAYOCQeQvwXUV0y_LGipN8sCm5OEh6_few"/>
</div>
<div class="bg-white p-base rounded-2xl card-shadow border border-outline-variant">
<img alt="Workspace" class="rounded-xl h-40 w-full object-cover" data-alt="A clean and organized modern office workspace with high-end tech equipment and ergonomic design. The lighting is natural and soft, illuminating a space that feels productive and sophisticated. The color palette features whites, light grays, and deep navy blue details, embodying professional reliability and momentum." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbvwT2hdp3hlvTSiM2RMEMg2mX3rea5kYFQuLBTBNzqQEF3R810PFFGXFuuHqdnD4TmLQQhlht8rnHdfP3zAymUmDjItVAw_4a6mTMErBjlJH2sleAmprm0zSKdLdTHbOCpqFEgdMCkg7OKP_-JkgOl7vuOU1ew1JR1VrxE4NdQ_056seSAK9scIW8TplD54azVqjySUo1dEZ8EoswCg3fVTfkPv7JuLM0dwTC_D4kYZ0C89xrAqXGbNVqOiaNwruMIOG3ICMHYUM"/>
</div>
</div>
<div class="space-y-md">
<div class="bg-white p-base rounded-2xl card-shadow border border-outline-variant">
<img alt="Collaboration" class="rounded-xl h-64 w-full object-cover" data-alt="Close-up shot of professional colleagues shaking hands in a bright, sunlit office atrium. The focus is on the positive interaction and mutual trust, with a background of blurred green plants and sleek architectural lines. The lighting is warm yet professional, highlighting themes of integrity and community growth." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_NDNWOmhrNWu0HSsVZ2UEE0R97m4U441EsSBv8mQx9j2TKSEZfklGgAei27YUpk0FiYYChdvs6OuOCNgl6e9vWarusjma8O6pMJsEA2vWWaZeK-rFscCqJ6q5XgvTmojpGOm2ICLDTPsaJGpiO7g2bViR9ipxMRnG5fLUTnlcgqZvx-F5UgVgDiiroH_0CnA1e1O8MeCLTW_Mq-Ew0bBAGwFPpFqN_aI8YsmPfL57RJ-OnH43JWzJTpJkJPJytY0Xq2UZ-DqccVo"/>
</div>
</div>
</div>
</div>
<div class="order-1 md:order-2 space-y-md">
<span class="text-secondary font-label-md text-label-md tracking-widest uppercase">The Genesis</span>
<h2 class="font-headline-lg text-headline-lg text-primary">Bagaimana KerjaYok Membantu Perusahaan</h2>
<p class="text-on-surface-variant font-body-md text-body-md">Didirikan pada tahun 2024, KerjaYok lahir dari sebuah keresahan umum para rekruter: proses penyaringan kandidat secara konvensional memakan waktu berminggu-minggu, padahal dinamika bisnis menuntut pergerakan cepat. Kami merancang platform ATS (Applicant Tracking System) cerdas untuk menyelesaikan masalah ini.</p>
<p class="text-on-surface-variant font-body-md text-body-md">Kami menghubungkan langsung kebutuhan spesifik perusahaan dengan kumpulan talenta terverifikasi yang dilengkapi portofolio digital nyata, menyederhanakan siklus rekrutmen mulai dari pemasangan lowongan hingga koordinasi jadwal wawancara.</p>
<div class="flex items-center gap-md pt-base">
<div class="flex flex-col">
<span class="font-headline-md text-headline-md font-bold text-primary">
    {{ $penempatanCount >= 1000 ? number_format($penempatanCount / 1000, 0) . 'k+' : $penempatanCount }}
</span>
<span class="text-on-surface-variant font-body-sm text-body-sm">Talenta Tersalurkan</span>
</div>
<div class="h-10 w-[1px] bg-outline-variant"></div>
<div class="flex flex-col">
<span class="font-headline-md text-headline-md font-bold text-primary">
    {{ $perusahaanCount }}+
</span>
<span class="text-on-surface-variant font-body-sm text-body-sm">Mitra Bisnis Terdaftar</span>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Vision and Mission (POV Perusahaan) -->
<section id="visi-misi" class="py-xl px-margin-mobile md:px-margin-desktop bg-surface-container-low">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-lg">
<div class="bg-white p-xl rounded-[16px] border border-outline-variant card-shadow flex flex-col gap-md">
<div class="w-12 h-12 bg-secondary-container rounded-lg flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined">visibility</span>
</div>
<h3 class="font-headline-md text-headline-md text-primary">Visi Kami</h3>
<p class="text-on-surface-variant">Menjadi platform rekrutmen utama yang memberdayakan perusahaan untuk menemukan, menyaring, dan memperkerjakan talenta-talenta profesional terbaik secara global tanpa hambatan administratif.</p>
</div>
<div class="bg-white p-xl rounded-[16px] border border-outline-variant card-shadow flex flex-col gap-md">
<div class="w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center text-secondary-fixed">
<span class="material-symbols-outlined">rocket_launch</span>
</div>
<h3 class="font-headline-md text-headline-md text-primary">Misi Kami</h3>
<p class="text-on-surface-variant">Memberdayakan tim HRD dan pemilik bisnis melalui otomatisasi Applicant Tracking System (ATS), skrining portofolio yang transparan, dan data rekrutmen yang valid.</p>
</div>
</div>
</section>

<!-- Core Values: Bento Grid (POV Perusahaan) -->
<section class="py-xl px-margin-mobile md:px-margin-desktop bg-white">
<div class="max-w-7xl mx-auto">
<div class="text-center mb-xl">
<h2 class="font-headline-lg text-headline-lg text-primary mb-base">Nilai-Nilai Inti Rekrutmen Kami</h2>
<p class="text-on-surface-variant max-w-2xl mx-auto">Prinsip yang memandu kami dalam menyempurnakan alur kerja HRD perusahaan Anda.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-md">
<!-- Value 1: Innovation -->
<div class="md:col-span-1 bg-surface-container-lowest border border-outline-variant rounded-2xl p-md card-shadow flex flex-col justify-between group hover:border-secondary transition-colors">
<div>
<span class="material-symbols-outlined text-secondary text-4xl mb-md">lightbulb</span>
<h4 class="font-headline-md text-headline-md text-primary mb-sm">Inovasi Sistem</h4>
<p class="text-on-surface-variant font-body-sm text-body-sm">Kami terus mengiterasi sistem rekomendasi pencocokan lowongan dengan teknologi cerdas kami agar perusahaan Anda selalu mendapatkan usulan kandidat yang paling relevan dengan kualifikasi proyek.</p>
</div>
<div class="mt-lg pt-lg border-t border-outline-variant text-secondary font-label-md text-label-md group-hover:translate-x-2 transition-transform cursor-pointer">Eksplorasi Fitur ATS →</div>
</div>
<!-- Value 2: Integrity (Bigger) -->
<div class="md:col-span-1 bg-primary text-surface-container-lowest rounded-2xl p-md flex flex-col justify-between relative overflow-hidden">
<div class="relative z-10">
<span class="material-symbols-outlined text-secondary-fixed text-4xl mb-md">verified_user</span>
<h4 class="font-headline-md text-headline-md mb-sm">Integritas Kandidat</h4>
<p class="opacity-80 font-body-sm text-body-sm">Kami memverifikasi validitas data CV, informasi portofolio, dan identitas pelamar secara berkala guna menjamin keaslian profil pelamar yang masuk ke database perusahaan Anda.</p>
</div>
<div class="mt-lg pt-lg border-t border-surface-container-lowest/20 font-label-md text-label-md">Komitmen Keamanan Data</div>
<div class="absolute -right-10 -bottom-10 w-40 h-40 bg-secondary/20 rounded-full blur-2xl"></div>
</div>
<!-- Value 3: Velocity -->
<div class="md:col-span-1 bg-surface-container-lowest border border-outline-variant rounded-2xl p-md card-shadow flex flex-col justify-between group hover:border-secondary transition-colors">
<div>
<span class="material-symbols-outlined text-secondary text-4xl mb-md">bolt</span>
<h4 class="font-headline-md text-headline-md text-primary mb-sm">Kecepatan Skrining</h4>
<p class="text-on-surface-variant font-body-sm text-body-sm">Kami memotong siklus manual perekrutan konvensional hingga 70%. Proses pemasangan lowongan hingga koordinasi interview berjalan secara mulus dalam hitungan klik.</p>
</div>
<div class="mt-lg pt-lg border-t border-outline-variant text-secondary font-label-md text-label-md group-hover:translate-x-2 transition-transform cursor-pointer">Pelajari Metodologi Efisiensi →</div>
</div>
</div>
</div>
</section>

<!-- Team/Culture (POV Perusahaan) -->
<section class="py-xl px-margin-mobile md:px-margin-desktop bg-surface-container">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-xl">
<div class="md:w-1/2 space-y-md">
<h2 class="font-headline-lg text-headline-lg text-primary">Solusi Rekrutmen Komprehensif</h2>
<p class="text-on-surface-variant font-body-lg text-body-lg">Di KerjaYok, kami mendesain lingkungan rekrutmen digital yang nyaman bagi HRD. Dapatkan kendali penuh untuk menyaring kandidat terbaik dan pantau seluruh proses secara transparan.</p>
<div class="space-y-sm">
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-body-md text-body-md">Sistem Kelola Karyawan & Pelamar Terpusat</span>
</div>
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-body-md text-body-md">Skrining CV & Portofolio yang Transparan</span>
</div>
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-body-md text-body-md">Integrasi Penjadwalan Wawancara Efisien</span>
</div>
</div>
</div>
<div class="md:w-1/2 grid grid-cols-2 gap-sm">
<div class="space-y-sm">
<img alt="Culture 1" class="rounded-xl h-64 w-full object-cover shadow-md" data-alt="A group of young professionals laughing together in a modern communal office space with large windows and indoor plants. The scene is bright and highlights a friendly, collaborative culture. The image style is professional and crisp, with a balanced light mode color palette that emphasizes social connection and growth." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGPLCkL8twXW0sUuCJNJON9RxK3nMyWSpsmHWIrpnx-_nGuXi-cpRQJ4Q2W_G2lYiOjZZN0wUf_nfFJae3ySVbkx_dqaFK8NDlh8WoXs463eB05n5ZMAliRjKHk6h3ZKqA4x95NGvoiBXJOb2wEVjmoiHQY37W1BJTb13ivVjFAo_4LfdFMWsPkCFoNNmK1SvXqVynmj_5jRdYe8LyHKXBTGEVufevWwYf8fd0xo5mkYagPPoF927pdguP3BSrkexzUlX2leJW_pU"/>
<img alt="Culture 2" class="rounded-xl h-48 w-full object-cover shadow-md" data-alt="Modern workspace with people working together on a large wooden table, using laptops and whiteboards. The office design is minimalist with high ceilings and industrial elements. The lighting is high-key and natural, creating a clean, professional aesthetic that communicates efficiency and shared goals in a modern tech company." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA39sERJm2lSdmLsfjtJTA4xEf7_TNMUWK2lLR667ycFr4FEcf8v6cgOdNd7S_H3YuDsB02e_3hXcckyLxfYHDcbMSmklr6NSSzZUxbMy_6vnUvbRZh9kXIm1pJ3Q7n9CKbaVb3m3Q0iDZvaGWhEQn7xoXbUQQOHekkg8AqpMnu4jv-Ag9TaX-e3oMaVbtocpx8h2OWM8ONf4H1dpBNxU-Dw_218zstRfHKc0W6PoGvmPl-5vRG_aYwNbPSDlY6SmJs-53p7QCahdY"/>
</div>
<div class="space-y-sm pt-lg">
<img alt="Culture 3" class="rounded-xl h-64 w-full object-cover shadow-md" data-alt="Corporate event with professionals engaging in networking and lively discussions. The background is a sleek, modern hall with teal lighting accents. The image focus is on dynamic interactions and career movement, using a sophisticated color palette of whites, deep blues, and teal highlights to represent the KerjaYok brand identity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxrMZWferGseLHQxiZk_8E6KPsijvmkeae3orcIh96pJ75CKI1eNQCN2ZDy1g4KkY8WDI7-Qh3ChNKA_x9qeVwcYq24YCxt-o56jLcGWEjoXIIl0pLB66PhTkPeVAlNuN_6RmDGTrHG4z_aYwpa5wxA_J0MlcXRO-13FSXwOSSMC8xLBkRiavc7T7qi98v-ZvT6W6Zxp_bTM1Wb_p2QEcfRy16bHFmb1yQ2-xvbAkJZjsGGcGN4EKnixDLoIR--rAzYFL2fvh8Z20"/>
</div>
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
</script>
</body>
</html>
