<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../cssBack/sidebar.css">
    <link rel="stylesheet" href="../cssBack/pengumuman.css">

    <title>Pengumuman</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <div class="form-container">
            <form action="upload_pengumuman.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Buat Pengumuman</h2>

                <div class="form-group">
                    <label for="tanggal">Tanggal Dibuat </label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pengumuman dibuat" required>

                </div>

                <div class="form-group">
                    <label for="kepada">Kepada</label>
                    <input type="text" class="form-control" id="kepada" name="kepada" placeholder="Masukkan tujuan pengumuman" required>
                </div>

                <div class="form-group">
                    <label for="perihal">Perihal</label>
                    <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan perihal pengumuman" required>
                </div>

                <div class="form-group">
                    <label for="isi">Isi Pengumuman</label>
                    <textarea class="form-control" id="isi" name="isi" placeholder="Masukkan isi pengumuman" rows="7" required></textarea>
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