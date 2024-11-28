<?php
include('../koneksi.php');

// Ambil parameter id
$id = $_GET['id'] ?? null;

if (empty($id)) {
    die("ID tidak diberikan.");
}

// Query untuk mengambil data video berdasarkan ID
$data = mysqli_query($koneksi, "SELECT * FROM video WHERE id='$id'");

if (!$data) {
    die("Error Query: " . mysqli_error($koneksi));
}

$baris = mysqli_fetch_array($data);

if (!$baris) {
    die("Video tidak ditemukan dengan ID: " . htmlspecialchars($id));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssFront/video.css">
    <title>Video</title>
</head>
<body>
    <h1>Detail Video</h1>

    <div>
        <h2><?php echo htmlspecialchars($baris['judul']); ?></h2>
        <div>
            <?php
            $youtube_url = $baris['link_youtube'];

            // Ambil ID video dari URL
            if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtube_url, $matches)) {
                $video_id = $matches[1];
                echo '<iframe width="320" height="180" src="https://www.youtube.com/embed/' . htmlspecialchars($video_id) . '" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>';
            } else {
                echo "<p>Link YouTube tidak valid atau video tidak ditemukan.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
