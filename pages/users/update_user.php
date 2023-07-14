<?php 
    require_once('../../backend/lib/conn_db.php');

    session_start();

    if (!isset($_SESSION['login']) && !$_SESSION['login']) {
        header('location: ../../index.php');
        exit;
    }

    if ($_SESSION['role'] != 'admin') {
        echo "
            <script>
                alert('Anda tidak punya akses untuk ini');
                window.location = '../kasir/kasir.php';
            </script>
        ";
    }

    $id = $_GET['user'];

    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <form action="../../backend/crud_user/act_update.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <label for="">Nama Lengkap: </label><input type="text" name="nama" value="<?= $data['nama_lengkap'] ?>">
        <br><br>
        <label for="">Username: </label><input type="text" name="username" value="<?= $data['username'] ?>">
        <br><br>
        <label for="">Password: </label><input type="password" name="password" value="<?= openssl_decrypt($data['password'], 'AES-128-CBC', ''); ?>">
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>