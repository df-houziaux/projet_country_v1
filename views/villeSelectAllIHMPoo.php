<!--http://localhost/projet_country/daos/villeDAOPooTest.php-->
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=1>
        <thead>
            <tr>
                <th>ID_VILLE</th>
                <th>CP</th>
                <th>NOM_VILLE</th>
            </tr>
        </thead>

        <tbody>
            <?php

            foreach ($villes as $ville) {
                echo "<tr>";
                echo "<td>" . $ville->getIdVille() . "</td>";
                echo "<td>" . $ville->getCpVille() . "</td>";
                echo "<td>" . $ville->getNomVille() . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>

    </table>
</body>

</html>