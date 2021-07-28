<?php
//Exercice 1
// $tab = [];
// $i = 1;

// while($i < 150){
//     $tab[] = $i;
//     $i += 2;
// }
// print_r($tab);
//Exercice
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th{
            font-size: 1.3rem;
        border: solid 1px black;
        }
        td{
            font-size: 1.3rem;
            border: solid 1px black;
        } 
    </style>
</head>
<body>
    
<table style="border: solid 1px black;">
    <tr>
        <th></th>
<?php for($h = 0; $h <13; $h++){ ?>
    
    <th><?=$h?></th>
<?php }?>
</tr>
    <?php for($i = 0; $i <13; $i++){ ?>
        <th><?=$i?></th>
       <?php for($j = 0; $j <13; $j++){ ?>
       <td><?=$j * $i?></td>
    <?php }?>
        </tr>
    <?php }?>
</table>
<?php 
echo date("Y-m-d H:i:s");  
?>
</body>
</html>

