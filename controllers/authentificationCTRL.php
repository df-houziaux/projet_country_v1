<?php

header("Content-Type: text/html; charset=UTF-8");

$message = "";

$email = filter_input(INPUT_GET, "email");
$mdp = filter_input(INPUT_GET, "pass");

$btnSubmit = filter_input(INPUT_GET, "btValider");

if ($btnSubmit && $email != null && $mdp != null) {
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
            $message = "Email ou mot de passe incorrect";
        } else {
            $message = "Connecté avec succès";
            header("Location: ../views/index.php?success=1");
            exit;
        }
        $curseur->closeCursor();
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage() . "<br>";
    }
    $pdo = null;
} else {
    $message = "Toutes les saisies sont obligatoires !!!";
}

include "../views/authentification.php";
