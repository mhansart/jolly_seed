const overlay = document.getElementById("overlay");
const formMdp = document.querySelector('.form-mdp-oubli')
const btnFormMdp = document.querySelector('.mdp-oubli');
const body = document.querySelector('body');

btnFormMdp.addEventListener("click", () => {
    formMdp.classList.toggle("d-flex");
    overlay.classList.toggle("d-flex");
});

body.addEventListener('click', (e)=>{
    if(e.target.classList.contains('close')){
        formMdp.classList.toggle('d-flex');
        overlay.classList.toggle("d-flex");
    }
})