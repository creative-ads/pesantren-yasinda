<?php
include('../koneksi.php');

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];

    // Query untuk mendapatkan nama berdasarkan NIS
    $query = "SELECT nama FROM santri WHERE nis = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $nis);
    $stmt->execute();
    $stmt->bind_result($nama);
    $stmt->fetch();

    echo $nama; // Mengirimkan nama sebagai respon
    $stmt->close();
}
?>
