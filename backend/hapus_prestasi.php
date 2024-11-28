<?php
// Menyertakan koneksi ke database
include('../koneksi.php');

// Periksa apakah parameter ID ada
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

// Query untuk menghapus data prestasi berdasarkan ID
$query = "DELETE FROM prestasi WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);

// Eksekusi query dan periksa hasilnya
if ($stmt->execute()) {
    // Redirect kembali ke halaman prestasi.php setelah berhasil
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    die("Gagal menghapus data prestasi: " . $stmt->error);
}
?>
