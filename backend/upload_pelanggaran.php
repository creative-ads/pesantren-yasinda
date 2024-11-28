<?php
include('../koneksi.php');

// Periksa apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    // Query untuk menyimpan data ke tabel prestasi
    $query = "INSERT INTO pelanggaran (nis, nama, kategori, keterangan, tanggal) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssss", $nis, $nama, $kategori, $keterangan, $tanggal);

    if ($stmt->execute()) {
        header("Location: pelanggaran.php?nis=" . urlencode($nis));
        exit;
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
} else {
    echo "Metode pengiriman tidak valid.";
}
?>
