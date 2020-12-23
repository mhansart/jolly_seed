const donsMenu = document.getElementById('dons-menu');
donsMenu.classList.add('active');

const enteteDons = document.querySelector(".enteteDons");
const annonceDons = document.querySelector(".annonceDons");
const posterAnnonce = document.querySelector(".posterAnnonce");
posterAnnonce.style.display = "none";
const btnDons = document.querySelector(".btnDons");

// TRI Options

const options = document.querySelector(".options");
const ssopts = document.querySelector(".sous-options");
const chev = document.querySelector(".chevron");
const boxs = document.querySelectorAll(".box");
chev.addEventListener("click", function () {
    if (chev.innerHTML === "<i class=\"fas fa-chevron-down\"></i>"){
        chev.innerHTML = "<i class=\"fas fa-chevron-up\"></i>"
        options.style.display = "block";
        const opts = document.querySelectorAll(".opt");
        const choixTri = document.querySelector(".choixTri");
        for (let opt of opts){
            opt.addEventListener("click", function (e) {
                if (e.currentTarget.id === "date"){
                    choixTri.innerHTML = "Date";
                    for (box of boxs){
                        box.style.display="flex";
                    } 
                    options.style.display = "none";
                    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
                    posterAnnonce.style.display = "none";
                } else if (e.currentTarget.id === "categorie"){
                    choixTri.innerHTML = "Catégorie"; 
                    ssopts.style.display = "block";
                } else {
                    choixTri.innerHTML = "Proximité";
                    options.style.display = "none";
                    for (box of boxs){
                        box.style.display="flex";
                        chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
                    } 
                    posterAnnonce.style.display = "none";
                } 
            });
        }
    } else {
        options.style.display = "none"; 
        chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
    }
});

// TRI Sous-options
            
const seedopt = document.querySelector(".seedOpt");
const floweropt = document.querySelector(".flowerOpt");
const groundopt = document.querySelector(".groundOpt");
const plantopt = document.querySelector(".plantOpt");
const pommes = document.querySelectorAll(".pomme");

// tri seed
seedopt.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  

    for (pomme of pommes){
        if(pomme.classList.contains("pomme_seed")){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
});
// tri flower
floweropt.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (pomme of pommes){
        if(pomme.classList.contains("pomme_flower")){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
});
// tri ground
groundopt.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (pomme of pommes){
        if(pomme.classList.contains("pomme_ground")){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
});
//tri plant
plantopt.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (pomme of pommes){
        if(pomme.classList.contains("pomme_plant")){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
});

// MONTRER la Section CREATION d'ANNONCE 

btnDons.addEventListener("click", function (e) {
    posterAnnonce.style.display = "block";
    annonceDons.style.display = "none";
    enteteDons.style.display = "none";
});

//Carte
const carte = L.map('mapid');
carte.setView([50.7133938204393, 4.4745827981423885], 12);
const calque = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors',
  minZoom: 2,
  maxZoom: 19
});
carte.addLayer(calque);
//creation d'icone
var icone = L.icon({
    iconUrl:"./public/image/pomme-bleue.png",
    iconSize:[30,40],
    iconAncor:[20,40]
})
//creation d'un marqueur avec popup
const marker = L.marker([50.68577506311772, 4.482873242428455],{icon: icone});
marker.addTo(carte);
marker.bindPopup("<h5>titre de l'annonce<h5><p> et Dieu sait quoi </p>");


// MONTRER la Section CARTE 

const map = document.querySelector(".carteTri");
map.style.display = "none";
const btnCarte = document.querySelector(".btnCarte");
btnCarte.addEventListener("click", function (e) {
    posterAnnonce.style.display = "none";
    annonceDons.style.display = "none";
    enteteDons.style.display = "none";
    map.style.display = "block";
});

//RETOUR page DONS/JARDINIERS
const sortir = document.querySelector(".sortir");
sortir.addEventListener("click", function (e) {
    posterAnnonce.style.display = "none";
    annonceDons.style.display = "flex";
    enteteDons.style.display = "flex";
    map.style.display = "none";
});
//RETOUR page DONS/JARDINIERS
const retour = document.querySelector(".retour");
retour.addEventListener("click", function (e) {
    posterAnnonce.style.display = "none";
    annonceDons.style.display = "flex";
    enteteDons.style.display = "flex";
    map.style.display = "none";
});

// Modifications d'IMAGE selon CHOIX des CATEGORIES

let fichierImage = document.querySelector(".fichierImage");
const categories = document.getElementsByName('ads_category');
const img = document.querySelector(".imageAnnonce");
img.style.backgroundImage = "url('../jolly_seed/public/image/seed.jpg')";
for (let categorie of categories){
    categorie.addEventListener("change", function (e) {
        switch(e.currentTarget.value) {
            case "seed":
              img.style.backgroundImage = "url('../jolly_seed/public/image/seed.jpg')";
              fichierImage.value = "seed.jpg";
              break;
            case "flower":
              img.style.backgroundImage = "url('../jolly_seed/public/image/tomates.jpg')";
              break;
            case "ground":
              img.style.backgroundImage = "url('../jolly_seed/public/image/copeaux.jpg')";
            break;
              default:
              img.style.backgroundImage = "url('../jolly_seed/public/image/chene.jpg')";
          };
    });
}
//Ne SERT à RIEN car phto arrive APRES acceptation de l'annonce
/*
const futurId = document.querySelector(".futurId");
const checkPhoto = document.querySelector("#checkPhoto");
futId = futurId.value;
checkPhoto.addEventListener("change", function (e) {
if (checkPhoto.checked == true){
    var a = "\"url('../jolly_seed/uploads/d-" + futId + ".jpg')\"";
    console.log(a);
    img.style.backgroundImage = a;
}
});
*/


/*
//GESTION DES COEURS pour ne pas recharger PHP
const coeurs = document.querySelectorAll(".fa-heart");
console.log(coeurs);
for (let coeur of coeurs){
    coeur.addEventListener("click", function (e) {
        console.log(e.currentTarget.classList);
        /*
        if (coeur.getAttribute("class");) {

        } else {

        };
        
    });
}
*/
//fonct sui permet de récuper coordonnées en fonction de l'adresse
function ajaxGet(url){
    return new Promise(function(resolve, reject){
        let xmlhttp = new XMLHttpRequest()
        xmlhttp.onreadyState = function(){
            if(xmlhttp.readyState===4){
                if(xmlhttp.status===200){
                    resolve(xmlhttp.response)
                } else {
                    reject(xmlhttp)
                }
            }
        }
        xmlhttp.onerror = function(error){
            reject(error)
        }
        xmlhttp.open('get', url, true)
        xmlhttp.send()
    })
}
//PQ est ce que mon console.log ne fonctionne pas??ainsi que le reste...
ajaxGet("https://nominatim.openstreetmap.org/search?q=3+rue+du+patch,+rixensart&format=json&addressdetails1&limit=1").then(reponse => {
    console.log(reponse)
    //conversion en Javascript:
    let data = JSON.parse(reponse)
    coord = [data[0].lat, data[0].lon]
    const marker2 = L.marker(coord)
    marker2.addTo(carte)
})


//récuperer lnotre v-base de nonnées... NON-FONCTIONNEL
/*
ajaxGet("http://localhost/phpmyadmin/sql.php?server=1&db=jolly_seed&table=users&pos=0").then(data => {
    console.log(data);
})
*/

