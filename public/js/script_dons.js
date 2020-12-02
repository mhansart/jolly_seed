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