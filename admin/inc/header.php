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


<?php if(isset($_SESSION['flash'])): ?>
      <?php foreach($_SESSION['flash'] as $type => $message): ?>
          <div class="alert text-center alert-<?= $type; ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?= $message; ?>
          </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>
