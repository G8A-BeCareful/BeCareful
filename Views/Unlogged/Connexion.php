<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $valider = $_POST["valider"];
  $erreur = "";

  if (empty($email) || empty($pass)) {
      $erreur = "Veuillez remplir tous les champs.";
    } else if (isset($valider)){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "dbsite";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          $erreur = "Erreur de connexion à la base de donnée.";
      }

      $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND mdp=? LIMIT 1");
      $stmt->bind_param("ss", $email, $pass);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows == 1) {

        // Détruire les anciennes données de session
        session_unset();
        session_destroy();
        session_start();

        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $prenom = $row['firstname'];
        $nom = $row['lastname'];
        
    
        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        header("Location: ../Logged/Dashboard.php");
        $stmt->close();
        $conn->close();
        exit();
      } else {
          $erreur = "Mauvais email ou mot de passe!";
      }

      $stmt->close();
      $conn->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" type="text/css" href="/Style/Connexion.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&family=Nunito:wght@500&display=swap");
    </style>
</head>
<body>
<div class="content">
    <div class="mainBox">
        <div class="Logop">
            <div class="arrow">
                <a href="/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                    </svg>
                </a>
            </div>
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="Logop">
                <div class="Logoi">
                    <img src="/img/Logo-becareful.png" alt="Logo"/>
                </div>
                <div class="Logoc">
                    <h2 class="becareful">Becareful</h2>
                </div>
            </div>
            <h1>Connectez-vous !</h1>
            <?php if (isset($erreur)): ?>
                <p class="erreur"><?php echo $erreur; ?></p>
            <?php endif; ?>
            <div class="inputs">
                <label for="email"></label>
                <input type="text" name="email" placeholder="Nom d'utilisateur"/>
                <div>
                    <a class="Inscris" href="/Views/Unlogged/MdpOublie.html">
                        <p class="forgot"><span>Mot de passe oublié ?</span></p>
                    </a>
                </div>
                <label for="pass"></label>
                <input type="password" name="pass" placeholder="Mot de passe"/>
            </div>
            <div class="boutonConnect">
                <input class="seConnect" type="submit" name="valider" value="Se Connecter"/>
            </div>
            <p class="inscription">
                Vous n'avez pas encore de compte ?
                <a class="Inscris" href="/Views/Unlogged/Inscription.php"><span>Inscrivez-vous</span></a>
            </p>
        </form>
    </div>
    <div class="boxBlue">
        <p class="slogan">Au coeur de son aventure</p>
    </div>
</div>
</body>
</html>
