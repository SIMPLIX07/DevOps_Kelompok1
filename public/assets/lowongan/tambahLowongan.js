isinya

document.addEventListener('DOMContentLoaded', function() {
    const inputGambar = document.getElementById('input-gambar');
    const previewGambar = document.getElementById('preview-gambar');

    if (inputGambar) {
        inputGambar.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Set source image ke hasil bacaan file
                    previewGambar.src = e.target.result;
                    // Tampilkan elemen gambar
                    previewGambar.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                // Sembunyikan jika tidak ada file
                previewGambar.src = "#";
                previewGambar.style.display = 'none';
            }
        });
    }
});