<?php

declare(strict_types=1);
//VillesDAO.php
/*
 * VillesDAO.php
 */

/*
Règles :
Action
IN
OUT
SelectAll

Les données de la table sous forme de tableau 2D (une matrice).
 * 
 * 
SelectOne
La PK.
Les données correspondantes, une ligne de table sous forme de tableau 1D (un vecteur)
 * 
 * 
 * 
Insert
Les valeurs pour toutes les colonnes sauf pour la PK si celle-ci est de type INT auto-incrémenté.
Le nombre de lignes ajoutées (par défaut et par principe 1 ou une erreur).
 * 
 * 
 * 
Delete
La PK.
Le nombre de lignes supprimées (par défaut et par principe 1 ou 0 ou une erreur).
 * 
 * 
Update
La PK et les données à modifier. La PK n’est pas modifiable.
Le nombre de lignes modifiées (par défaut et par principe 1 ou 0 ou une erreur).

 */

/**
 *
 * @param PDO $pdo
 * @return array
 */
function selectAllVille(PDO $pdo): array
{
    /*
     * Renvoie un tableau ordinal de tableaux associatifs
     */
    $list = array();
    try {
        $cursor = $pdo->query("SELECT * FROM ville");
        // Renvoie un tableau ordinal de tableaux associatifs
        $list = $cursor->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $message = array("message" => $e->getMessage());
        $list[] = $message;
    }
    return $list;
}

/**
 *
 * @param PDO $pdo
 * @param string $id
 * @return array
 */
function selectOne(PDO $pdo, int $id): array
{
    /*
     * Renvoie un tableau associatif
     */
    try {
        $sql = "SELECT * FROM ville WHERE id_ville = ?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $id);
        $cursor->execute();
        // Renvoie un tableau associatif
        $line = $cursor->fetch(PDO::FETCH_ASSOC);
        if ($line === FALSE) {
            $line["message"] = "Enregistrement inexistant !";
        }
        $cursor->closeCursor();
    } catch (PDOException $e) {
        //$line["Error"] = $e->getMessage();
        $line["Error"] = "Une erreur s'est produite, veuillez téléphoner à votre administrateur de BD, monsieur Antonino !!!";
    }
    return $line;
}

/**
 *
 * @param PDO $pdo
 * @param array $tAttributesValues
 * @return int
 */
function insert(PDO $pdo, array $tAttributesValues): int
{
    /**la méthode delete a un seul argument qui est l objet a géré
     * elle renvoie un int qui est le nombre de ligne suppriméé dans la 
     */
    $affected = 0;
    try {
        $sql = "INSERT INTO ville (cp,nom_ville) VALUES (?,?)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $tAttributesValues["cp"]);
        $statement->bindValue(2, $tAttributesValues["nom_ville"]);
        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        echo $e->getMessage();
        $affected = -1;
    }
    return $affected;
}

/**
 *
 * @param PDO $pdo
 * @param string $id
 * @return int
 */
// :int est le type de retour de la fonction donc de la variable $affected
function delete(PDO $pdo, int $id): int
{
    $affected = 0;
    try {
        $sql = "DELETE FROM ville WHERE id_ville = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}

function update(PDO $pdo, array $data, int $id): int
{
    $affected = 0;

    try {
        $sql = "UPDATE ville 
                SET    nom_ville=?, 
                       cp=? 
                WHERE  id_ville=?
                ";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(1, $data["nom_ville"]);
        $statement->bindValue(2, $data["cp"]);
        $statement->bindValue(3, $id);

        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        $affected = -1;
    }
    return $affected;
}
