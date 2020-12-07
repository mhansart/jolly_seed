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

const img = document.querySelector(".imageAnnonce");
//img.style.backgroundImage = "url('../jolly_seed/public/image/avatar.png')";
// POSTER l'ANNONCE
/*
const creer = document.querySelector(".creer");
creer.addEventListener("click", function (e) {
    posterAnnonce.style.display = "none";
    annonceDons.style.display = "flex";
    enteteDons.style.visibility = "visible";
});
*/
