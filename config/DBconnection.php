<?php
    define('hostname', 'localhost');
    define('username', 'root');
    define('password', '');
    define('database', 'php_db');
    // define('hostname', 'sql12.freesqldatabase.com');
    // define('username', 'sql12576668');
    // define('password', 'cXV93jBiNV');
    // define('database', 'sql12576668');

    $mysqli = new mysqli(hostname, username, password, database);

    if($mysqli->error){
        die('Connection error' . $connect->error);
    }else{
        // echo '<p style="background-color: lime">connected</p>';
        // echo '<script>alert("connected")</script>';
    }
?>