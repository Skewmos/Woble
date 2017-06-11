<?php
  $page = "login";
  /****************************
  * Inclusion des divers fichiers *
  *****************************/
  require('include/constant.php');
  require('partials/_header.php');


  if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $req = $database->prepare('SELECT * FROM users WHERE (username = :username OR email = :username)');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();

      if(password_verify($_POST['password'], $user->password)){

        $remember_token = str_random(250);
        $database->prepare('UPDATE users SET remember_token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
        setcookie('remember', $user->id . '==' . $remember_token . sha1($user->id . 'adtr'), time() + 60 * 60 * 24 * 7);

        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
        $id_user = $_SESSION['auth']->id ;
        $q = $database->query("SELECT id FROM directory  WHERE id_user = $id_user");
         $user_directory = $q->fetch(PDO::FETCH_OBJ);
         folder_only();
        redirection_link('file_account');
        exit();
      }else{
        $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrecte";
        redirection_link('login');
        exit();
      }
  }

?>
<!-- Container page login -->
  <div class="container">
    <br/><br/>
    <div class="well">

      <h1 class="text-center"><strong><?= WEBNAME ; ?></strong></h1>

      <?php if(!empty($errors)): ?>

      <div class="alert alert-danger">
        <p>Tentative de connexion échoué :</p>
          <ul>
            <?php foreach($errors as $error): ?>
              <li><?= $error; ?></li>
            <?php endforeach; ?>
          </ul>
      </div>

      <?php endif; ?>

      <form data-parsley-validate method="post" action="">
        <div class="form-group">

          <label class="control-label" for="username">Nom d'utilisateur</label>
          <input class="form-control" id="username" name="username" type="text" required="required">
        <br/>
          <label class="control-label" for="password">Mot de passe</label>
          <input class="form-control" id="password" name="password" type="password" required="required">
        <br/>
          <button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>

        </div>
      </form>

    </div><!-- /jumbotron -->

  </div><!-- /container -->
<!-- End container page login -->

<?php
  require_once 'partials/_footer.php';
?>
