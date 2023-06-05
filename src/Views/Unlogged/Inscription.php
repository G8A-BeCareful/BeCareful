<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $prenom = $_POST["prenom"];
  $nom = $_POST["nom"];
  $email = $_POST["email"];
  $userPassword = $_POST["password"];
  $confirmationEmail = $_POST["confirmationEmail"];
  $confirmPassword = $_POST["confirmPassword"];
  $uppercase = preg_match('@[A-Z]@', $userPassword);
  $lowercase = preg_match('@[a-z]@', $userPassword);
  $number    = preg_match('@[0-9]@', $userPassword);
  $specialChars = preg_match('@[^\w]@', $userPassword);
  if (empty($prenom) || empty($nom) || empty($email) || empty($userPassword)) {
    $erreur = "Veuillez remplir tous les champs.";
  } else if (!preg_match('/^[A-Za-zéèêëïîôöàäâùüûçñÉÈÊËÏÎÔÖÀÄÂÙÜÛÇÑ\s-]{2,}$/u', $prenom) || !preg_match('/^[A-Za-zéèêëïîôöàäâùüûçñÉÈÊËÏÎÔÖÀÄÂÙÜÛÇÑ\s-]{2,}$/u', $nom)) {
    $erreur = "Format de prénom ou de nom invalide.";
  } else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($userPassword) < 8) {
    $erreur = "Le mot de passe doit comporter au moins 8 caractères, inclure au moins une lettre majuscule, un chiffre et un caractère spécial.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreur = "Format d'email invalide.";
  } elseif ($email !== $confirmationEmail) {
    $erreur = "Les adresses e-mail ne correspondent pas.";
  } elseif ($userPassword !== $confirmPassword) {
    $erreur = "Les mots de passe ne correspondent pas.";
  } else {
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "", "dbsite");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        $erreur = "Erreur de connexion à la base de donnée.";
    }

    $checkQuery = "SELECT * FROM Users WHERE email = '$email'";
    $result = mysqli_query($link, $checkQuery);
    if (mysqli_num_rows($result) > 0) {
        $erreur = "Cet e-mail est déjà assigné à un utilisateur.";
    } else {
        // Attempt insert query execution
        $sql = "INSERT INTO Users (firstname, lastname, email, mdp) VALUES ('$prenom', '$nom', '$email', '$userPassword')";

        if(mysqli_query($link, $sql)){
            // Détruire les anciennes données de session
            session_unset();
            session_destroy();
            session_start();

            $query = "SELECT id, firstname, lastname FROM Users WHERE email = '$email'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            $idFromDB = $row['id'];
            $prenomFromDB = $row['firstname'];
            $nomFromDB = $row['lastname'];

            // Stocker les valeurs de prénom et de nom dans les variables de session
            $_SESSION['user_id'] = $idFromDB;
            $_SESSION['prenom'] = $prenomFromDB;
            $_SESSION['nom'] = $nomFromDB;
            header("Location: ../Logged/Dashboard.php");
            exit();
        } else{
            $erreur = "Erreur d'envoie de données. Veuillez réessayer ultérieurement.";
        }
 
    // Close connection
    mysqli_close($link);
    }
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" type="text/css" href="../../Style/Inscription.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&family=Nunito:wght@500&display=swap");
    </style>
</head>
<body>
<div class="content">
    <div class="mainBox">
        <div class="Logop">
            <div class="arrow">
                <a href="Page_Accueil.html"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                  stroke-width="1.5" stroke="currentColor"
                                                  class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                    </svg></a>
            </div>
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="rowLogo">
                <img src="../../img/Logo-becareful.png" alt="Logo" class="imgLogo"/>
                <h2 class="becareful">Becareful</h2>
            </div>
            <h1>Inscrivez-vous !</h1>
            <?php if (isset($erreur)): ?>
                <p style="color:red; text-align:center"><?php echo $erreur; ?></p>
            <?php endif; ?>
            <div class="inputs">
                <div class='input_spe'>
                    <label for="prenom"></label>
                    <input type="text" name="prenom" placeholder="Prénom"/>

                    <label for="nom"></label>
                    <input type="text" name="nom" placeholder="Nom"/>
                </div>
                <label for="email"></label>
                <input type="email" name="email" placeholder="Adresse e-mail"/>

                <label for="confirmationEmail"></label>
                <input type="email" name="confirmationEmail" placeholder="Confirmez l'adresse e-mail"/>

                <label for="password"></label>
                <input type="password" name="password" placeholder="Mot de passe"/>

                <label for="confirmPassword"></label>
                <input type="password" name="confirmPassword" placeholder="Confirmez le Mot de passe"/>
            </div>
            <div class="boutonConnect">
                <button type="submit" class="seConnect">S'inscrire</button>
            </div>
            <p class="inscription">
                Vous avez déjà un compte ?
                <a class="Inscris" href="Connexion.php"><span>Connectez-vous</span></a>
            </p>
        </form>
    </div>
    <div class="boxBlue">
        <p class="slogan">Au coeur de son aventure</p>
    </div>
</div>
</body>
</html>
