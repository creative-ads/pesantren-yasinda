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
    <title>Pengumuman</title>
</head>

<body>
    <?php
    include('../layout/sidebar.php');
    include('../koneksi.php'); // Koneksi ke database

    // Ambil input pencarian dari parameter URL
    $query = isset($_GET['query']) ? $_GET['query'] : '';

    // Tentukan jumlah data per halaman
    $limit = 10;

    // Ambil halaman saat ini dari URL, default ke 1
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    // Menambahkan wildcard pada query pencarian
    $search = "%" . $query . "%";

    // Query untuk menghitung total data
    $countSql = "SELECT COUNT(*) as total FROM pengumuman WHERE kepada LIKE ? OR perihal LIKE ?";
    $countStmt = $koneksi->prepare($countSql);
    $countStmt->bind_param("ss", $search, $search);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
    $totalRows = $countResult->fetch_assoc()['total'];

    // Menghitung total halaman
    $totalPages = ceil($totalRows / $limit);

    // Query untuk mengambil data pengumuman dengan LIMIT dan diurutkan berdasarkan tanggal terbaru
    $sql = "SELECT * FROM pengumuman WHERE kepada LIKE ? OR perihal LIKE ? ORDER BY tanggal DESC LIMIT ?, ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssii", $search, $search, $start, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="main-content">
        <h1><i class="fa fa-volume-up"> </i> Pengumuman</h1>
        <h3> Admin / Pengumuman </h3>
        <hr class="animated-hr">

        <div class="cari">
            <!-- Form pencarian tetap di halaman yang sama -->
            <form class="d-flex" role="search" action="" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Cari data..." value="<?php echo htmlspecialchars($query); ?>" aria-label="Search">
                <button class="btn btn-primary" type="submit"><i class="fa fa-magnifying-glass"></i></button>
            </form>

            <a class="btn btn-primary" href="create_pengumuman.php" role="button"> <i class="fa fa-plus"></i> Tambah Data</a>
            <a class="btn btn-secondary" href="pengumuman.php" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kepada</th>
                    <th>Perihal</th>
                    <th>Edit | Detail | Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $start;
                if ($result->num_rows > 0) {
                    while ($baris = $result->fetch_assoc()) {
                        $id++;
                ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($baris['tanggal'])); ?></td>
                            <td><?php echo htmlspecialchars($baris['kepada']); ?></td>
                            <td><?php echo htmlspecialchars($baris['perihal']); ?></td>

                            <td>
                                <a class="btn btn-success" href="edit_pengumuman.php?id=<?php echo $baris['id']; ?>" role="button"><i class="fa fa-pen-to-square"></i></a>
                                <a class="btn btn-warning" href="lihat_pengumuman.php?id=<?php echo $baris['id']; ?>" role="button"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-dark" href="hapus_pengumuman.php?id=<?php echo $baris['id']; ?>" role="button"><i class="fa fa-trash-can"></i></a>
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

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page - 1; ?>&query=<?php echo urlencode($query); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&query=<?php echo urlencode($query); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($page < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page + 1; ?>&query=<?php echo urlencode($query); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <?php
    $stmt->close();
    $countStmt->close();
    $koneksi->close();
    ?>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>