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
$adherentDAO = new AdherentDAOPoo($pdo);



// $newAdherent = new Adherent(
//     0,
//     "tonton",
//     " jean",
//     "267  avenue loius",
//     "pierre@mail.com",
//     "03.20.20.20.20",
//     "26/12/1972",
//     101,
//     "aBB123"

// );
// // Insertion d'un adherent
// // $adherentDao->insert($newAdherent);


// // Suppression d'un adherent
// // $adherentDao->delete(89);

// // Selection d'un adherent
// //$adherent = $adherentDao->selectOne(101);

// // echo '<pre>';
// // var_dump($adherent);
// // echo '</pre>';



// // Mise à jour d'un adherent 
// // echo "Avant la mise à jour <br>";

// // Mise à jour d'un adherent 
// // $adherentMAJ = new Adherent(
// // 101, // Utilisez l'identifiant correct de l'adhérent que vous souhaitez mettre à jour
// // "lulu",
// // "popo",
// // "267 avenue marc",
// // "pierre@orange.com",
// // "03.10.10.20.20",
// // "26/12/1995",
// // 62,
// // "aBB1al"
// // );

// // $resultUpdate = $adherentDao->update($adherentMAJ);

// // echo $resultUpdate . " ligne(s) mise à jour <br>";

// // A faire Select ALL
// // boucle sur un tableau (liste de adherents)
// // ...

// // Sélection de toutes les adherents
// $adherents = $adherentDao->selectAll();

// // Affichage des informations de chaque adherent
// foreach ($adherents as $adherent) {
// echo "ID: {$adherent->getNomAdherent()},
//  CP: {$adherent->getPrenomAdherent()},
// Nom: {$adherent->getAdresseAdherent()},
// Nom: {$adherent->getEmailAdherent()},
// Nom: {$adherent->getTelephoneAdherent()},
// Nom: {$adherent->getDateNaissanceAdherent()},
// Nom: {$adherent->getIdVilleAdherent()},
// Nom: {$adherent->getPasswordAdherent()},
// :   <br>";
// }

//test authentification adherent
// $email = "david.houziaux@wanadoo.fr";
// $password = "Acc123";
// $adherent = $adherentDao->findUserByEmailAndPassword($email, $password);
// var_dump($adherent);
// Testez findUserByRememberToken
// Testez findUserByRememberToken
$rememberToken = 'exemple_remember_token';
$userByRememberToken = $adherentDAO->findUserByRememberToken($rememberToken);
print_r($userByRememberToken);

// Testez findUserByEmailAndPassword
$email = 'exemple@email.com';
$password = 'exemple_mot_de_passe';
$userByEmailAndPassword = $adherentDAO->findUserByEmailAndPassword($email, $password);
print_r($userByEmailAndPassword);

// Testez createRememberToken
$tokenGenere = $adherentDAO->createRememberToken();
echo "Token généré : $tokenGenere\n";

// Testez storeRememberTokenForUser
$idUtilisateur = 100; // Remplacez par un ID utilisateur valide
$stockageReussi = $adherentDAO->storeRememberTokenForUser($idUtilisateur, $tokenGenere);
echo $stockageReussi ? "Token mémorisé avec succès\n" : "Échec de la mémorisation du token\n";
