<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Méta-informations de la page -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Styles -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Liens vers les polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">
    <!-- Titre de la page -->
    <title>Ville IHM</title>

</head>

<body>
    <!-- Inclusion du fichier d'en-tête (Header.php) -->
    <?php include "Header.php"; ?>
    <!-- Formulaire pour gérer les actions sur les villes -->
    <form method="GET" action="../controllers/villeCTRL.php">
        <!-- Tableau pour afficher les informations des villes -->
        <table border="1" class="styleTable">
            <thead>
                <!-- En-têtes du tableau -->
                <tr>
                    <th>ID_VILLE</th>
                    <th>CP</th>
                    <th>NOM_VILLE</th>
                    <th>SUPPRIMER</th>
                    <th>MODIFIER</th>
                </tr>
            </thead>

            <tbody>
                <!-- Boucle pour afficher les données de chaque ville -->
                <?php foreach ($villes as $ville) { ?>
                    <tr>
                        <td><?= $ville->getIdVille() ?></td>
                        <td><?= $ville->getCpVille() ?></td>
                        <td><?= $ville->getNomVille() ?></td>
                        <td>

                            <a href="../controllers/villeCTRL.php?action=delete&id_ville=<?= $ville->getIdVille() ?>">
                                <img src="../images/bd_delete_gris.png" alt="Supprimer" class="edit-icon">
                            </a>
                        </td>
                        <td>
                            <a href="../controllers/villeCTRL.php?action=edit&id_ville=<?= $ville->getIdVille() ?>">

                                <img src="../images/bd_insert_gris.png" alt="Modifier" class="edit-icon">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div>
            <fieldset class="conf">
                <div class="input">
                    <label for="id_ville">Id ville</label>
                    <input type="text" name="id_ville" value="<?= $idVille ?>" readonly>
                </div>

                <div class="input">
                    <label for="cp_ville">Code postal</label>
                    <input pattern="\d{5}" type="number" name="cp_ville" value="<?= $cpVille ?>">
                </div>

                <div class="input">
                    <label for="nom_ville">Nom de la ville</label>
                    <input type="text" name="nom_ville" value="<?= $nomVille ?>">
                </div>

                <div class="buttons">
                    <button type="submit" name="action" value="reset">Réinitialiser</button>
                    <button type="submit" name="action" value="add">Ajouter</button>
                    <button type="submit" name="action" value="update">Modifier</button>
                </div>

            </fieldset>
        </div>
    </form>
    <?php include 'Footer.php'; ?>
</body>

</html>