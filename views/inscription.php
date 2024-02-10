<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/inscription.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    include "Header.php"; ?>
    <div class="container">
        <fieldset>

            <form action="../controllers/inscriptionCTRL.php" method="post" id="form" class="form">
                <div class=" titreformulaire">

                    <h1>Fiche d'inscription danse country 2024-2025</h1>
                </div>
                <div class="form-element">
                    <label for="civilite">Civilité:</label>
                    <div>
                        <input type="radio" id="monsieur" name="civilite" value="Monsieur" checked>
                        <label for="monsieur">Monsieur</label>
                        <span>&nbsp;</span>
                        <input type="radio" id="madame" name="civilite" value="Madame">
                        <label for="madame">Madame</label>
                        <input type="radio" id="autre" name="civilite" value="Autre">
                        <label for="madame">Autre</label>
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="nom">Nom:</label>
                    <div>
                        <input type="text" name="nom" id="nom" autofocus value="Houziaux">
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="prenom">Prénom:</label>
                    <div>
                        <input type="text" name="prenom" id="prenom" value="David">
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="dateNaissance">Date de naissance:</label>
                    <div>
                        <input type="text" name="dateNaissance" id="dateNaissance" value="26/12/1973">

                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="telephone">Téléphone:</label>
                    <div>
                        <input type="tel" name="telephone" id="telephone" value="06.16.66.91.49">
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="email1">E-mail:</label>
                    <div>
                        <input type="text" name="email1" id="email1" value="david.houziaux@wanadoo.fr">
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="email2">Comfirmez l'e-mail:</label>
                    <div>
                        <input type="text" name="email2" id="email2" value="david.houziaux@wanadoo.fr">
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="mdp1">Mot de passe</label>
                    <div>
                        <input type="password" name="mdp1" id="mdp1" value="Acc123!">
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="mdp2">Confirmez le mot de passe</label>
                    <div>
                        <input type="password" name="mdp2" id="mdp2" value="Acc123!">
                        <span class="obligatoire">*</span>
                        <img class="cles" src="../images/cles.png" alt="Photo d'un trousseau de clés">
                    </div>
                </div>

                <div class="form-element">
                    <label for="chkMdpVisible">Afficher le mot de passe</label>
                    <div class="check">
                        <input type="checkbox" id="chkMdpVisible" />
                        <label id="lblMdpVisible" for="chkMdpVisible">Afficher le mot de passe</label>
                    </div>
                </div>


                <div class="form-element">
                    <label for="adresse">Adresse</label>
                    <div>
                        <input type="text" name="adresse" id="adresse" value="267 avenue léon blum">
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="ville">Ville</label>
                    <div>
                        <select name="ville" id="ville">
                            <option value="">Choisir une ville</option>
                            <?php
                            include_once "../daos/Connexion.php";
                            include_once "../daos/VilleDAOPoo.php";

                            $connexion = new Connexion();

                            $pdo = $connexion->seConnecter("projet_country.ini");

                            $villeDAO = new VilleDAOPoo($pdo);

                            $listVilles = $villeDAO->selectAllVille();

                            foreach ($listVilles as $ville) {
                                echo "<option value='" . $ville->getIdVille() . "'>" . $ville->getNomVille() . "</option>\n";
                            }

                            ?>
                        </select>
                        <span class="obligatoire">*</span>
                    </div>
                </div>

                <div class="form-element">
                    <label for="cp">Code postal:</label>
                    <div>
                        <input type="text" name="cp" id="cp" value="59280">
                        <span class="obligatoire">*</span>
                    </div>
                </div>
                <div class="bouton">
                    <div>
                        <input type="submit" id="btSubmit" class="bouton" value="Valider" name="btSubmit" />
                    </div>
                    <div class="retour_acceuil">
                        <button type="button" class="r_acceuil" onclick="window.location.href='index.php'"> l'accueil</button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
    <script src="../js/inscription.js"></script>

    <?php include 'Footer.php'; ?>


    <div id="popup" class="popup">
        <div class="popup-content" id="popup-content"></div>
    </div>
</body>

</html>