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
    <h1 style="background-color: orange; color:white;">BASE DE DATOS - PHP</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="conexion-1.php" style="color:white;">Conectar, crear BD y tabla</a></span>
        <span style="padding:0px 20px;"><a href="insertar-1.php" style="color:white;">Añadir registros</a></span>
        <span style="padding:0px 20px;"><a href="listar.php" style="color:white;">Listado alfabetico</a></span>
        <span style="padding:0px 20px;"><a href="buscar-1.php" style="color:white;">Buscar</a></span>
        <span style="padding:0px 20px;"><a href="modificar-1.php" style="color:white;">Modificar</a></span>
        <span style="padding:0px 20px;"><a href="borrar-1.php" style="color:white;">Borrar</a></span>
        <span style="padding:0px 20px;"><a href="borrar_todo-1.php" style="color:white;">Borrar todo</a></span>
        <span style="padding:0px 20px;"><a href="cerrar_sesion.php" style="color:white;">Cerrar sesión</a></span>
    </h3>
    
</body>
</html>
<?php

} else {
    header("location:index.php");
}

?>