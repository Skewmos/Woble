<?php
/****************************
* Inclusion des divers fichiers *
*****************************/
require 'include/database.php';
require('include/function.php');
is_session();
reconnect_cookie();
 ?>
<!DOCTYPE html>
<html lang="fr" >
  <head>
<!--Meta-->
    <meta charset="utf-8">
    <meta name="google-site-verification" content="YvyBnXvekpg5vSf994RuWmRew_jEjtwA07KwJM8GEvM" />
    <title><?=WEBNAME;?></title>
<!-- Faveicon -->
    <link rel="shortcut icon" href="images/icon.ico">
<!--Bootstrap CDN CSS-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Style Sheet -->
                <link rel="stylesheet" href="assets/css/login.css">
                <link rel="stylesheet" href="assets/css/parsley.css">
                <link rel="stylesheet" href="assets/css/main.css">
<!-- font awesome-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require('partials/_nav.php'); ?>
