<?php
// Koneksi ke database
include ('../koneksi.php');
// Ambil data dari form
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$foto = $_FILES['gambar']['tmp_name'];

// Validasi input file
if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    // Baca file gambar sebagai binary
    $fotoBinary = addslashes(file_get_contents($foto));

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO dokumentasi (nama, tanggal, foto) VALUES ('$nama', '$tanggal', '$fotoBinary')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil diunggah!";
        header("location:dok_kegiatan.php");
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "Terjadi kesalahan saat mengunggah file.";
}

// Tutup koneksi
$koneksi->close();
?>
