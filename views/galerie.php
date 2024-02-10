<!DOCTYPE html>
<html lang="fr">

<head>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/galerie.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,700&family=Rye&display=swap" rel="stylesheet" />
  </head>
  <title>Ma Galerie Multimédia</title>
</head>

<body>
  <h1>Galerie Multimédia</h1>

  <!-- Boutons -->
  <div>
    <button id="importButton">Importer</button>
    <button id="downloadButton">Télécharger</button>
    <a href="index.php">Accueil</a>
  </div>

  <!-- Liens pour sélectionner le type de média -->
  <div class=" dossiers">
    <a href="#" class="showFolder" data-folder="Bal">Bal</a>
    <a href="#" class="showFolder" data-folder="Cours">Cours</a>
    <a href="#" class="showFolder" data-folder="Démos">Démos</a>
    <a href="#" class="showFolder" data-folder="Après-midi saloon">Après-midi saloon</a>
  </div>
  <!-- image des 2 danseur -->

  <div class="wrapper">
    <div class="image-wrapper">
      <img src="../images/multimedia/hommeCountry.jpg" alt="Homme Country" />
    </div>
    <div class="gallery-wrapper">
      <!-- Galerie de photos et vidéos -->
      <div class="gallery" id="photoGallery" style="display: none">
        <!-- Photos seront affichées ici -->
      </div>

      <!-- Galerie de vidéos -->
      <div class="gallery" id="videoGallery" style="display: none">
        <!-- Balises iframe pour afficher les vidéos YouTube -->
        <div class="gallery-item">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID_1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="gallery-item">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID_2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="gallery-item"></div>
        <!-- Ajoutez d'autres balises iframe pour chaque vidéo YouTube -->
      </div>

      <!-- Formulaire pour importer des fichiers -->
      <div id="importForm" style="display: none">
        <h2>Importer des fichiers</h2>
        <input type="file" id="fileInput" multiple />
        <button id="uploadButton">Importer</button>
      </div>
    </div>
    <div class="image-wrapper">
      <img src="../images/multimedia/femmeCountry.jpg" alt="Femme Country" />
    </div>
  </div>
  <script src="../js/multimedia.js"></script>
</body>

</html>