<?php
//http://localhost/projet_country/controllers/villeSelectAllCRTLPoo.php
// Rôle du contrôleur : gérer les requêtes HTTP (request response)

// Chargement des fichiers annexes 'require_once'
require_once '../models/Ville.php';
require_once '../daos/VilleDAOPoo.php';
require_once '../daos/Connexion.php';

// Connexion à la BD
$cnx = new Connexion();
$pdo = $cnx->seConnecter("projet_country.ini");

// Instanciation d'un objet DAO
$dao = new VilleDAOPoo($pdo);

// On sollicite la méthode selectAll du DAO et on récupère les villes
$villes = $dao->selectAll();

// Parcours de la liste des villes et affichage dans le tableau
/*$tableau = [];
foreach ($villes as $ville) {
    $tableau[] = [
        'id_ville' => $ville->getIdVille(),
        'cp' => $ville->getCpVille(),
        'nom_ville' => $ville->getNomVille(),
    ];
}*/

// On crée l'IHM (include)
include '../views/villeSelectAllIHMPoo.php';
