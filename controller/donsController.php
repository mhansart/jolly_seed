<?php 

$dons = "";
$dons .= "
<section class='box'>
            <div class='dons'>
              <div class='d-flex row'>
                <img class='pomme' src='./public/image/pomme-mauve.png' />
                <h3>Reinettes étoilées</h3>
                <i class='far fa-heart'></i>
              </div>
              <img class='imageDon' src='./public/image/reinette-etoilee.jpg' />
              <div class='d-flex row'>
                <div>
                  <p>Date : 26/10/2020</p>
                  <p>Lieu : Ottignies</p>
                </div>
                <button>
                  <a href='#'>Contact</a>
                </button>
              </div>
              <article>
                Venez cueillir ces délicieuses pommes. Pour ceux qui ne la
                connaisse pas, elles sont petites mais délicieuses à souhait!
              </article>
            </div>
          </section>";


    include("view/page/dons.php");
?>