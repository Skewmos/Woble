<?php
/****************************
* Inclusion des divers fichiers *
*****************************/
  require_once 'include/database.php';
  require_once 'include/function.php';
  /****************************
  * Traitement  *
  *****************************/
  if(isset($_GET['id']) && preg_match("/^[0-9]+$/i",$_GET['id'])){

    if(isset($_GET['type']) && $_GET['type'] == 'folder'){
      $id = $database->quote($_GET['id']);
      $req = $database->query("SELECT * FROM files WHERE id = $id");
      $fileDetect = false;
      while($data = $req->fetch()){
        $fileName = $data->name;
        $dirNumber = $data->id_directory;
        $fileDetect = true;
      }
      if($fileDetect == true){
        $req = $database->query("SELECT * FROM settings");
        $path = $req->fetch();
        $directory = "directory/".$dirNumber."/".$fileName;
        $location = $path->path.$directory;

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header('Content-Type: application/octet-stream');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($location));
        header('Content-disposition: attachment; filename="' . $fileName . '"');
        readfile($location);
        exit();
      }
    }elseif(isset($_GET['type']) && $_GET['type'] == 'link'){

      $id = $database->quote($_GET['id']);
      $req = $database->query("SELECT * FROM internal WHERE id = $id");
      while($data = $req->fetch()){
        $location = $data->location;
      }

      if(isset($_GET['file']) && $_GET['file'] && preg_match("/^[0-9]+$/i",$_GET['file'])){

        if(isset($_GET['dir'])){
          // Si dans un dossier
          $number = 1;
          $trans = array("@" => "+");
          $the_dir = strtr($_GET['dir'], $trans);

          if($dh = opendir($location.$the_dir)){
            while(($entry = readdir($dh)) !== false){
              if(!is_dir($entry)){
                if($number == $_GET['file']){
                  $location_file = $location.$the_dir."/".$entry;
                  $filename = $entry;
                }
                $number++;
              }

            }
            closedir($dh);
          }

          if(file_exists($location_file)){

            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($location_file));
            header('Content-disposition: attachment; filename="' . basename($location_file) . '"');
            readfile($location_file);
            exit();

          }

        }else{
          // Si dans la racine du répertoire
          $number = 1;
          if($dh = opendir($location)){
            while(($entry = readdir($dh)) !== false){
              if(!is_dir($entry)){
                if($number == $_GET['file']){
                  $location_file = $location."".$entry;
                  $filename = $entry;
                }
                $number++;
              }
            }
            closedir($dh);
          }
          if(file_exists($location_file)){

            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($location_file));
            header('Content-disposition: attachment; filename="' . basename($location_file) . '"');
            readfile($location_file);
            exit();

          }

        }
      }

    }
  }else{
    $_SESSION['flash']['danger'] = 'Aucun fichier sélectionné';
    header('location: index.php');
    exit();
  }

?>
