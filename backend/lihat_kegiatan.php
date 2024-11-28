<?php
include('../koneksi.php');
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM dokumentasi WHERE id='$id'");
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
    <link rel="stylesheet" href="../cssBack/dok_kegiatan.css">

    <title>Dokumentasi Kegiatan</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <h1><i class="fa fa-server"> </i> Detail Kegiatan</h1>
        <h3> Admin / Detail Kegiatan </h3>
        <hr class="animated-hr">

        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'dok_kegiatan.php'); ?>" class="btn btn-primary"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>
        <!-- ID Banner (Hidden Input) -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($baris['id']); ?>">

        <div class="form-group">
            <label for="nama">Nama Kegiatan</label>
            <?php echo htmlspecialchars($baris['nama']); ?>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <?php echo date('d-m-Y', strtotime($baris['tanggal'])); ?>
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>

            <img src="data:image/jpeg;base64,<?php echo base64_encode($baris['foto']); ?>"
                alt="Foto Banner" style="width: 300px; height: auto;">
        </div>

    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>