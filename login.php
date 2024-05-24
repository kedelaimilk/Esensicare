<?php

session_start();

if (isset($_SESSION["login"])) {
    header('Location: index.php');
    exit;
}

$mysqli = new mysqli('localhost', 'root', '', 'login');

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username= '$username' AND password='$password'");

    // cek username
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION["login"] = true; // Set session login
        if ($data["role"] == "admin") {
            $_SESSION["username"] = $username;
            $_SESSION["role"] = 'admin';
            $_SESSION["email"] = $data['email'];
            header("Location: admin/index.php");
        } else if ($data["role"] == "user") {
            $_SESSION["username"] = $username;
            $_SESSION["role"] = 'user';
            $_SESSION["email"] = $data['email'];
            header("Location: index.php");
        } else {
            header("Location: login.php");
        }
        exit;
    } else {
        echo "<script>alert('Silahkan Masukkan Username/Password!')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
    background-color: #2b2b2b;
    color: #e0e0e0;
    font-family: Arial, sans-serif;
}

h3 {
    text-align: center;
    margin-bottom: 20px;
    color: #fff;
}

form {
    background-color: #3b3b3b;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 50px auto;
}

input[type="text"], input[type="password"] {
    display: block;
    width: 473px;
    padding: 12px;
    border: 1px solid #4b4b4b;
    border-radius: 5px;
    font-size: 14px;
    font-weight: normal;
    color: black;
    margin-bottom: 20px;
}

input[type="text"]:focus, input[type="password"]:focus {
    outline: none;
    box-shadow: 0px 0px 5px rgba(255, 255, 255, 0.1);
}

button[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #3e8e41;
}

.error-message {
    color: red;
    font-style: italic;
    text-align: center;
    margin-bottom: 20px;
}

.register {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #fff;
}

.register a {
    text-decoration: none;
    color: #4CAF50;
}

.register a:hover {
    color: #3e8e41;
}
    </style>
    
</head>
<body>


    <h3>Masuk akun</h3>
    <form action="" method="POST">
        <input type="text" placeholder="Username" name="username"/>
        <input type="password" placeholder="Password" name="password"/>
        <?php if(isset($error)):?>
            <p align="center" style="color : red; font-style:italic;">Password / Username Salah Bosss</p>
        <?php endif;?>
        <button type="submit" name="login">Masuk Sekarang</button>
        <p class="register">Belum mempunyai akun? Silahkan <a href="register.php">Daftar</a> disini</p>
    </form>

</body>

</html>
