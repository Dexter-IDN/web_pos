<?php
try {
    require_once('../lib/conn_db.php');

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = openssl_encrypt($_POST['password'], 'AES-128-CBC', '');

    $query = "INSERT INTO users(username, password, nama_lengkap, role) VALUES('$username', '$password', '$nama', 'kasir')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('User berhasil ditambahkan');
                window.location = '../../pages/users/users.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('User gagal ditambahkan');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>