<header class="w-100">
  <?php if (isset($_SESSION['nom'], $_SESSION['prenom'])) {
    echo '<div class="subheader w-100">
      <div class="subheader-container d-flex w-90 h-100">
              <div class="search-bar d-flex"><input class="w-90"/><i class="fas fa-search"></i></div>
              <a href="?section=deconnexion"><span class="btn-deconnexion">Déconnexion</span> <i class="sign-out-icon fas fa-sign-out-alt"></i></a>
            </div>
            </div>
            <div class="header-container d-flex w-90 h-100">
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
            <i class="fas fa-bars menu-burger"></i>
            <div class="nav-connected">
                <ul class="d-flex nav-pages">
                  <li><a href="?section=accueil">Accueil</a></li>
                  <li><a href="?section=dons">Les dons</a></li>
                  <li><a href="?section=jardiniers">Les jardiniers</a></li>
                  <li><a href="?section=forum">Forum</a></li>
                  <li class="btn-moncompte"><a href="?section=moncompte">Mon compte</a></li>
                </ul>
              </div>
            </div>';
  } else {
    echo '<div class="header-container d-flex w-90 h-100">
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
              <a href="#seconnecter"><span class="btn-connexion">Se&nbsp;connecter</span> <i class=" sign-in-icon fas fa-sign-in-alt"></i></a>
            </div>
            <div class="header-se-connecter header-se-connecter-inscription">
              <a class="inscription" href="#sinscrire">S\'inscrire</a>
            </div>
          </div>
        </div>';
  } ?>

  </div>
</header>