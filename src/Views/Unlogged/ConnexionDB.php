<?php
$username = 'root';
$password = '';

   try {
    $conn = new PDO("mysql:host=localhost;dbname=DBSite", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8',65536));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    //erreurs ?
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
?>