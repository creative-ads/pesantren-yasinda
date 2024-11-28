<?php
include('../koneksi.php');
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM banner WHERE id='$id'");
$baris = mysqli_fetch_array($data);

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
    <link rel="stylesheet" href="../cssBack/banner.css">

    <title>Banner</title>
</head>

<body>

    <?php
    include('../layout/sidebar.php')
    ?>

    <div class="main-content">
        <div class="form-container">
            <form action="update_banner.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Edit Banner </h2>

                <!-- ID Banner (Hidden Input) -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($baris['id']); ?>">

                <div class="form-group">
                    <label for="prestasi">Nama Santri Berprestasi</label>
                    <input type="text" class="form-control" id="prestasi" name="prestasi"
                        value="<?php echo htmlspecialchars($baris['prestasi']); ?>"
                        placeholder="Masukkan nama santri berprestasi" required>
                </div>

                <div class="form-group">
                    <label for="paragraf">Deskripsi Lengkap</label>
                    <textarea class="form-control" id="paragraf" name="paragraf"
                        placeholder="Masukkan paragraf lengkap" rows="5" required><?php echo htmlspecialchars($baris['paragraf']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar">Foto</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                    <?php if ($baris['gambar']): ?>
                        <p>Gambar saat ini:</p>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($baris['gambar']); ?>"
                            alt="Foto Banner" style="width: 150px; height: auto;">
                    <?php else: ?>
                        <p>Tidak ada gambar yang diunggah.</p>
                    <?php endif; ?>
                </div>


                <!-- Kegiatan 1 -->
                <div class="form-group">
                    <label for="new">Nama Kegiatan Terbaru 1</label>
                    <input type="text" class="form-control" id="new" name="new"
                        value="<?php echo htmlspecialchars($baris['new']); ?>"
                        placeholder="Masukkan judul kegiatan" required>
                </div>

                <div class="form-group">
                    <label for="paragraf_kegiatan">Deskripsi Lengkap Kegiatan 1</label>
                    <textarea class="form-control" id="paragraf_kegiatan" name="paragraf_kegiatan"
                        placeholder="Masukkan paragraf lengkap" rows="5" required><?php echo htmlspecialchars($baris['paragraf_kegiatan']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar_kegiatan">Foto Kegiatan 1</label>
                    <input type="file" class="form-control-file" id="gambar_kegiatan" name="gambar_kegiatan" accept="image/*">
                    <?php if ($baris['gambar_kegiatan']): ?>
                        <p>Gambar saat ini:</p>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($baris['gambar_kegiatan']); ?>"
                            alt="Foto Kegiatan 1" style="width: 150px; height: auto;">
                    <?php else: ?>
                        <p>Tidak ada gambar kegiatan yang diunggah.</p>
                    <?php endif; ?>
                </div>


                <!-- Kegiatan 2 -->
                <div class="form-group">
                    <label for="dua">Nama Kegiatan Terbaru 2</label>
                    <input type="text" class="form-control" id="dua" name="dua"
                        value="<?php echo htmlspecialchars($baris['dua']); ?>"
                        placeholder="Masukkan judul kegiatan 2" required>
                </div>

                <div class="form-group">
                    <label for="paragraf_kegiatan_dua">Deskripsi Lengkap Kegiatan 2</label>
                    <textarea class="form-control" id="paragraf_kegiatan_dua" name="paragraf_kegiatan_dua"
                        placeholder="Masukkan paragraf lengkap" rows="5" required><?php echo htmlspecialchars($baris['paragraf_kegiatan_dua']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar_kegiatan_dua">Foto Kegiatan 2</label>
                    <input type="file" class="form-control-file" id="gambar_kegiatan_dua" name="gambar_kegiatan_dua" accept="image/*">
                    <?php if ($baris['gambar_kegiatan_dua']): ?>
                        <p>Gambar saat ini:</p>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($baris['gambar_kegiatan_dua']); ?>"
                            alt="Foto Kegiatan 2" style="width: 150px; height: auto;">
                    <?php else: ?>
                        <p>Tidak ada gambar kegiatan yang diunggah.</p>
                    <?php endif; ?>
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