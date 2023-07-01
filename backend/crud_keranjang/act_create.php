<?php 
try {
    require_once('../lib/conn_db.php');

    $kodeProduk = $_GET['kode_produk'];
    $hargaJual = $_GET['harga_jual'];
    $stok = $_GET['stok'];
    $jumlah = $_GET['jumlah'];

    if ($jumlah > $stok) {
        echo "
            <script>
                alert('Jumlah yang dimasukkan melebihi stok yang tersedia');
                history.go(-1);
            </script>        
        ";
    } else {
        $query = "INSERT INTO keranjang(kode_produk, harga_jual, jumlah, username) VALUE('$kodeProduk', '$hargaJual', '$jumlah', '')";
        $result = mysqli_query($connection, $query);
    
        if ($result) {
            echo "
                <script>
                    alert('Produk berhasil ditambahkan ke keranjang');
                    window.location = '../../pages/kasir/kasir.php';
                </script>        
            ";
        } else {
            echo "
                <script>
                    alert('Produk gagal ditambahkan ke keranjang');
                    history.go(-1);
                </script>        
            ";
        }
    }
} catch (\Throwable $error) {
    echo $error;
}
?>