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
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - CONEXIÓN Y CREACIÓN 2</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>

<?php

//Incluye funciones principales desde otro archivo
include("funciones.php");

if(!isset($_REQUEST['si']) && !isset($_REQUEST['no'])) {
    header("location:index.php");
    exit();
}


if(isset($_REQUEST['no'])) {
    header("location:principal.php");
    exit();
}


if(isset($_REQUEST['si'])) {
    // Creación de la conexión a la base de datos con mysql
    $conexion = conexion1($servidor,$usuario,$password);


    // Creación de la base de datos
    $creaDB = "CREATE DATABASE IF NOT EXISTS $basededatos";
    if($conexion->query($creaDB)) {
        print "Base de datos '$basededatos' se creó correctamente en caso que no existiera. <br>";
    } else {
        print "ERROR: La creación de la BD '$basededatos' no se pudo realizar.<br>";
    }


    // Selección de la base de datos utilizar
    $conexion = conexion2($servidor,$usuario,$password,$basededatos);



    //Creacion de tablas en la BD
    $creaTablasDB = "CREATE TABLE IF NOT EXISTS $tablaPersonas(
                        id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
                        nombre VARCHAR(50) NOT NULL,
                        apellidos VARCHAR(100) NOT NULL,
                        PRIMARY KEY(id)
                    ) ENGINE=InnoDB;";
    if($conexion->query($creaTablasDB)) {
        print "Tabla '$tablaPersonas' de la BD '$basededatos' se creó correctamente en caso que no existiera. <br>";
    } else {
        print "ERROR: La creación de la tabla '$tablaPersonas' de la BD '$basededatos' no se pudo realizar.<br>";
    }




    //Cerramos la conexión con la BD
    cerrarConexion($conexion);


}
?>


<?php

} else {
    header("location:index.php");
}

?>