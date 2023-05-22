  <?php
  $username = 'root';
  $password = '';

try {
  $conn = new PDO("mysql:host=localhost", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8',65536));
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  //SQL
  require_once('exec.php');
  $conn=executeSqlFile();


  //erreurs ?
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>