@php
    $pelamar = \App\Models\Pelamar::find(session('pelamar_id'));
@endphp
<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Daftar Portofolio - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Manrope:wght@100..900&amp;display=swap" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}]
            }
          },
        },
      }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md">
<!-- TopNavBar -->
<header class="sticky top-0 z-50 bg-surface-container-lowest shadow-sm h-20 flex items-center shrink-0">
    <div class="flex justify-between items-center px-margin-desktop w-full">
        <div class="flex items-center gap-xl">
            <a href="{{ route('home') }}" class="text-headline-md font-headline-md font-bold text-on-surface">KerjaYok</a>
            <nav class="hidden md:flex items-center gap-lg">
                <a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('home') }}">Lowongan Kerja</a>
                <a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
                <a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('pelamar.wawancara') }}">Wawancara</a>
            </nav>
        </div>
        <div class="flex items-center gap-md">
            <button class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container p-2 rounded-full transition-all">notifications</button>
            <div class="h-10 w-10 rounded-full border border-outline-variant overflow-hidden cursor-pointer hover:ring-2 hover:ring-secondary/20 transition-all">
                <img alt="User Profile" class="w-full h-full object-cover" src="{{ $pelamar->foto_profil ? asset('storage/' . $pelamar->foto_profil) : 'https://cdn-icons-png.flaticon.com/512/847/847969.png' }}"/>
            </div>
        </div>
    </div>
</header>

