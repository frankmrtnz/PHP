<?php

include("funciones.php");

$conexion = conexion1($servidor, $usuario, $password);

$creaDB = "CREATE DATABASE IF NOT EXISTS $basededatos";
if(!$conexion->query($creaDB)) {
    print "Error al crear BD";
}


$conexion = conexion2($servidor, $usuario, $password, $basededatos);
$creaTablaUsuarios = "CREATE TABLE IF NOT EXISTS `examen2daw`.`usuarios` ( 
    `_id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `email` VARCHAR(150) NOT NULL UNIQUE, 
    `usuario` VARCHAR(70) NOT NULL, 
    `clave` VARCHAR(70) NOT NULL , 
    PRIMARY KEY (`_id`)
    ) ENGINE = InnoDB";
if(!$conexion->query($creaTablaUsuarios)) {
    print "Error al crear tabla usuarios";
}

$consulta = "INSERT IGNORE INTO $tablaUsuarios (email, usuario, clave) VALUES('admin@gmail.com', 'admin', '1234')";
if(!$conexion->query($consulta)) {
    print "Error al insertar usuario 'admin'";
}

$consulta = "INSERT IGNORE INTO $tablaUsuarios (email, usuario, clave) VALUES('usuario1@gmail.com', 'Usuario', 'abcd')";
if(!$conexion->query($consulta)) {
    print "Error al insertar usuario 'usuario1'";
}


$creaTablaViviendas = "CREATE TABLE IF NOT EXISTS `examen2daw`.`viviendas` ( 
    `_id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `localidad` VARCHAR(100) NOT NULL , 
    `direccion` VARCHAR(200) NOT NULL , 
    `numero` INT UNSIGNED NOT NULL , 
    `piso` VARCHAR(5) NOT NULL , 
    `foto` VARCHAR(200),
    PRIMARY KEY (`_id`)
    ) ENGINE = InnoDB;";
if(!$conexion->query($creaTablaViviendas)) {
    print "Error al crear tabla viviendas";
}



?>