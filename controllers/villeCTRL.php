<?php
// http://localhost/projet_country/controllers/villeCTRL.php
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

// Initialisation des variables à vide.
$idVille = '';
$cpVille = '';
$nomVille = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $action = filter_input(INPUT_GET, 'action');

    switch ($action) {
        case 'delete':
            $idASupprimer = intval(filter_input(INPUT_GET, 'id_ville'));

            $dao->delete($idASupprimer);
            header("Location: villeCTRL.php");
            break;

        case 'edit':
            $idMaj = intval(filter_input(INPUT_GET, 'id_ville'));

            $villeMaj = $dao->selectOne($idMaj);

            $idVille = $villeMaj->getIdVille();
            $cpVille = $villeMaj->getCpVille();
            $nomVille = $villeMaj->getNomVille();
            break;

        case 'reset':
            $idVille = '';
            $cpVille = '';
            $nomVille = '';
            break;

        case 'add':
            $idVille = intval(filter_input(INPUT_GET, "id_ville"));
            $cpVille = filter_input(INPUT_GET, "cp_ville");
            $nomVille = filter_input(INPUT_GET, "nom_ville");

            $nouvelleVille = new Ville($idVille, $cpVille, $nomVille);

            $dao->insert($nouvelleVille);
            header("Location: villeCTRL.php");
            break;

        case 'update':
            $idVille = filter_input(INPUT_GET, "id_ville");
            $cpVille = filter_input(INPUT_GET, "cp_ville");
            $nomVille = filter_input(INPUT_GET, "nom_ville");

            $villeMaj = new Ville($idVille, $cpVille, $nomVille);

            $dao->update($villeMaj);
            header("Location: villeCTRL.php");
            break;

        default:
            break;
    }
}

// On crée l'IHM (include)
include '../views/villeIHM.php';
