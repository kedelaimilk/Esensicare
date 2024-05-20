<style>
    table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
 
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: rgb(19, 110, 170);
            color: white;

        }

        .btn {
            margin-top: 30px;
        }

        img {
        max-width: 100%; /* Maksimum lebar gambar adalah 100% dari lebar parent */
        max-height: 100%; /* Maksimum tinggi gambar adalah 100% dari tinggi parent */
        height: auto; /* Biarkan tinggi gambar menyesuaikan proporsi dengan lebar */
}

    .pp {
        width: 100px;
    }

    .button {
        margin-left: 20px;
    }

</style>



<h3>Data pengguna</h3>

<table>
    <th>No</th>
    <th>id</th>
    <th>Username</th>
    <th>Password</th>
    <th>Role</th>
    <th>Action  </th>

    <button class="button"><a href="../login.php">logout</a></button>
    <button class="button"><a href="../admin/adduser.php">Add User</a></button>

    <br>

<?php



    require "../koneksi db/database.php";
    $no=1;
    $ambil = mysqli_query($db, "SELECT * from users") ;
    if ($ambil) {
        while ($tampilan = mysqli_fetch_assoc($ambil)){
        
            $id = $tampilan['id'];
            $username = $tampilan['username'];
            $password = $tampilan['password'];
            $role = $tampilan['role'];
            
            echo '<tr>
                <td>'.$no.'</td>
                <td>'.$id.'</td>
                <td>'.$username.'</td>
                <td>'.$password.'</td>
                <td>'.$role.'</td>
                <td>
                    <button><a href="edituser.php?id='.$id.'">Edit</a></button>
                    <button><a href="deleteuser.php?id='.$id.'">Delete</a></button>
                </td>
            </tr>';
            $no++;
        }
    }

?> 
        
</table>

