<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jimuelbaraero@gmail.com';
    $mail->Password = 'bipcnpidiedbhixp';
    $mail->SMTPSecure = 'ssl';

    $mail->setFrom('jimuelbaraero@gmail.com');

    $mail->addAddress('jimuelbaraero@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = 'sample subject';
    $mail->Body = 'sample body';
    
    $mail->send();

    echo "<script>alert('email sent')</script>";
}
?>