<?php
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

$BPM = "SELECT Valeur FROM bpm";
$CO2 = "SELECT Valeur FROM co2";
$HUM = "SELECT Valeur FROM humidity";
$TEMP = "SELECT Valeur FROM temperature";
$DB = "SELECT Valeur FROM noise";

$result1 = $conn->query($BPM);
$result2 = $conn->query($CO2);
$result3 = $conn->query($HUM);
$result4 = $conn->query($TEMP);
$result5 = $conn->query($DB);

// Vérifier les résultats et générer un tableau associatif pour les questions et réponses
$data = array();

if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $Bpm = $row1['Valeur'];
        $data[] = array('Bpm' => $Bpm);
    }
}

if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $Co2 = $row2['Valeur'];
        $data[] = array('Co2' => $Co2);
    }
}

if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
        $Hum = $row3['Valeur'];
        $data[] = array('Hum' => $Hum);
    }
}

if ($result4->num_rows > 0) {
    while ($row4 = $result4->fetch_assoc()) {
        $Temp = $row4['Valeur'];
        $data[] = array('Temp' => $Temp);
        echo $data;
    }
}

if ($result5->num_rows > 0) {
    while ($row5 = $result5->fetch_assoc()) {
        $Db = $row5['Valeur'];
        $data[] = array('Db' => $Db);
    }
}
echo $data;

// Fermeture de la connexion à la base de données
$conn->close();
?>
