<?php
//Mettre id="BPM", id="CO2", id="HUM", id="TEMP", id="DB" dans les div commentaire avant chaque valeur (<p class="commentaire" id="BPM"> BPM</p><a class="commentaire"> BPM</a> au lieu de <p class="commentaire">52 BPM</p>)

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbsite";

// Création d'une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Définition des requêtes dans un tableau
$queries = array(
    "Bpm" => "SELECT Valeur FROM bpm",
    "Co2" => "SELECT Valeur FROM co2",
    "Hum" => "SELECT Valeur FROM humidity",
    "Temp" => "SELECT Valeur FROM temperature",
    "Db" => "SELECT Valeur FROM noise"
);

$data = array();

// Exécution des requêtes et récupération des données
foreach ($queries as $key => $query) {
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $value = $row['Valeur'];
            $data[$key][] = array($key => $value);
        }
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<script>
// Génère un nombre aléatoire entre 0 et 4
function getRandomNumber() {
  return Math.floor(Math.random() * 5);
}
var randomNumber = getRandomNumber();

var data = <?php echo json_encode($data); ?>;
var con1 = document.getElementById("BPM");
var con2 = document.getElementById("CO2");
var con3 = document.getElementById("HUM");
var con4 = document.getElementById("TEMP");
var con5 = document.getElementById("DB");

con1.innerHTML = data["Bpm"][randomNumber].Bpm;
con2.innerHTML = data["Co2"][randomNumber].Co2;
con3.innerHTML = data["Hum"][randomNumber].Hum;
con4.innerHTML = data["Temp"][randomNumber].Temp;
con5.innerHTML = data["Db"][randomNumber].Db;
</script>
