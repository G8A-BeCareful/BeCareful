<?php
function executeSqlFile(){
  $req = file_get_contents("BDD/DBSite.sql");
  $array = explode(PHP_EOL, $req);
  foreach ($array as $sql) {
      if ($sql != '') {
          Sql($sql);
      }
  }
}
?>