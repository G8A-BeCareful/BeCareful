<?php

$ch = curl_init();
curl_setopt(
$ch,
CURLOPT_URL,
"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G8A");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data");

$data_tab = str_split($data,33); // data by trame to get one trame 

$capteur = array_fill(0, 3, "null");
for($i=0, $size=count($data_tab); $i<$size-1; $i++){
    $trame = $data_tab[$i];

    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

    switch($c) {
        case 3:
            $capteur[0] = "température";
            break;
        case 4:
            $capteur[1] = "humidité";
            break;
        case "A":
            $capteur[2] = "son";
            break;        
    }
}

$conn = mysqli_connect("localhost", "root", "", "login");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$capteur_date = array_fill(0, 3, "null");
for ($i=0, $size=count($capteur); $i<$size; $i++) {
    if ($capteur[$i] == "null") {
        $capteur_date[$i] = "null";
    }
    else {
        $query = "SELECT MAX(temps) AS most_recent_date FROM ".$capteur[$i];
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $most_recent_date = $row['most_recent_date'];

        $capteur_date[$i] = $most_recent_date;

    }
}

print_r($capteur_date);
mysqli_close($conn);


// list bdd - temperature, humidité, son = $capteur
// list temps bdd - meme ordre = $capteur_date


// tu veux comparer les valeurs de date des trames et celle de la list temps pour seulement recuperer les nouvelles valeurs
// envoyer valeur $v a bdd de list $capteur