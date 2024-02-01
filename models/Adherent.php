<?php

class Adherent
{
    // Propriétés privées représentant les caractéristiques de l'adhérent
    private $idAdherent;
    private $nomAdherent;
    private $prenomAdherent;
    private $adresseAdherent;
    private $emailAdherent;
    private $telephoneAdherent;
    private $dateNaissanceAdherent;
    private $idVilleAdherent;
    private $passwordAdherent;

    // Constructeur de la classe Adherent
    public function __construct(
        $idAdherent,
        $nomAdherent,
        $prenomAdherent,
        $adresseAdherent,
        $emailAdherent,
        $telephoneAdherent,
        $dateNaissanceAdherent,
        $idVilleAdherent,
        $passwordAdherent
    ) {
        // Initialisation des propriétés de l'objet Adherent avec les valeurs fournies
        $this->idAdherent = $idAdherent;
        $this->nomAdherent = $nomAdherent;
        $this->prenomAdherent = $prenomAdherent;
        $this->adresseAdherent = $adresseAdherent;
        $this->emailAdherent = $emailAdherent;
        $this->telephoneAdherent = $telephoneAdherent;
        $this->dateNaissanceAdherent = $dateNaissanceAdherent;
        $this->idVilleAdherent = $idVilleAdherent;
        $this->passwordAdherent = $passwordAdherent;
    }

    // Méthodes Getters pour accéder aux propriétés privées depuis l'extérieur de la classe

    public function getIdAdherent()
    {
        return $this->idAdherent;
    }

    public function getNomAdherent()
    {
        return $this->nomAdherent;
    }

    public function getPrenomAdherent()
    {
        return $this->prenomAdherent;
    }

    public function getAdresseAdherent()
    {
        return $this->adresseAdherent;
    }

    public function getEmailAdherent()
    {
        return $this->emailAdherent;
    }

    public function getTelephoneAdherent()
    {
        return $this->telephoneAdherent;
    }

    public function getDateNaissanceAdherent()
    {
        return $this->dateNaissanceAdherent;
    }

    public function getIdVilleAdherent()
    {
        return $this->idVilleAdherent;
    }

    public function getPasswordAdherent()
    {
        return $this->passwordAdherent;
    }
}
