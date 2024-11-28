<?php
include('../koneksi.php'); // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];

    // Query untuk memasukkan data pengumuman ke database
    $query = "INSERT INTO banner_ppdb (judul, keterangan) VALUES (?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $judul, $keterangan);

    if ($stmt->execute()) {
        echo "Pengumuman berhasil dibuat!";
        // Redirect ke halaman pengumuman setelah berhasil
        header("Location: ppdb.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
}
?>
