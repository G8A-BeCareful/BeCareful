<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexionDB.php");
      $sel=$pdo->prepare("select * from Users where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         // Link sur html i don't fucking know bro
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>