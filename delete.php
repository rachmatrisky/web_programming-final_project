<?php
    include_once("config.php");

    $id = $_GET['id'];
    $delete = mysqli_query($mysqli, "DELETE FROM barang WHERE id='$id'");

    header("Location:ondex.php");
?>