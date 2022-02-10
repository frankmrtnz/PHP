<?php

//Datos de la BD
$servidor = "localhost";
$usuario = "root";
$password = "";
$basededatos = "examen2daw";
$tablaUsuarios = "usuarios";
$tablaViviendas = "viviendas";
$errores=[];


function conexion1($servidor, $usuario, $password) {
    try {
        $dsn = "mysql:host=$servidor; charset=utf8mb4";
        $conexion = new PDO($dsn, $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch(PDOException $e) {
        print "Error al conectar con servidor MYSQL";
        print "ERROR: ".$e->getMessage();
    }
}


function conexion2($servidor, $usuario, $password, $basededatos) {
    try {
        $dsn = "mysql:host=$servidor; dbname=$basededatos; charset=utf8mb4";
        $conexion = new PDO($dsn, $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch(PDOException $e) {
        print "Error al conectar con BD";
        print "ERROR: ".$e->getMessage();
    }
}

function cerrarConexion($conexion) {
    $conexion = null;
}


//---------------------------

function sanear($var) {
    $tmp = isset($_REQUEST[$var])
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}


//---------------------

function errores($errores) {
    $ficheroErrores = 'errores.txt';
    $archivoErrores = fopen($ficheroErrores, 'a+');
    foreach($errores as $indice => $valor) {
        fwrite($archivoErrores, "$valor\n");
    }
    // fclose($archivoErrores);
}




?>