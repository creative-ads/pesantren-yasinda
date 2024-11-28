<?php
// Include koneksi ke database
include('../koneksi.php');

// Periksa apakah parameter 'id' ada
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan 'id' adalah angka

    // Query untuk mengambil data terkait (opsional, untuk memastikan data dihapus dengan aman)
    $query_select = "SELECT foto, berkas FROM daftar_santri WHERE id = $id";
    $result_select = mysqli_query($koneksi, $query_select);
    $data = mysqli_fetch_assoc($result_select);

    if ($data) {
        // Hapus file foto dan berkas jika ada
        $foto_path = '../uploads/foto/' . $data['foto'];
        $berkas_path = '../uploads/berkas/' . $data['berkas'];

        if (file_exists($foto_path)) {
            unlink($foto_path); // Hapus file foto
        }
        if (file_exists($berkas_path)) {
            unlink($berkas_path); // Hapus file berkas
        }

        // Query untuk menghapus data
        $query_delete = "DELETE FROM daftar_santri WHERE id = $id";
        $result_delete = mysqli_query($koneksi, $query_delete);

        if ($result_delete) {
            echo "Data berhasil dihapus.";
            header("Location: pendaftaran.php");
        } else {
            echo "<script>alert('Gagal menghapus data.'); window.location.href = 'pendaftaran.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan.'); window.location.href = 'pendaftaran.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid.'); window.location.href = 'pendaftaran.php';</script>";
}
?>
