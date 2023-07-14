<?php 
try {
    session_start();

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: ../../index.php');
        exit;
    }
} catch (\Throwable $error) {
    echo $error;
}
?>