document.addEventListener("DOMContentLoaded", () => {
    const apiUrl = "https://68ed07c5eff9ad3b14044b1a.mockapi.io/api/v1/userPelamar";
    const targetUsername = "muhsalmanalfarizy";
    let currentUserId = null; 

    const inputNama = document.querySelector(".inputNama input");
    const inputKeahlian = document.querySelector(".inputKeahlian input");
    const inputUsername = document.querySelector(".inputUsername input");
    const inputPassword = document.querySelector(".inputPassword input");
    const editNamaButton = document.querySelector(".inputNama .editPic");

    function getData(user) {
        if (inputNama) {
            inputNama.value = user.namaLengkap;
        }
        if (inputKeahlian) {
            inputKeahlian.value = user.keahlian;
        }
        if (inputUsername) {
            inputUsername.value = user.username;
        }
        if (inputPassword) {
            inputPassword.value = user.password;
        }
    }

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(users => {
            const user = users.find(u => u.username === targetUsername);
            if (user) {
                currentUserId = user.id; 
                getData(user);
            } else {
                console.log(`User dengan username '${targetUsername}' tidak ditemukan.`);
            }
        })
        .catch(error => {
            console.error("Gagal mengambil data dari API:", error);
        });

    if (editNamaButton) {
        editNamaButton.addEventListener("click", () => {
            if (!currentUserId) {
                console.error("User ID tidak ditemukan, tidak bisa update.");
                return;
            }

            const newName = inputNama.value;
            
            updateUserNama(currentUserId, newName);
        });
    }

    function updateUserNama(id, newName) {
        const updateUrl = `${apiUrl}/${id}`;
        
        const dataToUpdate = {
            namaLengkap: newName
        };

        fetch(updateUrl, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToUpdate)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(updatedUser => {
            console.log("Update berhasil:", updatedUser);
            alert("Nama Lengkap berhasil diperbarui!");
        })
        .catch(error => {
            console.error("Gagal update nama:", error);
            alert("Terjadi kesalahan saat memperbarui nama.");
        });
    }
});