<?php
try {
    require_once('../lib/conn_db.php');

    $namaKategori = $_GET['kategori'];

    $query = "INSERT INTO kategori(nama_kategori) VALUES('$namaKategori')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Kategori berhasil ditambahkan');
                window.location = '../../pages/kategori/kategori.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Kategori gagal ditambahkan');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>