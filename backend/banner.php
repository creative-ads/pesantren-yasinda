<?php

// Menyertakan koneksi ke database
include('../koneksi.php');

// Sanitasi input
$id = isset($_GET['id']);

// Query menggunakan prepared statement
$query = "SELECT * FROM banner";
$stmt = $koneksi->prepare($query);

$stmt->execute();
$result = $stmt->get_result();

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
    include('../layout/sidebar.php');
    ?>
    <div class="main-content">
        <h1><i class="fa fa-desktop"> </i> Banner Aplikasi <i class="fa fa-jet-fighter maju-balik-cepat"> </i> <i class="fa fa-plane maju-balik-cepat"> </i></h1>
        <h3> Admin / Banner </h3>
        <hr class="animated-hr">

        <div class="cari">
            <a class="btn btn-secondary" href="banner.php" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Santri Berprestasi</th>
                    <th>Kegiatan 1</th>
                    <th>Kegiatan 2</th>
                    <th>Edit | Lihat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($baris = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo htmlspecialchars($baris['prestasi']); ?></td>
                            <td><?php echo htmlspecialchars($baris['new']); ?></td>
                            <td><?php echo htmlspecialchars($baris['dua']); ?></td>

                            <td>
                                <a class="btn btn-success" href="edit_banner.php?id=<?php echo $baris['id']; ?>" role="button"><i class="fa fa-pen-to-square"></i></a>
                                <a class="btn btn-warning" href="lihat_banner.php?id=<?php echo $baris['id']; ?>" role="button"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data ditemukan untuk pencarian: <strong>$query</strong></td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>