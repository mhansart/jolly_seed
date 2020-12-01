var h = window.innerHeight;
var w = window.innerWidth;
var style = document.createElement('style');
document.head.appendChild(style);
style.sheet.insertRule(`body {height: ${h}px}`);

const subHeader = document.querySelector('.subheader');


// const heightSubheader = getComputedStyle(subHeader).height;

window.addEventListener('scroll', () => {
	(function scroll() {
        const headerMenu = document.querySelector('header');
		if(headerMenu) {
			if(window.pageYOffset > 100){
				headerMenu.classList.add('reduce');
			} else {
				headerMenu.classList.remove('reduce');
			}
		}
	})();
});

const menuBurger = document.getElementById('menu-burger');
const menuNav = document.querySelector('.nav-connected');
const navBar = document.querySelector('.nav-pages');
console.log(navBar);
console.log(h);
menuBurger.addEventListener('click', function(){
    if(!menuNav.classList.contains('open-menu')){
        menuNav.style.transition = "all 0.3s"
        menuNav.classList.add('open-menu');
        style.sheet.insertRule(`.nav-pages {height: ${h}px}`);
    }else{
        menuNav.classList.remove('open-menu');
        navBar.style.innerHeight = "auto";
        menuNav.style.transition = "none";
        style.sheet.deleteRule(`.nav-pages {height}`);
    }
})