<?php
// Inclusion du fichier de vérification des entrées
include_once "../lib/verifInput.php";
include_once "../daos/Connexion.php";

include_once "../models/Adherent.php";
include_once "../daos/AdherentDAOPoo.php";

$connexion = new Connexion();
$pdo = $connexion->seConnecter("projet_country.ini");

$adherentDAO = new AdherentDAOPoo($pdo);

// Vérifier si le formulaire de mise à jour du profil a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-profile'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // Assurez-vous de récupérer l'ID de l'utilisateur
    $nom = $_POST['nouveau_nom'];
    $prenom = $_POST['nouveau_prenom'];
    $adresse = $_POST['nouvelle_adresse'];
    $email = $_POST['nouvelle_email'];
    $telephone = $_POST['nouveau_telephone'];
    $date_naissance = $_POST['nouvelle_date_naissance'];
    $ville = $_POST['nouvelle_ville'];
    $code_postal = $_POST['nouveau_code_postal'];

    // Créer un objet Adherent avec les nouvelles données
    $adherent = new Adherent($id, $nom, $prenom, $adresse, $email, $telephone, $date_naissance, $ville, $code_postal);

    // Mettre à jour les données dans la base de données en utilisant le DAO
    $adherentDAO->updateAdherent($adherent);

    // Rediriger l'utilisateur vers une page de confirmation ou une autre page après la mise à jour
    header("../monCompte.php?updated=true");
    exit();
}
