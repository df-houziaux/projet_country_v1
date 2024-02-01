<?php


class Ville

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
