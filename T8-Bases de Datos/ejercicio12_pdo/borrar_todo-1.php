<?php
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['clave'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: burlywood;">
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - BORRAR TODO 1</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>
    <form action="borrar_todo-2.php" method="post">
        <h4>¿Está seguro que quiere borrar todo?</h4>
        <p>
            <input type="submit" name="si" value="SÍ">
            <input type="submit" name="no" value="NO">
        </p>
    </form>
</body>
</html>
<?php

} else {
    header("location:index.php");
}

?>