<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<pre>
<?php
print_r($_POST);
if(empty($_POST["name"]))  {
    header("Location:form.php?error=name");
    exit;
}
if(empty($_POST["email"]))  {
    header("Location:form.php?error=email");
    exit;
}
if(!isset($_POST["check"]) ||   isset($_POST["check"]) != "on") {
    header("Location:form.php?error=check");
    exit;
}
?>
</pre>
</body>
</html>
