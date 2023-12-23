<?php
//http://localhost/projet_country/daos/villeDAOPooTest.php
/**
 * Description of DAOvilles
 * DAOvilles.php
 * @author Administrateur
 */

declare(strict_types=1);

require_once 'VilleDAOPoo.php';
require_once 'Connexion.php';
require_once '../models/Ville.php';
$cnx = new Connexion();
$pdo = $cnx->seConnecter("projet_country.ini");
$villeDao = new VilleDAOPoo($pdo);

// Insertion d'une ville
// $ville->insert(new Ville(0, "59100", "Armentières"));

// Suppression d'une ville
// $villeDao->delete(48);

// Selection d'une ville
// $ville = $villeDao->selectOne(1);

// echo '<pre>';
// var_dump($ville);
// echo '</pre>';

// echo "{$ville->getIdVille()} <br>";
// echo "{$ville->getCpVille()} <br>";
// echo "{$ville->getNomVille()} <br>";

// Mise à jour d'une ville 
// $villeMAJ = new Ville(1, "59100", "Armentières");
// echo $villeDao->update($villeMAJ) . " ligne(s) mise à jour";

// A faire Select ALL
// boucle sur un tableau (liste de villes)
// ...

// Sélection de toutes les villes
$villes = $villeDao->selectAll();

// Affichage des informations de chaque ville
foreach ($villes as $ville) {
    echo "ID: {$ville->getIdVille()}, CP: {$ville->getCpVille()}, Nom: {$ville->getNomVille()} <br>";
}
