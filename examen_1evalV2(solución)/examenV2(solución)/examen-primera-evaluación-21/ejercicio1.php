<!DOCTYPE html>
<HTML LANG="es">
<HEAD>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <TITLE>Subida de MATRICULA</TITLE>
</HEAD>

<BODY>

<?php

//Funcion para sanear
function sanear($var) {
    $tmp = isset($_REQUEST[$var]) 
            ? trim(htmlspecialchars($_REQUEST[$var],ENT_QUOTES,"UTF-8"))
            : "";
    return $tmp;
}

if(isset($_REQUEST['enviar'])) {

$nombre = sanear('nombre');
$apellidos = sanear('apellidos');
$direccion = sanear('direccion');
$email = sanear('email');
$ciclo = sanear('ciclo');
$edad = sanear('edad');
$estudios = sanear('estudios');
$observaciones = sanear('observaciones');
$errores=[];


if(preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*){3,30}$/",$nombre)) {
    print "<ul><li>Su nombre es: $nombre</li></ul>";
} else {
    print "<ul><li style='color:red;'>Se requiere el nombre del solicitante</li></ul>";
    array_push($errores,"Error en el nombre");
}

if(preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*){3,30}$/",$apellidos)) {
    print "<ul><li>Sus apellidos es: $apellidos</li></ul>";
} else {
    print "<ul><li style='color:red;'>Se requiere los apellidos del solicitante</li></ul>";
    array_push($errores,"Error en los apellidos");
}

if(ctype_print($direccion)) {
    print "<ul><li>Su dirección es: $direccion</li></ul>";
} else {
    print "<ul><li style='color:red;'>Se requiere la dirección del solicitante</li></ul>";
    array_push($errores,"Error en la dirección");
}

if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
    print "<ul><li>Su email es: $email</li></ul>";
} else {
    print "<ul><li style='color:red;'>Se requiere el email del solicitante</li></ul>";
    array_push($errores,"Error en el email");
}

if(preg_match("/^[a-zA-Z]+$/",$ciclo)){
    if($ciclo=="SMR" || $ciclo=="ASIR" || $ciclo=="DAW" || $ciclo=="DAM") {
        print "<ul><li>Su ciclo es: $ciclo</li></ul>";
    }
} else if($ciclo=="vacio") {
    print "<ul><li style='color:red;'>Se requiere ciclo del solicitante</li></ul>";
    array_push($errores,"Error en el ciclo");
} else {
    print "<ul><li style='color:red;'>Se requiere ciclo del solicitante</li></ul>";
    array_push($errores,"Error en el ciclo");
}

if(ctype_print($edad)){
    if($edad=="16-18" || $edad=="Mas de 18") {
        print "<ul><li>Su edad es: $edad</li></ul>";
    }
} else if($edad=="vacio") {
    print "<ul><li style='color:red;'>Se requiere edad del solicitante</li></ul>";
    array_push($errores,"Error en la edad");
} else {
    print "<ul><li style='color:red;'>Se requiere edad del solicitante</li></ul>";
    array_push($errores,"Error en la edad");
}


if(ctype_upper($estudios)) {
    if($estudios=="ESO" || $estudios=="BACHILLERATO") {
        print "<ul><li>Su estudios son: $estudios</li></ul>";
    }
} else {
    print "<ul><li style='color:red;'>Se requiere estudios del solicitante</li></ul>";
    array_push($errores,"Error en los estudios");
}


if(isset($_REQUEST['turno'])) {
    $turno = $_REQUEST['turno'];
    print "<ul><li>Los turnos seleccionados son: ";
    foreach($turno as $indice => $valor){
        print "$valor, ";
    }
    print "</li></ul>";
} else {
    print "<ul><li style='color:red;'>Se requiere turno del solicitante</li></ul>";
    array_push($errores,"Error en el turno");
}



if(preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóú])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóú])*)$/",$observaciones)) {
    print "<ul><li>Sus observaciones son: $observaciones</li></ul>";
} else {
    print "<ul><li style='color:red;'>Se requiere observaciones del solicitante</li></ul>";
    array_push($errores,"Error en las observaciones");
}


    //Comprobacion datos edad/ciclo/titulación
    if($edad == "16-18"){
        if($estudios == "ESO"){
            if($ciclo!="SMR"){
                print "<ul><li style='color:red;'>Los datos de edad y/o titulación y/o curso solicitado no es correcto, revise la solicitud</li></ul>";
                array_push($errores,"Error en los datos de edad/titulación/curso");
            }
        } else {
            print "<ul><li style='color:red;'>Los datos de edad y/o titulación y/o curso solicitado no es correcto, revise la solicitud</li></ul>";
            array_push($errores,"Error en los datos de edad/titulación/curso");
        }
    } else if($edad == "Mas de 18") {
        if($estudios=="ESO") {
            if($ciclo!="SMR"){
                print "<ul><li style='color:red;'>Los datos de edad y/o titulación y/o curso solicitado no es correcto, revise la solicitud</li></ul>";
                array_push($errores,"Error en los datos de edad/titulación/curso");
            }
        }
    }


    
    
print "<p><a href='ejercicio1.php'>Volver al formulario</a></p><br>";



print "<hr>";

