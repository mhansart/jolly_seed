import { ajaxPost } from "./src/helpers.js";
const menuAnnonces = document.getElementById("menu-mesannonces");
menuAnnonces.classList.add("active");

const formSendActive = document.querySelectorAll(".desactiver-annonce");

function postActive(event) {
  event.preventDefault();
  const thisDate = new Date();
  const thisMonth = (thisDate.getMonth() +1).toString().length === 1? `0${thisDate.getMonth()+1}`: thisDate.getMonth()+1;
  const todayDate = `${thisDate.getFullYear()}-${thisDate.getMonth() +1}-${thisDate.getDate()}`;
  ;
  const data = new FormData();
  const adsId = event.target.querySelector(".btn-active-id");
  const containerAds = adsId.closest(".box");
  const adsDate = containerAds.querySelector(".ads-date");
  const annonce = [
    containerAds.querySelector(".imageDon"),
    containerAds.querySelector(".titreDon"),
    containerAds.querySelector(".date-info-ads"),
    containerAds.querySelector(".ads-description"),
  ];
  data.append("adsId", adsId.value);
  if (adsId.name === "reactiver") {
    data.append("active", "1");
    data.append("date", todayDate);
  } else {
    data.append("active", "0");
    data.append("date", adsDate.innerHTML);
  }
  ajaxPost("ajax/activeAds.php?task=write", data).then(() => {
    annonce.forEach((x) => {
      x.style.opacity = adsId.name === "reactiver" ? 1 : 0.5;
    });
    adsDate.innerHTML = adsId.name === "reactiver" ? `${thisDate.getFullYear()}-${thisMonth}-${thisDate.getDate()}`: adsDate.innerHTML;
    containerAds.querySelector(".btnActive").value =
      adsId.name === "reactiver"
        ? "Désactiver cette annonce"
        : "Réactiver cette annonce";
    adsId.name = adsId.name === "reactiver" ? "desactiver" : "reactiver";
  });
}

formSendActive.forEach((form) => {
  form.addEventListener("submit", postActive);
});
