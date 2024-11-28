document.addEventListener('DOMContentLoaded', function() {
    const accCheckboxes = document.querySelectorAll('.acc-checkbox');

    accCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                const id = this.getAttribute('data-id');

                fetch('update_acc.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        this.disabled = true; // Nonaktifkan checkbox
                        alert(data.message);
                    } else {
                        alert(data.message);
                        this.checked = false; // Batalkan centang jika gagal
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.checked = false; // Batalkan centang jika terjadi error
                });
            }
        });
    });
});