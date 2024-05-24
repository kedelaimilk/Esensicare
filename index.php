<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location:login.php");

        exit;
    }

?>
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

</head>

<body>

    <nav class="navbar">
        <a href="" class="navbar-logo">esensi<span>care</span></a>
        <div class="navbar-nav">
            <a href="#">Beranda</a>
            <a href="#about">Tentang kami</a>
            <a href="#layanan">Layanan</a>
            <a href="#contact">Kontak Admin</a>
            <a href="tentang-saya.php">Profil</a>
            <a class="link-donasi" href="donasi.php">Donasi</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>

    <!-- Hero Section START -->

    <section class="hero">
        <main class="content">
            <h1>Selamat datang di esensi<span>care 
                
                </span>
                <?= $_SESSION['username']; ?>!
            </h1>
            
            <p> Esensicare membangun dan membina komunitas Fellows, Young Changemakers, Changemaker Institutions, dan
                lainnya yang
                melihat bahwa dunia saat ini mengharuskan setiap orang untuk menjadi changemaker – seseorang yang
                melihat dirinya mampu menciptakan perubahan positif dalam skala besar.</p>
            <form class="logout-btn"action="" method="POST">
                
            </form>

        </main>

    </section>

    <!-- Hero Section END -->

    <!-- About Section START -->
    <section id="about" class="about">
        <h2><span>Tentang</span> kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="DSC05150.jpg" alt="">
            </div>

            <div class="content">
                <h3>Bersama esensicare</h3>
                <p>Setitik kebaikan dapat mengubah lautan kepedihan. Berbagi dan peduli pada sesama untuk menciptakan
                    gelombang perubahan yang positif. Tindakan sederhana seperti memberikan senyuman, mendengarkan dengan penuh perhatian, atau memberikan bantuan kepada mereka yang membutuhkan dapat menjadi setitik kebaikan yang mengubah suasana hati dan memberikan harapan.</p>
            </div>
        </div>
    </section>

    <!-- About section END -->

    <!-- Layanan Section  START-->

    <section id="layanan" class="layanan">
        <h2><span>Layanan</span> kami</h2>
        <p>Tim program esensicare berkolaborasi sebagai satu tim, di mana kami berinvestasi pada sumber daya manusia dan
            pola kewirausahaan kolaboratif yang dibutuhkan dalam dunia Semua Orang adalah Pembuat Perubahan.</p>



        <div class="row">
            <div class="layanan-card">
                <img src="Bantuan Beasiswa dari Lippo Malls Untuk YPPH dan YPHP Rp4 Miliar - MediaBanten_Com.jpg"
                    alt="" class="layanan-card-img">
                <h3 class="layanan-card-tittle">Beasiswa pendidikan anak di seluruh
                    Indonesia</h3>
                <p class="isi">Yayasan Pendidikan Pelita Harapan (YPPH) dan Yayasan Pendidikan Harapan Papua (YPHP) sebagai institusi yang berfokus di dunia pendidikan berkualitas untuk Indonesia, menerima bantuan beasiswa pendidikan dari Lippo Malls Indonesia yang ditujukan untuk membantu pendidikan 1.000 anak di daerah-daerah terpencil di Indonesia.</p>
            </div>
            <div class="layanan-card">
                <img src="Berbagi Kasih Natal, BRI Salurkan Paket Sembako dan Santunan di Seluruh Indonesia.jpg"
                    alt="" class="layanan-card-img">
                <h3 class="layanan-card-tittle">BRI Salurkan Paket Sembako dan Santunan</h3>
                <p class="isi">PT Bank Rakyat Indonesia (Persero) Tbk atau BRI senantiasa meng-create economic dan social value untuk dapat terus 'Memberi Makna Indonesia'. Dalam rangka memaknai Hari Raya Natal dan Menyambut Tahun Baru 2023, perseroan turut berbagi dengan menyalurkan berbagai bantuan kepada masyarakat yang membutuhkan. Bantuan paket sembako dan santunan tersebut diharapkan dapat membantu meringankan beban masyarakat yang membutuhkan, terlebih di tengah pandemi COVID-19 yang masih berlangsung.</p>
            </div>
            <div class="layanan-card">
                <img src="KAPUAS.jpg"
                    alt="" class="layanan-card-img">
                <h3 class="layanan-card-tittle">DSPKB Salurkan Bantuan Sosial beras untuk KPM-PKH</h3>
                <p class="isi">Kementerian Sosial melalui Direktur Jenderal Pemberdayaan Sosial Kementerian Sosial Republik Indonesia pada tanggal 31 Agustus 2020 menginstruksikan penyaluran Bantuan Sosial Beras (BSB) dalam rangka Program Jaringan Pengaman Sosial Covid-19 di Kabupaten Kapuas Hulu Provinsi Kalimantan Barat. Kegiatan penyaluran Bantuan Sosial Beras khusus KPM (Keluarga Penerima Manfaat) dan PKH (Program Keluarga Harapan) dengan Jumlah KPM sebanyak 8.627 sudah didistribusikan oleh Dinas Sosial P3A P2 KB Kabupaten Kapuas Hulu pada tanggal 5-16 Oktober 2020. Penerimaan beras sebesar 15kg/ KPM selama 3 (tiga) bulan dari bulan agustus, september dan oktober.</p>
            </div>
        </div>
    </section>

    <!-- Layanan Section END -->

    <!-- Contact section START -->
    <section id="contact" class="contact">
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memastikan tidak ada input yang kosong
    if (empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['telepon'])) {
        
    } else {
        // Mengambil data dari formulir
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $kritik = $_POST['kritik'];

        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menyimpan data ke dalam tabel
        $sql = "INSERT INTO kontak (nama, email, telepon, kritik) VALUES ('$nama', '$email', '$telepon', '$kritik')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dikirim";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>



    <h2><span>Kontak</span></h2>
        <p>Esensicare</p>


        <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1978.0036325407234!2d112.7241299953734!3d-7.464446452997032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e7b9fade7dc1%3A0x807e53298798480a!2sPerumahan%20Pesona%20Sekar%20Gading!5e0!3m2!1sid!2sid!4v1709212749893!5m2!1sid!2sid"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form action="" method="POST">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="Nama" name="nama" required>
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="mail" placeholder="Email" name="email" required>
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="No.HP" name="telepon" required>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Kritik & Saran" name="kritik" required>
                </div>
                <button type="submit" class="btn">Kirim pesan</button>
                <button type="" name="logout"><a href="logout.php">Logout</a></button>
            </form>
        </div>
    </section>

    <!-- Contact section END -->

    <!-- Footer START-->

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

    <!-- Footer END -->










<img src="" alt="">










    <!-- Fetaher Icons -->
    <script>
        feather.replace();
    </script>

    <!-- My JS -->
    <script src="js/script.js"></script>
</body>

</html>