<?php
include('../koneksi.php');

$id = $_POST['id'];
$judul = $_POST['judul'];
$link_youtube = $_POST['link_youtube'];

    // Jika tidak ada file gambar yang diunggah, update data lainnya tanpa mengganti gambar
    $sql = "UPDATE video SET judul = ?, link_youtube = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssi", $judul, $link_youtube, $id);


if ($stmt->execute()) {
    echo "Data berhasil diupdate.";
    header("location:video.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
