<?php
include('../layout/sidebar.php');
include('../koneksi.php');

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mendapatkan data berdasarkan ID
$query = "SELECT * FROM berkas WHERE id = ?";
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

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenjang = $_POST['jenjang'];

    // Mengambil file gambar browsur
    $browsur = $data['browsur']; // Default jika gambar tidak diupload
    if (isset($_FILES['browsur']) && $_FILES['browsur']['error'] == 0) {
        $browsur = file_get_contents($_FILES['browsur']['tmp_name']);
    }

    // Mengambil file berkas
    $berkas = $data['berkas']; // Default jika berkas tidak diupload
    if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] == 0) {
        $berkas = $_FILES['berkas']['name'];
        move_uploaded_file($_FILES['berkas']['tmp_name'], "../uploads/" . $berkas);
    }

    // Query untuk memperbarui data
    $updateQuery = "UPDATE berkas SET browsur = ?, berkas = ?, jenjang = ? WHERE id = ?";
    $stmt = $koneksi->prepare($updateQuery);
    $stmt->bind_param("sssi", $browsur, $berkas, $jenjang, $id);
    $stmt->execute();

    // Redirect atau pesan sukses
    echo "<p>Data berhasil diperbarui!</p>";
    header('Location: berkas.php');
    exit;
}
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
    <link rel="stylesheet" href="../cssBack/create_ppdb.css">

    <title>Edit Berkas PPDB</title>
</head>

<body>

    <div class="main-content">
        <div class="form-container">
            <form action="edit_berkas.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Edit Berkas PPDB</h2>

                <div class="form-group">
                    <label for="browsur">Browsur Gambar</label>
                    <input type="file" class="form-control-file" id="browsur" name="browsur" accept="image/*">
                    <img src="data:image/jpeg;base64,<?= base64_encode($data['browsur']); ?>" alt="Preview" class="img-thumbnail mt-2" style="max-width: 150px;">
                </div>

                <div class="form-group">
                    <label for="berkas">Berkas PDF / Doc</label>
                    <input type="file" class="form-control-file" id="berkas" name="berkas" accept=".pdf, .doc, .docx">
                    <?php if (!empty($data['berkas'])): ?>
                        <a href="../uploads/<?php echo htmlspecialchars($data['berkas']); ?>" target="_blank" class="no-link">
                            Lihat Berkas
                        </a>
                    <?php else: ?>
                        <p>Tidak ada berkas yang diunggah.</p>
                    <?php endif; ?>
                </div>

                <!-- Jenjang -->
                <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <select class="form-control" id="jenjang" name="jenjang" required>
                        <option value="" disabled selected>Pilih Jenjang</option>
                        <option value="TK" <?= ($data['jenjang'] == 'TK') ? 'selected' : ''; ?>>TK</option>
                        <option value="SD" <?= ($data['jenjang'] == 'SD') ? 'selected' : ''; ?>>SD</option>
                        <option value="SMP" <?= ($data['jenjang'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                        <option value="SMK" <?= ($data['jenjang'] == 'SMK') ? 'selected' : ''; ?>>SMK</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>