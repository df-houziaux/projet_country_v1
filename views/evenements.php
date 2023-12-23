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
            <form action="../controllers/evenementsCTRL.php" method="POST" class="form">
                <div class="titreformulaire">
                    <h1>Insertion dans la table événements</h1>
                </div>
                <!-- Champ pour le code postal -->
                <div class="form-element">
                    <label for="type_evenement">Les évenements</label>
                    <div>
                        <select name="type_evenement" id="type_evenement">
                            <option value="démos">Démos country</option>
                            <option value="démos">Après-midi saloon </option>
                            <option value="démos">Bals country </option>
                            <option value="démos">Auberges espagnoles </option>
                        </select>
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <!-- Champ pour le nom de la ville -->
                <div class="form-element">
                    <label for="jour_evenement">Jour:</label>
                    <div>
                        <select name="jour_evenement" id="jour_evenement" required>
                            <option value="" disabled selected>Choisissez le jour</option>
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                            <option value="Vendredi">Vendredi</option>
                            <option value="Samedi">Samedi</option>
                            <option value="Dimanche">Dimanche</option>
                        </select>
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <div class="form-element">
                    <label for="date_evenement">Date:</label>
                    <div>
                        <input type="date" name="date_evenement" id="date_evenement" required>
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <div class="form-element">
                    <label for="presence_evenement">Présence</label>
                    <div>
                        <input type="radio" id="presence_evenement_oui" name="presence_evenement" value="oui">
                        <label for="oui">Oui</label>
                        <span>&nbsp;</span>
                        <input type="radio" id="presence_evenement_non" name="presence_evenement" value="non">
                        <label for="non">Non</label>
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