<main class="w-full flex min-h-[calc(100vh-80px)]">
    <!-- Sidebar Navigation -->
    <aside class="w-72 bg-primary-container dark:bg-on-primary-fixed flex flex-col pt-lg pb-xl shrink-0">
        <div class="px-md mb-lg">
            <h2 class="text-headline-md font-headline-md text-white px-base">Pengaturan</h2>
        </div>
        <nav class="flex-1 space-y-base px-sm">
            <!-- Akun -->
            <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all active:scale-95" href="{{ route('pelamar.settings') }}">
                <span class="material-symbols-outlined">person</span>
                <span class="font-label-md text-label-md">Akun</span>
            </a>
            <!-- CV -->
            <a class="flex items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all active:scale-95" href="{{ route('cv.index') }}">
                <span class="material-symbols-outlined">description</span>
                <span class="font-label-md text-label-md">CV</span>
            </a>
            <!-- Portofolio (Active) -->
            <a class="flex items-center gap-sm px-md py-sm rounded-lg bg-secondary text-white font-bold transition-all active:scale-95" href="{{ route('portofolio.index') }}">
                <span class="material-symbols-outlined">work</span>
                <span class="font-label-md text-label-md">Portofolio</span>
            </a>
            <!-- Keamanan -->
            <button type="button" id="btnKeamanan" class="flex w-full items-center gap-sm px-md py-sm rounded-lg text-on-primary-container hover:bg-white/5 transition-all active:scale-95 text-left">
                <span class="material-symbols-outlined">lock</span>
                <span class="font-label-md text-label-md">Keamanan</span>
            </button>
        </nav>
        <div class="mt-auto px-sm flex flex-col gap-2">
            <!-- Hapus Akun -->
            <button type="button" id="btnHapusAkun" class="flex w-full items-center gap-sm px-md py-sm rounded-lg text-error hover:bg-error/10 transition-all active:scale-95 text-left">
                <span class="material-symbols-outlined">delete</span>
                <span class="font-label-md text-label-md">Hapus Akun</span>
            </button>
            <!-- Keluar -->
            <form action="{{ route('pelamar.logout') }}" method="POST" id="logoutForm" class="w-full">
                @csrf
                <button type="submit" class="flex w-full items-center gap-sm px-md py-sm rounded-lg text-error hover:bg-error/10 transition-all active:scale-95 text-left">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="font-label-md text-label-md">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <section class="flex-1 bg-surface py-xl px-margin-desktop overflow-y-auto">
        <div class="max-w-3xl">
            <header class="mb-lg border-b border-outline-variant/30 pb-md flex justify-between items-center">
                <div>
                    <h1 class="text-headline-lg font-headline-lg text-on-surface">Daftar Portofolio</h1>
                    <p class="text-on-surface-variant font-body-sm mt-xs">Kelola proyek portofolio Anda untuk memikat perusahaan.</p>
                </div>
                <a href="{{ route('portofolio.create') }}" class="flex items-center justify-center px-lg h-12 bg-secondary text-white rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95 !no-underline">
                    + Tambah Portofolio
                </a>
            </header>

            <!-- Banners/Messages -->
            @if (session('success'))
                <div class="mb-lg p-md bg-secondary/10 border border-secondary/30 text-secondary rounded-xl flex items-center gap-sm">
                    <span class="material-symbols-outlined text-secondary">check_circle</span>
                    <span class="font-body-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div x-data="portofolioModal()" class="space-y-4">
                <div class="flex flex-col gap-sm">
                    @forelse ($portofolios as $p)
                        <div @click="openDetail(@js($p))"
                            class="cursor-pointer w-full bg-surface-container-lowest border border-outline-variant/20 px-6 py-4 rounded-xl flex justify-between items-center hover:border-secondary hover:shadow-sm hover:bg-secondary/5 transition-all duration-300">

                            <div class="flex items-center gap-sm">
                                <div class="w-12 h-12 rounded-xl bg-secondary/10 text-secondary flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-[28px]">folder</span>
                                </div>
                                <div>
                                    <p class="font-headline-md text-lg font-bold text-on-surface">{{ $p->judul }}</p>
                                    <p class="text-on-surface-variant font-body-sm">{{ $p->kategori ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-sm" @click.stop>
                                <a href="{{ route('portofolio.edit', $p->id) }}"
                                    class="flex items-center justify-center px-5 h-10 bg-secondary text-white rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95 text-sm !no-underline">
                                    Edit
                                </a>

                                <form action="{{ route('portofolio.destroy', $p->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center justify-center px-5 h-10 bg-error text-white rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95 text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-lg bg-surface-container-lowest border border-outline-variant/20 rounded-xl text-center">
                            <span class="material-symbols-outlined text-[48px] text-outline mb-sm">folder_open</span>
                            <p class="text-on-surface-variant font-body-md">Belum ada portofolio yang dibuat. Silakan tambahkan portofolio baru.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Detail Modal -->
                <div x-show="showDetail" x-cloak x-transition
                    class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-[1050] p-margin-mobile">

                    <div class="bg-surface-container-lowest w-full max-w-2xl rounded-xl p-6 shadow-2xl relative flex flex-col border border-outline-variant/30 max-h-[90vh] overflow-y-auto" @click.outside="closeAll()">
                        <!-- Close Button -->
                        <button @click="closeAll()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface">
                            <span class="material-symbols-outlined">close</span>
                        </button>

                        <!-- Header -->
                        <h2 class="text-headline-md font-headline-md font-bold text-secondary mb-xs pr-8" x-text="portofolio.judul"></h2>
                        <p class="text-on-surface-variant font-body-sm mb-md pb-xs border-b border-outline-variant/30" x-text="portofolio.kategori ?? '-'"></p>

                        <!-- Info Utama -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-sm text-body-sm mt-2">
                            <div class="py-2 border-b border-surface-container-low flex justify-between">
                                <span class="font-label-sm text-on-surface-variant">Teknologi</span>
                                <span class="font-semibold text-on-surface" x-text="portofolio.teknologi ?? '-'"></span>
                            </div>
                            <div class="py-2 border-b border-surface-container-low flex justify-between">
                                <span class="font-label-sm text-on-surface-variant">Tanggal</span>
                                <span class="font-semibold text-on-surface" x-text="(portofolio.tanggal_mulai ?? '-') + ' s/d ' + (portofolio.tanggal_selesai ?? '-')"></span>
                            </div>
                            <div class="py-2 border-b border-surface-container-low flex flex-col gap-1 col-span-2">
                                <span class="font-label-sm text-on-surface-variant">Link Demo</span>
                                <span class="font-semibold text-on-surface">
                                    <template x-if="portofolio.link_demo">
                                        <a :href="portofolio.link_demo" target="_blank" class="text-secondary hover:underline flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                                            <span x-text="portofolio.link_demo"></span>
                                        </a>
                                    </template>
                                    <template x-if="!portofolio.link_demo">
                                        <span>-</span>
                                    </template>
                                </span>
                            </div>
                            <div class="py-2 border-b border-surface-container-low flex flex-col gap-1 col-span-2">
                                <span class="font-label-sm text-on-surface-variant">Link Repository</span>
                                <span class="font-semibold text-on-surface">
                                    <template x-if="portofolio.link_repo">
                                        <a :href="portofolio.link_repo" target="_blank" class="text-secondary hover:underline flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[16px]">code</span>
                                            <span x-text="portofolio.link_repo"></span>
                                        </a>
                                    </template>
                                    <template x-if="!portofolio.link_repo">
                                        <span>-</span>
                                    </template>
                                </span>
                            </div>
                            <div class="col-span-2 py-2 flex flex-col gap-1 mb-lg">
                                <span class="font-label-sm text-on-surface-variant">Deskripsi Project</span>
                                <span class="text-on-surface font-body-sm bg-surface-container-low p-md rounded-lg whitespace-pre-wrap" x-text="portofolio.deskripsi ?? '-'"></span>
                            </div>
                        </div>

                        <!-- Close -->
                        <button @click="closeAll()"
                            class="w-full bg-secondary text-white py-3 rounded-lg font-label-md hover:opacity-90 active:scale-95 transition-all shadow-md shrink-0">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-primary dark:bg-tertiary-container border-t border-outline-variant/20 shrink-0">
    <div class="flex flex-col md:flex-row justify-between items-center px-margin-desktop py-lg w-full">
        <span class="text-headline-sm font-headline-sm text-white mb-md md:mb-0">KerjaYok</span>
        <div class="flex flex-wrap justify-center gap-md mb-md md:mb-0">
            <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline" href="#">Tentang Kami</a>
            <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline" href="#">Pusat Bantuan</a>
            <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline" href="#">Ketentuan Layanan</a>
            <a class="font-label-md text-label-md text-surface-variant hover:text-white transition-colors hover:underline" href="#">Kebijakan Privasi</a>
        </div>
        <p class="font-label-md text-label-md text-surface-variant">© 2024 KerjaYok. All rights reserved.</p>
    </div>
</footer>

<!-- Ubah Password Modal -->
<div id="passwordModal" class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden p-margin-mobile">
    <div class="bg-surface-container-lowest p-lg rounded-xl shadow-xl w-full max-w-md mx-margin-mobile md:mx-0 relative flex flex-col border border-outline-variant/30">
        <!-- Close Button -->
        <button type="button" id="closePasswordModalBtn" class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface">
            <span class="material-symbols-outlined">close</span>
        </button>
        
        <h2 class="text-headline-md font-headline-md text-on-surface mb-lg border-b border-outline-variant/30 pb-xs">Ubah Password</h2>
        
        <form action="{{ route('pelamar.updatePassword') }}" method="POST" class="space-y-md">
            @csrf
            <div class="space-y-xs">
                <label class="text-label-md font-label-md text-on-surface-variant px-base">Password Lama</label>
                <input type="password" name="password_lama" class="w-full h-12 px-md bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface" required/>
            </div>
            <div class="space-y-xs">
                <label class="text-label-md font-label-md text-on-surface-variant px-base">Password Baru (Min. 8 karakter)</label>
                <input type="password" name="password_baru" class="w-full h-12 px-md bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface" required/>
            </div>
            <div class="space-y-xs">
                <label class="text-label-md font-label-md text-on-surface-variant px-base">Konfirmasi Password Baru</label>
                <input type="password" name="password_baru_confirmation" class="w-full h-12 px-md bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md text-on-surface" required/>
            </div>
            <div class="pt-md flex justify-end gap-md">
                <button type="button" id="cancelPasswordModalBtn" class="px-lg h-12 rounded-lg font-label-md text-on-surface-variant hover:bg-surface-container transition-all">Batal</button>
                <button type="submit" class="px-lg h-12 bg-secondary text-white rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95">Simpan Password</button>
            </div>
        </form>
    </div>
</div>

<!-- Hapus Akun Modal -->
<div id="deleteAccountModal" class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden p-margin-mobile">
    <div class="bg-surface-container-lowest p-lg rounded-xl shadow-xl w-full max-w-md mx-margin-mobile md:mx-0 relative flex flex-col border border-outline-variant/30">
        <!-- Close Button -->
        <button type="button" id="closeDeleteModalBtn" class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface">
            <span class="material-symbols-outlined">close</span>
        </button>
        
        <div class="w-12 h-12 bg-error/10 text-error rounded-full flex items-center justify-center mb-md mx-auto">
            <span class="material-symbols-outlined text-[32px]">warning</span>
        </div>

        <h2 class="text-headline-md font-headline-md text-on-surface mb-xs">Hapus Akun</h2>
        <p class="text-on-surface-variant font-body-sm mb-lg border-b border-outline-variant/30 pb-md text-center">
            Apakah Anda yakin ingin menghapus akun ini? Tindakan ini <strong class="text-error">tidak dapat dibatalkan</strong> secara permanen.
        </p>
        
        <form action="{{ route('pelamar.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-md">
                <button type="button" id="cancelDeleteModalBtn" class="px-lg h-12 rounded-lg font-label-md text-on-surface-variant hover:bg-surface-container transition-all">Batal</button>
                <button type="submit" class="px-lg h-12 bg-error text-white rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95 w-full">Ya, Hapus Akun</button>
            </div>
        </form>
    </div>
</div>

<script>
    function portofolioModal() {
        return {
            showDetail: false,
            portofolio: {},
            openDetail(data) {
                this.portofolio = data;
                this.showDetail = true;
            },
            closeAll() {
                this.showDetail = false;
                this.portofolio = {};
            }
        }
    }

    // Modal controllers for Keamanan & Hapus Akun
    const passwordModal = document.getElementById('passwordModal');
    const btnKeamanan = document.getElementById('btnKeamanan');
    const closePasswordModalBtn = document.getElementById('closePasswordModalBtn');
    const cancelPasswordModalBtn = document.getElementById('cancelPasswordModalBtn');

    const deleteAccountModal = document.getElementById('deleteAccountModal');
    const btnHapusAkun = document.getElementById('btnHapusAkun');
    const closeDeleteModalBtn = document.getElementById('closeDeleteModalBtn');
    const cancelDeleteModalBtn = document.getElementById('cancelDeleteModalBtn');

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
</script>
</body>
</html>
