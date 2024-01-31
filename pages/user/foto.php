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
                    <div class="info">
                        <div class="user">
                            <!-- <div class="profile-pic"><img src="../../dist/uploads/maung.jpg" alt=""></div> -->
                            <p class="username">Nama album</p>
                        </div>
                        <!-- <img src="img/option.PNG" class="options" alt=""> -->
                    </div>
                    <img src="../../dist/uploads/maung.jpg" class="post-image" alt="">
                    <div class="post-content">
                        <div class="reaction-wrapper">
                            <a href="" class="link-dark">
                                <i class=" fa-solid fa-heart icon"></i>
                            </a>
                            <a href="" class="link-dark">
                                <i class=" fa-solid fa-comment icon"></i>
                            </a>
                            <a type="submit" name="editfoto" href="../../app/service/tmbhfoto.php" class="link-dark">
                                <i class=" fa-solid fa-pen-to-square icon"></i>
                            </a>
                            <a type="submit" name="hapusfoto" href="../../app/service/tmbhfoto.php" class="link-dark">
                                <i class="fa-solid fa-trash icon"></i> </a>

                        </div>
                    </div>
                    <div class="right-col">

                        <div class="profile-card">

                            <div>
                                <h3 class="">Judul Foto</h3>
                                <!-- <p class="sub-text">followed bu user</p> -->
                            </div>
                        </div>
                        <div class="profile-card">

                            <div>
                                <p class="username">Deskripsi Foto</p>
                            </div>
                        </div>
                        <div class="profile-card">

                            <div>
                                <p class="username">Tanggal Unggah</p>
                            </div>
                        </div>
                        <div class="profile-card">
                            <div>
                                <p class="username">Lokasi file</p>
                            </div>
                        </div>

                    </div>
                    <div class="comment-wrapper">
                        <img src="img/smile.PNG" class="icon" alt="">
                        <input type="text" class="comment-box" placeholder="Add a comment">
                        <button type="submit" name="tmbhcomment" class="comment-btn">post</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>