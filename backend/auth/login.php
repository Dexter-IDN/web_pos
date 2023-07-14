<?php 
try {
    require_once('../lib/conn_db.php');

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $checkUser = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
    $dataUser = mysqli_fetch_assoc($checkUser);

    if ($password == openssl_decrypt($dataUser['password'], 'AES-128-CBC', '')) {
        session_start();

        $_SESSION['login'] = true;
        $_SESSION['username'] = $dataUser['username'];
        $_SESSION['role'] = $dataUser['role'];

        echo "
            <script>
                alert('Selamat datang $dataUser[nama_lengkap]');
                window.location = '../../pages/kasir/kasir.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Username atau password salah');
                history.go(-1);
            </script>
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>