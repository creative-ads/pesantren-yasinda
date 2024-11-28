<?php
include('../koneksi.php');

// Query jumlah santri
$santriQuery = "SELECT 
    COUNT(*) AS total_santri,
    SUM(CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END) AS jumlah_laki,
    SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) AS jumlah_perempuan
FROM santri";
$santriResult = $koneksi->query($santriQuery);
$santriData = $santriResult->fetch_assoc();

// Query jumlah pendaftar
$pendaftaranQuery = "SELECT COUNT(*) AS total_pendaftar FROM daftar_santri";
$pendaftaranResult = $koneksi->query($pendaftaranQuery);
$pendaftaranData = $pendaftaranResult->fetch_assoc();

// Hasil data
$dashboardData = [
    'total_santri' => $santriData['total_santri'],
    'jumlah_laki' => $santriData['jumlah_laki'],
    'jumlah_perempuan' => $santriData['jumlah_perempuan'],
    'total_pendaftar' => $pendaftaranData['total_pendaftar'],
];

// Encode ke JSON untuk dikirim ke frontend
echo json_encode($dashboardData);

?>
