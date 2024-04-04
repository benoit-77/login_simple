<?php

require_once(__DIR__ . "/controller/inscriptionController.php");

$usersController = new InscriptionController;
$messages = $usersController->signUp();

include(__DIR__ . "/view/displayInscription.php");