<?php
// Include koneksi ke database
include('../koneksi.php');

// Periksa apakah ID dikirim
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Update status acc ke 1 (disetujui)
    $query = "UPDATE daftar_santri SET acc = 1 WHERE id = $id AND acc = 0";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_affected_rows($koneksi) > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Pendaftaran berhasil di-Acc.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Data sudah di-Acc atau tidak ditemukan.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak valid.']);
}
?>
