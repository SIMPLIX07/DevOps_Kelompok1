document.addEventListener("DOMContentLoaded", () => {
    const btnLamars = document.querySelectorAll(".button");
    const modal = document.getElementById("modalCv");
    const btnTutup = document.getElementById("btnTutup");
    const btnBatal = document.getElementById("btnBatal");
    const cvList = document.getElementById("cvList");
    const portofolioList = document.getElementById("portofolioList");
    const btnKirim = document.getElementById("btnKirimLamaran");
    const pelamarId = document.querySelector('meta[name="pelamar-id"]')?.content;
    const lowonganId = document.querySelector('meta[name="lowongan-id"]')?.content;

    let selectedCvId = null;
    let selectedPortofolioId = null;

    if (!lowonganId || !btnLamars.length) {
        console.error("Missing lowongan-id meta tag or lamar buttons");
        btnLamars.forEach(btn => {
            btn.disabled = true;
            btn.textContent = "Gagal memuat lamaran";
        });
        return;
    }

    const closeModal = () => {
        modal.style.display = "none";
        selectedCvId = null;
        selectedPortofolioId = null;
        // reset UI selection state
        document.querySelectorAll(".cv-card").forEach(c => {
            c.classList.remove("bg-[#006a68]", "text-white", "border-[#006a68]");
            c.classList.add("bg-[#ebeef0]", "text-[#181c1e]", "border-[#c3c7cd]");
        });
    };

    if (btnTutup) {
        btnTutup.addEventListener("click", closeModal);
    }
    if (btnBatal) {
        btnBatal.addEventListener("click", closeModal);
    }

    btnLamars.forEach(btnLamar => {
        btnLamar.addEventListener("click", async () => {
            if (!pelamarId) {
                window.location.href = "/login/pelamar";
                return;
            }
            modal.style.display = "flex";
            btnKirim.disabled = true;
            cvList.innerHTML = "Memuat CV...";
            portofolioList.innerHTML = "Memuat Portofolio...";

            // Fetch CVs
            try {
                const resCv = await fetch("/pelamar/cv");
                const dataCv = await resCv.json();

                if (!dataCv.length) {
                    cvList.innerHTML = `
                        <div class="col-span-2 text-center p-4">
                            <p class="font-bold text-on-surface">Maaf, kamu belum memiliki CV.</p>
                            <a href="/cv/create" class="text-secondary hover:underline text-sm font-semibold">Buat CV Sekarang</a>
                        </div>
                    `;
                } else {
                    cvList.innerHTML = "";
                    dataCv.forEach(cv => {
                        const div = document.createElement("div");
                        div.className = "cv-card border-2 border-[#c3c7cd] bg-[#ebeef0] hover:bg-[#e0e3e5] p-4 rounded-xl cursor-pointer transition-all duration-200 text-[#181c1e]";
                        div.innerHTML = `<div class="cv-title font-semibold text-[16px]">${cv.title ?? "CV #" + cv.id}</div>`;

                        div.addEventListener("click", () => {
                            document.querySelectorAll("#cvList .cv-card").forEach(c => {
                                c.classList.remove("bg-[#006a68]", "text-white", "border-[#006a68]");
                                c.classList.add("bg-[#ebeef0]", "text-[#181c1e]", "border-[#c3c7cd]");
                            });

                            div.classList.remove("bg-[#ebeef0]", "text-[#181c1e]", "border-[#c3c7cd]");
                            div.classList.add("bg-[#006a68]", "text-white", "border-[#006a68]");
                            selectedCvId = cv.id;
                            btnKirim.disabled = false;
                        });

                        cvList.appendChild(div);
                    });
                }
            } catch (err) {
                cvList.innerHTML = "<p class='text-error'>Gagal memuat CV.</p>";
            }

            // Fetch Portfolios
            try {
                const resPort = await fetch("/pelamar/portofolio");
                const dataPort = await resPort.json();

                if (!dataPort.length) {
                    portofolioList.innerHTML = `
                        <div class="col-span-2 text-center p-4">
                            <p class="text-sm text-on-surface-variant italic">Kamu belum memiliki portofolio.</p>
                            <a href="/portofolio/create" class="text-secondary hover:underline text-sm font-semibold">Buat Portofolio Sekarang</a>
                        </div>
                    `;
                } else {
                    portofolioList.innerHTML = "";
                    dataPort.forEach(port => {
                        const div = document.createElement("div");
                        div.className = "cv-card border-2 border-[#c3c7cd] bg-[#ebeef0] hover:bg-[#e0e3e5] p-4 rounded-xl cursor-pointer transition-all duration-200 text-[#181c1e]";
                        div.innerHTML = `<div class="cv-title font-semibold text-[16px]">${port.judul ?? "Portofolio #" + port.id}</div>`;

                        div.addEventListener("click", () => {
                            if (selectedPortofolioId === port.id) {
                                // Deselect
                                div.classList.remove("bg-[#006a68]", "text-white", "border-[#006a68]");
                                div.classList.add("bg-[#ebeef0]", "text-[#181c1e]", "border-[#c3c7cd]");
                                selectedPortofolioId = null;
                            } else {
                                // Select
                                document.querySelectorAll("#portofolioList .cv-card").forEach(c => {
                                    c.classList.remove("bg-[#006a68]", "text-white", "border-[#006a68]");
                                    c.classList.add("bg-[#ebeef0]", "text-[#181c1e]", "border-[#c3c7cd]");
                                });

                                div.classList.remove("bg-[#ebeef0]", "text-[#181c1e]", "border-[#c3c7cd]");
                                div.classList.add("bg-[#006a68]", "text-white", "border-[#006a68]");
                                selectedPortofolioId = port.id;
                            }
                        });

                        portofolioList.appendChild(div);
                    });
                }
            } catch (err) {
                portofolioList.innerHTML = "<p class='text-error'>Gagal memuat portofolio.</p>";
            }
        });
    });

    btnKirim.addEventListener("click", async () => {
        if (!selectedCvId) return;

        btnKirim.disabled = true;
        btnKirim.textContent = "Mengirim...";

        try {
            const response = await fetch("/lamaran/insert", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    pelamar_id: pelamarId,
                    lowongan_id: lowonganId,
                    cv_id: selectedCvId,
                    portofolio_id: selectedPortofolioId
                })
            });

            const result = await response.json();

            if (response.ok) {
                const modalCv = document.getElementById("modalCv");
                const successModal = document.getElementById("successModal");
                const btnOk = document.getElementById("btnOk");
                
                modalCv.style.display = "none";
                selectedCvId = null;
                selectedPortofolioId = null;
                btnKirim.disabled = true;
                btnKirim.textContent = "Kirim Lamaran";
                
                successModal.style.display = "flex";
                btnOk.onclick = () => {
                    window.location.href = "/lamaran-anda";
                };
            } else {
                alert(result.message || "Gagal mengirim lamaran");
                btnKirim.disabled = false;
                btnKirim.textContent = "Kirim Lamaran";
            }
        } catch (err) {
            alert("Terjadi kesalahan jaringan.");
            btnKirim.disabled = false;
            btnKirim.textContent = "Kirim Lamaran";
        }
    });
});
