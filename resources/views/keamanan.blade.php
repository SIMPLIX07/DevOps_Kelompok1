<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Keamanan Akun - KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#000000",
                        secondary: "#006a68",
                        "secondary-container": "#a0f1ed",
                        "on-secondary-container": "#006e6d",
                        background: "#f7fafc",
                        surface: "#ffffff",
                        "surface-container": "#ebeef0",
                        "surface-container-low": "#f1f4f6",
                        "on-surface": "#181c1e",
                        "on-surface-variant": "#43474c",
                        "outline-variant": "#c3c7cd",
                        error: "#ba1a1a",
                        "error-container": "#ffdad6",
                    }
                }
            }
        };
    </script>
</head>

<body class="bg-background text-on-surface font-['Inter'] min-h-screen flex flex-col justify-between">
    <!-- Header -->
    <header class="bg-white border-b border-outline-variant/40 sticky top-0 z-40">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="text-2xl font-bold font-['Manrope'] text-primary">Kerja<span class="text-secondary">Yok</span></span>
            </a>
            <div class="flex items-center gap-4">
                <a href="{{ route('pelamar.settings') }}" class="text-sm font-medium text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Kembali ke Pengaturan
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-3xl mx-auto px-4 sm:px-6 py-10 w-full flex-1">
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold font-['Manrope'] text-on-surface flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary text-3xl">security</span>
                Keamanan dan Kata Sandi
            </h1>
            <p class="text-sm text-on-surface-variant mt-1">
                Kelola keamanan akun dan perbarui kata sandi Anda secara berkala.
            </p>
        </div>

        <!-- Success Alert -->
        @if (session('success_password'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center gap-3">
                <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                <span class="text-sm font-medium">{{ session('success_password') }}</span>
            </div>
        @endif

        <!-- General Error Alert -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
                <div class="flex items-center gap-2 mb-2 font-semibold text-sm text-red-900">
                    <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                    Terjadi kesalahan saat memperbarui kata sandi:
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-2xl border border-outline-variant/40 shadow-sm overflow-hidden mb-8">
            <!-- Account Info Summary -->
            <div class="p-6 border-b border-outline-variant/30 bg-surface-container-low/40">
                <h2 class="text-base font-semibold text-on-surface mb-3">Informasi Akun</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-xs text-on-surface-variant block">Nama Lengkap</span>
                        <span class="font-medium text-on-surface">{{ $pelamar->nama_lengkap ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-on-surface-variant block">Email Terdaftar</span>
                        <span class="font-medium text-on-surface">{{ $pelamar->email ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Password Form -->
            <form action="{{ route('pelamar.updatePassword') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <!-- Current Password -->
                <div>
                    <label for="password_lama" class="block text-xs font-semibold text-on-surface mb-1.5">
                        Kata Sandi Saat Ini <span class="text-error">*</span>
                    </label>
                    <div class="relative">
                        <input type="password" id="password_lama" name="password_lama" required
                            class="w-full px-4 py-2.5 pr-10 text-sm rounded-xl border border-outline-variant/60 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                            placeholder="Masukkan kata sandi lama">
                        <button type="button" onclick="togglePasswordVisibility('password_lama', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-on-surface">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                    @error('password_lama')
                        <p class="text-xs text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label for="password_baru" class="block text-xs font-semibold text-on-surface mb-1.5">
                        Kata Sandi Baru <span class="text-error">*</span>
                    </label>
                    <div class="relative">
                        <input type="password" id="password_baru" name="password_baru" required minlength="8"
                            class="w-full px-4 py-2.5 pr-10 text-sm rounded-xl border border-outline-variant/60 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                            placeholder="Minimal 8 karakter">
                        <button type="button" onclick="togglePasswordVisibility('password_baru', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-on-surface">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                    @error('password_baru')
                        <p class="text-xs text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_baru_confirmation" class="block text-xs font-semibold text-on-surface mb-1.5">
                        Konfirmasi Kata Sandi Baru <span class="text-error">*</span>
                    </label>
                    <div class="relative">
                        <input type="password" id="password_baru_confirmation" name="password_baru_confirmation" required minlength="8"
                            class="w-full px-4 py-2.5 pr-10 text-sm rounded-xl border border-outline-variant/60 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                            placeholder="Ketik ulang kata sandi baru">
                        <button type="button" onclick="togglePasswordVisibility('password_baru_confirmation', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-on-surface">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Password Security Requirements Tip -->
                <div class="p-3.5 bg-surface-container-low rounded-xl text-xs text-on-surface-variant space-y-1">
                    <span class="font-semibold text-on-surface flex items-center gap-1">
                        <span class="material-symbols-outlined text-secondary text-[16px]">info</span>
                        Tips Keamanan Kata Sandi:
                    </span>
                    <ul class="list-disc list-inside space-y-0.5 ml-1 text-on-surface-variant">
                        <li>Minimal 8 karakter</li>
                        <li>Gunakan kombinasi huruf besar, huruf kecil, dan angka</li>
                        <li>Jangan gunakan kata sandi yang sama dengan akun lain</li>
                    </ul>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3 pt-3 border-t border-outline-variant/20">
                    <a href="{{ route('pelamar.settings') }}" class="px-5 py-2.5 rounded-xl border border-outline-variant text-xs font-semibold text-on-surface-variant hover:bg-surface-container-low transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-secondary text-white text-xs font-semibold hover:bg-secondary/90 transition-all shadow-sm">
                        Simpan Kata Sandi
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-outline-variant/30 py-6 text-center text-xs text-on-surface-variant">
        &copy; {{ date('Y') }} KerjaYok. All rights reserved.
    </footer>

    <script>
        function togglePasswordVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('.material-symbols-outlined');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }
    </script>
</body>

</html>

