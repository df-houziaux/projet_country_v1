<?php
// Inclusion du fichier de vérification des entrées
include_once "../lib/verifInput.php";

// Récupération des données du formulaire avec la méthode GET
$civilite = filter_input(INPUT_GET, "civilite");
$nom = filter_input(INPUT_GET, "nom");
$prenom = filter_input(INPUT_GET, "prenom");
$dateDeNaissance = filter_input(INPUT_GET, "date_de_naissance");
$telephone = filter_input(INPUT_GET, "telephone");
$email1 = filter_input(INPUT_GET, "email1");
$email2 = filter_input(INPUT_GET, "email2");
$mot_de_passe_1 = filter_input(INPUT_GET, "mot_de_passe_1");
$mot_de_passe_2 = filter_input(INPUT_GET, "mot_de_passe_2");
$adresse = filter_input(INPUT_GET, "adresse");
$ville = filter_input(INPUT_GET, "ville");
$cp = filter_input(INPUT_GET, "cp");

$villeSelect = "";
$cityResult = "";

try {
    // Connexion
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projet_country", "root", "");
    // Les erreurs sont gérées comme des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // bd <-> TUYAU <-> page
    $pdo->exec("SET NAMES 'UTF8'");

    // Exécution du SELECT SQL
    $select = "SELECT id_ville, nom_ville FROM ville";
    $curseur = $pdo->query($select);
    // curseur = tableau ordinal
    //$curseur->setFetchMode(PDO::FETCH_NUM);
    // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
    // curseur = tableau 2D , enr = tableau 1D
    foreach ($curseur as $enregistrement) {
        // Récupération des valeurs par concaténation et interpolation
        $villeSelect .= "<option value='$enregistrement[0]'>$enregistrement[1]</option>\n";
    }
    // Fermeture du curseur (facultatif)
    $curseur->closeCursor();
}
// Gestion des erreurs
catch (PDOException $e) {
    // On affecte une constante littérale et on concatène le résultat de la méthode getMessage()
    // de l'objet $e de la classe PDOException
    $message = 'Echec de l\'exécution : ' . $e->getMessage();
}
// Initialisation des messages de succès et d'erreur
$messageok = "";
$messageko = "";

// Vérification de la saisie de la civilité
if ($civilite == null) {
    $messageko .= "La saisie de la civilité est obligatoire ! <br>";
} else {
    $ok = validationCivilite($civilite);
}

// Vérification de la saisie du nom
if ($nom == null) {
    $messageko .= "La saisie du nom est obligatoire ! <br>";
} else {
    // Validation du nom avec une expression régulière
    $ok = validationNomOuPrenom($nom);

    // On vérifie le code retour de preg_match
    // Est-ce que le nom est au bon format attendu ?
    if ($ok == 1) {
        $messageok .= "Nom : $nom <br>";
    } else {
        $messageko .= "Le nom {$nom} n'est pas au bon format <br>";
    }
}

// Vérification de la saisie du prénom
if ($prenom == null) {
    $messageko .= "La saisie du prénom est obligatoire ! <br>";
} else {
    // Validation du prénom avec une expression régulière
    $ok = validationNomOuPrenom($prenom);
    if ($ok == 1) {
        $messageok .= "Nom : $prenom <br>";
    } else {
        $messageko .= "Le prénom {$prenom} n'est pas au bon format <br>";
    }
}

// Vérification de la saisie de la date de naissance
if ($dateDeNaissance == null) {
    $messageko .= "Veuillez saisir votre date de naissance. <br>";
} else {
    // Validation de la date de naissance avec une expression régulière
    $motif = "/^[0-9]{4}[\/\-\.]{1}[0-9]{2}[\/\-\.]{1}[0-9]{2}/";

    $ok = preg_match($motif, $dateDeNaissance);
    if ($ok == 1) {
        $messageok .= "Nom : $dateDeNaissance <br>";
    } else {
        $messageko .= "La date de naissance {$dateDeNaissance} n'est pas au bon format <br>";
    }
}
// Vérification de la saisie du téléphone
if ($telephone == null) {
    $messageko .= "La saisie du téléphone est obligatoire ! <br>";
} else {
    // Validation du téléphone avec une expression régulière
    $motif = "/^[0-9]{2}[-.][0-9]{2}[-.][0-9]{2}[-.][0-9]{2}[-.][0-9]{2}$/";
    $ok = preg_match($motif, $telephone);
    if ($ok == 1) {
        $messageok .= "Téléphone : $telephone <br>";
    } else {
        $messageko .= "Le téléphone {$telephone} n'est pas au bon format <br>";
    }
}

// Vérification de la saisie de l'e-mail
if ($email1 === null) {
    $messageko .= "Veuillez saisir votre e-mail. <br>";
} elseif ($email1 !== $email2) {
    $messageko .= "Les adresses e-mail ne correspondent pas. <br>";
} else {
    // Validation de l'e-mail avec une expression régulière
    $motifLocal = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $ok = preg_match($motifLocal, $email1);



    if ($ok === 1) {
        $messageok .= "E-mail : $email1 <br>";
    } else {
        $messageko .= "L'e-mail {$email1} n'est pas au bon format <br>";

        // Ajout d'un message de débogage
        echo "Validation de l'e-mail a échoué. Motif local : $motifLocal <br>";
    }
}

// Vérification de la saisie et de la correspondance des mots de passe
if ($mot_de_passe_1 == null || $mot_de_passe_2 == null) {
    $messageko .= "Veuillez saisir votre mot de passe dans les deux champs. <br>";
} elseif ($mot_de_passe_1 != $mot_de_passe_2) {
    $messageko .= "Les mots de passe ne correspondent pas. <br>";
} else {
    // Validation du mot de passe avec une expression régulière
    $motif = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{2,10}$/";

    $ok = preg_match($motif, $mot_de_passe_1);
    if ($ok == 1) {
        $messageok .= "Mot de passe : $mot_de_passe_1 <br>";
    } else {
        $messageko .= "Le mot de passe {$mot_de_passe_1} n'est pas au bon format <br>";
    }
}

// Vérification de la saisie de l'adresse
if ($adresse == null) {
    $messageko .= "La saisie de l'adresse est obligatoire ! <br>";
} else {
    $messageok .= "Adresse : $adresse <br>";
}

// Vérification de la saisie de la ville
if ($ville == null) {
    $messageko .= "La saisie de la ville est obligatoire ! <br>";
} else {
    $messageok .= "Ville : $ville <br>";
}

// Vérification de la saisie du code postal
if ($cp == null) {
    $messageko .= "La saisie du code postal est obligatoire ! <br>";
} else {
    // Validation du code postal avec une expression régulière
    $motif = "/^[0-9]{5}$/";
    $ok = preg_match($motif, $cp);

    if ($ok == 1) {
        $messageok .= "Code postal : $cp <br>";
    } else {
        $messageko .= "Code postal {$cp} n'est pas au bon format <br>";
    }
}

if (empty($messageko)) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_country";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO adherent 
                (nom_adherent, prenom_adherent, adresse, email, telephone, date_naissance, id_ville, password) 
        VALUES  (:nom, :prenom, :adresse, :email1, :tel, :dateDeNaissance, :id_ville, :mot_de_passe_1)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':email1', $email1);
        $stmt->bindParam(':tel', $telephone);
        $stmt->bindParam(':dateDeNaissance', $dateDeNaissance);
        $stmt->bindParam(':id_ville', $ville);
        $stmt->bindParam(':mot_de_passe_1', $mot_de_passe_1);

        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

include '../views/inscription.php';
