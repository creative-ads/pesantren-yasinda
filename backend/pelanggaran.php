<?php
// Menyertakan koneksi ke database
include('../koneksi.php');

// Mendapatkan NIS dari URL
if (!isset($_GET['nis']) || empty($_GET['nis'])) {
    die("NIS tidak ditemukan!");
}

$nis = $_GET['nis'];

// Mendapatkan data santri berdasarkan NIS
$query_santri = "SELECT nis, nama FROM santri WHERE nis = ?";
$stmt_santri = $koneksi->prepare($query_santri);
$stmt_santri->bind_param("s", $nis);
$stmt_santri->execute();
$result_santri = $stmt_santri->get_result();

// Periksa apakah data santri ditemukan
if ($result_santri->num_rows == 0) {
    die("Santri dengan NIS tersebut tidak ditemukan.");
}
$santri = $result_santri->fetch_assoc();

// Mendapatkan data prestasi berdasarkan NIS
$query_prestasi = "SELECT * FROM pelanggaran WHERE nis = ?";
$stmt_prestasi = $koneksi->prepare($query_prestasi);
$stmt_prestasi->bind_param("s", $nis);
$stmt_prestasi->execute();
$result_prestasi = $stmt_prestasi->get_result();
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
    <link rel="stylesheet" href="../cssBack/prestasi.css">
    <title>Pelanggaran Santri</title>
</head>

<body>
    <?php include('../layout/sidebar.php'); ?>
    <div class="main-content">
        <h1><i class="fa fa-circle-xmark"> </i> Pelanggaran Santri</h1>
        <h3> Admin / Pelanggaran</h3>
        <hr class="animated-hr">

        <h6>Santri: <strong><?php echo htmlspecialchars($santri['nama']); ?></strong></h6>
        <h6>NIS : <strong><?php echo htmlspecialchars($santri['nis']); ?></strong></h6>

        <div class="cari">
            <a class="btn btn-primary" href="santri.php" role="button"><i class="fa fa-arrow-left"></i> Kembali</a>
            <a class="btn btn-secondary" href="pelanggaran.php?nis=<?php echo htmlspecialchars($santri['nis']); ?>" role="button"><i class="fa fa-rotate-right"></i> Refresh</a>
        </div>

        <!-- Tabel Prestasi -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_prestasi->num_rows > 0) {
                    $no = 1;
                    while ($prestasi = $result_prestasi->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>" . htmlspecialchars($prestasi['kategori']) . "</td>
                                <td>" . htmlspecialchars($prestasi['keterangan']) . "</td>
                                <td>" . htmlspecialchars($prestasi['tanggal']) . "</td>
                                <td>
                                    <a class='btn btn-danger' href='hapus_pelanggaran.php?id=" . $prestasi['id'] . "' '><i class='fa fa-trash-can'></i></a>
                                </td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Belum ada pelanggaran untuk santri ini.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Form Tambah Prestasi -->
        <div class="form-container">
            <form action="upload_pelanggaran.php" method="post">
                <h2 class="form-title">Tambah Pelanggaran</h2>
                <input type="hidden" name="nis" value="<?php echo htmlspecialchars($santri['nis']); ?>">

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo htmlspecialchars($santri['nama']); ?>" readonly>
                </div>

                <!-- Kategori -->
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Raingan">Ringan</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Berat">Berat</option>
                    </select>
                </div>

                <!-- Pencapaian -->
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan Pelanggaran</label>
                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Pelanggaran yang dibuat" required>
                </div>

                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn-submit">Tambah Prestasi</button>
            </form>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
