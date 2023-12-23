<!DOCTYPE html>
<!--http://localhost/projet_country/controllers/villeUpdateCTRLPoo.php  -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <section>
            <h1>UPDATE</h1>

            <form method="GET" action="../controllers/villeUpdateCTRLPoo.php">
                <label for="listeVilles">Sélectionner ville</label>
                <select name="listeVilles" id="listeVilles">
                    <?php
                    echo $option;
                    ?>
                </select>
                <input type="submit" value="Valider" name="btnValiderSelect">
            </form>
        </section>
        <section>
            <form method="POST" action="../controllers/villeUpdateCTRLPoo.php">
                <p id="id_ville">
                    <label for="id_ville">Id de la ville</label>
                    <input readonly type="text" name="id_ville" id="id_ville" value="<?php echo $idVille ?>">
                </p>
                <p id="cp_ville">
                    <label for="cp_ville">Code Postal de la ville</label>
                    <input type="text" name="cp_ville" id="cp_ville" value="<?php echo $cpVille ?>">
                </p>

                <p id="nom_ville">
                    <label for="nom_ville">Nom de la ville</label>
                    <input type="text" name="nom_ville" id="nom_ville" value="<?php echo $nomVille ?>">
                </p>

                <input type="submit" name="btnValiderModif" value="Modifier" />
            </form>
        </section>
    </main>
</body>

</html>