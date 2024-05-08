<?php
 session_start();
 if(isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header ('login.php');
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tentang-style.css">
    <style>button {
    display: inline-block;
    padding: 10px 15px;
    margin-left: 20px;
    font-size: 15px;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

button:hover {
    background-color: black;
    transition: 0.5s;
}</style>
</head>

<body>

    <header>
        <h1>Selamat datang <?= $_SESSION["username"]?> di Profil Developer</h1>
    </header>
    <section class="profile-section">
        <img src="nirva.jpeg" alt="Foto Profil">
        <div class="profile-info">
            <h2>Nirvana Andriyanto</h2>
            <p> Usia : 16 Tahun
                <br>
                Tanggal Lahir : 2 Juli 2007
                <br>
                Alamat : Jasem Bulusidokare
                <br>
                Asal Sekolah : SMK Telkom Sidoarjo
                <br>
                Hobi : Rebahan
            </p>
        </div>
    </section>

    <form class="logout-btn"action="dashboard.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>

    
    <footer>
        <p>&copy; 2023 KedelaiMilk</p>
    </footer>

</body>

</html>