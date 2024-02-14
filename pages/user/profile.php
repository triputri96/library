<!DOCTYPE html>
<html lang="en">
<?php
include('../../config/koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../auth/login.php');
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../dist/css/profile.css">
    <link rel="stylesheet" href="../../dist/css/style.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-expand-lg bg-secondary nav-padding fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand text-color logo-cursor" href="#">putriGalery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-color" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-color" href="../auth/logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container" style="margin-top: 100px; background-color:#fff; border-radius: 5px;">
        <?php
        include('../../config/koneksi.php');
        $user_id = $_SESSION['user_id'];
        $sql = mysqli_query($konek, "SELECT *from user where user_id='$user_id'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <div class="row p-3">
                <div class="col-lg-4 pb-5">
                    <!-- Account Sidebar-->
                    <div class="author-card pb-3">
                        <div class="author-card-cover" style="background-image: url(../../dist/img/jepang.jpg);">

                        </div>
                        <div class="author-card-profile">
                            <div class="author-card-avatar">
                                <img src="<?php echo $data['picture'] ? '../../dist/profile/' . $data['picture'] : '../../dist/img/profile.png'; ?>" alt="profile" class="object-fit-cover rounded">
                            </div>
                            <div class="author-card-details">
                                <h5 class="author-card-name text-lg"><?= $data['username'] ?></h5><span class="author-card-position"><?= $data['nama'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="wizard">
                        <nav class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                        <div class="d-inline-block font-weight-medium text-lowercase mt-3 mb-3 fs-6">
                                            <?= $data['email'] ?>
                                        </div>
                                    </div><span class="badge badge-secondary">6</span>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                        <div class="d-inline-block font-weight-medium text-capitalize mt-3 mb-3 fs-6">
                                            <?= $data['alamat'] ?>
                                        </div>
                                    </div><span class="badge badge-secondary">6</span>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- Profile Settings-->
                <div class="col-lg-8 pb-5">
                    <form class="row mt-3" method="post" action="../../app/service/auhtService.php" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                        <div class=" col-md-6 pb-3">
                            <div class="form-group">
                                <label for="account-fn">Username</label>
                                <input class="form-control" type="text" id="username" name="username" value="<?= $data['username'] ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-6 pb-3">
                            <div class="form-group">
                                <label for="account-ln">Nama Lengkap</label>
                                <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-6 pb-3">
                            <div class="form-group">
                                <label for="account-email">E-mail Address</label>
                                <input class="form-control" type="email" id="email" name="email" value="<?= $data['email'] ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-phone">Alamat</label>
                                <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-12 pb-3">
                            <div class="form-group">
                                <label for="account-pass">Profile Picture</label>
                                <input class="form-control" type="file" id="picture" name="picture" value="<?= $data['picture'] ?>">
                            </div>
                        </div>

                    <?php
                }
                    ?>
                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <!-- <div class="custom-control custom-checkbox d-block">
                                <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                                <label class="custom-control-label" for="subscribe_me">Subscribe me to
                                    Newsletter</label>
                            </div> -->
                            <button class="btn btn-style-1 btn-primary" name="btnupdate" type="submit">Update
                                Profile</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
</body>

</html>