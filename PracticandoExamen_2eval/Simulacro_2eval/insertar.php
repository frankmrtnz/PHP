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

    <?php
        include("funciones.php");

        if(isset($_REQUEST['insertar'])) {
            $localidad = sanear('localidad');
            $direccion = sanear('direccion');
            $numero = sanear('numero');
            $piso = sanear('piso');
            if(!preg_match("/^[[:alpha:]]/", $localidad)) { 
                // print "error localidad";
                array_push($errores, "Error en localidad");
             }
            if(!preg_match("/^[[:alpha:]]/", $direccion)) { 
                // print "error direccion";
                    array_push($errores, "Error en dirección");
            }
            if(!preg_match("/^[0-9]+$/", $numero)) { 
                // print "error num";
                array_push($errores, "Error en número");
            }
            if(!preg_match("/^[[:alnum:]]/", $piso)) { 
                // print "error psio";
                array_push($errores, "Error en piso");
            }


            if(!empty($errores)) {
                errores($errores);
            } else {
                $conexion = conexion2($servidor,$usuario,$password,$basededatos);

                if(is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                    $nombreDirectorio = 'imagenes/';
                    if(!is_dir($nombreDirectorio)) {
                        mkdir($nombreDirectorio);
                    }
                    $nombreFichero = $_FILES['archivo']['name'];
                    $nombreCompleto = $nombreDirectorio.$nombreFichero;
                    if(file_exists($nombreCompleto)) {
                        $idUnico = time();
                        $nombreFichero = $idUnico."-".$nombreFichero;
                        $nombreCompleto = $nombreDirectorio.$nombreFichero;
                    }
                    move_uploaded_file($_FILES['archivo']['tmp_name'], $nombreCompleto);
                                
                    $consulta = "INSERT INTO $tablaViviendas (localidad,direccion,numero,piso,foto)
                        VALUES (:localidad,:direccion,:numero,:piso,:foto)";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute([":localidad"=>$localidad, ":direccion"=>$direccion,
                        ":numero"=>$numero, ":piso"=>$piso, ":foto"=>$nombreFichero]);
                    if(!$resultado) {
                        print "ERROR EN CONSULTA";
                    } else {
                        header('Refresh:5, url=aterrizaje.php');
                        print "INSERTADO CON ÉXITO. Será redirigido en 5 segundos";
                    }



                } else {
                    $consulta = "INSERT INTO $tablaViviendas (localidad,direccion,numero,piso)
                        VALUES (:localidad,:direccion,:numero,:piso)";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute([":localidad"=>$localidad, ":direccion"=>$direccion,
                            ":numero"=>$numero, ":piso"=>$piso]);
                    if(!$resultado) {
                        print "ERROR EN CONSULTA";
                    } else {
                        header('Refresh:5, url=aterrizaje.php');
                        print "INSERTADO CON ÉXITO. Será redirigido en 5 segundos";
                    }
                                
                    print "<br> No se adjuntó ningún archivo. Código error: $error";
                    $error = $_FILES['archivo']['error'];
                    array_push($errores, "Error en subida fichero (CODIGO = $error)");
                }
            }
                            
                        


    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Datos de la vivienda a insertar</legend>
            <p>
                Localidad: <input type="text" name="localidad">
            </p>
            <p>
                Dirección: <input type="text" name="direccion">
            </p>
            <p>
                Número: <input type="number" name="numero">
            </p>
            <p>
                Piso: <input type="text" name="piso">
            </p>
            <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 2000000; ?>">
                Archivo: <input type="file" name="archivo">
            </p>
            <p>
                <button type="submit" name="insertar">Insertar</button>
                <button type="reset" name="resetear">Borrar</button>
            </p>
        </fieldset>
    </form>

    <?php
        }
    ?>

</body>
</html>

<?php
}
?>