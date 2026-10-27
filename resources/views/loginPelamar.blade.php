<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk - KerjaYok</title>
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
    <!-- TopNavBar -->
    <header class="bg-primary dark:bg-primary-container shadow-md sticky top-0 z-50">
    </header>
    
    <main class="min-h-[calc(100vh-140px)] flex items-center justify-center gradient-mesh relative overflow-hidden" style="background-position: 6.36px 2.785px;">
        <!-- Floating Elements for Atmosphere -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary-container/20 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl w-full px-margin-desktop py-xl grid grid-cols-1 md:grid-cols-2 gap-xl items-center relative z-10">
            <!-- Left Content: Hero Text -->
            <div class="hidden md:block space-y-md text-on-primary">
                <h1 class="font-headline-xl text-headline-xl leading-tight text-white">
                    Selamat Datang Kembali di <span class="text-secondary-fixed font-bold">KerjaYok</span>
                </h1>
                <p class="font-body-lg text-body-lg text-on-primary-container max-w-md opacity-90">
                    Temukan peluang karir terbaikmu hari ini. Hubungkan dirimu dengan ribuan perusahaan ternama dengan kecepatan tinggi.
                </p>
                <div class="pt-md flex gap-sm items-center text-secondary-fixed">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">speed</span>
                    <span class="font-label-md">Proses lamaran 2x lebih cepat</span>
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
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Masuk ke Akun Pelamar</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Lanjutkan perjalanan karir Anda sekarang.</p>
                    </div>
                    
                    <!-- Alerts -->
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

                    <form action="{{ route('login.pelamar') }}" method="POST" class="space-y-md">
                        @csrf
                        
                        <div class="space-y-xs">
                            <label class="font-label-md text-on-surface-variant block">Username</label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline group-focus-within:text-secondary transition-colors">person</span>
                                <input name="username" id="usn" class="w-full pl-xl pr-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all placeholder:text-outline-variant" placeholder="Masukkan Username" type="text" value="{{ old('username') }}" required>
                            </div>
                        </div>
                        
                        <div class="space-y-xs">
                            <label class="font-label-md text-on-surface-variant block">Password</label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline group-focus-within:text-secondary transition-colors">lock</span>
                                <input name="password" class="w-full pl-xl pr-xl py-sm bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all placeholder:text-outline-variant" id="passwordInput" placeholder="Masukkan Password" type="password" required>
                                <button class="absolute right-sm top-1/2 -translate-y-1/2 text-outline hover:text-secondary" onclick="togglePassword()" type="button">
                                    <span class="material-symbols-outlined" id="passIcon">visibility</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between py-xs">
                            <label class="flex items-center gap-xs cursor-pointer">
                                <input class="w-4 h-4 rounded border-outline-variant text-secondary focus:ring-secondary" type="checkbox">
                                <span class="font-body-sm text-on-surface-variant">Ingat Saya</span>
                            </label>
                            <a class="font-label-sm text-secondary hover:underline cursor-pointer" onclick="openForgotPasswordModal()">Lupa kata sandi?</a>
                        </div>
                        
                        <button class="w-full bg-secondary text-on-secondary py-sm rounded-lg font-headline-md shadow-md hover:bg-secondary/90 hover:shadow-lg transition-all active:scale-95 duration-200" type="submit">
                            Masuk
                        </button>
                    </form>
                    
                    <div class="mt-lg flex flex-col items-center gap-md">
                        <div class="relative w-full text-center">
                            <span class="bg-surface-container-lowest px-md text-body-sm text-outline relative z-10">Atau</span>
                            <div class="absolute top-1/2 w-full h-px bg-outline-variant -z-0"></div>
                        </div>

                        <!-- Google Sign-in Button -->
                        <button id="googleSignInBtn" type="button" class="w-full flex items-center justify-center gap-3 bg-white hover:bg-gray-50 border border-outline-variant text-on-surface py-sm rounded-lg font-semibold shadow-sm transition-all active:scale-95 duration-200">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Masuk dengan Google
                        </button>

                        <p class="font-body-sm text-on-surface-variant">
                            Belum punya akun? <a class="text-secondary font-bold hover:underline" href="/register/pelamar">Daftar</a>
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

    <!-- Modal Lupa Password -->
    <div id="forgotPasswordModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeForgotPasswordModal()"></div>
        <div class="glass-card w-full max-w-md p-md rounded-xl shadow-2xl relative z-10 mx-margin-mobile">
            <div class="flex justify-between items-center mb-md">
                <h3 class="font-headline-md text-headline-md text-primary">Reset Kata Sandi</h3>
                <button onclick="closeForgotPasswordModal()" class="text-outline hover:text-secondary">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Masukkan email akun Anda. Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.</p>
            <div id="forgotPasswordError" class="mb-sm hidden p-sm bg-error-container text-on-error-container rounded-lg text-body-sm border border-error/20 flex items-center gap-xs">
                <span class="material-symbols-outlined text-error">error</span>
                <span id="forgotPasswordErrorText"></span>
            </div>
            <div id="forgotPasswordSuccess" class="mb-sm hidden p-sm bg-secondary-container text-on-secondary-container rounded-lg text-body-sm border border-secondary/20 flex items-center gap-xs">
                <span class="material-symbols-outlined text-secondary">check_circle</span>
                <span>Tautan reset kata sandi telah dikirim ke email Anda.</span>
            </div>
            <div class="space-y-xs mb-md">
                <label class="font-label-md text-on-surface-variant block">Alamat Email</label>
                <input id="forgotPasswordEmail" class="w-full px-sm py-xs rounded-lg border border-outline-variant bg-surface-container-lowest font-body-md focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all placeholder:text-outline-variant" placeholder="name@email.com" type="email" required>
            </div>
            <button id="sendResetLinkBtn" onclick="sendPasswordReset()" class="w-full bg-secondary text-on-secondary py-sm rounded-lg font-headline-md shadow-md hover:bg-secondary/90 transition-all active:scale-95 duration-200">
                Kirim Tautan Reset
            </button>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('passIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        // Add a subtle parallax effect on mouse move
        document.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
            document.querySelector('.gradient-mesh').style.backgroundPosition = `${moveX}px ${moveY}px`;
        });
    </script>

    <!-- Firebase SDK Integration -->
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
        import { 
            getAuth, 
            signInWithEmailAndPassword, 
            signInWithPopup, 
            GoogleAuthProvider,
            sendPasswordResetEmail,
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

        // Sign out initially to clear any old states
        signOut(auth).catch(e => console.log('initial signout err', e));

        // Assign to window for forgot password modal triggers
        window.openForgotPasswordModal = function() {
            document.getElementById('forgotPasswordModal').classList.remove('hidden');
            document.getElementById('forgotPasswordEmail').value = '';
            document.getElementById('forgotPasswordError').classList.add('hidden');
            document.getElementById('forgotPasswordSuccess').classList.add('hidden');
        };

        window.closeForgotPasswordModal = function() {
            document.getElementById('forgotPasswordModal').classList.add('hidden');
        };

        window.sendPasswordReset = async function() {
            const email = document.getElementById('forgotPasswordEmail').value;
            const btn = document.getElementById('sendResetLinkBtn');
            const errorDiv = document.getElementById('forgotPasswordError');
            const errorText = document.getElementById('forgotPasswordErrorText');
            const successDiv = document.getElementById('forgotPasswordSuccess');
            
            if (!email) {
                errorText.textContent = 'Harap isi alamat email Anda.';
                errorDiv.classList.remove('hidden');
                return;
            }
            
            btn.disabled = true;
            btn.textContent = 'Mengirim...';
            errorDiv.classList.add('hidden');
            successDiv.classList.add('hidden');
            
            try {
                await sendPasswordResetEmail(auth, email);
                successDiv.classList.remove('hidden');
            } catch (error) {
                console.error(error);
                let msg = 'Gagal mengirim email reset kata sandi.';
                if (error.code === 'auth/invalid-email') {
                    msg = 'Format email tidak valid.';
                } else if (error.code === 'auth/user-not-found') {
                    msg = 'Email tidak ditemukan.';
                }
                errorText.textContent = msg;
                errorDiv.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Kirim Tautan Reset';
            }
        };

        // Intercept native login form
        const form = document.querySelector('form[action*="login/pelamar"]');
        const loginBtn = form.querySelector('button[type="submit"]');
        let errorAlertContainer = document.querySelector('.bg-error-container');
        
        if (!errorAlertContainer) {
            errorAlertContainer = document.createElement('div');
            errorAlertContainer.className = "mb-4 p-4 rounded-lg bg-error-container text-on-error-container text-body-sm font-semibold border border-error/20 flex flex-col gap-1 hidden";
            form.parentNode.insertBefore(errorAlertContainer, form);
        }

        function showError(message) {
            errorAlertContainer.innerHTML = `
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px] text-error">error</span>
                    <span>${message}</span>
                </div>
            `;
            errorAlertContainer.classList.remove('hidden');
        }

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const usernameInput = document.getElementById('usn');
            const passwordInput = document.getElementById('passwordInput');
            const username = usernameInput.value;
            const password = passwordInput.value;

            // Set loading state
            loginBtn.disabled = true;
            loginBtn.textContent = 'Memproses...';
            errorAlertContainer.classList.add('hidden');

            try {
                // 1. Get Email from Username or Email
                const emailResponse = await fetch("{{ url('/login/pelamar/get-email') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ username: username })
                });

                const emailData = await emailResponse.json();

                if (!emailResponse.ok || !emailData.success) {
                    showError(emailData.message || 'Username atau email tidak ditemukan.');
                    loginBtn.disabled = false;
                    loginBtn.textContent = 'Masuk';
                    return;
                }

                const resolvedEmail = emailData.email;

                // 2. Sign in via Firebase Auth
                const userCredential = await signInWithEmailAndPassword(auth, resolvedEmail, password);
                const user = userCredential.user;
                const idToken = await user.getIdToken();

                // 3. Append hidden inputs and submit to backend
                let idTokenInput = document.createElement('input');
                idTokenInput.type = 'hidden';
                idTokenInput.name = 'idToken';
                idTokenInput.value = idToken;
                form.appendChild(idTokenInput);

                let uidInput = document.createElement('input');
                uidInput.type = 'hidden';
                uidInput.name = 'firebase_uid';
                uidInput.value = user.uid;
                form.appendChild(uidInput);

                form.submit();

            } catch (error) {
                console.warn('Firebase login failed, trying fallback database authentication...', error);
                
                // If it's a credential or user-not-found error, the user might be a legacy user not registered in Firebase yet.
                // We submit the form natively to let Laravel check the local password hash.
                if (error.code === 'auth/invalid-credential' || error.code === 'auth/wrong-password' || error.code === 'auth/user-not-found') {
                    form.submit();
                } else {
                    showError('Gagal masuk. Silakan periksa kembali email/username dan kata sandi Anda.');
                    loginBtn.disabled = false;
                    loginBtn.textContent = 'Masuk';
                }
            }
        });

        // Google Sign In
        const googleBtn = document.getElementById('googleSignInBtn');
        googleBtn.addEventListener('click', async function() {
            googleBtn.disabled = true;
            const originalText = googleBtn.innerHTML;
            googleBtn.innerHTML = 'Memproses...';
            errorAlertContainer.classList.add('hidden');

            try {
                const result = await signInWithPopup(auth, provider);
                const user = result.user;
                const idToken = await user.getIdToken();

                // Send to backend via AJAX
                const backendResponse = await fetch("{{ url('/auth/firebase/google') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        idToken: idToken,
                        firebase_uid: user.uid,
                        nama_lengkap: user.displayName || user.email.split('@')[0]
                    })
                });

                const backendData = await backendResponse.json();

                if (backendResponse.ok && backendData.success) {
                    window.location.href = backendData.redirect;
                } else {
                    showError(backendData.message || 'Gagal masuk dengan Google.');
                    googleBtn.disabled = false;
                    googleBtn.innerHTML = originalText;
                }
            } catch (error) {
                console.error(error);
                showError(`Gagal masuk dengan Google: ${error.message} (${error.code})`);
                googleBtn.disabled = false;
                googleBtn.innerHTML = originalText;
            }
        });
    </script>
</body>
</html>
