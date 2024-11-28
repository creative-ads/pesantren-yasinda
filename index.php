<?php
include('koneksi.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YASINDA</title>

    <link rel="stylesheet" href="cssFront/navbar.css">
    <link rel="stylesheet" href="cssFront/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <?php
    include('layout/navbar.php')
    ?>
    <section class="full-width-section">
        <div class="container">
            <div class="banner-content">
                <div class="text-content">
                    <h1 class="text-animated"><i class="fa fa-graduation-cap"></i> YASINDA STUDEN</h1>
                    <p> Pusat Informasi Santri Yasinda</p>
                    <div class="media">
                        <a href="#" class="btn btn-fb" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-tw" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" class="btn btn-ig" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-tt" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="btn btn-yt" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                    <a href="#" class="btn btn-warning"> <i class="fa fa-plane"></i> Jelajahi</a>
                </div>
                <div class="image-content">
                    <img src="assets/courier.png" alt="Banner Image">
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-award"></i> Santri Berprestasi <i class="fa fa-medal"></i> </h1>
        <hr class="anm-hr">
        <?php
        // Query untuk mengambil data menu
        $sql = "SELECT * FROM banner";
        $result = $koneksi->query($sql);

        while ($row = $result->fetch_assoc()):
        ?>

            <div class="container my-5">
                <div class="row align-items-center">
                    <div class="col-md-6 image">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar']); ?>" class="img-fluid rounded uniform-size" alt="Gambar">
                    </div>
                    <div class="col-md-6 judul">
                        <h2 class="display-5"><?php echo htmlspecialchars($row['prestasi']); ?></h2>
                        <p class="lead"><?php echo htmlspecialchars($row['paragraf']); ?></p>
                        <a href="#" class="btn btn-primary"> <i class="fa fa-share"></i> Selengkapnya</a>
                    </div>
                </div>

            </div>

        <?php endwhile; ?>

    </section>

    <section class="content">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-chart-simple"></i> Kegiatan </h1>
        <hr class="anm-hr">
        <?php
        // Query untuk mengambil data menu
        $sql = "SELECT * FROM banner";
        $result = $koneksi->query($sql);

        while ($row = $result->fetch_assoc()):
        ?>
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-md-6 image">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar_kegiatan']); ?>" class="img-fluid rounded uniform-size" alt="Gambar">
                </div>
                <div class="col-md-6 judul">
                    <h2 class="display-5"><?php echo htmlspecialchars($row['new']); ?></h2>
                    <p class="lead"><?php echo htmlspecialchars($row['paragraf_kegiatan']); ?></p>
                    <a href="#" class="btn btn-primary"> <i class="fa fa-share"></i> Selengkapnya</a>
                </div>
            </div>

        </div>
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-md-6 image">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar_kegiatan_dua']); ?>" class="img-fluid rounded uniform-size" alt="Gambar">
                </div>
                <div class="col-md-6 judul">
                    <h2 class="display-5"><?php echo htmlspecialchars($row['dua']); ?></h2>
                    <p class="lead"><?php echo htmlspecialchars($row['paragraf_kegiatan_dua']); ?></p>
                    <a href="#" class="btn btn-primary"> <i class="fa fa-share"></i> Selengkapnya</a>
                </div>
            </div>

        </div>

        
        <?php endwhile; ?>
    </section>

    <section class="give">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-star"></i> <i class="fa fa-star"></i> Dukungan Kami <i class="fa fa-star"></i> <i class="fa fa-star"></i> </h1>
        <hr class="anm-hr">

        <div class="container button-saweria">
            <a href="https://saweria.co/creativeads" target="_blank" class="btn btn-warning">
                <i class="fa fa-gift"></i> Saweria</a>
            <a href="https://trakteer.id/arlan_ady_pratama/link" target="_blank" class="btn btn-info">
                <i class="fa fa-sack-dollar"></i> Trakteer</a>
        </div>
        <!-- Tambahkan QRIS kecil -->
        <div class="qris-container">
            <img src="assets/qris.jpg" alt="QRIS" class="qris-image">
        </div>
    </section>

    <section class="kontak">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-star"></i> <i class="fa fa-star"></i> Kontak <i class="fa fa-star"></i> <i class="fa fa-star"></i> </h1>
        <hr class="anm-hr">
        <div class="container maps">
            <p class="maps"> <i class="fa fa-map-location-dot"></i> Jl. Jendral Sudirman No.86 Jakarta Pusat</p>
            <p class="email"> <i class="fa fa-envelope"></i> creativeads@gmail.com </p>
        </div>
    </section>
    <hr class="animated-hr">
    <section class="footer">
        <div class="copy">
            <p>&copy; 2024 Creative Ads.</p>
        </div>
    </section>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>