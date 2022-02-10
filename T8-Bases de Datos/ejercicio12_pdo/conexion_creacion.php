<?php

//Incluye funciones principales desde otro archivo
include("funciones.php");


$conexion = conexion1($servidor,$usuario,$password);


// Creación de la base de datos
$creaDB = "CREATE DATABASE IF NOT EXISTS $basededatos";
if(!$conexion->query($creaDB)) {
    print "<p>Base de datos '$basededatos' NO ha sido creada correctamente</p>";
}


// Selección de la base de datos utilizar
$conexion = conexion2($servidor,$usuario,$password,$basededatos);


// Creacion de tablas en la BD
// //Tabla personas
// $creaTabla1 = "CREATE TABLE IF NOT EXISTS $tablaPersonas(
//     id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
//     nombre VARCHAR(50) NOT NULL,
//     apellidos VARCHAR(100) NOT NULL,
//     PRIMARY KEY(id)
// ) ENGINE=InnoDB;";
// if(!$conexion->query($creaTabla1)) {
//     print "<p>Tabla '$tablaPersonas' NO ha sido creada correctamente</p>";
// }

//Tabla usuarios
$creaTabla2 = "CREATE TABLE IF NOT EXISTS $tablaUsuarios(
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    clave VARCHAR(70) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;";
if(!$conexion->query($creaTabla2)) {
    print "<p>Tabla '$tablaUsuarios' NO ha sido creada correctamente</p>";
} 


//Creacion usuarios 'admin' y 'usuario' por defecto
$consulta = "INSERT IGNORE INTO $tablaUsuarios (nombre,apellidos,email,clave) VALUES ('admin','admin','admin@gmail.com','admin1234')";
if(!$conexion->query($consulta)) {
    print "<p>Usuario 'admin' NO ha sido creado correctamente</p>";
} 
$consulta = "INSERT IGNORE INTO $tablaUsuarios (nombre,apellidos,email,clave) VALUES ('usuario','usuario','usuario@gmail.com','usuario1234')";
if(!$conexion->query($consulta)) {
    print "<p>Usuario 'usuario' NO ha sido creado correctamente</p>";
} 
$consulta = "INSERT IGNORE INTO $tablaUsuarios (nombre,apellidos,email,clave) VALUES ('usuario2','usuario2','usuario2@gmail.com','usuario1234')";
if(!$conexion->query($consulta)) {
    print "<p>Usuario 'usuario2' NO ha sido creado correctamente</p>";
} 

//Cierra conexion con la BD
cerrarConexion($conexion);


?>