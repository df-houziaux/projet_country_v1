<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
include_once "../lib/verifInput.php";
include_once "../daos/Connexion.php";

include_once "../models/Adherent.php";
include_once "../daos/AdherentDAOPoo.php";

$connexion = new Connexion();
$pdo = $connexion->seConnecter("projet_country.ini");

$adherentDAO = new AdherentDAOPoo($pdo);
// Vérifier si le formulaire de mise à jour du profil a été soumis
// Vérifier si le formulaire de suppression de compte a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-account'])) {
    // Ajoutez votre logique de suppression de compte ici
    // Assurez-vous d'obtenir l'identifiant de l'utilisateur correctement
    // par exemple, $_SESSION['user_id'], $_COOKIE['user_id'], ou via une autre méthode d'authentification




    // Préparer la requête SQL
    $requete = "DELETE FROM adherent WHERE id_adherent='$id_adherent'";

    // Exécuter la requête
    if ($connexion->query($requete) === TRUE) {
        echo "Compte supprimé avec succès !";
        // Vous pouvez rediriger l'utilisateur vers une page de confirmation ou effectuer d'autres actions ici
    } else {
        echo "Erreur lors de la suppression du compte : " . $connexion->error;
    }

    // Fermer la connexion
    $connexion->close();
}
