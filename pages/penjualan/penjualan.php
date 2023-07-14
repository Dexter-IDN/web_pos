<?php 
    require_once('../../backend/lib/conn_db.php');

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
    <title>Penjualan</title>
</head>
<body>
    <nav style="padding-bottom: 20px;">
        <h3>Menu</h3>
        <a href="../kasir/kasir.php">Kasir</a>
        <a href="../kategori/kategori.php">Kategori</a>
        <a href="../produk/produk.php">Produk</a>
        <a href="penjualan.php">Penjualan</a>
        <?= ($_SESSION['role'] == 'admin') ? "<a href='../users/users.php'>Users</a>" : '' ?>
        <button><a href="../../backend/auth/logout.php?logout">Logout</a></button>
    </nav>
    <div style="display: flex;">
        <table border="1" cellpadding="10" cellspacing="0" style="margin-right: 10%;">
            <thead>
                <th>No</th>
                <th>Kode Penjualan</th>
                <th>Tanggal Transaksi</th>
                <th>Kasir</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    $queryPenjualan = "SELECT * FROM penjualan";
                    $resultPenjualan = mysqli_query($connection, $queryPenjualan);

                    $noPj = 1;
                    while ($dataPenjualan = mysqli_fetch_assoc($resultPenjualan)) {
                        echo "
                            <tr>
                                <td>$noPj</td>
                                <td>$dataPenjualan[kode_penjualan]</td>
                                <td>$dataPenjualan[tgl_transaksi]</td>
                                <td>$dataPenjualan[username]</td>
                                <td>
                                    <a href='penjualan.php?penjualan=$dataPenjualan[kode_penjualan]'>Detail</a>
                                    <a href='../../backend/crud_penjualan/act_delete.php?penjualan=$dataPenjualan[kode_penjualan]'>Hapus</a>
                                </td>
                            </tr>
                        ";

                        $noPj++;
                    }
                ?>
            </tbody>
        </table>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th colspan="4">Kode Penjualan <?= $_GET['penjualan'] ?></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (isset($_GET['penjualan'])) {
                        $queryItem = "SELECT penjualan_item.*, produk.nama_produk FROM produk JOIN penjualan_item ON penjualan_item.kode_produk=produk.kode_produk WHERE penjualan_item.kode_penjualan='$_GET[penjualan]'";
                    } else {
                        $queryItem = "SELECT penjualan_item.*, produk.nama_produk FROM produk JOIN penjualan_item ON penjualan_item.kode_produk=produk.kode_produk";
                    }
                    $resultItem = mysqli_query($connection, $queryItem);

                    $noIm = 1;
                    while ($dataItem = mysqli_fetch_assoc($resultItem)) {
                        echo "
                            <tr>
                                <td>$noIm</td>
                                <td>$dataItem[nama_produk]</td>
                                <td>$dataItem[harga_jual]</td>
                                <td>$dataItem[jumlah]</td>
                            </tr>
                        ";

                        $noIm++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>