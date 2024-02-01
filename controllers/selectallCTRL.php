<?php
// Connexion à la base de données
$pdo = connectionWithIniFile("../conf/projet_country.ini");

try {
    // Requête SQL pour récupérer tous les enregistrements de la table
    $sql = "SELECT * FROM  ville";

    // Exécution de la requête
    $resultat = $pdo->query($sql);

    // Traitement des résultats
    foreach ($resultat as $enregistrement) {
        // Traitement de chaque ligne de résultat
        // on peut accéder aux colonnes de chaque enregistrement comme $enregistrement['nom_colonne']
        // par exemple, $enregistrement['nom_client'], $enregistrement['prenom_client'], etc.
    }

    // Fermeture du curseur (facultatif)
    $resultat->closeCursor();
} catch (PDOException $e) {
    // Gestion des erreurs
    $messageErreur = 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$pdo = null;
include '../views/insertViews.php';
