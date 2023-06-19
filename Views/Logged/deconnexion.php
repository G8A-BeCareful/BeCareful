<?php
// Détruire les anciennes données de session
session_unset();
session_destroy();
header('Location: ../Unlogged//index.php');
exit;
?>