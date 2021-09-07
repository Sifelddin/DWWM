<?php 

require_once('../includes/autoLoad.php');
require_once('../includes/header.php');
use Controller\Form;
$error = null;
AutoLoad::register();
$form_obj = new Form;
?>


<div class="container">
    <h1>log in</h1>
   <h3>formulaire de connection</h3> 
<br>
<form action="scripts/login_script.php" method="POST">
  <div class="form-group">
    <label >Email adresse :</label>
    <?=$form_obj->input('email','email') ?>
    <small  class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre .</small>
    <?php if($error !== null && $error === "email") :?> 
      <small  class="text-danger">Adresse email doit être en bon format!</small >
      <?php endif; ?>
    <?php if($error !== null && $error === "emailval") :?> 
      <small  class="text-danger">Adresse email n'est pas valide!</small >
      <?php endif; ?>
  </div>
  <div class="form-group">
    <label>Password</label>
    <?=$form_obj->input('password','password') ?>
    <?php if($error !== null && $error === "password") :?> 
      <small  class="text-danger">Mot de pass erroné !</small >
      <?php endif; ?>
  </div>
  <div class="my-3 d-flex">
        <p> vous avez oublier :
        <a href="forms/newPw.php">Mot de passe oublié</a></p>
        </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
<br>
</div>
<?php
require_once('../includes/footer.php');
?>
