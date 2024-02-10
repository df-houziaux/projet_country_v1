<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Méta-informations de la page -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Styles -->
    <link rel="stylesheet" href="../../projet_country\css/style.css" />
    <!-- Liens vers les polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">
    <!-- Titre de la page -->
    <title>Adherent IHM</title>

</head>

<body>
    <!-- Inclusion du fichier d'en-tête (Header.php) -->
    <?php include '../views/Header.php'; ?>
    <!-- Formulaire pour gérer les actions sur les adherent -->
    <form method="GET" action="../controllers/adherentCTRL.php">
        <!-- Tableau pour afficher les informations des adherent -->
        <table border="1" class="styleTable">
            <thead>
                <!-- En-têtes du tableau -->
                <tr>
                    <th>ID_adherent</th>
                    <th>Nom de l'adherent</th>
                    <th>Prenom de l'adherent</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Date de naissance</th>
                    <th>Id de la ville</th>
                    <th>Password</th>
                    <th>Suprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>

            <tbody>
                <!-- Boucle pour afficher les données de chaque adhérent -->
                <?php if (!empty($adherents) && is_array($adherents)) {
                    foreach ($adherents as $adherent) { ?> <tr>
                            <!-- Affichage des informations de l'adhérent -->
                            <td><?= $adherent->getIdAdherent() ?></td>
                            <td><?= $adherent->getNomAdherent() ?></td>
                            <td><?= $adherent->getPrenomAdherent() ?></td>
                            <td><?= $adherent->getAdresseAdherent() ?></td>
                            <td><?= $adherent->getEmailAdherent() ?></td>
                            <td><?= $adherent->getTelephoneAdherent() ?></td>
                            <td><?= $adherent->getDateNaissanceAdherent() ?></td>
                            <td>
                                <?php
                                $idVille = $adherent->getIdVilleAdherent();

                                foreach ($villes as $ville) {
                                    if ($ville->getIdVille() === $idVille) {
                                        echo $ville->getNomVille();
                                        break;
                                    }
                                }
                                ?>
                            </td>
                            <td><?= $adherent->getPasswordAdherent() ?></td>
                            <td>
                                <!-- Lien pour supprimer l'adhérent -->
                                <a href="../controllers/adherentCTRL.php?action=delete&id_adherent=<?= $adherent->getIdAdherent() ?>">
                                    <img src="../images/bd_delete_gris.png" alt="Supprimer" class="edit-icon">
                                </a>
                            </td>
                            <td>
                                <!-- Lien pour modifier l'adhérent -->
                                <a href="../controllers/adherentCTRL.php?action=edit&id_adherent=<?= $adherent->getIdAdherent() ?>">
                                    <img src="../images/bd_insert_gris.png" alt="Modifier" class="edit-icon">
                                </a>
                            </td>
                        </tr>
                <?php }
                } ?>


            </tbody>
        </table>
        <!-- Formulaire pour ajouter/modifier des adhérents -->
        <div>
            <fieldset class="conf">
                <div class="input">
                    <label for="id_adherent">Id Adherent</label>
                    <input type="text" name="id_adherent" value="<?= $idAdherent ?>" readonly>
                </div>

                <div class="input">
                    <label for="nom_adherent">Nom adherent</label>
                    <input type="text" name="nom_adherent" value="<?= $nomAdherent ?>">
                </div>

                <div class="input">
                    <label for="prenom_adherent">Prenom de l 'adherent</label>
                    <input type="text" name="prenom_adherent" value="<?= $prenomAdherent ?>">
                </div>

                <div class="input">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" value="<?= $adresse ?>">
                </div>

                <div class="input">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?= $email ?>">
                </div>

                <div class="input">
                    <label for="telephone">Telephone</label>
                    <input type="text" name="telephone" value="<?= $telephone ?>">
                </div>

                <div class="input">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="text" name="date_naissance" value="<?= $dateNaissance ?>">
                </div>

                <div class="input">
                    <!-- <label for="id_ville">Id de la ville</label>
                    <input type="text" name="id_ville" value="<?= $idVille ?>"> -->

                    <select name="id_ville" id="id_ville">
                        <option value="">Choisir votre ville</option>
                        <?php

                        foreach ($villes as $ville) {
                            echo '<option value="' . $ville->getIdVille() . '">' . $ville->getNomVille() . '</option>';
                        }

                        ?>
                    </select>


                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <input type="text" name="password" value="<?= $password ?>">
                </div>
                <div class="buttons">
                    <!-- Boutons pour réinitialiser, ajouter et modifier -->
                    <button type="submit" name="action" value="reset">Réinitialiser</button>
                    <button type="submit" name="action" value="add">Ajouter</button>
                    <button type="submit" name="action" value="update">Modifier</button>
                </div>

            </fieldset>
        </div>
    </form>
    <?php include '../views/Footer.php'; ?>
</body>

</html>