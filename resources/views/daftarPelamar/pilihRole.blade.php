<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>KerjaYok - Pilih Peran</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "surface-variant": "#e0e3e5",
                      "tertiary-container": "#00312d",
                      "surface": "#f7fafc",
                      "secondary-fixed-dim": "#77d6d3",
                      "primary-fixed": "#cde5ff",
                      "on-tertiary-container": "#00a499",
                      "on-secondary-fixed-variant": "#00504e",
                      "on-primary-fixed-variant": "#2f495f",
                      "secondary-fixed": "#94f2f0",
                      "surface-bright": "#f7fafc",
                      "on-tertiary-fixed-variant": "#00504a",
                      "on-secondary": "#ffffff",
                      "on-surface": "#181c1e",
                      "on-secondary-container": "#006e6d",
                      "background": "#f7fafc",
                      "on-error-container": "#93000a",
                      "inverse-surface": "#2d3133",
                      "tertiary": "#001a18",
                      "on-error": "#ffffff",
                      "outline": "#73777d",
                      "tertiary-fixed": "#79f7ea",
                      "on-surface-variant": "#43474c",
                      "on-secondary-fixed": "#00201f",
                      "tertiary-fixed-dim": "#5adace",
                      "surface-container-low": "#f1f4f6",
                      "outline-variant": "#c3c7cd",
                      "primary-fixed-dim": "#afc9e4",
                      "surface-container-highest": "#e0e3e5",
                      "error-container": "#ffdad6",
                      "inverse-on-surface": "#eef1f3",
                      "on-tertiary": "#ffffff",
                      "on-background": "#181c1e",
                      "surface-container": "#ebeef0",
                      "on-primary-container": "#7b95ae",
                      "on-primary": "#ffffff",
                      "surface-container-lowest": "#ffffff",
                      "inverse-primary": "#afc9e4",
                      "secondary": "#006a68",
                      "secondary-container": "#91f0ed",
                      "error": "#ba1a1a",
                      "surface-dim": "#d7dadc",
                      "surface-tint": "#476178",
                      "primary": "#00182a",
                      "surface-container-high": "#e5e9eb",
                      "primary-container": "#112d42",
                      "on-tertiary-fixed": "#00201d",
                      "on-primary-fixed": "#001d31"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "spacing": {
                      "base": "4px",
                      "margin-desktop": "48px",
                      "gutter": "24px",
                      "xs": "8px",
                      "margin-mobile": "16px",
                      "xl": "64px",
                      "sm": "16px",
                      "lg": "40px",
                      "md": "24px"
              },
              "fontFamily": {
                      "headline-xl": ["Manrope"],
                      "headline-md": ["Manrope"],
                      "body-lg": ["Inter"],
                      "label-sm": ["Inter"],
                      "body-sm": ["Inter"],
                      "label-md": ["Inter"],
                      "body-md": ["Inter"],
                      "headline-lg-mobile": ["Manrope"],
                      "headline-lg": ["Manrope"]
              },
              "fontSize": {
                      "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                      "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                      "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                      "label-sm": ["12px", {"lineHeight": "14px", "fontWeight": "500"}],
                      "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                      "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                      "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                      "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                      "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}]
              }
            },
          },
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .vibrant-velocity-bg { 
            background: linear-gradient(135deg, #319795 0%, #1a365d 50%, #00182a 100%); 
            background-attachment: fixed; 
        }
        .glass-card { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        
        .tab-indicator {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .slider-container {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            width: 200%;
        }
        .slide-item {
            width: 50%;
            flex-shrink: 0;
        }

        /* Desktop Layout Overrides */
        @media (min-width: 768px) {
            .slider-container {
                width: 100% !important;
                transform: none !important;
                display: flex !important;
                flex-direction: row !important;
                justify-content: center !important;
                gap: 2rem !important;
            }
            .slide-item {
                width: 360px !important;
                flex-shrink: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-primary text-on-primary min-h-screen flex flex-col font-body-md overflow-x-hidden">
    <!-- Background Atmospheric Effect -->
    <div class="fixed inset-0 vibrant-velocity-bg -z-10"></div>
    
    <!-- Header / Navigation Bar -->
    <header class="flex items-center justify-between px-margin-mobile pt-sm pb-base max-w-5xl mx-auto w-full relative z-10">
        <button class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-white/10 transition-colors" onclick="window.location.href='/'">
            <span class="material-symbols-outlined text-on-primary">arrow_back</span>
        </button>
        <div class="w-10 h-10"></div> <!-- Spacer -->
    </header>

    <!-- Main Canvas -->
    <main class="flex-grow flex flex-col px-margin-mobile relative max-w-5xl mx-auto w-full justify-center pb-12">
        <!-- Content Area -->
        <div class="mt-md mb-md flex flex-col items-center text-center">
            <h2 class="font-headline-xl text-headline-xl text-on-primary tracking-tight leading-tight">Daftar sebagai apa?</h2>
            <p class="font-body-md text-on-primary-container mt-xs max-w-[280px] sm:max-w-md">Mulai perjalanan kariermu atau temukan talenta terbaik sekarang.</p>
        </div>

        <!-- Tab Navigation (Only visible on Mobile) -->
        <div class="relative w-full max-w-[340px] mx-auto mb-lg bg-white/5 rounded-full p-1 border border-white/10 flex overflow-hidden md:hidden">
            <div class="tab-indicator absolute inset-y-1 left-1 w-[calc(50%-4px)] bg-secondary-fixed rounded-full z-0 shadow-lg" id="tab-indicator"></div>
            <button class="relative z-10 flex-1 py-3 font-label-md text-black transition-colors duration-300" id="tab-pelamar" onclick="switchTab('pelamar')">
                Pelamar
            </button>
            <button class="relative z-10 flex-1 py-3 font-label-md text-on-primary-container transition-colors duration-300" id="tab-perusahaan" onclick="switchTab('perusahaan')">
                Perusahaan
            </button>
        </div>

        <!-- Role Selection Slider -->
        <div class="overflow-hidden w-full">
            <div class="slider-container" id="slider-content">
                <!-- Pelamar Slide -->
                <div class="slide-item px-base">
                    <button class="group relative w-full flex flex-col items-start p-lg glass-card rounded-xl text-left transition-all duration-300 hover:scale-[1.02] active:scale-95 focus:ring-2 focus:ring-secondary-fixed-dim outline-none overflow-hidden" onclick="handleSelection('pelamar')">
                        <div class="absolute top-0 right-0 p-lg opacity-10 group-hover:opacity-20 transition-opacity">
                            <span class="material-symbols-outlined text-[120px]" style="font-variation-settings: 'FILL' 1;">person_search</span>
                        </div>
                        <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-md group-hover:shadow-[0_0_20px_rgba(119,214,211,0.4)] transition-shadow">
                            <span class="material-symbols-outlined text-secondary-fixed text-[32px]" style="color: rgb(0, 0, 0);">person</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-primary mb-xs">Pelamar</h3>
                        <p class="font-body-sm text-on-primary-container leading-relaxed">Temukan ribuan lowongan kerja impian yang sesuai dengan keahlianmu.</p>
                        <div class="mt-lg w-full">
                            <div class="w-full py-3 bg-secondary-fixed text-on-secondary-fixed rounded-full text-center font-label-md shadow-lg group-hover:bg-[#77d6d3] transition-colors">Daftar</div>
                        </div>
                    </button>
                </div>
                
                <!-- Perusahaan Slide -->
                <div class="slide-item px-base">
                    <button class="group relative w-full flex flex-col items-start p-lg glass-card rounded-xl text-left transition-all duration-300 hover:scale-[1.02] active:scale-95 focus:ring-2 focus:ring-secondary-fixed-dim outline-none overflow-hidden" onclick="handleSelection('perusahaan')">
                        <div class="absolute top-0 right-0 p-lg opacity-10 group-hover:opacity-20 transition-opacity">
                            <span class="material-symbols-outlined text-[120px]" style="font-variation-settings: 'FILL' 1;">business_center</span>
                        </div>
                        <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-md group-hover:shadow-[0_0_20px_rgba(0,164,153,0.4)] transition-shadow">
                            <span class="material-symbols-outlined text-on-tertiary-container text-[32px]" style="color: rgb(0, 0, 0);">apartment</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-primary mb-xs">Perusahaan</h3>
                        <p class="font-body-sm text-on-primary-container leading-relaxed">Pasang lowongan dan temukan kandidat terbaik untuk tim hebatmu.</p>
                        <div class="mt-lg w-full">
                            <div class="w-full py-3 bg-secondary-fixed text-on-secondary-fixed rounded-full text-center font-label-md shadow-lg group-hover:bg-[#77d6d3] transition-colors">Daftar</div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-auto py-lg flex flex-col items-center gap-xs"></div>
    </main>

    <script>
        function switchTab(role) {
            const indicator = document.getElementById('tab-indicator');
            const slider = document.getElementById('slider-content');
            const btnPelamar = document.getElementById('tab-pelamar');
            const btnPerusahaan = document.getElementById('tab-perusahaan');

            if (role === 'pelamar') {
                indicator.style.transform = 'translateX(0)';
                slider.style.transform = 'translateX(0)';
                btnPelamar.classList.remove('text-on-primary-container');
                btnPelamar.classList.add('text-black');
                btnPerusahaan.classList.remove('text-black');
                btnPerusahaan.classList.add('text-on-primary-container');
            } else {
                indicator.style.transform = 'translateX(100%)';
                slider.style.transform = 'translateX(-50%)';
                btnPerusahaan.classList.remove('text-on-primary-container');
                btnPerusahaan.classList.add('text-black');
                btnPelamar.classList.remove('text-black');
                btnPelamar.classList.add('text-on-primary-container');
            }
        }

        function handleSelection(role) {
            console.log('Selected role:', role);
            // Visual feedback
            const cards = document.querySelectorAll('.slide-item button');
            cards.forEach(card => {
                if(card.getAttribute('onclick').includes(role)) {
                    card.classList.add('ring-4', 'ring-secondary-fixed');
                } else {
                    card.classList.add('opacity-50', 'scale-95');
                }
            });
            
            setTimeout(() => {
                window.location.href = `/register/${role}`;
            }, 300);
        }

        // Reset visual card feedback when loading page from history/bfcache (e.g. Back button)
        window.addEventListener('pageshow', (event) => {
            const cards = document.querySelectorAll('.slide-item button');
            cards.forEach(card => {
                card.classList.remove('ring-4', 'ring-secondary-fixed', 'opacity-50', 'scale-95');
            });
        });

        // Parallax Effect
        document.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
            document.querySelector('.vibrant-velocity-bg').style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    </script>
</body>
</html>