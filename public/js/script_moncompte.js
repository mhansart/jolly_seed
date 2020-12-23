var h = window.innerHeight;
var style = document.createElement('style');
document.head.appendChild(style);
style.sheet.insertRule(`body {height: ${h}px}`);

const btnModif = document.getElementById('modif-infos-mon-compte');
const formModif = document.querySelector('.modif-infos-moncompte');
const btnModifPicture = document.querySelector('.btn-modif-picture-moncompte');
const btnDelete = document.querySelector('.delete-mon-compte');
const formDelete = document.querySelector('.delete-infos-moncompte');
const formModifPicture=document.querySelector('.form-modif-picture-moncompte');
const overlay = document.getElementById('overlay');
const menuMoncompte = document.querySelector(".menu-mon-compte");
const menuActive = document.getElementById("subheader-mon-compte");
const menuMonCompte = document.getElementById("moncompte-menu");
const menuMessagerie = document.getElementById("menu-messagerie-a");
const messagerieHidden = document.querySelector(".allMsg-menu");

const headerGet = document.querySelector('header');
const heightHeaderGet = getComputedStyle(headerGet).height;


menuActive.classList.add('active');
menuMonCompte.classList.add('active');

window.addEventListener('scroll', () => {
  (function scroll() {
      if(menuMoncompte) {
          if(window.pageYOffset > 100){
              menuMoncompte.classList.add('reduce-mon-compte');
          } else {
              menuMoncompte.classList.remove('reduce-mon-compte');
          }
      }
  })();
});

menuMessagerie.addEventListener('click', ()=>{
    messagerieHidden.style.height = getComputedStyle(messagerieHidden).height === "0px"? `${h -parseInt(heightHeaderGet,10)-70}px`:'0px';
});



if(btnModif){
    btnModif.addEventListener('click', ()=>{
        formModif.classList.toggle('d-flex');
        overlay.classList.toggle('d-flex');

    })
    btnModifPicture.addEventListener('click', ()=>{
        formModifPicture.classList.toggle('d-flex');
        overlay.classList.toggle('d-flex');
    })
    btnDelete.addEventListener('click', ()=>{
      formDelete.classList.toggle('d-flex');
      overlay.classList.toggle('d-flex');
    })
    const close = document.querySelectorAll('.close');
    close.forEach((btn)=>{
        btn.addEventListener('click', ()=>{
            overlay.classList.toggle('d-flex');
            if(formModifPicture.classList.contains('d-flex')){
                formModifPicture.classList.toggle('d-flex');  
            }else if(formModif.classList.contains('d-flex')){
                formModif.classList.toggle('d-flex');
            }else{
              formDelete.classList.toggle('d-flex');
            }
            btnModifPicture.style.display="block";
        })
    })

}
// recherche dans le menu messagerie

const interlocuteur = document.querySelectorAll(".user-interlocuteur");
const oneChat = document.querySelectorAll(".oneChat");
const searchBar = document.querySelector('.ipt-search-msg');

const interlocuteurs = [];
interlocuteur.forEach((x)=>{
    interlocuteurs.push(x)
})

const render = (arr) => {
    oneChat.forEach((elt) => {
      elt.style.display = "none";
    });
    arr.forEach((elt) => {
      elt.style.display = "block";
    });
  };
  const searchWord = (str) => {
    const result = interlocuteurs.filter((elt) => {
      return elt.value.toLowerCase().includes(str);
    });
    const resultArr = result.map((elt) => {
      return elt.closest(".oneChat");
    });
  
    uniqueArray = resultArr.filter(function (item, pos) {
      return resultArr.indexOf(item) == pos;
    });
    render(uniqueArray);
  };
  
  searchBar.addEventListener("input", (e) => {
    const iptValue = e.currentTarget.value.toLowerCase();
    searchWord(iptValue);
  });