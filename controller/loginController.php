<?php

require_once(__DIR__ . "/../model/user.php");

class UserController
{

    public function signIn(): array
    {

        $messages = [];

        if (isset($_POST["submit"])) {
            if (!isset($_POST["email"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre adresse mail."
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

            if (count($messages) == 0) {

                $user = User::readOneUser($_POST["email"]);
                if ($user == false) {
                    $messages[] = [
                        "success" => false,
                        "text" => "Aucun utilisateur avec ce nom trouvé."
                    ];
                } else {

                    if (!password_verify($_POST["password"], $user->password)) {
                        $messages[] = [
                            "success" => false,
                            "text" => "Mot de passe incorrect."
                        ];
                    } else {
                        $messages[] = [
                            "success" => true,
                            "text" => "Vous êtes désormais connecté."
                        ];

                        $_SESSION["id_user"] = $user->id_user;
                        $_SESSION["email"] = $user->email;
                        $_SESSION["password"] = $user->password;

                        header("Location: /index.php");
                    }
                }
            }
        }

        return $messages;
    }
}
