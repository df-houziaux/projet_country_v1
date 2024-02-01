<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Déclaration de l'encodage et du titre de la page -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Insertion dans unetable nom_ville</title>
    <!-- Liens vers les feuilles de style -->
    <link rel="stylesheet" href="../css/inscription.css">
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Préchargement des polices depuis Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Conteneur principal de la page -->
    <div class="container">
        <!-- Formulaire d'inscription avec la méthode POST et action vers le contrôleur PHP -->
        <fieldset>
            <form action="../controllers/insertCTRL.php" method="POST" class="form">
                <div class="titreformulaire">
                    <h1>Insertion d'une ville dans la table ville</h1>
                </div>
                <!-- Champ pour le code postal -->
                <div class="form-element">
                    <label for="cp">Code postal:</label>
                    <div>
                        <input type="text" name="cp" id="cp" autofocus value="59280">
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <!-- Champ pour le nom de la ville -->
                <div class="form-element">
                    <label for="nom_ville">Nom de la ville:</label>
                    <div>
                        <input type="text" name="nom_ville" id="nom_ville" value="Armentieres">
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <!-- Bouton de validation du formulaire -->
                <div class="bouton">
                    <input type="submit" class="bouton" value="Valider" name="btSubmit" />
                </div>
            </form>
        </fieldset>
        <!-- Fin du formulaire -->
        </p>
    </div>

</body>

</html>