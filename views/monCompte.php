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

                <label for="nouveau_nom">Nouveau nom :</label><br>
                <input type="text" id="nouveau_nom" name="nouveau_nom"><br>

                <label for="nouveau_prenom">Nouveau prénom :</label><br>
                <input type="text" id="nouveau_prenom" name="nouveau_prenom"><br>

                <label for="nouvelle_date_naissance">Nouvelle Date de naissance :</label><br>
                <input type="date" id="nouvelle_date_naissance" name="nouvelle_date_naissance"><br>

                <label for="nouveau_telephone">Nouveau Téléphone :</label><br>
                <input type="tel" id="nouveau_telephone" name="nouveau_telephone"><br>

                <label for="nouvelle_email">Nouvelle Email :</label><br>
                <input type="email" id="nouvelle_email" name="nouvelle_email"><br>

                <label for="nouvelle_adresse">Nouvelle Adresse :</label><br>
                <input type="text" id="nouvelle_adresse" name="nouvelle_adresse"><br>

                <label for="nouvelle_ville">Nouvelle Ville :</label><br>
                <input type="text" id="nouvelle_ville" name="nouvelle_ville"><br>

                <label for="nouveau_code_postal">Nouveau Code postal :</label><br>
                <input type="text" id="nouveau_code_postal" name="nouveau_code_postal"><br>

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