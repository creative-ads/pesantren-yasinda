<?php
// Menghubungkan ke database
include('../koneksi.php');

// Proses pengunggahan gambar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data formulir
    $judul = $_POST['judul'];
    $foto = $_FILES['foto']['tmp_name'];

    $gambar_data = null;

    // Memeriksa apakah file gambar telah diunggah
    if ($foto) {
        $gambar_data = file_get_contents($foto); // Membaca file gambar
    }

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO banner_santri (judul, foto) VALUES (?, ?)";

    if ($stmt = $koneksi->prepare($sql)) {
        // Binding parameter (judul sebagai string dan foto sebagai blob)
        $stmt->bind_param("sb", $judul, $gambar_data);
        
        // Kirim data blob
        $stmt->send_long_data(1, $gambar_data);

        // Mengeksekusi query dan memberikan pesan berhasil atau gagal
        if ($stmt->execute()) {
            echo "Data berhasil diunggah.";
            header("Location: banner_santri.php");
            exit;
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
