<?php
    $user = NULL;

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $qry = $mysqli->query("SELECT * from users WHERE id='$user_id'");
        $user = $qry->fetch_assoc();
        // print_r($user);
    }else{
        $user = NULL;
    }
?>