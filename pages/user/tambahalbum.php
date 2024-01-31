<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <figure class="text-center mt-5">
            <blockquote class="blockquote">
                <p>Tambah Album</p>
            </blockquote>
            <!-- <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption> -->
        </figure>

        <form action="../../app/service/tambah_album.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 row mt-5">
                <label for="nama_album" class="col-sm-2 col-form-label">Nama Album</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_album" name="nama_album" value="">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="foto" name="foto" value="">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-2">
                    <?php
                    if (isset($_GET['edit'])) {
                        echo "<button type='submit' class='btn btn-success' name='btntambah_album' value='edit'>SIMPAN</button>";
                    } else {
                        echo "<button type='submit' class='btn btn-success' name='btntambah_album' value='tambah'>TAMBAH</button>";
                    }
                    ?> </div>
                <div class="col-sm-6">
                    <!-- Tombol Keluar -->
                    <a href="index.php" class="btn btn-danger">KELUAR</a>
                </div>
            </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>