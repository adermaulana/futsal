<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "database_futsal";

    $koneksi = mysqli_connect($server,$user,$pass,$database) or die(mysqli_error($koneksi));
?>