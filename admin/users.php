<?php
  $page = "users";
  require_once 'inc/header.php';
    require_once 'inc/nav.php';
  is_admin();

  if(isset($_GET['delete']) && preg_match("/^[0-9]+$/i",$_GET['delete'])){
    if(checkCsrf() === true){
      $id = $database->quote($_GET['delete']);
      $pdo->query("DELETE FROM users WHERE id = $id");

      $req = $database->query("SELECT id FROM directory WHERE id_user = $id");
      if(!empty($recup = $req->fetch())){
        $id = $recup->id;
        clear_directory($id);
        remove_directory($id);
        $database->query("DELETE FROM directory WHERE id = $id");
      }

      $_SESSION['flash']['success'] = 'Le compte a bien était supprimé';
      header('Location: users.php');
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

      <a href="register.php" class="btn btn-success input-margin"><span class="glyphicon glyphicon-plus"></span> Créer un utilisateur</a>
      <br/><br/>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom d'utilisateur</th>
            <th>Groupe</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php

            $req = $database->query('SELECT * FROM users');
            while($data = $req->fetch()){
              $rank = $database->quote($data->id_rank);
              $req2 = $database->query("SELECT * FROM ranks WHERE id = $rank");
              $result = $req2->fetch();

              if($data->username == $_SESSION['auth']->username){
                $disabled = 'disabled';
              }else{
                $disabled = '';
              }
              echo '<tr>
                      <td>'.$data->username.'</td>
                      <td>'.$result->name.'</td>
                      <td>
                        <a href="update.php?id='.$data->id.'" class="btn btn-warning input-margin"><i class="fa fa-wrench" aria-hidden="true"></i> Editer le compte</a>
                        <a href="users.php?delete='.$data->id.'&'.csrf().'" class="btn btn-danger input-margin '.$disabled.'" onclick="return confirm(\'Êtes vous sur ?\');"><i class="fa fa-user-times" aria-hidden="true"></i> Supprimer l\'utilisateur</a>
                      </td>
                    </tr>';
            }

          ?>

        </tbody>
      </table>

    </div><!-- /jumbotron -->

  </div><!-- /container -->


<?php
  require_once 'inc/footer.php';
?>
