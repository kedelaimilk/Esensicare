<?php
    include "koneksi db/database.php";
    session_start();    


    if(isset($_SESSION["is_login"])) {
        header("location: index.php");
    }
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = hash('sha256', $password);

    $sql = "SELECT * FROM user WHERE username = '$username' AND email= '$email' AND password ='$hash_password'";

    $result = $db->query($sql);

    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data ["username"];
        $_SESSION["is_login"] = true;
        
        header("location: index.php");

    }else {
        echo "<script> alert(' Akun tidak ditemukan, silahkan coba lagi ')</script>";
    }
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login-style.css">
  <title>Document</title>
</head>
<body>
    <div class="main-login">
    <h3>Masuk Akun</h3>
    <form action="login.php" method="POST">
      <input type="text" placeholder="Masukkan username" name="username" required>
      <input type="password" placeholder="Masukkan password" name="password" required>
      <input type="email" placeholder="Masukkan Alamat email" name="email" required>
      <button type="submit" name="login">Masuk Sekarang</button>
      <p class="message">Belum mempunyai akun? <a href="register.php">Daftar</a></p>
    </form>
    </div>
</body>
</html>


