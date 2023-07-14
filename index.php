<?php 
    session_start();

    // Jika sudah login sebelumnya, user tidak perlu login lagi dan langsung diarahkan ke kasir
    if (isset($_SESSION['login']) && $_SESSION['login']) {
        header('location: pages/kasir/kasir.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir</title>
</head>
<body>
    <h2>Login</h2>
    <form action="backend/auth/login.php" method="post">
        <label for="">Username: </label><input type="text" name="username">
        <br><br>
        <label for="">Password: </label><input type="password" name="password">
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>