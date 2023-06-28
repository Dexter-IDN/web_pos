<?php
    require_once('../../backend/lib/conn_db.php');

    $kategori = $_GET['kategori'];

    $query = "SELECT * FROM kategori WHERE id_kategori='$kategori'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kategori</title>
</head>

<body>
    <form action="../../backend/crud_kategori/act_update.php" method="get">
        <input type="hidden" name="id_kategori" value="<?= $data['id_kategori'] ?>">
        <label>Nama Kategori: </label><input type="text" name="kategori" value="<?= $data['nama_kategori'] ?>">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>