<?php
include('../../config/koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../../dist/css/foto.css">
    <link rel="stylesheet" href="../../dist/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="bg-secondary">

    <header>
        <nav class="navbar navbar-expand-lg bg-secondary nav-padding fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand text-color logo-cursor" href="#">putriGalery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-color" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            include('../../config/koneksi.php');
                            $user_id = $_SESSION['user_id'];
                            ?>
                            <a class="nav-link text-color"
                                href="album.php?album_id=<?= isset($_SESSION['current_album_id']) ? $_SESSION['current_album_id'] : '' ?>">Album</a>
                        </li>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="main">
        <div class="wrapper">
            <div class="left-col">

                <!-- <div class="card" style="width: 18rem;">
                    <img src="../../dist/uploads/maung.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div> -->
                <div class="post">
                    <?php
                    include('../../config/koneksi.php');

                    if (isset($_GET['foto'])) {
                        $foto_id = $_GET['foto'];
                        $user_id = $_SESSION['user_id'];

                        $sql = mysqli_query($konek, "SELECT * FROM foto WHERE foto_id='$foto_id' AND user_id='$user_id'");

                        if ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <img src="../../dist/uploads/<?php echo $data['lokasi_file']; ?>" class="post-image">
                    <?php
                        }
                    }
                    ?>
                    <div class="post-content">
                        <div class="reaction-wrapper">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                $user_id = $_SESSION['user_id'];

                                $likeSql = mysqli_query($konek, "SELECT * FROM foto WHERE user_id = '$user_id'");
                                $userData = mysqli_fetch_array($likeSql);

                                if ($userData) {
                            ?>
                            <a type="submit" href="../../app/service/likefoto.php?foto=<?= $data['foto_id'] ?>"
                                class="link-dark">
                                <i class="fa-regular fa-heart icon"></i>
                            </a>

                            <?php
                                } else {
                                    // Handle jika user_id tidak ditemukan
                                    echo "Data user tidak ditemukan.";
                                }
                            }
                            ?>


                            <a href="" class="link-dark" type="text" name="komentar">
                                <i class=" fa-solid fa-comment icon"></i>
                            </a>
                            <a type="submit" name="editfoto" href="tmbhfoto.php" class="link-dark">
                                <i class=" fa-solid fa-pen-to-square icon"></i>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini?')" class="nav-link text-color"
                                href="../../app/service/tmbhfoto.php?hapusfoto=<?php echo $data['foto_id'] ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                    include('../../config/koneksi.php');

                    if (isset($_GET['foto'])) {
                        $foto_id = $_GET['foto'];
                        $user_id = $_SESSION['user_id'];

                        $sql = mysqli_query($konek, "SELECT * FROM foto WHERE foto_id='$foto_id' AND user_id='$user_id'");

                        if ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <div class="right-col">

                        <div class="profile-card">

                            <div>
                                <h3 class=""><?= $data['judul_foto'] ?></h3>
                                <!-- <p class="sub-text">followed bu user</p> -->
                            </div>
                        </div>
                        <div class="profile-card">

                            <div>
                                <p class="username"><?= $data['deskripsi_foto'] ?></p>
                            </div>
                        </div>
                        <div class="profile-card">

                            <div>
                                <p class="username"><?= $data['tgl_unggah'] ?></p>
                            </div>
                        </div>
                        <div class="profile-card">
                            <div>
                                <p class="username"><?= $data['lokasi_file'] ?></p>
                            </div>
                        </div>
                        <?php
                        }
                    }
                        ?>
                        <?php
                        include('../../config/koneksi.php');
                        $user_id = $_SESSION['user_id'];

                        if (isset($_GET['foto'])) {
                            $foto_id = $_GET['foto'];

                            $sqlkomentar = mysqli_query($konek, "SELECT * FROM komentar 
                     INNER JOIN user ON komentar.user_id = user.user_id 
                     WHERE komentar.foto_id = '$foto_id'");
                            while ($data = mysqli_fetch_array($sqlkomentar)) {
                        ?>
                        <div class="profile-card">
                            <div>
                                <p class="username"><?= $data['isi_komentar'] ?></p>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            echo "Error: 'foto' is not set.";  // Change 'foto_id' to 'foto'
                        }
                        ?>



                    </div>
                    <form action="../../app/service/komentar.php" method="post">

                        <div class="comment-wrapper">
                            <img src="" class="icon" alt="">
                            <input type="hidden" name="foto_id" value="<?php echo $foto_id; ?>">

                            <input type="text" class="comment-box" placeholder="Add a comment" name="isi_komentar">
                            <button type="submit" name="tmbhcomment" class="comment-btn"
                                name="btn_komentar">post</button>
                        </div>
                    </form>

                </div>


            </div>

        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>