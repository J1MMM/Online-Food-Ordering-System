<!-- auto scroll  -->
<script>
    <?php include 'js/scroll.js'?>
</script>

<!-- php functions  -->
<?php
    //send mail 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    
    $reg_err_msg = NULL;

    if(isset($_POST['submit'])){

        //SANITIZE INPUTS
        $fname = ucfirst(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING));
        $lname = ucfirst(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING));
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
        $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);

        //check if email already exists
        $duplicate_email = $mysqli->query("SELECT id FROM users WHERE email= '$email'");
        // print_r($duplicate_email->num_rows);
        //validation
        if(strlen($fname) < 5 || strlen($lname) < 5){
            $reg_err_msg = 'Firstname and Lastname must be atleast 5 characters.';
        }elseif(strlen($fname) > 50 || strlen($lname) > 50){
            $reg_err_msg = 'Firstname and Lastname must be maximum 50 characters.';
        }elseif($pass != $pass2){
            $reg_err_msg = 'Password do not match.';
        }elseif(strlen($pass) < 6){
            $reg_err_msg = 'Password is too short.';
        }elseif(strlen($pass) > 50){
            $reg_err_msg = 'Password is too long.';
        }elseif(!$duplicate_email->num_rows == 0){
            $reg_err_msg = 'An account with Email <span>'.$email.'</span> already exists.';
        }else{
            //if passed from validation
            //Generate vkey
            $vkey = md5(time().$fname);
            // $vkey = '123';
            //Encrypt password
            $encrypt_pass = md5($pass);
            //query for inserting
            $insert = $mysqli->query("INSERT INTO users (first_name, last_name, email, password, vkey) 
            VALUES ('$fname','$lname','$email','$encrypt_pass','$vkey')");
            //check if inserting has been success
            if($insert){
                //send mail for verification
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                //sender acc
                $mail->Username = 'devjim.emailservice@gmail.com';
                $mail->Password = 'baytmkwswgethqkf';
                //code from stackoverflow to fix the ewan issue
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                //from:
                $mail->setFrom('devjim.emailservice@gmail.com');
                // send to:
                $mail->addAddress($email);
            
                $mail->isHTML(true);
                //email subject
                $mail->Subject = 'Email Verification';
                //email body 
                $mail->Body = "<div>
                <h1>Verify your email address</h1>
                <p>Please confirm that you want to use this as <b>Online Food Ordering System</b> account email address!</p>
                <a href='https://online-food-ordering-system-v3.000webhostapp.com/includes/verify.php?vkey=$vkey' style='width: 100%; max-width: 8rem; padding: .8rem 1rem; background-color: #2DA544; text-decoration: none; color: white; display: flex; justify-content: center; align-items: center;'>Verify my account</a>
            </div>";
                //send email
                $mail->send();
                header('Location: index.php?page=verify&email='.$email);
            }else{
                echo "Failure sending mail";
            }
        }
    
}
?>
<!-- style  -->
<style>
    <?php include './css/register_form.css'?>
</style>