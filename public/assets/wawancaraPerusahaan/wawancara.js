document.addEventListener('DOMContentLoaded', () => {

    const tabs = document.querySelectorAll('.tab-btn');
    const cards = document.querySelectorAll('.wp-card'); 
    const searchInput = document.querySelector('.search-input'); 
    const searchBtn = document.querySelector('.search-button');

    function applyFilters() {
        const activeTab = document.querySelector('.tab-btn.tab-active').dataset.tab;
        const searchText = searchInput.value.toLowerCase();

        cards.forEach(card => {
            const statusMatch = card.dataset.status === activeTab;
            const posisiMatch = card.dataset.posisi.toLowerCase().includes(searchText);
            const namaMatch = card.dataset.nama.toLowerCase().includes(searchText); // Bonus: bisa cari nama pelamar juga

            // Tampilkan kartu HANYA jika status tab cocok DAN (posisi atau nama cocok)
            if (statusMatch && (posisiMatch || namaMatch)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Event saat mengetik di kolom pencarian (Real-time)
    searchInput.addEventListener('input', applyFilters);

    // Event saat tombol cari diklik
    searchBtn.addEventListener('click', (e) => {
        e.preventDefault();
        applyFilters();
    });

    // Logika Tab yang sudah ada, tinggal panggil applyFilters()
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('tab-active'));
            tab.classList.add('tab-active');
            applyFilters(); // Panggil fungsi filter gabungan
        });
    });

    // Inisialisasi awal
    applyFilters();

    function filterCards(status) {
        cards.forEach(card => {
            // Jika status card cocok dengan tab yang diklik, tampilkan
            if (card.dataset.status === status) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Default view saat pertama buka, tampilkan yang statusnya 'proses'
    filterCards('proses');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('tab-active'));
            tab.classList.add('tab-active');
            filterCards(tab.dataset.tab);
        });
    });

    const modal = document.getElementById('detailModal');
    const closeModal = document.getElementById('closeModal');
    let wawancaraId = null;

    // Menambah event click pada seluruh kartu
    cards.forEach(card => {
        card.addEventListener('click', function () {
            // Ambil data dari atribut data di wp-card
            wawancaraId = this.dataset.id;
            const status = this.dataset.status;

            document.getElementById('modalPosisi').innerText = this.dataset.posisi;
            document.getElementById('modalNama').innerText = this.dataset.nama;
            document.getElementById('modalTanggal').innerText = this.dataset.tanggal;
            document.getElementById('modalJam').innerText = this.dataset.jam;
            document.getElementById('modalPesan').innerText = this.dataset.pesan || '-';

            // Sembunyikan tombol Terima/Tolak jika sudah selesai
            const modalActions = document.getElementById('modalActions');
            if (status === 'selesai') {
                modalActions.style.display = 'none';
            } else {
                modalActions.style.display = 'flex';
            }

            modal.style.display = 'flex';
        });
    });

    // Tombol Terima
    document.getElementById('btnTerima').addEventListener('click', (e) => {
        e.stopPropagation();
        if (!wawancaraId) return;

        if (confirm('Terima pelamar ini sebagai karyawan?')) {
            fetch(`/perusahaan/wawancara/${wawancaraId}/terima`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    // Nutup pop up otomatis
                    document.getElementById('detailModal').style.display = 'none';

                    // Notifikasi 
                    alert("Berhasil! " + data.message);

                    // Reload untuk memperbarui tampilan kartu
                    location.reload();
                })
                .catch(err => {
                    console.error(err);
                    alert("Terjadi kesalahan saat memproses data.");
                });
        }
    });

    // Tombol Tolak
    document.getElementById('btnTolak').addEventListener('click', (e) => {
        e.stopPropagation();
        if (!wawancaraId) return;

        if (confirm('Tolak lamaran ini?')) {
            fetch(`/perusahaan/wawancara/${wawancaraId}/tolak`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    location.reload();
                });
        }
    });

    // Tutup Modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Klik di luar modal biat ketutup
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});