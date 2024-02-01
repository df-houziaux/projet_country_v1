<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Lecture d'une ville</title>
    <link rel="stylesheet" href="../css/inscription.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">
        <form action="../controllers/selectOneCTRL.php" method="POST">
            <label for="id_ville">Saisir l'id de la ville</label>
            <input type="text" name="id_ville" id="id_ville" placeholder="1,2,3...">
            <input type="submit" name="btValider">
        </form>
        <?php
        if (isset($ville) && !isset($ville["message"])) {
            echo "Id ville: {$ville["id_ville"]} <br>";
            echo "Nom ville: {$ville["nom_ville"]} <br>";
            echo "Code postal: {$ville["cp"]} <br>";
        } else {
            echo "Cette ville n'existe pas";
        }
        ?>
    </div>
</body>

</html>