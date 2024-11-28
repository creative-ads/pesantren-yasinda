<?php

    include ('../koneksi.php');

    $id = $_GET['id'];

    $hapus = mysqli_query($koneksi, "DELETE FROM sd WHERE id='$id'");
    if ($hapus == TRUE) {
        echo "Data berhasil dihapus.";
        header("location:kuota.php");
    } else {
        echo "Error: ";
    }
?>