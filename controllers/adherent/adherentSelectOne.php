<?php

declare(strict_types=1);
// Inclusion du fichier de vérification des entrées
require_once("../daos/connexionBasique.php");
require_once("../daos/villeDAO.php");

$pdo = connectionWithIniFile("../conf/projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
$id_ville = filter_input(INPUT_POST, "id_ville");

if ($id_ville != null) {
    $ville = selectOne($pdo, intval($id_ville));
    seDeconnecter($pdo);
} else {
    $messageko = "Veuillez saisir un id de ville";
    echo $messageko;
}

include '../views/selectOne.php';
