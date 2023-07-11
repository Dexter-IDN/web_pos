<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <button><a href="create_user.php">Tambah User</a></button>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                require_once('../../backend/lib/conn_db.php');

                $query = "SELECT * FROM users WHERE role='kasir'";
                $result = mysqli_query($connection, $query);

                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    $pwdec = openssl_decrypt($data['password'], 'AES-128-CBC', '');

                    echo "
                        <tr>
                            <td>$no</td>
                            <td>$data[nama_lengkap]</td>
                            <td>$data[username]</td>
                            <td>$pwdec</td>
                            <td>
                                <a href='update_user.php?user=$data[id]'>Edit</a>
                                <a href='../../backend/crud_user/act_delete.php?user=$data[id]'>Hapus</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>