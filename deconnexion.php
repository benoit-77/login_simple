<?php

define("TITLE", "Déconnexion");

session_start();
session_unset();
session_destroy();

include(__DIR__ . "/assets/inc/header.php");
include(__DIR__ . "/view/deconnexion.php");