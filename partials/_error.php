<?php
/****************************
* Conditions affichage des erreurs *
*****************************/
if (isset($errors) && count($errors) != 0):
?>
<!-- Container affichage d'erreur -->
<div class="bg-danger alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h3>Vous n'avez pas rempli le formulaire correctement :</h3>
    <?php foreach ($errors as $error): ?>
      <?php echo $error.'<br/>'; ?>
    <?php endforeach; ?>
</div>
<!-- End Container affichage d'erreur -->
<?php endif; ?>
