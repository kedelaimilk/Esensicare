<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "login";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
if ( isset ($_POST["submit"])){
$user_id = $_POST['user_id'];
$amount = $_POST['amount'];
$payment_date = $_POST['payment_date'];
$payment_method = $_POST['payment_method'];
$status = $_POST['status'];
$remarks = $_POST['remarks'];

// Buat query untuk insert data
$sql = "INSERT INTO pembayaran (user_id, amount, payment_date, payment_method, status, remarks)
VALUES ('$user_id', '$amount', '$payment_date', '$payment_method', '$status', '$remarks')";

if ($conn->query($sql) === TRUE) {
    echo "Payment recorded successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
</head>
<body>
    <h2>Payment Form</h2>
    <form action="" method="POST">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required><br><br>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>

        <label for="payment_date">Payment Date:</label>
        <input type="datetime-local" id="payment_date" name="payment_date" required><br><br>

        <label for="payment_method">Payment Method:</label>
        <input type="text" id="payment_method" name="payment_method"><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="failed">Failed</option>
        </select><br><br>

        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks"></textarea><br><br>

        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
