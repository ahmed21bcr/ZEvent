<?php
// db.php

$host = 'localhost'; // Database host (usually localhost)
$dbname = 'z-events'; // The name of your database
$username = 'root'; // The database username
$password = ''; // The database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
