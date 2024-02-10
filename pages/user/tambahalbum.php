<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-color">
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
            <?php
            // Initialize variables
            $album_id = isset($_GET['edit']) ? $_GET['edit'] : '';
            $nama_album = '';
            $deskripsi = '';

            // Fetch data from the database based on $album_id
            if (!empty($album_id)) {
                include('../../config/koneksi.php');
                $sql = mysqli_query($konek, "SELECT * FROM album WHERE album_id='$album_id'");
                $data = mysqli_fetch_array($sql);

                // Update variables with fetched values
                $nama_album = isset($data['nama_album']) ? $data['nama_album'] : '';
                $deskripsi = isset($data['deskripsi']) ? $data['deskripsi'] : '';
            }
            ?>

            <input type="text" class="form-control" id="album_id" name="album_id"
                value="<?php echo isset($_GET['edit']) ? $album_id : ''; ?>" hidden>

            <div class="mb-3 row mt-5">
                <label for="nama_album" class="col-sm-2 col-form-label">Nama Album</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_album" name="nama_album"
                        value="<?php echo $nama_album; ?>">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        value="<?php echo $deskripsi; ?>">
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-sm-2">
                    <?php
                    if (isset($_GET['edit']) && isset($data['album_id'])) {
                        echo "<button type='submit' class='btn btn-success' name='btntambah_album' value='edit'>SIMPAN</button>";
                    } else {
                        echo "<button type='submit' class='btn btn-success' name='btntambah_album' value='tambah'>TAMBAH</button>";
                    }
                    ?>
                </div>

                <!-- <button type='submit' class='btn btn-success' name='btntambah_album' value='tambah'>TAMBAH</button> -->
                <div class="col-sm-6">
                    <?php
                    session_start();
                    include('../../config/koneksi.php');
                    $user_id = $_SESSION['user_id'];
                    ?>
                    <a href="index.php" class="btn btn-danger">KELUAR</a>
                </div>
            </div>
    </div>
    </form>
    <!-- <script>
        document.getElementById('keluarButton').addEventListener('click', function() {
            var url = this.href;
            var album_id = getParameterByName('album_id', url);
            alert('Album ID: ' + album_id);
        });

        function getParameterByName(name, url) {
            name = name.replace(/[[]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>