<?php
    define('hostname', 'localhost');
    define('username', 'Jim');
    define('password', 'Jimuel_092201');
    define('database', 'php_db');

    $mysqli = new mysqli(hostname, username, password, database);

    if($mysqli->error){
        die('Connection error' . $connect->error);
    }else{
        // echo '<p style="background-color: lime">connected</p>';
        // echo '<script>alert("connected")</script>';
    }
?>