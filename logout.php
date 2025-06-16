<?php
    // session_destroy();
    $id = $_SESSION["user_id"];

    $mysqli->query("UPDATE users SET status='offline' WHERE id='$id'");
    unset($_SESSION["user_id"]);
    header('Location: index.php?page=login');
?>