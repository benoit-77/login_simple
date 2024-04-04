<?php

define("TITLE", "Création de compte");

require_once(__DIR__ . "/controller/inscriptionController.php");

$usersController = new InscriptionController;
$messages = $usersController->signUp();

include(__DIR__ . "/assets/inc/header.php");
include(__DIR__ . "/view/displayInscription.php");