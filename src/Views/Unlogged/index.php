<?php
require 'mailer.php';

$host = 'your_database_host';
$dbname = 'your_database_name';
$username = 'your_database_username';
$password = 'your_database_password';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("SELECT email, name FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        $recipientEmail = $user['email'];
        $recipientName = $user['name'];

        sendConfirmationEmail($recipientEmail, $recipientName);

        sendPasswordResetEmail($recipientEmail, 'https://example.com/reset-password');
    }

    $dbh = null;
} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}
?>
