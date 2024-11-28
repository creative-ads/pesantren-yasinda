<?php
include('../koneksi.php');

// Periksa metode permintaan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // ID sebagai identifikasi

    // Query awal
    $query = "UPDATE banner SET ";
    $params = [];

    // Cek setiap input apakah diisi
    if (!empty($_POST['prestasi'])) {
        $query .= "prestasi = '" . mysqli_real_escape_string($koneksi, $_POST['prestasi']) . "', ";
    }

    if (!empty($_POST['paragraf'])) {
        $query .= "paragraf = '" . mysqli_real_escape_string($koneksi, $_POST['paragraf']) . "', ";
    }

    if (!empty($_FILES['gambar']['tmp_name']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
        $gambarEscaped = mysqli_real_escape_string($koneksi, $gambar);
        $query .= "gambar = '$gambarEscaped', ";
    }

    if (!empty($_POST['new'])) {
        $query .= "new = '" . mysqli_real_escape_string($koneksi, $_POST['new']) . "', ";
    }

    if (!empty($_POST['paragraf_kegiatan'])) {
        $query .= "paragraf_kegiatan = '" . mysqli_real_escape_string($koneksi, $_POST['paragraf_kegiatan']) . "', ";
    }

    if (!empty($_FILES['gambar_kegiatan']['tmp_name']) && $_FILES['gambar_kegiatan']['error'] === UPLOAD_ERR_OK) {
        $gambarKegiatan = file_get_contents($_FILES['gambar_kegiatan']['tmp_name']);
        $gambarKegiatanEscaped = mysqli_real_escape_string($koneksi, $gambarKegiatan);
        $query .= "gambar_kegiatan = '$gambarKegiatanEscaped', ";
    }

    if (!empty($_POST['dua'])) {
        $query .= "dua = '" . mysqli_real_escape_string($koneksi, $_POST['dua']) . "', ";
    }

    if (!empty($_POST['paragraf_kegiatan_dua'])) {
        $query .= "paragraf_kegiatan_dua = '" . mysqli_real_escape_string($koneksi, $_POST['paragraf_kegiatan_dua']) . "', ";
    }

    if (!empty($_FILES['gambar_kegiatan_dua']['tmp_name']) && $_FILES['gambar_kegiatan_dua']['error'] === UPLOAD_ERR_OK) {
        $gambarKegiatanDua = file_get_contents($_FILES['gambar_kegiatan_dua']['tmp_name']);
        $gambarKegiatanDuaEscaped = mysqli_real_escape_string($koneksi, $gambarKegiatanDua);
        $query .= "gambar_kegiatan_dua = '$gambarKegiatanDuaEscaped', ";
    }

    // Menghapus koma terakhir pada query
    $query = rtrim($query, ", ") . " WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil diperbarui!";
        header("Location: banner.php");
        exit;
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
?>
