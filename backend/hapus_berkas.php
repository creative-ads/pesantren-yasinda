<?php
include('../koneksi.php');

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID valid

    // Query untuk menghapus data
    $query = "DELETE FROM berkas WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        // Data berhasil dihapus
        echo "Data berhasil dihapus.";
        header('Location: berkas.php');
    } else {
        // Jika query gagal
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}

mysqli_close($koneksi);
?>
