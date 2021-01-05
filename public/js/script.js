var h = window.innerHeight;
document.body.style.height = h + "px";


const subHeader = document.querySelector(".subheader");

const header = document.querySelector("header");

const heightHeader = header? parseInt(getComputedStyle(header).height, 10):0;
const main = document.querySelector("main");
const footer = document.querySelector("footer");
const heightFooter = footer? parseInt(getComputedStyle(footer).height, 10):0;

const containerChat = document.querySelector(".chat-container");

const getSizeMain = () => {
  if (containerChat) {
    main.style.minHeight = `${h}px`;
  } else {
    main.style.minHeight = `${h - heightFooter - 19}px`;
  }
};
getSizeMain();

window.addEventListener("resize", function () {
  getSizeMain();
});

const heightMain = parseInt(getComputedStyle(main).minHeight, 10);

if (containerChat) {
  footer.style.display = "none";
  const getSizeChat = () => {
    const paddingMain = parseInt(getComputedStyle(main).paddingTop, 10);
    containerChat.style.height = `${heightMain - paddingMain}px`;
  };
  getSizeChat();
  window.addEventListener("resize", function () {
    getSizeChat();
  });
}

if (subHeader !== null) {
  window.addEventListener("scroll", () => {
    (function scroll() {
      const headerMenu = document.querySelector("header");
      if (headerMenu) {
        if (window.pageYOffset > 100) {
          headerMenu.classList.add("reduce");
        } else {
          headerMenu.classList.remove("reduce");
        }
      }
    })();
  });
}

const menuBurger = document.getElementById("menu-burger");
const menuNav = document.querySelector(".nav-connected");
const navBar = document.querySelector(".nav-pages");

if (menuNav) {
  const getSizeNav = () => {
    var w = window.innerWidth;
    if (parseInt(w) < 600) {
      menuNav.style.height = `${h}px`;
    } else {
      menuNav.style.height = "100%";
    }
  };
  getSizeNav();

  menuBurger.addEventListener("click", function () {
    if (!menuNav.classList.contains("open-menu")) {
      menuNav.classList.add("open-menu");
    } else {
      menuNav.classList.remove("open-menu");
    }
  });
  window.addEventListener("resize", function () {
    getSizeNav();
  });
}

const searchBarGeneral = document.getElementById("search-bar-general");
if (searchBarGeneral) {
  searchBarGeneral.addEventListener("keyup", function (event) {
    event.preventDefault();
    if (event.key === "Enter") {
      document.getElementById("search-bar-general-button").click();
    }
  });
}
const containerOubli = document.querySelector('.container-oubli');
if(containerOubli){
  main.style.height= `${h}px`;
  main.style.paddingTop="0px";
  containerOubli.style.height=`${h}px`;
}
