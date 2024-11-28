<?php
include('../koneksi.php');
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM santri WHERE id='$id'");
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
    <link rel="stylesheet" href="../cssBack/santri.css">

    <title>Data Santri</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <div class="form-container">
            <form action="update_santri.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Edit Data Santri </h2>

                <!-- Input Menu -->
                <div class="form-group">
                    <label for="nis"> NIS</label>
                    <input value="<?php echo $baris['nis']; ?>" type="number" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS " required>
                </div>
                <input name="id" value="<?php echo $id; ?>" hidden>

                <div class="form-group">
                    <label for="nama"> Nama</label>
                    <input value="<?php echo $baris['nama']; ?>" type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap " required>
                </div>

                <div class="form-group">
                    <label for="alamat"> Alamat</label>
                    <input value="<?php echo $baris['alamat']; ?>" type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat " required>
                </div>

                <div class="form-group">
                    <label for="tahun_masuk"> Tahun Masuk</label>
                    <input value="<?php echo $baris['tahun_masuk']; ?>" type="date" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan tahun_masuk " required>
                </div>

                <!-- Input Harga -->
                <div class="form-group">
                    <label for="wali">Wali</label>
                    <input value="<?php echo $baris['wali']; ?>" type="text" class="form-control" id="wali" name="wali" placeholder="Masukkan nama wali" required>
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