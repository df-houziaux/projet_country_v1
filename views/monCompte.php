<?php

include_once "../daos/Connexion.php";
include_once "../models/Adherent.php";
include_once "../daos/AdherentDAOPoo.php";

$connexion = new Connexion();
$pdo = $connexion->seConnecter("projet_country.ini");

$adherentDAO = new AdherentDAOPoo($pdo);

$adherent = $adherentDAO->selectOneAdherent($_COOKIE['adherent_id']);

// ID ville : $adherent->getIdVille()
// Select one sur VIlle ($villeDAO->selectOneVille($idville))

// nom ville $ville->getNomville()
// code postal $ville->getCodePostal()

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/monCompte.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php include "Header.php"; ?>
    </header>

    <main>
        <h1>Gestion de votre compte</h1>
        <section id="profil">
            <h2>Profil Utilisateur</h2>
            <!-- Afficher les informations du profil de l'utilisateur (nom, email, etc.) -->

            <form id="profil-form" action="../controllers/miseAJourProfil.php" method="post">

                <input type="hidden" name="id_adherent" value="<?php echo $id; ?>">

                <label for="nouvelle_photo">Photo de profil :</label><br>
                <input type="file" id="nouvelle_photo" name="nouvelle_photo" accept="image/*"><br>

                <label for="nouveau_nom">Nom :</label><br>
                <input type="text" id="nouveau_nom" name="nouveau_nom" value="<?= $adherent->getNomAdherent() ?>" readonly><br>

                <label for="nouveau_prenom">Prénom :</label><br>
                <input type="text" id="nouveau_prenom" name="nouveau_prenom" value="<?= $adherent->getPrenomAdherent() ?>" readonly><br>

                <label for="nouvelle_date_naissance">Date de naissance :</label><br>
                <input type="text" id="nouvelle_date_naissance" name="nouvelle_date_naissance" value="<?= $adherent->getDateNaissanceAdherent() ?>" readonly><br>

                <label for="nouveau_telephone">Téléphone :</label><br>
                <input type="tel" id="nouveau_telephone" name="nouveau_telephone" value="<?= $adherent->getTelephoneAdherent() ?>" readonly><br>

                <label for="nouvelle_email">Email :</label><br>
                <input type="email" id="nouvelle_email" name="nouvelle_email" value="<?= $adherent->getEmailAdherent() ?>" readonly><br>

                <label for="nouvelle_adresse">Adresse :</label><br>
                <input type="text" id="nouvelle_adresse" name="nouvelle_adresse" value="<?= $adherent->getAdresseAdherent() ?>" readonly><br>

                <label for="nouvelle_ville">Ville :</label><br>
                <input type="text" id="nouvelle_ville" name="nouvelle_ville" value="A faire" readonly><br>

                <label for="nouveau_code_postal">Code postal :</label><br>
                <input type="text" id="nouveau_code_postal" name="nouveau_code_postal" value="A faire" readonly><br>

                <button type="submit" name="update-profile">Mettre à jour le profil</button>
            </form>
        </section>
        <?php
        // Vérification de la présence du paramètre 'updated' dans l'URL pour afficher un message de confirmation
        if (isset($_GET['updated']) && $_GET['updated'] === 'true') {
            echo "<p>Vos informations ont été mises à jour avec succès !</p>";
        }
        ?>


        <section id="supprimer-compte">
            <h2>Supprimer le Compte</h2>
            <!-- Formulaire de confirmation pour supprimer le compte -->
            <form id="supprimer-compte-form">
                <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
                <button type="submit" name="delete-account">Supprimer mon compte</button>
            </form>
        </section>
        <div class="bouton">
            <div class="retour_acceuil">
                <button type="button" class="r_acceuil" onclick="window.location.href='index.php'"> l'accueil</button>
            </div>
        </div>
    </main>

    <footer>
        <?php include 'Footer.php'; ?>
    </footer>


</body>

</html>