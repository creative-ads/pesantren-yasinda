<?php
// Koneksi ke database
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang']);

    // Variabel untuk menyimpan data
    $browsur = null;
    $browsur_type = null;
    $berkas = null;

    // Proses unggah browsur gambar ke database (LONGBLOB)
    if (!empty($_FILES['browsur']['tmp_name'])) {
        $browsur = addslashes(file_get_contents($_FILES['browsur']['tmp_name'])); // Ambil data gambar
        $browsur_type = $_FILES['browsur']['type']; // Ambil tipe file
    }

    // Proses unggah berkas PDF/Word ke folder uploads
    if (!empty($_FILES['berkas']['name'])) {
        $upload_dir = '../uploads/';
        $berkas_name = time() . '_' . basename($_FILES['berkas']['name']);
        $berkas_path = $upload_dir . $berkas_name;

        if (move_uploaded_file($_FILES['berkas']['tmp_name'], $berkas_path)) {
            $berkas = $berkas_name;
        } else {
            die("Gagal mengunggah berkas PDF/Word.");
        }
    }

    // Simpan data ke database
    $sql = "INSERT INTO berkas (browsur, browsur_type, berkas, jenjang) 
            VALUES ('$browsur', '$browsur_type', '$berkas', '$jenjang')";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil diunggah.";
        header('Location: berkas.php'); // Redirect ke halaman sukses (opsional)
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
