<?php
  $page = "directory";
  require_once 'inc/header.php';
    require_once 'inc/nav.php';

  if(isset($_GET['delete_directory']) && preg_match("/^[0-9]+$/i",$_GET['delete_directory'])){
    if(checkCsrf() === true){
      $id = $database->quote($_GET['delete_directory']);
      clear_directory($id);
      remove_directory($id);
      $database->query("DELETE FROM directory WHERE id = $id");
      $_SESSION['flash']['success'] = 'Le répertoire a bien était supprimé';
      header('Location: directory.php');
      exit();
    }
  }

  if(isset($_GET['delete_internal']) && preg_match("/^[0-9]+$/i",$_GET['delete_internal'])){
    if(checkCsrf() === true){
      $id = $database->quote($_GET['delete_internal']);
      $database->query("DELETE FROM internal WHERE id = $id");
      $database->query("DELETE FROM access WHERE id_directory = $id AND link_directory = 1");
      $_SESSION['flash']['success'] = 'Le répertoire a bien était retiré';
      header('Location: directory.php');
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

      <a href="directory_edit.php" class="btn btn-success input-margin"><i class="fa fa-plus" aria-hidden="true"></i> Créer un répertoire</a>
      <a href="internal_edit.php" class="btn btn-success input-margin"><i class="fa fa-plus-square" aria-hidden="true"></i> Ajouter un répertoire existent</a>
      <br/><br/>
      <h3>Répertoires utilisateur :</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom du répertoire</th>
            <th>L'utilisateur propriétaire</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php

            $req = $database->query('SELECT * FROM directory');
            $existe_directory = 0;
            while($data = $req->fetch()){
              $existe_directory++;
              $user_id = $database->quote($data->id_user);
              $req2 = $database->query("SELECT username FROM users WHERE id = $user_id LIMIT 1");
              $result = $req2->fetch();

              echo '<tr>
                      <td>'.$data->name.'</td>
                      <td>'.$result->username.'</td>
                      <td>
                        <a href="directory_edit.php?id='.$data->id.'" class="btn btn-warning input-margin"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;Editer</a>
                        <a href="directory.php?delete_directory='.$data->id.'&'.csrf().'" class="btn btn-danger input-margin" onclick="return confirm(\'Êtes vous sur ?\');"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer le répertoire</a>
                      </td>
                    </tr>';
            }
            if($existe_directory == 0){
              echo '<tr class="text-center">
                      <td colspan="3">Aucun répertoire</td>
                    </tr>';
            }

          ?>

        </tbody>
      </table>

      <hr>

      <h3>Répertoires serveur :</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom du répertoire</th>
            <th>Chemin du répertoire</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php

            $req = $database->query('SELECT * FROM internal');
            $number = 0;
            $existe_internal = 0;
            while($data = $req->fetch()){
              $existe_internal++;

              echo '<tr>
                      <td>'.$data->name.'</td>
                      <td>'.$data->location.'</td>
                      <td>
                        <a href="internal_edit.php?id='.$data->id.'" class="btn btn-warning input-margin"><span class="glyphicon glyphicon-cog"></span> &nbsp;Editer</a>
                        <a href="access.php?id='.$data->id.'" class="btn btn-info input-margin"><span class="glyphicon glyphicon-lock"></span> Gérer les accès</a>
                        <a href="directory.php?delete_internal='.$data->id.'&'.csrf().'" class="btn btn-danger input-margin" onclick="return confirm(\'Êtes vous sur ?\');"><span class="glyphicon glyphicon-trash"></span> Supprimer le lien</a>
                      </td>
                    </tr>';
              $number++;
            }
            if($existe_internal == 0){
              echo '<tr class="text-center">
                      <td colspan="3">Aucun répertoire</td>
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
