<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pengaturan Akun Pelamar - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Manrope:wght@100..900&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary": "#000000",
                        "on-secondary-fixed": "#00201f",
                        "primary-container": "#041d2f",
                        "on-error-container": "#93000a",
                        "outline-variant": "#c3c7cd",
                        "on-primary-container": "#7b95ae",
                        "surface-container-low": "#f1f4f6",
                        "background": "#f7fafc",
                        "on-tertiary-fixed": "#04201d",
                        "secondary-fixed": "#a0f1ed",
                        "primary-fixed": "#cee5fe",
                        "on-secondary-container": "#006e6d",
                        "tertiary-container": "#04201d",
                        "surface": "#f7fafc",
                        "surface-dim": "#d7dadc",
                        "primary": "#000000",
                        "on-error": "#ffffff",
                        "surface-variant": "#e0e3e5",
                        "primary-fixed-dim": "#b2c9e1",
                        "tertiary-fixed": "#cbe8e4",
                        "surface-container-highest": "#e0e3e5",
                        "on-surface": "#181c1e",
                        "error": "#ba1a1a",
                        "on-tertiary-fixed-variant": "#324b49",
                        "error-container": "#ffdad6",
                        "surface-container-high": "#e5e9eb",
                        "secondary-container": "#a0f1ed",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#33495d",
                        "on-surface-variant": "#43474c",
                        "surface-bright": "#f7fafc",
                        "inverse-surface": "#2d3133",
                        "on-tertiary-container": "#6e8986",
                        "on-primary": "#ffffff",
                        "inverse-primary": "#b2c9e1",
                        "outline": "#73777d",
                        "on-primary-fixed": "#041d2f",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed-dim": "#84d4d1",
                        "secondary": "#006a68",
                        "on-tertiary": "#ffffff",
                        "inverse-on-surface": "#eef1f3",
                        "tertiary-fixed-dim": "#b0ccc8",
                        "surface-tint": "#4b6175",
                        "on-background": "#181c1e",
                        "on-secondary-fixed-variant": "#00504e",
                        "surface-container": "#ebeef0"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xs": "8px",
                        "xl": "64px",
                        "margin-mobile": "16px",
                        "md": "24px",
                        "margin-desktop": "48px",
                        "sm": "16px",
                        "lg": "40px",
                        "gutter": "24px",
                        "base": "4px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-lg-mobile": ["Manrope"],
                        "body-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-md": ["Manrope"],
                        "headline-lg": ["Manrope"],
                        "headline-xl": ["Manrope"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "14px",
                            "fontWeight": "500"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "700"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }],
                        "headline-xl": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .active-glow {
            box-shadow: 0 0 15px rgba(160, 241, 237, 0.3);
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-md overflow-x-hidden">
    <div id="sidebar-backdrop"
        class="fixed inset-0 z-30 bg-black/40 backdrop-blur-sm hidden md:hidden transition-opacity duration-300 opacity-0">
    </div>

    <!-- TopNavBar -->
    <header class="bg-surface-container-lowest shadow-sm h-20 flex items-center">
        <div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop w-full">
            <div class="flex items-center gap-md md:gap-xl">
                <!-- Hamburger button for mobile setting sidebar -->
                <button id="mobile-menu-btn"
                    class="md:hidden material-symbols-outlined text-on-surface-variant hover:bg-surface-container p-2 rounded-full transition-all">menu</button>
                <a href="{{ route('home') }}"
                    class="text-headline-md font-headline-md font-bold text-on-surface">KerjaKuy</a>
                <nav class="hidden md:flex items-center gap-lg">
                    <a class="font-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="{{ route('home') }}">Lowongan Kerja</a>
                    <a class="font-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
                    <a class="font-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="{{ route('pelamar.wawancara') }}">Wawancara</a>
                    <a class="font-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="{{ url('/bookmark') }}">Bookmark</a>
                </nav>
            </div>
            <div class="flex items-center gap-md">
                <button
                    class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container p-2 rounded-full transition-all">notifications</button>
                <div
                    class="h-10 w-10 rounded-full border border-outline-variant overflow-hidden cursor-pointer hover:ring-2 hover:ring-secondary/20 transition-all">
                    <img alt="User Profile" class="w-full h-full object-cover"
                        src="{{ $pelamar->foto_profil ? asset('storage/' . $pelamar->foto_profil) : 'https://cdn-icons-png.flaticon.com/512/847/847969.png' }}" />
                </div>
            </div>
        </div>
    </header>


    <main class="w-full flex min-h-[calc(100vh-80px)] relative">
        <!-- Sidebar Navigation -->
        <aside
            class="fixed inset-y-0 left-0 z-40 w-72 bg-primary-container dark:bg-on-primary-fixed flex flex-col pt-lg pb-xl transform -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0 md:transform-none shrink-0">

            <div class="px-md mb-lg flex items-center justify-between shrink-0">
                <h2 class="text-headline-md font-headline-md text-white px-base">Pengaturan</h2>
                <button id="close-sidebar-btn"
                    class="md:hidden material-symbols-outlined text-white hover:bg-white/10 p-2 rounded-full transition-all">close</button>
            </div>

            {{-- Area scroll --}}
            <div class="flex-1 overflow-y-auto flex flex-col min-h-0">
                <nav class="flex-1 space-y-base px-sm">
                    <!-- Mobile Main Nav Links -->
                    <div class="md:hidden border-b border-white/10 pb-sm mb-sm px-sm space-y-base">
                        <p class="text-white/40 text-label-sm px-md mb-xs font-bold uppercase tracking-wider">Navigasi
                        </p>
                        <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all"
                            href="{{ route('home') }}">
                            <span class="material-symbols-outlined">work</span>
                            <span class="font-label-md text-label-md">Lowongan Kerja</span>
                        </a>
                        <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all"
                            href="{{ url('/lamaran-anda') }}">
                            <span class="material-symbols-outlined">assignment</span>
                            <span class="font-label-md text-label-md">Lamaran Anda</span>
                        </a>
                        <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all"
                            href="{{ route('pelamar.wawancara') }}">
                            <span class="material-symbols-outlined">forum</span>
                            <span class="font-label-md text-label-md">Wawancara</span>
                        </a>
                        <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all"
                            href="{{ url('/bookmark') }}">
                            <span class="material-symbols-outlined">bookmark</span>
                            <span class="font-label-md text-label-md">Bookmark</span>
                        </a>
                    </div>

                    <!-- Akun (Active) -->
                    <a class="flex items-center gap-sm px-md py-sm rounded-lg bg-secondary text-white font-bold transition-all active:scale-95"
                        href="{{ route('pelamar.settings') }}">
                        <span class="material-symbols-outlined">person</span>
                        <span class="font-label-md text-label-md">Akun</span>
                    </a>
                    <!-- CV -->
                    <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all active:scale-95"
                        href="{{ route('cv.index') }}">
                        <span class="material-symbols-outlined">description</span>
                        <span class="font-label-md text-label-md">CV</span>
                    </a>
                    <!-- Portofolio -->
                    <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all active:scale-95"
                        href="{{ route('portofolio.index') }}">
                        <span class="material-symbols-outlined">work</span>
                        <span class="font-label-md text-label-md">Portofolio</span>
                    </a>
                    <!-- Keamanan -->
                    <button type="button" id="btnKeamanan"
                        class="flex w-full items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all active:scale-95 text-left">
                        <span class="material-symbols-outlined">lock</span>
                        <span class="font-label-md text-label-md">Keamanan</span>
                    </button>
                </nav>

                {{-- Tombol bahaya di bawah, tetap ikut scroll --}}
                <div class="px-sm flex flex-col gap-2 pt-md pb-xl shrink-0">
                    <button type="button" id="btnHapusAkun"
                        class="flex w-full items-center gap-sm px-md py-sm rounded-lg text-error hover:bg-error/10 transition-all active:scale-95 text-left">
                        <span class="material-symbols-outlined">delete</span>
                        <span class="font-label-md text-label-md">Hapus Akun</span>
                    </button>
                    <form action="{{ route('pelamar.logout') }}" method="POST" id="logoutForm" class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center gap-sm px-md py-sm rounded-lg text-error hover:bg-error/10 transition-all active:scale-95 text-left">
                            <span class="material-symbols-outlined">logout</span>
                            <span class="font-label-md text-label-md">Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <section class="flex-1 bg-surface py-lg px-margin-mobile md:py-xl md:px-margin-desktop overflow-y-auto">
            <div class="max-w-3xl">
                <header class="mb-lg border-b border-outline-variant/30 pb-md">
                    <h1 class="text-headline-lg font-headline-lg text-on-surface">Akun</h1>
                    <p class="text-on-surface-variant font-body-sm mt-xs">Kelola informasi profil dan pengaturan akun
                        Anda.</p>
                </header>

                <!-- Banners/Messages -->
                @if (session('success'))
                    <div
                        class="mb-lg p-md bg-secondary/10 border border-secondary/30 text-secondary rounded-xl flex items-center gap-sm">
                        <span class="material-symbols-outlined text-secondary">check_circle</span>
                        <span class="font-body-sm">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('success_password'))
                    <div
                        class="mb-lg p-md bg-secondary/10 border border-secondary/30 text-secondary rounded-xl flex items-center gap-sm">
                        <span class="material-symbols-outlined text-secondary">check_circle</span>
                        <span class="font-body-sm">{{ session('success_password') }}</span>
                    </div>
                @endif

                @if ($errors->any() && !session('openPasswordModal'))
                    <div
                        class="mb-lg p-md bg-error/10 border border-error/30 text-error rounded-xl flex flex-col gap-xs">
                        <div class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-error">error</span>
                            <span class="font-label-md font-bold">Terjadi kesalahan:</span>
                        </div>
                        <ul class="list-disc list-inside text-body-sm pl-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pelamar.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Profile Photo Section -->
                    <div
                        class="bg-surface-container-lowest border border-outline-variant/20 rounded-xl p-md shadow-sm mb-lg flex flex-col sm:flex-row items-center text-center sm:text-left gap-md sm:gap-lg">
                        <div class="relative group flex-shrink-0">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-md cursor-pointer"
                                onclick="document.getElementById('inputFoto').click()">
                                <img id="profile-preview" alt="Profile Photo" class="w-full h-full object-cover"
                                    src="{{ $pelamar->foto_profil ? asset('storage/' . $pelamar->foto_profil) : 'https://cdn-icons-png.flaticon.com/512/847/847969.png' }}" />
                            </div>
                            <button type="button" onclick="document.getElementById('inputFoto').click()"
                                class="absolute bottom-0 right-0 bg-secondary text-white p-2 rounded-full shadow-lg hover:scale-110 transition-transform active:scale-90 flex items-center justify-center">
                                <span class="material-symbols-outlined text-[18px]">edit</span>
                            </button>
                            <input type="file" name="foto_profil" id="inputFoto" class="hidden"
                                onchange="previewImg()" />
                        </div>
                        <div>
                            <h3 class="text-headline-md font-headline-md text-on-surface">Foto Profil</h3>
                            <p class="text-on-surface-variant font-body-sm">Format PNG, JPG max. 2MB</p>
                        </div>
                    </div>

                    <!-- Form Fields Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                        <!-- Nama Lengkap -->
                        <div class="space-y-xs group">
                            <label class="text-label-md font-label-md text-on-surface-variant px-base">Nama
                                Lengkap</label>
                            <div class="relative">
                                <input name="nama_lengkap"
                                    class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                                    type="text" value="{{ old('nama_lengkap', $pelamar->nama_lengkap) }}" />
                                <button type="button"
                                    class="edit-btn absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline hover:text-secondary transition-colors cursor-pointer">edit</button>
                            </div>
                        </div>
                        <!-- Keahlian -->
                        <div class="space-y-xs group">
                            <label class="text-label-md font-label-md text-on-surface-variant px-base">Keahlian
                                (Pisahkan dengan koma)</label>
                            <div class="relative">
                                <input name="keahlian"
                                    class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                                    type="text" value="{{ old('keahlian', $keahlianString) }}" />
                                <button type="button"
                                    class="edit-btn absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline hover:text-secondary transition-colors cursor-pointer">edit</button>
                            </div>
                        </div>
                        <!-- Username -->
                        <div class="space-y-xs group">
                            <label class="text-label-md font-label-md text-on-surface-variant px-base">Username</label>
                            <div class="relative">
                                <input name="username"
                                    class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                                    type="text" value="{{ old('username', $pelamar->username) }}" />
                                <button type="button"
                                    class="edit-btn absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline hover:text-secondary transition-colors cursor-pointer">edit</button>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="space-y-xs group">
                            <label class="text-label-md font-label-md text-on-surface-variant px-base">Email</label>
                            <div class="relative">
                                <input name="email"
                                    class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                                    type="email" value="{{ old('email', $pelamar->email) }}" />
                                <button type="button"
                                    class="edit-btn absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline hover:text-secondary transition-colors cursor-pointer">edit</button>
                            </div>
                        </div>
                        <!-- No. Telfon -->
                        <div class="space-y-xs group">
                            <label class="text-label-md font-label-md text-on-surface-variant px-base">No.
                                Telfon</label>
                            <div class="relative">
                                <input name="no_telp"
                                    class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                                    type="tel" value="{{ old('no_telp', $pelamar->no_telp) }}" />
                                <button type="button"
                                    class="edit-btn absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline hover:text-secondary transition-colors cursor-pointer">edit</button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-xl flex flex-col-reverse sm:flex-row justify-end gap-sm sm:gap-md">
                        <a href="{{ route('pelamar.settings') }}"
                            class="flex items-center justify-center w-full sm:w-auto px-lg h-12 rounded-lg font-label-md text-on-surface-variant hover:bg-surface-container transition-all">Batalkan</a>
                        <button type="submit"
                            class="w-full sm:w-auto px-lg h-12 bg-secondary text-white rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-primary dark:bg-tertiary-container border-t border-outline-variant/20">
        <div
            class="flex flex-col md:flex-row justify-between items-center px-margin-mobile md:px-margin-desktop py-lg w-full">
            <span class="text-headline-sm font-headline-sm text-white mb-md md:mb-0">KerjaKuy</span>
            <div class="flex flex-wrap justify-center gap-md mb-md md:mb-0">
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Tentang Kami</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Pusat Bantuan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Ketentuan Layanan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Kebijakan Privasi</a>
            </div>
            <p class="font-label-md text-label-md text-surface-variant">© 2024 KerjaKuy. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer -->
    <footer class="bg-primary dark:bg-tertiary-container border-t border-outline-variant/20">
        <div
            class="flex flex-col md:flex-row justify-between items-center px-margin-mobile md:px-margin-desktop py-lg w-full">
            <span class="text-headline-sm font-headline-sm text-white mb-md md:mb-0">KerjaYok</span>
            <div class="flex flex-wrap justify-center gap-md mb-md md:mb-0">
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Tentang Kami</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Pusat Bantuan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Ketentuan Layanan</a>
                <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline"
                    href="#">Kebijakan Privasi</a>
            </div>
            <p class="font-label-md text-label-md text-surface-variant">© 2024 KerjaYok. All rights reserved.</p>
        </div>
    </footer>

    <!-- Ubah Password Modal -->
    <div id="passwordModal"
        class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm {{ session('openPasswordModal') ? 'flex' : 'hidden' }}">
        <div
            class="bg-surface-container-lowest p-lg rounded-xl shadow-xl w-full max-w-md mx-margin-mobile md:mx-0 relative flex flex-col border border-outline-variant/30">
            <!-- Close Button -->
            <button type="button" id="closePasswordModalBtn"
                class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>

            <h2
                class="text-headline-md font-headline-md text-on-surface mb-lg border-b border-outline-variant/30 pb-xs">
                Ubah Password</h2>

            <form action="{{ route('pelamar.updatePassword') }}" method="POST" class="space-y-md">
                @csrf
                <!-- Password Lama -->
                <div class="space-y-xs">
                    <label class="text-label-md font-label-md text-on-surface-variant px-base">Password Lama</label>
                    <div class="relative">
                        <input type="password" name="password_lama" data-password-input
                            class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                            required />
                        <button type="button" data-toggle-password
                            class="absolute right-0 top-0 h-12 w-12 flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container cursor-pointer transition-colors rounded"
                            aria-label="Tampilkan password" tabindex="-1">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                    @error('password_lama')
                        <p class="text-error font-body-sm px-base mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Baru -->
                <div class="space-y-xs">
                    <label class="text-label-md font-label-md text-on-surface-variant px-base">Password Baru (Min. 8
                        karakter)</label>
                    <div class="relative">
                        <input type="password" name="password_baru" data-password-input
                            class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                            required />
                        <button type="button" data-toggle-password
                            class="absolute right-0 top-0 h-12 w-12 flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container cursor-pointer transition-colors rounded"
                            aria-label="Tampilkan password" tabindex="-1">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                    @error('password_baru')
                        <p class="text-error font-body-sm px-base mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password Baru -->
                <div class="space-y-xs">
                    <label class="text-label-md font-label-md text-on-surface-variant px-base">Konfirmasi Password
                        Baru</label>
                    <div class="relative">
                        <input type="password" name="password_baru_confirmation" data-password-input
                            class="w-full h-12 px-md pr-12 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface"
                            required />
                        <button type="button" data-toggle-password
                            class="absolute right-0 top-0 h-12 w-12 flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container cursor-pointer transition-colors rounded"
                            aria-label="Tampilkan password" tabindex="-1">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                </div>

                <div class="pt-md flex justify-end gap-md">
                    <button type="button" id="cancelPasswordModalBtn"
                        class="px-lg h-12 rounded-lg font-label-md text-on-surface-variant hover:bg-surface-container transition-all">Batal</button>
                    <button type="submit"
                        class="px-lg h-12 bg-secondary text-white rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95">Simpan
                        Password</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hapus Akun Modal -->
    <div id="deleteAccountModal"
        class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden">
        <div
            class="bg-surface-container-lowest p-lg rounded-xl shadow-xl w-full max-w-md mx-margin-mobile md:mx-0 relative flex flex-col border border-outline-variant/30">
            <!-- Close Button -->
            <button type="button" id="closeDeleteModalBtn"
                class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>

            <div class="w-12 h-12 bg-error/10 text-error rounded-full flex items-center justify-center mb-md">
                <span class="material-symbols-outlined text-[32px]">warning</span>
            </div>

            <h2 class="text-headline-md font-headline-md text-on-surface mb-xs">Hapus Akun</h2>
            <p class="text-on-surface-variant font-body-sm mb-lg border-b border-outline-variant/30 pb-md">
                Apakah Anda yakin ingin menghapus akun ini? Tindakan ini <strong class="text-error">tidak dapat
                    dibatalkan</strong> dan seluruh data profil, lamaran, CV, serta portofolio Anda akan dihapus secara
                permanen.
            </p>

            <form action="{{ route('pelamar.destroy') }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex justify-end gap-md">
                    <button type="button" id="cancelDeleteModalBtn"
                        class="px-lg h-12 rounded-lg font-label-md text-on-surface-variant hover:bg-surface-container transition-all">Batal</button>
                    <button type="submit"
                        class="px-lg h-12 bg-error text-white rounded-lg font-label-md shadow-md hover:bg-opacity-90 transition-all active:scale-95">Ya,
                        Hapus Akun</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Micro-interaction for input fields focus state glow
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('active-glow');
            });
            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('active-glow');
            });
        });

        // Edit button clicks to focus corresponding input fields
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const input = btn.previousElementSibling;
                if (input) {
                    input.focus();
                }
            });
        });

        // Live preview of uploaded profile image
        function previewImg() {
            const fileInput = document.querySelector('#inputFoto');
            const previewImg = document.querySelector('#profile-preview');
            if (fileInput.files && fileInput.files[0]) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(fileInput.files[0]);
                fileReader.onload = (e) => {
                    previewImg.src = e.target.result;
                }
            }
        }

        // Modal controllers
        const passwordModal = document.getElementById('passwordModal');
        const btnKeamanan = document.getElementById('btnKeamanan');
        const closePasswordModalBtn = document.getElementById('closePasswordModalBtn');
        const cancelPasswordModalBtn = document.getElementById('cancelPasswordModalBtn');

        const deleteAccountModal = document.getElementById('deleteAccountModal');
        const btnHapusAkun = document.getElementById('btnHapusAkun');
        const closeDeleteModalBtn = document.getElementById('closeDeleteModalBtn');
        const cancelDeleteModalBtn = document.getElementById('cancelDeleteModalBtn');

        // Toggle Password Modal
        if (btnKeamanan) {
            btnKeamanan.addEventListener('click', () => {
                passwordModal.classList.remove('hidden');
                passwordModal.classList.add('flex');
            });
        }
        if (closePasswordModalBtn) {
            closePasswordModalBtn.addEventListener('click', () => {
                passwordModal.classList.add('hidden');
                passwordModal.classList.remove('flex');
            });
        }
        if (cancelPasswordModalBtn) {
            cancelPasswordModalBtn.addEventListener('click', () => {
                passwordModal.classList.add('hidden');
                passwordModal.classList.remove('flex');
            });
        }

        // Toggle Delete Account Modal
        if (btnHapusAkun) {
            btnHapusAkun.addEventListener('click', () => {
                deleteAccountModal.classList.remove('hidden');
                deleteAccountModal.classList.add('flex');
            });
        }
        if (closeDeleteModalBtn) {
            closeDeleteModalBtn.addEventListener('click', () => {
                deleteAccountModal.classList.add('hidden');
                deleteAccountModal.classList.remove('flex');
            });
        }
        if (cancelDeleteModalBtn) {
            cancelDeleteModalBtn.addEventListener('click', () => {
                deleteAccountModal.classList.add('hidden');
                deleteAccountModal.classList.remove('flex');
            });
        }

        // Close modal when clicking outside form container
        window.addEventListener('click', (e) => {
            if (e.target === passwordModal) {
                passwordModal.classList.add('hidden');
                passwordModal.classList.remove('flex');
            }
            if (e.target === deleteAccountModal) {
                deleteAccountModal.classList.add('hidden');
                deleteAccountModal.classList.remove('flex');
            }
        });

        // Toggle Password Visibility
        document.querySelectorAll('[data-toggle-password]').forEach(toggleBtn => {
            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const passwordInput = toggleBtn.closest('.relative').querySelector('[data-password-input]');
                const icon = toggleBtn.querySelector('.material-symbols-outlined');

                if (passwordInput) {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.textContent = 'visibility_off';
                        toggleBtn.setAttribute('aria-label', 'Sembunyikan password');
                    } else {
                        passwordInput.type = 'password';
                        icon.textContent = 'visibility';
                        toggleBtn.setAttribute('aria-label', 'Tampilkan password');
                    }
                }
            });
        });

        // Mobile Sidebar Drawer Toggle Logic
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeSidebarBtn = document.getElementById('close-sidebar-btn');
        const sidebar = document.querySelector('aside');
        const backdrop = document.getElementById('sidebar-backdrop');

        function openSidebar() {
            if (sidebar && backdrop) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                }, 10);
            }
        }

        function closeSidebar() {
            if (sidebar && backdrop) {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('opacity-0');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', openSidebar);
        }
        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', closeSidebar);
        }
        if (backdrop) {
            backdrop.addEventListener('click', closeSidebar);
        }
    </script>
</body>

</html>
