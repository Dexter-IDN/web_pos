<?php 
    require_once('../lib/conn_db.php');

    $kodePenjualan = $_GET['penjualan'];

    $queryPenjualan = "DELETE FROM penjualan WHERE kode_penjualan='$kodePenjualan'";
    $resultPenjualan = mysqli_query($connection, $queryPenjualan);
    
    if ($resultPenjualan) {
        $queryItem = "DELETE FROM penjualan_item WHERE kode_penjualan='$kodePenjualan'";
        $resultItem = mysqli_query($connection, $queryItem);

        echo "
            <script>
                alert('Catatan penjualan berhasil dihapus');
                window.location = '../../pages/penjualan/penjualan.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Pembayaran berhasil, transaksi selesai.');
                history.go(-1);
            </script>        
        ";
    }
?>