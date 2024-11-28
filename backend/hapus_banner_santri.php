<?php
// Menyertakan koneksi ke database
include('../koneksi.php');

// Periksa apakah parameter ID telah dikirim
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM banner_santri WHERE id = ?";
    if ($stmt = $koneksi->prepare($query)) {
        // Menggunakan prepared statement untuk keamanan
        $stmt->bind_param("i", $id);

        // Eksekusi query
        if ($stmt->execute()) {
            // Redirect ke halaman banner_santri.php setelah berhasil
            header("Location: banner_santri.php?pesan=sukses");
            exit;
        } else {
            echo "Gagal menghapus data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Query gagal disiapkan: " . $koneksi->error;
    }
} else {
    echo "ID tidak ditemukan!";
}

// Tutup koneksi
$koneksi->close();
?>
