<?php 
    require_once('../../backend/lib/conn_db.php');

    $kodeProduk = $_GET['kode'];

    $queryProduk = "SELECT * FROM produk WHERE kode_produk='$kodeProduk'";
    $resultProduk = mysqli_query($connection, $queryProduk);
    $dataProduk = mysqli_fetch_assoc($resultProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kategori</title>
</head>
<body>
    <form action="../../backend/crud_produk/act_update.php" method="get">
    <input type="hidden" name="kode" value="<?= $dataProduk['kode_produk'] ?>">
    <label for="">Nama Produk: </label><input type="text" name="nama_produk" value="<?= $dataProduk['nama_produk'] ?>">
        <br><br>
        <label for="">Kategori: </label>
        <select name="kategori">
            <?php 
                $queryKategori = "SELECT * FROM kategori";
                $resultKategori = mysqli_query($connection, $queryKategori);

                while ($dataKategori = mysqli_fetch_assoc($resultKategori)) {
                    if ($dataKategori['id_kategori'] == $dataProduk['id_kategori']) {
                        $select = "selected";
                    } else {
                        $select = "";
                    }

                    echo "
                        <option value='$dataKategori[id_kategori]' $select>$dataKategori[nama_kategori]</option>
                    ";
                }
            ?>
        </select>
        <br><br>
        <label for="">Harga Beli: </label><input type="number" name="harga_beli" value="<?= $dataProduk['harga_beli'] ?>">
        <br><br>
        <label for="">Harga Jual: </label><input type="number" name="harga_jual" value="<?= $dataProduk['harga_jual'] ?>"> 
        <br><br>
        <label for="">Diskon: </label><input type="number" name="diskon" value="<?= $dataProduk['diskon'] * 100 ?>"><label> %</label>
        <br><br>
        <label for="">Jumlah Stok: </label><input type="number" name="stok" value="<?= $dataProduk['stok'] ?>"> 
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>