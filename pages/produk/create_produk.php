<?php 
    require_once('../../backend/lib/conn_db.php');

    $kode = "P".random_int(100, 1000);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Produk</title>
</head>
<body>
    <form action="../../backend/crud_produk/act_create.php" method="get">
        <input type="hidden" name="kode" value="<?= $kode ?>">
        <label for="">Nama Produk: </label><input type="text" name="nama_produk">
        <br><br>
        <label for="">Kategori: </label>
        <select name="kategori">
            <?php 
                $queryKategori = "SELECT * FROM kategori";
                $resultKategori = mysqli_query($connection, $queryKategori);

                while ($dataKategori = mysqli_fetch_assoc($resultKategori)) {
                    echo "
                        <option value='$dataKategori[id_kategori]'>$dataKategori[nama_kategori]</option>
                    ";
                }
            ?>
        </select>
        <br><br>
        <label for="">Harga Beli: </label><input type="number" name="harga_beli">
        <br><br>
        <label for="">Harga Jual: </label><input type="number" name="harga_jual">
        <br><br>
        <label for="">Diskon: </label><input type="number" name="diskon"><label> %</label>
        <br><br>
        <label for="">Jumlah Stok: </label><input type="number" name="stok">
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>