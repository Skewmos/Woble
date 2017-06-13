<?php
/****************************
* Inclusion des divers fichiers *
*****************************/
require('include/constant.php');
require('partials/_header.php');
/****************************
* Traitement du formulaire *
*****************************/
if (isset($_POST)) {
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
  extract($_POST);
  $to = "Contactwoble@gmail.com" ;
  $subject = "Contact - Woble";
  $content = $message;
  //definition des headers
  $headers = 'MIME-Version :1.0'."\r\n";
  $headers = 'Content-type :text/html; charset = iso-8859-1'."\r\n";
      mail($to , $subject , $content ,$headers);
      header("location: index.php");
      exit();
}
}
 ?>
 <link href="https://fonts.googleapis.com/css?family=Oswald:700|Patua+One|Roboto+Condensed:700" rel="stylesheet">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 <section id="contact" class="content-section text-center">
         <div class="contact-section">
             <div class="container">
               <h2>Contacter nous</h2>
               <div class="row well">
                 <div class="col-md-8 col-md-offset-2">
                   <form data-parsley-validate class="form-horizontal" method="post">
                     <div class="form-group">
                       <label for="name">Nom et prénom</label>
                       <input type="text" class="form-control" id="name"  name="name"placeholder="Marc Doe" required="required">
                     </div>
                     <div class="form-group">
                       <label for="email">E-mail</label>
                       <input type="email" class="form-control" id="email" name="email"placeholder="Marc.doe@example.com" required="required">
                     </div>
                     <div class="form-group ">
                       <label for="message">Votre Message</label>
                      <textarea  class="form-control" id="message" name="message" placeholder="Entrée votre message ..." required="required"></textarea>
                     </div>
                     <button type="submit" class="btn btn-default">Envoyer</button>
                   </form>

                   <hr>
                     <h3>Résaux social</h3>
                   <ul class="list-inline banner-social-buttons">
                     <li><a href="https://twitter.com/Woble_france" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-twitter"> <span class="network-name">Twitter</span></i></a></li>
                     <li><a href="https://www.facebook.com/Wobling/" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-facebook"> <span class="network-name">Facebook</span></i></a></li>
                     <li><a href="https://plus.google.com/u/0/113725136906248711458" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-google"> <span class="network-name">Google+</span></i></a></li>
                   </ul>
                 </div>
               </div>
             </div>
         </div>
       </section>
<?php  require('partials/_footer.php'); ?>
