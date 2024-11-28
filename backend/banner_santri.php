<?php

// Menyertakan koneksi ke database
include('../koneksi.php');

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
    <link rel="stylesheet" href="../cssBack/banner_santri.css">
    <title>Banner Santri</title>
</head>

<body>
    <?php
    include('../layout/sidebar.php');
    ?>
    <div class="main-content">
        <h1><i class="fa fa-desktop"> </i> Banner Santri <i class="fa fa-jet-fighter maju-balik-cepat"> </i> <i class="fa fa-plane maju-balik-cepat"> </i></h1>
        <h3> Admin / Santri /Banner Santri </h3>
        <hr class="animated-hr">

        <div class="cari">
            <a class="btn btn-secondary btn-tambah-banner" href="create_banner_santri.php" role="button"><i class="fa fa-plus"></i> Tambah Banner</a>
            <a class="btn btn-secondary" href="banner_santri.php" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
            <a class="btn btn-secondary btn-kembali" href="santri.php" role="button"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Edit | Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data dari tabel banner_santri
                $query = "SELECT * FROM banner_santri";
                $result = $koneksi->query($query);

                // Periksa apakah ada data dalam tabel
                if ($result->num_rows > 0) {
                    $no = 1; // Nomor urut
                    while ($row = $result->fetch_assoc()) {
                        // Menampilkan data per baris
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['foto']) . "' alt='Banner' width='100' height='70'></td>";
                        echo "<td>
                    <a class='btn btn-warning btn-edit ' href='edit_banner_santri.php?id=" . $row['id'] . "'><i class='fa fa-edit'></i></a>
                    <a class='btn btn-danger btn-hapus ' href='hapus_banner_santri.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fa fa-trash-can'></i> </a>
                  </td>";
                        echo "</tr>";
                    }
                } else {
                    // Pesan jika tidak ada data
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data.</td></tr>";
                }
                ?>

            </tbody>
        </table>

    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>