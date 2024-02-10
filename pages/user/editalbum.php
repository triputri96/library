<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <figure class="text-center mt-5">
            <blockquote class="blockquote">
                <p>Edit Album</p>
            </blockquote>
        </figure>

        <form action="../../app/service/tambah_album.php" method="post">
            <?php
            include('../../config/koneksi.php');

            // Check if album_id is set in $_GET
            $album_id = isset($_GET['album_id']) ? $_GET['album_id'] : null;

            if ($album_id !== null) {
                $sql = mysqli_query($konek, "SELECT * FROM album WHERE album_id='$album_id'");
                while ($data = mysqli_fetch_array($sql)) {
            ?>
            <div class="mb-3 row mt-5">
                <label for="nama_album" class="col-sm-2 col-form-label">Nama Album</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_album" name="nama_album" value="">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        value="<?= $data['deskripsi'] ?>">
                </div>
            </div>
            <!-- Add a hidden input field to store the album_id for editing -->
            <input type="hidden" name="album_id" value="<?= $data['album_id'] ?>">
            <?php
                }
            }
            ?>
            <div class="row mt-5">
                <div class="col-sm-2">
                    <!-- Adjust the button name to match your condition in the PHP code -->
                    <button type="submit" class="btn btn-success" name="btnsubmit" value="edit">Simpan
                        Perubahan</button>
                </div>
                <div class="col-sm-6">
                    <?php
                    session_start();
                    include('../../config/koneksi.php');
                    $user_id = $_SESSION['user_id'];
                    ?>
                    <a href="album.php?album_id=<?= isset($_SESSION['current_album_id']) ? $_SESSION['current_album_id'] : '' ?>"
                        class="btn btn-danger">KELUAR</a>
                </div>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>