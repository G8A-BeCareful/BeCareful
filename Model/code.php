<?php
session_start();
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendemail($prenom, $nom, $email)
{
    $mail = new PHPMailer(true);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' =>false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug=0;
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    if($mail->SMTPAuth) {
        $mail->Host = 'smtp.gmail.com';
        $mail->UserName = 'hector.vizzavona@gmail.com';
        $mail->Password = 'mmsxsxsiqhuyhvzv';
    }

    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->From("hector.vizzavona@gmail.com");
    $mail->addAddress($email);

    $mail->isHTML(false);
    $mail->Subject = 'BeCareful - Inscritption';

    $mail->Body = "Salut" .$prenom.$nom. "merci de vous être inscrit sur BeCareful !
    Nous sommes très heureux de vous compter parmi nous !";
    $mail->send();
}

if(isset($_POST['register_btn']))
{
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    sendemail("$prenom", "$nom", "$email");
    echo "Email envoyé";
}


    // $check_email_query = "SELECT email FROM Users WHERE email = '$email' LIMIT 1";
    // $check_email_query_run = mysqli_query($con, $check_email_query);

    // if(mysqli_num_rows($check_email_query_run)>0)
    // {
    //     $_SESSION['status'] = "Email déjà utilisé.";
    //     $_SESSION['status_code'] = "error";
    //     header('Location: Inscription.php');
    // }
    // else
    // {
    //     $query = "INSERT INTO Users (firstname, lastname, email, mdp,verify_token) VALUES ('$prenom', '$nom', '$email', '$password','$verify_token')";
    //     $query_run = mysqli_query($con, $query);

    //     if($query_run)
    //     {
    //         sendemail_verify("$prenom", "$nom", "$email", "$verify_token");
    //         $_SESSION['status'] = "Votre compte a été créé avec succès ! Veuillez vérifier votre adresse e-mail.";
    //         $_SESSION['status_code'] = "success";
    //         header('Location: Inscription.php');
    //     }
    //     else
    //     {
    //         $_SESSION['status'] = "Erreur d'envoie de données. Veuillez réessayer ultérieurement.";
    //         $_SESSION['status_code'] = "error";
    //         header('Location: Inscription.php');
    //     }
    
        // if($email !== $confirmEmail)
        // {
        //     $_SESSION['status'] = "Les adresses e-mail ne correspondent pas.";
        //     $_SESSION['status_code'] = "error";
        //     header('Location: Inscription.php');
        // }
        // else
        // {
        //     if($password !== $confirmPassword)
        //     {
        //         $_SESSION['status'] = "Les mots de passe ne correspondent pas.";
        //         $_SESSION['status_code'] = "error";
        //         header('Location: Inscription.php');
        //     }

        // }
    

?>