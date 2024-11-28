<?php
// Include koneksi ke database
include('../koneksi.php');

// Ambil data pencarian (jika ada)
$query = isset($_GET['query']) ? mysqli_real_escape_string($koneksi, $_GET['query']) : '';

// Pagination
$limit = 10; // Jumlah data per halaman
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Query untuk mendapatkan total data
$count_sql = "SELECT COUNT(*) AS total FROM daftar_santri";
if ($query) {
    $count_sql .= " WHERE nama LIKE '%$query%' OR jenjang LIKE '%$query%'";
}
$count_result = mysqli_query($koneksi, $count_sql);
$total_data = mysqli_fetch_assoc($count_result)['total'];

// Total halaman
$total_pages = ceil($total_data / $limit);

// Query untuk mendapatkan data dengan limit dan offset
$sql = "SELECT id, nama, jenjang, foto, berkas, acc FROM daftar_santri";
if ($query) {
    $sql .= " WHERE nama LIKE '%$query%' OR jenjang LIKE '%$query%'";
}
$sql .= " LIMIT $limit OFFSET $offset";

$result = mysqli_query($koneksi, $sql);
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
    <title>Pendaftaran</title>
</head>

<body>
    <?php include('../layout/sidebar.php'); ?>

    <div class="main-content">
        <h1><i class="fa fa-user-plus"> </i> Pendaftaran Santri</h1>
        <h3> Admin / Pendaftaran </h3>
        <hr class="animated-hr">

        <div class="cari">
            <!-- Form pencarian -->
            <form class="d-flex" role="search" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Cari data nama atau jenjang" value="<?php echo htmlspecialchars($query); ?>" aria-label="Search">
                <button class="btn btn-primary" type="submit"><i class="fa fa-magnifying-glass"></i></button>
            </form>

            <a class="btn btn-secondary" href="pendaftaran.php" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenjang</th>
                    <th>Foto</th>
                    <th>Berkas</th>
                    <th>Detail | Hapus</th>
                    <th>Acc</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = $offset + 1; // Penomoran sesuai halaman
                    while ($row = mysqli_fetch_assoc($result)) {
                        $berkas_path = '../daftar/' . $row['berkas'];
                        $foto_download_url = 'download_foto.php?id=' . $row['id']; // URL untuk download foto
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['jenjang']); ?></td>
                            <td>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['foto']); ?>" alt="Foto" class="img-thumbnail" style="width: 100px; height: auto;">
                                <br>
                                <a href="<?php echo $foto_download_url; ?>" class="btn btn-info btn-sm mt-2">
                                    <i class="fa fa-download"></i> Download
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $berkas_path; ?>" class="btn btn-success btn-sm" download>
                                    <i class="fa fa-download"></i> Download Berkas
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="lihat_pendaftar.php?id=<?php echo $row['id']; ?>" role="button"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-dark" href="hapus_pendaftar.php?id=<?php echo $row['id']; ?>" role="button"><i class="fa fa-trash-can"></i></a>
                            </td>
                            <td>
                                <input
                                    type="checkbox"
                                    class="form-check-input acc-checkbox"
                                    data-id="<?php echo $row['id']; ?>"
                                    <?php echo ($row['acc'] == 1) ? 'checked disabled' : ''; ?>>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">Tidak ada data ditemukan.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page - 1; ?>&query=<?php echo htmlspecialchars($query); ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&query=<?php echo htmlspecialchars($query); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page + 1; ?>&query=<?php echo htmlspecialchars($query); ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="../js/acc.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>