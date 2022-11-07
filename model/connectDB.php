<?php
    $data_source_name = 'mysql:host=localhost;dbname=mock_data';
    $username = 'Jim';
    $password = 'Jimuel_092201';

    try {
         $db = new PDO($data_source_name, $username, $password);
         
    } catch (PDOException $err) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }