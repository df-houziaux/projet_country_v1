function togglePasswordVisibility() {
  var passwordInput = document.getElementById("pass");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

function validateForm() {
  var emailInput = document.getElementById("email");

  var email = emailInput.value.trim(); // Supprime les espaces blancs avant et après l'adresse e-mail

  // Expression régulière pour valider l'e-mail
  var emailPattern = /[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]+/;

  if (!emailPattern.test(email)) {
    alert("Veuillez saisir une adresse e-mail valide.");
    return false; // Empêche la soumission du formulaire si l'e-mail n'est pas valide
  }

  return true; // Autorise la soumission du formulaire si tout est valide
}

var btnAfficheMotdePasse = document.getElementById("afficherMdp");

btnAfficheMotdePasse.addEventListener("click", togglePasswordVisibility);

var formulaireAuth = document.getElementById("form-auth");

formulaireAuth.addEventListener("submit", function (event) {
  validateForm();
});
