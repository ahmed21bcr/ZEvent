<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "z-events";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les informations du formulaire
    $title = $_POST['title'];
    $start_time = $_POST['start_time'];  // Date et heure de début
    $end_time = $_POST['end_time'];      // Date et heure de fin

    // Insérer un nouveau live avec la planification
    $sql = "INSERT INTO streams (title, start_time, end_time) VALUES (:title, :start_time, :end_time)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':start_time', $start_time);
    $stmt->bindParam(':end_time', $end_time);

    try {
        $stmt->execute();
        echo "Le live a été planifié avec succès !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
