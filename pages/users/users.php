<?php 
    session_start();

    if (!isset($_SESSION['login']) && !$_SESSION['login']) {
        header('location: ../../index.php');
        exit;
    }

    if ($_SESSION['role'] != 'admin') {
        echo "
            <script>
                alert('Anda tidak punya akses untuk ini');
                window.location = '../kasir/kasir.php';
            </script>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <nav style="padding-bottom: 20px;">
        <h3>Menu</h3>
        <a href="../kasir/kasir.php">Kasir</a>
        <a href="../kategori/kategori.php">Kategori</a>
        <a href="../produk/produk.php">Produk</a>
        <a href="../penjualan/penjualan.php">Penjualan</a>
        <a href="users.php">Users</a>
        <button><a href="../../backend/auth/logout.php?logout">Logout</a></button>
    </nav>
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