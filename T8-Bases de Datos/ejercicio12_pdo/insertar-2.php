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
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - AÑADIR 2</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>
    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");
        
    
    if(isset($_REQUEST['insertar'])) {
        // Selección de la base de datos utilizar
        $conexion = conexion2($servidor,$usuario,$password,$basededatos);
        $consulta = "SELECT COUNT(*) FROM $tablaPersonas";
        $resultado = $conexion->query($consulta);
        if (!$resultado) {
            print "    <p>Error en la consulta.</p>\n";
            print "\n";
        } elseif ($resultado->fetchColumn() >= MAX_REG_TABLA_PERSONAS) {
            print "    <p>Se ha alcanzado el número máximo de registros que se pueden guardar.</p>\n";
            print "\n";
            print "    <p>Por favor, borre algún registro antes.</p>\n";
            print "\n";
        } else {
            //Validacion y saneamiento de los registros
            $nombre = sanear('nombre');
            $apellidos = sanear('apellidos');
            if((preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$nombre) 
                && preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$apellidos)) ) {

                    $consulta = "SELECT COUNT(*) FROM $tablaPersonas
                        WHERE nombre=:nombre
                        AND apellidos=:apellidos";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos]);
                    if (!$resultado) {
                        print "    <p>Error en la consulta.</p> <br>";
                    } elseif ($resultado->fetchColumn() > 0) {
                        print "    <p>El registro <b>$nombre $apellidos</b> ya existe. <br> 
                            No se ha guardado el registro.</p> <br>";
                    } else {
                        $insertar = "INSERT INTO personas(nombre,apellidos) VALUES('$nombre','$apellidos');";
                        if($conexion->query($insertar)) {
                            print "<p>Registro <b>$nombre $apellidos</b> creado correctamente.</p>";
                        } else {
                            print "<p>ERROR: Registro no se ha creado correctamente.</p>";
                        }
                    }


            } else {
                print "<p style='color:red;'>Se requiere el nombre o apellido/s de la persona a añadir con un formato correcto.<br>
                No se ha guardado el registro.</p>";
            } 
        }
        
        //Cerramos la conexión con la BD
        cerrarConexion($conexion);

    } else {
        print "<p>No ha pulsado el botón de 'Añadir'</p>";
    }



    ?>
</body>
</html>
<?php

} else {
    header("location:index.php");
}

?>