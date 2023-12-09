<?php
    require_once "config.php";

    $kode_barang = $_GET["kode_barang"];
    $barang = mysqli_query($link, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");

    while($data_barang = mysqli_fetch_array($barang)){
      $item_code = $data_barang["kode_barang"];
      $item_name = $data_barang["nama_barang"];
      $item_price = $data_barang["harga"];
      $item_stock = $data_barang["stok"];
      $item_img = $data_barang["gambar"];
      $item_desc = $data_barang["deskripsi"];
      $item_ctg = $data_barang["kategori"];
    }

    $item_code_err = $item_name_err = $item_price_err = $item_stock_err = $item_desc_err = $item_ctg_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validasi kode barang
    $input_item_code = trim($_POST["inputCode"]);

    if (empty($input_item_code)) {
      $item_code_err = "Tolong masukkan kode barang";
    } else {
      $item_code = $input_item_code;
    }

    // validasi nama barang
    $input_item_name = trim($_POST["inputItem"]);

    if (empty($input_item_name)) {
      $item_name_err = "Tolong masukkan nama barang";
    } else {
      $item_name = $input_item_name;
    }

    // validasi harga
    $input_item_price = trim($_POST["inputPrice"]);

    if (empty($input_item_price)) {
      $item_price_err = "Tolong masukkan harga barang";
    } else {
      $item_price = $input_item_price;
    }

    // validasi stok
    $input_item_stock = trim($_POST["inputStock"]);

    if (empty($input_item_stock)) {
      $item_stock_err = "Tolong masukkan stok barang";
    } else {
      $item_stock = $input_item_stock;
    }

    // validasi gambar
    // $input_item_img = $_FILES["inputImg"];
    
    // if (file_exists($input_item_img["tmp_name"])) {
    //   $item_img = $input_item_img["name"];
    //   $item_img_tmp = $input_item_img["tmp_name"];
    //   $folder = "./images/" . $item_img;
    // }

    // validasi deskripsi
    $input_item_desc = trim($_POST["inputDesc"]);

    if (empty($input_item_desc)) {
      $item_desc_err = "";
    } else {
      $item_desc = $input_item_desc;
    }

    // validasi kategori
    $input_item_ctg = trim($_POST["inputCategory"]);

    if (empty($input_item_ctg)) {
      $item_ctg_err = "Tolong masukkan kategori";
    } else {
      $item_ctg = $input_item_ctg;
    }

    if (empty($item_code_err) && empty($item_name_err) && empty($item_price_err) && empty($item_stock_err) && empty($item_desc_err) && empty($item_ctg_err)) {
      // $sql = "INSERT INTO barang (kode_barang, nama_barang, harga, stok, gambar, deskripsi, kategori) VALUES (?, ?, ?, ?, ?, ?, ?)";

      // if ($stmt = mysqli_prepare($link, $sql)) {
      //   mysqli_stmt_bind_param($stmt,"sssssss", $param_item_code, $param_item_name, $param_item_price, $param_item_stock, $param_item_img, $param_item_desc, $param_item_ctg);

      //   // parameter
      //   $param_item_code = $item_code;
      //   $param_item_name = $item_name;
      //   $param_item_price = $item_price;
      //   $param_item_stock = $item_stock;
      //   $param_item_img = $item_img;
      //   $param_item_desc = $item_desc;
      //   $param_item_ctg = $item_ctg;

      //   // mengeksekusi statement
      //   if (mysqli_stmt_execute($stmt)) {
      //     header("location: ondex.php");
      //     exit();
      //   } else {
      //     echo "<p>Oops! data bermasalah</p>";
      //   }
      // }
      // mysqli_stmt_close($stmt);
      // $barang2 = mysqli_query($link, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
      // $data_barang2 = mysqli_fetch_array($barang2);

      // if (file_exists($input_item_img["tmp_name"])) {
      //   $item_img = $input_item_img["name"];
      //   $item_img_tmp = $input_item_img["tmp_name"];
      //   $folder = "./images/" . $item_img;
      // }

      if($_FILES['inputImg']['name'] == ""){
        $kode_barang = $_GET["kode_barang"];
        $barang2 = mysqli_query($link, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
        $data_barang2 = mysqli_fetch_array($barang2);
        $item_img = $data_barang2['gambar'];
      } else {
        $kode_barang = $_GET["kode_barang"];
        $barang2 = mysqli_query($link, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
        $data_barang2 = mysqli_fetch_array($barang2);
        $item_img = $_FILES['inputImg']['name'];
        unlink("images/".$data_barang2['gambar']);
        move_uploaded_file($_FILES['inputImg']['tmp_name'], 'images/'.$_FILES['inputImg']['name']);
      }

      $sql = "UPDATE barang SET nama_barang='$item_name', harga='$item_price', stok='$item_stock', gambar='$item_img', deskripsi='$item_desc', kategori='$item_ctg' WHERE kode_barang='$item_code';";

      $result = mysqli_query($link, $sql);

      if ($result) {
        echo "new record created successfully". $item_img;
      } else {
        echo "error: " . $sql . " " . mysqli_error($link);
      }

      // if (move_uploaded_file($item_img_tmp, $folder)) {
      //   echo "berhasil upload image";
      // } else {
      //   echo "gagal upload image";
      // }
      // header("Location:ondex.php");
    }
    mysqli_close($link);
    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>insert data</title>
  <link rel="stylesheet" href="style/bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/fontawesome-free-6.5.1-web/css/all.min.css">
  <link rel="stylesheet" href="style/insert.css">
  <link rel="stylesheet" href="style/reset.css">
</head>

<body>
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
              <form class="d-flex border align-items-center py-1 px-2 gap-1 border-1 rounded-3 bg-light" role="search">
                <span><i class="fa-solid fa-search fa-xl"></i></span>
                <input type="search" class="form-control border-0" placeholder="Search" aria-label="Search">
              </form>
            </li>
            <li class="nav-item">
              <a href="#"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
            </li>
          </ul>
          <div class="d-flex column-gap-3 row-gap-1">
            <button class="btn btn-outline-primary" type="button">Login</button>
            <button class="btn btn-outline-warning" type="button">Sign Up</button>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="my-5">
    <h1 class="text-center my-3">Mengubah Data Barang</h1>
    <form action="update.php" method="post" class="form-container container d-flex flex-column justify-content-center gap-2 py-2 border rounded-3" enctype="multipart/form-data">
      <div class="p-2">
        <label for="inputCode" class="form-label">Kode Barang</label>
        <input type="text" name="inputCode" id="inputCode" class="form-control <?= (!empty($item_code_err)) ? "is-invalid" : ""; ?>" value="<?= $item_code; ?>">
        <div class="invalid-feedback">
          <?= $item_code_err ?>
        </div>
      </div>
      <div class="p-2">
        <label for="inputItem" class="form-label">Nama barang</label>
        <input type="text" name="inputItem" id="inputItem" class="form-control <?= (!empty($item_name_err)) ? "is-invalid" : ""; ?>" value="<?= $item_name; ?>">
        <div class="invalid-feedback">
          <?= $item_name_err ?>
        </div>
      </div>
      <div class="p-2">
        <label for="inputPrice" class="form-label">Harga</label>
        <input type="text" name="inputPrice" id="inputPrice" class="form-control <?= (!empty($item_price_err)) ? "is-invalid" : ""; ?>" value="<?= $item_price; ?>">
        <div class="invalid-feedback">
          <?= $item_price_err ?>
        </div>
      </div>
      <div class="p-2">
        <label for="inputStock" class="form-label">Stok</label>
        <input type="text" name="inputStock" id="inputStock" class="form-control <?= (!empty($item_stock_err)) ? "is-invalid" : ""; ?>" value="<?= $item_stock; ?>">
        <div class="invalid-feedback">
          <?= $item_stock_err ?>
        </div>
      </div>
      <div class="p-2">
        <label for="inputImg" class="form-label">Gambar</label> <br>
        <img src="images/<?= $item_img;?>" style="width: 100px; height: 80px;">
        <input type="file" name="inputImg" id="inputImg" class="form-control">
        <small>(Biarkan kosong jika tidak diganti)</small>
      </div>
      <div class="p-2">
        <label for="inputDesc" class="form-label">Deskripsi</label>
        <input type="text" name="inputDesc" id="inputDesc" class="form-control <?= (!empty($item_desc_err)) ? "is-invalid" : ""; ?>" value="<?= $item_desc ?>">
        <div class="invalid-feedback">
          <?= $item_desc_err ?>
        </div>
      </div>
      <div class="p-2">
        <label for="inputCategory" class="form-label">Kategori</label>
        <select name="inputCategory" id="inputCategory" class="form-select <?= (!empty($item_ctg_err)) ? "is-invalid" : ""; ?>" aria-label="Default select example">
          <option selected><?= $item_ctg?></option>
          <option value="laptop">Laptop</option>
          <option value="tablet">Tablet</option>
          <option value="smartphone">Smartphone</option>
        </select>
        <div class="invalid-feedback">
          <?= $item_ctg_err ?>
        </div>
      </div>
      <div>
        <button type="submit" name="submit" class="btn btn-primary me-3">Submit</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
      </div>
    </form>
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