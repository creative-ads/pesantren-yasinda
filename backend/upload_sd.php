<?php
include('../koneksi.php');

// Periksa apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jl = $_POST['jl'];
    $jp = $_POST['jp'];

    // Query untuk menyimpan data ke tabel sd
    $query = "INSERT INTO sd (jl, jp) VALUES (?, ?)";
    $stmt = $koneksi->prepare($query);

    // Bind parameter dengan benar
    $stmt->bind_param("ii", $jl, $jp);

    // Eksekusi query dan cek keberhasilan
    if ($stmt->execute()) {
        // Redirect ke halaman ppdb.php setelah berhasil
        header("Location: ppdb.php");
        exit;
    } else {
        // Tampilkan pesan kesalahan jika terjadi error
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $koneksi->close();
} else {
    echo "Metode pengiriman tidak valid.";
}
?>
