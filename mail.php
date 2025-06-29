<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sumitbhai9005@gmail.com';        // SMTP username
$mail->Password = 'ezfcovfuiravlhqh';                 // SMTP password (use App Password)
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('sumitbhai9005@gmail.com', 'Hospital Management System');
$mail->isHTML(false);                                 // Send plain text emails by default
?>
