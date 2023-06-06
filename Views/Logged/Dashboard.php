<?php
session_start();


if(isset($_SESSION['user_id']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
    
    $user_id = $_SESSION['user_id'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

  
} else {
    // Rediriger l'utilisateur s'il n'est pas connecté
    header("Location: ../Unlogged/connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <script>
      function generateRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      function updateRandomNumbers() {
        var bpmElement = document.getElementById("bpm");
        var humElement = document.getElementById("hum");
        var dbElement = document.getElementById("db");
        var co2Element = document.getElementById("co2");
        var tempElement = document.getElementById("temp");
        var tempsElement = document.getElementById("temps");

        var bpm = generateRandomNumber(50, 150);
        var hum = generateRandomNumber(40, 60);
        var db = generateRandomNumber(0, 80);
        var co2 = generateRandomNumber(200, 1000);
        var temp = generateRandomNumber(0, 28);
        var temps = generateRandomNumber(1, 59);

        bpmElement.innerHTML = bpm + " BPM";
        humElement.innerHTML = hum + " %";
        dbElement.innerHTML = db + " dB";
        co2Element.innerHTML = co2;
        tempElement.innerHTML = temp + "°C";
        tempsElement.innerHTML = temps;
      }

      setInterval(updateRandomNumbers, 2000);
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="../../Style/Dashboard.css" />
    <link rel="stylesheet" type="text/css" href="/Style/Footer.css" />

    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="../../Style/Connected.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&family=Nunito:wght@500&display=swap");
    </style>
  </head>
  <body>
    <div class="container">
      <div class="column1">
        <div class="title">
          <img src="/img/Logo-becareful.png" alt="Logo" />
          <h1 class="titre1">BeCareful</h1>
        </div>
        <div>
          <h5 class="menuP">Menu Principal</h5>
          <div class="row_menu">
            <a class="row_menu" href="/Views/Logged/Dashboard.php"
              ><svg
                class="iconsMenu"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
              </svg>
              <h3>Tableau de Bord</h3></a
            >
          </div>
          <div class="row_menu">
            <a class="row_menu" href= "/Views/Logged/Statistiques.php"
              ><svg
                class="iconsMenu"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
              </svg>
              <h3>Statistiques</h3></a
            >
          </div>
          <div class="row_menu">
            <a class="row_menu" href="/Views/Logged/Settings.php"
              ><svg
                class="iconsMenu"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <h3>Paramètres</h3></a
            >
          </div>
          <div class="row_menu">
            <a class="row_menu" href="/Views/Logged/AdminFAQ.html"
              ><svg xmlns="http://www.w3.org/2000/svg" fill="none" 
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
              class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" 
  d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 
  0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
</svg>

              <h3>Administrateur</h3></a
            >
          </div>
        </div>
        <div class="disconnect">
          <a class="disconnect" href="/index.php"
            ><svg
              class="iconsMenu"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            <h3 href="/Views/Logged/deconnexion.php">Se déconnecter</h3></a
          >
        </div>
      </div>
      <div class="column2">
        <div class="section_haut">
          <div class="bonjourDate">
            <h2 class="bonjour">Bonjour <?php echo $prenom . ' ' . $nom; ?></h2>
            <h5>Jeudi 27 Avril 2023</h5>
          </div>
          <div class="profilButton">
            <a class="profile_menu" href="/Views/Logged/ModifProfil.php"
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
                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
              <h3>Mon Profil</h3></a
            >
          </div>
        </div>
        <div class="bgPage">
          <div class="boxInfo">
            <h4 class="TheTitle">Vos dernières mesures</h4>
            <div class="col_1">
              <div class="roww_1">
                <div class="boxType">
                  <img class="stpicture" src="/img/image16.png" alt="heart" />
                  <div class="boxMeasures">
                    <div class="dotRed"></div>
                    <h6 class="littleTitle">Fréquence cardiaque</h6>
                    <p class="commentaire" id="bpm">88 BPM</p>
                    <h6 class="littleTitle"></h6>
                  </div>
                </div>
                <div class="boxType">
                  <img class="stpicture" src="/img/image13.png" alt="eau" />
                  <div class="boxMeasures">
                    <div class="dotGreen"></div>
                    <h6 class="littleTitle">Humidité</h6>
                    <p class="commentaire" id="hum">52 %</p>
                    <h6 class="littleTitle"></h6>
                  </div>
                </div>
                <div class="boxType">
                  <img class="stpicture" src="/img/image15.png" alt="casque" />
                  <div class="boxMeasures">
                    <div class="dotOrange"></div>
                    <h6 class="littleTitle">Audio</h6>
                    <p class="commentaire" id="db">40 dB</p>
                    <h6 class="littleTitle"></h6>
                  </div>
                </div>
              </div>
              <div class="roww_2">
                <div class="boxType">
                  <img class="ndpicture" src="/img/image2.png" alt="cloud CO2" />
                  <div class="boxMeasures">
                    <div class="dotGreen"></div>
                    <h6 class="littleTitle">CO2</h6>
                    <p class="commentaire" id="co2">368</p>
                    <h6 class="commentaire">Particules par millions</h6>
                  </div>
                </div>
                <div class="boxType">
                  <img class="ndpicture" src="/img/image14.png" alt="thermomètre" />
                  <div class="boxMeasures">
                    <div class="dotGreen"></div>
                    <h6 class="littleTitle">Température</h6>
                    <p class="commentaire" id="temp">24°C</p>
                    <h6 class="littleTitle"></h6>
                  </div>
                </div>
                <div class="boxType">
                  <img class="ndpicture" src="/img/clock.png" alt="Horloge" />
                  <div class="boxMeasures">
                    <div class="dotGreen"></div>
                    <h6 class="littleTitle">Temps depuis dernières mesures</h6>
                    <p class="commentaire" id="temps">16</p>
                    <h6 class="commentaire">minutes</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="boxConseil">
            <h4 class="TheTitle">Conseils de la journée</h4>
            <div class="LesParaf">
              <div class="paraf1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <ul>
                  <li>Vous n'avez pas été soumis à beaucoup de CO2</li>
                  <li>La température ambiante est stable et accceptable</li>
                  <li>Le niveau d'humidité est dans la moyenne</li>
                </ul>
              </div>
              <div class="paraf2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <ul>
                  <li>
                    Pensez à calmer votre coeur en pratiquant des exercices de cohérence
                    cardiaque
                  </li>
                  <li>Essayez de rester plus souvent éloigné des lieux bruyants</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="footer">
        <div class="listFooter">
          <div class="BeCareful">
            <p class="title">BeCareful</p>
            <a class="link" href="/Views/Unlogged/APropos.html"><p>Qui sommes-nous ?</p></a>
            <p>Adresse : 10 Rue de Vanves,92130, Issy-les-Moulineaux</p>
            <p>Horaires : Du lundi au samedi de 9h à 18h</p>
            <a class="link" href="/Views/Unlogged/Notre_Produit.html"><p>Notre Produit</p></a>
          </div>
        </div>
        <div>
          <div class="BeCareful">
            <p class="title">Aide</p>
            <a class="link" href="/Views/Unlogged/FAQ.php"><p>FAQ</p></a>
            <p>© BeCareful 2023</p>
          </div>
        </div>
        <div class="BeCareful">
          <h3></h3>
          <div>
            <p class="title">Conditions D'utilisations</p>
            
                        <a class="link" href="/Views/Unlogged/Politique.html"><p>Politique de confidentialité</p>
</a>

<a class="link" href="/Views/Unlogged/CGU.html"><p>CGU</p></a>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
