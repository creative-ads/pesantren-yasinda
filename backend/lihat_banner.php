<?php
include('../koneksi.php');
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM banner WHERE id='$id'");
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
    <link rel="stylesheet" href="../cssBack/banner.css">

    <title>Banner</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <h1><i class="fa fa-server"> </i> Detail Banner</h1>
        <h3> Admin / Detail Banner </h3>
        <hr class="animated-hr">

        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'banner.php'); ?>" class="btn btn-primary"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>
        <!-- ID Banner (Hidden Input) -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($baris['id']); ?>">

        <div class="form-group">
            <label for="prestasi">Nama Santri Berprestasi</label>
            <?php echo htmlspecialchars($baris['prestasi']); ?>
        </div>

        <div class="form-group">
            <label for="paragraf">Deskripsi Lengkap</label>
            <?php echo htmlspecialchars($baris['paragraf']); ?>
        </div>

        <div class="form-group">
            <label for="gambar">Foto</label>

            <img src="data:image/jpeg;base64,<?php echo base64_encode($baris['gambar']); ?>"
                alt="Foto Banner" style="width: 150px; height: auto;">
        </div>


        <!-- Kegiatan 1 -->
        <div class="form-group">
            <label for="new">Nama Kegiatan Terbaru 1</label>
            <?php echo htmlspecialchars($baris['new']); ?>
        </div>

        <div class="form-group">
            <label for="paragraf_kegiatan">Deskripsi Lengkap Kegiatan 1</label>
            <?php echo htmlspecialchars($baris['paragraf_kegiatan']); ?>
        </div>

        <div class="form-group">
            <label for="gambar_kegiatan">Foto Kegiatan 1</label>

            <img src="data:image/jpeg;base64,<?php echo base64_encode($baris['gambar_kegiatan']); ?>"
                alt="Foto Kegiatan 1" style="width: 150px; height: auto;">
        </div>


        <!-- Kegiatan 2 -->
        <div class="form-group">
            <label for="dua">Nama Kegiatan Terbaru 2</label>
            <?php echo htmlspecialchars($baris['dua']); ?>
        </div>

        <div class="form-group">
            <label for="paragraf_kegiatan_dua">Deskripsi Lengkap Kegiatan 2</label>
            <?php echo htmlspecialchars($baris['paragraf_kegiatan_dua']); ?>
        </div>

        <div class="form-group">
            <label for="gambar_kegiatan_dua">Foto Kegiatan 2</label>

            <img src="data:image/jpeg;base64,<?php echo base64_encode($baris['gambar_kegiatan_dua']); ?>"
                alt="Foto Kegiatan 2" style="width: 150px; height: auto;">
        </div>

    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>