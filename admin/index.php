<?php
  $page = "login";
  /****************************
  * Inclusion des divers fichiers *
  *****************************/
  require('../include/constant.php');
  require('inc/header.php');


  if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $req = $database->prepare('SELECT * FROM admin WHERE username = :username');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    $password = sha1($_POST['password']);
      if($password == $user->password){

        $remember_token = str_random(250);
        $database->prepare('UPDATE admin SET token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
        setcookie('remember', $user->id . '==' . $remember_token . sha1($user->id . 'adtr'), time() + 60 * 60 * 24 * 7);
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
        redirection_link('logs');
        exit();
      }else{
        $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrecte";
        redirection_link('index');
        exit();
      }
  }

?>
<!-- Container page login -->
  <div class="container">
    <br/><br/>
    <div class="well">
      <h1 class="text-center">Connexion panel admin </h1>
      <form data-parsley-validate method="post" action="">
        <div class="form-group">

          <label class="control-label" for="username">Nom d'utilisateur</label>
          <input class="form-control" id="username" name="username" type="text" required="required" placeholder="Pseudo ou adresse email">
        <br/>
          <label class="control-label" for="password">Mot de passe</label>
          <input class="form-control" id="password" name="password" type="password" required="required" placeholder="Mot de passe">
        <br/>
          <button type="submit" class="btn btn-default" > Se connecter</button>

        </div>
      </form>

    </div><!-- /jumbotron -->

  </div><!-- /container -->
<!-- End container page login -->

<?php
  require_once 'inc/footer.php';
?>
