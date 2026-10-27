<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk Perusahaan - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "error": "#ba1a1a",
                      "primary-container": "#112d42",
                      "outline": "#73777d",
                      "on-error-container": "#93000a",
                      "outline-variant": "#c3c7cd",
                      "on-tertiary": "#ffffff",
                      "on-secondary-fixed": "#00201f",
                      "on-primary-fixed": "#001d31",
                      "on-background": "#181c1e",
                      "surface-bright": "#f7fafc",
                      "on-primary-fixed-variant": "#2f495f",
                      "on-tertiary-fixed": "#00201d",
                      "on-secondary-fixed-variant": "#00504e",
                      "secondary": "#006a68",
                      "surface-variant": "#e0e3e5",
                      "secondary-fixed": "#94f2f0",
                      "on-primary": "#ffffff",
                      "surface-dim": "#d7dadc",
                      "on-secondary-container": "#006e6d",
                      "tertiary-fixed-dim": "#5adace",
                      "surface-container-highest": "#e0e3e5",
                      "on-surface-variant": "#43474c",
                      "tertiary": "#001a18",
                      "inverse-on-surface": "#eef1f3",
                      "background": "#f7fafc",
                      "surface-container": "#ebeef0",
                      "primary": "#00182a",
                      "secondary-container": "#91f0ed",
                      "on-secondary": "#ffffff",
                      "primary-fixed-dim": "#afc9e4",
                      "primary-fixed": "#cde5ff",
                      "on-tertiary-container": "#00a499",
                      "surface-tint": "#476178",
                      "tertiary-container": "#00312d",
                      "on-primary-container": "#7b95ae",
                      "surface-container-high": "#e5e9eb",
                      "on-error": "#ffffff",
                      "inverse-surface": "#2d3133",
                      "tertiary-fixed": "#79f7ea",
                      "error-container": "#ffdad6",
                      "on-surface": "#181c1e",
                      "surface-container-lowest": "#ffffff",
                      "surface": "#f7fafc",
                      "secondary-fixed-dim": "#77d6d3",
                      "on-tertiary-fixed-variant": "#00504a",
                      "inverse-primary": "#afc9e4",
                      "surface-container-low": "#f1f4f6"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "spacing": {
                      "margin-mobile": "16px",
                      "base": "4px",
                      "xs": "8px",
                      "xl": "64px",
                      "lg": "40px",
                      "margin-desktop": "48px",
                      "sm": "16px",
                      "md": "24px",
                      "gutter": "24px"
              },
              "fontFamily": {
                      "headline-lg": ["Manrope"],
                      "headline-md": ["Manrope"],
                      "headline-xl": ["Manrope"],
                      "body-md": ["Inter"],
                      "label-md": ["Inter"],
                      "headline-lg-mobile": ["Manrope"],
                      "body-lg": ["Inter"],
                      "label-sm": ["Inter"],
                      "body-sm": ["Inter"]
              },
              "fontSize": {
                      "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                      "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                      "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                      "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                      "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                      "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                      "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                      "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                      "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}]
              }
            },
          },
        }
    </script>
    <style>
        .gradient-mesh {
            background-color: #00182a;
            background-image: 
                radial-gradient(at 0% 0%, hsla(177, 68%, 39%, 0.45) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(177, 68%, 39%, 0.25) 0px, transparent 50%),
                radial-gradient(at 100% 0%, hsla(208, 100%, 8%, 0.1) 0px, transparent 50%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid #e2e8f0;
        }
    </style>
</head>
<body class="bg-background font-body-md text-on-surface">
    <main class="min-h-screen flex items-center justify-center gradient-mesh relative overflow-hidden">
        <!-- Floating Elements for Atmosphere -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary-container/20 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl w-full px-margin-desktop py-xl grid grid-cols-1 md:grid-cols-2 gap-xl items-center relative z-10">
            <!-- Left Content: Hero Text -->
            <div class="hidden md:block space-y-md text-on-primary">
                <h1 class="font-headline-xl text-headline-xl leading-tight text-white">
                    Kelola Talenta Terbaik Anda dengan <span class="text-secondary-fixed font-bold">KerjaYok</span>
                </h1>
                <p class="font-body-lg text-body-lg text-on-primary-container max-w-md opacity-90">
                    Masuk ke Dashboard Perusahaan untuk mulai merekrut dan bangun tim impian Anda hari ini dengan sistem ATS terintegrasi.
                </p>
                <div class="pt-md flex gap-lg">
                    <div class="flex items-center gap-xs text-secondary-fixed font-semibold">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                        <span class="font-label-md">Talenta Terverifikasi</span>
                    </div>
                    <div class="flex items-center gap-xs text-secondary-fixed font-semibold">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bolt</span>
                        <span class="font-label-md">Rekrutmen Cepat</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Content: Login Card -->
            <div class="flex justify-center md:justify-end">
                <div class="glass-card w-full max-w-md p-md md:p-lg rounded-xl shadow-2xl">
                    <div class="text-center md:text-left mb-lg">
                        <a href="/" class="inline-flex items-center gap-2 text-secondary hover:text-primary transition-colors font-semibold text-sm mb-4">
                            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                            Kembali ke Beranda
                        </a>
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Masuk ke Akun Perusahaan</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Silakan masukkan kredensial perusahaan Anda untuk melanjutkan.</p>
                    </div>
                    
                    <!-- Errors and Success Alerts -->
                    @if ($errors->any())
                        <div class="mb-4 p-4 rounded-lg bg-error-container text-on-error-container text-body-sm font-semibold border border-error/20 flex flex-col gap-1">
                            @foreach ($errors->all() as $err)
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[16px] text-error">error</span>
                                    <span>{{ $err }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="mb-4 p-4 rounded-lg bg-secondary-container text-on-secondary-container text-body-sm font-semibold border border-secondary/20 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">task_alt</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('login.perusahaan') }}" method="POST" class="space-y-md" id="loginForm">
                        @csrf
                        <!-- Email Field -->
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface" for="email">Email Perusahaan</label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-secondary transition-colors">corporate_fare</span>
                                <input name="email" class="w-full pl-[48px] pr-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" id="email" placeholder="nama@perusahaan.com" type="email" value="{{ old('email') }}" required/>
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <label class="font-label-md text-label-md text-on-surface" for="password">Password</label>
                                <a class="font-label-sm text-label-sm text-secondary hover:underline transition-all" href="#">Lupa kata sandi?</a>
                            </div>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-secondary transition-colors">lock</span>
                                <input name="password" class="w-full pl-[48px] pr-[48px] py-sm bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" id="password" placeholder="••••••••" type="password" required/>
                                <button class="absolute right-sm top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-on-surface transition-colors" onclick="togglePassword()" type="button">
                                    <span class="material-symbols-outlined" id="eyeIcon">visibility</span>
                                </button>
                            </div>
                        </div>
                        <!-- Remember Me -->
                        <div class="flex items-center space-x-xs pt-xs">
                            <input name="remember" class="w-5 h-5 rounded border-outline-variant text-secondary focus:ring-secondary" id="remember" type="checkbox"/>
                            <label class="font-body-sm text-body-sm text-on-surface-variant select-none" for="remember">Ingat Saya</label>
                        </div>
                        <!-- Primary Action -->
                        <button class="w-full bg-secondary hover:bg-secondary/90 text-on-secondary font-headline-md py-sm rounded-lg shadow-md hover:shadow-lg transition-all active:scale-[0.98] mt-sm font-bold" type="submit">
                            Masuk
                        </button>
                    </form>

                    <!-- Footer Links -->
                    <div class="mt-lg flex flex-col items-center gap-md">
                        <div class="relative w-full text-center">
                            <span class="bg-white px-md text-body-sm text-outline relative z-10">Atau</span>
                            <div class="absolute top-1/2 w-full h-px bg-outline-variant -z-0"></div>
                        </div>
                        <p class="font-body-sm text-on-surface-variant">
                            Belum punya akun? <a class="text-secondary font-bold hover:underline" href="/register/perusahaan">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-surface-container-lowest dark:bg-inverse-surface border-t border-outline-variant dark:border-outline">
        <div class="flex flex-col md:flex-row justify-between items-center px-margin-desktop py-lg w-full max-w-7xl mx-auto">
            <div class="mb-md md:mb-0 text-center md:text-left">
                <span class="font-headline-sm text-headline-sm font-black text-primary dark:text-primary-fixed block mb-base">KerjaYok</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant dark:text-surface-variant">© 2024 KerjaYok. Hubungkan Karir Anda dengan Kecepatan.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-md">
                <a class="text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-colors" href="/tentang-kami">Tentang Kami</a>
                <a class="text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-colors" href="#">Pusat Bantuan</a>
                <a class="text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-colors" href="#">Kebijakan Privasi</a>
                <a class="text-body-sm text-on-surface-variant dark:text-surface-variant hover:text-secondary transition-colors" href="#">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </footer>

    <!-- Verification Pending Modal -->
    @if(session('info'))
    <div id="verification-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="bg-surface-container-lowest p-lg rounded-xl shadow-xl w-full max-w-md mx-margin-mobile md:mx-0 relative flex flex-col border border-outline-variant/30 text-center items-center text-gray-800">
            <div class="w-16 h-16 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center mb-md">
                <span class="material-symbols-outlined text-[32px]">schedule</span>
            </div>
            <h3 class="text-headline-md font-headline-md text-on-surface mb-xs" id="verification-title">Menunggu Verifikasi</h3>
            <p class="text-on-surface-variant font-body-sm mb-lg">
                {{ session('info') }}
            </p>
            <button type="button" id="verification-close" class="px-lg h-12 bg-secondary text-on-secondary rounded-lg font-label-md shadow-md hover:opacity-90 transition-all active:scale-95 w-full font-bold">
                Kembali ke Halaman Utama
            </button>
        </div>
    </div>
    <script>
        document.getElementById('verification-close').addEventListener('click', function() {
            window.location.href = "{{ url('/') }}";
        });
    </script>
    @endif

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerText = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerText = 'visibility';
            }
        }
    </script>
</body>
</html>
