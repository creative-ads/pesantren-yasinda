<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../cssBack/sidebar.css">
    <link rel="stylesheet" href="../cssBack/create_berkas.css">

    <title>Berkas PPDB</title>
</head>

<body>
    <?php
    include('../layout/sidebar.php')
    ?>
    <div class="main-content">
        <div class="form-container">
            <form action="upload_berkas.php" method="post" enctype="multipart/form-data">
                <h2 class="form-title">Berkas PPDB</h2>

                <div class="form-group">
                    <label for="browsur">Browsur Gambar</label>
                    <input type="file" class="form-control-file" id="browsur" name="browsur" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="berkas">Berkas PDF / Doc</label>
                    <input type="file" class="form-control-file" id="berkas" name="berkas" accept=".pdf, .doc, .docx" required>
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

                <!-- Tombol Submit -->
                <button type="submit" class="btn-submit">Submit</button>
            </form>

        </div>
    </div>
    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>