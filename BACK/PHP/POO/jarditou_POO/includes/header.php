
<?php
require_once 'auth.php';
var_dump(is_connected());
date_default_timezone_set("Europe/Paris");


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
        <img  class="w-25 p-2" src="jarditou_photos/jarditou_logo.jpg" alt="jarditou_logo" title="jarditou_logo">
        <h1 class=" h1 display-5 text-end mr-5 "> tout le jardin</h1>
    </div>
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
            <?php if(is_connected() === true && $_SESSION['role'] == 'admin') :?>
               <li class="nav-item">
              <a class="nav-link text-muted" href="tableau.php">Admin</a>
            </li>
              <?php endif ;?> 
            <?php if(is_connected() === false): ?>
          <li class="nav-item">
            <a class="nav-link text-muted" href="log_in.php">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted" href="sign_up.php">Signe up</a>
          </li>
          <?php else :?> 
          <li class="nav-item">
            <a class="nav-link text-muted" href="#">Sign out</a>
          </li>
          <?php endif ;?> 
         </ul>
    
        </div>
      </nav>   
      <img class="img-responsive img-fluid w-100 p-0" src="jarditou_photos/promotion.jpg" alt="photo de promotion">

