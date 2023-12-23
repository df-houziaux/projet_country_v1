<?php

/* 
 * ConnexionTests.php
 * http://localhost/projet_country/daos/ConnexionTests.php
 */

require_once './Connexion.php';

try {
    // Connexion
    $cnx = new Connexion();
    $pdo = $cnx->seConnecter("projet_country.ini");
    var_dump($pdo);
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
