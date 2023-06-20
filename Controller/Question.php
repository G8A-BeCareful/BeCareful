<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer la question posée par l'utilisateur
    $question = $_POST["question"];

    // Envoyer un e-mail à l'administrateur avec la question
    $to = "adresse_administrateur@example.com";
    $subject = "Nouvelle question de la FAQ";
    $message = "Question : " . $question;
    $headers = "From: adresse_email_utilisateur@example.com\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "Merci pour votre question ! Elle a été envoyée à l'administrateur pour examen.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de votre question. Veuillez réessayer.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>FAQ</title>
</head>
<body>
    <h1>FAQ</h1>

    <form method="POST">
        <label for="question">Posez votre question :</label><br>
        <textarea id="question" name="question" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>