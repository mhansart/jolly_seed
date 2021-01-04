const menuFavoris = document.getElementById("menu-mesfavoris");
menuFavoris.classList.add("active");

//gestion des like
const coeurs = document.querySelectorAll(".coeurs");
function postLike(event) {
  event.preventDefault();
  const data = new FormData();
  const coeur = event.target.querySelector(".coeur");
  const userId = event.target.querySelector(".user_id");
  const adsId = event.target.querySelector(".aime");
  const isFull = coeur.querySelector("i").classList.contains("fas");
  console.log(isFull);
  data.append("adsId", adsId.value);
  data.append("userId", userId.value);
  data.append("isFull", isFull);

  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("POST", "ajax/like.php?task=write");
  requeteAjax.onload = function () {
    const coeurContainer = coeur.closest('.box');
    coeurContainer.style.display="none";
  };
  requeteAjax.send(data);
}
coeurs.forEach((form) => {
  form.addEventListener("submit", postLike);
});
