<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
require_once("../daos/connexionBasique.php");
require_once("../daos/adherentDAO.php");

$pdo = connectionWithIniFile("../conf/projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
$id_adherent = filter_input(INPUT_POST, "id_adherent");

$nbControleKO = 0;

if ($id_adherent != null) {

    $message = delete($pdo, intval($id_adherent)) . " enregistrement(s) supprimé(s)";

    echo $message;

    /* Vous fermez la connexion à la base de données.*/
    seDeconnecter($pdo);
    /*Si l'une des conditions de saisie obligatoire n'est pas remplie, un message d'erreur 
    est stocké dans la variable $messageko. */
} else {
    $messageko = "Veuillez saisir un id de l 'adhérent";
    echo $messageko;
}

include '../views/Delete_adherent_cours.php';
