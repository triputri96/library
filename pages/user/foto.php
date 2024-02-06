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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="bg-secondary">


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
                    <div class="post-content">
                        <div class="reaction-wrapper">
                            <?php
                                    $likeSql = mysqli_query($konek, "SELECT * FROM foto, user WHERE foto.user_id=user.user_id");
                                    while ($likeData = mysqli_fetch_array($likeSql)) {
                                    ?>
                            <a type="submit" href="../../app/service/likefoto.php?foto_id=<?= $likeData['foto_id'] ?>"
                                class="link-dark">
                                <i class="fa-regular fa-heart icon"></i>
                            </a>
                            <?php
                                    }
                                    ?>
                            <a href="" class="link-dark">
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
                        <p class="likes">1,012 likes</p>
                    </div>
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

                    </div>
                    <div class="comment-wrapper">
                        <img src="img/smile.PNG" class="icon" alt="">
                        <input type="text" class="comment-box" placeholder="Add a comment">
                        <button type="submit" name="tmbhcomment" class="comment-btn">post</button>
                    </div>

                </div> <?php
                        } else {
                            // Handle jika data tidak ditemukan
                            echo "Foto tidak ditemukan.";
                        }
                    } else {
                        // Handle jika 'foto' tidak tersedia di URL
                        echo "Parameter 'foto' tidak tersedia.";
                    }
                        ?>

            </div>

        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>