<?php

// $my_var = "bonjour le monde";
// $fp = fopen("test.txt", "a");
// fputs($fp, $my_var);
// fclose($fp);

$file = __DIR__.DIRECTORY_SEPARATOR."ListeLiens.txt";
$csv = __DIR__. DIRECTORY_SEPARATOR."products_table.csv";

$dir_files = '../files';

//$fp = fopen("compteur.txt", "r+");
// for($i = 0; $i < 50; $i++){

//  file_put_contents($file,$line,FILE_APPEND);
// }
 //echo file_get_contents($csv,true,null,0);

 $resource = fopen($file, 'r');

$files = scandir($dir_files);
echo "<pre>";
print_r($files);
echo "</pre>";

//var_dump(fgets($resource));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<ul>
    <?php for($i = 0; $i < 5; $i++){ ?>
        <?php $line = fgets($resource); ?>
    <li><a href="<?= $line?>"> <?=$line?></a></li>
    <?php }?><?php fclose($resource)?>
    
</ul>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>