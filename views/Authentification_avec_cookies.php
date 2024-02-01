<!DOCTYPE html>
<!-- AuthentificationIHM.php -->
<html>

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
  <div class=" container">
    <fieldset>
      <h3>Authentification</h3>
      <form action="../controllers/Authentification_avec_cookies_resultat.php" method="POST">
        <table>
          <tr>
            <td><label for="email">email : </label></td>
            <input type="text" name="email" id="email" value="" <?php echo filter_input(INPUT_COOKIE, "email"); ?> placeholder="email p ?" /></td>
          </tr>
          <tr>
            <td><label for="mdp">Mot de passe : </label></td>
            <td><input type="password" name="mdp" id="mdp" value="<?php echo filter_input(INPUT_COOKIE, "mdp"); ?>" placeholder="Mot de passe b ?" /></td>
          </tr>
          <tr>
            <td><label for="seSouvenirDeMoi">Se souvenir de moi </label></td>
            <td><input type="checkbox" name="seSouvenirDeMoi" id="seSouvenirDeMoi" /></td>
          </tr>
          <tr>
            <td><input type="reset" value="R&eacute;initialiser" name="btReinitialiser" id="btReinitialiser" /></td>
            <td><input type="submit" value="Valider" name="btValider" id="btValider" /></td>
          </tr>
        </table>
      </form>
      <p>
        <label>
          <?php
          if (isset($message)) {
            echo $message;
          }
          ?>
        </label>
      </p>
      <div class="bouton">

        <div class="retour_acceuil">

          <form action="traitement.php" method="post">
            <button type="button" class="r_acceuil
                        " onclick="window.location.href='index.php'"> l'accueil</button>
          </form>
        </div>
      </div>
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
</body>

</html>