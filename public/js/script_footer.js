const headerMenu = document.querySelector("header");

const container = document.querySelector(".contact-container");

// resizer le margin top du main, en fonction de la hauteur du menu fixe
const getSizeHeaderMenu = () => {
  const widthWindow = window.innerWidth;
  const heightHeaderMenu = parseInt(getComputedStyle(headerMenu).height, 10);
  if (heightHeaderMenu > 140) {
    container.style.marginTop = `-0px`;
  }
  if (heightHeaderMenu < 90 && widthWindow <= 600) {
    container.style.marginTop = `-60px`;
  }
  if (heightHeaderMenu < 90 && widthWindow <= 1035 && widthWindow > 600) {
    container.style.marginTop = `-110px`;
  }
  if (heightHeaderMenu < 90 && widthWindow > 1035) {
    container.style.marginTop = `-60px`;
  }
};
getSizeHeaderMenu();

window.addEventListener("resize", function () {
  getSizeHeaderMenu();
});
