<?php
include('../koneksi.php');
$id = $_GET['id'];
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

    <title>Detail PPDB</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <h1><i class="fa fa-server"> </i> Detail PPDB</h1>
        <h3> Admin / Detail PPDB </h3>
        <hr class="animated-hr">

        <!-- ID Banner (Hidden Input) -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($baris['id']); ?>">

        <div class="form-group">
            <label for="judul">Judul</label>
            <?php echo htmlspecialchars($baris['judul']); ?>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan PPDB</label>
            <?php echo htmlspecialchars($baris['keterangan']); ?>
        </div>
        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'ppdb.php'); ?>" class="btn btn-primary btn-kbl"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
