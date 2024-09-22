<?php
// db.php

$host = 'localhost';  // Adresse de l'hôte
$dbname = 'z-events';  // Nom de la base de données
$username = 'root';  // Nom d'utilisateur MySQL
$password = '';  // Mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
