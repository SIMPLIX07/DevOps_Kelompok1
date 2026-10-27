<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KerjaYok - Temukan Pekerjaan Impian Anda</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-tr from-[#1FACA2] to-[#000E3A] text-white min-h-screen font-sans overflow-x-hidden antialiased">
    <!-- Navbar -->
    <nav class="mt-6 md:mt-10 mx-6 md:mx-16 flex justify-between items-center relative z-50">
        <!-- Logo Left -->
        <div class="flex items-center gap-3">
            <img src="/assets/index/asset/logo.png" alt="KerjaYok Logo" class="h-10 md:h-12 w-auto object-contain">
            <span class="font-bold text-xl md:text-2xl tracking-wide">KerjaYok</span>
        </div>

        <!-- Desktop Navigation Middle -->
        <div class="hidden md:flex items-center gap-8 text-teal-100 font-medium">
            <a href="/blog" class="hover:text-white transition-colors duration-200">Blog</a>
            <a href="/tentang-kami" class="hover:text-white transition-colors duration-200">Tentang</a>
            <a href="/pusat-bantuan" class="hover:text-white transition-colors duration-200">Dukungan</a>
        </div>

        <!-- Desktop Actions Right -->
        <div class="hidden md:flex items-center gap-6">
            <a href="/pilihRole" class="hover:text-teal-200 font-medium transition-colors duration-200">Daftar</a>
            
            <!-- Login Dropdown -->
            <div class="relative group py-2">
                <button class="bg-white/20 hover:bg-white/30 border border-white/40 px-6 py-2 rounded-full font-semibold transition-all duration-200 cursor-pointer flex items-center gap-1">
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
        <div id="mobile-menu" class="hidden absolute top-full left-0 right-0 mt-4 p-6 bg-[#000E3A]/95 backdrop-blur-lg border border-white/10 rounded-2xl flex-col gap-6 shadow-2xl z-50 transition-all duration-300">
            <div class="flex flex-col gap-4 text-center font-medium">
                <a href="/blog" class="py-2 hover:text-teal-300 transition-colors">Blog</a>
                <a href="/tentang-kami" class="py-2 hover:text-teal-300 transition-colors">Tentang</a>
                <a href="/pusat-bantuan" class="py-2 hover:text-teal-300 transition-colors">Dukungan</a>
            </div>
            <hr class="border-white/10">
            <div class="flex flex-col gap-4">
                <a href="/pilihRole" class="w-full py-3 bg-white/10 hover:bg-white/20 text-center rounded-xl font-semibold transition-all">Daftar</a>
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

    <!-- Hero Section -->
    <div class="min-h-[70vh] md:min-h-[80vh] flex flex-col justify-center items-center text-center px-6 -mt-16 md:-mt-24">
        <h1 class="text-6xl sm:text-7xl md:text-[100px] font-black tracking-tight mb-4 bg-clip-text text-transparent bg-gradient-to-r from-white via-teal-200 to-white leading-none">
            KerjaYok
        </h1>
        <p class="text-xl sm:text-2xl font-light text-teal-100 opacity-95 tracking-wide max-w-lg leading-relaxed">
            Tempat anda menemukan <br class="hidden sm:inline"> pekerjaan impian anda
        </p>
    </div>

    <!-- Tentang Kami Section -->
    <div class="bg-white text-gray-900 py-16 px-6 sm:px-12 md:py-24 lg:px-40">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12 md:gap-16">
            <!-- Text Content -->
            <div class="w-full md:w-7/12 flex flex-col gap-6 text-left">
                <h2 class="font-extrabold text-3xl md:text-4xl text-gray-900 tracking-tight">Tentang Kami</h2>
                <p class="text-base md:text-lg text-gray-600 leading-relaxed">
                    Kami Menyediakan Platform Untuk Menemukan Pekerjaan Impian Anda, Dengan Langkah Langkah Yang Mudah dan Praktis.
                </p>
                <a href="/tentang-kami" class="bg-teal-500 hover:bg-teal-600 font-semibold px-6 py-3 text-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 w-fit cursor-pointer text-center block">
                    Lebih Banyak
                </a>
            </div>
            <!-- Image -->
            <div class="w-full sm:w-8/12 md:w-5/12 rounded-2xl shadow-xl overflow-hidden">
                <img class="w-full h-auto object-cover hover:scale-105 transition-transform duration-300 rounded-2xl" src="/assets/index/asset/person.jpg" alt="Tentang KerjaYok">
            </div>
        </div>
    </div>

    <!-- Akses Penuh Section -->
    <div class="w-full py-16 px-6 sm:px-12 md:py-24 lg:px-40">
        <div class="max-w-7xl mx-auto">
            <h3 class="text-center font-bold text-3xl md:text-4xl mb-12 tracking-tight">Akses Penuh</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
                <!-- Card 1 -->
                <div class="w-full bg-white/5 backdrop-blur-sm p-6 border border-white/10 rounded-2xl flex flex-col gap-4 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="border border-white/20 rounded-full w-12 h-12 flex items-center justify-center bg-white/10">
                        <img src="/assets/index/asset/briefcase.svg" alt="Briefcase Icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-xl font-bold mb-1">Kemudahan</p>
                        <p class="text-teal-100/70 text-sm leading-relaxed">Proses melamar yang instan dan mudah.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="w-full bg-white/5 backdrop-blur-sm p-6 border border-white/10 rounded-2xl flex flex-col gap-4 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="border border-white/20 rounded-full w-12 h-12 flex items-center justify-center bg-white/10">
                        <img src="/assets/index/asset/envelope.svg" alt="Envelope Icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-xl font-bold mb-1">Lowongan</p>
                        <p class="text-teal-100/70 text-sm leading-relaxed">Ribuan info lowongan terupdate setiap hari.</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="w-full bg-white/5 backdrop-blur-sm p-6 border border-white/10 rounded-2xl flex flex-col gap-4 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="border border-white/20 rounded-full w-12 h-12 flex items-center justify-center bg-white/10">
                        <img src="/assets/index/asset/marker.svg" alt="Marker Icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-xl font-bold mb-1">Lokasi</p>
                        <p class="text-teal-100/70 text-sm leading-relaxed">Cari pekerjaan di sekitar Anda dengan peta terintegrasi.</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="w-full bg-white/5 backdrop-blur-sm p-6 border border-white/10 rounded-2xl flex flex-col gap-4 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="border border-white/20 rounded-full w-12 h-12 flex items-center justify-center bg-white/10">
                        <img src="/assets/index/asset/assessment.svg" alt="Assessment Icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-xl font-bold mb-1">Status</p>
                        <p class="text-teal-100/70 text-sm leading-relaxed">Pantau langsung status lamaran Anda secara real-time.</p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="w-full bg-white/5 backdrop-blur-sm p-6 border border-white/10 rounded-2xl flex flex-col gap-4 hover:bg-white/10 hover:border-white/20 transition-all duration-300 sm:col-span-2 lg:col-span-1 max-w-md lg:max-w-none">
                    <div class="border border-white/20 rounded-full w-12 h-12 flex items-center justify-center bg-white/10">
                        <img src="/assets/index/asset/calendar.svg" alt="Calendar Icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-xl font-bold mb-1">Jadwal</p>
                        <p class="text-teal-100/70 text-sm leading-relaxed">Kelola jadwal interview terintegrasi dengan Google Calendar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimoni Section -->
    <div class="bg-white text-gray-900 py-16 px-6 sm:px-12 md:py-24 lg:px-40">
        <div class="max-w-7xl mx-auto">
            <h3 class="text-center font-bold text-3xl md:text-4xl mb-12 tracking-tight">Testimoni</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-items-center">
                <!-- Testimonial 1 -->
                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl flex flex-col gap-4 shadow-sm hover:shadow-md transition-all duration-200 w-full">
                    <div class="flex items-center gap-4">
                        <img src="/assets/index/asset/mengamuk.png" alt="Avatar Jefri" class="rounded-full w-14 h-14 object-cover border-2 border-teal-500 shadow-inner">
                        <div>
                            <p class="font-bold text-gray-800 text-lg">Jefri Owen</p>
                            <div class="flex text-amber-500 gap-0.5 text-lg">
                                @for ($i = 0; $i < 5; $i++)
                                    <span>★</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Design Bersih Mencari Lamaran Pekerjaan Jadi Lebih Mudah Mantap Deh Pokoknya"</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl flex flex-col gap-4 shadow-sm hover:shadow-md transition-all duration-200 w-full">
                    <div class="flex items-center gap-4">
                        <img src="/assets/index/asset/mengamuk.png" alt="Avatar Jefri" class="rounded-full w-14 h-14 object-cover border-2 border-teal-500 shadow-inner">
                        <div>
                            <p class="font-bold text-gray-800 text-lg">Jefri Owen</p>
                            <div class="flex text-amber-500 gap-0.5 text-lg">
                                @for ($i = 0; $i < 5; $i++)
                                    <span>★</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Design Bersih Mencari Lamaran Pekerjaan Jadi Lebih Mudah Mantap Deh Pokoknya"</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl flex flex-col gap-4 shadow-sm hover:shadow-md transition-all duration-200 w-full">
                    <div class="flex items-center gap-4">
                        <img src="/assets/index/asset/mengamuk.png" alt="Avatar Jefri" class="rounded-full w-14 h-14 object-cover border-2 border-teal-500 shadow-inner">
                        <div>
                            <p class="font-bold text-gray-800 text-lg">Jefri Owen</p>
                            <div class="flex text-amber-500 gap-0.5 text-lg">
                                @for ($i = 0; $i < 5; $i++)
                                    <span>★</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Design Bersih Mencari Lamaran Pekerjaan Jadi Lebih Mudah Mantap Deh Pokoknya"</p>
                </div>

                <!-- Testimonial 4 -->
                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl flex flex-col gap-4 shadow-sm hover:shadow-md transition-all duration-200 w-full">
                    <div class="flex items-center gap-4">
                        <img src="/assets/index/asset/mengamuk.png" alt="Avatar Jefri" class="rounded-full w-14 h-14 object-cover border-2 border-teal-500 shadow-inner">
                        <div>
                            <p class="font-bold text-gray-800 text-lg">Jefri Owen</p>
                            <div class="flex text-amber-500 gap-0.5 text-lg">
                                @for ($i = 0; $i < 5; $i++)
                                    <span>★</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Design Bersih Mencari Lamaran Pekerjaan Jadi Lebih Mudah Mantap Deh Pokoknya"</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Copyright -->
    <footer class="bg-[#000E3A]/60 py-8 text-center text-sm text-teal-200/40 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p>&copy; 2026 KerjaYok. Hubungkan Karir Anda dengan Kecepatan.</p>
            <div class="flex gap-6">
                <a href="/tentang-kami" class="hover:text-teal-300 transition-colors">Tentang Kami</a>
                <a href="/blog" class="hover:text-teal-300 transition-colors">Blog</a>
                <a href="/pusat-bantuan" class="hover:text-teal-300 transition-colors">Pusat Bantuan</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle logic
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
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
    </script>
</body>

</html>
