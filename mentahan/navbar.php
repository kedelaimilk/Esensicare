<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
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
    background-color: var(--bg);
    font-family: 'Poppins', sans-serif;
    color: #fff;
    animation: fadeInAnimation ease 2s ;
    animation-iteration-count:1 ;
    animation-fill-mode:forwards ;
}

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
    </style>
</head>
<body>
<nav class="navbar">
        <a href="" class="navbar-logo">esensi<span>care</span></a>
        <div class="navbar-nav">
            <a href="index.php">Beranda</a>
            <a href="tentang-saya.php">Tentang kami</a>
            <a href="index.php">Layanan</a>
            <a href="index.php">Kontak Admin</a>
            <a href="tentang-saya.php">Profil</a>
            <a class="link-donasi" href="donasi.php">Donasi</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>    
</body>
</html>

