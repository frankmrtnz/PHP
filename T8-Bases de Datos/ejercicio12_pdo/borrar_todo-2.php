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
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - BORRAR TODO 2</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>
    


    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");


    

    if (isset($_REQUEST['no'])) {
        header("location:principal.php");
        exit();
    }


    if(isset($_REQUEST['si'])) {
        /*  BORRA BASE DE DATOS */
        // Selección de la base de datos utilizar
        $conexion = conexion2($servidor,$usuario,$password,$basededatos);
        $consulta = "DROP TABLE IF EXISTS $tablaPersonas";
        $resultado = $conexion->query($consulta);
        if(!$resultado) {
            print "    <p>Error en la consulta.</p> <br>";
        } else {
            print "<p>Tabla '$tablaPersonas' borrada correctamente. Todos los registros de '$tablaPersonas' fueron eliminados.</p>";
        }     
        //Cerramos la conexión con la BD
        cerrarConexion($conexion);


        print "<hr>";


        /* CREA TABLA personas */
            // // Creación de la base de datos

            // // Creación de la conexión a la base de datos con mysql
            // $conexion = conexion1($servidor,$usuario,$password);

            // $creaDB = "CREATE DATABASE IF NOT EXISTS $basededatos";
            // $resultado = $conexion->query($creaDB);
            // if(!$resultado) {
            //     print "    <p>Error en la consulta de la creación de la BD.</p> <br>";
            // } else {
            //     print "<p>Base de Datos '$basededatos' creada correctamente en caso que no existiera.</p>";
            // }     

            
            // Selección de la base de datos utilizar
            $conexion = conexion2($servidor,$usuario,$password,$basededatos);

            //Creacion de tabla en la BD
            $creaTablasDB = "CREATE TABLE IF NOT EXISTS personas(
                                id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
                                nombre VARCHAR(50) NOT NULL,
                                apellidos VARCHAR(100) NOT NULL,
                                PRIMARY KEY(id)
                            ) ENGINE=InnoDB;";
            $resultado = $conexion->query($creaTablasDB);
            if(!$resultado) {
                print "    <p>Error en la consulta de la creación de la BD.</p> <br>";
            } else {
                print "<p>Tabla '$tablaPersonas' creada correctamente desde cero.</p>";
            }  

            //Cerramos la conexión con la BD
            cerrarConexion($conexion);
    }


    ?>
</body>
</html>
<?php

} else {
    header("location:index.php");
}

?>