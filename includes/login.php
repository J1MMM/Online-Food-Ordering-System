<!-- php function  -->
<?php

    $err_msg = NULL;
    // $err_msg = "incorrect email address or password";

    if(isset($_POST['submit'])){

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
        $pass = md5($pass);
        $result = $mysqli->query("SELECT * from users WHERE email='$email' AND password='$pass'");
        // print_r($find_acc);
        
        if($result->num_rows != 0){
            $user_data = $result->fetch_assoc();
            $verified = $user_data['verified'];
            $email = $user_data['email'];

            $date = $user_data['created_at'];
            $date = strtotime($date);
            $date = date('M-d-Y', $date);
            if($verified == 1){
                $result = $mysqli->query("UPDATE users SET status='online' WHERE email='$email' AND password='$pass'");
                $_SESSION['user_id'] = $user_data['id'];
                // print_r($_SESSION['user_id']);
                header('Location: index.php?login=success#menu-section');
            }else{
                $err_msg = "This account is not verified. An email was sent to <span>$email</span> on <span>$date</span>";
            }

        }else{
            $err_msg = "incorrect email address or password";
        }

    }
?>
<!-- js auto scroll -->
<script>
    <?php include './js/scroll.js'?>
</script>
<!-- css style  -->
<style>
    <?php include './css/login_form.css'?>
</style>
