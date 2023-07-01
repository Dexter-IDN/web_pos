<?php 
try {
    require_once('../lib/conn_db.php');

    $idKeranjang = $_GET['id'];
    $jumlah = $_GET['jumlah'];

    $query = "UPDATE keranjang SET jumlah='$jumlah' WHERE id='$idKeranjang'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Produk di keranjang berhasil diubah');
                window.location = '../../pages/kasir/kasir.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Produk di keranjang gagal diubah');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>