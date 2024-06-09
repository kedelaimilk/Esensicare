<?php
session_start();
require ('koneksi db/database.php');

// Kueri untuk mendapatkan total donasi per user_id
$query = "
    SELECT user_id, nama, SUM(jumlah_donasi) AS total_donasi 
    FROM donatur 
    GROUP BY user_id, nama
    ORDER BY total_donasi DESC
";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($db));
}

// Kueri untuk mendapatkan total keseluruhan donasi
$totalQuery = "SELECT SUM(jumlah_donasi) AS total_semua_donasi FROM donatur";
$totalResult = mysqli_query($db, $totalQuery);

if (!$totalResult) {
    die("Query gagal: " . mysqli_error($db));
}

$totalRow = mysqli_fetch_assoc($totalResult);
$total_semua_donasi = $totalRow['total_semua_donasi'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Total Donasi</title>
    <style>
        body {
            background-color: #2b2b2b;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }

        table {
            width: 80%;
            margin: 50px auto;
            border-collapse: collapse;
            background-color: #3b3b3b;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #4b4b4b;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #575757;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .total-donasi-semua {
            margin: 20px auto;
            max-width: 80%;
            background-color: #3b3b3b;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .back-button {
            display: block;
            width: 80px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="total-donasi-semua">
        <h2>Total Semua Donasi</h2>
        <p>Rp <?php echo number_format($total_semua_donasi, 2, ',', '.'); ?></p>
    </div>

    <h2>Total Donasi Per User</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>Total Donasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>Rp " . number_format($row['total_donasi'], 2, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a class="back-button" href="index.php">Back</a>
</body>
</html>

<?php
mysqli_close($db);
?>
