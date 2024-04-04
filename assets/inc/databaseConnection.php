<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$db_user = "root";
$db_password = "";
$db_host = "localhost";
$db_name = "login";

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script> console.log('Connexion réussie à la base de données.'); </script>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}