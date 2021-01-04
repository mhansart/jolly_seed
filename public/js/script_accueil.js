const accueilMenu = document.getElementById("accueil-menu");
if (accueilMenu) {
  accueilMenu.classList.add("active");
}

//CREATION de CARTE
const carte = L.map("mapid");
carte.setView([50.70051950183509, 4.626639985506511], 10);
const calque = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution: "© OpenStreetMap contributors",
  minZoom: 2,
  maxZoom: 19,
});
carte.addLayer(calque);

//creation d'icones
var iconeSeed = L.icon({
  iconUrl: "./public/image/pomme-bleue.png",
  iconSize: [28, 38],
  iconAncor: [14, 38],
});
var iconeFlower = L.icon({
  iconUrl: "./public/image/pomme-mauve.png",
  iconSize: [28, 38],
  iconAncor: [14, 38],
});
var iconeGround = L.icon({
  iconUrl: "./public/image/pomme-bordeaux.png",
  iconSize: [28, 38],
  iconAncor: [14, 38],
});
var iconePlant = L.icon({
  iconUrl: "./public/image/pomme-jaune.png",
  iconSize: [28, 38],
  iconAncor: [14, 38],
});
var iconeTime = L.icon({
  iconUrl: "./public/image/pomme-rouge.png",
  iconSize: [28, 38],
  iconAncor: [14, 38],
});
//creation d'un marqueur avec popup
const marker = L.marker([50.68577506311772, 4.482873242428455], {
  icon: iconeTime,
});
marker.addTo(carte);
marker.bindPopup("<h5>Temps offert<h5><p>");

//REQUETES AJAX
//fonct qui permet de faire une requete Ajax
function ajaxGet(url) {
  return new Promise(function (resolve, reject) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.withCredentials=true;
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
          resolve(xmlhttp.responseText);
        } else {
          reject(xmlhttp);
        }
      }
    };
    xmlhttp.onerror = function (error) {
      reject(error);
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  });
}

//requete pour chercherche les données ads

