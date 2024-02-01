<<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style_accueil.css">
        <title>Insert View</title>
    </head>

    <header>
        <?php
        // include("header.php");
        ?>
    </header>

    <body>
        <fieldset>
            <legend>Insert</legend>

            <form method="POST" action="../controllers/insertVilleCtrlOo.php" class="inscription">
                <!-- Ajoutez ici les champs du formulaire nécessaires pour l'insertion -->
                <label for="code_postal">Code Postal</label>
                <input type="text" name="cp" id="code_postal">

                <label for="nom_ville">Nom Ville</label>
                <input type="text" name="nom_ville" id="nom_ville">

                <input type="submit" name="btSubmit" value="Ajouter" />
            </form>
            >

        </fieldset>
        <p>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
    </body>

    </html>