<?php

    $message = NULL;
    //send mail 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    if(isset($_POST["submit"])){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        $subj = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
        $msg = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        
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
        $mail->addAddress("devjim.emailservice@gmail.com");
    
        $mail->isHTML(true);
        //email subject
        $mail->Subject = $subj;
        //email body 
        $mail->Body = "<div><b>From:</b> $name<br><b>Email:</b> $email<br> <b>Contact:</b>$contact<br><b>City:</b>$city<br><b>Message:</b> $msg </div>";
        //send email
        $mail->send();

        $message = "Your message has been successfully sent.";
    }