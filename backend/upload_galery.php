<?php
include('../koneksi.php'); // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Memeriksa apakah file gambar sudah diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = $_FILES['gambar'];

        // Memastikan bahwa file yang diunggah adalah gambar
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($gambar['type'], $allowedTypes)) {

            // Membaca file gambar sebagai data biner
            $imageData = file_get_contents($gambar['tmp_name']);

            // Query untuk menyimpan data gambar dalam bentuk biner (LONGBLOB)
            $sql = "INSERT INTO galery (gambar) VALUES (?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("s", $imageData); // Mengikat data biner gambar

            // Mengeksekusi query dan memberikan umpan balik
            if ($stmt->execute()) {
                echo "Data berhasil diunggah.";
                header("location:galery.php");
            } else {
                echo "Gagal menyimpan data gambar ke database!";
            }
        } else {
            echo "Hanya file gambar yang diperbolehkan!";
        }
    } else {
        echo "Tidak ada gambar yang diunggah!";
    }
}
?>
