<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../cssFront/navbar.css">
    <link rel="stylesheet" href="../cssFront/index.css">
    <link rel="stylesheet" href="../cssFront/swiper.css">
    <link rel="stylesheet" href="../cssFront/video.css">
    <!-- Tambahkan CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <title>video</title>

    <style>
        /* CSS untuk menampilkan 2 video di layar laptop dan 1 video di layar hp */
        .video-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 video per baris pada layar besar */
            gap: 20px; /* Jarak antar video */
        }

        /* Media query untuk layar kecil (HP) */
        @media (max-width: 767px) {
            .video-container {
                width: 400px;
                grid-template-columns: 1fr; /* 1 video per baris pada layar kecil */
            }
        }
       
    </style>
</head>

<body>
    <?php
    include('../layout/navbar.php');
    include('hero.php');

    include('../koneksi.php');

    // Ambil semua data video dari tabel
    $result = mysqli_query($koneksi, "SELECT * FROM video");

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }
    ?>

    <section class="content-santri" id="video">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-circle-play"></i> Video</h1>
        <hr class="anm-hr">

        <div class="container">
            <div class="video-container">
                <?php
                // Loop untuk menampilkan setiap video
                while ($baris = mysqli_fetch_array($result)) {
                    $youtube_url = $baris['link_youtube']; // Link video dari database

                    // Validasi format link YouTube
                    if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtube_url, $matches)) {
                        $video_id = $matches[1]; // Ambil ID video
                        echo '<div class="video-preview">';
                        echo '<iframe width="320" height="180" src="https://www.youtube.com/embed/' . htmlspecialchars($video_id) . '" 
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>';
                        echo '</div>';
                    } else {
                        echo "<p>Link YouTube tidak valid atau video tidak ditemukan.</p>";
                    }
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

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
