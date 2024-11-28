<?php

// Menyertakan koneksi ke database
include('../koneksi.php');

// Sanitasi input
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Query menggunakan prepared statement
$query = "SELECT nama, jenis_kelamin, alamat, asal_sekolah, ayah, ibu, no_hp FROM daftar_santri WHERE id = ?";
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
    <link rel="stylesheet" href="../cssBack/pendaftaran.css">

    <title>Detail Pendaftar</title>
</head>

<body>

    <?php include('../layout/sidebar.php'); ?>

    <div class="main-content">
        <h1><i class="fa fa-server"></i> Detail Pendaftar</h1>
        <h3>Admin / Detail Pendaftar</h3>
        <hr class="animated-hr">

        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'pendaftaran.php'); ?>" class="btn btn-info">
                <i class="fa fa-clock-rotate-left"></i> Kembali
            </a>
        </div>

        <div class="data-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="data-row d-flex align-items-start">
                        <!-- Thead (Kiri) -->
                        <div class="data-header">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                    </tr>
                                    <tr>
                                        <th>Asal Sekolah</th>
                                    </tr>
                                    <tr>
                                        <th>Ayah</th>
                                    </tr>
                                    <tr>
                                        <th>Ibu</th>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- Tbody (Kanan) -->
                        <div class="data-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['asal_sekolah']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['ayah']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['ibu']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['no_hp']); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p>Data tidak ditemukan.</p>';
            }
            ?>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>