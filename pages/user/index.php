</html>
<!DOCTYPE html>
<?php
include('../../config/koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}
?>
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
                            <a class="nav-link text-color" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-color" href="../auth/logout.php">Log Out</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="#search-results">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="cari">
                        <input class="btn btn-outline-light" type="submit" name="search_results">
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <section id="home" class="h-100">
        <h1 class="text-color mb-4 margin-top">Selamat Datang <b><?= $_SESSION['nama'] ?></b></h1>
        <!-- <div class="justify-content-center align-items-center"> -->
        <div>
            <div class="row">
                <div class="mb-3 col col-md-3 img-hover" id="album">
                    <div class="text-center position-relative btn-tambah">
                        <a href="tambahalbum.php">
                            <!-- <input type="button" name="tmbAlbum" class="btn-tambah"> -->
                            <i class="fa-solid fa-plus"
                                style="font-size: 250px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                        </a>

                    </div>

                </div>
                <?php
                if (isset($_GET['search_results'])) {
                    $cari = $_GET['cari'];
                    $query = "SELECT *from album where nama_album like '%$cari%'";
                } else {
                    $user_id = $_SESSION['user_id'];
                    $sql = mysqli_query($konek, "SELECT *from  album where user_id='$user_id'");
                }
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                <div class="mb-3 col col-md-3 img-hover" id="album">
                    <div class="text-center">
                        <a href="album.php?album_id=<?= $data['album_id'] ?>">
                            <!-- <div class="object-fit-cover rounded"
                                style="height:250px; width=250px; background-image: url('../../dist/uploads/<?php echo $data['foto']; ?>')">
                            </div> -->
                            <img src="../../dist/uploads/<?php echo $data['foto']; ?>" height="250" width="250"
                                class="object-fit-cover rounded"
                                style="background-image: url('../../dist/uploads/<?php echo $data['foto']; ?>">
                        </a>
                        <h5 class="d-block text-color">
                            <?php echo $data['nama_album']; ?>
                        </h5>

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
</body>

</html>