
document.getElementById("next").addEventListener("click", async function (event) {
    event.preventDefault();

    let fullname = document.getElementById("fullname").value.trim();
    let usn = document.getElementById("usn").value.trim();
    let email = document.getElementById("email").value.trim();
    let pass = document.getElementById("pass").value.trim();
    let conf = document.getElementById("conf").value.trim();
    let skills = document.getElementById("skills").value.trim();


    if (!fullname || !usn || !email || !pass || !conf || !skills) {
        alert("Semua field harus diisi!");
        return;
    }

    if (pass !== conf) {
        alert("Password dan konfirmasi password tidak sesuai!");
        return;
    }

    try {
        let response = await fetch("/register/pelamar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').content
            },
            body: JSON.stringify({
                nama_lengkap: fullname,
                username: usn,
                email: email,
                password: pass,
                keahlian: skills
            })
        });

        let result = await response.json();

        if (result.success) {
            alert("Registrasi berhasil!");
            window.location.href = "/home-pelamar";
        } else {
            alert("Gagal: " + (result.message || "Terjadi kesalahan."));
        }

    } catch (err) {
        console.error(err);
        alert("Terjadi error, silakan cek console.");
    }
});


document.getElementById("togglePass").addEventListener("click", function () {
    const input = document.getElementById("pass");
    const isHidden = input.type === "password";

    input.type = isHidden ? "text" : "password";
    this.src = isHidden
        ? "https://cdn-icons-png.flaticon.com/512/159/159604.png"
        : "https://cdn-icons-png.flaticon.com/512/709/709612.png";
});


document.getElementById("toggleConf").addEventListener("click", function () {
    const input = document.getElementById("conf");
    const isHidden = input.type === "password";

    input.type = isHidden ? "text" : "password";
    this.src = isHidden
        ? "https://cdn-icons-png.flaticon.com/512/159/159604.png"
        : "https://cdn-icons-png.flaticon.com/512/709/709612.png";
});

