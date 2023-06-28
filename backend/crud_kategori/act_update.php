<?php 
try {
    require_once('../lib/conn_db.php');

    $idKategori = $_GET['id_kategori'];
    $namaKategori = $_GET['kategori'];

    $query = "UPDATE kategori SET nama_kategori='$namaKategori' WHERE id_kategori='$idKategori'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Kategori berhasil diubah');
                window.location = '../../pages/kategori/kategori.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Kategori gagal diubah');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>