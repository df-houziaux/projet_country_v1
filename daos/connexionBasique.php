<?php

function getConnection(string $host, string $db, string $user, string $pwd): PDO
{
    try {
        // Connexion ... dans tous les cas
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        echo $e;
        $pdo = null;
    }
    return $pdo;
}

function connectionWithIniFile(string $psCheminParametresConnexion): PDO
{
    $tProprietes = parse_ini_file($psCheminParametresConnexion);

    $protocole = $tProprietes["protocole"];
    $serveur = $tProprietes["serveur"];
    $port = $tProprietes["port"];
    $ut = $tProprietes["ut"];
    $mdp = $tProprietes["mdp"];
    $bd = $tProprietes["bd"];

    /*
     * Connexion
     */
    $pdo = null;
    try {
        $pdo = new PDO("$protocole:host=$serveur;port=$port;dbname=$bd;", $ut, $mdp);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $pdo->exec("SET NAMES 'UTF8'");
    } catch (PDOException $ex) {
        //echo "<br>" .   $ex->getMessage();
    }
    return $pdo;
}
/**
 *
 * @param PDO $pdo
 */
function seDeconnecter(PDO &$pdo)
{
    $pdo = null;
}
