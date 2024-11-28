// Ambil data dari backend
fetch('dashboard_data.php')
.then(response => response.json())
.then(data => {
    // Tampilkan data pendaftar
    document.getElementById('totalPendaftar').textContent = `Total Pendaftar: ${data.total_pendaftar}`;


    // Buat chart untuk data santri
    const ctx = document.getElementById('santriChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Laki-laki', 'Perempuan', 'Total Santri'],
            datasets: [{
                label: 'Jumlah Santri',
                data: [data.jumlah_laki, data.jumlah_perempuan, data.total_santri],
                backgroundColor: ['#36a2eb', '#ff6384', '#4bc0c0']
            }]
        }
    });
})
.catch(error => console.error('Error:', error));