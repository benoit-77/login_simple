<?php

require_once(__DIR__ . "/../model/user.php");

class UserController
{

    public function signIn(): array
    {

        $messages = [];

        if (isset($_POST["submit"])) {
            if (!isset($_POST["name"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre nom d'utilisateur."
                ];
            }
            if (!isset($_POST["password"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre mot de passe."
                ];
            }

            if (count($messages) == 0) {

                $user = User::readOneUser($_POST["name"]);
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
                        $_SESSION["name"] = $user->name;
                        $_SESSION["password"] = $user->password;

                        header("Location: /index.php");
                    }
                }
            }
        }

        return $messages;
    }
}
