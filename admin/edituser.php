<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}

// Cek apakah ada ID yang dikirim melalui metode GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Debug: Tampilkan ID yang diterima
    echo "Received ID: " . $id . "<br>";

    // Query untuk mendapatkan data pengguna berdasarkan ID
    $sql = "SELECT id, username, role FROM users WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $role = $row["role"];
    } else {
        echo "User not found";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $role = $_POST["role"];

    // Debug: Tampilkan data yang diterima
    echo "Updating ID: " . $id . "<br>";
    echo "Username: " . $username . "<br>";
    echo "Role: " . $role . "<br>";

    // Query untuk mengupdate data pengguna

    $sql = "UPDATE users SET username=?, role=? WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssi", $username, $role, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . $db->error;
    }
} else {
    echo "Invalid request";
    exit;
}

$db->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        button{
            width: 100%;
            margin-top:20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit User</h2>
        <form method="post" action="edituser.php">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>" required>
            <label for="role">Role:</label>
            <input type="text" name="role" value="<?php echo isset($role) ? $role : ''; ?>" required>
            <input type="submit" value="Update">
            <button>Back</button>
        </form>
    </div>
</body>
</html>
