<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk Admin | KerjaYok</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "inverse-on-surface": "#eef1f3",
                    "outline": "#73777d",
                    "on-error": "#ffffff",
                    "tertiary-container": "#00312d",
                    "surface-container-highest": "#e0e3e5",
                    "outline-variant": "#c3c7cd",
                    "on-secondary": "#ffffff",
                    "secondary-fixed-dim": "#77d6d3",
                    "on-primary-fixed": "#001d31",
                    "surface-container": "#ebeef0",
                    "on-tertiary": "#ffffff",
                    "on-primary-container": "#7b95ae",
                    "tertiary-fixed-dim": "#5adace",
                    "surface-variant": "#e0e3e5",
                    "on-primary-fixed-variant": "#2f495f",
                    "on-error-container": "#93000a",
                    "surface": "#f7fafc",
                    "error": "#ba1a1a",
                    "tertiary-fixed": "#79f7ea",
                    "surface-dim": "#d7dadc",
                    "secondary": "#006a68",
                    "primary": "#00182a",
                    "secondary-container": "#91f0ed",
                    "error-container": "#ffdad6",
                    "primary-fixed": "#cde5ff",
                    "on-tertiary-container": "#00a499",
                    "secondary-fixed": "#94f2f0",
                    "on-background": "#181c1e",
                    "tertiary": "#001a18",
                    "primary-fixed-dim": "#afc9e4",
                    "on-tertiary-fixed": "#00201d",
                    "on-surface": "#181c1e",
                    "on-secondary-container": "#006e6d",
                    "on-surface-variant": "#43474c",
                    "surface-container-lowest": "#ffffff",
                    "inverse-primary": "#afc9e4",
                    "inverse-surface": "#2d3133",
                    "surface-container-low": "#f1f4f6",
                    "surface-bright": "#f7fafc",
                    "on-tertiary-fixed-variant": "#00504a",
                    "on-secondary-fixed": "#00201f",
                    "surface-tint": "#476178",
                    "on-primary": "#ffffff",
                    "on-secondary-fixed-variant": "#00504e",
                    "surface-container-high": "#e5e9eb",
                    "primary-container": "#112d42",
                    "background": "#f7fafc"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "lg": "40px",
                    "base": "4px",
                    "xs": "8px",
                    "sm": "16px",
                    "margin-mobile": "16px",
                    "margin-desktop": "48px",
                    "xl": "64px",
                    "gutter": "24px",
                    "md": "24px"
            },
            "fontFamily": {
                    "body-md": ["Inter"],
                    "headline-lg-mobile": ["Manrope"],
                    "body-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-xl": ["Manrope"],
                    "headline-lg": ["Manrope"],
                    "body-sm": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-md": ["Manrope"]
            },
            "fontSize": {
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                    "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}]
            }
          },
        },
      }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #00182a 0%, #006a68 100%);
        }
    </style>
