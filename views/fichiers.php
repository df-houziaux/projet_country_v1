<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/fichier.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    include "Header.php"; ?>

    </head>

    <body>

        <h1>Nouvelles danses faites par dates - Année 24-25</h1>
        <div class="container">
            <label for="search">Recherche:</label>

            <input type="text" id="search" name="search" placeholder="Nom ou Date">
            <table id="myTable">
                <colgroup>
                    <col style="width: auto;">
                    <col style="width: auto;">
                    <col style="width: auto;">
                    <col style="width: auto;">
                    <col style="width: auto;">
                    <col style="width: auto;">
                </colgroup>
                <tr>
                    <th>Semaine du</th>
                    <th>Débutant</th>
                    <th class="logo">
                        <img src="../images/multimedia/musicLogo.avif" alt="" class="small-image">
                    </th>
                    <th>Novice</th>
                    <th class="logo">
                        <img src="../images/multimedia/musicLogo.avif" alt="" class="small-image">
                    </th>
                    <th>Intermédiaire</th>
                    <th class="logo">
                        <img src="../images/multimedia/musicLogo.avif" alt="" class="small-image">
                    </th>
                </tr>
                <!-- Exemple de ligne, à remplir avec les données réelles -->
                <tr>
                    <td>01/01/24</td>
                    <td>Nom </td>
                    <td><img src="../images/multimedia/musicLogo.avif" alt="" class="small-image"> </td>
                    <td>Nom </td>
                    <td><img src="../images/multimedia/musicLogo.avif" alt="" class="small-image"> </td>
                    <td>Nom </td>
                    <td><img src="../images/multimedia/musicLogo.avif" alt="" class="small-image"> </td>
                </tr>
                <!-- Ajoutez d'autres lignes ici -->
            </table>
            <br>


            <script>
                window.onload = function() {
                    var table = document.getElementById("myTable");
                    var imgWidth = document.querySelector(".small-image").width;
                    var logoColumns = document.querySelectorAll(".logo");

                    logoColumns.forEach(function(column) {
                        column.style.width = imgWidth + "px";
                    });
                }
            </script>
            <div class="bouton">
                <div class="retour_acceuil">
                    <button type="button" class="r_acceuil" onclick="window.location.href='index.php'"> l'accueil</button>
                </div>
            </div>
        </div>
    </body>
    <?php include 'Footer.php'; ?>

</html>