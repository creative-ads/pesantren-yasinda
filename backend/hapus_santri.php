<?php

    include ('../koneksi.php');

    $id = $_GET['id'];

    $hapus = mysqli_query($koneksi, "DELETE FROM santri WHERE id='$id'");
    if ($hapus == TRUE) {
        echo "Data berhasil dihapus.";
        header("location:santri.php");
    } else {
        echo "Error: ";
    }
?>