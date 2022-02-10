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

if(isset($_REQUEST['enviar'])) {

    print "<h1 style='text-align:center;'>EJ1 - DATOS PERSONALES (RESULTADO)</h1>";

    $nombre = sanear('nombre');
    if(preg_match("/^[a-zA-Z]+/", $nombre)) {
        print "Nombre: <b>$nombre</b><br>";
    } else {
        print "<span style='color:red;'>Nombre introducido: $nombre no es válido o está vacío</span><br>";
    }


    $apellidos = sanear('apellidos');
    if(preg_match("/^[a-zA-Z]+/s", $apellidos)) {
        print "Apellidos: <b>$apellidos</b><br>";
    } else {
        print "<span style='color:red;'>Apellidos introducidos: $apellidos no son válidos o está vacío</span><br>";
    }


    $edad = sanear('edad');
    if(preg_match("/^[1-9]+/", $edad)) {
        print "Edad: <b>$edad</b><br>";
    } else {
        print "<span style='color:red;'>Edad introducida: $edad no es válida o está vacía</span><br>";
    }


    $tlf = sanear('tlf');
    if(preg_match("/(\+34|34)?[6|7]+([0-9]+){8}/", $tlf)) {
        print "Teléfono: <b>$tlf</b><br>";
    } else {
        print "<span style='color:red;'>Teléfono introducido: $tlf no es válido o está vacío</span><br>";
    }


    $email = sanear("email");
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        print "Dirección de correo: <b>$email</b><br>";
    } else {
        print "<span style='color:red;'>Email introducido: $email no es válido o está vacío</span><br>";
    }


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
            print "Fichero subido con el nombre: $nombreFichero<br>";
            print "La foto en el formulario es:<br>";
            print "<img src='$nombreCompleto' alt='foto1'>";
                    
    } else {
        print "(No se ha podido subir el fichero)";
    }



} else {
?>

<body>

    <h1 style='text-align:center;'>EJ1 - DATOS PERSONALES (FORMULARIO)</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <p>
            NOMBRE: <input type="text" name="nombre">
            APELLIDOS: <input type="text" name="apellidos"> <br>
            EDAD: <input type="text" name="edad"> <br>
            TELÉFONO (España): <input type="text" name="tlf"> <br>
            EMAIL: <input type="text" name="email"> <br>

            <input type="hidden" name="MAX_FILE_SIZE" value="<? echo $max_file_size; ?>">
            FOTO: <input type="file" name="imagen"> <br>
        </p>
        <p>
            <button type="submit" name="enviar">Enviar Consulta</button>
        </p>

        

    </form>


</body>

<?php
}
?>

</html>