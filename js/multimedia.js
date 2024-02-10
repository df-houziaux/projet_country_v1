// Données de la galerie - Chemins vers les photos et vidéos pour chaque dossier
const galleryData = {
  Bal: {
    photos: [
      "../photos/image1.jpg",
      "chemin/vers/bal/photo2.jpg",
      // Ajoutez d'autres photos de Bal
    ],
    videos: [
      "../videos/Line Dance Holy Moly, Choreo_ David Villellas, Musik_ Footloose.mp4",
      "../videos/Footloose (2011) - Line Dancing Scene (6_10) _ Movieclips.mp4",
      // Ajoutez d'autres vidéos de Bal
    ],
  },
  Cours: {
    photos: [
      "chemin/vers/cours/photo1.jpg",
      "chemin/vers/cours/photo2.jpg",
      // Ajoutez d'autres photos de Cours
    ],
    videos: [
      "chemin/vers/cours/video1.mp4",
      "chemin/vers/cours/video2.mp4",
      // Ajoutez d'autres vidéos de Cours
    ],
  },
  Démos: {
    photos: [
      "chemin/vers/demos/photo1.jpg",
      "chemin/vers/demos/photo2.jpg",
      // Ajoutez d'autres photos de Démos
    ],
    videos: [
      "chemin/vers/demos/video1.mp4",
      "chemin/vers/demos/video2.mp4",
      // Ajoutez d'autres vidéos de Démos
    ],
  },
  "Après-midi saloon": {
    photos: [
      "chemin/vers/apres-midi-saloon/photo1.jpg",
      "chemin/vers/apres-midi-saloon/photo2.jpg",
      // Ajoutez d'autres photos de Après-midi saloon
    ],
    videos: [
      "chemin/vers/apres-midi-saloon/video1.mp4",
      "chemin/vers/apres-midi-saloon/video2.mp4",
      // Ajoutez d'autres vidéos de Après-midi saloon
    ],
  },
};

// Fonction pour afficher les médias en fonction du dossier sélectionné
function showMedia(folder) {
  const photos = galleryData[folder].photos;
  const videos = galleryData[folder].videos;

  // Afficher les photos
  const photoGallery = document.getElementById("photoGallery");
  photoGallery.innerHTML = "";
  photos.forEach((photo) => {
    photoGallery.innerHTML += `<div class="gallery-item"><img src="${photo}" alt="Photo"></div>`;
  });

  // Afficher les vidéos
  const videoGallery = document.getElementById("videoGallery");
  videoGallery.innerHTML = "";
  videos.forEach((video) => {
    videoGallery.innerHTML += `<div class="gallery-item"><video controls><source src="${video}" type="video/mp4">Votre navigateur ne supporte pas la lecture de vidéos.</video></div>`;
  });

  // Afficher la galerie correspondante
  document.getElementById("photoGallery").style.display = "grid";
  document.getElementById("videoGallery").style.display = "grid";
}

// Gestion des événements de clic sur les liens des dossiers
const folderLinks = document.querySelectorAll(".showFolder");
folderLinks.forEach((link) => {
  link.addEventListener("click", function (event) {
    event.preventDefault();
    const folder = this.getAttribute("data-folder");
    showMedia(folder);
  });
});

// Gestion de l'événement de clic sur le bouton "Accueil"
document
  .getElementById("homeButton")
  .addEventListener("click", function (event) {
    event.preventDefault();
    document.getElementById("photoGallery").style.display = "none";
    document.getElementById("videoGallery").style.display = "none";
    document.getElementById("importForm").style.display = "none"; // Assurez-vous de masquer le formulaire d'importation
  });

// Gestion de l'événement de clic sur le bouton "Importer"
document.getElementById("importButton").addEventListener("click", function () {
  document.getElementById("importForm").style.display = "block"; // Afficher le formulaire d'importation
});

// Gestion de l'événement de clic sur le bouton "Importer"
document.getElementById("uploadButton").addEventListener("click", function () {
  const files = document.getElementById("fileInput").files;
  console.log(files);
  // Traitement pour l'importation des fichiers ici
});

// Gestion de l'événement de clic sur le bouton "Télécharger"
document
  .getElementById("downloadButton")
  .addEventListener("click", function () {
    // Logique de téléchargement des fichiers actuellement affichés
  });
