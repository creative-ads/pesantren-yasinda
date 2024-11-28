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
            <form action="upload_santri.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Tambah Data Santri</h2>

                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="number" class="form-control" id="nis" name="nis" placeholder="Masukkan nomor induk santri" value="<?php echo isset($nis) ? $nis : ''; ?>" required>

                    <!-- Pesan Error jika NIS sudah digunakan -->
                    <?php if (!empty($error_nis)) {
                        echo "<span style='color: red;'>$error_nis</span>";
                    } ?>

                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama lengkap" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" required>
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun Masuk</label>
                    <input type="date" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan tahun masuk" required>
                </div>

                <div class="form-group">
                    <label for="wali">Wali</label>
                    <input type="text" class="form-control" id="wali" name="wali" placeholder="Masukkan nama wali" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki" required>
                        <label class="form-check-label" for="laki_laki">
                            <span class="check"> Laki-laki </span>       
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">
                            <span class="check"> Perempuan </span>
                        </label>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn-submit">Submit</button>
            </form>

        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>