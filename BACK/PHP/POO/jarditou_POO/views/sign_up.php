<?php 

require_once('../includes/autoLoad.php');
require_once('../includes/header.php');

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
       <?php $nom = new Form('text','nom'); echo $nom->input(); ?>
        <?php if($error !== null && $error === "nom") :?> 
            <small  class="text-danger">Le nom doit contenir  que des lettres !</small >
      <?php endif; ?>
    </div>
   <div class="form-group">
    <label for="prénom">Votre prénom* :  </label>
    <?php $nom = new Form('text','prenom'); echo $nom->input(); ?>
        <?php if($error !== null && $error === "prenom") :?> 
            <small  class="text-danger">Le prenom doit contenir  que des lettres !</small >
      <?php endif; ?>
    </div>

   
    <div class="form-group">
        <label for="email" >Email* :</label>
        <?php $nom = new Form('email','email'); echo $nom->input(); ?>
        <?php if($error !== null && $error === "email") :?> 
            <small  class="text-danger">Adresse email doit être en bon format!</small >
      <?php endif; ?>
   </div>
 

     <div class="form-group">
         <label>Mot de pass : </label>
         <?php $nom = new Form('password','password'); echo $nom->input(); ?>
         <?php if($error !== null && $error === "password") :?> 
      <small  class="text-danger"> Mot de pass minimum 8 caractères !</small >
      <?php endif; ?>
     </div>
   
     <div class="form-group">
         <label>Confirmation  (Mot de pass) : </label>
         <?php $nom = new Form('password','password_confirm'); echo $nom->input(); ?>
         <?php if($error !== null && $error === "password-conformation") :?> 
      <small  class="text-danger"> Mot de pass Confirmation !</small >
      <?php endif; ?>
     </div>
   
   <button class="btn btn-primary mb-4" type="submit" name="submit" value="submit">Signe up</button>
   
</form>


</main>


<?php
require_once('../includes/footer.php');
?>
