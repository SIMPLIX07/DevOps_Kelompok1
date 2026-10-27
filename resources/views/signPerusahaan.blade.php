<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daftar Perusahaan | KerjaYok</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed-dim": "#77d6d3",
                        "tertiary-fixed": "#79f7ea",
                        "secondary": "#006a68",
                        "on-tertiary-fixed": "#00201d",
                        "on-surface": "#181c1e",
                        "on-error-container": "#93000a",
                        "tertiary-fixed-dim": "#5adace",
                        "on-tertiary-fixed-variant": "#00504a",
                        "on-secondary-container": "#006e6d",
                        "error": "#ba1a1a",
                        "secondary-fixed": "#94f2f0",
                        "on-primary-container": "#7b95ae",
                        "outline-variant": "#c3c7cd",
                        "surface-container": "#ebeef0",
                        "on-secondary": "#ffffff",
                        "error-container": "#ffdad6",
                        "primary-fixed": "#cde5ff",
                        "on-error": "#ffffff",
                        "on-background": "#181c1e",
                        "surface-bright": "#f7fafc",
                        "secondary-container": "#91f0ed",
                        "on-primary-fixed-variant": "#2f495f",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed": "#001d31",
                        "outline": "#73777d",
                        "on-surface-variant": "#43474c",
                        "inverse-on-surface": "#eef1f3",
                        "surface": "#f7fafc",
                        "surface-dim": "#d7dadc",
                        "surface-container-highest": "#e0e3e5",
                        "primary-fixed-dim": "#afc9e4",
                        "tertiary-container": "#00312d",
                        "surface-variant": "#e0e3e5",
                        "on-secondary-fixed-variant": "#00504e",
                        "tertiary": "#001a18",
                        "on-secondary-fixed": "#00201f",
                        "on-primary": "#ffffff",
                        "surface-container-high": "#e5e9eb",
                        "surface-container-low": "#f1f4f6",
                        "on-tertiary-container": "#00a499",
                        "on-tertiary": "#ffffff",
                        "surface-tint": "#476178",
                        "background": "#f7fafc",
                        "inverse-surface": "#2d3133",
                        "primary-container": "#112d42",
                        "primary": "#00182a",
                        "inverse-primary": "#afc9e4"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base": "4px",
                        "gutter": "24px",
                        "xl": "64px",
                        "lg": "40px",
                        "md": "24px",
                        "sm": "16px",
                        "margin-mobile": "16px",
                        "margin-desktop": "48px",
                        "xs": "8px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-lg": ["Manrope"],
                        "body-md": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-md": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-xl": ["Manrope"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                        "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            box-shadow: 0 0 0 2px #319795;
            border-color: #319795 !important;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid #E2E8F0;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-secondary-container selection:text-on-secondary-container">
    <main class="min-h-[calc(100vh-160px)] flex items-center justify-center py-xl px-margin-mobile md:px-margin-desktop">
        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-12 rounded-[2rem] overflow-hidden shadow-2xl glass-card">
            <!-- Left Side: Visual & Marketing (Illustrative Panel) -->
            <div class="hidden md:flex md:col-span-5 bg-gradient-to-br from-[#00182a] via-[#112d42] to-[#006a68] p-xl flex-col justify-between text-on-primary relative overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-96 h-96 bg-secondary/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-tertiary-container/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
                
                <div class="relative z-10">
                    <h1 class="font-headline-xl text-headline-xl text-white mb-md leading-tight">Rekrut Talenta Terbaik Sekarang</h1>
                    <p class="font-body-lg text-body-lg text-primary-fixed max-w-md opacity-90 mb-xl">Bangun tim impian Anda dengan platform rekrutmen tercepat dan paling terintegrasi di Indonesia.</p>
                    
                    <div class="space-y-md">
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed p-xs bg-secondary/20 rounded-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            <div>
                                <h3 class="font-label-md text-label-md text-white font-bold">Akses 1jt+ Pelamar</h3>
                                <p class="font-body-sm text-body-sm text-primary-fixed opacity-85">Temukan kandidat potensial dari berbagai latar belakang industri.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed p-xs bg-secondary/20 rounded-lg" style="font-variation-settings: 'FILL' 1;">sync_alt</span>
                            <div>
                                <h3 class="font-label-md text-label-md text-white font-bold">Sistem ATS Terintegrasi</h3>
                                <p class="font-body-sm text-body-sm text-primary-fixed opacity-85">Kelola seluruh proses lamaran dalam satu dashboard efisien.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed p-xs bg-secondary/20 rounded-lg" style="font-variation-settings: 'FILL' 1;">analytics</span>
                            <div>
                                <h3 class="font-label-md text-label-md text-white font-bold">Analitik Real-time</h3>
                                <p class="font-body-sm text-body-sm text-primary-fixed opacity-85">Dapatkan wawasan mendalam tentang performa lowongan kerja Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative z-10 mt-xl">
                    <img alt="Modern Office Collaboration" class="rounded-xl shadow-lg border-2 border-white/20 object-cover aspect-video w-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5vq7CoRxbtjeDTdyQvztHhgWhB1cfSJmSwP16aD9QG0RtZFZq6XUfsPPlvVFBH89Unsf_yWmsBUNbF0PgqV_Rd4eKd3ZaifAFeZT0GIeDHgCtoFY1t9I5gobqypA6PjGiGEMd46iJ9HNPpQK9fmJO6GnrzT0wEg-H3WY6g0Qb8oGrmAYnJ1qiV6-JT6miNV0o9oZbRIqGt4mUgwVzbfTxznTWBDEg7THbAKmpBWIhysyrnAInCDKJTi4YbNGMQfOdlEr1DSS3uG4">
                </div>
            </div>
            
            <!-- Right Side: Sign Up Form -->
            <div class="md:col-span-7 p-md md:p-xl bg-white">
                <div class="max-w-2xl mx-auto">
                    <div class="mb-lg flex flex-col gap-1">
                        <a href="/pilihRole" class="flex items-center gap-2 text-secondary hover:text-primary transition-colors font-semibold text-sm w-fit mb-2">
                            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                            Kembali ke Pilih Peran
                        </a>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Pendaftaran Perusahaan</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant">Lengkapi detail perusahaan Anda untuk mulai memasang lowongan.</p>
                    </div>
                    
                    <form action="{{ route('register.perusahaan') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-md">
                        @csrf
                        
                        <!-- Alerts -->
                        @if ($errors->any())
                            <div class="col-span-full p-4 rounded-lg bg-error-container text-on-error-container text-body-sm font-semibold border border-error/20 flex flex-col gap-1">
                                @foreach ($errors->all() as $err)
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[16px] text-error">error</span>
                                        <span>{{ $err }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="col-span-full p-4 rounded-lg bg-secondary-container text-on-secondary-container text-body-sm font-semibold border border-secondary/20 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">task_alt</span>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <!-- Column 1 & 2 Inputs -->
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Nama Perusahaan</label>
                            <input name="nama_perusahaan" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md focus:ring-2 focus:ring-secondary/20 transition-all" placeholder="PT. Contoh Teknologi" type="text" value="{{ old('nama_perusahaan') }}" required>
                        </div>
                        
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Email Perusahaan</label>
                            <input name="email" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md" placeholder="hrd@perusahaan.com" type="email" value="{{ old('email') }}" required>
                        </div>
                        
                        <div class="space-y-xs relative">
                            <label class="font-label-md text-label-md text-on-surface-variant">Password</label>
                            <div class="relative">
                                <input name="password" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md pr-12" id="password-input" placeholder="••••••••" type="password" required minlength="6">
                                <button class="absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-secondary" onclick="togglePassword()" type="button">
                                    <span class="material-symbols-outlined" id="password-icon">visibility</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Nomor Telepon Perusahaan</label>
                            <input name="telepon" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md" placeholder="+62 812 3456 789" type="tel" value="{{ old('telepon') }}" required>
                        </div>
                        
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">NPWP Perusahaan</label>
                            <input name="npwp" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md" placeholder="00.000.000.0-000.000" type="text" value="{{ old('npwp') }}" required>
                        </div>
                        
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Sektor Industri</label>
                            <select name="sektor_industri" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md appearance-none bg-white" required>
                                <option value="" disabled {{ old('sektor_industri') ? '' : 'selected' }}>Pilih Industri</option>
                                <option value="Teknologi Informasi" {{ old('sektor_industri') == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                                <option value="Keuangan & Perbankan" {{ old('sektor_industri') == 'Keuangan & Perbankan' ? 'selected' : '' }}>Keuangan & Perbankan</option>
                                <option value="Manufaktur & Logistik" {{ old('sektor_industri') == 'Manufaktur & Logistik' ? 'selected' : '' }}>Manufaktur & Logistik</option>
                                <option value="Kesehatan & Farmasi" {{ old('sektor_industri') == 'Kesehatan & Farmasi' ? 'selected' : '' }}>Kesehatan & Farmasi</option>
                                <option value="BUMN & Layanan Publik" {{ old('sektor_industri') == 'BUMN & Layanan Publik' ? 'selected' : '' }}>BUMN & Layanan Publik</option>
                                <option value="Energi & Kelistrikan" {{ old('sektor_industri') == 'Energi & Kelistrikan' ? 'selected' : '' }}>Energi & Kelistrikan</option>
                                <option value="Pendidikan" {{ old('sektor_industri') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                <option value="Lainnya" {{ old('sektor_industri') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="col-span-full space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Alamat Lengkap Perusahaan</label>
                            <textarea name="alamat" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md" placeholder="Jl. Sudirman No. 1, Jakarta Pusat" rows="2" required>{{ old('alamat') }}</textarea>
                        </div>
                        
                        <div class="col-span-full space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Deskripsi Singkat Perusahaan</label>
                            <textarea name="deskripsi" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md" placeholder="Ceritakan visi dan misi perusahaan Anda..." rows="3" required>{{ old('deskripsi') }}</textarea>
                        </div>
                        
                        <div class="col-span-full space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Website / LinkedIn (Opsional)</label>
                            <input name="website" class="w-full px-md py-sm border border-outline rounded-lg font-body-md text-body-md" placeholder="https://www.perusahaan.com" type="text" value="{{ old('website') }}">
                        </div>
                        
                        <!-- Upload Buttons -->
                        <div class="col-span-full grid grid-cols-1 md:grid-cols-2 gap-sm pt-sm">
                            <!-- Foto Profil (Opsional) -->
                            <input type="file" name="foto_profil" id="foto-profil-input" hidden accept="image/*">
                            <button class="flex items-center justify-center gap-xs px-md py-sm border-2 border-dashed border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container transition-all" type="button" onclick="triggerFotoProfil()">
                                <span class="material-symbols-outlined" id="foto-profil-icon">add_a_photo</span>
                                <span class="font-label-md text-label-md text-left truncate max-w-[180px]" id="foto-profil-label">Upload Foto Profil (Opsional)</span>
                            </button>
                            
                            <!-- Sertifikat Perusahaan -->
                            <input type="file" name="sertifikat" id="sertifikat-input" hidden accept="image/*,application/pdf" required>
                            <button class="flex items-center justify-center gap-xs px-md py-sm border-2 border-dashed border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container transition-all" type="button" onclick="triggerSertifikat()">
                                <span class="material-symbols-outlined" id="sertifikat-icon">verified_user</span>
                                <span class="font-label-md text-label-md text-left truncate max-w-[180px]" id="sertifikat-label">Upload Sertifikat Perusahaan</span>
                            </button>
                        </div>
                        
                        <!-- Primary CTA -->
                        <div class="col-span-full pt-md">
                            <button class="w-full bg-secondary text-white py-md rounded-xl font-label-md text-label-md shadow-md hover:bg-secondary-container hover:text-on-secondary-container transition-all active:scale-95 duration-150" type="submit">
                                Daftar Sekarang
                            </button>
                            <p class="text-center mt-md font-body-sm text-body-sm text-on-surface-variant">
                                Sudah punya akun? <a class="text-secondary font-bold hover:underline" href="/login/perusahaan">Masuk</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="w-full py-xl px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-md bg-surface-container-highest dark:bg-inverse-surface border-t border-outline-variant">
        <div class="w-full px-margin-desktop py-lg flex flex-col md:flex-row justify-between items-center gap-md max-w-7xl mx-auto">
            <div class="space-y-xs text-center md:text-left">
                <span class="font-headline-md text-headline-md font-black text-primary dark:text-inverse-primary block">KerjaYok</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant">© 2024 KerjaYok. Empowering your next career move.</p>
            </div>
            <div class="flex gap-lg flex-wrap justify-center">
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary hover:underline transition-all" href="/tentang-kami">Tentang Kami</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary hover:underline transition-all" href="#">Pusat Bantuan</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary hover:underline transition-all" href="#">Kebijakan Privasi</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary hover:underline transition-all" href="#">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </footer>
    
    <script>
        function togglePassword() {
            const input = document.getElementById('password-input');
            const icon = document.getElementById('password-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        function triggerFotoProfil() {
            document.getElementById('foto-profil-input').click();
        }

        function triggerSertifikat() {
            document.getElementById('sertifikat-input').click();
        }

        document.getElementById('foto-profil-input').addEventListener('change', function(e) {
            const label = document.getElementById('foto-profil-label');
            const icon = document.getElementById('foto-profil-icon');
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                label.textContent = fileName;
                icon.textContent = 'check_circle';
            } else {
                label.textContent = 'Upload Foto Profil (Opsional)';
                icon.textContent = 'add_a_photo';
            }
        });

        document.getElementById('sertifikat-input').addEventListener('change', function(e) {
            const label = document.getElementById('sertifikat-label');
            const icon = document.getElementById('sertifikat-icon');
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                label.textContent = fileName;
                icon.textContent = 'check_circle';
            } else {
                label.textContent = 'Upload Sertifikat Perusahaan';
                icon.textContent = 'verified_user';
            }
        });
    </script>
</body>
</html>