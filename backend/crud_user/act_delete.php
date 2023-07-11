<?php 
try {
    require_once('../lib/conn_db.php');

    $id = $_GET['user'];

    $query = "DELETE FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
            <script>
                alert('Data user berhasil dihapus');
                window.location = '../../pages/users/users.php';
            </script>        
        ";
    } else {
        echo "
            <script>
                alert('Data user gagal dihapus');
                history.go(-1);
            </script>        
        ";
    }
} catch (\Throwable $error) {
    echo $error;
}
?>