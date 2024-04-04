<?php

require_once(__DIR__ . "/../model/user.php");

class InscriptionController {
    
    public function signUp(): array {

        $messages = [];

        if (isset($_POST["submit"])) {
            if (!isset($_POST["email"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre adresse mail."];
            }

            if (!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer une adresse mail valide."
                ];
            }
            
            $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
            $lowercase = preg_match('@[a-z]@', $_POST["password"]);
            $number = preg_match('@[0-9]@', $_POST["password"]);

            if (!isset($_POST["password"]) || !$uppercase || !$lowercase || !$number || strlen($_POST["password"]) < 8) {
                $messages[] = [
                    "success" => false,
                    "text" => "Votre mot de passe n'est pas valide. Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule et un chiffre."
                ];
            }

            if (!isset($_POST["passwordCheck"]) || ($_POST["passwordCheck"] != $_POST["password"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Les mots de passe ne correspondent pas."
                ];
            }

            if (count($messages) == 0) {

                $email = htmlspecialchars($_POST["email"]);
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                User::create($email, $password);

                header("Location: /index.php");
            }
        }
        return $messages;
    }
}