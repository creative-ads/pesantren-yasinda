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
    <title>PPDB</title>
</head>

<body>
    <?php
    include('../layout/sidebar.php');
    ?>

    <div class="main-content">
        <h1><i class="fa fa-wave-square"> </i> PPDB <i class="fa fa-sun spin"> </i></h1>
        <h3> Admin / PPDB </h3>
        <hr class="animated-hr">

        <div class="jenjang">
            <a class="btn btn-primary btn-tk" href="tk.php" role="button"> <i class="fa fa-box-archive"></i> TK</a>
            <a class="btn btn-primary btn-sd" href="sd.php" role="button"> <i class="fa fa-box-archive"></i> SD</a>
            <a class="btn btn-primary btn-smp" href="smp.php" role="button"> <i class="fa fa-box-archive"></i> SMP</a>
            <a class="btn btn-primary btn-smk" href="smk.php" role="button"> <i class="fa fa-box-archive"></i> SMK</a>

            <a class="btn btn-primary btn-lihat" href="kuota.php" role="button"> <i class="fa fa-eye"></i> Lihat Kuota</a>
        </div>

        <div class="cari">
            <a class="btn btn-primary btn-berkas" href="berkas.php" role="button"> <i class="fa fa-plus"></i> Browsur & Berkas</a>

            <a class="btn btn-primary" href="create_ppdb.php" role="button"> <i class="fa fa-plus"></i> Tambah Informasi</a>
            <a class="btn btn-secondary" href="ppdb.php" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Edit | Lihat | Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                include('../koneksi.php');

                // Query untuk mendapatkan data dari tabel ppdb
                $sql = "SELECT * FROM banner_ppdb";
                $result = mysqli_query($koneksi, $sql);
                $no = 1; // Nomor urut

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['keterangan']) . "</td>";

                        // Tombol Aksi
                        echo "<td>";
                        echo "<a class='btn btn-warning btn-editt' href='edit_ppdb.php?id=" . $row['id'] . "' role='button'><i class='fa fa-pen-to-square'></i></a> ";
                        echo "<a class='btn btn-warning btn-eye' href='lihat_ppdb.php?id=" . $row['id'] . "' role='button'><i class='fa fa-eye'></i></a> ";
                        echo "<a class='btn btn-danger btn-sd' href='hapus_ppdb.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' role='button'><i class='fa fa-trash-can'></i></a>";
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