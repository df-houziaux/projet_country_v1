<?php
//http://localhost/projet_country/views/villeInsertIHMPoo.php
// Rôle du contrôleur : gérer les requêtes HTTP (request response)
// Chargement des fichiers annexes 'require_once'
require_once '../models/Ville.php';
require_once '../daos/VilleDAOPoo.php';
require_once '../daos/Connexion.php';

// Récupération des valeurs saisies dans le formulaire
$codePostal = filter_input(INPUT_POST, "cp");
$nomVille = filter_input(INPUT_POST, "nom_ville");
// Ajoutez ici la récupération des autres champs du formulaire

// Contrôler la qualité des valeurs saisies dans le formulaire
// Utilisez des expressions régulières, des validations, etc.

// Instanciation d'un objet Ville en valorisant l'attribut id_ville
$ville = new Ville($codePostal, $nomVille);
// Ajoutez ici l'instanciation des autres attributs de l'objet Ville

// Connexion à la BD
$cnx = new Connexion();
$pdo = $cnx->seConnecter("projet_country.ini");

// Instanciation d'un objet DAO
$dao = new VilleDAOPoo($pdo);

// On sollicite la méthode insert du DAO et on récupère le nombre de lignes insérées
$affected = $dao->insert($ville);
// Ajoutez ici d'autres méthodes du DAO nécessaires pour l'insertion

// On crée l'IHM (include)
$message = $affected . " Enregistrement ajouté ";
include '../views/villeInsertIHMPoo.php';
