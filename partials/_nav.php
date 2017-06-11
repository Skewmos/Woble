<?php
//Vérification d'une potentielle session si elle n'est pas détectée en démarrer une
if (session_status() == PHP_SESSION_NONE ) {
  session_start();
}
 ?>
<!-- Navbar -->
<nav class="navbar navbar-default " href="#myPage">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="color" href="index.php"><?= WEBNAME ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- Navbar Right Home -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" id="color">Accueil</a></li>
        <li><a href="#services" id="color">services</a></li>
        <li class="dropdown">
          <?php if (isset($_SESSION['auth'])): ?>
              <a class="dropdown-toggle" data-toggle="dropdown" id="color"  href="#">Information<span class="caret"></span></a>
              <?php endif; ?>
            <ul class="dropdown-menu">
              <?php if (isset($_SESSION['auth'])): ?>
                <li><a href="help.php">Aide</a></li>
                <li><a href="about.php">L'équipe</a></li>
                <li><a href="projet.php">Projet</a></li>
                <li><a href="contact.php">Contact</a></li>
              <?php endif; ?>
            </ul>
     </li>
          <li class="dropdown">
            <?php if (isset($_SESSION['auth'])): ?>
            <a class="dropdown-toggle " data-toggle="dropdown" id="color" href="#"><?= $_SESSION['auth']->username;?><span class="caret"></span></a>
              <?php else: ?>
                <a class="dropdown-toggle" data-toggle="dropdown" id="color"  href="#">Connexion<span class="caret"></span></a>
                <?php endif; ?>
              <ul class="dropdown-menu">
                <?php if (isset($_SESSION['auth'])): ?>
                  <li><a href="file_account.php"> Mes fichier</a></li>
                  <li><a href="logout.php">Se déconnecter</a></li>
                <?php else: ?>
                <li><a href="login.php"><span >Connexion</span></a></li>
                <li><a href="register.php"><span >Inscription</span></a></li>
              <?php endif; ?>
              </ul>
       </li>
      </ul>

    </div>
  </div>
</nav>
<!-- End Navbar -->
<!-- Container -->
<div class="container">
  <?php if (isset($_SESSION['flash'])): ?>
    <?php foreach ($_SESSION['flash'] as $type => $message): ?>
      <div class="container">
        <div class="alert alert-<?= $type ?>">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= $message ?>
      </div>
      </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>
</div>
<!-- End Container -->
