<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../cssFront/navbar.css">
    <link rel="stylesheet" href="../cssFront/index.css">
    <link rel="stylesheet" href="../cssFront/swiper.css">
    <link rel="stylesheet" href="../cssFront/pengumuman.css">
    <!-- Tambahkan CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <title>Pengumuman</title>
</head>

<body>
    <?php
    include('../layout/navbar.php');
    include('hero.php');
    ?>
    <section class="content-santri" id="pengumuman">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-bell"></i> Pengumuman</h1>
        <hr class="anm-hr">

        <?php
        include('../koneksi.php');

        // Mengambil data dari tabel banner_ppdb
        $query = "SELECT tanggal, kepada, perihal, isi FROM pengumuman"; // Sesuaikan nama kolom dengan tabel Anda
        $result = $koneksi->query($query);
        ?>
        <div class="section-background">
            <div class="container one">
                <?php
                if ($result->num_rows > 0) {
                    // Iterasi setiap baris data
                    while ($row = $result->fetch_assoc()) {
                        $kepada = htmlspecialchars($row['kepada']); // Sanitasi keterangan
                        $perihal = htmlspecialchars($row['perihal']); // Sanitasi judul
                        $isi = htmlspecialchars($row['isi']); // Sanitasi keterangan
                ?>
                        <h3> Kepada : <?php echo $kepada; ?></h3>
                        <h4> Perihal : <?php echo $perihal; ?></h4>
                        <p><?php echo $isi; ?></p>
                        <hr>
                <?php
                    }
                } else {
                    echo "<p>Data tidak ditemukan.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <?php
    include('kontak.php');
    ?>

    <hr class="animated-hr">

    <?php
    include('footer.php');
    ?>
    <!-- Tambahkan JS -->

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>