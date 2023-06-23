<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $question = $_POST["question"];
  if (empty($question)) {
    $erreur = "Please fill in all the fields.";
  } else {
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "", "dbsite");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
 
    // Attempt insert query execution
    $sql = "INSERT INTO faq (question) VALUES ('$question')";

    if(mysqli_query($link, $sql)){
      $message = "Votre question a bien été envoyée.";
        
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
 
    // Close connection
    mysqli_close($link);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FAQ</title>
    <link rel="stylesheet" type="text/css" href="/Vue/Style/Header.css" />
       <link rel="stylesheet" type="text/css" href="/Vue/Style/Footer.css" />


    <link href="/Vue/Style/FAQ.css" type="text/css" rel="stylesheet" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&family=Nunito:wght@500&display=swap");
    </style>
  </head>
  <body>
     <header>
      <div class="header">
        <div class="logo">
          <a href="/index.php" class="logo">
            <img src="/img/Logo-becareful.png" alt="Logo" class="logoImg" />
            BeCareful
          </a>
        </div>
        <label for="toggle" class="menuderoulant">☰</label>
        <input type="checkbox" id="toggle" />
        <div class="navbar">
          <a href="/index.php" class="nav">Accueil</a>
          <a href="/Vue/Notre_Produit.html" class="nav">Notre Produit</a>
          <a href="/Vue/APropos.html" class="nav">À Propos</a>
          <a href="/Vue/ContactezNous.html" class="nav">Nous Contacter</a>
        </div>
        <div class="header-right">
          <a href="/Controller/Inscription.php" class="nav">S'Inscrire</a>
          <div class="buttonPlace">
            <a href="/Controller/Connexion.php" class="button">Se Connecter</a>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <h1 class="titleMain">FAQ</h1>
      <details>
        <summary>Quel type de chargeur est nécessaire ?</summary>
        <div>Notre montre est rechargeable à l'aide d'un chargeur à induction</div>
      </details>
      <details>
        <summary>Notre produit est-il résistant aux chocs ?</summary>
        <div>
          Afin d’assurer que les enfants portant notre montre puisse la garder le plus
          longtemps possible. Elle a été fabriqué dans des matériaux la préservant
          longtemps, de plus ces matériaux sont également éco-responsable.
        </div>
      </details>
      <details>
        <summary>Que se passe-t-il en cas de perte ?</summary>
        <div>
          En cas de perte, nous sommes en mesure de vous aider à localiser votre montre
          perdue afin de la retrouver
        </div>
      </details>
      <h2 class="titleMain">Une question ? Contactez-nous !</h2>
      <div class="forms">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <label for="Objet"></label>
          <textarea class="input-container1" name="question" placeholder="Votre question ici..."></textarea>
          <?php if (isset($message)): ?>
            <p class="confirmation"><?php echo $message; ?></p>
          <?php endif; ?>
          <div class="buttonWhere">
           <a href="#" onclick="document.querySelector('form').submit();" class="button25">Envoyer</a>
          </div>
       </form>
      </div>
    </div>
    <!-- <div class="contain">
      <div class="titile">
        <h1>FAQ</h1>
      </div>
      <div class="quests">
        <h2>Questions fréquemment posées</h2>
        <br />

        <nav>
          <ul>
            <li class="deroulant">
              Quel type de chargeur est nécessaire pour recharger l'appareil ?
              <ul class="sous">
                <li>Un chargeur usb android est requis</li>
              </ul>
            </li>
          </ul>

          <br />
          <ul>
            <li class="deroulant">
              Notre produit est il résistant aux chocs ?
              <ul class="sous">
                <li>
                  Afin d'assurer que les enfants portant notre montre puisse la garder le
                  plus longtemps possible, notre montre a été fabriquée dans des matériaux
                  la préservant le plus longtemps possible. Ces matériaux sont également
                  éco-responsables
                </li>
              </ul>
            </li>
          </ul>

          <br />
          <ul>
            <li class="deroulant">
              Comment cela se passe en cas de perte de la montre ?
              <ul class="sous">
                <li>
                  Après nous avoir contacté, nous vous mettrons rapidement un nouvel
                  appareil à disposition
                </li>
              </ul>
            </li>
          </ul>
          <br />
        </nav>
      </div>

      <div class="form">
        <form method="get" action="">
          <h2>
            <label for="question">
              Vous avez une question spécifique à nous poser ? </label
            ><br />
            <textarea
              name="question"
              placeholder="Votre question"
              id="question"></textarea>
          </h2>
        </form>
        <button>
          Envoyer
          input type="submit" value="Envoyer"-->
    <!-- </button>
        <br />
      </div>
    </div>  -->
<footer>
      <div class="footer">
        <div class="listFooter">
          <div class="BeCareful">
            <p class="title">BeCareful</p>
            <a class="link" href="/Vue/APropos.html"><p>Qui sommes-nous ?</p></a>
            <p>Adresse : 10 Rue de Vanves,92130, Issy-les-Moulineaux</p>
            <p>Horaires : Du lundi au samedi de 9h à 18h</p>
            <a class="link" href="/Vue/Notre_Produit.html"><p>Notre Produit</p></a>
          </div>
        </div>
        <div>
          <div class="BeCareful">
            <p class="title">Aide</p>
            <a class="link" href="/Controller/FAQ.php"><p>FAQ</p></a>
            <p>© BeCareful 2023</p>
          </div>
        </div>
        <div class="BeCareful">
          <h3></h3>
          <div>
            <p class="title">Conditions D'utilisations</p>
            
                        <a class="link" href="/Vue/Politique.html"><p>Politique de confidentialité</p>
</a>

<a class="link" href="/Vue/CGU.html"><p>CGU</p></a>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
