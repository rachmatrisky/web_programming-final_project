<?php
  define("DB_SERVER", "localhost");
  define("DB_USERNAME", "root");
  define("DB_PASSWORD", "");
  define("DB_NAME", "ecommerse");

  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if ($link === false) {
    die("Tidak bisa terkoneksi" . mysqli_connect_error());
  }
?>