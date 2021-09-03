
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="text-center">Calculatrice</h1>
    <br>
    <form action="includes/calcul.inc.php" method="POST">
    <div class="input-group">
    <span class="input-group-text"> premier chiffre</span>
    <input type="number" name="num1" class="form-control" placeholder="premier chiffre">
    <span class="input-group-text"> Opération</span>
    <select class="form-select" name="oper" >
    <option  selected>Select l'opération</option>
    <option value="add">+</option>
    <option value="sub">-</option>
    <option value="div">÷</option>
    <option value="mul">x</option>
    </select>
    <span class="input-group-text"> deuxième chiffre</span>
    <input type="number" name="num2"  class="form-control" placeholder="deuxième chiffre">
    </div>
    <br>
    <br>
    <div class="text-center">
    <button class="btn btn-primary" type="submit">Calculer</button>
  </div>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>