<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <figure class="text-center mt-5">
            <blockquote class="blockquote">
                <p>Tambah Foto</p>
            </blockquote>
            <!-- <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption> -->
        </figure>

        <form action="../../app/service/tmbhfoto.php" method="post" enctype="multipart/form-data">
            <?php
            include('../../config/koneksi.php');
            session_start();
            $user_id = $_SESSION['user_id'];
            $album_id = $_GET['album_id'];
            $isEdit = isset($_GET['edit']);

            $sql = mysqli_query($konek, "SELECT *from album where user_id='$user_id' and album_id='$album_id'");

            while ($data = mysqli_fetch_array($sql)) {

            ?>
                <input type="hidden" name="album_id" value="<?php echo $data['album_id']; ?>">
            <?php
            } ?> <div class="mb-3 row mt-5">
                <label for="judul_foto" class="col-sm-2 col-form-label">Judul Foto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_foto" name="judul_foto" value="">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="deskripsi_foto" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi_foto" name="deskripsi_foto" value="">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="lokasi_file" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="lokasi_file" name="lokasi_file" value="">
                </div>
            </div>
            <!-- <div class="mb-3 row mt-5">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="foto" name="foto" value="">
                </div>
            </div> -->
            <div class="row mt-5">
                <div class="col-sm-2">
                    <?php
                    if (isset($_GET['edit'])) {
                        echo "<button type='submit' class='btn btn-success' name='tambahfoto' value='edit'>SIMPAN</button>";
                    } else {
                        echo "<button type='submit' class='btn btn-success' name='tambahfoto' value='tambah'>TAMBAH</button>";
                    }
                    ?> </div>
                <div class="col-sm-6">
                    <?php
                    include('../../config/koneksi.php');
                    $user_id = $_SESSION['user_id'];

                    if ($isEdit) {
                        // If it's an edit, check if 'foto_id' is set before using it
                        $foto_id = isset($_GET['foto_id']) ? $_GET['foto_id'] : null;

                        if (
                            $foto_id !== null
                        ) {
                            echo "<a href='foto.php?foto_id=$foto_id' class='btn btn-danger'>KELUAR</a>";
                        } else {
                            // Handle the case when 'foto_id' is not set
                            echo "Error: Missing 'foto_id'";
                        }
                    } else {
                        // If it's not an edit, link to album.php with the appropriate album_id
                        echo "<a href='album.php?album_id=" . (isset($_SESSION['current_album_id']) ? $_SESSION['current_album_id'] : '') . "' class='btn btn-danger'>KELUAR</a>";
                    }
                    ?>
                </div>

            </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>