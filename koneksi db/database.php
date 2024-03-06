<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "login";

$db = mysqli_connect($hostname, $username, $password, $database);

if($db->connect_error) {
    echo "Koneksi database gagal";
    die("error!");
}
?>