if(!empty($errores)) {
    $fichErrores = 'errores.txt';
    $archivoErrores = fopen($fichErrores,'a+');
    foreach($errores as $indice => $valor){
        fwrite($archivoErrores,"$valor\n");
    }
    print "<p style='color:red;'>Se generó fichero de errores.txt debido a que se encuentra algún error</p>";
} else {
    print "<p>No se generó fichero de errores.txt debido a que no se encuentra ningún error</p>";
}


if(empty($errores)) {
    //Subida Imagen
    if(is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombreDirectorio = 'imagenes/';
        if(!is_dir($nombreDirectorio)) {
            mkdir($nombreDirectorio);
        }
        $nombreFichero = $_FILES['foto']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        
        if(file_exists($nombreFichero)) {
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        if(strpos($nombreFichero,".jpg") || strpos($nombreFichero,".png")){
            move_uploaded_file($_FILES['foto']['tmp_name'], $nombreCompleto);
            print "<ul><li>Foto: <a href='$nombreCompleto'>$nombreFichero</a></li></ul>";
        } else {
            print "<p style='color:red;'>El archivo que ha adjuntado no se corresponde con el formato admitido (.png y .jpg)</p><br>";
        }
        /*
        //Creacion fichero datos del Usuario en directorio aparte
        $directorioSolicitante = 'solicitante/';
        if(!is_dir($directorioSolicitante)) {
            mkdir($directorioSolicitante);
        }
        $fichDatosSolicitante = 'datosSolicitante.txt';
        $archivoDatosSolicitante = fopen($directorioSolicitante.$fichDatosSolicitante ,"a+");
        $textoDatosSolicitante = "$nombre:$apellidos:$direccion:$email:$ciclo:$edad:$estudios:$observaciones\n";
        fwrite($archivoDatosSolicitante, $textoDatosSolicitante);
        fclose($archivoDatosSolicitante);
        print "<p>El fichero de datos del solicitante: " .$directorioSolicitante.$fichDatosSolicitante." se ha creado con éxito</p><br>";
        */
    } else {
        print "<p style='color:red;'>(Fallo en la subida de la imagen)</p><br>";

        $codigoError = $_FILES['foto']['error'];
        if($codigoError=='0') {
            print "<p style='color:red;'>No hay error, fichero subido con éxito</p><br>";
        } else if($codigoError=='1'){
            print "<p style='color:red;'> El fichero subido excede la directiva
            upload_max_filesize de php.ini.</p><br>";
        } else if($codigoError=='2'){
            print "<p style='color:red;'>El fichero subido excede la directiva
            MAX_FILE_SIZE especificada en el formulario
            HTML.</p><br>";
        } else if($codigoError=='4'){
            print "<p style='color:red;'>No se subió ningún fichero.</p><br>";
        }
    }
}        
    





} else { 
?>


<H1>MATRICULA IES MÓSTOLES</H1>

<P>Introduzca los datos del Solicitante :</P>

<FORM CLASS="borde" ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"   METHOD="POST"  ENCTYPE="multipart/form-data"       >

		<P><LABEL>Datos Personales del solicitante:</LABEL>
		<span>Nombre:    <INPUT TYPE="text" NAME="nombre"        size="80" ></span><br><br>
		<span> Apellidos:<INPUT TYPE="text" NAME="apellidos"     size="80" ></span><br><br>
		<span> Dirección:<INPUT TYPE="text" NAME="direccion"     size="80"></span>
		<span> Email de Contacto:<INPUT TYPE="text" NAME="email"   size="20"></spa</P>

		<P><LABEL>Selecciona el  Ciclo Formativo:</LABEL>
		<SELECT NAME="ciclo" >
			<OPTION VALUE="vacio">...Seleccione...
			<OPTION VALUE="SMR">SMR
			<OPTION VALUE="ASIR">ASIR
		    <OPTION VALUE="DAW"> DAW
		    <OPTION VALUE="DAM">DAM
		</SELECT></P><br>

		<br><P><LABEL>Selecciona tu rango de edad:</LABEL>
		<SELECT NAME="edad"      >

			<OPTION VALUE="vacio">...Seleccione...
		   	<OPTION VALUE="16-18">16-18
		   	<OPTION VALUE="Mas de 18">Más de 18
		   
		</SELECT></P><br>


		<br><P><LABEL>Estudios de los que dispone:</LABEL>
		<INPUT TYPE="radio" NAME="estudios"        VALUE="ESO"    checked>ESO
		<INPUT TYPE="radio" NAME="estudios"        VALUE="BACHILLERATO">BACHILLERATO

		<br><P><LABEL>turno que prefiere</LABEL>
		<INPUT TYPE="checkbox" NAME="turno[]"     VALUE="Mañana">Mañana
		<INPUT TYPE="checkbox" NAME="turno[]"     VALUE="Tarde">Tarde
		<INPUT TYPE="checkbox" NAME="turno[]"     VALUE="Solo fin de semana">Solo fin de semana</P><br>

		<P><LABEL>Foto del Solicitante :</LABEL>

		<INPUT TYPE="hidden"     NAME="MAX_FILE_SIZE"    VALUE=<?php echo 1500000 ?>     >
		<INPUT TYPE="file"     NAME="foto"               >
		</P>

		<br><P><LABEL>Observaciones:</LABEL>
		<TEXTAREA NAME="observaciones" COLS="50" ROWS="5"></TEXTAREA></P><br>

		<P><INPUT TYPE="submit" NAME="enviar"></P>

</FORM>

<?php
}
?>

</BODY>
</HTML>