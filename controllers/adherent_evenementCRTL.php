<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
require_once("../daos/connexionBasique.php");
require_once("../daos/adherent_evenementDAO.php");

$pdo = connectionWithIniFile("../conf/projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
$id_adherent = filter_input(INPUT_POST, "id_adherent");
$id_evenement = filter_input(INPUT_POST, "id_evenement");
// Variable pour compter le nombre de contrôles en échec
$nbControleKO = 0;

// Vérification si l'identifiant de l'adhérent est présent
if ($id_adherent == null) {
    $nbControleKO++;
}
// Vérification si l'identifiant du cours est présent
if ($id_evenement == null) {
    $nbControleKO++;
}
/*
Cette partie du code vérifie si toutes les données nécessaires sont présentes (non nulles)
 et, si oui, tente d'insérer ces données dans la base de données.
*/
if ($nbControleKO == 0) {

    /* on créez un tableau associatif avec les données du formulaire.*/
    $data = array(
        "id_adherent" => $id_adherent,
        "id_evenement" => $id_evenement,
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
// Inclusion du fichier de vue adherent_cours_insert.php
include '../views/adherent_evenement.php';
