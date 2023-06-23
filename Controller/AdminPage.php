<?php
session_start();


if(isset($_SESSION['user_id']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
    
    $user_id = $_SESSION['user_id'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $admin = $_SESSION['admin'];
  
} else {
    // Rediriger l'utilisateur s'il n'est pas connecté
    header("Location: Connexion.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['selected_user'])) {
    $selectedUserID = $_POST['selected_user'];
    if (isset($_POST['passer_admin'])) {
      
      $link = mysqli_connect("herogu.garageisep.com", "BnPO2R2pIX_be_careful", "SvfkmIOFz0hQLLac", "LndrbT9YkW_be_careful");

      if ($link === false) {
          die("ERROR: Could not connect. " . mysqli_connect_error());
          $message = "Erreur de connexion à la base de données.";
      }

      $updateQuery = "UPDATE Users SET administrator = 1 WHERE id = '$selectedUserID'";

      if (mysqli_query($link, $updateQuery)) {
          $message = "Utilisateur passé admin avec succès.";
      } else {
          $message = "Erreur lors de la mise à jour du statut admin.";
      }

      mysqli_close($link);

  } elseif (isset($_POST['supprimer'])) {

    $link = mysqli_connect("herogu.garageisep.com", "BnPO2R2pIX_be_careful", "SvfkmIOFz0hQLLac", "LndrbT9YkW_be_careful");

      if ($link === false) {
          die("ERROR: Could not connect. " . mysqli_connect_error());
          $message = "Erreur de connexion à la base de données.";
      }

      $DeleteQuery = "DELETE FROM Users WHERE id = '$selectedUserID'";

      if (mysqli_query($link, $DeleteQuery)) {
          $message = "Utilisateur supprimé avec succès.";
      } else {
          $message = "Erreur lors de la suppression de compte.";
      }

      mysqli_close($link);

  } else {
    $message = "Erreur inconnue.";
  }
  }
  else {
    $message = "Veuillez choisir un utilisateur.";
  }

}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <script>
      function uncheckOtherCheckboxes(checkbox) {
         var checkboxes = document.getElementsByName('selected_user');
         for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] !== checkbox) {
                checkboxes[i].checked = false;
            }
         }
      }

      function submitForm(action) {
        var form = document.getElementById('adminForm');

        var actionInput = document.createElement('input');
        actionInput.type = 'hidden';
        actionInput.name = (action === 'passer_admin') ? 'passer_admin' : 'supprimer';
        actionInput.value = 'true';

        form.appendChild(actionInput);

        form.submit();
      }
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Administrateur</title>
    <link rel="stylesheet" type="text/css" media="screen" href="/Vue/Style/AdminPage.css" />
    <link rel="stylesheet" type="text/css" href="/Vue/Style/Footer.css" />

    <link rel="stylesheet" type="text/css" media="screen" href="/Vue/Style/Settings.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Vue/Style/Connected.css" />
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
            <a class="row_menu" href="/Controller/Dashboard.php"
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
            <a class="row_menu" href="/Controller/Statistiques.php"
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
            <a class="row_menu" href="/controller/Settings.php"
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
            <a class="row_menu" href="/Controller/AdminFAQ.php"
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
            <h2 class="bonjour">
              Bonjour
              <?php echo $prenom . ' ' . $nom; ?>
            </h2>
            <h5>Mardi 20 Juin 2023</h5>
          </div>
          <div class="profilButton">
            <a class="profile_menu" href="/Controller/ModifProfil.php"
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
          <div class="columnAll">
            <div class="firstRow">
              <div>
                <img class="bank" src="/img/imeuble.png" alt="bank" />
              </div>
              <h1>Administrateur</h1>
            </div>
            <div class="buttonRow">
              <div class="buttonPlace">
                <a href="/Controller/AdminFAQ.php" class="button13">FAQ</a>
              </div>
              <div class="buttonPlace">
                <a href="/Controller/AdminPage.php" class="button13">Administration</a>
              </div>
            </div>
            <form id="adminForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="tableUsers">
                <?php
                  $link = mysqli_connect("herogu.garageisep.com", "BnPO2R2pIX_be_careful", "SvfkmIOFz0hQLLac", "LndrbT9YkW_be_careful"); 
                  // Check connection
                  if($link === false){
                      die("ERROR: Could not connect. " . mysqli_connect_error());
                      $erreur = "Erreur de connexion à la base de donnée.";
                  }
            
                  $checkQuery = "SELECT * FROM Users";
                  $result = mysqli_query($link, $checkQuery);

                  if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Select</th></tr>";
                  
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['lastname'] . "</td>";
                      echo "<td>" . $row['firstname'] . "</td>";
                      echo '<td><input type="checkbox" name="selected_user" value="' . $row['id'] . '" onclick="uncheckOtherCheckboxes(this)"></td>';
                      echo "</tr>";
                    }
                  
                    echo "</table>";
                  } else {
                    echo "Aucun utilisateur trouvé.";
                  }
                ?>
              </div>
            </form>
              <div class="buttonRow1">
                <div class="buttonPlace">
                  <a href="#" name="admin" class="button13" onclick="submitForm('passer_admin')" >Passer Admin</a>
                </div>
                <div class="buttonPlace">
                  <a href="#" name="supprimer" class="button12" onclick="submitForm('supprimer')" >Supprimer le compte</a>
                </div>
              </div>
            <?php if (isset($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
          </div>
        </div>
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
