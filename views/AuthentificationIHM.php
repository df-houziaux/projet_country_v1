<!DOCTYPE html>
<!-- AuthentificationIHM.php -->
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
    <link rel="stylesheet" href="../css/AuthentificationIHM.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "Header.php"; ?>
    <div class="container">
        <fieldset>
            <h3>Authentification</h3>
            <form id="form-auth">
                <table>
                    <tr>
                        <td>Email : </td>
                        <td>
                            <input type="text" name="email" id="email" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>Mot de passe : </td>
                        <td>
                            <input type="password" name="pass" id="pass" value="aZ1!00" />
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
                                <input type="reset" value="Réinitialiser" name="btReinitialiser" id="btReinitialiser" />
                                <button class="btn_submit" type="button" value="Valider" name="btValider" id="btValider">Valider</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>

    <p>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </p>
    <?php include 'Footer.php'; ?>

    <div id="popup" class="popup">
        <div class="popup-content" id="popup-content"></div>
    </div>

    <script src="../js/Authentification.js"></script>
</body>

</html>