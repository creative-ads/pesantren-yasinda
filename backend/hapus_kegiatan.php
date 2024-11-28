<?php
include('../koneksi.php'); // Pastikan koneksi database di-include

// Periksa apakah parameter id tersedia
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM dokumentasi WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke halaman utama dengan pesan sukses
        header("Location: dok_kegiatan.php?pesan=hapus_sukses");
        exit();
    } else {
        // Jika gagal, redirect dengan pesan error
        header("Location: dok_kegiatan.php?pesan=hapus_gagal");
        exit();
    }
} else {
    // Jika tidak ada parameter id, redirect kembali ke halaman utama
    header("Location: dok_kegiatan.php");
    exit();
}
?>
