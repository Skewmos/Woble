<?php

/****************************
* Inclusion des divers fichiers *
*****************************/
require('include/constant.php');
require('partials/_header.php');

/**
* Verification du formulaire et du speudo
**/
if (!empty($_POST)) {
  // inisialisation du tableaux d'erreurs
  $errors = [];
  if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/' , $_POST['username'])) {
     $errors['pseudo'] = "votre pseudo n'est pas valide";
  }else {
    $req = $database->prepare('SELECT id FROM users WHERE username = ?');
    $req->execute([$_POST['username']]);
    $user = $req->fetch();
    if ($user) {
      $errors['pseudo'] = "Ce pseudo est déja utilisée";
    }
  }
  /**
  *Pseudo utilisée*
**/
    if (is_already_in_use('username' , $_POST['username'] , 'users')) {
       $errors['pseudo_use'] = "Pseudo deja utilisé";
    }
/**
  *email utilisée*
**/
    if (is_already_in_use('email' , $_POST['email'] , 'users')) {
       $errors['email_use'] = "Cette adresse email est déja utilisée pour un autre compte !";
    }
  /**
  * On verifie la validitée de l'adresse email
  **/
  if (empty($_POST['email']) || !filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Votre email n'est pas valide";
  }else {
    $req = $database->prepare('SELECT id FROM users WHERE email = ?');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
  }

  if (empty($_POST['password']) || $_POST['password'] != $_POST['password_con']) {
    $errors['password'] = "Vous devez renter un mot de passe valide";
  }
  /**
  * On verifie si la variable error est vide si c'est le cas on enregistre l'user en Bdd
  **/
  if (empty($errors)) {
    $req = $database->prepare("INSERT INTO users SET username = ? , email = ? , password = ?");
    $password =password_hash($_POST['password'] , PASSWORD_BCRYPT);
    $req->execute([$_POST['username'], $_POST['email'], $password]);
    $user_id = $database->lastInsertId();
    $q = $database->prepare('INSERT INTO directory SET name = :name , id_user = :id , id_ranks = :ranks');
    $q->execute([
    'name' => $user_id,
    'id'=> $user_id ,
    'ranks' => 2
      ]);
    $_SESSION['flash']['success'] = "Vous pouvez vous connectez !";
    redirect('login.php');
 }
}

 ?>
 <!-- Container-fluid -->
<div class="container-fluid">
  <form data-parsley-validate class="form-horizontal well" action='' method="POST">
    <fieldset>
    <h1 class="text-center"><img src="https://img15.hostingpics.net/thumbs/mini_907986logo.png" alt="Woble_logo" style="width:100px; height:100px;"></h1>
    <br>
      <!-- Affichage des erreurs -->
        <?php include('partials/_error.php'); ?>
    <!-- End affichage -->
    <!-- Username -->
    <div class="form-group">
      <!-- Username -->
      <label class="control-label"  for="username">Nom d'utilisateur</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="Entrée votre pseudo" class="form-control" required="required">
      </div>
    </div>
      <!-- End Username -->
      <!-- Email -->
    <div class="form-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="Entrée votre adresse emai" class="form-control" required="required">
      </div>
    </div>
      <!-- End Email -->
      <!-- Password -->
    <div class="form-group">
      <!-- Password-->
      <label class="control-label" for="password">Mot de passe</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="Entrée votre mot de passe" class="form-control" required="required">
      </div>
    </div>
      <!--  End Password -->
      <!-- Password confirm -->
    <div class="form-group">
      <!-- Password Confirm -->
      <label class="control-label"  for="password_con">Confirmée votre mot de passe</label>
      <div class="controls">
        <input type="password" id="password_con" name="password_con" placeholder="Confirmée votre mot de passe" class="form-control" required="required">
      </div>
    </div>
      <!-- End Password confirm -->
      <!-- Submit -->
    <div class="form-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit" class="btn btn-default" name="button"><span class="glyphicon glyphicon-log-in"></span> Devenir menbre</button>
      </div>
    </div>
      <!--  End Submit -->
    </fieldset>
  </form>
</div>
<!-- End Container-fluid -->
<?php require('partials/_footer.php'); ?>
