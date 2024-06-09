<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esensicare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="index-style.css">
    <style>
    :root {
    --primary: #b6895b;
    --bg: #010101;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
}

html {
    scroll-behavior: smooth;
}

body {
    background-color: var(--primary);
    font-family: 'Poppins', sans-serif;
    color: #fff;
    animation: fadeInAnimation ease 2s;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
}

@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

/* NAVBAR */

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.4rem 7%;
    background-color: rgba(1, 1, 1, 0.8);
    border-bottom: 1px solid #84582d;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;

}

.navbar .navbar-logo {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    font-style: italic;

}

.navbar .navbar-logo span {
    color: var(--primary);
}

.navbar .navbar-nav a {
    color: #fff;
    display: inline-block;
    font-size: 1.3rem;
    margin: 0 1rem;
}

.navbar .navbar-nav a:hover {
    color: var(--primary);
}

.navbar .navbar-nav a::after {
    content: '';
    display: block;
    padding: bottom 0.5rem;
    border-bottom: 0.1rem solid var(--primary);
    transform: scaleX(0);
    transition: 0.2s linear;
}

.navbar .navbar-nav a:hover::after {
    transform: scaleX(0.5);
}

.navbar .navbar-extra a {
    color: #fff;
    margin: 0 0.5rem;
}

.navbar .navbar-extra a::hover {
    color: var(--primary)
}

#hamburger-menu {
    display: none;

}
    
.campaigns {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
    margin-top: 80px;
}

.campaign {
    flex: 0 0 calc(33.33% - 40px);
    margin: 20px;
    padding: 20px;
    border: 1px solid #fff;
    border-radius: 5px;
    background-color: rgba(20, 20, 20, 0.8); /* Sesuaikan dengan warna yang diinginkan */
    text-align: center;
}

.campaign h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.campaign p {
    font-size: 1em;
    margin-bottom: 20px;
}

.btn-donasi {
    background-color: var(--primary); /* Sesuaikan dengan warna yang diinginkan */
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.btn-donasi:hover {
    background-color: #84582d; /* Sesuaikan dengan warna yang diinginkan */
    color: #fff;
}


.btn-donasi {
    background-color: var(--primary); /* Sesuaikan dengan warna yang diinginkan */
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.btn-donasi:hover {
    background-color: #84582d; /* Sesuaikan dengan warna yang diinginkan */
    color: #fff;
}



        /* LOGOUT */
.logout-btn {
    padding: 10px 20px;
    margin: 0 10px;
    background-color: transparent;
    border: 1px solid #ffffff;
    border-radius: 5px;
    color: #ffffff;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.logout-btn:hover {
    background-color: #ffffff;
    color: #000000;
}

footer {
    background-color: var(--bg);
    text-align: center;
    padding: 1rem 0 3rem;
    margin-top: 3rem;
}

footer .socials a {
    color: #fff;
    padding: 0.7rem 1rem;
}

footer .socials a:hover, footer .links a:hover {
    color: var(--primary);

}

footer .links {
    margin-bottom: 1.4rem;
}



footer .links a {
    color: #fff;
    padding: 0.7rem 1rem;
}

footer .credit {
    font-size: 0.8rem;

}

footer .credit a {
    color: var(--primary);
    font-weight: 700;

}


    </style>

</head>

<body>

    <!-- Navbar -->
<nav class="navbar">
    <a href="" class="navbar-logo">esensi<span>care</span></a>
    <div class="navbar-nav">
        <a href="index.php">Home</a>
        <a href="index.php">About us</a>
        <a href="tabel-donasi.php">Information</a>
        <a class="link-donasi" href="donasi.php">Donate</a>
    </div>

    <div class="navbar-extra">
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</nav>
<div class="campaigns">
<div class="campaign">
        <img src="bencana-alam.jpg" alt="Bencana Alam" style="width: 100%;">
        <h2>Bantuan Bencana Alam</h2>
        <a href="donasi.php" class="btn-donasi">Donasi</a>
    </div>
    <div class="campaign">
        <img src="lembaga-pendidikan.jpg" alt="Lembaga Pendidikan" style="width: 100%;">
        <h2>Bantuan Lembaga Pendidikan</h2>
        <a href="donasi.php" class="btn-donasi">Donasi</a>
    </div>
    <div class="campaign">
        <img src="fakir-miskin.jpg" alt="Fakir Miskin" style="width: 100%;">
        <h2>Bantuan Fakir Miskin</h2>
        <a href="donasi.php" class="btn-donasi">Donasi</a>
    </div>
    <div class="campaign">
        <img src="masjid.jpg" alt="Pembangunan Masjid" style="width: 100%;">
        <h2>Bantuan Pembangunan Masjid</h2>
        <a href="donasi.php" class="btn-donasi">Donasi</a>
    </div>
    <div class="campaign">
        <img src="panti-asuhan.jpg" alt="Panti Asuhan" style="width: 100%;">
        <h2>Bantuan Panti Asuhan</h2>
        <a href="donasi.php" class="btn-donasi">Donasi</a>
    </div>
    <div class="campaign">
        <img src="rumah-sakit.jpg" alt="Lembaga Pendidikan" style="width: 100%;">
        <h2>Bantuan Rumah Sakit</h2>
        <a href="donasi.php" class="btn-donasi">Donasi</a>
    </div>
    </div>

<footer>
        <div class="socials">
            <a href="https://www.instagram.com/nirrvanaan/" target="blank"><i data-feather="instagram" ></i></a>
            <a href="https://x.com/andriaaanst" target="blank"><i data-feather="twitter" ></i></a>
            <a href="https://www.facebook.com/profile.php?id=100012790360821" target="blank"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#">Home</a>
            <a href="tentang-saya.php">Tentang kami</a>
            <a href="#layanan">Layanan</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">Nirvana X SIJA 1</a> | &copy; 2024</p>
        </div>
    </footer>

    <script>
        feather.replace();
    </script>

    <!-- My JS -->
    <script src="js/script.js"></script>
</body>

</html>



