<?php 
try {
    require_once('../lib/conn_db.php');

    $idKeranjang = $_GET['id'];

    $query = "DELETE FROM keranjang WHERE id='$idKeranjang'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Produk berhasil dihapus dari keranjang');
                window.location = '../../pages/kasir/kasir.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Produk gagal dihapus dari keranjang');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>