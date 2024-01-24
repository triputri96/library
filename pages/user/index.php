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

<body onresize="checkMediaQuery()">
  <header>
    <nav class="navbar navbar-expand-lg bg-secondary nav-padding">
      <div class="container-fluid">
        <a class="navbar-brand text-color logo-cursor" href="#">putriGalery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-color" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-color" href="../auth/logout.php">Log Out</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <section id="home" class="vw-250 bg-secondary">
    <fieldset>
      <h1 class="text-color text-position">Lorem ipsum dolor sit amet</h1>
      <div class="d-flex justify-content-center align-items-center">
        <div>
          <div class="row">
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center">
                <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded">
                <span class="d-block">Shal E</span>

              </div>
            </div>
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center">
                <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded">
                <span class="d-block">Shal E</span>

              </div>
            </div>
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center">
                <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded">
                <span class="d-block">Shal E</span>

              </div>
            </div>
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center">
                <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded">
                <span class="d-block">Shal E</span>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center">
                <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded">
                <span class="d-block">Shal E</span>

              </div>
            </div>
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center">
                <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded">
                <span class="d-block">Shal E</span>

              </div>
            </div>
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center">
                <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded ">
                <span class="d-block">Shal E</span>

              </div>
            </div>
            <div class="mb-3 col col-md-3 img-hover" id="album">
              <div class="text-center position-relative">
                <input type="button" name="tmbAlbum" class="btn-tambah">
                <i class="fa-solid fa-plus" style="font-size: 250px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                <!-- <img src="../../dist/img/shal-e.jpg" height="250" width="250" class="object-fit-cover rounded"> -->

              </div>

            </div>
          </div>
        </div>
      </div>
    </fieldset>
  </section>
  <footer>
    <div class="text-center">
      <a href="">aaaaaa</a>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>