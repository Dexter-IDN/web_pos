<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
</head>
<body>
    <form action="../../backend/crud_user/act_create.php" method="post">
        <label for="">Nama Lengkap: </label><input type="text" name="nama">
        <br><br>
        <label for="">Username: </label><input type="text" name="username">
        <br><br>
        <label for="">Password: </label><input type="password" name="password">
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>