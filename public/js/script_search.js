const searchCategory = document.querySelectorAll(".search-category");
const body = document.querySelector('body');
body.addEventListener('click', (e)=>{
    console.log(e.target);
})
searchCategory.forEach((category)=>{
    category.addEventListener('click', ()=>{
        if(category.nextElementSibling){
        category.nextElementSibling.classList.toggle('d-block');
        }
    })
})