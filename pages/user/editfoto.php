<?php
session_start();
include('../../config/koneksi.php');

// Check if 'edit' is set in the URL
$foto_id = isset($_GET['edit']) ? $_GET['edit'] : '';

if (!empty($foto_id)) {
    $sqlfoto = mysqli_query($konek, "SELECT * FROM foto WHERE foto_id='$foto_id'");
    while ($data = mysqli_fetch_array($sqlfoto)) {
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="">
    <div class="container">
        <figure class="text-center mt-5">
            <blockquote class="blockquote">
                <p>Tambah Foto</p>
            </blockquote>
        </figure>

        <form action="../../app/service/edit_foto.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="foto_id" value="<?php echo $foto_id; ?>">

            <div class="mb-3 row mt-5">
                <label for="judul_foto" class="col-sm-2 col-form-label">Judul Foto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_foto" name="judul_foto"
                        value="<?= $data['judul_foto'] ?>">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="deskripsi_foto" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi_foto" name="deskripsi_foto"
                        value="<?= $data['deskripsi_foto'] ?>">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="deskripsi_foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="lokasi_file" name="lokasi_file"
                        value="<?= $data['lokasi_file'] ?>">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-2">
                    <button type='submit' class='btn btn-success' name='editfoto' value='editfoto'>SIMPAN</button>
                </div>
                <div class="col-sm-6">
                    <a href='foto.php?foto=<?php echo $foto_id; ?>' class='btn btn-danger'>KELUAR</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
    }
} else {
    echo "Error: 'edit' is not set in the URL.";
}
?>