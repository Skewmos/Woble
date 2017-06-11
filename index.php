<?php
/****************************
* Inclusion des divers fichiers *
*****************************/
require('include/constant.php');
require('partials/_header.php');
 ?>

<!-- Message de BVN -->
<div class="jumbotron text-center">
  <h1><?= WEBNAME ; ?></h1>
  <p>Vous souhaite la bienvenue sur le site web !</p>
</div>
<!-- End Message de BVN -->

<!-- Container Register  -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2><?= WEBNAME ; ?> ?</h2>
          <p class="well text-center">
          <?= WEBNAME ; ?> est un e-cloud qui fonctionne comme un sharefile.<br/>
          Partagez du contenu image, musical, interactif et technique.<br/>
          L'utilisation est gratuite à 100% | 5Go offert !<br/>
          Commencez par <a href="register.php">rejoindre la communauté</a>.
          </p>
        </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cloud-upload logo"></span>
    </div>
  </div>
</div>

<!-- Container Info  -->
<div class="container-fluid bg-grey" id="about">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Qui sommes nous </h2><br>
        <p class="well text-center" style="font-size:15px;">
          Les développeurs de Woble sont principalement des étudiants qui se forment
          ensemble.
          Nous évoluons ainsi au fur et à mesure dans nos divers projets web.
          Notre mission est de proposer un service gratuit fonctionnant sous l'opensource :
          les fichiers sont disponibles à tous* et le code source du site est mit à disposition.
          Vous aussi, apportez votre pierre à l'édifice !
        </p>
      <br><a href="https://www.facebook.com/Wobling/?fref=ts" ><button class="btn btn-default btn-lg">En savoir plus</button></a>
    </div>
  </div>
</div>
<!-- End info containers -->

<!-- Services Container -->
<div id="services" class="container-fluid text-center">
  <h2>Les services proposés</h2>
   <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-tasks logo-small"></span>
      <h4>Nos serveurs</h4>
      <p>Des serveurs hébergés par Droid-Center</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-folder-open logo-small"></span>
      <h4>Stockage</h4>
      <p>5Gb de stockage offert lors de votre inscription</p>
    </div>
    <div class="col-sm-4">
      <span class="	glyphicon glyphicon-phone logo-small"></span>
      <h4>Responsive</h4>
      <p>Notre site web est basé sur bootstrap</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="		glyphicon glyphicon-info-sign logo-small"></span>
      <h4>Premium</h4>
      <p>De nombreux avantage en tant que Premium</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">Assistance</h4>
      <p>Une équipe a votre écoute</p>
    </div>
    <div class="col-sm-4">
      <span class="		glyphicon glyphicon-download-alt logo-small"></span>
      <h4>Libre</h4>
      <p>Importez et exportez ce que vous souhaitez</p>
    </div>
  </div>
</div>
<!-- End Services container -->

<?php
/****************************
* Inclusion du footer *
*****************************/
require('partials/_footer.php');
?>
