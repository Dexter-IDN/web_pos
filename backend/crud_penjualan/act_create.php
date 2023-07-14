<?php 
try {
    require_once('../lib/conn_db.php');

    $kodeProduk = $_GET['kode_produk'];
    $hargaJual = $_GET['harga_jual'];
    $jumlah = $_GET['jumlah'];
    $username = $_GET['kasir'];

    $kodePenjualan = "P".date('dmyhis');

    $queryPenjualan = "INSERT INTO penjualan(kode_penjualan, username) VALUES('$kodePenjualan', '$username')";
    $resultPenjualan = mysqli_query($connection, $queryPenjualan);

    if ($resultPenjualan) {
        for ($i=0; $i < sizeof($kodeProduk); $i++) { 
            $queryItem = "INSERT INTO penjualan_item(kode_penjualan, kode_produk, harga_jual, jumlah) VALUES('$kodePenjualan', '$kodeProduk[$i]', $hargaJual[$i], $jumlah[$i])";
            $resultItem = mysqli_query($connection, $queryItem);

            // Update stok barang ketika transaksi selesai
            $queryUpdate = "UPDATE produk SET stok=stok-$jumlah[$i] WHERE kode_produk='$kodeProduk[$i]'";
            $resultUpdate = mysqli_query($connection, $queryUpdate);

            // Delete semua keranjang ketika transaksi selesai
            $queryDelete = "DELETE FROM keranjang WHERE kode_produk='$kodeProduk[$i]'";
            $resultDelete = mysqli_query($connection, $queryDelete);
        }

        echo "
            <script>
                alert('Pembayaran berhasil, transaksi selesai.');
                window.location = '../../pages/kasir/kasir.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Pembayaran gagal, transaksi dibatalkan.');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>