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
    enteteDons.style.visibility = "hidden";
});

// Modifications selon CHOIX des CATEGORIES


let fichierImage = document.querySelector(".fichierImage");
const categories = document.getElementsByName('ads_category');
const time = document.querySelector(".time");
time.style.display = "none";
const timeSlot = document.querySelector(".timeSlot");
timeSlot.style.display = "none";
const img = document.querySelector(".imageAnnonce");
let titres = document.querySelectorAll(".titre");
const cacher = () => {
    img.style.border = "none";
    time.style.display = "none";
    timeSlot.style.display = "none";
    titre.style.display = "inline";
};

for (let categorie of categories){
    categorie.addEventListener("change", function (e) {
        
        switch(e.currentTarget.value) {
            case "time":
              img.style.backgroundImage = "url('../jolly_seed/public/image/avatar.png')";
              img.style.border = "2px solid #6e9611";
              time.style.display = "block";
              titre.style.display = "none";
              var times = document.getElementsByName('ads_titleSecondaire');
              for (let tme of times){
                tme.addEventListener("change", function (e) {   let title = document.getElementsByName('ads_title');
                console.log(title);
                   if (e.currentTarget.value ==="Offre") {
                    timeSlot.style.display = "block"; 
                   };
                });
            }
              break;
            case "seed":
              img.style.backgroundImage = "url('../jolly_seed/public/image/seed.jpg')";
              fichierImage.value = "seed.jpg";
              cacher();
              break;
            case "flower":
              img.style.backgroundImage = "url('../jolly_seed/public/image/tomates.jpg')";
              cacher();
              break;
            case "ground":
              img.style.backgroundImage = "url('../jolly_seed/public/image/copeaux.jpg')";
              cacher();
            break;
              default:
              img.style.backgroundImage = "url('../jolly_seed/public/image/chene.jpg')";
              cacher();
          };
    });
}


// POSTER l'ANNONCE

const creer = document.querySelector(".creer");
creer.addEventListener("click", function (e) {
    posterAnnonce.style.display = "none";
    annonceDons.style.display = "flex";
    enteteDons.style.visibility = "visible";
});
