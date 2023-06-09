<?php
//require 'mailer.php';
session_start();
$servername = "herogu.garageisep.com";
$username = "BnPO2R2pIX_be_careful"; // Remplacez par votre nom d'utilisateur de la base de données
$password = "SvfkmIOFz0hQLLac"; // Remplacez par votre mot de passe de la base de données
$dbname = "LndrbT9YkW_be_careful";


// try {
//     $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $stmt = $dbh->prepare("SELECT email, name FROM users");
//     $stmt->execute();
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     foreach ($users as $user) {
//         $recipientEmail = $user['email'];
//         $recipientName = $user['name'];

//         sendConfirmationEmail($recipientEmail, $recipientName);

//         sendPasswordResetEmail($recipientEmail, 'https://example.com/reset-password');
//     }

//     $dbh = null;
// } catch (PDOException $e) {
//     echo 'Database connection failed: ' . $e->getMessage();
// }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Page d'accueil</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="/Vue/Style/Footer.css" />
    <link rel="stylesheet" href="/Vue/Style/Accueil.css" />
    <link rel="stylesheet" type="text/css" href="/Vue/Style/Header.css" />
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
    <div class="partie1">
      <img class="image1" src="/img/huawei 1.png" alt="image d'accueil" />
      <p class="paragraphe1">La solution pour garder votre enfant en bonne santé</p>
    </div>
    <div class="partie2">
      <img
        class="image2"
        src="/img/35740-original-1638207320-q49J-column-width-inline-removebg_2.png"
        alt="image d'une montre" />
      <div class="colonne1">
        <p class="paragraphe2">
          La montre Healfy permet d’assurer le bien-être de votre enfant tout au long de
          la journée.
        </p>
        <a href="/Vue/Notre_Produit.html"><button class="button1">En Savoir Plus</button></a>
      </div>
    </div>
    <div class="partie3">
      <img class="image3" src="/img/9813-1.png" alt="image d'équipe" />
      <div class="colonne2">
        <p class="paragraphe3">Découvrez notre équipe !</p>
        <a href="/Vue/APropos.html"><button class="button2">Nous Découvrir</button></a>
      </div>
    </div>
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

