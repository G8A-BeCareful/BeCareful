<?php
// Détruire les anciennes données de session
session_unset();
session_destroy();
header('Location: ../Unlogged/Page_Accueil.html');
exit;
?>