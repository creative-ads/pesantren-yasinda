<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../cssBack/sidebar.css">
    <link rel="stylesheet" href="../cssBack/ppdb.css">
    <title> Berkas PPDB</title>
</head>

<body>
    <?php
    include('../layout/sidebar.php');
    ?>

    <div class="main-content">
        <h1><i class="fa fa-file"> </i> Berkas PPDB <i class="fa fa-sun spin"> </i></h1>
        <h3> Admin / Berkas PPDB </h3>
        <hr class="animated-hr">

        <div class="cari">

            <a class="btn btn-primary" href="create_berkas.php" role="button"> <i class="fa fa-plus"></i> Tambah Data</a>
            <a class="btn btn-secondary btn-kembali" href="ppdb.php" role="button"><i class="fa fa-backward"></i> Kembali</a>
            <a class="btn btn-secondary" href="berkas.php" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Browsur</th>
                    <th>Berkas</th>
                    <th>Jenjang</th>
                    <th>Edit | Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                include('../koneksi.php');

                // Query untuk mendapatkan data dari tabel ppdb
                $sql = "SELECT * FROM berkas";
                $result = mysqli_query($koneksi, $sql);
                $no = 1; // Nomor urut

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";

                        // Browsur (dari LONGBLOB) ditampilkan sebagai gambar
                        if ($row['browsur']) {
                            echo "<td><img src='data:" . $row['browsur_type'] . ";base64," . base64_encode($row['browsur']) . "' alt='Browsur' style='width:100px; height:auto;'></td>";
                        } else {
                            echo "<td>Tidak ada gambar</td>";
                        }

                        // Berkas ditampilkan sebagai link unduhan
                        if ($row['berkas']) {
                            echo "<td><a href='../uploads/" . htmlspecialchars($row['berkas']) . "' target='_blank' class='no-link'> <i class='fa fa-circle-down'> </i> Download</a></td>";
                        } else {
                            echo "<td>Tidak ada berkas</td>";
                        }
                        echo "<td>" . htmlspecialchars($row['jenjang']) . "</td>";

                        // Tombol Aksi
                        echo "<td>";
                        echo "<a class='btn btn-warning btn-editt' href='edit_berkas.php?id=" . $row['id'] . "' role='button'><i class='fa fa-pen-to-square'></i></a> ";
                        echo "<a class='btn btn-danger btn-sd' href='hapus_berkas.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' role='button'><i class='fa fa-trash-can'></i></a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>

        </table>

    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>