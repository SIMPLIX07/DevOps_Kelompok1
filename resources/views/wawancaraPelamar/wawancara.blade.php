<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Wawancara - KerjaYok</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "secondary": "#006a68",
                        "secondary-fixed-dim": "#77d6d3",
                        "on-primary-fixed": "#001d31",
                        "background": "#f7fafc",
                        "inverse-on-surface": "#eef1f3",
                        "secondary-container": "#91f0ed",
                        "on-secondary-container": "#006e6d",
                        "on-background": "#181c1e",
                        "on-tertiary-container": "#00a499",
                        "surface-variant": "#e0e3e5",
                        "outline": "#73777d",
                        "error-container": "#ffdad6",
                        "primary-fixed-dim": "#afc9e4",
                        "on-surface-variant": "#43474c",
                        "on-tertiary-fixed-variant": "#00504a",
                        "on-tertiary-fixed": "#00201d",
                        "on-surface": "#181c1e",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "tertiary": "#001a18",
                        "surface-container-highest": "#e0e3e5",
                        "secondary-fixed": "#94f2f0",
                        "primary-fixed": "#cde5ff",
                        "on-primary-container": "#7b95ae",
                        "surface": "#f7fafc",
                        "tertiary-fixed": "#79f7ea",
                        "surface-container-low": "#f1f4f6",
                        "on-primary": "#ffffff",
                        "surface-tint": "#476178",
                        "primary-container": "#112d42",
                        "on-primary-fixed-variant": "#2f495f",
                        "on-error-container": "#93000a",
                        "inverse-surface": "#2d3133",
                        "surface-container-high": "#e5e9eb",
                        "on-secondary-fixed": "#00201f",
                        "on-secondary-fixed-variant": "#00504e",
                        "on-error": "#ffffff",
                        "primary": "#00182a",
                        "inverse-primary": "#afc9e4",
                        "outline-variant": "#c3c7cd",
                        "tertiary-fixed-dim": "#5adace",
                        "surface-dim": "#d7dadc",
                        "tertiary-container": "#00312d",
                        "surface-container": "#ebeef0",
                        "surface-bright": "#f7fafc",
                        "error": "#ba1a1a"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        xl: "64px",
                        md: "24px",
                        "margin-desktop": "48px",
                        sm: "16px",
                        gutter: "24px",
                        lg: "40px",
                        base: "4px",
                        "margin-mobile": "16px",
                        xs: "8px"
                    },
                    fontFamily: {
                        "headline-xl": ["Manrope"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Manrope"],
                        "label-md": ["Inter"],
                        "headline-lg": ["Manrope"],
                        "label-sm": ["Inter"],
                        "headline-lg-mobile": ["Manrope"],
                        "body-md": ["Inter"],
                        "body-sm": ["Inter"]
                    },
                    fontSize: {
                        "headline-xl": ["40px", {
                            lineHeight: "48px",
                            letterSpacing: "-0.02em",
                            fontWeight: "700"
                        }],
                        "body-lg": ["18px", {
                            lineHeight: "28px",
                            fontWeight: "400"
                        }],
                        "headline-md": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "600"
                        }],
                        "label-md": ["14px", {
                            lineHeight: "16px",
                            letterSpacing: "0.05em",
                            fontWeight: "600"
                        }],
                        "headline-lg": ["32px", {
                            lineHeight: "40px",
                            letterSpacing: "-0.01em",
                            fontWeight: "700"
                        }],
                        "label-sm": ["12px", {
                            lineHeight: "14px",
                            fontWeight: "500"
                        }],
                        "headline-lg-mobile": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "700"
                        }],
                        "body-md": ["16px", {
                            lineHeight: "24px",
                            fontWeight: "400"
                        }],
                        "body-sm": ["14px", {
                            lineHeight: "20px",
                            fontWeight: "400"
                        }]
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #f7fafc;
            background-image: radial-gradient(#e0e3e5 1px, transparent 1px);
            background-size: 24px 24px;
            color: #181c1e;
        }

        .card-soft {
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .card-soft:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 24, 42, 0.08);
            border-color: #006a68;
        }

        .tab-active {
            background: #112d42;
            color: #ffffff;
        }

        .tab-btn {
            transition: all 0.2s ease;
        }

        .tab-btn:hover {
            background: #ebeef0;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-body-md text-body-md text-on-surface antialiased">
    <header class="bg-surface-container-lowest sticky top-0 z-50 shadow-sm">
        <div
            class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop max-w-7xl mx-auto h-16">

            <div class="flex items-center gap-4">
                <button onclick="toggleMobileMenu()"
                    class="block md:hidden text-primary hover:bg-surface-container-low p-2 rounded-lg transition-all"
                    type="button" aria-label="Buka menu navigasi">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="{{ route('home') }}"
                    class="text-headline-md font-headline-md font-extrabold text-primary">KerjaYok</a>
            </div>

            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                    href="{{ route('home') }}">Lowongan Kerja</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                    href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
                <a class="text-primary border-b-2 border-primary pb-1 font-bold text-label-md font-label-md"
                    href="{{ route('pelamar.wawancara') }}">Wawancara</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md font-label-md"
                    href="{{ route('pelamar.bookmark') }}">Bookmark</a>
            </nav>

            <a href="{{ route('pelamar.settings') }}"
                class="flex items-center gap-2 px-2 py-1.5 rounded-full hover:bg-surface-container-low transition-colors text-primary"
                aria-label="Pengaturan akun">
                @if (session('pelamar_foto'))
                    <img src="{{ asset('storage/' . session('pelamar_foto')) }}" alt="Profil"
                        class="w-8 h-8 rounded-full object-cover border border-outline-variant">
                @else
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 0;">account_circle</span>
                @endif
                <span
                    class="hidden md:inline text-label-md font-label-md">{{ session('pelamar_nama') ?? 'Profil' }}</span>
            </a>
        </div>

        {{-- Mobile Dropdown: flex-col tanpa flex, toggle via JS --}}
        <div id="mobile-menu"
            class="hidden absolute top-full left-0 w-full border-b border-outline-variant bg-surface-container-lowest/95 backdrop-blur-md py-4 px-4 flex-col gap-3 shadow-lg z-40 md:hidden">
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ route('home') }}">Lowongan Kerja</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ url('/lamaran-anda') }}">Lamaran Anda</a>
            <a class="text-label-md text-primary font-bold py-2.5 px-4 bg-surface-container-low rounded-xl transition-all"
                href="{{ route('pelamar.wawancara') }}">Wawancara</a>
            <a class="text-label-md text-on-surface-variant hover:text-primary py-2.5 px-4 hover:bg-surface-container-low rounded-xl transition-all"
                href="{{ route('pelamar.bookmark') }}">Bookmark</a>
        </div>
    </header>


    <section
        class="bg-gradient-to-br from-primary to-primary-container pt-xl pb-lg px-margin-mobile md:px-margin-desktop text-center relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-secondary-fixed/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-tertiary-fixed/10 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4 pointer-events-none">
        </div>

        <div class="max-w-3xl mx-auto relative z-10">
            <h1 class="font-headline-xl text-headline-xl text-on-primary mb-md">Jadwal Wawancara</h1>
            <p class="font-body-lg text-body-lg text-primary-fixed-dim mb-lg">Pantau dan kelola jadwal wawancara Anda di
                sini. Persiapkan diri Anda untuk langkah karir selanjutnya.</p>

            <div class="relative w-full max-w-2xl mx-auto">
                <span
                    class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">search</span>
                <input
                    class="search-input w-full pl-[56px] pr-md py-[16px] rounded-full border-0 focus:ring-2 focus:ring-secondary text-on-surface shadow-md font-body-md text-body-md outline-none bg-surface-container-lowest"
                    placeholder="Cari nama perusahaan atau posisi..." type="text" />
            </div>
        </div>
    </section>

    <main
        class="flex-grow flex flex-col items-center px-margin-mobile md:px-margin-desktop py-xl max-w-7xl mx-auto w-full">
        <div
            class="bg-surface-container-lowest p-xs rounded-full shadow-sm mb-xl inline-flex border border-surface-variant flex-wrap justify-center gap-2">
            <button
                class="tab-btn tab-active px-lg py-sm rounded-full font-label-md text-label-md bg-primary-container text-on-primary"
                data-tab="semua">Semua</button>
            <button
                class="tab-btn px-lg py-sm rounded-full font-label-md text-label-md text-on-surface-variant hover:bg-surface-container"
                data-tab="proses">Akan Datang</button>
            <button
                class="tab-btn px-lg py-sm rounded-full font-label-md text-label-md text-on-surface-variant hover:bg-surface-container"
                data-tab="selesai">Selesai</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter w-full max-w-7xl cards-container">
            @forelse ($wawancarans as $wawancara)
                @php
                    $uiStatus = $wawancara->status === 'proses' ? 'proses' : 'selesai';
                    $statusLabel = $uiStatus === 'proses' ? 'Akan Datang' : 'Selesai';
                    $company = $wawancara->lowongan->perusahaan->nama_perusahaan ?? 'Perusahaan';
                @endphp

                <article
                    class="card-wawancara card-soft bg-surface-container-lowest rounded-xl p-6 border border-outline-variant shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group flex flex-col justify-between"
                    data-status="{{ $uiStatus }}">
                    <div
                        class="absolute top-0 left-0 w-1 h-full {{ $uiStatus === 'proses' ? 'bg-secondary-fixed' : 'bg-surface-variant' }} opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>

                    <div class="flex flex-col justify-between h-full w-full">
                        <div>
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex gap-4">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant flex-shrink-0">
                                        @if (!empty($wawancara->lowongan->perusahaan?->foto_profil))
                                            <img alt="Logo {{ $company }}" class="w-full h-full object-cover"
                                                src="{{ asset('storage/' . $wawancara->lowongan->perusahaan->foto_profil) }}">
                                        @else
                                            <span
                                                class="material-symbols-outlined text-primary-container text-headline-md">business_center</span>
                                        @endif
                                    </div>
                                    <div>
                                        <h3
                                            class="posisi-pekerjaan text-headline-md font-headline-md text-on-surface mb-0.5">
                                            {{ $wawancara->lowongan->posisi_pekerjaan }}</h3>
                                        <p class="nama-perusahaan text-body-sm font-medium text-on-surface-variant">
                                            {{ $company }}</p>
                                    </div>
                                </div>

                                <span
                                    class="px-3 py-1 {{ $uiStatus === 'proses' ? 'bg-secondary-container text-on-secondary-container' : 'bg-surface-container-high text-on-surface-variant' }} text-label-sm rounded-full font-bold flex-shrink-0">
                                    {{ $statusLabel }}
                                </span>
                            </div>

                            <div class="space-y-4">
                                <p class="pesan-teks text-body-md text-on-surface-variant leading-relaxed">
                                    {{ $wawancara->pesan ?? 'Kami tertarik dengan CV kamu, ditunggu di wawancara nanti ya' }}
                                </p>

                                <div class="space-y-xs mt-sm text-body-sm text-on-surface">
                                    <p class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-[18px] text-outline">calendar_month</span>
                                        {{ \Carbon\Carbon::parse($wawancara->tanggal)->format('d-m-Y') }}
                                    </p>
                                    <p class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[18px] text-outline">schedule</span>
                                        {{ $wawancara->jam_mulai }} - {{ $wawancara->jam_selesai }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-outline-variant/30 space-y-4">
                            <div class="flex items-center text-body-sm h-6">
                                @if ($uiStatus === 'proses')
                                    <span
                                        class="material-symbols-outlined text-[18px] text-secondary mr-2 flex-shrink-0">videocam</span>
                                    <a href="{{ $wawancara->link_meet }}" target="_blank"
                                        class="font-semibold text-secondary hover:underline truncate max-w-full"
                                        title="Klik untuk bergabung">
                                        {{ $wawancara->link_meet }}
                                    </a>
                                @else
                                    <span
                                        class="material-symbols-outlined text-[18px] text-outline mr-2 flex-shrink-0">check_circle</span>
                                    <span class="text-on-surface-variant italic">Wawancara telah selesai</span>
                                @endif
                            </div>

                            <button type="button"
                                class="detail-btn w-full py-2.5 px-4 border border-secondary text-secondary hover:bg-secondary hover:text-white rounded-xl text-label-md font-bold transition-all active:scale-[0.98]"
                                data-id="{{ $wawancara->id }}"
                                data-posisi="{{ $wawancara->lowongan->posisi_pekerjaan }}"
                                data-perusahaan="{{ $company }}"
                                data-tanggal="{{ \Carbon\Carbon::parse($wawancara->tanggal)->format('d M Y') }}"
                                data-jam="{{ $wawancara->jam_mulai }} - {{ $wawancara->jam_selesai }}"
                                data-pesan="{{ $wawancara->pesan ?? 'Tidak ada pesan khusus.' }}"
                                data-link="{{ $wawancara->link_meet }}" data-status="{{ $uiStatus }}"
                                data-lamaran-status="{{ $wawancara->lamaran_status }}"
                                data-logo="{{ !empty($wawancara->lowongan->perusahaan?->foto_profil) ? asset('storage/' . $wawancara->lowongan->perusahaan->foto_profil) : '' }}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full w-full flex items-center justify-center py-10">
                    <div
                        class="bg-surface-container-lowest rounded-2xl border border-outline-variant shadow-sm p-8 md:p-10 text-center max-w-xl w-full">
                        <div
                            class="w-16 h-16 rounded-full bg-primary-fixed mx-auto mb-4 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">event_busy</span>
                        </div>
                        <h3 class="text-headline-md font-headline-md text-on-surface">Belum ada wawancara</h3>
                        <p class="mt-3 text-body-md text-on-surface-variant">
                            Kamu belum memiliki jadwal wawancara.<br>
                            Pantau terus lamaran kamu ya.
                        </p>
                        <a href="{{ route('home') }}"
                            class="inline-flex mt-6 px-6 py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-secondary transition-colors">
                            Cari Lowongan
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Detail Modal -->
    <div class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden animate-fade-in animate-duration-200"
        id="detailModal">
        <div
            class="glass-card p-6 rounded-xl shadow-xl w-full max-w-lg mx-margin-mobile md:mx-0 max-h-[90vh] overflow-y-auto relative flex flex-col bg-white">
            <!-- Close Button -->
            <button
                class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface"
                id="closeModal">
                <span class="material-symbols-outlined">close</span>
            </button>

            <!-- Modal Content -->
            <div class="flex flex-col items-center text-center mt-6">
                <div class="w-16 h-16 rounded-xl bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant mb-4"
                    id="modalLogoWrapper">
                    <span class="material-symbols-outlined text-primary-container text-3xl"
                        id="modalDefaultLogo">account_circle</span>
                    <img id="modalLogo" alt="" class="w-full h-full object-cover hidden" src="">
                </div>
                <h3 class="font-headline-md text-2xl font-bold text-on-surface mb-1" id="modalPosisi"></h3>
                <p class="font-label-md text-secondary font-semibold mb-2" id="modalPerusahaan"></p>
                <span id="modalStatus" class="px-3 py-1 rounded-full text-xs font-semibold mb-6 inline-block"></span>

                <!-- Message Box -->
                <div
                    class="w-full bg-surface-container-low p-4 rounded-xl text-left mb-6 border border-outline-variant">
                    <span class="font-label-sm text-on-surface-muted block mb-1">Pesan / Undangan</span>
                    <p class="font-body-sm text-on-surface leading-relaxed whitespace-pre-line" id="modalPesan"></p>
                </div>

                <!-- Details Grid -->
                <div class="w-full text-left space-y-3 border-t border-outline-variant pt-4 mb-6">
                    <div class="flex justify-between py-2 border-b border-surface-container-low">
                        <span class="font-label-sm text-on-surface-muted">Tanggal</span>
                        <span class="font-body-sm font-semibold text-on-surface" id="modalTanggal"></span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-surface-container-low">
                        <span class="font-label-sm text-on-surface-muted">Waktu</span>
                        <span class="font-body-sm font-semibold text-on-surface" id="modalJam"></span>
                    </div>
                    <div class="flex justify-between py-2 items-center" id="modalLinkContainer">
                        <span class="font-label-sm text-on-surface-muted">Link Pertemuan</span>
                        <a id="modalLink" href="" target="_blank"
                            class="px-4 py-2 bg-secondary text-white font-semibold rounded-lg font-label-md text-xs hover:opacity-90 active:scale-95 transition-all text-center">
                            Gabung Pertemuan
                        </a>
                    </div>
                </div>

                <!-- Hasil / Status Seleksi Section -->
                <div id="modalHasilSelection" class="w-full mt-4 p-5 rounded-2xl border hidden">
                    <div class="flex items-center gap-3 justify-center mb-2">
                        <span id="modalHasilIcon" class="material-symbols-outlined text-[32px]"></span>
                        <h4 id="modalHasilTitle" class="font-headline font-bold text-lg"></h4>
                    </div>
                    <p id="modalHasilDesc" class="text-body-sm"></p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-surface-container-highest border-t border-outline-variant mt-auto">
        <div
            class="w-full px-margin-mobile md:px-margin-desktop py-lg flex flex-col md:flex-row justify-between items-center gap-md max-w-7xl mx-auto">
            <div class="font-headline-md text-headline-md font-bold text-primary">KerjaYok</div>
            <ul class="flex flex-wrap justify-center gap-md font-label-sm text-label-sm">
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Tentang
                        Kami</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Pusat
                        Bantuan</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Kebijakan
                        Privasi</a></li>
                <li><a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Syarat
                        &amp; Ketentuan</a></li>
            </ul>
            <div class="font-body-sm text-body-sm text-primary">© 2024 KerjaYok. Empowering your next career move.
            </div>
        </div>
    </footer>

    <script src="/assets/wawancaraPelamar/wawancaraPelamar.js"></script>
    <script>
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
