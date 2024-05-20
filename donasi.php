<?php
// Pastikan file koneksi.php sudah sesuai dengan konfigurasi MySQL Anda
require ('koneksi db/database.php');

if ( isset ($_POST["submit"])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $jumlah_donasi = $_POST['jumlah_donasi'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    $query = "INSERT INTO donatur (nama, email, telepon, alamat, jumlah_donasi, metode_pembayaran) VALUES ('$nama', '$email', '$telepon', '$alamat', '$jumlah_donasi', '$metode_pembayaran')";

    if (mysqli_query($db, $query)) {
        echo "Donasi berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Donasi</title>
</head>
<body>
    <h2>Form Donasi</h2>
    <form method="post" action="data-donasi.php">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telepon">Telepon:</label><br>
        <input type="text" id="telepon" name="telepon"><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat"></textarea><br><br>

        <label for="jumlah_donasi">Jumlah Donasi:</label><br>
        <input type="text" id="jumlah_donasi" name="jumlah_donasi" required><br><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label><br>
        <select id="metode_pembayaran" name="metode_pembayaran" required>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="Kartu Kredit">Kartu Kredit</option>
            <option value="E-Wallet">E-Wallet</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
        <button><a href="index.php">Back</a></button>
    </form>
</body>
</html>
