<!DOCTYPE html>
<html>
<head>
    <title>Proses Donasi</title>
</head>
<body>
    <h2>Ringkasan Donasi</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $jumlah_donasi = $_POST['jumlah_donasi'];
        $metode_pembayaran = $_POST['metode_pembayaran'];

        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Telepon:</strong> $telepon</p>";
        echo "<p><strong>Alamat:</strong> $alamat</p>";
        echo "<p><strong>Jumlah Donasi:</strong> $jumlah_donasi</p>";
        echo "<p><strong>Metode Pembayaran:</strong> $metode_pembayaran</p>";

        // Simpan data donasi ke database jika diperlukan
    } else {
        echo "<p>Permintaan tidak valid.</p>";
    }
    ?>
    <button><a href="form-pembayaran.php">Lanjut pembayaran</a></button>
</body>
</html>
