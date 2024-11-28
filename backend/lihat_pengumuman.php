<?php

// Menyertakan koneksi ke database
include('../koneksi.php');

// Sanitasi input
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Query menggunakan prepared statement
$query = "SELECT kepada, isi FROM pengumuman WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);
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
    <link rel="stylesheet" href="../cssBack/pengumuman.css">

    <title>Detail Pengumuman</title>
</head>

<body>

    <?php include('../layout/sidebar.php'); ?>

    <div class="main-content">
        <h1><i class="fa fa-server"> </i> Detail Pengumuman</h1>
        <h3> Admin / Detail Pengumuman </h3>
        <hr class="animated-hr">

        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'pengumuman.php'); ?>" class="btn btn-light"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kepada</th>
                    <th>Isi Pengumuman</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['kepada']}</td>
                                <td>{$row['isi']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Data tidak ditemukan untuk nama: <strong>" . htmlspecialchars($id) . "</strong></td></tr>";
                }
                ?>
            </tbody>
        </table>
        
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
