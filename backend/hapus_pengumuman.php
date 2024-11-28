<?php

    include ('../koneksi.php');

    $id = $_GET['id'];

    $hapus = mysqli_query($koneksi, "DELETE FROM pengumuman WHERE id='$id'");
    if ($hapus == TRUE) {
        echo "Data berhasil dihapus.";
        header("location:pengumuman.php");
    } else {
        echo "Error: ";
    }
?>