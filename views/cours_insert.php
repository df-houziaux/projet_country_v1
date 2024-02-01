<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion dans une table adherent cours</title> <!-- Déclaration de l'encodage et du titre de la page -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
            <form action="../controllers/cours_insertCTRL.php" method="POST" class="form">
                <div class="titreformulaire">
                    <h1>Insertion dans la table cours</h1>
                </div>
                <!-- Champ pour le code postal -->
                <div class="form-element">
                    <label for="type_cours">Cours:</label>
                    <div>
                        <select name="type_cours" id="type_cours">
                            <option value="Debutant">Cours Débutant</option>
                            <option value="Confirme">Cours Confirmé</option>
                        </select>
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <!-- Champ pour le nom de la ville -->
                <div class="form-element">
                    <label for="jour_cours">Jour:</label>
                    <div>
                        <select name="jour_cours" id="jour_cours">
                            <option value="Mercredi_18h_19h">Mercredi 18h - 19h</option>
                            <option value="Mercredi_19h_20h30">Mercredi 19h - 20h30</option>
                        </select>
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <div class="form-element">
                    <label for="date_cours">Date:</label>
                    <div>
                        <input type="text" name="date_cours" id="date_cours" value="">
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

</html>