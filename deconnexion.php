<?php

session_start();
session_unset();
session_destroy();

include(__DIR__ . "/view/deconnexion.php");