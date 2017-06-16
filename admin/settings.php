<?php
  $page = "settings";
  require_once 'inc/header.php';
    require_once 'inc/nav.php';
  is_admin();

  if(!empty($_POST)){
    if(!empty($_POST['size'])){
      if($_POST['format'] === 'mo'){
        $size = moConvert($_POST['size']);
        $req = $database->prepare("UPDATE settings SET upload_size = ?");
        $req->execute([$size]);

      }elseif($_POST['format'] === 'go'){
        $size = goConvert($_POST['size']);
        $req = $database->prepare("UPDATE settings SET upload_size = ?");
        $req->execute([$size]);
      }

      $_SESSION['flash']['success'] = 'Les paramètres on bien étais enregistrés';
      header('location: settings.php');
      exit();
    }else{
      $_SESSION['flash']['danger'] = 'Le champ "Taille d\'upload max" est vide';
      header('location: settings.php');
      exit();
    }
  }

?>

  <div class="container">

    <div class="header clearfix">
      <nav>
        <ul class="nav nav-pills pull-right">
          <li><a href="../index.php"><i class="fa fa-repeat" aria-hidden="true"></i> Retourner à l'accueil</a></li>
          <li><a href="../logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Se déconnecter</a></li>
        </ul>
      </nav>
    </div>

    <div class="jumbotron">
      <form class="form-group" action="" method="post">
        <br/>
        <p>Modifier la taille max des fichiers uploadés:</p>
          <label for="select" class="control-label">Format de taille :</label>
          <select class="form-control" id="select" name="format">
            <option value="mo" selected>Mo</option>
            <option value="go">Go</option>
          </select>
          <br/>
          <?php
            $req = $database->query("SELECT * FROM settings");
            $settings = $req->fetch();
          ?>
          <label class="control-label" for="maxSize">Taille d'upload max :</label>
          <input class="form-control" id="maxSize" value="<?php echo octetConvertToMo($settings->upload_size); ?>" type="number" name="size">

          <?php echo csrfInput(); ?>
          <br/>
          <button type="submit" id="btnSubmit" class="btn btn-default"><i class="fa fa-hdd-o" aria-hidden="true"></i> Enregistrer</button>
      </form>

    </div><!-- /jumbotron -->

  </div><!-- /container -->


<?php
  require_once 'inc/footer.php';
?>
