// Fonction pour afficher l'heure actuelle
function displayTime() {
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, "0");
  const minutes = now.getMinutes().toString().padStart(2, "0");
  const seconds = now.getSeconds().toString().padStart(2, "0");
  document.getElementById(
    "time"
  ).textContent = `${hours}:${minutes}:${seconds}`;
}

// Mettre à jour l'heure chaque seconde
setInterval(displayTime, 1000);
