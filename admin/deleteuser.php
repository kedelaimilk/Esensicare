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

    // Query untuk menghapus data pengguna berdasarkan ID
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: " . $db->error;
    }
} else {
    echo "Invalid request";
    exit;
}

$db->close();
?>
