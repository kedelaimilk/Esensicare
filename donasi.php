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
        echo "Terimakasih telah berdonasi";
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
    <style>
        body {
  background-color: #2b2b2b;
  color: #e0e0e0;
  font-family: Arial, sans-serif;
}

form {
  background-color: #3b3b3b;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
  max-width: 500px;
  margin: 50px auto;
}

label {
  display: block;
  margin-bottom: 10px;
  font-size: 14px;
  font-weight: bold;
}

input[type="text"], input[type="email"], textarea, select {
  width: 473px;
  padding: 12px;
  border: 1px solid #4b4b4b;
  border-radius: 5px;
  font-size: 14px;
  font-weight: normal;
  color: black;
  margin-bottom: 20px;
}

select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-repeat: no-repeat;
  background-position: right 10px center;
  padding-right: 35px;
}

textarea {
  resize: vertical;
}

button {
  background-color: #4CAF50;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #3e8e41;
}

button:focus {
  outline: none;
  box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
}

button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

.back-button {
  background-color: transparent;
  color: #4CAF50;
  border: none;
  padding: 0;
  font-size: 14px;
  font-weight: bold;
  margin-top: 20px;
  display: inline-block;
  transition: color 0.3s ease;
}

.back-button:hover {
  color: #3e8e41;
}

.back-button a {
  text-decoration: none;
  color: inherit;
}
    </style>
</head>
<body>
    <h2>Form Donasi</h2>
    <form method="post" action="">
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
