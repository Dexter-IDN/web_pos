<?php 
try {
    require_once('../lib/conn_db.php');

    $idKategori = $_GET['kategori'];

    $query = "DELETE FROM kategori WHERE id_kategori='$idKategori'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Kategori berhasil dihapus');
                window.location = '../../pages/kategori/kategori.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Kategori gagal dihapus');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>