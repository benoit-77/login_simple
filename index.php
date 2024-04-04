<?php

define("TITLE", "Connexion");

session_start();

require_once(__DIR__ . "/controller/loginController.php");

$existingUser = new UserController;
$messages = $existingUser->signIn();

include(__DIR__ . "/assets/inc/header.php");
include(__DIR__ . "/view/displayLogin.php");