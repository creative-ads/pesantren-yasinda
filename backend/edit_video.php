<?php
include('../koneksi.php');
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM video WHERE id='$id'");
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
    <link rel="stylesheet" href="../cssBack/video.css">

    <title>Edit Video</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <div class="form-container">
            <form action="update_video.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Edit Video </h2>

                <!-- Input Menu -->
                <div class="form-group">
                    <label for="judul"> Judul</label>
                    <input value="<?php echo $baris['judul']; ?>" type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul " required>
                </div>
                <input name="id" value="<?php echo $id; ?>" hidden>

                <div class="form-group">
                    <label for="link_youtube"> Link YouTube</label>
                    <input value="<?php echo $baris['link_youtube']; ?>" type="url" class="form-control" id="link_youtube" name="link_youtube" placeholder="Masukkan link youtube " required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn-submit">Simpan</button>
            </form>

        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>