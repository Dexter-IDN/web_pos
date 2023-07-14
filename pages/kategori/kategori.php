<?php 
    session_start();

    if (!isset($_SESSION['login']) && !$_SESSION['login']) {
        header('location: ../../index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Produk</title>
</head>
<body>
    <nav style="padding-bottom: 20px;">
        <h3>Menu</h3>
        <a href="../kasir/kasir.php">Kasir</a>
        <a href="kategori.php">Kategori</a>
        <a href="../produk/produk.php">Produk</a>
        <a href="../penjualan/penjualan.php">Penjualan</a>
        <?= ($_SESSION['role'] == 'admin') ? "<a href='../users/users.php'>Users</a>" : '' ?>
        <button><a href="../../backend/auth/logout.php?logout">Logout</a></button>
    </nav>
    <button><a href="create_kategori.php">Tambah Kategori</a></button>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                require_once('../../backend/lib/conn_db.php');

                $query = "SELECT * FROM kategori";
                $result = mysqli_query($connection, $query);

                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                            <td>$no</td>
                            <td>$data[nama_kategori]</td>
                            <td>
                                <a href='update_kategori.php?kategori=$data[id_kategori]'>Edit</a>
                                <a href='../../backend/crud_kategori/act_delete.php?kategori=$data[id_kategori]'>Hapus</a>
                            </td>
                        </tr>
                    ";

                    $no++;
                }
            ?>
        </tbody>
    </table>
</body>
</html>