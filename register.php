<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include('koneksi db/database.php');
    
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    // Insert user data into database
    $query = "INSERT INTO users (username, role, password) VALUES ('$username', '$role', '$password')";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        echo "Registration successful!";
    } else {
        echo "<script> alert(' Akun sudah digunakan, silahkan coba lagi ')</script>";
    }
    
    // Close database connection
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Multiuser Registration Form</title>
<link rel="stylesheet" href="css/register-style.css">
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
    </form>
</div>

</body>
</html>


