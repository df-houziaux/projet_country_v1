<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
    <link rel="stylesheet" href="../css/authentification.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">
</head>


<body>
    <?php include "Header.php"; ?>

    <div>
        <p></p>

    </div>

    <div class="container">
        <fieldset>
            <h3>Authentification</h3>
            <form action="../controllers/authentificationCTRL.php" method="post" id="form-auth">
                <table>
                    <tr>
                        <td>Email : </td>
                        <td>
                            <input type="text" name="email" id="email" value="david.houziaux@wanadoo.fr" />
                        </td>
                    </tr>
                    <tr>
                        <td>Mot de passe : </td>
                        <td>
                            <input type="password" name="pass" id="pass" value="Acc123!" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" id="afficherMdp">
                            <label for="afficherMdp">Afficher le mot de passe</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="password_recovery.php">Mot de passe oublié</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" name="remember_me" id="remember_me" />
                            <label for="remember_me">Se souvenir de moi</label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="bouton">
                                <button value="Réinitialiser" name="btReinitialiser" class="btReset">Réinitialiser</button>
                                <input class="btn_submit" type="submit" value="Valider" name="btValider" id="btValider" />
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>

    <?php include 'Footer.php'; ?>

    <div id="popup" class="popup">
        <div class="popup-content" id="popup-content"></div>
    </div>

    <script src="../js/Authentification.js"></script>
</body>

</html>