<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de création de compte</title>
</head>

<body>
    <main>
        <h1>Création de compte</h1>

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
            <label for="password"><i class="bi bi-lock" style="font-size: 50px;"></i></label>
            <input type="password" id="passwordCheck" name="passwordCheck" minlength="8" placeholder="Confirmation mot de passe" required>
            <br />

            <button type="submit" class="btn btn-primary" name="submit">Créer un compte</button>
        </form>

    </main>

</body>

</html>