<?php
include('../koneksi.php');

$id = $_POST['id'];  // Ambil ID dari form
$judul = $_POST['judul'];  // Ambil data judul
$keterangan = $_POST['keterangan'];  // Ambil data keterangan

// Query untuk update data
$sql = "UPDATE banner_ppdb SET judul = ?, keterangan = ? WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ssi", $judul, $keterangan, $id);

// Cek apakah query berhasil
if ($stmt->execute()) {
    echo "Data berhasil diupdate.";
    header("location:ppdb.php");  // Redirect ke halaman PPDB
    exit();
} else {
    echo "Error: " . $stmt->error;  // Menampilkan error jika query gagal
}

$stmt->close();
$koneksi->close();
?>
