<?php
//Archivo para incluir las funciones generales que se usen en los demás archivos

// Datos de la BD
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "ejercicio12";


//Funcion para conectar al servidor de BBDD
function conexion1($servidor,$usuario,$password) {
    // Creación de la conexión a la base de datos con mysql
    $conexion = mysqli_connect($servidor,$usuario,$password) or die("No pudo conectarse con el servidor <br>");

    return $conexion;
}


//Funcion para seleccionar la BD introducida por parametro
function conexion2($servidor,$usuario,$password,$basededatos) {
    // Creación de la conexión a la base de datos con mysql
    $conexion = mysqli_connect($servidor,$usuario,$password,$basededatos) or die("Ups! Va a ser que no se ha podido conectar a la BD '$basededatos'.<br>");

    return $conexion;
}



//Funcion para cerrar conexion
function cerrarConexion($conexion,$basededatos) {
    //Cerrar conexión con BD
    mysqli_close($conexion) or die("No se ha podido cerrar la conexión con la BD '$basededatos'.<br>");

}




// ---------------------------



//Funcion para sanear
function sanear($var) {
    $tmp = isset($_REQUEST[$var]) 
            ? trim(htmlspecialchars($_REQUEST[$var],ENT_QUOTES,"UTF-8"))
            : "";
    return $tmp;
}




?>