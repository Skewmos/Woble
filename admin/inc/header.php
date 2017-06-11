<?php
  require_once '../include/database.php';
  require_once '../include/function.php';
  require_once '../include/constant.php';
  is_session();
  reconnect_cookie();

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Woble Cloud Open Source">
    <meta name="author" content="Fukotaku">
    <link rel="shortcut icon" href="../images/icon.ico" />

    <title>Panel Admin - <?=WEBNAME;?></title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome-->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>
  <body>

    <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand"> &nbsp;<?= WEBNAME ; ?> : Panel administrateur</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php if(isset($page) && $page == "index"){echo "class=\"active\"";} ?>><a href="index.php"><i class="fa fa-tasks" aria-hidden="true"></i> &nbsp;Les logs</a></li>
          <li <?php if(isset($page) && $page == "users"){echo "class=\"active\"";} ?>><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;Les utilisateurs</a></li>
          <li <?php if(isset($page) && $page == "directory"){echo "class=\"active\"";} ?>><a href="directory.php"><i class="fa fa-window-restore" aria-hidden="true"></i> &nbsp;Les répertoires</a></li>
          <li <?php if(isset($page) && $page == "settings"){echo "class=\"active\"";} ?>><a href="settings.php"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Les paramètres</a></li>
        </ul>
      </div>

    </div>
  </nav>

  <?php if(isset($_SESSION['flash'])): ?>
      <?php foreach($_SESSION['flash'] as $type => $message): ?>
          <div class="alert text-center alert-<?= $type; ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?= $message; ?>
          </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>
