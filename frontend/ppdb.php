<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../cssFront/navbar.css">
    <link rel="stylesheet" href="../cssFront/index.css">
    <link rel="stylesheet" href="../cssFront/ppdb.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <title>PPDB</title>
</head>

<body>
    <?php
    include('../layout/navbar.php');
    include('hero.php');
    ?>

    <section class="content-santri" id="ppdb">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-user-graduate"></i> Penerimaan Peserta Didik Baru</h1>
        <hr class="anm-hr">

        <?php
        include('../koneksi.php');

        // Mengambil data dari tabel banner_ppdb
        $query = "SELECT judul, keterangan FROM banner_ppdb"; // Sesuaikan nama kolom dengan tabel Anda
        $result = $koneksi->query($query);
        ?>
        <div class="section-background">
            <div class="container one">
                <?php
                if ($result->num_rows > 0) {
                    // Iterasi setiap baris data
                    while ($row = $result->fetch_assoc()) {
                        $judul = htmlspecialchars($row['judul']); // Sanitasi judul
                        $keterangan = htmlspecialchars($row['keterangan']); // Sanitasi keterangan
                ?>
                        <h3><i class="fa fa-bell"></i> <?php echo $judul; ?> <i class="fa fa-sun spin"></i></h3>
                        <p><?php echo $keterangan; ?></p>
                <?php
                    }
                } else {
                    echo "<p>Data tidak ditemukan.</p>";
                }
                ?>
            </div>
        </div>


        <?php
        // Menyertakan koneksi ke database
        include('../koneksi.php');

        // Fungsi untuk mengambil data dari tabel
        function getData($koneksi, $table)
        {
            $query = "SELECT * FROM $table";  // Mengambil semua data dari tabel
            $result = $koneksi->query($query);

            if ($result && $result->num_rows > 0) {
                return $result; // Mengembalikan hasil query
            }
            // Jika tabel kosong, kembalikan null
            return null;
        }

        // Ambil data dari tabel masing-masing
        $tk_data = getData($koneksi, 'tk');
        $sd_data = getData($koneksi, 'sd');
        $smp_data = getData($koneksi, 'smp');
        $smk_data = getData($koneksi, 'smk');
        ?>

        <div class="container two">
            <h3><i class="fa fa-ticket"></i> Kuota Santri <i class="fa fa-sun spin"></i></h3>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th rowspan="2">Jenjang</th>
                        <th colspan="2">Jumlah</th>
                    </tr>
                    <tr>
                        <th>Laki-Laki</th>
                        <th>Perempuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data dari setiap jenjang (TK, SD, SMP, SMK)
                    // Fungsi yang sama diterapkan untuk setiap jenjang
                    if ($tk_data !== null) {
                        while ($baris = $tk_data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>TK</td>';
                            echo '<td>' . ($baris['jl'] != null ? $baris['jl'] : "Data belum ditambahkan") . '</td>';
                            echo '<td>' . ($baris['jp'] != null ? $baris['jp'] : "Data belum ditambahkan") . '</td>';
                            echo '</tr>';
                        }
                    }

                    // Lakukan hal yang sama untuk SD, SMP, dan SMK
                    if ($sd_data !== null) {
                        while ($baris = $sd_data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>SD</td>';
                            echo '<td>' . ($baris['jl'] != null ? $baris['jl'] : "Data belum ditambahkan") . '</td>';
                            echo '<td>' . ($baris['jp'] != null ? $baris['jp'] : "Data belum ditambahkan") . '</td>';
                            echo '</tr>';
                        }
                    }

                    if ($smp_data !== null) {
                        while ($baris = $smp_data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>SMP</td>';
                            echo '<td>' . ($baris['jl'] != null ? $baris['jl'] : "Data belum ditambahkan") . '</td>';
                            echo '<td>' . ($baris['jp'] != null ? $baris['jp'] : "Data belum ditambahkan") . '</td>';
                            echo '</tr>';
                        }
                    }

                    if ($smk_data !== null) {
                        while ($baris = $smk_data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>SMK</td>';
                            echo '<td>' . ($baris['jl'] != null ? $baris['jl'] : "Data belum ditambahkan") . '</td>';
                            echo '<td>' . ($baris['jp'] != null ? $baris['jp'] : "Data belum ditambahkan") . '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="section-background">
            <div class="container three">
                <h3> <i class="fa fa-cloud-arrow-down"></i> Download Browsur <i class="fa fa-sun spin"></i> </h3>

                <?php
                include('../koneksi.php');

                // Array untuk mengelompokkan jenjang
                $jenjang_pairs = [
                    ['TK', 'SD'], // Kelompok pertama (TK dan SD)
                    ['SMP', 'SMK'], // Kelompok kedua (SMP dan SMK)
                ];

                foreach ($jenjang_pairs as $pair) {
                    echo '<div class="row mb-3">'; // Baris untuk kelompok
                    foreach ($pair as $jenjang) {
                        // Query untuk setiap jenjang
                        $query = "SELECT id FROM berkas WHERE jenjang = '$jenjang'";
                        $result = $koneksi->query($query);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $id = $row['id']; // ID untuk digunakan di URL download

                            // Kolom untuk tombol
                            echo '<div class="col-6">'; // 50% lebar untuk semua ukuran layar
                            echo '<a href="download.php?id=' . $id . '" class="btn btn-primary w-100 mb-2"> <i class="fa fa-circle-down"></i> Browsur ' . $jenjang . '</a>';
                            echo '</div>';
                        } else {
                            echo '<div class="col-6">';
                            echo '<button class="btn btn-secondary w-100 mb-2" disabled>Tidak ada browsur untuk ' . $jenjang . '</button>';
                            echo '</div>';
                        }
                    }
                    echo '</div>'; // Tutup baris untuk kelompok
                }
                ?>
            </div>
        </div>

        <div class="container empat">
            <h3><i class="fa fa-file"></i> Berkas Persyaratan <i class="fa fa-sun spin"></i></h3>

            <?php
            include('../koneksi.php');

            // Array untuk mengelompokkan jenjang
            $jenjang_pairs = [
                ['TK', 'SD'], // Kelompok pertama (TK dan SD)
                ['SMP', 'SMK'], // Kelompok kedua (SMP dan SMK)
            ];

            foreach ($jenjang_pairs as $pair) {
                echo '<div class="row mb-3">'; // Baris untuk kelompok
                foreach ($pair as $jenjang) {
                    // Query untuk setiap jenjang
                    $query = "SELECT id, berkas FROM berkas WHERE jenjang = '$jenjang'";
                    $result = $koneksi->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $id = $row['id']; // ID untuk digunakan di URL download
                        $berkas = $row['berkas']; // Nama file berkas

                        // Kolom untuk tombol
                        echo '<div class="col-6">'; // 50% lebar untuk semua ukuran layar
                        echo '<a href="../uploads/' . $berkas . '" class="btn btn-success w-100 mb-2" target="_blank"> <i class="fa fa-circle-down"></i> Berkas ' . $jenjang . '</a>';
                        echo '</div>';
                    } else {
                        echo '<div class="col-6">';
                        echo '<button class="btn btn-secondary w-100 mb-2" disabled>Tidak ada berkas untuk ' . $jenjang . '</button>';
                        echo '</div>';
                    }
                }
                echo '</div>'; // Tutup baris untuk kelompok
            }
            ?>
        </div>
        <div class="section-background" id="daftar_santri">
            <div class="container lima">
                <h3><i class="fa fa-user-graduate"></i> Daftar Santri Baru <i class="fa fa-sun spin"></i></h3>

                <div class="daftar-santri">
                    <a class="btn btn-secondary btn-daftar" href="daftar.php" role="button"><i class="fa fa-user-plus"></i> Daftar Santri</a>
                </div>
            </div>
        </div>
    </section>

    <?php
    include('kontak.php');
    ?>

    <hr class="animated-hr">

    <?php
    include('footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>