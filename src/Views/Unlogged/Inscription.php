<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate form data (you can add more validation rules as needed)
    if (empty($prenom) || empty($nom) || empty($email) || empty($password)) {
        echo "Please fill in all the fields.";
    } else {
        // Perform registration logic with database operations
        
        // Connect to the database (replace with your database credentials)
        $servername = "localhost";
        $username_db = "your_username";
        $password_db = "your_password";
        $dbname = "your_database_name";
        
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare and execute the SQL statement to insert the user data
        $sql = "INSERT INTO users (prenom, nom, email, password) VALUES ('$prenom', '$nom', '$email', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close the database connection
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" type="text/css" href="../../Style/Inscription.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&family=Nunito:wght@500&display=swap");
    </style>
  </head>
  <body>
    <div class="content">
      <div class="mainBox">
        <div class="Logop">
          <div class="arrow">
            <a href="Page_Accueil.html"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15.75 19.5L8.25 12l7.5-7.5" /></svg
            ></a>
          </div>
        </div>
        <form>
          <div class="rowLogo">
            <img src="../../img/Logo-becareful.png" alt="Logo" class="imgLogo" />
            <h2 class="becareful">Becareful</h2>
          </div>
          <h1>Inscrivez vous !</h1>
          <div class="inputs">
            <label for="prenom"></label>
            <input type="text" name="prenom" placeholder="Prénom" />

            <label for="nom"></label>
            <input type="text" name="nom" placeholder="Nom" />

            <label for="email"></label>
            <input type="email" name="email" placeholder="Adresse e-mail" />

            <label for="confirmationEmail"></label> 
            <input type="email" name="confirmationEmail" placeholder="Confirmez l'adresse e-mail" />

            <label for="password"></label>
            <input type="password" name="password" placeholder="Mot de passe" />

            <label for="confirmPassword"></label>
            <input type="password" name="confirmPassword" placeholder="Confirmez le Mot de passe" />
          </div>
          <div class="boutonConnect">
            <a href="../Logged/Dashboard.html" class="seConnect">S'inscrire</a>
          </div>
          <p class="inscription">
            Vous avez déjâ un compte ?
            <a class="Inscris" href="Connexion.html"><span>Connectez-vous</span></a>
          </p>
        </form>
      </div>
      <div class="boxBlue">
        <p class="slogan">Au coeur de son aventure</p>
      </div>
    </div>
  </body>
</html>
