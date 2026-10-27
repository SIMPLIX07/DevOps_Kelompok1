document.getElementById("next").addEventListener("click", async function (event) {
    event.preventDefault();

    let usn = document.getElementById("usn").value.trim();
    let pass = document.getElementById("pass").value.trim();

    if (!usn || !pass) {
        alert("Username atau password tidak boleh kosong");
        return;
    }

    try {
        let response = await fetch("/login/pelamar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                username: usn,
                password: pass
            })
        });

        let result = await response.json();

        if (result.success) {
            alert("Login berhasil!");
            window.location.href = "/home-pelamar";
        } else {
            alert(result.message || "Login gagal.");
        }

    } catch (error) {
        console.error("Error:", error);
        alert("Terjadi kesalahan pada server.");
    }
});


