<?php

include('../koneksi.php');

// Mengambil data dari form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tahun_masuk = $_POST['tahun_masuk'];
$wali = $_POST['wali'];
$jenis_kelamin = $_POST['jenis_kelamin'];

// Validasi tanggal
if (DateTime::createFromFormat('Y-m-d', $tahun_masuk) === false) {
    die("Format tanggal tidak valid.");
}


// Query untuk menyimpan data ke database
$sql = "INSERT INTO santri (nis, nama, alamat, tahun_masuk, wali, jenis_kelamin) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $koneksi->prepare($sql);

if (!$stmt) {
    die("Kesalahan prepare statement: " . $koneksi->error);
}

// Bind parameter (s = string, i = integer, b = blob)
$stmt->bind_param("isssss", $nis, $nama, $alamat, $tahun_masuk, $wali, $jenis_kelamin);


// Eksekusi query
if ($stmt->execute()) {
    echo "Data berhasil disimpan.";
    header("location:santri.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
