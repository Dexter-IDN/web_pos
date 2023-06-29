<?php 
try {
    require_once('../lib/conn_db.php');

    $idProduk = $_GET['produk'];

    $query = "DELETE FROM produk WHERE id_produk='$idProduk'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Produk berhasil dihapus');
                window.location = '../../pages/produk/produk.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Produk gagal dihapus');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>