import {ajaxPost} from './src/helpers.js';
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

  data.append("adsId", adsId.value);
  data.append("userId", userId.value);
  data.append("isFull", isFull);

  ajaxPost("ajax/like.php?task=write",data).then(() => {
    const coeurContainer = coeur.closest('.box');
    coeurContainer.style.display="none";
  });
}
coeurs.forEach((form) => {
  form.addEventListener("submit", postLike);
});
