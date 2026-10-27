<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign Up | KerjaYok - Elevate Your Career</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-on-surface": "#eef1f3",
                        "primary-container": "#112d42",
                        "surface-container": "#ebeef0",
                        "on-primary-container": "#7b95ae",
                        "on-secondary": "#ffffff",
                        "on-secondary-fixed-variant": "#00504e",
                        "outline": "#73777d",
                        "on-tertiary-container": "#00a499",
                        "on-surface": "#181c1e",
                        "tertiary": "#001a18",
                        "on-surface-variant": "#43474c",
                        "on-tertiary-fixed": "#00201d",
                        "surface-container-low": "#f1f4f6",
                        "outline-variant": "#c3c7cd",
                        "inverse-primary": "#afc9e4",
                        "tertiary-fixed": "#79f7ea",
                        "primary-fixed-dim": "#afc9e4",
                        "inverse-surface": "#2d3133",
                        "surface": "#f7fafc",
                        "secondary-container": "#91f0ed",
                        "background": "#f7fafc",
                        "on-tertiary": "#ffffff",
                        "on-error-container": "#93000a",
                        "surface-dim": "#d7dadc",
                        "surface-bright": "#f7fafc",
                        "on-secondary-fixed": "#00201f",
                        "surface-container-high": "#e5e9eb",
                        "primary-fixed": "#cde5ff",
                        "on-primary": "#ffffff",
                        "error": "#ba1a1a",
                        "secondary": "#006a68",
                        "primary": "#00182a",
                        "on-background": "#181c1e",
                        "on-tertiary-fixed-variant": "#00504a",
                        "surface-variant": "#e0e3e5",
                        "secondary-fixed-dim": "#77d6d3",
                        "on-primary-fixed": "#001d31",
                        "on-secondary-container": "#006e6d",
                        "surface-tint": "#476178",
                        "on-primary-fixed-variant": "#2f495f",
                        "tertiary-fixed-dim": "#5adace",
                        "surface-container-highest": "#e0e3e5",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#94f2f0",
                        "on-error": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "tertiary-container": "#00312d"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "md": "24px",
                        "lg": "40px",
                        "xl": "64px",
                        "sm": "16px",
                        "gutter": "24px",
                        "margin-desktop": "48px",
                        "margin-mobile": "16px",
                        "base": "4px",
                        "xs": "8px"
                    },
                    "fontFamily": {
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-lg": ["Manrope"],
                        "body-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-xl": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-md": ["Manrope"],
                        "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "14px",
                            "fontWeight": "500"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "headline-xl": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "700"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        .vibrant-gradient {
            background: linear-gradient(135deg, #00182a 0%, #112d42 40%, #006a68 100%);
        }

        .form-input-focus:focus {
            outline: none;
            box-shadow: 0 0 0 2px #319795;
            border-color: #319795;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid #E2E8F0;
        }

        .password-masked-input {
            color: transparent !important;
            -webkit-text-fill-color: transparent !important;
        }
    </style>
</head>

<body
    class="bg-background text-on-surface font-body-md selection:bg-secondary-container selection:text-on-secondary-container">
    <main
        class="min-h-[calc(100vh-160px)] flex items-center justify-center py-xl px-margin-mobile md:px-margin-desktop">
        <div
            class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-12 rounded-[2rem] overflow-hidden shadow-2xl glass-card">
            <!-- Side Illustration Panel -->
            <div
                class="hidden md:flex md:col-span-5 vibrant-gradient p-xl flex-col justify-between text-on-secondary relative overflow-hidden">
                <!-- Abstract Atmospheric Shapes -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-secondary/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-primary-container/40 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <h1 class="font-headline-xl text-headline-xl mb-md leading-tight">Mulai Karir Impianmu Sekarang.
                    </h1>
                    <p class="font-body-lg text-body-lg opacity-80 mb-xl">Bergabunglah dengan ribuan profesional dan
                        temukan kesempatan kerja terbaik yang sesuai dengan keahlianmu.</p>
                    <div class="space-y-md">
                        <div class="flex items-center gap-sm bg-white/10 p-sm rounded-xl backdrop-blur-sm">
                            <span class="material-symbols-outlined text-secondary-container">verified_user</span>
                            <span class="font-label-md">Perusahaan Terverifikasi</span>
                        </div>
                        <div class="flex items-center gap-sm bg-white/10 p-sm rounded-xl backdrop-blur-sm">
                            <span class="material-symbols-outlined text-secondary-container">trending_up</span>
                            <span class="font-label-md">Update Lowongan Real-time</span>
                        </div>
                        <div class="flex items-center gap-sm bg-white/10 p-sm rounded-xl backdrop-blur-sm">
                            <span class="material-symbols-outlined text-secondary-container">psychology</span>
                            <span class="font-label-md">Rekomendasi Berbasis AI</span>
                        </div>
                    </div>
                </div>
                <div class="relative z-10 mt-xl">
                    <img alt="Career Success"
                        class="rounded-xl shadow-lg border-2 border-white/20 object-cover aspect-video"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGzQXNWgFdDkrkv_7sz4qnJy9nVo4Kvp2ab9jI19UyWSZC97MpUYq5Ezm0iiCZ8bmgJ4ZlZg2mlqZSvdt-EeodHAC5LSBzZXEVI9fpyG00FL_dlQq-ALItsMwLCPumOOaB3lqD7KZ4Yrpdapf-v-zFkkYaPIfG_Bse4uxngYZyKIA_7Zy69APVElH7xR7Xx1CCUFf3yNN2ATu7pCny42lSLPeZ1Tk7GT526Rz3fHD1FCifSayqrahnp9Qd4xWmzG9kLvcIDhGlNEs">
                </div>
            </div>
            <!-- Registration Form Panel -->
            <div class="md:col-span-7 p-md md:p-xl bg-white">
                <div class="max-w-md mx-auto">
                    <div class="mb-lg flex flex-col gap-1">
                        <a href="/pilihRole"
                            class="flex items-center gap-2 text-secondary hover:text-primary transition-colors font-semibold text-sm w-fit mb-2">
                            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                            Kembali ke Pilih Peran
                        </a>
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Buat Akun Baru</h2>
                        <p class="text-on-surface-variant font-body-md">Lengkapi data diri untuk memulai perjalanan
                            karirmu.</p>
                    </div>

                    <!-- Alerts for Laravel Errors & Success Sessions -->
                    @if ($errors->any())
                        <div
                            class="mb-md p-sm bg-error-container text-on-error-container rounded-lg border border-error/20 font-body-sm">
                            <div class="font-bold mb-xs flex items-center gap-xs text-error">
                                <span class="material-symbols-outlined text-error">error</span>
                                Registrasi Gagal
                            </div>
                            <ul class="list-disc pl-sm space-y-1">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div
                            class="mb-md p-sm bg-secondary-container text-on-secondary-container rounded-lg border border-secondary/20 font-body-sm flex items-center gap-xs">
                            <span class="material-symbols-outlined text-secondary">check_circle</span>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    <form action="{{ route('register.pelamar') }}" method="POST"
                        class="grid grid-cols-1 md:grid-cols-2 gap-sm">
                        @csrf
                        <!-- Full Name -->
                        <div class="flex flex-col gap-xs md:col-span-2">
                            <label for="fullname" class="font-label-md text-primary">Nama Lengkap</label>
                            <input
                                class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md form-input-focus"
                                placeholder="John Doe" type="text" name="nama_lengkap" id="fullname"
                                value="{{ old('nama_lengkap') }}">
                        </div>
                        <!-- Username -->
                        <div class="flex flex-col gap-xs">
                            <label for="usn" class="font-label-md text-primary">Username</label>
                            <input
                                class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md form-input-focus"
                                placeholder="johndoe123" type="text" name="username" id="usn"
                                value="{{ old('username') }}">
                        </div>
                        <!-- Phone Number -->
                        <div class="flex flex-col gap-xs">
                            <label for="no_telp" class="font-label-md text-primary">Nomor Telepon</label>
                            <input
                                class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md form-input-focus"
                                placeholder="0812xxxx" type="text" name="no_telp" id="no_telp"
                                value="{{ old('no_telp') }}">
                        </div>
                        <!-- Email -->
                        <div class="flex flex-col gap-xs md:col-span-2">
                            <label for="email" class="font-label-md text-primary">Email</label>
                            <input
                                class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md form-input-focus"
                                placeholder="name@gmail.com" type="email" name="email" id="email"
                                value="{{ old('email') }}">
                        </div>
                        <!-- Password -->
                        <div class="flex flex-col gap-xs">
                            <label for="pass" class="font-label-md text-primary">Password</label>
                            <div class="relative w-full">
                                <input
                                    class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-mono text-base form-input-focus caret-primary"
                                    placeholder="••••••••" type="password" name="password" id="pass">
                                <div id="pass-dots-container"
                                    class="absolute inset-y-0 left-0 flex items-center px-sm overflow-hidden max-w-full pointer-events-none select-none font-mono text-base leading-none z-10">
                                </div>
                            </div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="flex flex-col gap-xs">
                            <label for="conf" class="font-label-md text-primary">Konfirmasi Password</label>
                            <div class="relative w-full">
                                <input
                                    class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-mono text-base form-input-focus caret-primary"
                                    placeholder="••••••••" type="password" name="conf" id="conf">
                                <div id="conf-dots-container"
                                    class="absolute inset-y-0 left-0 flex items-center px-sm overflow-hidden max-w-full pointer-events-none select-none font-mono text-base leading-none z-10">
                                </div>
                            </div>
                        </div>
                        <!-- Skills -->
                        <div class="flex flex-col gap-xs md:col-span-2">
                            <label for="skills" class="font-label-md text-primary">Keahlian (Pisahkan dengan
                                koma)</label>
                            <input
                                class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md form-input-focus"
                                placeholder="UI Design, Project Management, Data Analysis" type="text"
                                name="keahlian" id="skills" value="{{ old('keahlian') }}">
                        </div>
                        <!-- Agreement -->
                        <div class="md:col-span-2 flex items-start gap-xs py-xs">
                            <input class="mt-1 rounded border-outline-variant text-secondary focus:ring-secondary"
                                id="terms" type="checkbox">
                            <label class="text-body-sm text-on-surface-variant" for="terms">Saya menyetujui <a
                                    class="text-secondary font-bold hover:underline" href="#">Syarat &amp;
                                    Ketentuan</a> serta <a class="text-secondary font-bold hover:underline"
                                    href="#">Kebijakan Privasi</a> KerjaYok.</label>
                        </div>
                        <!-- Action Button -->
                        <div class="md:col-span-2 mt-md">
                            <button
                                class="w-full py-sm bg-secondary text-on-secondary font-headline-md rounded-xl hover:opacity-90 hover:scale-[1.02] transition-all active:scale-95 shadow-md"
                                type="submit" id="next">
                                Lanjut
                            </button>
                        </div>
                    </form>

                    <div class="mt-md space-y-md">
                        <div class="relative w-full text-center">
                            <span class="bg-white px-md text-body-sm text-outline relative z-10">Atau</span>
                            <div class="absolute top-1/2 w-full h-px bg-outline-variant -z-0"></div>
                        </div>

                        <!-- Google Sign-up Button -->
                        <button id="googleSignUpBtn" type="button"
                            class="w-full flex items-center justify-center gap-3 bg-white hover:bg-gray-50 border border-outline-variant text-on-surface py-sm rounded-lg font-semibold shadow-sm transition-all active:scale-95 duration-200">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                    fill="#4285F4" />
                                <path
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                    fill="#34A853" />
                                <path
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"
                                    fill="#FBBC05" />
                                <path
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                    fill="#EA4335" />
                            </svg>
                            Daftar dengan Google
                        </button>
                    </div>

                    <div class="mt-lg text-center">
                        <p class="text-body-md text-on-surface-variant">
                            Sudah punya akun?
                            <a class="text-secondary font-bold hover:underline transition-all"
                                href="/login/pelamar">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer
        class="w-full py-xl px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-md bg-surface-container-highest dark:bg-inverse-surface border-t border-outline-variant">
        <div class="flex flex-col items-center md:items-start gap-xs">
            <span
                class="font-headline-md text-headline-md font-black text-primary dark:text-inverse-primary">KerjaYok</span>
            <p class="font-body-sm text-body-sm text-on-surface-variant">© 2024 KerjaYok. Empowering your career
                velocity.</p>
        </div>
        <div class="flex gap-lg flex-wrap justify-center">
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-all hover:underline decoration-secondary"
                href="#">Privacy Policy</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-all hover:underline decoration-secondary"
                href="#">Terms of Service</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-all hover:underline decoration-secondary"
                href="#">Help Center</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-all hover:underline decoration-secondary"
                href="#">Contact Us</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-all hover:underline decoration-secondary"
                href="#">Careers</a>
        </div>
    </footer>
    <script>
        // Micro-interaction for form inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.querySelector('label')?.classList.add('text-secondary');
            });
            input.addEventListener('blur', () => {
                input.parentElement.querySelector('label')?.classList.remove('text-secondary');
            });
        });

        // Password matching dot indicator logic
        const passInput = document.getElementById('pass');
        const confInput = document.getElementById('conf');
        const passDots = document.getElementById('pass-dots-container');
        const confDots = document.getElementById('conf-dots-container');

        function updatePasswordDots() {
            const passVal = passInput.value;
            const confVal = confInput.value;

            // 1. Update Password Dots
            if (passVal === '') {
                passInput.classList.remove('password-masked-input');
                passDots.innerHTML = '';
            } else {
                passInput.classList.add('password-masked-input');
                let html = '';
                for (let i = 0; i < passVal.length; i++) {
                    html +=
                        '<div class="flex justify-center items-center" style="width: 1ch;"><span class="w-2 h-2 rounded-full bg-[#181c1e]"></span></div>';
                }
                passDots.innerHTML = html;
            }

            // 2. Update Confirm Password Dots
            if (confVal === '') {
                confInput.classList.remove('password-masked-input');
                confDots.innerHTML = '';
            } else {
                confInput.classList.add('password-masked-input');
                let html = '';

                for (let i = 0; i < confVal.length; i++) {
                    if (i < passVal.length && confVal[i] === passVal[i]) {
                        // Match -> Green Dot
                        html +=
                            '<div class="flex justify-center items-center" style="width: 1ch;"><span class="w-2 h-2 rounded-full bg-green-500"></span></div>';
                    } else {
                        // No Match -> Red Dot
                        html +=
                            '<div class="flex justify-center items-center" style="width: 1ch;"><span class="w-2 h-2 rounded-full bg-red-500"></span></div>';
                    }
                }
                confDots.innerHTML = html;
            }
        }

        passInput.addEventListener('input', updatePasswordDots);
        confInput.addEventListener('input', updatePasswordDots);
    </script>

    <!-- Firebase SDK Integration -->
    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
        import {
            getAuth,
            createUserWithEmailAndPassword,
            signInWithPopup,
            GoogleAuthProvider,
            signOut
        } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";

        const firebaseConfig = {
            apiKey: "AIzaSyAp_Ef_IrW3chzKEyFyHauPQRiZprbsgpc",
            authDomain: "kerjayok-aea0e.firebaseapp.com",
            projectId: "kerjayok-aea0e",
            storageBucket: "kerjayok-aea0e.firebasestorage.app",
            messagingSenderId: "391966285572",
            appId: "1:391966285572:web:ffdd346c14323822dc7a51",
            measurementId: "G-5ZCQ89ER19"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const auth = getAuth(app);
        const provider = new GoogleAuthProvider();

        // Sign out initially
        signOut(auth).catch(e => console.log('initial signout err', e));

        const form = document.querySelector('form[action*="register/pelamar"]');
        const submitBtn = document.getElementById('next');
        let errorAlertContainer = document.querySelector('.bg-error-container');

        if (!errorAlertContainer) {
            errorAlertContainer = document.createElement('div');
            errorAlertContainer.className =
                "mb-md p-sm bg-error-container text-on-error-container rounded-lg border border-error/20 font-body-sm hidden";
            form.parentNode.insertBefore(errorAlertContainer, form);
        }

        function showErrors(errors) {
            let html = `
                <div class="font-bold mb-xs flex items-center gap-xs text-error">
                    <span class="material-symbols-outlined text-error">error</span>
                    Registrasi Gagal
                </div>
                <ul class="list-disc pl-sm space-y-1">
            `;
            if (Array.isArray(errors)) {
                errors.forEach(err => {
                    html += `<li>${err}</li>`;
                });
            } else if (typeof errors === 'object') {
                Object.values(errors).forEach(errList => {
                    errList.forEach(err => {
                        html += `<li>${err}</li>`;
                    });
                });
            } else {
                html += `<li>${errors}</li>`;
            }
            html += `</ul>`;
            errorAlertContainer.innerHTML = html;
            errorAlertContainer.classList.remove('hidden');
        }

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Ambil semua nilai dulu
            const namaLengkap = document.getElementById('fullname').value.trim();
            const username = document.getElementById('usn').value.trim();
            const noTelp = document.getElementById('no_telp').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('pass').value;
            const conf = document.getElementById('conf').value;
            const termsChecked = document.getElementById('terms').checked;

            // Reset error
            errorAlertContainer.classList.add('hidden');

            // 1. Validasi terms
            if (!termsChecked) {
                showTermsWarning();
                document.getElementById('terms').focus();
                return;
            }

            // 2. Validasi field kosong
            if (!namaLengkap || !username || !noTelp || !email || !password || !conf) {
                showErrors('Semua field wajib diisi.');
                return;
            }

            // 3. Validasi format email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showErrors('Format email tidak valid.');
                return;
            }

            // 4. Validasi panjang password
            if (password.length < 6) {
                showErrors('Password minimal 6 karakter.');
                return;
            }

            // 5. Validasi konfirmasi password
            if (password !== conf) {
                showErrors('Konfirmasi password tidak cocok.');
                document.getElementById('conf').value = '';
                document.getElementById('conf-dots-container').innerHTML = '';
                document.getElementById('conf').classList.remove('password-masked-input');
                document.getElementById('conf').focus();
                return;
            }

            // Set loading state
            submitBtn.disabled = true;
            submitBtn.textContent = 'Memproses...';
            errorAlertContainer.classList.add('hidden');

            try {
                // 1. Validate on Backend first (unique check)
                const validateResponse = await fetch("{{ url('/register/pelamar/validate') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        username,
                        email
                    })
                });

                const validateData = await validateResponse.json();

                if (!validateResponse.ok || !validateData.success) {
                    showErrors(validateData.errors || 'Validasi gagal.');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Lanjut';
                    return;
                }

                // 2. Register with Firebase
                const userCredential = await createUserWithEmailAndPassword(auth, email, password);
                const user = userCredential.user;

                // 3. Append firebase_uid hidden input and submit form natively
                let uidInput = document.createElement('input');
                uidInput.type = 'hidden';
                uidInput.name = 'firebase_uid';
                uidInput.value = user.uid;
                form.appendChild(uidInput);

                form.submit();

            } catch (error) {
                console.error(error);
                let msg = 'Gagal melakukan registrasi di Firebase.';
                if (error.code === 'auth/email-already-in-use') {
                    msg = 'Email sudah terdaftar di Firebase.';
                } else if (error.code === 'auth/weak-password') {
                    msg = 'Password terlalu lemah (minimal 6 karakter).';
                } else if (error.code === 'auth/invalid-email') {
                    msg = 'Format email tidak valid.';
                }
                showErrors(msg);
                submitBtn.disabled = false;
                submitBtn.textContent = 'Lanjut';
            }
        });

        window.closeTermsWarningModal = function() {
            document.getElementById('termsWarningModal').classList.add('hidden');
        };

        window.showTermsWarning = function() {
            document.getElementById('termsWarningModal').classList.remove('hidden');
        };

        // Google Sign Up Button intercepts to open the details modal
        const googleBtn = document.getElementById('googleSignUpBtn');
        googleBtn.addEventListener('click', function() {
            const termsChecked = document.getElementById('terms').checked;
            if (!termsChecked) {
                showTermsWarning();
                document.getElementById('terms').focus();
                return;
            }

            document.getElementById('googleDetailsModal').classList.remove('hidden');
            document.getElementById('google_no_telp').value = '';
            document.getElementById('google_skills').value = '';
            document.getElementById('googleDetailsError').classList.add('hidden');
        });

        window.closeGoogleDetailsModal = function() {
            document.getElementById('googleDetailsModal').classList.add('hidden');
        };

        window.submitGoogleSignUp = async function() {
            const noTelp = document.getElementById('google_no_telp').value.trim();
            const skills = document.getElementById('google_skills').value.trim();
            const modalErrorDiv = document.getElementById('googleDetailsError');
            const modalErrorText = document.getElementById('googleDetailsErrorText');
            const submitModalBtn = document.getElementById('googleModalSubmitBtn');

            if (!noTelp) {
                modalErrorText.textContent = 'Nomor telepon wajib diisi.';
                modalErrorDiv.classList.remove('hidden');
                return;
            }

            if (isNaN(noTelp)) {
                modalErrorText.textContent = 'Nomor telepon harus berupa angka.';
                modalErrorDiv.classList.remove('hidden');
                return;
            }

            // Start Firebase Authentication
            submitModalBtn.disabled = true;
            const originalModalText = submitModalBtn.innerHTML;
            submitModalBtn.innerHTML = 'Memproses...';
            modalErrorDiv.classList.add('hidden');

            try {
                const result = await signInWithPopup(auth, provider);
                const user = result.user;
                const idToken = await user.getIdToken();

                // Close the modal
                document.getElementById('googleDetailsModal').classList.add('hidden');

                // Send callback to Laravel along with no_telp and keahlian
                const backendResponse = await fetch("{{ url('/auth/firebase/google') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        idToken: idToken,
                        firebase_uid: user.uid,
                        nama_lengkap: user.displayName || user.email.split('@')[0],
                        no_telp: noTelp,
                        keahlian: skills
                    })
                });

                const backendData = await backendResponse.json();

                if (backendResponse.ok && backendData.success) {
                    window.location.href = backendData.redirect;
                } else {
                    showErrors(backendData.message || 'Gagal registrasi dengan Google.');
                    submitModalBtn.disabled = false;
                    submitModalBtn.innerHTML = originalModalText;
                }
            } catch (error) {
                console.error(error);
                modalErrorText.textContent = `Gagal registrasi dengan Google: ${error.message} (${error.code})`;
                modalErrorDiv.classList.remove('hidden');
                submitModalBtn.disabled = false;
                submitModalBtn.innerHTML = originalModalText;
            }
        };
        
    </script>

    <!-- Modal Google Details (Style matches the Interview Detail modal) -->
    <div id="googleDetailsModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden animate-fade-in animate-duration-200">
        <div
            class="glass-card p-6 rounded-xl shadow-xl w-full max-w-lg mx-margin-mobile md:mx-0 max-h-[90vh] overflow-y-auto relative flex flex-col bg-white">
            <!-- Close Button -->
            <button onclick="closeGoogleDetailsModal()"
                class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>

            <div class="flex flex-col mt-4">
                <h3 class="font-headline-md text-2xl font-bold text-primary mb-2 text-center">Lengkapi Data Anda</h3>
                <p class="font-body-sm text-on-surface-variant mb-6 text-center">Sebelum melanjutkan pendaftaran dengan
                    Google, harap lengkapi nomor telepon dan keahlian Anda.</p>

                <div id="googleDetailsError"
                    class="mb-sm hidden p-sm bg-error-container text-on-error-container rounded-lg text-body-sm border border-error/20 flex items-center gap-xs">
                    <span class="material-symbols-outlined text-error">error</span>
                    <span id="googleDetailsErrorText"></span>
                </div>

                <div class="space-y-4">
                    <!-- Phone Number -->
                    <div class="flex flex-col gap-xs">
                        <label for="google_no_telp" class="font-label-md text-primary">Nomor Telepon</label>
                        <input id="google_no_telp"
                            class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all placeholder:text-outline-variant"
                            placeholder="0812xxxx" type="text" required>
                    </div>

                    <!-- Skills -->
                    <div class="flex flex-col gap-xs">
                        <label for="google_skills" class="font-label-md text-primary">Keahlian (Pisahkan dengan
                            koma)</label>
                        <input id="google_skills"
                            class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all placeholder:text-outline-variant"
                            placeholder="UI Design, Data Analysis" type="text">
                    </div>
                </div>

                <button id="googleModalSubmitBtn" onclick="submitGoogleSignUp()"
                    class="w-full mt-6 py-sm bg-secondary text-on-secondary font-headline-md rounded-xl hover:opacity-90 hover:scale-[1.02] transition-all active:scale-95 shadow-md flex items-center justify-center gap-3">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                            fill="#4285F4" />
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="#34A853" />
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"
                            fill="#FBBC05" />
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                            fill="#EA4335" />
                    </svg>
                    Lanjut dengan Google
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Alert Syarat & Ketentuan (Style matches the Interview Detail modal) -->
    <div id="termsWarningModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden animate-fade-in animate-duration-200">
        <div
            class="glass-card p-6 rounded-xl shadow-xl w-full max-w-md mx-margin-mobile md:mx-0 relative flex flex-col bg-white">
            <!-- Close Button -->
            <button onclick="closeTermsWarningModal()"
                class="absolute top-4 right-4 p-2 rounded-full hover:bg-surface-container transition-colors text-outline hover:text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>
            <div class="flex flex-col items-center text-center mt-4 space-y-4">
                <div
                    class="w-16 h-16 rounded-full bg-error-container flex items-center justify-center text-error animate-bounce">
                    <span class="material-symbols-outlined text-[36px]">gavel</span>
                </div>
                <h3 class="font-headline-md text-xl font-bold text-primary">Persetujuan Diperlukan</h3>
                <p class="font-body-sm text-on-surface-variant">Anda harus menyetujui Syarat & Ketentuan serta
                    Kebijakan Privasi KerjaYok terlebih dahulu untuk melanjutkan.</p>
                <button onclick="closeTermsWarningModal()"
                    class="w-full py-sm bg-secondary text-on-secondary font-headline-md rounded-xl hover:opacity-90 transition-all active:scale-95 shadow-md">
                    Saya Mengerti
                </button>
            </div>
        </div>
    </div>
</body>

</html>
