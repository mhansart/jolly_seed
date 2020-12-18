const donsMenu = document.getElementById('dons-menu');
donsMenu.classList.add('active');

// TRI Options

const options = document.querySelector(".options");
const chevron = document.querySelector(".fa-chevron-down");
const ssopts = document.querySelector(".sous-options");
const boxs = document.querySelectorAll(".box");
chevron.addEventListener("click", function () {
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
        } else if (e.currentTarget.id === "categorie"){
            choixTri.innerHTML = "Catégorie"; 
            ssopts.style.display = "block";
        } else {
            choixTri.innerHTML = "Proximité";
            options.style.display = "none";
            for (box of boxs){
                box.style.display="flex";
            } 
        }
        
    });
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
        if(pomme.src === "http://localhost/exo/PHP/jolly_seed/public/image/pomme-bleue.png"){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
});
// tri flower
floweropt.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (pomme of pommes){
        if(pomme.src === "http://localhost/exo/PHP/jolly_seed/public/image/pomme-mauve.png"){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
});
// tri ground
groundopt.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (pomme of pommes){
        if(pomme.src === "http://localhost/exo/PHP/jolly_seed/public/image/pomme-bordeaux.png"){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
});
//tri plant
plantopt.addEventListener("click", function (e) {
    console.log("click");
    for (box of boxs){
        box.style.display="none";
    }  
    for (pomme of pommes){
        if(pomme.src === "http://localhost/exo/PHP/jolly_seed/public/image/pomme-jaune.png"){
            let pommeId= pomme.id;
            boxId = "#don_" + pommeId.split("_")[1];
            let box = document.querySelector(boxId);
            box.style.display="flex";
        }
    }
    options.style.display = "none";
});

// MONTRER la Section CREATION d'ANNONCE 

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

//QUITTER CREATION d'ANNONCE
const sortir = document.querySelector(".sortir");
sortir.addEventListener("click", function (e) {
    posterAnnonce.style.display = "none";
    annonceDons.style.display = "flex";
    enteteDons.style.display = "flex";
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


