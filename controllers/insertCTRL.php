<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
require_once("../daos/connexionBasique.php");
require_once("../daos/villeDAO.php");

$pdo = connectionWithIniFile("../conf/projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
$cp        = filter_input(INPUT_POST, "cp");
$nom_ville = filter_input(INPUT_POST, "nom_ville");

$nbControleKO = 0;

// Vérification de la saisie du code postal
if ($cp != null) {
    $expression = "/^\d{5}$/";
    $ok = preg_match($expression, $cp);

    if ($ok == 0) {
        $nbControleKO += 1;
    }
}

// Vérification de la saisie du nom de la ville
if ($nom_ville != null) {
    $expression = "/^[A-Za-z ']{4,}$/";
    $ok = preg_match($expression, $nom_ville);

    // Si le contrôle est KO
    if ($ok == 0) {
        $nbControleKO += 1;
    }
}

/*
Cette partie du code vérifie si toutes les données nécessaires sont présentes (non nulles)
 et, si oui, tente d'insérer ces données dans la base de données.
*/
if ($cp != null && $nom_ville != null && $nbControleKO == 0) {

    /* on créez un tableau associatif avec les données du formulaire.*/
    $data = array(
        "cp"        => $cp,
        "nom_ville" => $nom_ville,
    );

    /*on appelez une fonction insert avec la connexion à la base de données $pdo et 
     les données $data. Le résultat est stocké dans $message. */
    $message = insert($pdo, $data) . "enregistrement(s) ajouté(s)";

    echo $message;

    /* Vous fermez la connexion à la base de données.*/
    seDeconnecter($pdo);
    /*Si l'une des conditions de saisie obligatoire n'est pas remplie, un message d'erreur 
    est stocké dans la variable $messageko. */
} else {
    $messageko = "Toutes les saisies sont obligatoires";
    echo $messageko;
}

include '../views/insertViews.php';
