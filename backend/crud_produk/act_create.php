<?php 
try {
    require_once('../lib/conn_db.php');

    $kodeProduk = $_GET['kode'];
    $namaProduk = $_GET['nama_produk'];
    $kategoriProduk = $_GET['kategori'];
    $hargaBeli = $_GET['harga_beli'];
    $hargaJual = $_GET['harga_jual'];
    $diskonProduk = ($_GET['diskon'] == null) ? 0 : $_GET['diskon'] / 100;
    $stokProduk = $_GET['stok'];

    $query = "INSERT INTO produk(kode_produk, nama_produk, id_kategori, harga_beli, harga_jual, diskon, stok) VALUES('$kodeProduk', '$namaProduk', '$kategoriProduk', '$hargaBeli', '$hargaJual', '$diskonProduk', '$stokProduk')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Produk berhasil ditambahkan');
                window.location = '../../pages/produk/produk.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Produk gagal ditambahkan');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>