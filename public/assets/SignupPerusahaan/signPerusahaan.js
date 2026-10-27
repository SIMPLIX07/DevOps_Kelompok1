document.getElementById("next").onclick = function () {
  const username = document.getElementById("usn").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("pass").value;
  const fileInput = document.getElementById("fileInput");
  const file = fileInput.files[0];

  if (!username || !password || !file) {
    alert("Harap isi semua data dan upload sertifikat perusahaan!");
    return;
  }

  localStorage.setItem("username", username);
  localStorage.setItem("uploadedFile", file.name);

  alert(`Akun "${username}" berhasil dibuat dengan file: ${file.name}`);

  window.location.href = "/HomePelamar/index.html";
};

document.getElementById("fileInput").addEventListener("change", function (event) {
  const fileName = event.target.files[0]?.name;
  if (fileName) {
    alert("File dipilih: " + fileName);
  }
});
