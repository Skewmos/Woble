<?php
  require_once 'partials/_header.php';
  setcookie('remember', NULL, -1);
  unset($_SESSION['auth']);
  unset($_SESSION['csrf']);
  $_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';
  redirection_link('login');
?>
