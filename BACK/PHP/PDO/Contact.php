
<?php
 require "./elements/header.php";
?>


    <main class="container">
        
        
    <p>* Ces zones sont obligatoires</p>
    <form action="http://bienvu.net/script.php" method="GET">
        
   
       <legend class="h3 ">Vos coordonnées</legend>
       <div class="form-group">
    <label for="name">Votre nom* : </label>
        <input class="form-control" type="text" id="name" name="nom" required> 
    </div>
   <div class="form-group">
    <label for="prénom">Votre prénom* :  </label>
    <input class="form-control" type="text" id="prénom" name="prenom" required>
</div>
<label class="form-check-label" >Sexe* :</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" id="f" type="radio"  name="sexe" value="Féminin">
        <label for="f" class="form-check-label" > Féminin</label>
    </div>
    <div class="form-check form-check-inline">
        <input id="m" class="form-check-input"  type="radio"  name="sexe" value="Masculin">
        <label for="m" class="form-check-label" > Masculin</label>
    </div>
    <div class="form-group mt-4">
        <label for="Data">Date de naissance* : </label>
        <input class="form-control" type="date" id="Data" name="data" value="" required>
   </div>
   <div class="form-group">
       <label for="number" >Code postal* :</label>
        <input id="number" class="form-control" type="number" name="CP" required>
 </div> 
   
     <div class="form-group">
         <label for="adresse" >Adresse : </label>
         <input id="adresse" class="form-control" type="text" name="Adresse">
     </div>
     <div class="form-group">
         <label for="ville" >Ville : </label>
         <input id="ville" class="form-control" type="text" name="ville">
     </div>
      <div class="form-group">
          <label for="email" >Email* :</label>
          <input id="email" class="form-control" type="email" name="email" placeholder="dave.loper@afpa.fr" required>
     </div>
   
   
       <legend class="h3">
           Votre demande
       </legend>
       <label for="Sujet">Sujet*</label>
       <select class="custom-select mb-3" id="Sujet" name="sujet" >
        <option value="" selected disabled >veulliez séléctionner un Sujet</option>
        <option value="Mes commandes">Mes commandes</option>
        <option value="Question sur le produit">Question sur le produit</option>
        <option value="Réclamation">Réclamation</option>
        <option value="Autre">Autre</option>
       </select>
       <br>
       <label for="cumments">Votre question* : </label>
       <textarea class="form-control" id="cumments" name="cumments"
          rows="3" cols="33">
</textarea>

   </fieldset>
<br>
 <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">j'accepte le traitement informatique de ce formulaire*</label>
  </div>
   <br>
   <button class="btn btn-dark mb-4" type="submit" value="">Envoyer</button>
   <button class="btn btn-dark mb-4" type="reset" value="annuler">Annuler</button>
</form>


</main>


<?php

require "./elements/footer.php";
?>