<?php
include('../koneksi.php');

$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];

$alamat = $_POST['alamat'];
$tahun_masuk = $_POST['tahun_masuk'];
$wali = $_POST['wali'];

    // Jika tidak ada file gambar yang diunggah, update data lainnya tanpa mengganti gambar
    $sql = "UPDATE santri SET nis = ?, nama = ?, alamat = ?, tahun_masuk = ?, wali = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("issssi", $nis, $nama, $alamat, $tahun_masuk, $wali, $id);


if ($stmt->execute()) {
    echo "Data berhasil diupdate.";
    header("location:santri.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
