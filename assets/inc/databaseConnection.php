<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$db_user = "root";
$db_password = "";
$db_host = "localhost";
$db_name = "login";


try {
    $connection = new PDO("mysql:host=$servername;dbname=$db_name", $db_user, $db_password);

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
}

catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}