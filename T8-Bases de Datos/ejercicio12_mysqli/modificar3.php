<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: burlywood;">
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 1-6 - MODIFICAR 3</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="index.php" style="color:white;">Página inicial</a></span>
    </h3>

    
    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");

    
    
    if(isset($_REQUEST['actualizar'])) {

            //Recogida, validacion y saneamiento de los registros
            $id = $_REQUEST['id'];
            $nombre = sanear('nombre');
            $apellidos = sanear('apellidos');

            if(preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$nombre) 
                && preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$apellidos)) {
                    
                // Selección de la base de datos utilizar
                $conexion = conexion2($servidor,$usuario,$password,$basededatos);

                $consulta = "UPDATE personas SET nombre='$nombre',apellidos='$apellidos' WHERE id='$id'";

                if(mysqli_query($conexion,$consulta)) {
                    print "Registro de $nombre $apellidos modificado correctamente (ID= $id).<br>"; 
                } else {
                    print "Registro de $nombre $apellidos NO se ha modificado correctamente (ID= $id).<br>
                    Error: <b>" . mysqli_error($conexion) . "</b>";
                }

                //Cerramos la conexión con la BD
                cerrarConexion($conexion,$basededatos);

            } else {
                print "<p style='color:red;'>Se requiere el nombre o apellido/s de la persona a actualizar con un formato correcto.</p>";
            } 
           

    } else {
        print "<p>No ha pulsado el botón de 'Actualizar'</p>";
    }


    ?>
</body>
</html>