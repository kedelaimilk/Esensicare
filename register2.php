<?php
function register($data)
{
    $username = $data['username'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $email = $data['email'];
    $role = $data['role'];

    $db = new mysqli('localhost', 'root', '', 'login');

    // Memeriksa apakah koneksi berhasil
    if ($db->connect_error) {
        die('Koneksi Gagal: ' . $db->connect_error);
    }   

    // Memeriksa apakah username sudah ada
    $result = mysqli_query($db, "SELECT * FROM user WHERE username= '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username Sudah Ada!')</script>";
        return false;
    }

    // Memasukkan data ke database
    $query = "INSERT INTO user (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
    if ($db->query($query)) {
        $db->close();
        header("location: login.php");
        exit();
    } else {
        echo "Error: " . $db->error;
    }

    $db->close();
}
?>
