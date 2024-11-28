<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../cssBack/sidebar.css">
    <link rel="stylesheet" href="../cssBack/dok_kegiatan.css">

    <title>Edit Dokumentasi</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php');
    include('../koneksi.php');

    // Ambil ID dari URL
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Query untuk mendapatkan data berdasarkan ID
    $query = "SELECT * FROM dokumentasi WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "<p>Data tidak ditemukan!</p>";
        exit;
    }
    ?>

    <div class="main-content">
        <div class="form-container">
            <form action="update_dokumentasi.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Edit Dokumentasi Kegiatan</h2>

                <div class="form-group">
                    <label for="nama">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" 
                           value="<?= htmlspecialchars($data['nama']); ?>" placeholder="Masukkan nama kegiatan">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" 
                           value="<?= htmlspecialchars($data['tanggal']); ?>">
                </div>
                <div class="form-group">
                    <label for="gambar">Foto</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                    <img src="data:image/jpeg;base64,<?= base64_encode($data['foto']); ?>" 
                         alt="Preview" class="img-thumbnail mt-2" style="max-width: 150px;">
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn-submit">Simpan</button>
            </form>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
