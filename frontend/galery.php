<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../cssFront/navbar.css">
    <link rel="stylesheet" href="../cssFront/index.css">
    <link rel="stylesheet" href="../cssFront/swiper.css">
    <link rel="stylesheet" href="../cssFront/galery.css">
    <!-- Tambahkan CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <title>Galeri</title>
</head>

<body>
    <?php
    include('../layout/navbar.php');
    include('hero.php');
    ?>

    <section class="content-santri" id="galery">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-images"></i> Galeri Santri</h1>
        <hr class="anm-hr">

        <div class="container">
            <div id="bannerSantriCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php
                    include('../koneksi.php');

                    $query = "SELECT id, gambar FROM galery";
                    $result = $koneksi->query($query);
                    $active = true;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $gambar = base64_encode($row['gambar']);
                            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                            echo '<div class="d-flex justify-content-center">';
                            echo '<img src="data:image/jpeg;base64,' . $gambar . '" class="carousel-img" alt="">';
                            echo '</div>';
                            echo '</div>';
                            $active = false;
                        }
                    } else {
                        echo '<div class="carousel-item active">';
                        echo '<div class="d-flex justify-content-center">';
                        echo '<img src="../images/default.jpg" class="carousel-img" alt="Default Image">';
                        echo '</div>';
                        echo '<div class="carousel-caption custom-caption">';
                        echo '<h5>Belum ada data</h5>';
                        echo '</div>';
                        echo '</div>';
                    }
                    

                    $koneksi->close();
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerSantriCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerSantriCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myCarousel = new bootstrap.Carousel(document.querySelector('#bannerSantriCarousel'), {
                interval: 3000, // Waktu pergantian slide dalam milidetik
                ride: 'carousel' // Mengaktifkan mode otomatis
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>