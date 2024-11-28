<?php
include('../koneksi.php');

// Memeriksa jika ada ID yang dikirimkan melalui POST
if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];

    // Query untuk menghapus gambar berdasarkan ID
    $sql = "DELETE FROM galery WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id); // "i" untuk integer

    if ($stmt->execute()) {
        echo "Gambar berhasil dihapus!";
        header("Location: galery.php"); // Arahkan kembali ke halaman galeri setelah menghapus
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus gambar.";
    }
}
?>
