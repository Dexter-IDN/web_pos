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
    <title>Daftar Produk</title>
</head>
<body>
    <nav style="padding-bottom: 20px;">
        <h3>Menu</h3>
        <a href="../kasir/kasir.php">Kasir</a>
        <a href="../kategori/kategori.php">Kategori</a>
        <a href="produk.php">Produk</a>
        <a href="../penjualan/penjualan.php">Penjualan</a>
        <?= ($_SESSION['role'] == 'admin') ? "<a href='../users/users.php'>Users</a>" : '' ?>
        <button><a href="../../backend/auth/logout.php?logout">Logout</a></button>
    </nav>
    <button><a href="create_produk.php">Tambah Produk</a></button>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Diskon</th>
            <th>Jumlah Stok</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                require_once('../../backend/lib/conn_db.php');

                $query = "SELECT produk.*, kategori.* FROM kategori JOIN produk ON kategori.id_kategori=produk.id_kategori ORDER BY id_produk DESC";
                $result = mysqli_query($connection, $query);

                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    $diskon = $data['diskon'] * 100;

                    echo "
                        <tr>
                            <td>$no</td>
                            <td>$data[kode_produk]</td>
                            <td>$data[nama_produk]</td>
                            <td>$data[nama_kategori]</td>
                            <td>$data[harga_beli]</td>
                            <td>$data[harga_jual]</td>
                            <td>$diskon%</td>
                            <td>$data[stok]</td>
                            <td>
                                <a href='update_kategori.php?kode=$data[kode_produk]'>Ubah</a>
                                <a href='../../backend/crud_produk/act_delete.php?produk=$data[id_produk]'>Hapus</a>
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