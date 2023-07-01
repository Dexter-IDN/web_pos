<?php 
    require_once('../../backend/lib/conn_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
</head>
<body>
    <div style="display: flex;">
        <table border="1" cellpadding="10" cellspacing="0" style="margin-right: 10%;">
            <thead>
                <tr>
                    <th colspan="6">Daftar Produk</th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $queryProduk = "SELECT produk.*, kategori.* FROM kategori JOIN produk ON kategori.id_kategori=produk.id_kategori ORDER BY id_produk DESC";
                    $resultProduk = mysqli_query($connection, $queryProduk);
                    
                    $noProduk = 1;
                    while ($dataProduk = mysqli_fetch_assoc($resultProduk)) {
                        echo "
                        <form action='../../backend/crud_keranjang/act_create.php' method='get'>
                            <tr>
                                <td>$noProduk</td>
                                <td>
                                    <input type='hidden' name='kode_produk' value='$dataProduk[kode_produk]'>$dataProduk[nama_produk]
                                </td>
                                <td>$dataProduk[nama_kategori]</td>
                                <td>
                                    <input type='hidden' name='harga_jual' value='$dataProduk[harga_jual]'>Rp $dataProduk[harga_jual]
                                </td>
                                <td><input type='hidden' name='stok' value='$dataProduk[stok]'>$dataProduk[stok]</td>
                                <td>
                                    <label>Jumlah: </label>
                                    <input type='number' name='jumlah' style='width: 40px;' required>
                                    <button type='submit'>Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </form>
                        ";

                        $noProduk++;
                    }
                ?>
            </tbody>
        </table>
        <table border="1" cellpadding="10" cellspacing="0">
            <form action="" method="get">

                <thead>
                    <tr>
                        <th colspan="6">Keranjang</th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $queryKeranjang = "SELECT keranjang.*, produk.kode_produk, produk.nama_produk FROM produk JOIN keranjang ON keranjang.kode_produk=produk.kode_produk";
                        $resultKeranjang = mysqli_query($connection, $queryKeranjang);
    
                        $noKeranjang = 1;
                        while ($dataKeranjang = mysqli_fetch_assoc($resultKeranjang)) {
                            $subtotal = $dataKeranjang['harga_jual'] * $dataKeranjang['jumlah'];
                            $totalbayar += $subtotal;
    
                            echo "
                                <tr>
                                    <td>$noKeranjang</td>
                                    <td>
                                        <input type='hidden' name='kode_produk' value='$dataKeranjang[kode_produk]'>$dataKeranjang[nama_produk]
                                    </td>
                                    <td>
                                        <input type='hidden' name='harga_jual' value='$dataKeranjang[harga_jual]'>Rp $dataKeranjang[harga_jual]
                                    </td>
                                    <td>
                                        <input type='hidden' name='jumlah' value='$dataKeranjang[jumlah]'>$dataKeranjang[jumlah]
                                    </td>
                                    <td>Rp $subtotal</td>
                                    <td>
                                        <a href='update_keranjang.php?id=$dataKeranjang[id]'>Edit</a>
                                        <a href='../../backend/crud_keranjang/act_delete.php?id=$dataKeranjang[id]'>Hapus</a>
                                    </td>
                                </tr>
                            ";

                            $noKeranjang++;
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Bayar: Rp <?= $totalbayar ?></th>
                        <th colspan="2"><button type="submit">Bayar</button></th>
                    </tr>
                </tfoot>
            </form>
        </table>
    </div>
</body>
</html>