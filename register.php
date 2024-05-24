<?php
// Cek jika data telah terinput
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Panggil database borrr
    include('koneksi db/database.php');
    
    // Ambil Data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    // Memasukkan data
    $query = "INSERT INTO users (username, role, password) VALUES ('$username', '$role', '$password')";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        header("location:login.php");
    } else {
        echo "<script> alert(' Akun sudah digunakan, silahkan coba lagi ')</script>";
    }
    
    // Tutup koneksi database
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Multiuser Registration Form</title>
<style>
    body {
  background-color: #2b2b2b;
  color: #e0e0e0;
  font-family: Arial, sans-serif;
}

.container {
  max-width: 500px;
  margin: 50px auto;
  padding: 20px;
  background-color: #333;
  border: 1px solid #444;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  margin-top: 0;
  text-align: center;
  color: #4caf50;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

label {
  margin-bottom: 10px;
  display: block;
  color: #555;
  font-weight: bold;
}

input[type="text"], input[type="password"], select {
  width: 100%;
  height: 40px;
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #444;
  color: #e0e0e0;
}

input[type="submit"] {
  width: 100%;
  height: 40px;
  background-color: #4caf50;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

.login {
  text-align: center;
  margin-top: 20px;
  color: #555;
}

.login a {
  text-decoration: none;
  color: #4caf50;
}

.login a:hover {
  color: #3e8e41;
}
</style>

</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <input type="submit" value="Register">
        <p class="login">Sudah memiliki akun? Silahkan <a href="login.php">Login</a></p>
    </form>
</div>

</body>
</html>


