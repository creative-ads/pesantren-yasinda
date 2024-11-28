<?php

// Menyertakan koneksi ke database
include('../koneksi.php');

// Sanitasi input
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';

// Query menggunakan prepared statement
$query = "SELECT nis, nama, alamat, tahun_masuk, wali, jenis_kelamin FROM santri WHERE nama = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $nama);
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
    <link rel="stylesheet" href="../cssBack/santri.css">

    <title>Detail Santri</title>
</head>

<body>

    <?php include('../layout/sidebar.php'); ?>

    <div class="main-content">
        <h1><i class="fa fa-server"> </i> Detail Santri</h1>
        <h3> Admin / Detail Santri </h3>
        <hr class="animated-hr">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tahun Masuk</th>
                    <th>Wali</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nis']}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['tahun_masuk']}</td>
                                <td>{$row['wali']}</td>
                                <td>{$row['jenis_kelamin']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Data tidak ditemukan untuk nama: <strong>" . htmlspecialchars($nama) . "</strong></td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'santri.php'); ?>" class="btn btn-primary"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
