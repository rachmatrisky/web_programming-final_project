<?php
    $conn = mysqli_connect("localhost", "root", "", "ecommerse");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // if (isset($_FILES["uploadfile"]) && $_FILES["uploadfile"]["error"] == 0) {
    //     $u
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show images</title>
    <link rel="stylesheet" href="style/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container d flex">
    <?php 
        $query = "SELECT * FROM images";
        $result = mysqli_query($conn, $query);

        while ($data = mysqli_fetch_assoc($result)) {
    ?>
        <img src="<?= $data["filename"] ?>" alt="" class="img-fluid">
    <?php
        }
    ?>
    </div>
</body>
</html>