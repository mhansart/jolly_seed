const jardiniersMenu = document.getElementById('jardiniers-menu');
jardiniersMenu.classList.add('active');

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
                    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>"
                    posterAnnonce.style.display = "none";
                } else if (e.currentTarget.id === "categorie"){
                    choixTri.innerHTML = "Catégorie"; 
                    ssopts.style.display = "block";
                } else {
                    choixTri.innerHTML = "Proximité";
                    options.style.display = "none";
                    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>"
                    for (box of boxs){
                        box.style.display="flex";
                    } 
                    posterAnnonce.style.display = "none";
                }
            });
        }
    } else {
        options.style.display = "none"; 
        chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>"
    }
});

// TRI Sous-options
            
const optTmpsDon = document.querySelector(".tmpsDoOpt");
const optTmpsOff = document.querySelector(".tmpsOffOpt");

const titrestemps = document.querySelectorAll(".titreTemps");
// tri temps donné
optTmpsDon.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (titretemps of titrestemps){
        console.log(titretemps.innerHTML);
        if(titretemps.innerHTML === "&nbsp;Demande"){
            let titretempsId= titretemps.id;
            boxId = "#don_" + titretempsId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>"
});
// tri temps offert
optTmpsOff.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (titretemps of titrestemps){
        console.log(titretemps.innerHTML);
        if(titretemps.innerHTML === "&nbsp;Offre"){
            let titretempsId= titretemps.id;
            boxId = "#don_" + titretempsId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
    chev.innerHTML = "<i class=\"fas fa-chevron-down\"></i>"
});

// MONTRER la Section CREATION d'ANNONCE 

btnDons.addEventListener("click", function (e) {
    posterAnnonce.style.display = "block";
    annonceDons.style.display = "none";
    enteteDons.style.display = "none";
});

//QUITTER CREATION d'ANNONCE
const sortir = document.querySelector(".sortir");
sortir.addEventListener("click", function (e) {
    posterAnnonce.style.display = "none";
    annonceDons.style.display = "flex";
    enteteDons.style.display = "flex";
});

// GESTION de l'image 
const img = document.querySelector(".imageAnnonce");
const imgFixe = document.querySelector(".imageAnnonceFixe");
imgFixe.style.display = "none"
const photoPerso = document.querySelector("#photoPerso");
photoPerso.addEventListener("click", function (e) {
   if (imgFixe.style.display === "none"){
    imgFixe.style.display = "block";
   } else { imgFixe.style.display = "none";}
});

