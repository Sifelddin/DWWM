<?php 

require_once('../../includes/autoLoad.php');
AutoLoad::register();
use Controller\Form;
$form = new Form;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PAGE ACCUEIL</title>
</head>
<body>
   <main class="container">
    <nav class="navbar navbar-expand-md navbar-light  bg-light">
        <a class="navbar-brand text-dark" href="index.php">jarditou.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-dark" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted" href="products.php">produits</a>
            </li>
          </ul>
          <ul class="navbar-nav mr-5">
            <?php // if(is_connected() === true && $_SESSION['role'] == 'admin') :?>
               <li class="nav-item">
              <a class="nav-link text-muted" href="admin.php">Admin</a>
            </li>
              <?php // endif ;?> 
            <?php // if(is_connected() !== false): ?>
          <li class="nav-item">
            <a class="nav-link text-muted" href="#">Sign out</a>
          </li>
          <?php // endif ;?> 
         </ul>
        </div>
      </nav>         
<div class="container">
<br><br>
    <h2>formulaire d'ajout d'un produit</h2>
    <br>
    <form action="../scripts/script_ajout.php" method="POST">
        <div class="form-group">

            <div>
                <label>Catégorie :</label><br>
                <select class="form-control" name="cat_id">
                    <?php foreach ($all_rows as $one_row) : ?>
                        <option value="<?= $one_row->cat_id ?>"><?= $one_row->cat_nom ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <br>
            <div>
                <label>"pro_ref" - Référence produit :</label><br>
                <?= $form->input('text','ref')?>
                <small  class="text-danger"></small >
            </div>
            <br>


            <div>
                <label>"pro_libelle"- Nom du produit :</label><br>
               
                <?= $form->input('text','libelle')?>
                <small  class="text-danger"></small >
            </div>

            <br>
            <div>
                <label>"pro_description"- Description du produit :</label><br>
                <textarea class="form-control" name="description" id="" cols=ly></textarea>
            </div>

            <br>
            <div>
                <label>"pro_prix"- Prix :</label><br>
              
                <?= $form->input('text','prix')?>
                <small  class="text-danger"></small >
            </div>

            <br>
            <div>
                <label>"pro_stock"- Nombre d'unités en Stock :</label><br>
             
                <?= $form->input('text','stock')?>
                <small  class="text-danger"></small >
            </div>

            <br>
            <div>
                <label>"pro_couleur"- Couleur :</label><br>
            
                <?= $form->input('text','couleur')?>
            </div>

            <br>
           

          
            <div>
                <label>"pro_d_ajout"- Date d'ajout :</label><br>
       
                <?= $form->input('date','date-Ajout')?>
            </div>

            <br>

            <div>
                <label>"pro_bloque" Bloquer le produit à la vente :</label><br>
                
                <?= $form->input('number','pro-bloque')?>
            </div>
            <br>
           
            <?= $form->button('submit','Ajouter')?>
            <a href="../admin.php"><input class="btn btn-secondary" name="routeur" value="Routeur"></a>
        </div>
    </form>
</div>


<?php
require_once('../../includes/footer.php');

?>