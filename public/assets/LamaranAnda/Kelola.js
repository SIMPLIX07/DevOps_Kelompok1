document.addEventListener("DOMContentLoaded", async function () {
  const container = document.getElementById("cardsContainer");
  const username = document.querySelector(".user-margin").textContent.trim();

  try {
    const response = await fetch("../LamaranAnda/dataLamaran.json");
    const data = await response.json();

    const user = data.userPelamar.find(u => u.username === username);

    if (!user || !user.lamaran || user.lamaran.length === 0) {
      container.innerHTML = "<p style='text-align:center;'>Belum ada lamaran yang bisa dikelola.</p>";
      return;
    }

    const filtered = user.lamaran.filter(l => {
      const status = l.status.toLowerCase();
      return status === "diproses" || status === "ditolak";
    });

    if (filtered.length === 0) {
      container.innerHTML = "<p style='text-align:center;'>Tidak ada lamaran yang perlu dikelola.</p>";
      return;
    }

    filtered.forEach(lamaran => {
      const card = document.createElement("div");
      card.classList.add("card");

      const status = document.createElement("div");
      status.classList.add("status", lamaran.status.toLowerCase());

      const body = document.createElement("div");
      body.classList.add("card-body");

      const title = document.createElement("h5");
      title.classList.add("card-title");
      title.textContent = lamaran.posisiLamaran;

      const perusahaan = document.createElement("p");
      perusahaan.classList.add("card-perusahaan");
      perusahaan.textContent = lamaran.perusahaan;

      const pesan = document.createElement("p");
      pesan.classList.add("card-pesan");
      pesan.textContent =
        lamaran.status.toLowerCase() === "diproses"
          ? `Lamaran anda sedang diproses oleh ${lamaran.perusahaan}.`
          : `Maaf, anda belum diterima di ${lamaran.perusahaan}.`;

      const actionDiv = document.createElement("div");
      actionDiv.classList.add("action-buttons");

      if (lamaran.status.toLowerCase() === "diproses") {
        const btnSelesai = document.createElement("button");
        btnSelesai.textContent = "Selesai";
        btnSelesai.classList.add("btn-selesai");
        btnSelesai.addEventListener("click", () => {
          status.className = "status diterima";
          pesan.textContent = `Selamat, anda diterima di ${lamaran.perusahaan}.`;
          btnSelesai.remove();
        });
        actionDiv.appendChild(btnSelesai);
      }

      if (lamaran.status.toLowerCase() === "ditolak") {
        const btnHapus = document.createElement("button");
        btnHapus.textContent = "Hapus";
        btnHapus.classList.add("btn-hapus");
        btnHapus.addEventListener("click", () => {
          card.remove();
        });
        actionDiv.appendChild(btnHapus);
      }

      body.appendChild(title);
      body.appendChild(perusahaan);
      body.appendChild(pesan);
      card.appendChild(status);
      card.appendChild(body);
      card.appendChild(actionDiv);
      container.appendChild(card);
    });
  } catch (err) {
    console.error("Gagal memuat data kelola:", err);
    container.innerHTML = "<p style='text-align:center; color:red;'>Gagal memuat data kelola.</p>";
  }
});

document.querySelector('.search-button').addEventListener('click', function() {
    const searchValue = document.querySelector('.search-input').value.toLowerCase();
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        const title = card.querySelector('.card-title').textContent.toLowerCase();
        const text = card.querySelector('.card-pesan').textContent.toLowerCase(); 
        const perusahaan = card.querySelector('.card-perusahaan').textContent.toLowerCase();

        if (title.includes(searchValue) || text.includes(searchValue) || perusahaan.includes(searchValue)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
