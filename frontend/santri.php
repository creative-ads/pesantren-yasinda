<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santri</title>

    <link rel="stylesheet" href="../cssFront/navbar.css">
    <link rel="stylesheet" href="../cssFront/index.css">
    <link rel="stylesheet" href="../cssFront/santri.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <?php
    include('../layout/navbar.php');
    include('hero.php');
    ?>

    <section class="content-santri" id="santri">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-user-graduate"></i> Santri</h1>
        <hr class="anm-hr">

        <div class="teks">
            <h1> Cek Data Santri Yasinda</h1>
        </div>

        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="prestasi_santri.php#prestasi" class="btn btn-warning btn-pres"> <i class="fa fa-medal"></i> Prestasi</a>
            <a href="pelanggaran_santri.php#pelanggaran" class="btn btn-warning btn-pel"> <i class="fa fa-ban"></i> Pelanggaran</a>
            <a href="data_santri.php#data" class="btn btn-warning btn-data"> <i class="fa fa-chart-pie"></i> Data Santri</a>
        </div>

        <div class="container">
            <div id="bannerSantriCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php
                    include('../koneksi.php');

                    $query = "SELECT judul, foto FROM banner_santri";
                    $result = $koneksi->query($query);
                    $active = true;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $judul = $row['judul'];
                            $foto = base64_encode($row['foto']);
                            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                            echo '<img src="data:image/jpeg;base64,' . $foto . '" class="d-block w-100" alt="' . $judul . '">';
                            echo '<div class="carousel-caption d-none d-md-block">';
                            echo '<h5>' . $judul . '</h5>';
                            echo '</div>';
                            echo '</div>';
                            $active = false;
                        }
                    } else {
                        echo '<div class="carousel-item active">';
                        echo '<img src="../images/default.jpg" class="d-block w-100" alt="Default Image">';
                        echo '<div class="carousel-caption d-none d-md-block">';
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>