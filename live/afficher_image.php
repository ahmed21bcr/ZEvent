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

// Vérifier que l'ID du live est fourni dans l'URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Préparer et exécuter la requête pour récupérer l'image BLOB
    $stmt = $conn->prepare("SELECT preview_image FROM streams WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Spécifier l'en-tête correct pour indiquer qu'il s'agit d'une image
        header("Content-Type: image/jpeg"); // Adapte à ton type d'image (ex: image/png)

        // Envoyer les données binaires de l'image au navigateur
        echo $row['preview_image'];
    } else {
        echo "Image not found.";
    }
} else {
    echo "No image ID provided.";
}
