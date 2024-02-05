<?php
//http://localhost/projet_country/daos/villeDAOPooTest.php
/**
 * Description of DAOvilles
 * DAOvilles.php
 * @author Administrateur
 */

declare(strict_types=1);

require_once 'AdherentDAOPoo.php';
require_once 'Connexion.php';
require_once '../models/Adherent.php';
$cnx = new Connexion();
$pdo = $cnx->seConnecter("projet_country.ini");
$adherentDao = new AdherentDAOPoo($pdo);


$newAdherent = new Adherent(
    0,
    "tonton",
    " jean",
    "267  avenue loius",
    "pierre@mail.com",
    "03.20.20.20.20",
    "26/12/1972",
    101,
    "aBB123"

);
// Insertion d'un adherent
// $adherentDao->insert($newAdherent);


// Suppression d'un adherent
// $adherentDao->delete(89);

// Selection d'un adherent
//$adherent = $adherentDao->selectOne(101);

// echo '<pre>';
// var_dump($adherent);
// echo '</pre>';



// Mise à jour d'un adherent 
// echo "Avant la mise à jour <br>";

// Mise à jour d'un adherent 
// $adherentMAJ = new Adherent(
// 101, // Utilisez l'identifiant correct de l'adhérent que vous souhaitez mettre à jour
// "lulu",
// "popo",
// "267 avenue marc",
// "pierre@orange.com",
// "03.10.10.20.20",
// "26/12/1995",
// 62,
// "aBB1al"
// );

// $resultUpdate = $adherentDao->update($adherentMAJ);

// echo $resultUpdate . " ligne(s) mise à jour <br>";

// A faire Select ALL
// boucle sur un tableau (liste de adherents)
// ...

// Sélection de toutes les adherents
$adherents = $adherentDao->selectAll();

// Affichage des informations de chaque adherent
foreach ($adherents as $adherent) {
    echo "ID: {$adherent->getNomAdherent()},
     CP: {$adherent->getPrenomAdherent()},
      Nom: {$adherent->getAdresseAdherent()},
      Nom: {$adherent->getEmailAdherent()},
      Nom: {$adherent->getTelephoneAdherent()},
      Nom: {$adherent->getDateNaissanceAdherent()},
      Nom: {$adherent->getIdVilleAdherent()},
      Nom: {$adherent->getPasswordAdherent()},
    // :   <br>";
}
