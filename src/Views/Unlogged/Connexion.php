<?php
  $username = 'root';
  $password = '';

try {
  $conn = new PDO("mysql:host=localhost", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8',65536));
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  //SQL
  require_once('exec.php');
  $conn=executeSqlFile();


  //erreurs ?
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>

<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("ConnexionDB.php");
      $sel=$pdo->prepare("select * from Users where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         header("Location: src\Views\Logged\Dashboard.html");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" type="text/css" href="../../Style/Connexion.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&family=Nunito:wght@500&display=swap");
    </style>
  </head>
  <body>
    <div class="content">
      <div class="mainBox">
        <form>
          <div class="Logop">
            <div class="arrow"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
             </div>    
            <div class="Logoi"><img src="../../img/Logo-becareful.png" alt="Logo" /></div>
            <div class="Logoc"><h2 class="becareful">Becareful</h2></div>
          </div>
          <h1>Connectez-vous !</h1>
          <div class="inputs">
            <label for="email"></label>
            <input type="email" name="email" placeholder="Adresse e-mail" />
            <div align="right">
              <p class="forgot"><span>Mot de passe oublié ?</span></p>
            </div>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Mot de passe" />
          </div>
          <div align="left">
            <button type="submit">Se connecter</button>
          </div>
          <p class="inscription">
            Vous n'avez pas encore de compte ? <span>Inscrivez-vous</span>
          </p>
        </form>
      </div>
      <div class="boxBlue">
        <p class="slogan">Au coeur de son aventure</p>
      </div>
    </div>
  </body>
</html>