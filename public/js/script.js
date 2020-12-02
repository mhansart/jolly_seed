var h = window.innerHeight;
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

const getSizeNav = ()=>{
    var w = window.innerWidth;
    if(parseInt(w)<600){
        menuNav.style.height = `${h}px`;
    }else{
        menuNav.style.height = '100%';
    }
}
getSizeNav();

window.addEventListener('resize', function(){
    getSizeNav();
});

menuBurger.addEventListener('click', function(){
    if(!menuNav.classList.contains('open-menu')){
        menuNav.classList.add('open-menu');
        
    }else{
        menuNav.classList.remove('open-menu');
    }
})
/*
const btnNewForum = document.querySelector('.new-forum');
const formNewForum = document.querySelector('.form-new-forum');
btnNewForum.addEventListener('click', function(){
    formNewForum.style.display="flex";
    btnNewForum.style.display="none";
})
*/