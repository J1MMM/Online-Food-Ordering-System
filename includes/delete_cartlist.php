<?php include '../config/DBconnection.php'?>

<?php
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $result = $mysqli->query("DELETE FROM cart_list WHERE id='$id' LIMIT 1");
        header('Location: ../index.php?page=cart-list');
    }
?>