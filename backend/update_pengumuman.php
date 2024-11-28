<?php
include('../koneksi.php');

$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$kepada = $_POST['kepada'];
$perihal = $_POST['perihal'];
$isi = $_POST['isi'];


    // Jika tidak ada file gambar yang diunggah, update data lainnya tanpa mengganti gambar
    $sql = "UPDATE pengumuman SET tanggal = ?, kepada = ?, perihal = ?, isi = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $tanggal, $kepada, $perihal, $isi, $id);


if ($stmt->execute()) {
    echo "Data berhasil diupdate.";
    header("location:pengumuman.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
