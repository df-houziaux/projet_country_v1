var formulaireValide = false;

const formulaireInscription = document.getElementById("form");

function validerInformations() {
  const regexNom = /^[a-zA-ZÀ-ÿ]+([\-'\s][a-zA-ZÀ-ÿ]+)*$/;
  const regexPrenom = /^[a-zA-ZÀ-ÿ]+([\-'\s][a-zA-ZÀ-ÿ]+)*$/;
  const regexDateNaissance = /^\d{2}\/\d{2}\/\d{4}$/;
  const regexTelephone = /^0[1-9]([\s.-]?(\d{2})){4}$/;
  const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const regexMotdePasse =
    /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/;
  const regexCodePostal = /^\d{5}$/;

  const nom = document.getElementById("nom").value;
  const prenom = document.getElementById("prenom").value;
  const dateNaissance = document.getElementById("dateNaissance").value;
  const telephone = document.getElementById("telephone").value;
  const email1 = document.getElementById("email1").value;
  const email2 = document.getElementById("email2").value;
  const mdp1 = document.getElementById("mdp1").value;
  const mdp2 = document.getElementById("mdp2").value;
  const adresse = document.getElementById("adresse").value;
  const cp = document.getElementById("cp").value;
  const ville = document.getElementById("ville").value;

  let erreurs = 0;
  let message = "";

  if (!regexNom.test(nom)) {
    message += "Le nom n'est pas au bon format<br>";
    erreurs++;
  }
  if (!regexPrenom.test(prenom)) {
    message += "Le prénom n'est pas au bon format<br>";
    erreurs++;
  }
  if (!regexDateNaissance.test(dateNaissance)) {
    message +=
      "Le format de la date de naissance n'est pas valide (JJ/MM/AAAA)<br>";
    erreurs++;
  }
  if (!regexTelephone.test(telephone)) {
    message += "Le numéro de téléphone n'est pas au bon format<br>";
    erreurs++;
  }
  if (email1 !== email2) {
    message += "Les adresses email ne correspondent pas<br>";
    erreurs++;
  } else if (!regexEmail.test(email1)) {
    message += "L'adresse email n'est pas au bon format<br>";
    erreurs++;
  }

  if (mdp1 !== mdp2) {
    message += "Les mots de passe ne correspondent pas<br>";
    erreurs++;
  } else if (!regexMotdePasse.test(mdp1)) {
    message += "Le mot de passe n'est pas au bon format<br>";
    erreurs++;
  }

  if (!adresse) {
    message += "Veuillez saisir une adresse<br>";
    erreurs++;
  }

  if (!regexCodePostal.test(cp)) {
    message += "Le code postal n'est pas au bon format<br>";
    erreurs++;
  }

  if (ville.length === 0) {
    message += "Veuillez saisir une ville<br>";
    erreurs++;
  }

  if (erreurs > 0) {
    afficherPopup(message, true);
    return false;
  } else {
    afficherPopup("Le formulaire est valide", false);
    return true;
  }
}

function mdpVisible() {
  var chkMdpVisible = document.getElementById("chkMdpVisible");
  var mdp1 = document.getElementById("mdp1");
  var mdp2 = document.getElementById("mdp2");
  var lblMdpVisible = document.getElementById("lblMdpVisible");

  if (chkMdpVisible.checked) {
    mdp1.type = "text";
    mdp2.type = "text";
    lblMdpVisible.textContent = "Masquer le mot de passe";
  } else {
    mdp1.type = "password";
    mdp2.type = "password";
    lblMdpVisible.textContent = "Afficher le mot de passe";
  }
}

document.getElementById("chkMdpVisible").addEventListener("change", mdpVisible);

document.addEventListener("DOMContentLoaded", function () {
  var selectVille = document.getElementById("ville");
  villes.forEach(function (ville) {
    var option = document.createElement("option");
    option.value = ville.id;
    option.textContent = ville.nom;
    selectVille.appendChild(option);
  });
});

function afficherPopup(message, erreur = false) {
  const popup = document.getElementById("popup");
  const popupContent = document.getElementById("popup-content");

  popupContent.innerHTML = message;

  if (erreur) {
    popup.style.backgroundColor = "rgba(255, 0, 0, 0.8)";
  } else {
    popup.style.backgroundColor = "rgba(119, 90, 70, 0.8)";
    // Redirection vers la page d'authentification après confirmation
    // setTimeout(function () {
    //   window.location.href = "AuthentificationIHM.php";
    // }, 3000); // La popup disparaîtra après 3 secondes
  }

  popup.style.display = "block";

  setTimeout(function () {
    popup.style.display = "none";
  }, 3000); // La popup disparaîtra après 3 secondes
}

formulaireInscription.addEventListener("submit", function (event) {
  event.preventDefault();

  const formulaireValide = validerInformations();

  if (formulaireValide === true) {
    console.log("le formulaire est valide");
    this.submit();
  } else {
    console.log("Le formulaire est invalide");
  }
});
