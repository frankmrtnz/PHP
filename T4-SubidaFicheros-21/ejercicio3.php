<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-SubidaFicheros</title>
</head>

<?php

//Función que llamaremos para sanear cada entrada del formulario
function sanear($var) {
    $tmp = (isset($_REQUEST[$var]))
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
    return $tmp;
}

//array para guardar los posibles errores en las comprobaciones
$errores = array();


if(isset($_REQUEST['enviar'])) {

    print "<h1 style='text-align:center;'>EJ3 - PAGINA (RESULTADO)</h1>";

    if(isset($_REQUEST['vivienda'])){
        $vivienda = sanear('vivienda');
        print "Vivienda: <b>$vivienda</b><br>";
    }


    if(isset($_REQUEST['zona'])){
        $zona = sanear('zona');
        print "Zona: <b>$zona</b><br>";
    }


    $direccion = sanear('direccion');
    if(preg_match("/^[a-zA-Z]+[0-9]*/", $direccion)) {
        print "Dirección: <b>$direccion</b><br>";
    } else {
        print "<span style='color:red;'>Dirección introducida: $direccion no es válida o está vacía</span><br>";
        $errores[] = "Error en la dirección";
    }


    if(isset($_REQUEST['dormitorios'])) {
        $dormitorios = sanear('dormitorios');
        print "Dormitorios: <b>$dormitorios</b><br>";
    } else {
        print "<span style='color:red;'>No ha indicado cantidad de dormitorios</span><br>";
        $errores[] = "Error en cantidad de dormitorios";
    }


    $precio = sanear('precio');
    if(preg_match("/^[0-9]+[\.|\,]?[0-9]*/", $precio)) {
        print "Precio: <b>$precio €</b> <br>";
    } else {
        print "<span style='color:red;'>Precio introducido: $precio no es válido o está vacío</span><br>";
        $errores[] = "Error en el precio introducido";
    }


    $tamanio = sanear('tamanio');
    if(preg_match("/^[0-9]+[\.|,]?[0-9]*/", $tamanio)) {
        print "Tamaño: <b>$tamanio metros cuadrados</b> <br>";
    } else {
        print "<span style='color:red;'>Tamaño introducido: $tamanio no es válido o está vacío</span><br>";
        $errores[] = "Error en el tamaño";
    }


    if(isset($_REQUEST['extras'])) {
        $extras = [$_REQUEST['extras']];
        foreach($extras as $indice => $valor) {
            print "Extras:";
            for($i=0;$i<3;$i++) {
                if(isset($valor[$i])) {
                    print " <b>$valor[$i]</b>,";
                }
            }
            print "<br>";
        }
    } else {
        print "<span style='color:red;'>No ha indicado ningún extra</span><br>";
        $errores[] = "Error en los extras";
    } 


    $observaciones = sanear('observaciones');
    if(preg_match("/^[a-zA-Z]+[0-9]*/", $observaciones)) {
        print "Observaciones: <b>$observaciones</b><br>";
    } else {
        print "<span style='color:red;'>Observaciones introducidas: $observaciones no son válidas o están vacío</span><br>";
        $errores[] = "Error en las observaciones";
    }


    if(empty($errores)) {
        //Subida Imagen
        if(is_uploaded_file ($_FILES['imagen']['tmp_name'])) {
            $nombreDirectorio = "imagenes/";
            $nombreFichero = $_FILES['imagen']['name'];
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
            if(is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreFichero = $idUnico."-".$nombreFichero;
                $nombreCompleto = $nombreDirectorio.$nombreFichero;
            }
            move_uploaded_file($_FILES['imagen']['tmp_name'],$nombreCompleto);
                print "La foto en el formulario es:<br>";
                print "<img src='$nombreCompleto' alt='foto1'>";
                        
        } else {
            print "<span style='color:red;'><b>(No se ha podido subir el fichero porque no ha adjuntado ningún archivo)</b></span>";
        }
    } else {
        print "<span style='color:red;'>No se puede dar el fichero por los errores visualizados, rellene bien el formulario.</span>";
        var_dump($errores);
    }

    


} else {
?>

<body>
    
<h1 style='text-align:center;'>INSERCIÓN DE VIVIENDAS (FORMULARIO)</h1>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <h2>Insertar los datos de la vivienda</h2> <br> <br>
        Tipo de vivienda: 
        <select name="vivienda" id="vivienda">
            <option value="Piso">Piso</option>
            <option value="Chalet">Chalet</option>
            <option value="Finca">Finca</option>
        </select> <br><br>
        Zona: 
        <select name="zona" id="zona">
            <option value="Centro">Centro</option>
            <option value="Norte">Norte</option>
            <option value="Sur">Sur</option>
        </select> <br><br>

        Dirección <input type="text" name="direccion" id="direccion"> <br> <br>

        Número de dormitorios:
        1 <input type="radio" name="dormitorios" value="1">
        2 <input type="radio" name="dormitorios" value="2">
        3 <input type="radio" name="dormitorios" value="3">
        4 <input type="radio" name="dormitorios" value="4">
        5 <input type="radio" name="dormitorios" value="5"> <br> <br>

        Precio <input type="text" name="precio" id="precio">€ <br> <br>

        Tamaño <input type="text" name="tamanio" id="tamanio"> metro cuadrados <br> <br>

        Extras (marque los que procedan):
        <input type="checkbox" name="extras[]" id="extras" value="piscina"> Piscina
        <input type="checkbox" name="extras[]" id="extras" value="jardín"> Jardín
        <input type="checkbox" name="extras[]" id="extras" value="garage"> Garage 
        <br> <br>

        Foto <input type="file" name="imagen" id="foto"> <br> <br>
        
        Observaciones: <textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea> <br> <br>
        <input type="submit" value="Insertar vivienda" name="enviar">
    </form>

</body>
<?php
}
?>
</html>