<?php
include('../koneksi.php');

// Periksa apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data gambar berdasarkan ID
    $query = "SELECT browsur, browsur_type FROM berkas WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('i', $id);  // Bind parameter ID sebagai integer
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($browsur_data, $browsur_type);

    if ($stmt->num_rows > 0) {
        // Ambil data gambar
        $stmt->fetch();

        // Mengatur header untuk mendownload file
        header('Content-Type: ' . $browsur_type);
        header('Content-Disposition: attachment; filename="browsur_' . $id . '.' . pathinfo($browsur_type, PATHINFO_EXTENSION) . '"');
        echo $browsur_data;  // Output data gambar untuk diunduh
    } else {
        echo "File tidak ditemukan.";
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $koneksi->close();
} else {
    echo "ID tidak ditemukan.";
}
?>
