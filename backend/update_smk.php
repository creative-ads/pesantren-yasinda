<?php
include('../koneksi.php');

$id = $_POST['id'];
$jl = $_POST['jl'];
$jp = $_POST['jp'];


    // Jika tidak ada file gambar yang diunggah, update data lainnya tanpa mengganti gambar
    $sql = "UPDATE smk SET jl = ?, jp = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("iii", $jl, $jp, $id);


if ($stmt->execute()) {
    echo "Data berhasil diupdate.";
    header("location:kuota.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
