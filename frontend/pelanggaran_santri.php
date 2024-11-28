<?php
// Koneksi ke database
include('../koneksi.php');

// Variabel pencarian
$keyword = isset($_GET['search']) ? $_GET['search'] : ''; // Cek apakah ada parameter pencarian

// Mengambil data hanya jika ada pencarian
$data = [];
if ($keyword) {
    // Menyiapkan query untuk mencari berdasarkan nama
    $sql = "SELECT * FROM pelanggaran WHERE nama LIKE ?";
    $keywordForSQL = "%" . $keyword . "%"; // Membuat pencarian lebih fleksibel
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $keywordForSQL); // Bind parameter untuk mencegah SQL injection
    $stmt->execute();

    // Menyimpan hasil pencarian
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Menyimpan hasil query dalam array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $stmt->close();
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggaran Santri</title>

    <link rel="stylesheet" href="../cssFront/navbar.css">
    <link rel="stylesheet" href="../cssFront/index.css">
    <link rel="stylesheet" href="../cssFront/prestasi_santri.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('../layout/navbar.php');
    include('hero.php');
    ?>

    <section class="content-santri" id="pelanggaran">
        <hr class="animated-hr">
        <h1 class="hone"> <i class="fa fa-ban"></i> Pelanggaran Santri</h1>
        <hr class="anm-hr">

        <div class="cari">
            <form method="GET" action="" class="d-flex mb-3" >
                <input
                    type="text"
                    name="search"
                    class="form-control me-2"
                    placeholder="Cari Nama Santri..."
                    value="<?= htmlspecialchars($keyword); ?>"> <!-- Menampilkan keyword tanpa % -->
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>

            </form>

        </div>

        <div class="card shadow-lg p-3">
            <?php if (!empty($data)): ?>
                <?php
                // Variabel untuk mengecek apakah nama sudah ditampilkan
                $namaTampilkan = '';
                $nisTampilkan = '';
                ?>
                <table class="table">
                    <tbody>
                        <?php foreach ($data as $row): ?>

                            <?php
                            // Jika nama dan NIS belum ditampilkan, tampilkan sekali
                            if ($namaTampilkan != $row['nama'] || $nisTampilkan != $row['nis']) {
                                $namaTampilkan = $row['nama'];
                                $nisTampilkan = $row['nis'];
                            ?>
                                <!-- Baris untuk NIS dan Nama (hanya tampil sekali) -->
                                <tr>
                                    <td class="text-start">NIS</td>
                                    <td class="text-end"><?= htmlspecialchars($row['nis']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-start">Nama</td>
                                    <td class="text-end"><?= htmlspecialchars($row['nama']); ?></td>
                                </tr>
                            <?php } ?>

                            <!-- Baris untuk Kategori -->
                            <tr>
                                <td class="text-start">Tingkat </td>
                                <td class="text-end"><?= htmlspecialchars($row['kategori']); ?></td>
                            </tr>
                            <!-- Baris untuk Pencapaian -->
                            <tr>
                                <td class="text-start">Pelanggaran</td>
                                <td class="text-end"><?= htmlspecialchars($row['keterangan']); ?></td>
                            </tr>
                            <!-- Baris untuk Tanggal dengan format yang sudah diperbarui -->
                            <?php
                            // Array untuk hari dalam bahasa Indonesia
                            $hariIndonesia = array(
                                "Sunday" => "Minggu",
                                "Monday" => "Senin",
                                "Tuesday" => "Selasa",
                                "Wednesday" => "Rabu",
                                "Thursday" => "Kamis",
                                "Friday" => "Jumat",
                                "Saturday" => "Sabtu"
                            );

                            // Mendapatkan nama hari dalam bahasa Inggris
                            $hariInggris = date('l', strtotime($row['tanggal']));

                            // Mengonversi nama hari ke bahasa Indonesia
                            $hari = $hariIndonesia[$hariInggris];

                            // Menampilkan tanggal dengan format hari, tanggal-bulan-tahun
                            ?>
                            <tr>
                                <td class="text-start">Tanggal</td>
                                <td class="text-end"><?php echo $hari . ', ' . date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif (isset($_GET['search']) && empty($data)): ?>
                <p class="text-center mt-3">Santri tidak mempunyai pelanggaran.</p>
            <?php endif; ?>
        </div>
        <a href="santri.php#santri" class="btn btn-warning btn-kembali"> <i class="fa fa-backward"></i> Kembali</a>
    </section>

    <?php
    include('kontak.php');
    ?>

    <hr class="animated-hr">

    <?php
    include('footer.php');
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myCarousel = new bootstrap.Carousel(document.querySelector('#bannerSantriCarousel'), {
                interval: 3000, // Waktu pergantian slide dalam milidetik
                ride: 'carousel' // Mengaktifkan mode otomatis
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>