<?php
include('../koneksi.php');
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM video WHERE id='$id'");
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
    <link rel="stylesheet" href="../cssBack/video.css">

    <title>Lihat Detail Video</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <h1><i class="fa fa-video"> </i> Detail Video</h1>
        <h3> Admin / Detail Video </h3>
        <hr class="animated-hr">

        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'video.php'); ?>" class="btn btn-primary"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>
        <!-- ID Banner (Hidden Input) -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($baris['id']); ?>">

        <div class="form-group">
            <label for="juduli">Judul</label>
            <?php echo htmlspecialchars($baris['judul']); ?>
        </div>

        <div class="form-group">
            <label for="link_youtube">Vidio</label>
            <div class="video-preview mt-2">
                <?php
                // Extract YouTube video ID from the URL
                $youtube_url = $baris['link_youtube'];

                $youtube_url = $baris['link_youtube'];

                // Tambahkan regex untuk berbagai format YouTube
                if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtube_url, $matches)) {
                    $video_id = $matches[1]; // Ambil ID video
                    echo '<iframe width="320" height="180" src="https://www.youtube.com/embed/' . htmlspecialchars($video_id) . '" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>';
                } else {
                    echo "<p>Link YouTube tidak valid atau video tidak ditemukan.</p>";
                }

                ?>
            </div>
        </div>

    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>