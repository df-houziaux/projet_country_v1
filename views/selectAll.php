<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=1>
        <!-- En-tête du tableau avec les colonnes -->
        <thead>
            <td>ID_VILLE</td>
            <td>CP</td>
            <td>NOM_VILLE</td>
        </thead>
        <?php
        // Inclusion des fichiers nécessaires pour la connexion à la base de données
        require_once '../daos/ConnexionBasique.php';
        require_once '../daos/villeDAO.php';
        // Connexion à la base de données en utilisant le fichier de configuration ini
        $pdo = connectionWithIniFile("../conf/projet_country.ini");
        // Appel de la fonction selectAll pour récupérer toutes les villes depuis la base de données
        $listVilles = selectAll($pdo);
        // Parcours de la liste des villes et affichage dans le tableau
        foreach ($listVilles as $ville) {
            echo "<tr>";
            echo "<td>" . $ville['id_ville'] . "</td>";
            echo "<td>" . $ville['cp'] . "</td>";
            echo "<td>" . $ville['nom_ville'] . "</td>";
            echo "</tr>";
        }

        ?>
    </table>
</body>

</html>