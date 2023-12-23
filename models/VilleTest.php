<?php
// testVille.php

require_once("Ville.php");

// Création des objets
$Armentieres = new Ville(1, "59280", "Armentieres");
$Lille = new Ville(2, "59000", "Lille");
$Houplines = new Ville(3, "59116", "Houplines");

// Affichage des villes
echo "Armentieres : " . $Armentieres->getIdVille() . ", " . $Armentieres->getCpVille() . ", " . $Armentieres->getNomVille() . "<br>";
echo "Lille : " . $Lille->getIdVille() . ", " . $Lille->getCpVille() . ", " . $Lille->getNomVille() . "<br>";
echo "Houplines : " . $Houplines->getIdVille() . ", " . $Houplines->getCpVille() . ", " . $Houplines->getNomVille() . "<br>";
