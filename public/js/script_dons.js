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

//RETOUR page DONS/JARDINIERS

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
              fichierImage.value = "tomates.jpg";
              break;
            case "ground":
              img.style.backgroundImage = "url('../jolly_seed/public/image/copeaux.jpg')";
              fichierImage.value = "copeaux.jpg";
            break;
              default:
              img.style.backgroundImage = "url('../jolly_seed/public/image/chene.jpg')";
              fichierImage.value = "chene.jpg";
          };
    });
}

// afficher l'image après le choix dans les fichiers
const loadFile = function (e) {
    const reader = new FileReader();
    reader.onload = function () {
    img.style.backgroundImage = `url(${reader.result})`;
    };
    // generer un url
    reader.readAsDataURL(e.target.files[0]);
  };
  
  const iptImgPp = document.querySelector(".fichierImage");
  if (iptImgPp) {
    iptImgPp.addEventListener("change", (e) => {
      loadFile(e);
    });
  }

  //gestion des like
  const coeurs = document.querySelectorAll(".coeurs");
  function postLike(event) {
    event.preventDefault();
    const data = new FormData();
    const coeur = event.target.querySelector(".coeur");
    const userId = event.target.querySelector(".user_id");
    const adsId = event.target.querySelector(".aime");
    const isFull = coeur.querySelector("i").classList.contains("fas");
    data.append("adsId", adsId.value);
    data.append("userId", userId.value);
    data.append("isFull", isFull);
   
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("POST", "ajax/like.php?task=write");
    requeteAjax.onload = function () {
        if (coeur.querySelector("i").classList.contains("fas")){
            coeur.innerHTML = "<i class='far fa-heart'></i>"
        } else {
            coeur.innerHTML = "<i class='fas fa-heart'></i>"
        }
    };
    requeteAjax.send(data);
  }
  coeurs.forEach((form) => {
    form.addEventListener("submit", postLike);
  });
  
  



