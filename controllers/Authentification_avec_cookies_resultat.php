<?php

// AuthentificationCTRL.php
file: ///c%3A/xampp/htdocs/projet_country/views/Header.php
header("Content-Type: text/html; charset=UTF-8");

$message = "";
$COOKIE_mail = filter_input(INPUT_COOKIE, "email");
$COOKIE_pass = filter_input(INPUT_COOKIE, "mdp");
$email = filter_input(INPUT_POST, "email");
$mdp = filter_input(INPUT_POST, "mdp");
$resterCo = filter_input(INPUT_POST, "resteCo");
if ($resterCo = !null) {
    setCookie("email", $email, time() + (3600 * 24 * 7));
    setCookie("motdepasse", $mdp, time() + (3600 * 24 * 7));
} else {
    setCookie("email", "", time());
    setCookie("motdepasse", "", time());
}

if ($email != null && $mdp != null) {
    try {
        /*
         * Connexion
         */
        $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=projet_country;", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");

        // Le SELECT
        $select = "SELECT * FROM adherent WHERE email=? AND password=?";
        // Compilation du SELECT
        $curseur = $pdo->prepare($select);
        // Valorisation des paramètres
        $curseur->bindParam(1, $email);
        $curseur->bindParam(2, $mdp);
        // Exécution du SELECT
        $curseur->execute();
        // Récupération ou pas d'un enregistrement
        // http://php.net/manual/fr/pdostatement.fetch.php
        $enregistrement = $curseur->fetch();
        if ($enregistrement === FALSE) {
            $message = "KO, vous n'êtes pas connecté(e)";
            setcookie("pseudo", "", time());
            setcookie("mdp", "", time());
        } else {
            $message = "OK, vous êtes connecté(e)";
            $seSouvenirDeMoi = filter_input(INPUT_POST, "seSouvenirDeMoi");
            if ($seSouvenirDeMoi != null) {
                setcookie("pseudo", $pseudo, time() + (3600 * 24 * 14)); // Deux semaines
                // Pas très sécure !!!
                setcookie("mdp", $mdp, time() + (3600 * 24 * 14));
            } else {
                setcookie("pseudo", "", time());
                setcookie("mdp", "", time());
            }
        }
    } catch (Exception $e) {
        $message = "Erreur : " . $e->getMessage() . "<br>";
    }
    $pdo = null;
} else {
    if (isset($pseudo)) {
        $message = "Toutes les saisies sont obligatoires !!!";
    }
}

include "../views/Authentification_avec_cookies.php";
