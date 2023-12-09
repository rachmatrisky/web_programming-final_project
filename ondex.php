<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ondex</title>
  <link rel="stylesheet" href="style/bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/fontawesome-free-6.5.1-web/css/all.min.css">
  <link rel="stylesheet" href="style/insert.css">
  <link rel="stylesheet" href="style/reset.css">
</head>

<body>
  <?php
    include_once("config.php");
    $produks = mysqli_query($link, "SELECT * FROM barang");

  ?>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a href="#" class="navbar-brand">TokoPaEdu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center gap-3 w-50">
            <li class="nav-item">
              <a href="#">Kategori</a>
            </li>
            <li class="nav-item w-100">
              <form class="d-flex border align-items-center py-1 px-2 gap-1 border-1 rounded-3 bg-dark" role="search">
                <span><i class="fa-solid fa-search fa-xl"></i></span>
                <input type="search" class="form-control border-0" placeholder="Search" aria-label="Search">
              </form>
            </li>
            <li class="nav-item">
              <a href="#"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
            </li>
          </ul>
          <div class="d-flex column-gap-3 row-gap-1">
            <a href="create.php" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i></a>
            <a href="#" class="btn btn-outline-primary">Login</a>
            <a href="#" class="btn btn-outline-warning">Sign Up</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="my-5">
    <div class="container">
      <div class="row row-gap-3">
        <?php
            while($produk = mysqli_fetch_assoc($produks)){
        ?>
        <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
                <div><img class="img-fluid" src="images/<?= $produk['gambar'];?>" style="width: 100px; height: 80px;"></div>
                <div class="description ms-3">
                  <h5 class="card-title"><?= $produk['nama_barang'];?></h5>
                  <p class="card-text"><?= "Rp. ".number_format($produk['harga']);?></p>
                </div>
              </div>
              <div class="mt-3">
                <a href="#" class="btn btn-primary me-2"><i class="fa-solid fa-cart-shopping fa-lg"></i> Pesan</a>
                <a href="#" class="btn btn-success me-2"><i class="fa-regular fa-eye fa-lg"></i></a>
                <a href="update.php?kode_barang=<?= $produk['kode_barang']?>" class="btn btn-warning me-2"><i class="fa-solid fa-pencil"></i></a>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
        ?>
      </div>
    </div>
  </main>
  <hr>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg">
          <h5>TokoPaEdu</h5>
          <ul class="list-inline">
            <li class="list-inline-item d-block"><a href="#">Tentang TokoPaEdu</a></li>
            <li class="list-inline-item d-block"><a href="#">Hak Kekayaan Intelektual</a></li>
            <li class="list-inline-item d-block"><a href="#">Karir</a></li>
            <li class="list-inline-item d-block"><a href="#">Blog</a></li>
            <li class="list-inline-item d-block"><a href="#">TokoPaEdu parents</a></li>
            <li class="list-inline-item d-block"><a href="#">Mitra Blog</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg">
          <h5>Beli</h5>
          <ul class="list-inline">
            <li class="list-inline-item d-block"><a href="#">Tagihan & Top Up</a></li>
            <li class="list-inline-item d-block"><a href="#">Tukar Tambah Handphone</a></li>
            <li class="list-inline-item d-block"><a href="#">TokoPaEdu COD</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg">
          <h5>Jual</h5>
          <ul class="list-inline">
            <li class="list-inline-item d-block"><a href="#">Pusat Edukasi Seller</a></li>
            <li class="list-inline-item d-block"><a href="#">Mitra Toppers</a></li>
            <li class="list-inline-item d-block"><a href="#">Daftar Offical Store</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg">
          <h5>Bantuan dan Panduan</h5>
          <ul class="list-inline">
            <li class="list-inline-item d-block"><a href="#">TokoPaEdu Care</a></li>
            <li class="list-inline-item d-block"><a href="#">Syarat dan Ketentuan</a></li>
            <li class="list-inline-item d-block"><a href="#">Kebijakan dan Privasi</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg">
          <h5>Ikuti Kami</h5>
          <ul class="list-inline social-media d-flex gap-3">
          <li><a href="#"><i class="fa-brands fa-facebook-square fa-xl"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-instagram fa-xl"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-tiktok fa-xl"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-x fa-xl"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-pinterest fa-xl"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <hr>
  <script src="style/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>