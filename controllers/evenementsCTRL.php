<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
require_once("../daos/connexionBasique.php");
require_once("../daos/evenementDAO.php");

$pdo = connectionWithIniFile("../conf/projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
$type_evenement = filter_input(INPUT_POST, "type_evenement");
$date_evenement = filter_input(INPUT_POST, "date_evenement");
$jour_evenement = filter_input(INPUT_POST, "jour_evenement");
$presence_evenement = filter_input(INPUT_POST, "presence_evenement");
// Variable pour compter le nombre de contrôles en échec
$nbControleKO = 0;

// Vérification si l'identifiant de l'adhérent est présent
if ($type_evenement == null) {
    $nbControleKO++;
}
// Vérification si l'identifiant du cours est présent
if ($date_evenement == null) {
    $nbControleKO++;
}
if ($jour_evenement == null) {
    $nbControleKO++;
}
if ($presence_evenement == null) {
    $nbControleKO++;
}
/*
Cette partie du code vérifie si toutes les données nécessaires sont présentes (non nulles)
 et, si oui, tente d'insérer ces données dans la base de données.
*/
if ($nbControleKO == 0) {

    /* on créez un tableau associatif avec les données du formulaire.*/
    $data = array(
        "type_evenement" => $type_evenement,
        "date_evenement" => $date_evenement,
        "jour_evenement" => $jour_evenement,
        "presence_evenement" => $presence_evenement,
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
// Inclusion du fichier de vue evenements.php
include '../views/evenements.php';
