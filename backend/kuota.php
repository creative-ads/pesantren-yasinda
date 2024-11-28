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
    <link rel="stylesheet" href="../cssBack/btn_kuota.css">

    <title>Kuota Siswa</title>
</head>

<body>

    <?php include('../layout/sidebar.php'); ?>

    <div class="main-content">
        <h1><i class="fa fa-database"> </i> Kuota Siswa</h1>
        <h3> Admin / Kuota Siswa </h3>
        <hr class="animated-hr">

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th rowspan="2">Jenjang</th>
                    <th colspan="2">Jumlah</th>
                    <th rowspan="2">Edit | Hapus</th>
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
                        echo '<td>
                                <a class="btn btn-info btn-edit" href="edit_tk.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-hapus" href="hapus_tk.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-trash-can"></i></a>
                              </td>';
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
                        echo '<td>
                                <a class="btn btn-info btn-edit" href="edit_sd.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-hapus" href="hapus_sd.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-trash-can"></i></a>
                              </td>';
                        echo '</tr>';
                    }
                }

                if ($smp_data !== null) {
                    while ($baris = $smp_data->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>SMP</td>';
                        echo '<td>' . ($baris['jl'] != null ? $baris['jl'] : "Data belum ditambahkan") . '</td>';
                        echo '<td>' . ($baris['jp'] != null ? $baris['jp'] : "Data belum ditambahkan") . '</td>';
                        echo '<td>
                                <a class="btn btn-info btn-edit" href="edit_smp.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-hapus" href="hapus_smp.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-trash-can"></i></a>
                              </td>';
                        echo '</tr>';
                    }
                }

                if ($smk_data !== null) {
                    while ($baris = $smk_data->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>SMK</td>';
                        echo '<td>' . ($baris['jl'] != null ? $baris['jl'] : "Data belum ditambahkan") . '</td>';
                        echo '<td>' . ($baris['jp'] != null ? $baris['jp'] : "Data belum ditambahkan") . '</td>';
                        echo '<td>
                                <a class="btn btn-info btn-edit" href="edit_smk.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-hapus" href="hapus_smk.php?id=' . $baris['id'] . '" role="button"><i class="fa fa-trash-can"></i></a>
                              </td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="d-md-flex justify-content-md-end ms-auto me-5">
            <a href="ppdb.php" class="btn btn-primary"><i class="fa fa-clock-rotate-left"></i> Kembali</a>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
