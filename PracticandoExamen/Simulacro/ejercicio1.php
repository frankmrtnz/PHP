<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

//Funcion para sanear
function sanear($var){
    $tmp = isset($_REQUEST[$var])
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
    return $tmp;
}

if(isset($_REQUEST['enviar'])) {

$nombre=sanear('nombre');
$apellidos=sanear('apellidos');
$edad=sanear('edad');
$tlf=sanear('tlf');
$email=sanear('email');
$errores=[];


if(preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/",$nombre)){
    print "Su nombre es: <b>$nombre</b><br>";
} else {
    print "<span style='color:red;'>Falta nombre o formato es incorrecto</span><br>";
    array_push($errores,"Fallo en el nombre");
}

if(preg_match("/^([a-zA-ZáéíóúÁÉÍÓÚ])+(\s)*([a-zA-ZáéíóúÁÉÍÓÚ])*$/",$apellidos)){
    print "Sus apellidos son: <b>$apellidos</b><br>";
} else {
    print "<span style='color:red;'>Falta apellidos o formato es incorrecto</span><br>";
    array_push($errores,"Fallo en los apellidos");
}

if(ctype_digit($edad) && $edad>=1 && $edad<=130) {
    print "Su edad es: <b>$edad</b><br>";
} else {
    print "<span style='color:red;'>Falta edad o formato es incorrecto (dígitos enteros entre 1 y 130)</span><br>";
    array_push($errores,"Fallo en la edad");
}


if(filter_var($tlf,FILTER_VALIDATE_INT) && preg_match("/^[6|7|9]{1}[0-9]{8}$/",$tlf)) {
    print "Su teléfono es: <b>$tlf</b><br>";
} else {
    print "<span style='color:red;'>Falta teléfono o formato es incorrecto (empiece por 6,7 o 9 y seguido de 8 dígitos)</span><br>";
    array_push($errores,"Fallo en el teléfono");
}


if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
    print "Su email es: <b>$email</b><br>";
} else {
    print "<span style='color:red;'>Falta email o formato es incorrecto (EJ: ejemplo@gmail.com)</span><br>";
    array_push($errores,"Fallo en el email");
}

print "<hr>";


if(empty($errores)) {

    print "<h3>Los ficheros generados por este documento son:</h3>";

    //Subida imagen y creación ficheros de datos usuario y datos fotos
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        if(!is_dir('imagenes/')){
            mkdir('imagenes/');
        }
        $nombreDirectorio = 'imagenes/';
        $nombreFichero = $_FILES['foto']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if(file_exists($nombreCompleto)){
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        move_uploaded_file($_FILES['foto']['tmp_name'],$nombreCompleto);
        print "<ul><li>El fichero foto al que se accede a través del enlace: <a href='$nombreCompleto'>$nombreFichero</a></li></ul>";
        
        //Creacion fichero datos del usuario
        $fichDatosUsuario = 'datosUsuarios.txt';
        $archivoDatosUsuario = fopen($fichDatosUsuario,'a+');
        $textoDatosUsuario = "$nombre:$apellidos:$edad:$tlf:$email\n";
        $bytes = 0;
        $bytes += fwrite($archivoDatosUsuario,$textoDatosUsuario);
        print "El txt cuyo nombre es: <b>$fichDatosUsuario</b> y su tamaño: <b>".filesize($fichDatosUsuario)."Bytes</b><br>";
        print "y los bytes transferidos en esta línea son: <b>$bytes Bytes</b><br>";
        fclose($archivoDatosUsuario);
    
        //Creacion fichero datos Fotos
        $fichDatosFotos = 'datosFotos.txt';
        $archivoDatosFotos = fopen($fichDatosFotos,'a+');
        $tamanoFoto = filesize($nombreCompleto);
        $textoDatosFotos = "$nombreFichero:$tamanoFoto\n";
        fwrite($archivoDatosFotos,$textoDatosFotos);
        print "El fichero de imagen cuyo nombre es: <b>$nombreFichero</b>. Y tiene un tamaño: <b>$tamanoFoto Bytes</b><br>";
        fclose($archivoDatosFotos);
    } else {
        print "<span style='color:red;'>(Fallo en la subida de la imagen)</span><br>";
    }

    //Creacion de directorio copiaImagenes donde podremos las imagenes del directorio imagenes/
    if(is_dir($nombreDirectorio)) {
        $directorio=opendir($nombreDirectorio) or die("Fallo al abrir el directorio 'imagenes/'");
        $directorioCopia = 'copiaImagenes/';
        if(!is_dir($directorioCopia)) {
            mkdir($directorioCopia);
        }
        while($archivoImg = readdir($directorio)) {
            if(is_file($nombreDirectorio.$archivoImg)) {
                print "$archivoImg es el que voy a copiar al directorio $directorioCopia<br>";
                copy($nombreDirectorio.$archivoImg, $directorioCopia.$archivoImg);
            } else {
                print "'<b>$archivoImg</b>' no es un archivo<br>";
            }
        }
    } else {
        print "<span style='color:red;'>(El directorio '<b>$nombreDirectorio</b>' no existe)</span><br>";
    }

} else {
    print "<span style='color:red;'>No se sube foto, ni se genera txt, ni se mueve imágenes por errores en los controles mostrados</span>";
    print "<pre>";
    print_r($errores);
    print "</pre>";
}



} else {
?>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">

    <p>
        NOMBRE: <input type="text" name="nombre">
        APELLIDOS: <input type="text" name="apellidos">
    </p>
    <p>
        EDAD: <input type="text" name="edad">
    </p>
    <p>
        TELÉFONO: <input type="text" name="tlf">
    </p>
    <p>
        EMAIL: <input type="text" name="email">
    </p>
    <p>
        FOTO:   <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 1500000 ?>">
                <input type="file" name="foto">
    </p>
    <p>
        <button type="submit" name="enviar">Enviar consulta</button>
    </p>
</form>


<?php
}
?>

</body>
</html>