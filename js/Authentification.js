// Champs du formulaire
const email = document.getElementById("email");
const password = document.getElementById("pass");

// Formulaire
const formAuth = document.getElementById("form-auth");

// Boutons
const btnAfficher = document.getElementById("afficherMdp");
const btnReset = document.querySelector(".btReset");

// Popup
const popup = document.getElementById("popup");
const popupContent = document.getElementById("popup-content");

// Validation du formulaire
function validerAuthentification() {
  const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const regexPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[A-Za-z\d!@#$%^&*()]{6,}$/;

  let erreurs = 0;
  let message = "";

  if (!regexEmail.test(email.value)) {
    message += "Veuillez saisir une adresse e-mail valide.<br>";
    erreurs++;
  }

  if (password.length < 6) {
    message += "Le mot de passe doit contenir au moins 6 caractères.<br>";
    erreurs++;
  }

  if (!regexPassword.test(password.value)) {
    message += "Le mot de passe ne respecte pas les critères de sécurité.<br>";
    erreurs++;
  }

  if (erreurs > 0) {
    return false;
  } else {
    return true;
  }
}

// Rendre visible le mot de passe
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("pass");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

// Affiche le mot de passe en clair quand on appuie sur la coche "Afficher le mot de passe"
btnAfficher.addEventListener("click", togglePasswordVisibility);

// Réinitialisation des champs du formulaire
btnReset.addEventListener("click", (event) => {
  // Eviter le rafraichissement par défaut de la page
  event.preventDefault();
  email.value = "";
  password.value = "";
});

document.addEventListener("DOMContentLoaded", function () {
  formAuth.addEventListener("submit", () => {
    const formulaireValide = validerAuthentification();

    if (formulaireValide) {
      formAuth.submit();
    }
  });
});
