<?php
session_start();
if(!isset($_SESSION['autentificado']) && $_SESSION['autenticado'] != "SI") {
    header("location: index.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Viviendas</title>
</head>
<body>
    <h1>SISTEMA GESTOR DE VIVIENDAS</h1>
    <div class="menu">
        <a href="aterrizaje.php" style="margin:15px">Página principal</a>
        <a href="insertar.php" style="margin:15px">Añadir vivienda</a>
        <a href="modificar.php" style="margin:15px">Editar vivienda</a>
        <a href="borrar.php" style="margin:15px">Borrar vivienda</a>
        <a href="truncar.php" style="margin:15px">Truncar vivienda</a>
        <a href="cierraSesion.php" style="margin:15px">Cerrar sesión</a>
    </div>
    <br><br>
    <h1>Editar vivienda</h1>
    <?php

        include("funciones.php");

        if(isset($_REQUEST['actualizar'])) {

            //Recogida, validacion y saneamiento de los registros
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $localidad = sanear('localidad');
                $direccion = sanear('direccion');
                $numero = sanear('numero');
                $piso = sanear('piso');
                $foto = sanear('foto');

                if(!preg_match("/^[[:alpha:]]/", $localidad)) { 
                    print "error localidad";
                    array_push($errores, "Error en localidad");
                 }
                if(!preg_match("/^[[:alpha:]]/", $direccion)) { 
                    print "error direccion";
                        array_push($errores, "Error en dirección");
                }
                if(!preg_match("/^[0-9]+$/", $numero)) { 
                    print "error num";
                    array_push($errores, "Error en número");
                }
                if(!preg_match("/^[[:alnum:]]/", $piso)) { 
                    print "error psio";
                    array_push($errores, "Error en piso");
                }


                if(!empty($errores)) {
                    errores($errores);
                } else {
                    $conexion = conexion2($servidor,$usuario,$password,$basededatos);
    
                    $consulta = "UPDATE $tablaViviendas SET localidad='$localidad',direccion='$direccion',
                        numero='$numero', piso='$piso', foto='$foto' WHERE _id='$id'";

                    if($conexion->query($consulta)) {
                        print "Registro modificado correctamente (ID= $id).<br>"; 
                    } else {
                        print "ERROR: Registro NO se ha modificado correctamente (ID= $id).<br>";
                    }
                }



                                
    
                          
            } else {
                print "<p>No existe el ID de la persona que quiere modificar.</p>";
            }
            
           

    } else {
        print "<p>No ha pulsado el botón de 'Actualizar'</p>";
    }



    ?>



</body>
</html>

<?php
}
?>