<?php
include('../koneksi.php');

// Query untuk mengambil data gambar dari database
$sql = "SELECT id, gambar FROM galery"; // Ganti dengan nama tabel yang sesuai
$result = $koneksi->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../cssBack/sidebar.css">
    <link rel="stylesheet" href="../cssBack/galery.css">
    <title>Galery</title>
   
</head>
<body>
    <?php include('../layout/sidebar.php'); ?>

    <div class="main-content">
        <h1><i class="fa fa-images"> </i> Galery Santri <i class="fa fa-sun spin"> </i> </h1>
        <h3> Admin / Galery Santri </h3>
        <hr class="animated-hr">

        <div class="cari">
            <a class="btn btn-primary" href="create_galery.php" role="button"> <i class="fa fa-plus"></i> Tambah</a>
            <a class="btn btn-secondary" href="galery.php" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
        </div>

        <div class="card-wrapper">
            <?php
            // Looping untuk menampilkan gambar
            while ($row = $result->fetch_assoc()) {
                // Mengambil data gambar biner
                $gambarData = $row['gambar'];
                $gambar = base64_encode($gambarData); // Encode data biner menjadi base64
                $id = $row['id']; // ID gambar

                echo '<div class="card" style="width: 13rem; height: 13rem">';
                echo '<img src="data:image/jpeg;base64,' . $gambar . '" alt="Gambar" class="card-image">';
                echo '<form action="hapus_galery.php" method="post">';
                echo '<button type="submit" name="hapus" value="' . $id . '" class="delete-btn"><i class="fa fa-trash-can"></i></button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>

    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
