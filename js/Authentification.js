function validerAuthentification() {
  const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const regexPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[A-Za-z\d!@#$%^&*()]{6,}$/;

  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("pass").value.trim();

  let erreurs = 0;
  let message = "";

  if (!regexEmail.test(email)) {
    message += "Veuillez saisir une adresse e-mail valide.<br>";
    erreurs++;
  }

  if (password.length < 6) {
    message += "Le mot de passe doit contenir au moins 6 caractères.<br>";
    erreurs++;
  }

  if (!regexPassword.test(password)) {
    message += "Le mot de passe ne respecte pas les critères de sécurité.<br>";
    erreurs++;
  }

  if (erreurs > 0) {
    afficherPopup(message, true);
  } else {
    afficherPopup("Le formulaire est valide", false);
    // Redirection vers la page d'index après confirmation
    setTimeout(function () {
      window.location.href = "../views/index.php";
    }, 3000); // La popup disparaîtra après 3 secondes
  }
}

function togglePasswordVisibility() {
  var passwordInput = document.getElementById("pass");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

document
  .getElementById("afficherMdp")
  .addEventListener("click", togglePasswordVisibility);

function afficherPopup(message, erreur = false) {
  const popup = document.getElementById("popup");
  const popupContent = document.getElementById("popup-content");

  popupContent.innerHTML = message;

  if (erreur) {
    popup.style.backgroundColor = "rgba(255, 0, 0, 0.8)";
  } else {
    popup.style.backgroundColor = "rgba(119, 90, 70, 0.8)";
  }

  popup.style.display = "block";

  setTimeout(function () {
    popup.style.display = "none";
  }, 3000); // La popup disparaîtra après 3 secondes
}

document
  .getElementById("btValider")
  .addEventListener("click", validerAuthentification);
