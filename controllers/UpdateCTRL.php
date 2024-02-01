<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
require_once("../daos/connexionBasique.php");
require_once("../daos/villeDAO.php");

$pdo = connectionWithIniFile("../conf/projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
$id_ville = filter_input(INPUT_POST, "id_ville");
$cp = filter_input(INPUT_POST, "cp");
$nom_ville = filter_input(INPUT_POST, "nom_ville");

if ($id_ville != null && $cp != null && $nom_ville != null) {

    $data = array(
        "cp"        => $cp,
        "nom_ville" => $nom_ville,
    );

    $lignes = update($pdo, $data, intval($id_ville));

    if ($lignes > 0) {
        $message = "$lignes enregistrement mis à jour.";
    } else {
        $message = "Enregistrement impossible. Ville inexistante";
    }

    seDeconnecter($pdo);
} else {
    $messageko = "La saisie des champs n'est pas bonne";
    echo $messageko;
}

include '../views/Update.php';
