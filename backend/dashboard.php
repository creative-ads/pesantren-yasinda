<?php
include('../koneksi.php');

// Query untuk menghitung jumlah pendaftar berdasarkan jenjang
$query = "
    SELECT jenjang, COUNT(*) AS jumlah 
    FROM daftar_santri 
    GROUP BY jenjang
";
$result = $koneksi->query($query);

// Siapkan array untuk menampung data
$dataJenjang = [
    'TK' => 0,
    'SD' => 0,
    'SMP' => 0,
    'SMK' => 0
];

// Proses hasil query
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataJenjang[$row['jenjang']] = $row['jumlah'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../cssBack/sidebar.css">
    <link rel="stylesheet" href="../cssBack/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
    include('../layout/sidebar.php');
    ?>
    <div class="main-content">
        <h1><i class="fa fa-chart-column"> </i> Dashboard <i class="fa fa-sun spin"> </i> </h1>
        <h3> Admin / Dashboard </h3>
        <hr class="animated-hr">

        <!-- Konten Dashboard -->
        <div class="container mt-4">
            <div class="row">
                <!-- Pie Chart -->
                <div class="col-md-6">
                    <h4>Distribusi Santri</h4>
                    <canvas id="santriChart" width="400" height="200"></canvas>
                </div>

                <!-- Total Pendaftar -->
                <div class="col-md-6">
                    <h4>Total Pendaftar</h4>
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 id="totalPendaftar" class="text-success">Loading...</h3>
                        </div>
                        <!-- Pendaftar TK -->
                        <div class="card-body text-center">
                            <h3 class="text-success">Pendaftar TK: <?= $dataJenjang['TK']; ?></h3>
                        </div>

                        <!-- Pendaftar SD -->
                        <div class="card-body text-center">
                            <h3 class="text-success">Pendaftar SD: <?= $dataJenjang['SD']; ?></h3>
                        </div>

                        <!-- Pendaftar SMP -->
                        <div class="card-body text-center">
                            <h3 class="text-success">Pendaftar SMP: <?= $dataJenjang['SMP']; ?></h3>
                        </div>

                        <!-- Pendaftar SMK -->
                        <div class="card-body text-center">
                            <h3 class="text-success">Pendaftar SMK: <?= $dataJenjang['SMK']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="../js/dash.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>