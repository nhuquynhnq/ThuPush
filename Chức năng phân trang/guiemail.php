<?php
ob_start();
include('cv.php');
$body = ob_get_contents();
ob_end_clean();

require("PHPMailer/PHPMailer/src/PHPMailer.php");
require("PHPMailer/PHPMailer/src/SMTP.php");
require("PHPMailer/PHPMailer/src/Exception.php");
$mail = new PHPMailer\PHPMailer\PHPMailer();

$email=$_GET['email'];
$message = file_get_contents('cv.php'); 
$mail->IsHTML(true);
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->Port = 587;
$mail->CharSet = "UTF-8";
$mail->Username = 'nhuquynh.nqq@gmail.com';
$mail->Password = 'nhuquynh';
$mail->setFrom('nhuquynh.nqq@gmail.com', 'nhuquynh');
$mail->Subject = 'Test sending mail';
//$mail->Body =;
$mail->Body = $body;
 $mail->addAddress($email, '');
$mail->AllowEmpty = true;
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    echo "<a href='index.php'>Trang chủ</a>"

}


?>