<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T5-Rehacer2-21</title>
</head>

<?php

include('func_ejercicio1.php');
if(isset($_REQUEST['enviar'])) {

    $errores = array();


    //SANEAMOS VALORES DEL FORM
    $nombre = sanear('nombre');
    $apellidos = sanear('apellidos');
    $edad = sanear('edad');
    $tlf = sanear('tlf');
    $email = sanear('email');



    //VALIDACIONES
    //Con función
    $nombreOK = validartexto("$nombre");
    if($nombreOK == '1') {
        print "<p>Su nombre es <b>$nombre</b></p>";
    } 

    $apellidosOK = validartexto("$apellidos");
    if($apellidosOK == '1') {
        print "<p>Sus apellidos son <b>$apellidos</b></p>";
    } 
    //Con funciones predefinidas en el lenguaje
    if($edad=='' || !ctype_digit($edad)) {
        $errores[] = "La edad introducida: $edad no es correcta o es nula";
    } else {
        print "La edad es: $edad<br>";
    }

    if($tlf=='' || !ctype_digit($tlf)) {
        $errores[] = "El teléfono introducido: $tlf no es correcto o es nulo";
    } else {
        print "El teléfono introducido es: $tlf<br>";
    }

    if($email=='' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El mail introducido: $email no es correcto o es nulo.";
    } else {
        print "El dato introducido es: $email<br>";
    }




    //SUBIDA IMAGEN
    if(is_uploaded_file ($_FILES['imagen']['tmp_name'])) {
        $nombreDirectorio = 'imagenes/';
        $nombreFichero = $_FILES['imagen']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if(is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        //Si no hay errores en los anteriores controles del form
        if(empty($errores) and $nombreOK=='1' and $apellidosOK=='1') {
            //Ficheros solo con formato '.jpg'
            if(strpos($nombreFichero, ".jpg")) {
                if(move_uploaded_file($_FILES['imagen']['tmp_name'],$nombreCompleto)) {
                    print "Fichero subido con el nombre: $nombreFichero<br>";
                    print "La foto en el formulario es:<br>";
                    print "<img src='$nombreCompleto' alt='foto1'>";

                    //Copio imágenes a otro directorio del mismo nivel
					$origen="imagenes/";
					$destino="copiaImagenes/";
					$destino=creardirectorio($destino);
					copiaimagen($origen,$destino);
                    
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
                    $errorfich=errorFich('imagen');
                    if ($errorfich!=0) {
                        print "El error de subida de fichero es:<br>". $errorfich;
                        //Creacion de ficheros de entrada de Errores del fichero
                        $texto="errores.txt";
                        $modo="a+";
                        $cadena=$errorfich;
                        createxto($texto,$modo,$cadena);
                        print "Dicho error se ha guardado en el fichero de texto '$texto'";
                        //Cierro fichero de entrada de Errores del fichero
                        fclose($gestor);
                    }
                }
            } else {
                print "El fichero/imagen a subir no es un archivo '.jpg'";
            }
        } else {
			print "<p class='aviso'>No se sube foto, ni se genera txt, ni se mueven imágenes por errores en los controles mostrados</p>";
			print'<pre>'.print_r($errores);print"</pre>";
        }
    } else {
        print "(No ha seleccionado el fichero o falta el Nombre y Apellido)";
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