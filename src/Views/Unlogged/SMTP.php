<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'your_smtp_host'; // SMTP server address
$mail->Port = 587; // SMTP port number (typically 587 or 465 for SSL/TLS)
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'your_smtp_username'; // SMTP username
$mail->Password ='your_smtp_password'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable encryption, 'tls' or 'ssl' (optional)

// Sender and recipient
$mail->setFrom('sender@example.com', 'Your Name'); // Sender's email address and name
$mail->addAddress('recipient@example.com', 'Recipient Name'); // Recipient's email address and name

// Email content
$mail->Subject = 'Test Email';
$mail->Body = 'This is a test email sent using PHPMailer.';

// Send the email
if ($mail->send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Error: ' . $mail->ErrorInfo;
}
?>
