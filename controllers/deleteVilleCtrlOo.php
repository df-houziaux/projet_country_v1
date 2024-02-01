<?php
//Rôle du contrôleur: gérer les requêtes Http (request response)


//Chargement des fichiers annexes 'require once'
require_once '../models/Ville.php';
require_once '../daos/VilleDAOPoo.php';
require_once '../daos/Connexion.php';
//Récuperation des valeurs saisies dans le formulaire
$idVille = filter_input(INPUT_POST, "id_ville");

//Controler la qualité des valeurs saisies dans le formulaire
//Expression régulière pour savoir si c'est un nombre entier (un int)

//On instancie un objet ville en valorisant l' attribut id_ville
$ville = new Ville($idVille);

// Connexion à la BD
$cnx = new Connexion();
$pdo = $cnx->seConnecter('../conf/projet_country.ini');

//Instanciation d' un objet DAO
$dao = new VilleDAOPoo($pdo);


//On solicite la méthode delete du DAO et on récupère le nombre de lignes supprimées
$affected = $dao->delete($idVille);

//On créé l' IHM (include)
$message = $affected . " Enregistrement supprimé ";
include '../views/deleteVilleCtrlOo.php';
