<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: burlywood;">
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 1-6 - BORRAR TODO 2</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="index.php" style="color:white;">Página inicial</a></span>
    </h3>
    


    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");


    

    if (isset($_REQUEST['no'])) {
        header("location:index.php");
        exit();
    }


    if(isset($_REQUEST['si'])) {
        /*  BORRA BASE DE DATOS */
        // Selección de la base de datos utilizar
        $conexion2 = conexion2($servidor,$usuario,$password,$basededatos);
        $consulta1 = "DROP DATABASE $basededatos";
        if(mysqli_query($conexion2,$consulta1)) {
            print "<p>Base de Datos borrada correctamente.</p>";
        } else {
            print "<p>Base de Datos NO ha sido borrada. <br> </p>";
        }        
        //Cerramos la conexión con la BD
        cerrarConexion($conexion2,$basededatos);


        print "<hr>";


        /* CREA BASE DE DATOS Y TABLA DE DOS CAMPOS */
            // Creación de la base de datos

            // Creación de la conexión a la base de datos con mysql
            $conexion1 = conexion1($servidor,$usuario,$password);

            $creaDB = "CREATE DATABASE IF NOT EXISTS $basededatos";
            if(mysqli_query($conexion1,$creaDB)) {
                print "Una nueva Base de datos '$basededatos' se creó correctamente. <br>";
            } else {
                print "La creación de la nueva BD '$basededatos' no se pudo realizar. Error: <b>" . mysqli_error($conexion1) . "</b><br>";
            }

            
            // Selección de la base de datos utilizar
            $conexion2 = conexion2($servidor,$usuario,$password,$basededatos);

            //Creacion de tabla en la BD
            $creaTablasDB = "CREATE TABLE IF NOT EXISTS personas(
                                id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
                                nombre VARCHAR(50) NOT NULL,
                                apellidos VARCHAR(100) NOT NULL,
                                PRIMARY KEY(id)
                            ) ENGINE=InnoDB;";
            if(mysqli_query($conexion2,$creaTablasDB)) {
                print "Una nueva Tabla de la BD '$basededatos' se creó correctamente. <br>";
            } else {
                print "La creación de la nueva tabla de la BD '$basededatos' no se pudo realizar. Error: <b>" . mysqli_error($conexion2) . "</b><br>";
            }
            //Cerramos la conexión con la BD
            cerrarConexion($conexion2,$basededatos);
    }


    ?>
</body>
</html>