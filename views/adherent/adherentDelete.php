<!--http://localhost/projet_country/views/villeDeleteIHMPOo.php-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_accueil.css">
    <title>Delete adherent </title>
</head>
<header>
    <?php
    // include("header.php");
    ?>
</header>

<body>
    <fieldset>
        <legend>Delete un Adherent</legend>
        <form method="get" action="../controllers/AdherentDeleteCTRLGET.php" class="inscription">
            <label for="id_adherent">Id adherent</label>
            <input type="text" name="id_adherent" id="id_adherent">

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