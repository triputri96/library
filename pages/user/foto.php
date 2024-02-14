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
                        <li class="nav-item">
                            <a class="nav-link text-color" aria-current="page" href="profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="main ">
        <div class="container">
            <table class="table">
                <tr>
                    <td rowspan="4" style="width: 500px;">
                        <?php
                        include('../../config/koneksi.php');

                        // Check if foto_id is set in the URL
                        if (isset($_GET['foto']) && !empty($_GET['foto'])) {
                            $foto_id = $_GET['foto'];
                            $user_id = $_SESSION['user_id'];

                            // Fetch the corresponding photo
                            $sql = mysqli_query($konek, "SELECT * FROM foto WHERE foto_id='$foto_id' AND user_id='$user_id'");

                            if ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <img src="../../dist/uploads/<?php echo $data['lokasi_file']; ?>" class="post-image">
                        <?php
                            }
                        } else {
                            echo "Error: Photo ID not provided.";
                        }

                        ?>
                        <!-- <img src="../../dist/uploads/jun.jpg" alt="" height="350" width="350"
                            class="object-fit-cover" /> -->
                    </td>
                    <?php
                    include('../../config/koneksi.php');

                    if (isset($_GET['foto'])) {
                        $foto_id = $_GET['foto'];
                        $user_id = $_SESSION['user_id'];

                        $sql = mysqli_query($konek, "SELECT * FROM foto WHERE foto_id='$foto_id' AND user_id='$user_id'");

                        if ($data = mysqli_fetch_array($sql)) {
                    ?>

                    <td>
                        <div>
                            <h3 class=""><?= $data['judul_foto'] ?></h3>
                            <!-- <p class="sub-text">followed bu user</p> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="" style="max-height: 300px; overflow: auto;">

                            <div class="profile-card">
                                <div>
                                    <p class="sub-text"><?= $data['deskripsi_foto'] ?></p>
                                    <p class="sub-text"><?= $data['tgl_unggah'] ?></p>
                                    <p class="sub-text"><?= $data['lokasi_file'] ?></p>
                                    <?php
                        }
                    }
                            ?>
                                    <p>Komentar</p>
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
                                    <div class="row d-flex">

                                        <div class="col-md-8" style="width: 500px;">
                                            <div class="card p-3 mt-2">

                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="user d-flex flex-row align-items-center">

                                                        <img src="<?php echo $data['picture'] ? '../../dist/profile/' . $data['picture'] : '../../dist/img/profile.png'; ?>"
                                                            width="40" height="40"
                                                            class="object-fit-cover rounded-circle">
                                                        <p class="username"
                                                            style="margin-bottom: 0; padding-left: 10px;">
                                                            <?= $data['username'] ?>
                                                        </p>
                                                        <br>
                                                    </div>

                                                    <small>
                                                        <a onclick="return confirm('Yakin menghapus data ini?')"
                                                            class="nav-link text-color"
                                                            href="../../app/service/komentar.php?hapuskomentar=<?php echo $data['komentar_id'] ?>">
                                                            <i class="fa-solid fa-trash icon"></i>
                                                        </a>

                                                    </small>

                                                </div>
                                                <p class="sub-text mt-2"><?= $data['isi_komentar'] ?></p>
                                                <div
                                                    class="action d-flex justify-content-between mt-2 align-items-center">
                                                    <div class="icons align-items-center">
                                                        <small><?= $data['tgl_komentar'] ?></small>
                                                        <!-- <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-check-circle-o check-icon"></i> -->

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="profile-card">
                                    <div class="profile-pic">
                                        <img src="../../dist/uploads/DK.jpg" alt="" width="40px" height="40px" class="object-fit-cover rounded">
                                    </div>
                                    <div>
                                        <p class=" username"><?= $data['username'] ?></p>

                                        <p class="sub-text"><?= $data['isi_komentar'] ?></p>
                                    </div>
                                </div> -->
                                    <?php
                                }
                            } else {
                                echo "Error: 'foto' is not set.";  // Change 'foto_id' to 'foto'
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="post-content">
                            <div class="reaction-wrapper">

                                <?php
                                include('../../config/koneksi.php');

                                // ... (previous code)

                                // Fetch the corresponding photo outside of the comments loop
                                $foto_id = isset($_GET['foto']) ? $_GET['foto'] : null;
                                $user_id = $_SESSION['user_id'];

                                $sql = mysqli_query($konek, "SELECT * FROM foto WHERE foto_id='$foto_id' AND user_id='$user_id'");

                                if ($data = mysqli_fetch_array($sql)) {
                                ?>

                                <a id="likeButton" href="../../app/service/likefoto.php?foto=<?= $data['foto_id'] ?>"
                                    class="link-dark" name="likefoto">
                                    <?php
                                        $likeSql = mysqli_query($konek, "SELECT * FROM foto WHERE user_id = '$user_id'");
                                        $userData = mysqli_fetch_array($likeSql);

                                        if ($userData) {
                                            $likeSql = mysqli_query($konek, "SELECT * FROM likefoto WHERE foto_id='$data[foto_id]' AND user_id='$user_id'");
                                            if (mysqli_num_rows($likeSql) == 1) {
                                                echo '<i class="fa-solid fa-heart icon"></i>';
                                            } else {
                                                echo '<i class="fa-regular fa-heart icon"></i>';
                                            }
                                        }
                                        ?>
                                </a>

                                <?php
                                } else {
                                    echo "Error: Photo ID not provided or photo not found.";
                                }
                                ?>


                                <a href="#komentar" class="link-dark" type="text" name="komentar">
                                    <i class=" fa-solid fa-comment icon"></i>
                                </a>
                                <a type="submit" name="editfoto" href="editfoto.php?edit=<?php echo $data['foto_id'] ?>"
                                    class="link-dark">
                                    <i class=" fa-solid fa-pen-to-square icon"></i>
                                </a>
                                <a onclick="return confirm('Yakin menghapus data ini?')" class="nav-link text-color"
                                    href="../../app/service/tmbhfoto.php?hapusfoto=<?php echo $data['foto_id'] ?>">
                                    <i class="fa-solid fa-trash icon"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <section id="komen">
                            <form action="../../app/service/komentar.php" method="post">

                                <div class="comment-wrapper">
                                    <img src="" class="icon" alt="">
                                    <input type="hidden" name="foto_id" value="<?php echo $foto_id; ?>">

                                    <input type="text" class="comment-box" placeholder="Add a comment"
                                        name="isi_komentar">
                                    <button type="submit" name="tmbhcomment" class="comment-btn"
                                        name="btn_komentar">post</button>
                                </div>
                            </form>
                        </section>
                    </td>
                </tr>
            </table>

        </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


</body>

</html>