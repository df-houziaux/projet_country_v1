<!DOCTYPE html>
<html lang="en">

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
    <div class="container">
        <fieldset>
            <main>
                <h1>Suppression d'un adhérent cours </h1>
                <form action="../controllers/Detele_adherent_coursCTRL.php" method="POST">
                    <label for="id_adherent">Numero de l adhérent</label>
                    <input type="text" name="id_adherent" id="id_adherent">
                    <input type="submit" name="btValider">
                </form>
            </main>
        </fieldset>
    </div>
</body>

</html>