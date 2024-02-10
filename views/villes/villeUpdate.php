<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controllers/UpdateCTRL.php" method="POST">
        <label for="id_ville">ID de la ville à modifier :</label>
        <input type="text" name="id_ville" id="id_ville" required autofocus>

        <label for="cp">Nouveau Code Postal :</label>
        <input type="text" name="cp" id="cp" required>

        <label for="nom_ville">Nouveau Nom de la Ville :</label>
        <input type="text" name="nom_ville" id="nom_ville" required>

        <input type="submit" value="Appliquer les modifications">

        <p>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
    </form>
</body>

</html>