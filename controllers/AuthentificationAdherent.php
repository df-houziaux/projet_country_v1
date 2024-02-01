<?php
// Dans votre fichier de contrôleur (AuthentificationCTRL.php ou similaire)

session_start();

include '../daos/Connexion.php';
include '../daos/AdherentDAOPoo.php';

$AdherentDAOPoo = new AdherentDAOPoo(32);

// Fonction pour générer le Remember Token
function generateRememberToken()
{
    // Générer un jeton unique (vous pouvez utiliser votre propre algorithme ou une bibliothèque)
    $rememberToken = bin2hex(random_bytes(32)); // Exemple utilisant random_bytes

    return $rememberToken;
}

// Fonction pour connecter l'utilisateur
function loginUser($email, $password, $remember, $AdherentDAOPoo)
{
    $user = $AdherentDAOPoo->findUserByEmailAndPassword($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nom'];

        if ($remember) {
            // Générer un nouveau remember_token
            $remember_token = generateRememberToken();

            // Stocker le remember_token dans la base de données pour l'utilisateur
            $AdherentDAOPoo->storeRememberTokenForUser($user['id'], $remember_token);

            // Envoyer le remember_token au navigateur de l'utilisateur comme un cookie
            setcookie('remember_token', $remember_token, time() + 60 * 60 * 24 * 7);
        }
    }
}

// Vérifier si l'utilisateur a un cookie remember_token
if (isset($_COOKIE['remember_token'])) {
    // Rechercher l'utilisateur dans la base de données en utilisant le token
    $remember_token = $_COOKIE['remember_token'];
    $user = $AdherentDAOPoo->findUserByRememberToken($remember_token);

    if ($user) {
        // Connecter l'utilisateur
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nom'];
    }
}

// Lorsque l'utilisateur tente de se connecter
if (isset($_POST['btValider'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $remember = isset($_POST['remember_me']);

    if (!empty($email) && !empty($password)) {
        loginUser($email, $password, $remember, $AdherentDAOPoo);
    } else {
        $message = "Toutes les saisies sont obligatoires !!!";
    }
}

include '../views/AuthentificationIHM.php';
