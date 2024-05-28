<?php
require ('koneksi db/database.php');

$query = "SELECT donatur.*, users.username 
          FROM donatur 
          JOIN users ON donatur.user_id = users.id";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Nama: " . $row["nama"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Telepon: " . $row["telepon"] . "<br>";
        echo "Alamat: " . $row["alamat"] . "<br>";
        echo "Jumlah Donasi: " . $row["jumlah_donasi"] . "<br>";
        echo "Metode Pembayaran: " . $row["metode_pembayaran"] . "<br>";
        echo "Username: " . $row["username"] . "<br><br>";
    }
} else {
    echo "Tidak ada data donasi.";
}

mysqli_close($db);
?>
