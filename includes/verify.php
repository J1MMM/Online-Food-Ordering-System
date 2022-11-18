<?php include '../config/DBconnection.php'?>

<?php
if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];
    //select user that match vkey
    $check_acc = $mysqli->query("SELECT verified from users WHERE vkey='$vkey' AND verified='0'");
    //check if account is exist
    if($check_acc->num_rows == 1){
        $update = $mysqli->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey'");
        if($update){
            header('Location: ../index.php?page=success');
        }else{
            echo $mysqli->error;
        }
    }else{
        die("This account is invalid or already verified");
    }
}else{
    header('Location: index.php?page=error-page');
}
?>