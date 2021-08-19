<?php
require_once 'elements/auth.php';
var_dump(is_connected());



require "./elements/conect_BDD.php";
require "./elements/header.php";
?>
<script src="js/app.js" defer></script>
<?php 

try {
  if (isset($_POST['recherche'])) {
    $reherche = $_POST['recherche'];
    $req = $db->prepare("SELECT * FROM produits WHERE pro_libelle LIKE '$reherche%'  ");
    $req->execute();
  } else {
    $req = $db->prepare("SELECT * FROM produits");
    $req->execute();
  }
  $objs_dai = $req->fetchAll();
} catch (PDOException $e) {
  $error = $e->getMessage();
}
if($error){
    echo $error;
    die;
}
?>

  <div class="container ">
    <div class = "d-flex justify-content-between py-5 ">
      <h4>tous les produits</h4>
      <form action="" method="POST" class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" name="recherche" placeholder="nom du produit (libellé)" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
              </form>
    </div>

    
    <div class="container-fluid d-flex ">
     <div class="container-fluid col-9 d-flex justify-content-start  flex-wrap ">
    <?php if (count($objs_dai) === 0) : ?>

      <div class="p-5 alert alert-danger text-center">
        <h2>le produit que vous avez recherché n'existe pas dans la liste </h2>
        <a href="tableau.php"><input class="fs-3 m-5 px-4 mx-5 btn btn-secondary" name="routeur" value="routeur"></a>
      </div>

    <?php else : ?>
      <?php foreach($objs_dai as $val) : ?>

        
    <div class="col-sm-5 border border-info my-2 mx-3 ">
      <div class=" d-flex justify-content-between align-items-center my-1 ">
         <img style="max-width: 150px;" class="img-responsive img-fluid" src="./jarditou_photos/<?=$val->pro_id?>.<?=$val->pro_photo ?>" alt="<?=$val->pro_id?>.<?=$val->pro_photo ?>">
          <div >
        <h5 id="libelle" class="text-centre"><?= $val->pro_libelle ?></h5>
        <br>
         <p id="prix" class="text-centre"><?= $val->pro_prix . '€' ?></p>
        <?php if (verify()):?>
         <button id="btn" class="btn btn-outline-success" value="<?=$val->pro_id?>" >Ajouter</button>
         <?php endif; ?>
        </div>
      </div>
      <p>discription:<br><small><?=$val->pro_description ?></small></p>
    </div>
        <?php endforeach;?>

      
    <?php endif ?>
    
    </div> 
    <?php if (verify()):?>
    <div id="panier" class="container col-3 border border-info">
        <h5>votre panier:</h5>
        <table class="table table-bordered table-sm">
          <thead class="bg-light h5 display-5">
            <tr class="text-center">   
              <th>quantity</th>   
              <th>Libellé</th>
              <th>Prix</th>   
            </tr>
          </thead>
          <tbody id="tbody" class="table">
              <tr id="tr" class="table"></tr>
        <br>
        <br>
        
        
            </tbody>
        </table>
        <button id="delete" class="btn btn-outline-danger" value="<?=$val->pro_id?>" >supprimer</button>

        </div>
        <?php endif; ?>
  </div>
</div>




<?php
require "./elements/footer.php";

?>