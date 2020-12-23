window.addEventListener('scroll', () => {
    (function scroll() {
        const containerTri = document.querySelector('.tri-search');
        if(containerTri) {
            if(window.pageYOffset > 100){
                containerTri.classList.add('reduce');
            } else {
                containerTri.classList.remove('reduce');
            }
        }
    })();
});

const allAds = document.querySelectorAll('.box');
const allForum = document.querySelectorAll('.one-forum-view');
const allItems = [];
allAds.forEach((elt)=>{
    allItems.push(elt);
})
allForum.forEach((elt)=>{
    allItems.push(elt);
})
const openMore = document.querySelectorAll('.see-more-search');
openMore.forEach((elt)=>{
    elt.addEventListener('click',()=>{
        elt.nextElementSibling.classList.toggle('d-block');
        const angleDown = elt.querySelector('i');
        if(angleDown.classList.contains('fa-angle-down')){
            angleDown.classList.replace('fa-angle-down','fa-angle-up');

        }else{
            angleDown.classList.replace('fa-angle-up','fa-angle-down');
        }
    })
}) 
const noResult = document.querySelector('.no-research-result');
const searchCategory = document.querySelectorAll('.search-category');
searchCategory.forEach((category)=>{
    category.addEventListener('click', ()=>{
        noResult.style.display="none";
        let boxShowed;
        allItems.forEach((elt)=>{
            elt.style.display="none";
        })
        if(category.innerHTML === "Voir tous les dons"){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('dons');
            })
        }else if(category.classList.contains('research-seed')){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('seed-search');
            })
        }else if(category.classList.contains('research-flower')){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('flower-search');
            })
        }else if(category.classList.contains('research-ground')){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('ground-search');
            })
        }else if(category.classList.contains('research-plant')){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('plant-search');
            })
        }else if(category.innerHTML === "Voir tous les jardiniers"){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('jardiniers');
            })
        }else if(category.classList.contains('research-offre')){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('offre-search');
            })
        }else if(category.classList.contains('research-demande')){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('offre-demande');
            })
        }else if(category.innerHTML === "Les forums"){
            boxShowed = allItems.filter((x)=>{
                return x.classList.contains('forum-search');
            })
        }else{
            boxShowed=allItems;
        }
        if(boxShowed.length>0){
            boxShowed.forEach((y)=>{
                y.style.display = "flex";
                if(y.classList.contains('forum-search')){
                    y.style.flexDirection = "column";
                }
            })
        }else{
           noResult.style.display="block"; 
        }
    })
})

const openMoreFilter = document.querySelector('.open-more-filtre');

const allFilters = document.querySelectorAll('.tri-category-search');
openMoreFilter.addEventListener('click', ()=>{
    if(window.innerWidth <1035){
        allFilters.forEach((x)=>{
            x.classList.toggle('d-block');
        })
        const angleDownUp = openMoreFilter.querySelector('i');
        if(angleDownUp.classList.contains('fa-angle-down')){
            angleDownUp.classList.replace('fa-angle-down','fa-angle-up');

        }else{
            angleDownUp.classList.replace('fa-angle-up','fa-angle-down');
        }
    };
})