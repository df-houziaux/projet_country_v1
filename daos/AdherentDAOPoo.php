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
    public function selectAllAdherent()
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
}
