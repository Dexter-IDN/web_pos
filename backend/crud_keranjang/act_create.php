<?php 
try {
    require_once('../lib/conn_db.php');

    $kodeProduk = $_GET['kode_produk'];
    $hargaJual = $_GET['harga_jual'];
    $stok = $_GET['stok'];
    $jumlah = $_GET['jumlah'];
    $username = $_GET['kasir'];

    if ($jumlah > $stok) {
        echo "
            <script>
                alert('Jumlah yang dimasukkan melebihi stok yang tersedia');
                history.go(-1);
            </script>        
        ";
    } else {
        $queryCheck = "SELECT keranjang.*, produk.stok FROM produk JOIN keranjang ON keranjang.kode_produk=produk.kode_produk WHERE keranjang.kode_produk='$kodeProduk'";
        $resultCheck = mysqli_query($connection, $queryCheck);
        $dataCheck = mysqli_fetch_assoc($resultCheck);

        if ($kodeProduk != $dataCheck['kode_produk']) {
            $query = "INSERT INTO keranjang(kode_produk, harga_jual, jumlah, username) VALUE('$kodeProduk', '$hargaJual', '$jumlah', '$username')";
        } else {
            if ($dataCheck['jumlah'] + $jumlah > $dataCheck['stok']) {
                echo "
                    <script>
                        alert('Jumlah di dalam keranjang tidak boleh melebihi stok yang tersedia');
                        history.go(-1);
                    </script>
                ";

                exit;
            } else {
                $query = "UPDATE keranjang SET jumlah=jumlah+$jumlah WHERE kode_produk='$kodeProduk'";
            }
        }

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