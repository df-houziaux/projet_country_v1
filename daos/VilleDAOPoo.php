<?php

declare(strict_types=1);

require_once '../models/Ville.php';

class VilleDAOPoo
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertVille(Ville $ville): int
    {
        $affected = 0;
        try {
            $insertQuery = "INSERT INTO ville(cp, nom_ville) VALUES (?, ?)";
            $statement = $this->pdo->prepare($insertQuery);
            $statement->bindValue(1, $ville->getCpVille());
            $statement->bindValue(2, $ville->getNomVille());
            $statement->execute();

            $affected = $statement->rowCount();
        } catch (PDOException $e) {
            // Gérer les erreurs de manière appropriée, par exemple, log ou renvoyer une exception
            echo $e->getMessage(); //afficher un message erreur
            $affected = -1;
        }
        return $affected;
    }

    public function deleteVille(int $id): int
    {
        /**la méthode delete a un seul argument qui est l objet a géré
         * elle renvoie un int qui est le nombre de ligne suppriméé dans la table
         */
        $affected = 0;
        try {
            $deleteQuery = "DELETE FROM ville WHERE id_ville = ?";
            $statement = $this->pdo->prepare($deleteQuery);
            $statement->bindValue(1, $id);
            $statement->execute();

            $affected = $statement->rowCount();
        } catch (PDOException $e) {
            // Gérer les erreurs de manière appropriée, par exemple, log ou renvoyer une exception
            echo $e->getMessage(); // Afficher un message d'erreur
            $affected = -1;
        }
        return $affected;
    }

    /*
*signiature  dune methode : visibilité  function nom de fonction (type arguemnt 1,type arguent 2):type
*les parametres eventuellement initialises avec des valeurs neutres si ils sont facultatifs
*la méthode UPDATE reçois en parametre un objet et a un retour de type int (le nombre de lignes modifiee)
*/


    // UPDATE « la table » SET colonne1 = valeur1, colonne2 = valeur2 WHERE PK = valeur
    /*
    * Signature d'une methode : visibilité(private ou public) function nomDeFonction(type argument1, type argument2): type
    * Les parametres sont éventuellement initialisés avec des valeurs neutres si ils sont facultatifs
    * La méthode UPDATE reçoit en parametre un objet et a un retour de type int(le nombre de lignes modifiées)
    */

    public function updateVille(Ville $villes): int
    {
        $affected = 0;
        try {
            //Syntaxe : UPDATE « la table » SET colonne1 = valeur1, colonne2 = valeur2 WHERE PK = valeur
            $sql = "UPDATE ville SET cp = ?, nom_ville = ? WHERE id_ville = ?";
            // On sollicite la methode prepare() qui compile l'ordre SQL de l'objet pdo
            // L'objet pdo est un attribut de la classe Ville
            $cmd = $this->pdo->prepare($sql);
            // On valorise les valeurs des parametres de la requête SQL
            // Liaison entre le parametre 1 et la valeur récupérée dans l'objet Ville grâce à un getter
            $cmd->bindValue(1, $villes->getCpVille());
            $cmd->bindValue(2, $villes->getNomVille());
            $cmd->bindValue(3, $villes->getIdVille());
            // On execute la requête SQL
            $cmd->execute();
            // On récupère le nombre de ligne(s) modifiée(s)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            /*
    *On écrit dans le catch : affichage du message d’erreur : $e→getMessage()… 
    *On sollicite la methode getMessage() de l’objet $e qui est de la classe PDOException.
    */
            echo $e->getMessage();
            $affected = -1;
        }
        return $affected;
    }
    public function selectOneVille(int $ville): Ville
    {
        try {
            $cursor = $this->pdo->prepare("SELECT * FROM ville WHERE id_ville = ?");
            $cursor->bindParam(1, $ville);
            $cursor->execute();
            $record = $cursor->fetch();

            if ($record != null) {
                // Utilisation du constructeur de Ville pour créer un objet Ville
                $ville = new Ville($record['id_ville'], $record['cp'], $record['nom_ville']);
            } else {
                // Si la ligne n'est pas trouvée, créer une Ville avec des valeurs par défaut
                $ville = new Ville(0, "Introuvable");
            }

            $cursor->closeCursor();
        } catch (PDOException $e) {
            // En cas d'erreur, créer une Ville avec un code d'erreur et le message d'erreur
            $ville = new Ville(-1, $e->getMessage());
        }

        return $ville;
    }
    public function selectAllVille(): array
    {
        try {
            // Initialiser un tableau pour stocker les objets Ville
            $villes = [];
            // Construire la requête SQL de sélection
            $requêteSélection = "SELECT * FROM ville";
            // Exécuter la requête SQL
            $instruction = $this->pdo->query($requêteSélection);
            // Parcourir chaque enregistrement retourné par la requête
            while ($enregistrement = $instruction->fetch()) {
                // Créer un objet Ville à partir des données de l'enregistrement

                $ville = new Ville($enregistrement['id_ville'], $enregistrement['cp'], $enregistrement['nom_ville']);
                // Ajouter l'objet Ville au tableau des villes
                $villes[] = $ville;
            }
            // Fermer le curseur de la requête
            $instruction->closeCursor();
        } catch (PDOException $e) {
            // En cas d'erreur, afficher le message d'erreur et initialiser le tableau des villes
            echo $e->getMessage();
            $villes = [];
        }
        // Retourner le tableau des villes
        return $villes;
    }
}
