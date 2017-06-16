<?php
  $page = "logs";
  require_once 'inc/header.php';
  require_once 'inc/nav.php';
  is_admin();
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

    <div class="well">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Message</th>
            <th>Utilisateur</th>
            <th>Id utilisateur</th>
            <th>Ip</th>
            <th>Date et heure</th>
          </tr>
        </thead>
        <tbody>

          <?php

            $req = $database->query('SELECT * FROM logs');
            while($data = $req->fetch(PDO::FETCH_OBJ)){
              echo '<tr>
                      <td>'.$data->message.'</td>
                      <td>'.$data->username.'</td>
                      <td>'.$data->id_user.'</td>
                      <td>'.$data->ip.'</td>
                      <td>Le '.date("d/m/Y à H:i", strtotime($data->date_logs)).'</td>
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
