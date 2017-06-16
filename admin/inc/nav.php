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
