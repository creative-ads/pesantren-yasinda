<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../cssFront/navbar.css">
    <link rel="stylesheet" href="../cssFront/index.css">
    <link rel="stylesheet" href="../cssFront/daftar_santri.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <title>Daftar Santri Baru</title>
</head>

<body>
    <?php
    include('../layout/navbar.php');
    ?>
    <section class="content-santri" id="daftar_santri">
        <hr class="animated-hr">
        <h1 class="hone"><i class="fa fa-thumbtack"></i> Daftar Santri Baru</h1>
        <hr class="anm-hr">

        <div class="form-container">
            <form action="upload_daftar.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Daftar</h2>

                <div class="form-group">
                    <label for="nama">Nama Santri</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama lengkap" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki" required>
                        <label class="form-check-label" for="laki_laki">
                            <span class="check"> Laki-laki </span>       
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">
                            <span class="check"> Perempuan </span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="asal_sekolah">Sekolah Sebelumnya</label>
                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Masukkan asal sekolah sebelumnya" required>
                </div>

                <!-- Jenjang -->
                <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <select class="form-control" id="jenjang" name="jenjang" required>
                        <option value="" disabled selected>Pilih Jenjang</option>
                        <option value="TK">TK</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMK">SMK</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ayah">Nama Ayah</label>
                    <input type="text" class="form-control" id="ayah" name="ayah" placeholder="Masukkan Nama Ayah / Bapak" required>
                </div>

                <div class="form-group">
                    <label for="ibu">Nama Ibu</label>
                    <input type="text" class="form-control" id="ibu" name="ibu" placeholder="Masukkan Nama Ibu" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP Wali</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Hp" required>
                </div>

                <div class="form-group">
                    <label for="browsur">Foto 3x4</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="berkas">Berkas Lengkap </label>
                    <input type="file" class="form-control-file" id="berkas" name="berkas" accept=".pdf, .doc, .docx" required>
                    <p>* Berkas jadikan satu file.</p>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn-submit">Daftar</button>
            </form>

        </div>
    </section>

</body>

</html>