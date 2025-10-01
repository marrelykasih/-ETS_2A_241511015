document.addEventListener('DOMContentLoaded', function() {

    const form = document.querySelector('#form-add-student');
    if (form) {
        form.addEventListener('submit', function(event) {
            const isFormValid = validateForm();
            if (!isFormValid) {
                event.preventDefault();
            }
        });
    }

   
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            
            event.preventDefault();

            // Ambil nama  atribut data-name
            const name = button.getAttribute('data-name');
            
            // Tampilkan  konfirmasi
            const isConfirmed = confirm(`Apakah Anda yakin ingin menghapus data: ${name}?`);

            // Jika pengguna mengklik "OK", lanjutkan ke link hapus
            if (isConfirmed) {
                window.location.href = button.getAttribute('href');
            }
        });
    });

});



function validateForm() {
    let isValid = true; 

    // Daftar semua input yang ingin divalidasi
    const inputs = ['#full_name', '#username', '#password', '#entry_year'];

    inputs.forEach(inputId => {
        const input = document.querySelector(inputId);
        // Cari elemen .error-message yang merupakan saudara setelah input
        const errorMessage = input.nextElementSibling; 

        // Hapus status error sebelumnya
        input.classList.remove('input-error');
        errorMessage.textContent = '';

        // Lakukan validasi
        if (input.value.trim() === '') {
           
            input.classList.add('input-error');
            errorMessage.textContent = 'Field ini tidak boleh kosong.';
            isValid = false; // Tandai form sebagai tidak valid
        }
    });

    return isValid;
}

console.log("Proses 1: Kode dieksekusi.");

setTimeout(function() {
    console.log("Proses 2: Pesan ini muncul setelah 3 detik.");
}, 3000); // 3000 milidetik = 3 detik

console.log("Proses 3: Kode selesai dieksekusi.");