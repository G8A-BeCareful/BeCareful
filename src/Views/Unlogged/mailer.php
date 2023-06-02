<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendConfirmationEmail($recipientEmail, $recipientName) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'your_smtp_host';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'your_smtp_username';
    $mail->Password = 'your_smtp_password';
    $mail->SMTPSecure = 'tls';

    $mail->setFrom('sender@example.com', 'Your Name');
    $mail->addAddress($recipientEmail, $recipientName);

    $mail->Subject = 'Confirmation Email';
    $mail->Body = 'Thank you for registering. Your account has been confirmed.';

    if ($mail->send()) {
        echo 'Confirmation email sent to ' . $recipientEmail . ' successfully.';
    } else {
        echo 'Error sending confirmation email to ' . $recipientEmail . ': ' . $mail->ErrorInfo;
    }
}

function sendPasswordResetEmail($recipientEmail, $resetLink) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'your_smtp_host';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'your_smtp_username';
    $mail->Password = 'your_smtp_password';
    $mail->SMTPSecure = 'tls';

    $mail->setFrom('sender@example.com', 'Your Name');
    $mail->addAddress($recipientEmail);

    $mail->Subject = 'Password Reset';
    $mail->Body = 'Click the link below to reset your password: ' . $resetLink;

    if ($mail->send()) {
        echo 'Password reset email sent to ' . $recipientEmail . ' successfully.';
    } else {
        echo 'Error sending password reset email to ' . $recipientEmail . ': ' . $mail->ErrorInfo;
    }
}
?>
