<?php
    //send mail 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    $message;
    
    if(isset($_POST['submit'])){
        $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
        $email_exist = $mysqli->query("SELECT email FROM users WHERE email='$email'");

        if($email_exist->num_rows != 0){
            $vkey = md5(time().$email);
            $mysqli->query("UPDATE users SET vkey = '$vkey' WHERE email='$email'");

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
            $mail->Subject = 'Password Reset';
            //email body 
            $mail->Body = "<div>
            <h1>Password Reset</h1>
            <p>If you've lost your password or wish to reset it, use the link below to get started</p>
            <a href='https://online-food-ordering-system-v3.000webhostapp.com/index.php?page=recovery&email=$email&vkey=$vkey' style='width: 100%; max-width: 10rem; padding: .8rem 1rem; background-color: #2DA544; text-decoration: none; color: white; display: flex; justify-content: center; align-items: center;'>Reset Your Password</a>
            <p>If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password</p>
        </div>";
            //send email
            $mail->send();
            $message = "<p class='err-msg'>We sent an email to <span>$email</span> to reset your password</p>";
        }else{
            $message = "<p class='err-msg error'>We didn't recognize that email. Please try again.</p>";
        }
    }
