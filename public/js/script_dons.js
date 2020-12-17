const donsMenu = document.getElementById('dons-menu');
donsMenu.classList.add('active');
// Tri

const options = document.querySelector(".options");
const chevron = document.querySelector(".fa-chevron-down");
chevron.addEventListener("click", function () {
    console.log("clic");
    options.style.display = "block";
    const opts = document.querySelectorAll(".opt");
    const choixTri = document.querySelector(".choixTri");
    console.log(choixTri);
    for (let opt of opts){
    opt.addEventListener("click", function (e) {
        if (e.currentTarget.id === "date"){
            choixTri.innerHTML = "Date";
        } else if (e.currentTarget.id === "categorie"){
            choixTri.innerHTML = "Catégorie"; 
        } else {
            choixTri.innerHTML = "Proximité";
        }
        options.style.display = "none";
    });
}
});

// Montrer la Section CREATION d'ANNONCE 

const enteteDons = document.querySelector(".enteteDons");
const annonceDons = document.querySelector(".annonceDons");
const posterAnnonce = document.querySelector(".posterAnnonce");
posterAnnonce.style.display = "none";
const btnDons = document.querySelector(".btnDons");
btnDons.addEventListener("click", function (e) {
    posterAnnonce.style.display = "block";
    annonceDons.style.display = "none";
    enteteDons.style.display = "none";
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
/*
//GESTION DES COEURS pour ne pas recharger PHP
const coeurs = document.querySelectorAll(".fa-heart");
console.log(coeurs);
for (let coeur of coeurs){
    coeur.addEventListener("click", function (e) {
        console.log(e.currentTarget.getAttribute('class'));
        /*
        if (coeur.getAttribute("class");) {

        } else {

        };
        
    });
}
*/


