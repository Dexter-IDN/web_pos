<?php 
try {
    require_once('../lib/conn_db.php');

    $kodeProduk = $_GET['kode'];
    $namaProduk = $_GET['nama_produk'];
    $kategoriProduk = $_GET['kategori'];
    $hargaBeli = $_GET['harga_beli'];
    $hargaJual = $_GET['harga_jual'];
    $diskonProduk = $_GET['diskon'] / 100;
    $stokProduk = $_GET['stok'];

    $query = "UPDATE produk SET nama_produk='$namaProduk', id_kategori='$kategoriProduk', harga_beli='$hargaBeli', harga_jual='$hargaJual', diskon='$diskonProduk', stok='$stokProduk' WHERE kode_produk='$kodeProduk'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Produk berhasil diubah');
                window.location = '../../pages/produk/produk.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Produk gagal diubah');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>