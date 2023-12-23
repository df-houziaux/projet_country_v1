<?php

function validationNomOuPrenom($chaine)
{
    $motif = "/^[a-zA-Z ]{2,50}$/";

    $ok = preg_match($motif, $chaine);

    return $ok;
}
function validationCivilite($civilite)
{
    if ($civilite === null) {
        return "La saisie de la civilité est obligatoire !";
    } else {
        return "Civilite : $civilite";
    }
}
