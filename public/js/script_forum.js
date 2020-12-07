const btnNewForum = document.querySelector(".new-forum");
const formNewForum = document.querySelector(".form-new-forum");
const forumImage = document.querySelector(".forum-image");
const searchBar = document.querySelector(".search-bar-forum");
const closeForm = document.querySelector(".close-form-forum");
const forumContainer = document.querySelector(".new-forum-container");

//remettre les propriétés css de base si la fenêtre change de taille
const getSizeWindow = () => {
  var w = window.innerWidth;
  if (parseInt(w) < 720) {
    forumContainer.style.flexDirection = "column";
    searchBar.style.width = "100%";
  }
  if (parseInt(w) > 720) {
    forumContainer.style.flexDirection = "row";
    searchBar.style.width = "50%";
  }
};
// au changement de largeur de la fenêtre, appeler la fonction
window.addEventListener("resize", function () {
  getSizeWindow();
});

// clic sur le bouton +forum.
btnNewForum.addEventListener("click", function () {
  // aller chercher la taille de la fenêtre
  const w = window.innerWidth;
  const searchWidth = getComputedStyle(searchBar).width;
  const searchHeight = getComputedStyle(searchBar).height;
  formNewForum.style.display = "flex";
  btnNewForum.style.display = "none";
  // si la fenetre est plus petite que 720px
  if (w < 720) {
    searchBar.style.order = "1";
    formNewForum.style.order = "2";
  }
  // si elle est plus grande que 72px
  if (w >= 720) {
    forumContainer.style.flexDirection = "column";
    searchBar.style.width = searchWidth;
    searchBar.style.height = searchHeight;
  }
  // clic sur la croix pour fermer le formulaire
  closeForm.addEventListener("click", function () {
    formNewForum.style.display = "none";
    btnNewForum.style.display = "block";
    if (w < 720) {
      searchBar.style.order = "1";
      btnNewForum.style.order = "2";
      formNewForum.style.order = "3";
      forumContainer.style.flexDirection = "column";
    }
    if (w >= 720) {
      forumContainer.style.flexDirection = "row";
    }
  });
});

const iptSearch = document.querySelector(".ipt-search");
const searchContainer = document.querySelector(".all-forum");
const allForum = document.querySelectorAll(".one-forum-view");
const tags = document.querySelectorAll(".forum-tag");
const forumRetour = document.querySelector('.retour-forum');
const tagsArr = [];

tags.forEach((tag) => {
  tagsArr.push(tag);
});

const render = (arr) => {
  allForum.forEach((elt) => {
    elt.style.display = "none";
  });
  arr.forEach((elt) => {
    elt.style.display = "block";
  });
};
const searchWord = (str) => {
  const result = tagsArr.filter((tag) => {
    return tag.innerHTML.toLowerCase().substr(1, tag.length).includes(str);
  });
  const resultArr = result.map((tag) => {
    return tag.closest(".one-forum-view");
  });

  uniqueArray = resultArr.filter(function (item, pos) {
    return resultArr.indexOf(item) == pos;
  });
  render(uniqueArray);
};

iptSearch.addEventListener("input", (e) => {
  const iptValue = e.currentTarget.value.toLowerCase();
  forumRetour.setAttribute('href','?section=forum');
  searchWord(iptValue);
  if(iptValue.length>0){
    forumRetour.style.display="inline-flex";
  }else{
    forumRetour.style.display="none";
  }
});
tags.forEach((tag) => {
  tag.addEventListener("click", function () {
    const tagRecherche = tag.innerHTML.toLowerCase().substr(1, tag.length);
    iptSearch.value = tagRecherche;
    searchWord(tagRecherche);
    forumRetour.style.display="inline-flex";
  });
});

if(iptSearch.value != ""){
  forumRetour.style.display="inline-flex";
  const searchValue = iptSearch.value.toLowerCase();
  searchWord(searchValue);
  if(iptValue.length>0){
    forumRetour.style.display="inline-flex";
  }else{
    forumRetour.style.display="none";
  }
}
