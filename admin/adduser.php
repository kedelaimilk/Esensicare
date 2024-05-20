<?php
include "../koneksi db/database.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Lakukan validasi input di sini

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);
    $role = mysqli_real_escape_string($db, $role);

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
             </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
            </script>" . mysqli_error($db);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: grey;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.7); /* Warna latar belakang hitam dengan transparansi 0.7 */
    color: #fff; /* Warna teks putih */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek 3D */
}

h1 {
    text-align: center;
    color: #218838; /* Warna hijau */
}

form {
    margin-top: 20px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #28a745; /* Warna border hijau */
    background-color: rgba(0, 0, 0, 0.5); /* Warna latar belakang hitam dengan transparansi 0.5 */
    color: #fff; /* Warna teks putih */
}

input[type="text"]:hover,
input[type="password"]:hover,
select:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Efek hover pada latar belakang hitam dengan transparansi 0.7 */
}

button {
    padding: 10px 20px;
    background-color: #28a745; /* Warna hijau */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #218838; /* Warna hijau lebih gelap saat hover */
}

    </style>
</head>
<body>
    <h1>Tambah Data pengguna</h1>

    <form action="" method="POST">
        <ul>

            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="text" name="password" id="password" required>
            </li>
            <li>
                <label for="role">Role :</label>
                <input type="text" name="role" id="role" required>
            </li>
            <li>
                <button type="submit" name="submit">Add User</button>
                <button><a href="index.php">Back</a></button>
            </li>
        </ul>
    </form>
</body>
</html>