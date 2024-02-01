<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_accueil.css">
    <title>Delete View</title>
</head>
<header>
    <?php
    // include("header.php");
    ?>
</header>

<body>
    <fieldset>
        <legend>Delete</legend>
        <form method="POST" action="../controllers/deleteVillePOo.php" class="inscription">
            <label for="id_ville">Id Ville</label>
            <input type="text" name="id_ville" id="id_ville">

            <input type="submit" name="btSubmit" value="Supprimer" />
        </form>
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