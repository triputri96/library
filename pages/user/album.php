</html>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../dist/css/style.css">
</head>

<body class="bg-secondary" onresize="checkMediaQuery()">
    <header>
        <nav class="navbar navbar-expand-lg bg-secondary nav-padding position-fixed w-100">
            <div class="container-fluid">
                <a class="navbar-brand text-color logo-cursor" href="#">putriGalery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ">
                        <li class="nav-item">
                            <a class="nav-link text-color" aria-current="page" href="index.php">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-color" href="../auth/logout.php">Hapus</a>
                        </li> -->
                    </ul>
                    <div class="d-flex">
                        <button type="button" onclick="toggleSidebar(true)" class="btn-transparent">
                            <i class="fa-solid fa-circle-info" style="color: #fff;"></i>
                        </button>
                    </div>

                </div>
            </div>
            <aside id="sidebar" class="wrapper position-absolute top-0 end-0 vh-100">
                <div class="h-100">
                    <div class="p-5 bg-white">
                        <button onclick="toggleSidebar(false)" class="btn-close"></button>
                        <!-- Sidebar -->
                        <!-- <div> -->
                        <?php
                        include('../../config/koneksi.php');
                        session_start();
                        $user_id = $_SESSION['user_id'];
                        $album_id = $_GET['album_id'];
                        $sql = mysqli_query($konek, "SELECT *from album where user_id='$user_id' and album_id='$album_id'");

                        while ($data = mysqli_fetch_array($sql)) {
                            $_SESSION['current_album_id'] = $data['album_id'];
                        ?>
                        <div class="sidebar-header p-3">
                            <h3>
                                <?= $data['nama_album'] ?>
                            </h3>

                            <p><?= $data['deskripsi'] ?></p>
                            <p><?= $data['tgl_dibuat'] ?></p>
                            <ul class="navbar-nav me-auto ">
                                <li class="nav-item">
                                    <a class="nav-link text-color" aria-current="page"
                                        href="tambahalbum.php?edit=<?php echo $data['album_id'] ?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-color"
                                        href="../../app/service/tambah_album.php?hapus=<?php echo $data['album_id'] ?>"><i
                                            class="fa-solid fa-trash"></i></a>
                                </li>
                            </ul>

                        </div>
                        <?php

                        }
                        ?>
            </aside>
        </nav>
    </header>
    <section id="home" class="h-100">
        <?php
        include('../../config/koneksi.php');
        session_start();
        $user_id = $_SESSION['user_id'];
        $album_id = $_GET['album_id'];
        $sql = mysqli_query($konek, "SELECT *from album where user_id='$user_id' and album_id='$album_id'");

        while ($data = mysqli_fetch_array($sql)) {
        ?>
        <h1 class="text-color mb-4 mt-5"> <b><?= $data['nama_album'] ?></b></h1>
        <div>
            <div class="row">
                <div class="mb-3 col col-md-3 img-hover" id="album">
                    <div class="text-center position-relative btn-tambah">
                        <a href="tmbhfoto.php?album_id=<?php echo $data['album_id'] ?>">
                            <!-- <input type="button" name="tmbAlbum" class="btn-tambah"> -->
                            <i class="fa-solid fa-plus icon-tambah"></i>
                        </a>

                    </div>

                </div>
                <?php
            }
                ?>
                <!-- <div class="justify-content-center align-items-center"> -->
                <?php
                include('../../config/koneksi.php');
                $user_id = $_SESSION['user_id'];

                $album_id = $_GET['album_id'];

                $sql = mysqli_query($konek, "SELECT * FROM foto, album WHERE foto.user_id='$user_id' AND foto.album_id=album.album_id AND album.album_id='$album_id'"); // Perbarui query

                while ($data = mysqli_fetch_array($sql)) {
                ?>

                <div class="mb-3 col col-md-3 img-hover" id="album">
                    <div class="text-center">
                        <a href="foto.php?foto=<?php echo $data['foto_id'] ?>">
                            <img src="../../dist/uploads/<?php echo $data['lokasi_file']; ?>" height="250" width="250"
                                class="object-fit-cover rounded"
                                style="background-image: url('../../dist/uploads/<?php echo $data['lokasi_file']; ?>')">
                        </a>
                        <h5 class="d-block text-color"><?php echo $data['judul_foto'] ?></h5>
                    </div>
                </div>

                <?php
                }
                ?>

            </div>
        </div>
        <!-- </div> -->

    </section>


    <!-- <footer>
        <div class="text-center">
            <a href="">aaaaaa</a>
        </div>
    </footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
    function toggleSidebar(val) {
        const sidebar = document.getElementById('sidebar')
        if (val) {
            sidebar.style.width = '30%';
            console.log(val, 'ssss');
        } else {
            sidebar.style.width = '0px';
        }

    }
    </script>
</body>

</html>