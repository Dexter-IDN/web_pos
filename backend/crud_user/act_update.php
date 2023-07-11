<?php 
try {
    require_once('../lib/conn_db.php');

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = openssl_encrypt($_POST['password'], 'AES-128-CBC', '');

    $query = "UPDATE users SET username='$username', password='$password', nama_lengkap='$nama' WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Data user berhasil diubah');
                window.location = '../../pages/users/users.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Data user gagal diubah');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>