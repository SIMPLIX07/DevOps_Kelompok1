document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-btn');
    const cards = document.querySelectorAll('.card-wawancara');
    const searchInput = document.querySelector('.search-input');
    const searchButton = document.querySelector('.search-button');

    function filterAll() {
        const activeTab = document.querySelector('.tab-btn.tab-active');
        const activeStatus = activeTab ? activeTab.dataset.tab : 'semua';
        const searchText = searchInput ? searchInput.value.toLowerCase() : '';

        cards.forEach(card => {
            const statusCocok = activeStatus === 'semua' || card.dataset.status === activeStatus;

            const posisi = card.querySelector('.posisi-pekerjaan').textContent.toLowerCase();
            const perusahaan = card.querySelector('.nama-perusahaan').textContent.toLowerCase();
            const searchCocok = posisi.includes(searchText) || perusahaan.includes(searchText);

            if (statusCocok && searchCocok) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => {
                t.classList.remove('tab-active', 'bg-primary-container', 'text-on-primary');
                t.classList.add('text-on-surface-variant', 'hover:bg-surface-container');
            });
            tab.classList.add('tab-active', 'bg-primary-container', 'text-on-primary');
            tab.classList.remove('text-on-surface-variant', 'hover:bg-surface-container');
            filterAll(); 
        });
    });

    if (searchButton) searchButton.addEventListener('click', filterAll);
    if (searchInput) {
        searchInput.addEventListener('keyup', filterAll);
        searchInput.addEventListener('input', filterAll);
    }

    filterAll();

    const modal = document.getElementById('detailModal');
    const closeModal = document.getElementById('closeModal');

    document.querySelectorAll('.detail-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('modalPosisi').innerText = btn.dataset.posisi;
            document.getElementById('modalPerusahaan').innerText = btn.dataset.perusahaan;
            document.getElementById('modalTanggal').innerText = btn.dataset.tanggal;
            document.getElementById('modalJam').innerText = btn.dataset.jam;
            document.getElementById('modalPesan').innerText = btn.dataset.pesan || '-';

            const statusText = btn.dataset.status === 'proses' ? 'Akan Datang' : 'Selesai';
            const statusBadge = document.getElementById('modalStatus');
            if (statusBadge) {
                statusBadge.innerText = statusText;
                if (btn.dataset.status === 'proses') {
                    statusBadge.className = 'px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-xs font-semibold mb-6 inline-block';
                } else {
                    statusBadge.className = 'px-3 py-1 bg-surface-container-high text-on-surface-variant rounded-full text-xs font-semibold mb-6 inline-block';
                }
            }

            const modalLogo = document.getElementById('modalLogo');
            const modalDefaultLogo = document.getElementById('modalDefaultLogo');
            if (modalLogo) {
                if (btn.dataset.logo) {
                    modalLogo.src = btn.dataset.logo;
                    modalLogo.classList.remove('hidden');
                    if (modalDefaultLogo) modalDefaultLogo.classList.add('hidden');
                } else {
                    modalLogo.classList.add('hidden');
                    if (modalDefaultLogo) modalDefaultLogo.classList.remove('hidden');
                }
            }

            const modalLink = document.getElementById('modalLink');
            const modalLinkContainer = document.getElementById('modalLinkContainer');
            if (btn.dataset.link && btn.dataset.status === 'proses') {
                if (modalLink) modalLink.href = btn.dataset.link;
                if (modalLinkContainer) modalLinkContainer.style.display = 'flex';
            } else {
                if (modalLinkContainer) modalLinkContainer.style.display = 'none';
            }

            // Hasil / Status Seleksi Box
            const modalHasil = document.getElementById('modalHasilSelection');
            const modalHasilIcon = document.getElementById('modalHasilIcon');
            const modalHasilTitle = document.getElementById('modalHasilTitle');
            const modalHasilDesc = document.getElementById('modalHasilDesc');

            if (modalHasil) {
                if (btn.dataset.status === 'selesai') {
                    modalHasil.classList.remove('hidden', 'bg-[#E6FFFA]', 'text-[#006e6d]', 'border-[#91f0ed]', 'bg-[#FFE5E5]', 'text-[#D32F2F]', 'border-[#FFCDD2]', 'bg-surface-container-low', 'text-on-surface', 'border-outline-variant');
                    
                    const lamaranStatus = btn.dataset.lamaranStatus;
                    if (lamaranStatus === 'diterima') {
                        modalHasil.classList.add('bg-[#E6FFFA]', 'text-[#006e6d]', 'border-[#91f0ed]');
                        if (modalHasilIcon) modalHasilIcon.innerText = "task_alt";
                        if (modalHasilTitle) modalHasilTitle.innerText = "Selamat! Anda Diterima 🎉";
                        if (modalHasilDesc) modalHasilDesc.innerText = "Selamat, Anda dinyatakan lolos seleksi dan diterima bergabung sebagai karyawan.";
                    } else if (lamaranStatus === 'ditolak') {
                        modalHasil.classList.add('bg-[#FFE5E5]', 'text-[#D32F2F]', 'border-[#FFCDD2]');
                        if (modalHasilIcon) modalHasilIcon.innerText = "cancel";
                        if (modalHasilTitle) modalHasilTitle.innerText = "Maaf, Anda Belum Lolos";
                        if (modalHasilDesc) modalHasilDesc.innerText = "Terima kasih atas partisipasi Anda dalam proses rekrutmen kami. Saat ini perusahaan belum dapat melanjutkan proses dengan Anda. Tetap semangat!";
                    } else {
                        modalHasil.classList.add('bg-surface-container-low', 'text-on-surface', 'border-outline-variant');
                        if (modalHasilIcon) modalHasilIcon.innerText = "info";
                        if (modalHasilTitle) modalHasilTitle.innerText = "Sedang Diproses";
                        if (modalHasilDesc) modalHasilDesc.innerText = "Hasil wawancara Anda sedang diproses oleh perusahaan. Mohon tunggu kabar selanjutnya.";
                    }
                } else {
                    modalHasil.classList.add('hidden');
                }
            }

            if (modal) modal.style.display = 'flex';
        });
    });

    if (closeModal) {
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});