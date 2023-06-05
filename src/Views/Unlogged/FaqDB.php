<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "nom_base_de_donnees";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Création de la table "faq" si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS faq (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    reponse TEXT
)";
if ($conn->query($sql) === false) {
    echo "Erreur lors de la création de la table : " . $conn->error;
    $conn->close();
    exit;
}

// Ajout des questions et réponses à la table
$questions = array(
    "Question 1" => "Réponse 1",
    "Question 2" => "Réponse 2",
    "Question 3" => "Réponse 3"
);

foreach ($questions as $question => $reponse) {
    $question = $conn->real_escape_string($question);
    $reponse = $conn->real_escape_string($reponse);

    $sql = "INSERT INTO faq (question, reponse) VALUES ('$question', '$reponse')";
    if ($conn->query($sql) === false) {
        echo "Erreur lors de l'ajout de la question : " . $conn->error;
        $conn->close();
        exit;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
