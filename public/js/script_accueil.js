const accueilMenu = document.getElementById("accueil-menu");
if (accueilMenu) {
  accueilMenu.classList.add("active");
}
const headerMenu = document.querySelector("header");
const container = document.querySelector(".contact-container");
if (container) {
  const getSizeHeaderMenu = () => {
    const widthWindow = window.innerWidth;
    const heightHeaderMenu = parseInt(getComputedStyle(headerMenu).height, 10);
    if (heightHeaderMenu > 140) {
      container.style.marginTop = `-0px`;
    }
    if (heightHeaderMenu < 90 && widthWindow <= 600) {
      container.style.marginTop = `-60px`;
    }
    if (heightHeaderMenu < 90 && widthWindow <= 1035 && widthWindow > 600) {
      container.style.marginTop = `-110px`;
    }
    if (heightHeaderMenu < 90 && widthWindow > 1035) {
      container.style.marginTop = `-60px`;
    }
  };
  getSizeHeaderMenu();
  window.addEventListener("resize", function () {
    getSizeHeaderMenu();
  });
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
ajaxGet("http://localhost/jolly_seed/ajax/ads.php").then((reponse) => {
  let ads = JSON.parse(reponse);
  console.log("ajax:", ads);
  for (let ad of ads) {
    console.log(ad[5]);
    if (ad[1] === "jardinier") {
      ajaxGet(`https://photon.komoot.io/api/?q=${ad[5]}&limit=1`).then(
        (reponse) => {
          //conversion en Javascript:
          let data = JSON.parse(reponse);
          console.log(data.features[0]);
          let coord = data.features[0].geometry.coordinates;
          coord.reverse();
          const marker = L.marker(coord, { icon: iconeTime });
          marker.addTo(carte);
          marker.bindPopup(`<h5>${ad[4]}<h5>`);
        }
      );
    } else {
      switch (ad[2]) {
        case "flower":
          //requete pour transformer adresses en coordonnées
          ajaxGet(`https://photon.komoot.io/api/?q=${ad[5]}&limit=1`).then(
            (reponse) => {
              //conversion en Javascript:
              let data = JSON.parse(reponse);
              let coord = data.features[0].geometry.coordinates;
              coord.reverse();
              const marker = L.marker(coord, { icon: iconeFlower });
              marker.addTo(carte);
              marker.bindPopup(`<h5>${ad[4]}<h5>`);
            }
          );
          break;
        case "seed":
          ajaxGet(`https://photon.komoot.io/api/?q=${ad[5]}&limit=1`).then(
            (reponse) => {
              //console.log("reponse ", reponse)
              //conversion en Javascript:
              let data = JSON.parse(reponse);
              let coord = data.features[0].geometry.coordinates;
              coord.reverse();
              const marker = L.marker(coord, { icon: iconeSeed });
              marker.addTo(carte);
              if (ad[4] === "Offert") {
                marker.bindPopup(`<h5>Temps offert<h5>`);
              } else {
                marker.bindPopup(`<h5>Temps demandé<h5>`);
              }
            }
          );
          break;
        case "ground":
          ajaxGet(`https://photon.komoot.io/api/?q=${ad[5]}&limit=1`).then(
            (reponse) => {
              //console.log("reponse ", reponse)
              //conversion en Javascript:
              let data = JSON.parse(reponse);
              let coord = data.features[0].geometry.coordinates;
              coord.reverse();
              const marker = L.marker(coord, { icon: iconeGround });
              marker.addTo(carte);
              marker.bindPopup(`<h5>${ad[4]}<h5>`);
            }
          );
          break;
        default:
          ajaxGet(`https://photon.komoot.io/api/?q=${ad[5]}&limit=1`).then(
            (reponse) => {
              //console.log("reponse ", reponse)
              //conversion en Javascript:
              let data = JSON.parse(reponse);
              let coord = data.features[0].geometry.coordinates;
              coord.reverse();
              const marker = L.marker(coord, { icon: iconePlant });
              marker.addTo(carte);
              marker.bindPopup(`<h5>${ad[4]}<h5>`);
            }
          );
      }
    }
  }
});

