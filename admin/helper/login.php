<?php

if(isset($_POST['submit'])){

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $pass = md5($pass);
    $admin = $mysqli->query("SELECT * from users WHERE first_name='admin' AND id=1");
    $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
            
    if($admin[0]['email'] == $email AND $admin[0]['password'] == $pass){
        // $user_data = $result->fetch_assoc();
        $_SESSION['admin'] = $admin[0]['id'];
        header('Location: index.php?page=home');
        echo "correct";
    }
}
?>

<style>
    <?php include './css/index.css' ?>
</style>