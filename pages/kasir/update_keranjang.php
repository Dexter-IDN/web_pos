<?php 
    require_once('../../backend/lib/conn_db.php');

    $id = $_GET['id'];
    
    $query = "SELECT * FROM keranjang WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Keranjang</title>
</head>
<body>
    <form action="../../backend/crud_keranjang/act_update.php" method="get">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <label for="">Jumlah: </label><input type="number" name="jumlah" value="<?= $data['jumlah'] ?>">
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>