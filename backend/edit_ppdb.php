<?php
include('../koneksi.php');

$id = $_GET['id'];  // Ambil ID dari URL
$data = mysqli_query($koneksi, "SELECT * FROM banner_ppdb WHERE id='$id'");
$baris = mysqli_fetch_array($data);
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
    <link rel="stylesheet" href="../cssBack/create_ppdb.css">

    <title>Edit PPDB</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <div class="form-container">
            <form action="update_ppdb.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Edit PPDB</h2>

                <!-- Input Hidden untuk ID -->
                <input type="hidden" name="id" value="<?= $id ?>">

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= htmlspecialchars($baris['judul']); ?>" placeholder="Masukkan judul" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Isi keterangan PPDB</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan isi keterangan ppdb" rows="3" required><?= htmlspecialchars($baris['keterangan']); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
