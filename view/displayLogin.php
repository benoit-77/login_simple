<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?></title>
</head>

<body>
    <main>

        <?php

        if (isset($_SESSION["email"])) { ?>
            <p id="welcome"> Bienvenue <?= $_SESSION["email"] ?> ! <a href="/deconnexion.php">Déconnexion</a></p> <?php
                                                                                                                }

                                                                                                                    ?>
        <h1>Connectez-vous</h1>

        <h2>Connexion à votre compte</h2>

        <?php

        if (count($messages) > 0) {
            foreach ($messages as $message) {
                if ($message["success"]) { ?>
                    <p class="alert alert-success"><?= $message["text"] ?></p>
                <?php } else { ?>
                    <p class="alert alert-danger"><?= $message["text"] ?></p>
        <?php }
            }
        }

        ?>

        <form action="#" method="post">
            <label for="email"><i class="bi bi-at" style="font-size: 50px;"></i></label>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <br />
            <label for="password"><i class="bi bi-lock" style="font-size: 50px;"></i></label>
            <input type="password" id="password" name="password" minlength="8" placeholder="Mot de passe" required>
            <br />

            <button type="submit" class="btn btn-primary" name="submit">Connexion</button>
        </form>

        <p>Pas de compte? Créer le vôtre <a href="/../inscription.php">ici</a>.</p>

    </main>

</body>

</html>