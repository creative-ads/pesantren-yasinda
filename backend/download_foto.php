<?php
// Koneksi ke database
include('../koneksi.php');

// Ambil ID dari parameter URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data foto berdasarkan ID
$sql = "SELECT foto FROM daftar_santri WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($foto);
$stmt->fetch();
$stmt->close();

if ($foto) {
    // Set header untuk mengunduh file
    header('Content-Type: image/jpeg');
    header('Content-Disposition: attachment; filename="foto_santri_' . $id . '.jpg"');
    echo $foto; // Outputkan data binary foto
} else {
    echo "Foto tidak ditemukan.";
}
?>
