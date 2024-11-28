<?php
// Koneksi ke database
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $asal_sekolah = mysqli_real_escape_string($koneksi, $_POST['asal_sekolah']);
    $jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang']);
    $ayah = mysqli_real_escape_string($koneksi, $_POST['ayah']);
    $ibu = mysqli_real_escape_string($koneksi, $_POST['ibu']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    // Proses file foto (binary)
    $foto = null;
    if (!empty($_FILES['foto']['tmp_name'])) {
        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    }

    // Proses file berkas
    $berkas = null;
    if (!empty($_FILES['berkas']['name'])) {
        $upload_dir = '../daftar/';
        $berkas_name = time() . '_' . basename($_FILES['berkas']['name']);
        $berkas_path = $upload_dir . $berkas_name;

        // Cek dan buat folder jika belum ada
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Pindahkan file berkas ke folder
        if (move_uploaded_file($_FILES['berkas']['tmp_name'], $berkas_path)) {
            $berkas = $berkas_name;
        } else {
            die("Gagal mengunggah berkas.");
        }
    }

    // Simpan data ke database
    $sql = "
        INSERT INTO daftar_santri 
        (nama, jenis_kelamin, alamat, asal_sekolah, jenjang, ayah, ibu, no_hp, foto, berkas) 
        VALUES 
        ('$nama', '$jenis_kelamin', '$alamat', '$asal_sekolah', '$jenjang', '$ayah', '$ibu', '$no_hp', '$foto', '$berkas')
    ";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil disimpan.";
        header('Location: ppdb.php#daftar_santri');
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
