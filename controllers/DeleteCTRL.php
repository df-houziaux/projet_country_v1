<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
require_once("../daos/connexionBasique.php");
require_once("../daos/villeDAO.php");

$pdo = connectionWithIniFile("../conf/projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
$id_ville = filter_input(INPUT_POST, "id_ville");

$nbControleKO = 0;

if ($id_ville != null) {

    $message = delete($pdo, intval($id_ville)) . " enregistrement(s) supprimé(s)";

    echo $message;

    /* Vous fermez la connexion à la base de données.*/
    seDeconnecter($pdo);
    /*Si l'une des conditions de saisie obligatoire n'est pas remplie, un message d'erreur 
    est stocké dans la variable $messageko. */
} else {
    $messageko = "Veuillez saisir un id de ville";
    echo $messageko;
}

include '../views/Delete.php';
