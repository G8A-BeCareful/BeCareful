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
    var data = <?php echo json_encode($data); ?>;
    var con1 = document.getElementById("BPM");
    var con2 = document.getElementById("CO2");
    var con3 = document.getElementById("HUM");
    var con4 = document.getElementById("TEMP");
    var con5 = document.getElementById("DB");
    con1.innerHTML = data["Bpm"][1].Bpm;
    con2.innerHTML = data["Co2"][1].Co2;
    con3.innerHTML = data["Hum"][1].Hum;
    con4.innerHTML = data["Temp"][1].Temp;
    con5.innerHTML = data["Db"][1].Db;
</script>
