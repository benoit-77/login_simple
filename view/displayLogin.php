<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
</head>

<body>
    <main>


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

        if (isset($_SESSION["message"])) { ?>
            <p class="alert alert-warning"> <?= $_SESSION["message"] ?> </p>
        <?php
            unset($_SESSION["message"]);
        }



        ?>
        <h1>Connectez-vous</h1>

        <h2>Connexion à votre compte </h2>

        <form method="post">
            <label for="name"><i class="bi bi-at" style="font-size: 50px;"></i></label>
            <input type="name" name="name" id="name" placeholder="Nom d'utilisateur" required>
            <br />
            <label for="password"><i class="bi bi-lock" style="font-size: 50px;"></i></label>
            <input type="password" id="password" name="password" minlength="8" placeholder="Mot de passe" required>
            <br />

            <button type="submit" class="btn btn-primary" name="submit">Connexion</button>
        </form>

    </main>

</body>

</html>