<?php
// Hubungkan ke database
include('../koneksi.php');

// Proses data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = isset($_POST['judul']) ? trim($_POST['judul']) : null;
    $link_youtube = isset($_POST['link_youtube']) ? trim($_POST['link_youtube']) : null;

    // Validasi data
    if (!empty($judul) && !empty($link_youtube)) {
        // Query untuk menyimpan data
        $query = "INSERT INTO video (judul, link_youtube) VALUES (?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ss", $judul, $link_youtube);

        if ($stmt->execute()) {
            echo "Video berhasil ditambahkan!";
            header("Location: video.php"); 
        } else {
            echo "Gagal menyimpan data: " . $stmt->error;
        }
    } else {
        echo "Mohon isi semua data dengan benar!";
    }
}
?>
