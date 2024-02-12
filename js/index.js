document.addEventListener("DOMContentLoaded", function () {
  var successPopup = document.querySelector(".success-message");
  if (successPopup) {
    setTimeout(function () {
      successPopup.style.display = "none";
    }, 3000);
  }
});
