<?php
    $vkey = filter_input(INPUT_GET, 'vkey', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

    $legit_vkey = $mysqli->query("SELECT vkey FROM users WHERE email='$email'");
    $legit_vkey = mysqli_fetch_row($legit_vkey);
    
    if($vkey == $legit_vkey[0]){
        if(isset($_POST['submit'])){
            $message = NULL;
            $pass = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
            $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
            
            if($pass != $pass2){
                $message = "<p class='err-msg error'>Password do not match.</p>";
            }elseif(strlen($pass) < 6){
                $message = "<p class='err-msg error'>Password is too short.</p>";
            }elseif(strlen($pass) > 50){
                $message = "<p class='err-msg error'>Password is too long.</p>";
            }else{
                $encrypt_pass = md5($pass);
                $change_pass = $mysqli->query("UPDATE users SET password = '$encrypt_pass' WHERE email='$email'");
                $message = "<p class='err-msg success'>Your password has been changed successfully. Use your new password to <a href='index.php?page=login'>login</a></p>";
            }
        }
    }else{
        header('Location: index.php');
    }