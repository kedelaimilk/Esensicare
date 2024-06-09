<?php
session_start(); // Mulai sesi di awal file
require ('koneksi db/database.php');

$total_donasi = 0; // Inisialisasi total donasi
$user_nama = ''; // Inisialisasi nama pengguna

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Kueri untuk menghitung total donasi oleh user_id
    $totalQuery = "SELECT SUM(jumlah_donasi) AS total_donasi FROM donatur WHERE user_id = '$user_id'";
    $result = mysqli_query($db, $totalQuery);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total_donasi = $row['total_donasi'];
    }

    // Dapatkan nama pengguna dari sesi atau database
    if (isset($_SESSION['user_nama'])) {
        $user_nama = $_SESSION['user_nama'];
    } else {
        $namaQuery = "SELECT nama FROM donatur WHERE user_id = '$user_id' LIMIT 1";
        $result = mysqli_query($db, $namaQuery);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_nama = $row['nama'];
            $_SESSION['user_nama'] = $user_nama; // Simpan nama pengguna ke dalam sesi
        }
    }
}

if (isset($_POST["submit"])) {
    if (!isset($_SESSION['user_id'])) {
        die("User ID tidak ditemukan di sesi.");
    }

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $jumlah_donasi = $_POST['jumlah_donasi'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $jenis_bantuan = $_POST['jenis_bantuan']; // Ambil jenis bantuan dari form
    $user_id = $_SESSION['user_id']; // Ambil user_id dari sesi

    $query = "INSERT INTO donatur (nama, email, telepon, alamat, jumlah_donasi, jenis_bantuan, metode_pembayaran, user_id) VALUES ('$nama', '$email', '$telepon', '$alamat', '$jumlah_donasi', '$jenis_bantuan', '$metode_pembayaran', '$user_id')";

    if (mysqli_query($db, $query)) {
        // Simpan nama pengguna ke dalam sesi
        $_SESSION['user_nama'] = $nama;
        
        // Perbarui total donasi setelah donasi baru ditambahkan
        $totalQuery = "SELECT SUM(jumlah_donasi) AS total_donasi FROM donatur WHERE user_id = '$user_id'";
        $result = mysqli_query($db, $totalQuery);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_donasi = $row['total_donasi'];
        }
        
        // Redirect ke halaman yang sama untuk menghindari pengulangan pengiriman form
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
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
            text-decoration: none;
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
            color: #4CAF50;
            text-decoration: none;
            display: inline-block;
        }

        .back-button:hover a {
            color: #3e8e41;
        }

        .total-donasi {
            margin: 20px auto;
            max-width: 500px;
            background-color: #3b3b3b;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="total-donasi">
        <h2>Total Donasi <?php echo htmlspecialchars($user_nama); ?></h2>
        <p>Rp <?php echo number_format($total_donasi, 2, ',', '.'); ?></p>
    </div>

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
        
        <label for="jenis_bantuan">Jenis Donasi:</label><br>
        <select id="jenis_bantuan" name="jenis_bantuan" required>
        <option value="bencana alam">Bantuan Bencana Alam</option>
        <option value="lembaga pendidikan">Bantuan Lembaga Pendidikan</option>
        <option value="fakir miskin">Bantuan Fakir Miskin</option>
        <option value="pembangunan masjid">Bantuan Pembangunan Masjid</option>
        <option value="panti asuhan">Bantuan Panti Asuhan</option>
        <option value="pembangunan rumah sakit">Bantuan Pembangunan Rumah Sakit</option>
        </select><br><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label><br>
        <select id="metode_pembayaran" name="metode_pembayaran" required>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="Kartu Kredit">Kartu Kredit</option>
            <option value="E-Wallet">E-Wallet</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
        <button class="back-button"><a href="index.php">Back</a></button>
    </form>
</body>
</html>
