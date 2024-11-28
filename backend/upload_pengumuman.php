<?php
include('../koneksi.php'); // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $kepada = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $isi = $_POST['isi'];

    // Query untuk memasukkan data pengumuman ke database
    $query = "INSERT INTO pengumuman (tanggal, kepada, perihal, isi) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssss", $tanggal, $kepada, $perihal, $isi);

    if ($stmt->execute()) {
        echo "Pengumuman berhasil dibuat!";
        // Redirect ke halaman pengumuman setelah berhasil
        header("Location: pengumuman.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
}
?>
