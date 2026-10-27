document.addEventListener('DOMContentLoaded', function() {
    const btnEdit = document.getElementById('btnEditProfile');
    const editModalElement = document.getElementById('editDataModal');
    const inputFoto = document.getElementById('inputFotoProfil');
    const formFoto = document.getElementById('formUpdateFoto');
    const passModalElement = document.getElementById('ubahPasswordModalPerusahaan');
    const navKeamanan = document.getElementById('nav-keamanan');
    
    const navAkun = document.querySelector('.cstm-nav-link.active');

    if (passModalElement && navKeamanan) {
        passModalElement.addEventListener('show.bs.modal', function () {
            if (navAkun) navAkun.classList.remove('active');
            navKeamanan.classList.add('active');
        });

        passModalElement.addEventListener('hide.bs.modal', function () {
            navKeamanan.classList.remove('active');
            if (navAkun) navAkun.classList.add('active');
        });

        passModalElement.addEventListener('hidden.bs.modal', function () {
            const form = this.querySelector('form');
            if(form) form.reset();
            this.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        });
    }

    if (inputFoto && formFoto) {
        inputFoto.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                formFoto.submit();
            }
        });
    }
    
    if (editModalElement) {
        const editModal = new bootstrap.Modal(editModalElement);
        
        if (btnEdit) {
            btnEdit.addEventListener('click', function() {
                editModal.show();
            });
        }

        const successMessage = editModalElement.getAttribute('data-success-message');
        if (successMessage && successMessage.trim() !== "" && successMessage !== '0') { 
            const successToastElement = document.getElementById('successToast');
            if (successToastElement) {
                const toastBody = successToastElement.querySelector('.toast-body');
                toastBody.textContent = successMessage;
                const toast = new bootstrap.Toast(successToastElement);
                toast.show();
            }
        }

        const hasErrors = editModalElement.getAttribute('data-has-errors') === 'true';
        if (hasErrors) {
             editModal.show();
        }
    }
});