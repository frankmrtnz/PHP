<?php

include("funciones.php");

$conexion = conexion1($servidor, $usuario, $password);
$creaDB = "CREATE DATABASE IF NOT EXISTS marzo";
if(!$conexion->query($creaDB)) {
    print "ERROR AL CREAR DB marzo";
}

$conexion = conexion2($servidor, $usuario, $password, $basededatos);
$creaTablaUsuarios = "CREATE TABLE IF NOT EXISTS `marzo`.`user` ( 
    `username` VARCHAR(100) NOT NULL , 
    `passwd` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`username`)
    ) ENGINE = InnoDB; ";
if(!$conexion->query($creaTablaUsuarios)) {
    print "ERROR AL CREAR Tabla usuarios";
}

$consulta = "INSERT IGNORE INTO $tablaUsuarios (username,passwd,email) VALUES('User1','admin1','user1@gmail.com')";
if(!$conexion->query($consulta)) {
    print "ERROR AL insertar usuario 1";
}
$consulta = "INSERT IGNORE INTO $tablaUsuarios (username,passwd,email) VALUES('User2','admin2','user2@gmail.com')";
if(!$conexion->query($consulta)) {
    print "ERROR AL insertar usuario 1";
}
$consulta = "INSERT IGNORE INTO $tablaUsuarios (username,passwd,email) VALUES('User3','admin3','user3@gmail.com')";
if(!$conexion->query($consulta)) {
    print "ERROR AL insertar usuario 1";
}

function creaTablaViviendas($conexion) {
    $creaTablaViviendas = "CREATE TABLE IF NOT EXISTS `marzo`.`viviendas` ( 
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
        `tipo` VARCHAR(100) NOT NULL , 
        `zona` VARCHAR(100) NOT NULL , 
        `direccion` VARCHAR(200) NOT NULL , 
        `dormitorios` INT NOT NULL , 
        `precio` INT NOT NULL , 
        `tamano` INT NOT NULL , 
        `extras` VARCHAR(100) NOT NULL , 
        `foto` VARCHAR(200) , 
        PRIMARY KEY (`id`)
        ) ENGINE = InnoDB";
    if(!$conexion->query($creaTablaViviendas)) {
        print "ERROR AL CREAR tabla viviendas";
    }
}


?>