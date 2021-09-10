
<?php
require_once '../includes/auth.php';
require_once '../includes/AutoLoad.php';
var_dump(is_connected());
date_default_timezone_set("Europe/Paris");
use Controller\Form;
use Controller\Pro_contr;
AutoLoad::register();
$pro_obj = new Pro_contr();
$form = new Form;
if(isset($_POST['recherche'])){
    $objs_dai = $pro_obj->admin_search($_POST['recherche']);
}else{
    $objs_dai = $pro_obj->admin_getProducts();
}

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
    <div class="d-lg-flex justify-content-between align-items-center  d-none ">
       
    </div>
    <nav class="navbar navbar-expand-md navbar-light  bg-light">
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
            <?php // if(is_connected() === false): ?>
          <li class="nav-item">
            <a class="nav-link text-muted" href="log_in.php">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted" href="sign_up.php">Signe up</a>
          </li>
          <?php // else :?> 
          <li class="nav-item">
            <a class="nav-link text-muted" href="#">Sign out</a>
          </li>
          <?php // endif ;?> 
         </ul>
    
        </div>
      </nav> 
      <?php

// if (is_connected() === false) {
//   header('Location:sign_up.php');
//   exit;
// }
// if ( $_SESSION['role'] !== 'admin') {
//   header('Location:products.php');
//   exit;
// }
?>

  <div class="container">
    <div class = "d-flex justify-content-between py-5 ">
      <a href="form_ajout.php"><input class="mx-auto px-4 mx-5 btn btn-danger" name="ajouter" value="Ajouter un produit"></a>
      <h4>tous les produits</h4>
     <form action="" method="POST" class="form-inline mt-2 mt-md-0">
     <input class="form-control mr-sm-2" type="text" name="recherche" placeholder="nom du produit (libellé)" aria-label="Search">
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>                    
    </div>
    <?php if (count($objs_dai) === 0) : ?>
      <div class="p-5 alert alert-danger text-center">
        <h2>le produit que vous avez recherché n'existe pas dans la liste </h2>
        <a href="tableau.php"><input class="fs-3 m-5 px-4 mx-5 btn btn-secondary" name="routeur" value="routeur"></a>
      </div>
    <?php else : ?>
      <div class="table-responsive-md">
        <table class="table table-bordered table-sm">
          <thead class="bg-light h5 display-5">
            <tr class="text-center">
              <th>photos</th>
              <th>ID</th>
              <th>référence</th>
              <th>Libellé</th>
              <th>Prix</th>
              <th>stock</th>
              <th>Couleur</th>
              <th>Ajout</th>
              <th>Modif</th>
              <th>Bloqué</th>
            </tr>
          </thead>
          <tbody class="table-hover">

            <?php foreach ($objs_dai as  $val) : ?>           
              <tr class="table-warning text-center ">
                <td class="align-middle"><img style="max-width: 140px;" class="img-responsive img-fluid" src="./jarditou_photos/<?=$val->pro_id?>.<?=$val->pro_photo ?>" alt="<?=$val->pro_id?>.<?=$val->pro_photo ?>"></td>
                <td class="align-middle"><?= $val->pro_id ?></td>
                <td class="align-middle"><?= $val->pro_ref ?></td>
                <td class="align-middle"><strong>
                 <a class="text-danger" href= "./forms/details.php?pro_id=<?= $val->pro_id ?>"><?= $val->pro_libelle ?></strong></a></td>
                <td class="align-middle"><?= $val->pro_prix . " €" ?></td>
                <td class="align-middle"><?= $val->pro_stock ?></td>
                <td class="align-middle"><?= $val->pro_couleur ?></td>
                <td class="align-middle"><?= $val->pro_d_ajout ?></td>
                <td class="align-middle"><?= $val->pro_d_modif ?></td>
                <td class="align-middle"><?php if($val->pro_bloque == 0 || $val->pro_bloque == NULL){echo "non";}else{echo "oui";}?></td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>

      </div>
    <?php endif; ?>

  </div>






     
<?php
require "../includes/footer.php";

?>