<?php
// AdherentDAOPoo.php
class AdherentDAOPoo
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // AdherentDAOPoo.php
    public function selectAll()
    {
        $sql = "SELECT * FROM adherent";
        $stmt = $this->pdo->query($sql);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $adherents = [];
        foreach ($results as $row) {
            $adherent = new Adherent(
                $row['id_adherent'],
                $row['nom_adherent'],
                $row['prenom_adherent'],
                $row['adresse'],
                $row['email'],
                $row['telephone'],
                $row['date_naissance'],
                $row['id_ville'],
                $row['password']
            );
            array_push($adherents, $adherent);
        }
        return $adherents;
    }

    public function selectAllVilles()
    {
        $sql = "SELECT * FROM ville";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($id)
    {
        $sql = "SELECT * FROM adherent WHERE id_adherent = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $idAdherent = $result["id_adherent"];
        $nomAdherent = $result["nom_adherent"];
        $prenomAdherent = $result["prenom_adherent"];
        $adresse = $result["adresse"];
        $email = $result["email"];
        $telephone = $result["telephone"];
        $dateNaissance = $result["date_naissance"];
        $idVille = $result["id_ville"];
        $password = $result["password"];

        $adherent = new Adherent(
            $idAdherent,
            $nomAdherent,
            $prenomAdherent,
            $adresse,
            $email,
            $telephone,
            $dateNaissance,
            $idVille,
            $password
        );

        return $adherent;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM adherent WHERE id_adherent = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($adherent)
    {
        $sql = "INSERT INTO adherent (nom_adherent, prenom_adherent, adresse, email, telephone, date_naissance, id_ville, password)
                VALUES (:nom, :prenom, :adresse, :email, :telephone, :date_naissance, :id_ville, :password)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nom', $adherent->getNomAdherent());
        $stmt->bindValue(':prenom', $adherent->getPrenomAdherent());
        $stmt->bindValue(':adresse', $adherent->getAdresseAdherent());
        $stmt->bindValue(':email', $adherent->getEmailAdherent());
        $stmt->bindValue(':telephone', $adherent->getTelephoneAdherent());
        $stmt->bindValue(':date_naissance', $adherent->getDateNaissanceAdherent());
        $stmt->bindValue(':id_ville', $adherent->getIdVilleAdherent());
        $stmt->bindValue(':password', $adherent->getPasswordAdherent());
        $stmt->execute();
    }

    public function update($adherent)
    {
        $sql = "UPDATE adherent
                SET nom_adherent    = :nom, 
                    prenom_adherent = :prenom, 
                    adresse         = :adresse, 
                    email           = :email,
                    telephone       = :telephone, 
                    date_naissance  = :date_naissance, 
                    id_ville        = :id_ville, 
                    password        = :password
                WHERE id_adherent   = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nom', $adherent->getNomAdherent());
        $stmt->bindValue(':prenom', $adherent->getPrenomAdherent());
        $stmt->bindValue(':adresse', $adherent->getAdresseAdherent());
        $stmt->bindValue(':email', $adherent->getEmailAdherent());
        $stmt->bindValue(':telephone', $adherent->getTelephoneAdherent());
        $stmt->bindValue(':date_naissance', $adherent->getDateNaissanceAdherent());
        $stmt->bindValue(':id_ville', $adherent->getIdVilleAdherent(), PDO::PARAM_INT);
        $stmt->bindValue(':password', $adherent->getPasswordAdherent());
        $stmt->bindValue(':id', $adherent->getIdAdherent(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function findUserByRememberToken($remember_token)
    {
        $sql = "SELECT * FROM adherent WHERE remember_token = :remember_token";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':remember_token', $remember_token);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findUserByEmailAndPassword($email, $password)
    {
        $sql = "SELECT * FROM adherent WHERE email = :email AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createRememberToken()
    {
        // Générer un jeton unique
        $rememberToken = uniqid('token_', true);

        // Retourner le jeton
        return $rememberToken;
    }

    public function storeRememberTokenForUser($user_id, $remember_token)
    {
        $sql = "UPDATE adherent SET remember_token = :remember_token WHERE id_adherent = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':remember_token', $remember_token);
        $stmt->bindValue(':user_id', $user_id);

        // Ajoutez ces messages de débogage
        echo "Avant l'exécution de la requête\n";

        if ($stmt->execute()) {
            echo "Requête exécutée avec succès\n";
            echo "Nombre de lignes affectées : " . $stmt->rowCount() . "\n";

            if ($stmt->rowCount() == 0) {
                echo "Aucune ligne mise à jour. Vérifiez si l'utilisateur avec ID $user_id existe.\n";
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . implode(", ", $stmt->errorInfo()) . "\n";
        }
    }
}
