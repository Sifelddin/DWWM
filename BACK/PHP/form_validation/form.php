<?php
$message_name = null;
$message_email = null;
$message_check = null;
$error = null;

if(isset($_GET["error"])){
    
    $error = $_GET["error"];
    if($error == "name"){
        $message_name = "name feild is mandatory !";     
    } if($error == "email"){ 
        $message_email = "email feild is mandatory !";
    } if($error == "check"){  
        $message_check = "check feild is mandatory !";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<br>
<br>
<br>
<body>
<div class="container">
<form action="script.php" method="POST">  
    <div class="form-group">
    <label for="exampleInputPassword1">Name : </label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="enter name">
    <small  class="text-danger"><?= $message_name ?></small >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <small  class="text-danger"><?=$message_email ?></small >
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    <small  class="text-danger"><?=$message_check ?></small >
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>