<?php 



require_once('../includes/autoLoad.php');
require_once('../includes/header.php');
use Controller\Form;

$error = null;

AutoLoad::register();
$form_obj = new Form();
?>

<h1>sign up</h1>
<main class="container">
        <div class="my-3 d-flex">
        <p>Si vous avez inscrit avant :
        <a href="login.php">Sign in</a></p>
        </div>
        <h3>Sign up </h3>
        <form action="scripts/script_user.php" method="POST">

        <p>* Ces zones sont obligatoires</p>
        
       <legend class="h4 ">Vos coordonnées</legend>
       <div class="form-group">
    <label>Votre nom* : </label>
       <?= $form_obj->input('text','nom') ?>
        <?php if($error !== null && $error === "nom") :?> 
            <small  class="text-danger">Le nom doit contenir  que des lettres !</small >
      <?php endif; ?>
    </div>
   <div class="form-group">
    <label>Votre prénom* :  </label>
    <?= $form_obj->input('text','prenom') ?>
        <?php if($error !== null && $error === "prenom") :?> 
            <small  class="text-danger">Le prenom doit contenir  que des lettres !</small >
      <?php endif; ?>
    </div>

   
    <div class="form-group">
        <label>Email* :</label>
        <?= $form_obj->input('email','email') ?>
        <?php if($error !== null && $error === "email") :?> 
            <small  class="text-danger">Adresse email doit être en bon format!</small >
      <?php endif; ?>
   </div>
 

     <div class="form-group">
         <label>Mot de pass : </label>
         <?= $form_obj->input('password','password') ?>
         <?php if($error !== null && $error === "password") :?> 
      <small  class="text-danger"> Mot de pass minimum 8 caractères !</small >
      <?php endif; ?>
     </div>
   
     <div class="form-group">
         <label>Confirmation  (Mot de pass) : </label>
         <?= $form_obj->input('password','pass_confirm') ?>
         <?php if($error !== null && $error === "password-conformation") :?> 
      <small  class="text-danger"> Mot de pass Confirmation !</small >
      <?php endif; ?>
     </div>
   
     <?= $form_obj->button('submit','sign up') ?>
   
</form>


</main>


<?php

require_once('../includes/footer.php');
?>
