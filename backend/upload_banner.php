<?php
// Menghubungkan ke database
include ('../koneksi.php');

// Proses pengunggahan gambar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data formulir
    $prestasi = $_POST['prestasi'];
    $paragraf = $_POST['paragraf'];
    
    $new = $_POST['new'];
    $paragraf_kegiatan = $_POST['paragraf_kegiatan'];
    
    $dua = $_POST['dua'];
    $paragraf_kegiatan_dua = $_POST['paragraf_kegiatan_dua'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['tmp_name'];
    $gambar_kegiatan = $_FILES['gambar_kegiatan']['tmp_name'];
    $gambar_kegiatan_dua = $_FILES['gambar_kegiatan_dua']['tmp_name'];

    $gambar_data = null;
    $gambar_kegiatan_data = null;
    $gambar_kegiatan_dua_data = null;

    // Mengonversi gambar menjadi binary untuk disimpan di database
    if ($gambar) {
        $gambar_data = file_get_contents($gambar); // Membaca file gambar
    }
    
    if ($gambar_kegiatan) {
        $gambar_kegiatan_data = file_get_contents($gambar_kegiatan);
    }

    if ($gambar_kegiatan_dua) {
        $gambar_kegiatan_dua_data = file_get_contents($gambar_kegiatan_dua);
    }

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO banner (prestasi, paragraf, gambar, new, paragraf_kegiatan, gambar_kegiatan, dua, paragraf_kegiatan_dua, gambar_kegiatan_dua) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $koneksi->prepare($sql)) {
        // Binding parameter dan menyimpan data ke dalam database
        $stmt->bind_param("sssssssss", $prestasi, $paragraf, $gambar_data, $new, $paragraf_kegiatan, $gambar_kegiatan_data, $dua, $paragraf_kegiatan_dua, $gambar_kegiatan_dua_data);
        
        // Mengeksekusi query dan memberikan pesan berhasil atau gagal
        if ($stmt->execute()) {
            echo "Data berhasil diunggah.";
            header("location:banner.php");
        } else {
            echo "Gagal mengunggah data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Query gagal: " . $koneksi->error;
    }

    // Tutup koneksi
    $koneksi->close();
}
?>
