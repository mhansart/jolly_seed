<header class="w-100">
  <?php
  if (isset($_SESSION['user_id'])) {

    echo '<div class="subheader w-100">
            <div class="subheader-container d-flex w-80 h-100">
              <div class="search-bar d-flex"><input class="w-90"/><i class="fas fa-search"></i></div><div class="d-flex"><p class="hello-name">Bienvenue <strong>' . $_SESSION['prenom'] . '</strong></p>
              <a id="subheader-mon-compte" href="?section=moncompte"><span class="btn-moncompte">Mon compte</span><i class="mon-compte-icon fas fa-user"></i></a>
              <a href="?section=deconnexion"><i class="sign-out-icon fas fa-sign-out-alt"></i></a>
              </div>
            </div>
            </div>
            <div class="header-container d-flex w-80 h-100">
              <div class="jolly-name-connexion h-100 d-flex">
              <div class="d-flex">
              <div class="h-100 logo-container">
                <a class="d-flex h-100" href="#home"
                ><img src="public/image/logo.png" alt="Logo jolly seed"
                /></a>
              </div>
              <h1>Jolly&nbsp;Seed</h1>
              </div>
            </div>
            <i class="fas fa-bars" id="menu-burger"></i>
            <div class="nav-connected">
                <ul class="d-flex nav-pages">
                  <li><a id="accueil-menu" href="?section=accueil"><span>Accueil</span><i class="fas fa-home li-icon"></i></a></li>
                  <li><a id="dons-menu" href="?section=dons"><span>Les dons</span><i class="fas fa-carrot li-icon"></i></a></li>
                  <li><a id="jardiniers-menu" href="?section=jardiniers"><span>Les jardiniers</span>
                  
                  <svg version="1.1" class="li-icon" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                viewBox="0 0 20.3 26.43"  xml:space="preserve">
                    <g id="Groupe_805" transform="translate(-180 -285)">
                      <g id="Groupe_804" transform="translate(180 285)">
                        <ellipse id="Ellipse_281" class="st0" cx="10.16" cy="5.63" rx="5.48" ry="5.48"/>
                        <path id="Tracé_654" class="st0" d="M13.87,12.84l-3.7,5.05l-3.7-5.05c0,0-6.2,0-6.2,4.06v6.81c0,0,0,2.44,5.9,2.44h3.73
                        c0.01-0.44-0.02-0.88-0.09-1.32c-0.2-1.12-1.32-0.92-2.75-1.12s-2.54-2.21-2.34-5.83c0.69,1.02,1.69,1.79,2.85,2.2
                        C9.44,20.64,9.8,23.2,9.8,23.2c-0.22-1.32,0.44-2.63,1.63-3.25c1.76-0.75,3.3-1.94,4.47-3.46c-0.01,1.58-0.29,3.14-0.81,4.63
                        c-0.73,1.67-2.05,2.03-3.97,2.9c-0.5,0.23-0.25,2.13-0.25,2.13h3.3c5.9,0,5.9-2.44,5.9-2.44V16.9
                        C20.07,12.84,13.87,12.84,13.87,12.84z"/>
                      </g>
                    </g>
                </svg>
              </a>
            </li>
            <li>
              <a id="forum-menu" href="?section=forum"><span>Forum</span><i class="fas fa-comments li-icon"></i>
              </a>
            </li>
            <li class="btn-moncompte"><a id="moncompte-menu" href="?section=moncompte"><span>Mon compte</span><i class="fas fa-user li-icon"></i></a></li>
          </ul>
        </div>
      </div>';
  } else {
    echo '<div class="header-container-deconnected d-flex w-90 h-100">
            <div class="jolly-name h-100 d-flex">
            <div class="h-100 logo-container">
              <a class="d-flex h-100" href="#home"
                ><img src="public/image/logo.png" alt="Logo jolly seed"
              /></a>
            </div>
            <h1>Jolly&nbsp;Seed</h1>
          </div>
          <div class="d-flex">
            <div class="header-se-connecter">
              <a href="?section=connexion"><span class="btn-connexion">Se&nbsp;connecter</span> <i class=" sign-in-icon fas fa-sign-in-alt"></i></a>
            </div>
            <div class="header-se-connecter header-se-connecter-inscription">
              <a class="inscription" href="?section=inscription">S\'inscrire</a>
            </div>
          </div>
        </div>';
  } ?>

  </div>
</header>
<main>