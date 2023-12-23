<?php

declare(strict_types=1);

// Rôle du controller: gêrer les requêtes http (request response)
// Chargement des fichier annexes "require once"
// Inclusion du fichier de vérification des entrées
require_once "../daos/Connexion.php";
require_once '../daos/VilleDAOPoo.php';
require_once "../models/Ville.php";

$cnx = new Connexion();
$pdo = $cnx->seConnecter("projet_country.ini");

// Récupération des données du formulaire avec la méthode POST
/*$id_ville = filter_input(INPUT_POST, "id_ville");
$cp = filter_input(INPUT_POST, "cp");
$nom_ville = filter_input(INPUT_POST, "nom_ville");*/
$lignes = "";
$option = "";
/*if ($id_ville != null && $cp != null && $nom_ville != null) {

    $data = array(
        "cp"        => $cp,
        "nom_ville" => $nom_ville,
    );

    $affected = $dao->update($idVille);*/
// Création de l'objet VilleDAOPoo
$villeDAO = new VilleDAOPoo($pdo);

// Récupération des noms de villes et des codes postaux depuis la base de données
$villes = $villeDAO->selectall();

// Affichage des options pour les villes existantes
foreach ($villes as $ville) {
    $option .= "<option value=\"" . $ville->getIdVille() . "\">" . $ville->getNomVille() . " - " . $ville->getCpVille() . "</option>";
}
$idVille = "";
$cpVille = "";
$nomVille = "";

$bouton_select = filter_input(INPUT_GET, "btnValiderSelect");
if ($bouton_select != null) {
    $id_ville = intval(filter_input(INPUT_GET, "listeVilles"));

    $resultat = $villeDAO->selectOne($id_ville);
    $idVille = $resultat->getIdVille();
    $cpVille = $resultat->getCpVille();
    $nomVille = $resultat->getNomVille();
}

$bouton_modif = filter_input(INPUT_POST, "btnValiderModif");
if ($bouton_modif != null) {
    $idVille = intval(filter_input(INPUT_POST, "id_ville"));
    $cpVille = filter_input(INPUT_POST, "cp_ville");
    $nomVille = filter_input(INPUT_POST, "nom_ville");

    $villeModif = new Ville($idVille, $cpVille, $nomVille);
    $nbLignes = $villeDAO->update($villeModif);

    echo $nbLignes . " a été modifié(es)";
}

include '../views/villeUpdateIHMPoo.php';
