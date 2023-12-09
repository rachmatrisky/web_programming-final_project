<?php
  // error_reporting(0);

  // $msg = "";

  // // if upload button is clicked
  // if (isset($_POST["upload"])) {
  //   $filename = $_FILES["uploadfile"]["name"];
  //   $tempname = $_FILES["uploadfile"]["tmp_name"];
  //   $folder = "./images/" . $filename;

  //   $db = mysqli_connect("localhost", "root", "", "ecommerse");

  //   $sql = "INSERT INTO images (filename) VALUES ('$filename')";

  //   mysqli_query($db, $sql);

  //   if (move_uploaded_file($tempname, $folder)) {
  //     echo "<h3>Image uploaded successfully</h3>";
  //   } else {
  //     echo "<h3>Failed to upload Image!</h3>";
  //   }
  // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>testing</title>
  <link rel="stylesheet" href="style/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <form action="process.php" method="post" enctype="multipart/form-data">
      <div class="p-2">
        <label for="uploadfile" class="form-label">Gambar</label>
        <input type="file" name="uploadfile" class="form-control" id="uploadfile" value="">
      </div>
      <div>
        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
      </div>
    </form>
  </div>
</body>

</html>