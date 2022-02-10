<?php

//Archivo para incluir las funciones generales que se usen en los demás archivos

// Datos de la BD
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "ejercicio12";
$tablaPersonas = "personas";
$tablaUsuarios = "usuarios";


//Funcion para conectar al servidor de BBDD
function conexion1($servidor,$usuario,$password) {
    try {
        $dsn = "mysql:host=$servidor; charset=utf8mb4";
        //Conecto a la BD
        $conexion = new PDO($dsn,$usuario,$password);
        //Elijo modo de errores para esta conexion
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Retorna manejador de la conexion
        return $conexion;
    } catch (PDOException $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>";
        //En caso de error capturo el mensaje y lo muesto
        print "<p>Error: ". $e->getMessage() ."</p>";
        exit();
    }
    
}


//Funcion para seleccionar la BD introducida por parametro
function conexion2($servidor,$usuario,$password,$basededatos) {
    try {
        $dsn = "mysql:host=$servidor; dbname=$basededatos; charset=utf8mb4";
        $conexion = new PDO($dsn,$usuario,$password);
        //Elijo modo de errores para esta conexion
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Retorna manejador de la conexion
        return $conexion;
    } catch (PDOException $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>";
        //En caso de error capturo el mensaje y lo muesto
        print "<p>Error: ". $e->getMessage() ."</p>";
        exit();
    }
}


//Funcion para cerrar conexion
function cerrarConexion($conexion) {
    //Cerrar conexión con BD
    $conexion = null;
}



//--------------------------------------------

define("MAX_REG_TABLA_PERSONAS", 20);  // Número máximo de registros en la tabla


//--------------------------------------------

//Funcion para sanear
function sanear($var) {
    $tmp = isset($_REQUEST[$var]) 
            ? trim(htmlspecialchars($_REQUEST[$var],ENT_QUOTES,"UTF-8"))
            : "";
    return $tmp;
}









?>




