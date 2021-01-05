import { ajaxPost } from "./src/helpers.js";
const menuAnnonces = document.getElementById("menu-mesannonces");
menuAnnonces.classList.add("active");

const formSendActive = document.querySelectorAll(".desactiver-annonce");

function postActive(event) {
  event.preventDefault();

  const data = new FormData();
  const adsId = event.target.querySelector(".btn-active-id");
  const containerAds = adsId.closest(".box");
  const annonce = [
    containerAds.querySelector(".imageDon"),
    containerAds.querySelector(".titreDon"),
    containerAds.querySelector(".date-info-ads"),
    containerAds.querySelector(".ads-description"),
  ];
  data.append("adsId", adsId.value);
  if (adsId.name === "reactiver") {
    data.append("active", "1");
  } else {
    data.append("active", "0");
  }
  ajaxPost("ajax/activeAds.php?task=write", data).then(() => {
    annonce.forEach((x) => {
      x.style.opacity = adsId.name === "reactiver" ? 1 : 0.5;
    });
    containerAds.querySelector(".btnActive").value =
      adsId.name === "reactiver"
        ? "Désactiver cette annonce"
        : "Réactiver cette annonce";
  });
}

formSendActive.forEach((form) => {
  form.addEventListener("submit", postActive);
});
