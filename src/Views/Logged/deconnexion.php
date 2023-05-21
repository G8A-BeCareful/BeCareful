<?php
session_start();
session_destroy();
header('Location: ../Unlogged/Page_Accueil.html');
exit;
?>