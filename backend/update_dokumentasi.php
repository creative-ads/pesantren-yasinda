<?php
include('../koneksi.php');

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : null;
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : null;

    if (isset($_FILES['gambar']['tmp_name']) && !empty($_FILES['gambar']['tmp_name'])) {
        if ($_FILES['gambar']['size'] > 0 && $_FILES['gambar']['size'] <= 5000000) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['gambar']['type'], $allowed_types)) {
                $foto = file_get_contents($_FILES['gambar']['tmp_name']);
            } else {
                die("Format file tidak valid!");
            }
        } else {
            die("Ukuran file terlalu besar atau kosong!");
        }
    } else {
        $foto = null;
    }

    $query = "UPDATE dokumentasi SET ";
    $params = [];
    $types = "";

    if (!empty($nama)) {
        $query .= "nama = ?, ";
        $params[] = $nama;
        $types .= "s";
    }

    if (!empty($tanggal)) {
        $query .= "tanggal = ?, ";
        $params[] = $tanggal;
        $types .= "s";
    }

    if ($foto !== null) {
        $query .= "foto = ?, ";
        $params[] = $foto;
        $types .= "b";
    }

    $query = rtrim($query, ", ") . " WHERE id = ?";
    $params[] = $id;
    $types .= "i";

    $stmt = $koneksi->prepare($query);
    $stmt->bind_param($types, ...$params);

    if ($foto !== null) {
        $stmt->send_long_data(array_search($foto, $params), $foto);
    }

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui!";
        header("location:dok_kegiatan.php");
    } else {
        echo "Gagal memperbarui data!";
    }
}

?>
