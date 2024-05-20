<?php

$mysqli = new mysqli('localhost', 'root', '', 'login');
session_start();

if(isset($_POST["login"])){
    $username= $_POST["username"];
    $password= $_POST["password"];

    $result = mysqli_query($mysqli,"SELECT * FROM users WHERE username= '$username' AND password='$password'");

    // cek username
    if(mysqli_num_rows($result) === 1){
        $data = mysqli_fetch_assoc($result);
        if($data['role'] == "admin"){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            // Simpan email ke sesi
            $_SESSION['email'] = $data['email'];
            // Alihkan ke halaman dashboard admin
            header("location:admin/index.php");
        } else if($data['role'] == "user"){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';
            // Simpan email ke sesi
            $_SESSION['email'] = $data['email'];
            // Alihkan ke halaman dashboard user
            header("location:index.php");
        } else {
            // Alihkan ke halaman login jika peran tidak dikenali
            header("location:login.php");
        }
    } else {
        // Redirect kembali ke halaman beranda jika login gagal
        header("location:login.php?pesan=gagal");    
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Login</title>
</head>
<body>


    <h3>Masuk akun</h3>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <?php if(isset($error)):?>
            <p align="center" style="color : red; font-style:italic;">Password / Username Salah Bosss</p>
        <?php endif;?>
        <button type="submit" name="login">Masuk Sekarang</button>
    </form>

</body>

</html>
