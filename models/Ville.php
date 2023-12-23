<?php
// Ville.php

class Ville
// liste des attributs,ils sont privés et typés (depuis php8)
// les attribut sont privés pour qu onne puissse pas y accéder directement
// mais inderectement via les setters ou contructeur en ecriture 
// et que l on puisse justement via les settes et 
// le contructeur controler les donnees entrantes
{
    private int $idVille;
    private string $cpVille;
    private string $nomVille;

    public function __construct(int $idVille = 0, string $cpVille = "", string $nomVille = "")
    {
        $this->idVille = $idVille;
        $this->cpVille = $cpVille;
        $this->nomVille = $nomVille;
    }

    public function setIdVille(int $idVille): void
    {
        $this->idVille = $idVille;
    }

    public function getIdVille(): int
    {
        return $this->idVille;
    }

    public function setCpVille(string $cpVille): void
    {
        $this->cpVille = $cpVille;
    }

    public function getCpVille(): string
    {
        return $this->cpVille;
    }

    public function setNomVille(string $nomVille): void
    {
        $this->nomVille = $nomVille;
    }

    public function getNomVille(): string
    {
        return $this->nomVille;
    }
}
