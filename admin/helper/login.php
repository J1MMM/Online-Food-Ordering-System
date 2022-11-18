<?php

if(isset($_POST['submit'])){

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $result = $mysqli->query("SELECT * from users WHERE email='$email' AND password='$pass'");
    
    if($result->num_rows != 0){
        $user_data = $result->fetch_assoc();
        $_SESSION['admin'] = $user_data['id'];
        header('Location: index.php?page=home');
    }
}
?>

<style>
    <?php include './css/index.css' ?>
</style>