</head>
<body class="bg-surface text-on-surface">
    <!-- Main Content without Navbar -->
    <main class="min-h-screen flex items-center justify-center py-xl px-margin-mobile bg-surface-container-low">
        <!-- Split-Screen Centered Layout -->
        <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-2 bg-surface-container-lowest rounded-xl overflow-hidden shadow-xl border border-outline-variant">
            <!-- Left Side: Brand Messaging & Visual -->
            <div class="hero-gradient p-xl flex flex-col justify-between relative overflow-hidden hidden lg:flex">
                <div class="absolute inset-0 opacity-20"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-xs mb-lg">
                        <span class="material-symbols-outlined text-secondary-fixed text-4xl" data-icon="admin_panel_settings">admin_panel_settings</span>
                        <span class="text-white font-headline-md text-headline-md font-bold">KerjaYok <span class="text-secondary-fixed">Admin</span></span>
                    </div>
                    <h1 class="font-headline-xl text-headline-xl text-white mb-sm">Panel Administrasi KerjaYok</h1>
                    <p class="font-body-lg text-body-lg text-primary-fixed-dim max-w-md">Kelola platform dengan efisien. Pantau statistik, atur pengguna, dan pastikan ekosistem tetap berjalan lancar.</p>
                </div>
                <div class="relative z-10">
                    <div class="bg-primary/40 backdrop-blur-md p-md rounded-lg border border-white/10">
                        <div class="flex items-center gap-sm mb-xs">
                            <span class="w-3 h-3 bg-secondary-fixed rounded-full animate-pulse"></span>
                            <span class="font-label-md text-label-md text-white">Sistem Aktif</span>
                        </div>
                        <p class="font-body-sm text-body-sm text-white/80">Keamanan berlapis tingkat enterprise melindungi data administrator.</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Sign-In Form -->
            <div class="p-xl flex flex-col justify-center">
                <div class="max-w-sm mx-auto w-full">
                    <div class="mb-lg">
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Masuk Admin</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant">Silakan masukkan kredensial administrator Anda.</p>
                    </div>

                    <!-- Alerts -->
                    @if ($errors->any())
                        <div class="mb-4 p-4 rounded-lg bg-error-container text-on-error-container text-body-sm font-semibold border border-error/20 flex flex-col gap-1">
                            @foreach ($errors->all() as $error)
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[16px] text-error" data-icon="error">error</span>
                                    <span>{{ $error }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="mb-4 p-4 rounded-lg bg-secondary-container text-on-secondary-container text-body-sm font-semibold border border-secondary/20 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">info</span>
                            <span>{{ session('info') }}</span>
                        </div>
                    @endif

                    <form class="space-y-md" method="POST" action="{{ route('admin.login.post') }}">
                        @csrf
                        <!-- Email Field -->
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-primary" for="email">Email Admin</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline" data-icon="mail">mail</span>
                                <input class="w-full pl-12 pr-md py-3 bg-surface border border-outline-variant rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all font-body-md text-body-md" id="email" name="email" value="{{ old('email') }}" placeholder="admin@kerjayok.com" type="email" required>
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <label class="font-label-md text-label-md text-primary" for="password">Password</label>
                                <a class="font-label-sm text-label-sm text-secondary hover:underline" href="#">Lupa Password?</a>
                            </div>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline" data-icon="lock">lock</span>
                                <input class="w-full pl-12 pr-12 py-3 bg-surface border border-outline-variant rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all font-body-md text-body-md" id="password" name="password" placeholder="Masukkan password" type="password" required>
                                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-secondary" onclick="togglePassword()" type="button">
                                    <span class="material-symbols-outlined" data-icon="visibility" id="password-toggle-icon">visibility</span>
                                </button>
                            </div>
                        </div>
                        <!-- Remember Me -->
                        <div class="flex items-center gap-xs">
                            <input class="w-4 h-4 text-secondary border-outline-variant rounded focus:ring-secondary" id="remember" type="checkbox">
                            <label class="font-body-sm text-body-sm text-on-surface-variant cursor-pointer" for="remember">Ingat Saya</label>
                        </div>
                        <!-- Submit Button -->
                        <button class="w-full bg-secondary text-on-secondary font-label-md text-label-md py-4 rounded-lg hover:bg-secondary/90 shadow-md transition-all active:scale-[0.98]" type="submit">
                            Masuk
                        </button>
                    </form>
                    <!-- Extra Links -->
                    <div class="mt-xl pt-lg border-t border-outline-variant text-center">
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Bukan administrator? 
                            <a class="text-secondary font-semibold hover:underline" href="/">Halaman Utama</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-primary py-xl border-t border-outline-variant">
        <div class="max-w-7xl mx-auto px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-gutter">
            <div class="flex flex-col items-center md:items-start gap-xs">
                <span class="font-headline-md text-headline-md font-bold text-on-primary">KerjaYok</span>
                <p class="font-label-sm text-label-sm text-on-primary-container/80">© 2024 KerjaYok. All rights reserved.</p>
            </div>
            <div class="flex gap-md">
                <a class="font-label-sm text-label-sm text-on-primary-container/80 hover:text-secondary-fixed-dim transition-colors" href="#">About Us</a>
                <a class="font-label-sm text-label-sm text-on-primary-container/80 hover:text-secondary-fixed-dim transition-colors" href="#">Contact</a>
                <a class="font-label-sm text-label-sm text-on-primary-container/80 hover:text-secondary-fixed-dim transition-colors" href="#">Privacy Policy</a>
                <a class="font-label-sm text-label-sm text-on-primary-container/80 hover:text-secondary-fixed-dim transition-colors" href="#">Terms of Service</a>
                <a class="font-label-sm text-label-sm text-on-primary-container/80 hover:text-secondary-fixed-dim transition-colors" href="#">Help Center</a>
            </div>
        </div>
    </footer>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('password-toggle-icon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                pwd.type = 'password';
                icon.textContent = 'visibility';
            }
        }
    </script>
</body>
</html>
