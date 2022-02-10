<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimulacroExamen</title>
</head>

<?php

if(isset($_REQUEST['enviar'])) {

print "<h1 style='text-align:right;'>DATOS PERSONALES (RESULTADO)</h1>";

    function sanear($var) {
        $tmp = isset($_REQUEST[$var])
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
        return $tmp;
    }


    //array para guardar los posibles errores en las comprobaciones
    $errores = array();


    $nombre = sanear('nombre');
    if(preg_match("/^[a-zA-Z]+$/",$nombre)) {
        print "<b>Nombre:</b> $nombre<br>";
    } else {
        print "<span style='color:red;'>Nombre introducido: <b>'$nombre'</b> no válido (Solo letras mayúsculas o minúsculas)</span><br>";
        $errores[] = "Error en el nombre";
    }


    $apellidos = sanear('apellidos');
    if(preg_match("/^[a-zA-Z]+/s",$apellidos)) {
        print "<b>Apellidos:</b> $apellidos<br>";
    } else {
        print "<span style='color:red;'>Apellidos introducidos: <b>$apellidos</b> no válidos (Solo letras mayúsculas o minúsculas, aceptando espacios)</span><br>";
        $errores[] = "Error en los apellidos";
    }

    $edad = sanear('edad');
    if(preg_match("/^[1-9]+$/",$edad)) {
        print "<b>Edad:</b> $edad<br>";
    } else {
        print "<span style='color:red;'>Edad introducida: <b>'$edad'</b> no válida (Solo números, mínimo '1')</span><br>";
        $errores[] = "Error en la edad";
    }

    $tlf = sanear('tlf');
    if(preg_match("/^[6||7||9]{1}[0-9]{8}$/",$tlf)) {
        print "<b>Teléfono: </b>$tlf<br>";
    } else {
        print "<span style='color:red;'>Teléfono introducido: <b>'$tlf'</b> no válido (Solo números, y primer dígito que empiece por 6,7 o 9)</span><br>";
        $errores[] = "Error en el teléfono";
    }


    $email = sanear('email');
    if(preg_match("/^[a-z]+[0-9]*[\@]{1}[a-z]+[\.]{1}[a-z]+$/",$email)) {
        print "<b>Email: </b>$email<br>";
    } else {
        print "<span style='color:red;'>Email introducido: <b>'$email'</b> no válido (Ejemplo: fulanito@gmail.com)</span><br>";
        $errores[] = "Error en el email";
    }




    if(empty($errores)) {

        print "<h2>Los ficheros generados por este documento son:</h3>";

        //Subida Imagen
        if(is_uploaded_file ($_FILES['foto']['tmp_name'])) {
            $nombreDirectorio = "imagenes/";
            $nombreFichero = $_FILES['foto']['name'];
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
            if(is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreFichero = $idUnico."-".$nombreFichero;
                $nombreCompleto = $nombreDirectorio.$nombreFichero;
            }
            move_uploaded_file($_FILES['foto']['tmp_name'],$nombreCompleto);
                print "<b>Foto subida con el nombre:</b> $nombreFichero<br>";
                print "<b>La foto la cual se accede a través de un enlace es: </b>";
                print "<a href='$nombreCompleto'>$nombreCompleto</a><br>";
                        
        } else {
            print "<span style='color:red;'>(No se ha podido subir la foto)</span><br>";
        }


        //Crea fichero
        $nombreFichero = 'datosUsuario.txt';
        $archivo = fopen($nombreFichero,'a+') or die("Fallo de apertura de fichero");
        $separador = '----------------------------------------------';
        //Escribimos en el archivo los datos del usuario
        fwrite($archivo, $separador . "\n<b>Nombre: </b>$nombre - <b>Apellidos: </b> $apellidos - <b>Edad: </b>$edad - <b>Teléfono: </b>$tlf - <b>Email: </b>$email \n");
        //Mensaje de creación correcta del fichero
        print "El .txt cuyo nombre es: $nombreFichero , y su tamaño: " .filesize($nombreFichero). " bytes<br>";
        $bytes = 0;
        $bytes += fwrite($archivo, $separador . "\n<b>Nombre: </b>$nombre - <b>Apellidos: </b> $apellidos - <b>Edad: </b>$edad - <b>Teléfono: </b>$tlf - <b>Email: </b>$email \n");
        print "y los bytes transferidos en esta línea son: " .$bytes. " bytes<br><br>";
       
        //Cerramos el fichero
        fclose($archivo);



        //Copia del fichero 'foto' a directorio al mismo nivel
        $directorio = opendir('./imagenes');

        if(is_dir("imagenes/")) {
            $directorio = opendir('imagenes/') or die('Fallo de apertura del directorio');

            if(!file_exists('copiaImagenes/')) {
                mkdir('copiaImagenes/');
            }
            while($archivo = readdir($directorio)) {
                if(is_file('imagenes/'.$archivo)) {
                    print "El fichero de imagen cuyo nombre es: $archivo. Y tiene un tamaño: " .filesize('imagenes/'.$archivo). " Bytes.<br>";
                    print "$archivo es el que voy a copiar es el que voy a copiar al directorio 'copiaImagenes/' del mismo nivel<br>";
                    copy('imagenes/'.$archivo, 'copiaImagenes/'.$archivo);
                }
            }
            closedir($directorio);

        } else {
            print "No existe el directorio proporcionado";
        }





    } else {
        print "<br><span style='color:red;'>No sube foto, ni se genera linea en .txt, ni se copia las imagenes en otro archivo debido a errores en los controles mostrados.</span>";
        var_dump($errores);
    }

    




} else {
?>


<body>
    
<h1 style="text-align:right;">DATOS PERSONALES (FORMULARIO)</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
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
        FOTO: <input type="file" name="foto">
    </p>
    <p>
        <button type="submit" name="enviar">Enviar Consulta</button>
    </p>
</form>
<?php
}
?>
</body>
</html>