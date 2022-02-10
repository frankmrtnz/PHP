<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4-TareaMail</title>
</head>
<body>

<?php

function sanear($var) {
    $tmp = isset($_REQUEST[$var])
    ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
    : "";
    return $tmp;            

}

function enviarEmail($nombre, $email, $asunto, $mensaje) {

    // Indicar cabecera con el nombre del remitente. Si no indicamos la dirección de correo puede que 
	// no se realice el envío a a otros servicios como Hotmail o Yahoo
	$cabecera = "From: $nombre <fmartinezmartin.daw@gmail.com>\r\n";

    $datos   = "";
    $mensaje = "";

    // Si se seleccionó un archivo, se adjunta:
	if( !empty($_FILES['archivo']['name']) ) {	

			// Creamos una cadena aleatoria, para que tenga valor unico
			//como separador entre cuerpo y archivos adjuntos:
			$separador = md5(uniqid(time()));

			// Comprobamos si el archivo fue subido, y leemos su contenido
		    if(is_uploaded_file($_FILES['archivo']['tmp_name'])) {
 				 // Leemos el archivo obteniéndolo como una cadena de texto:
				 $archivo = fopen($_FILES['archivo']['tmp_name'], "rb");
				 $datos = fread( $archivo, filesize($_FILES['archivo']['tmp_name']) );
				 fclose($archivo);

				 // Dividimos la cadena de texto en varias partes más pequeñas:
				 $datos = chunk_split( base64_encode($datos) );
            }
	
			// Creamos la cabecera del mensaje:
			$cabecera .= "MIME-Version: 1.0\r\n".
						 "Content-Type: multipart/mixed; boundary=\"".$separador."\"\r\n\r\n";

			// Construimos el cuerpo del mensaje (para el texto):
			$mensaje = "--".$separador."\r\n";
			$mensaje .= "Content-Type:text/html; charset='iso-8859-1'\r\n";
			$mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$mensaje .= $_REQUEST['mensaje']."\r\n\r\n";

			// Continuamos construyendo el cuerpo del mensaje, añadiendo el archivo:
			$mensaje .= "--".$separador."\r\n";
			$mensaje .=	"Content-Type: ".$_FILES['archivo']['type']."; name='".$_FILES['archivo']['name']."'\r\n";
			$mensaje .= "Content-Transfer-Encoding: base64\r\n";
			$mensaje .= "Content-Disposition: attachment; filename='".$_FILES['archivo']['name']."'\r\n\r\n";
			$mensaje .= $datos."\r\n\r\n";

            /*
                Si se fuera a insertar otro archivo, tras haber leído el contenido 
				del mismo y haberlo cargado en otra variable, repetiríamos aquí las 
				cinco líneas anteriores (cambiando el nombre del componente del 
				formulario en $_FILES)
            */
			
            // Separador de final del mensaje
            $mensaje .= "--".$separador."--";

	} else {
		// // No se adjuntó ningún archivo, enviamos sólo el texto del mensaje:
        print "No ha adjuntado ningún archivo.";
        
        //indico el envío en formato HTML
        $cabecera = "MIME-Version: 1.0\r\n";  
        //Añado a la cabecera el juego decaracteres que voy a usar
        $cabecera .= "Content-type: text/html; charset=utf-8\r\n"; 
        //Añado a la cabecera si no pongo el de 8bit puede no coger las ñ, acentos, etc
        $cabecera .= "Content-Transfer-Encoding: 8bit\r\n";

        //Declaramos el contenido del mensaje
        // $mensaje = "Mensaje de: ".$_REQUEST['nombre'].PHP_EOL;
		// $mensaje .= "EMail: ".$_REQUEST['email'].PHP_EOL;
        $mensaje = "Mensaje de: ".$_REQUEST['nombre']."<br>";
		$mensaje .= "EMail: ".$_REQUEST['email']."<br>";
		$mensaje .= $_REQUEST['mensaje']."\r\n\r\n";
	}

    // IMPORTANTE: debes sustituir la dirección de correo por aquella en que deseas
	//recibir el EMail:
	$ok = mail( $email, $asunto, $mensaje, $cabecera );
    
	if($ok) {
        print "<p style='color:green;'>El E-Mail ha sido enviado</p>";
        print "<p>Haz <a href='ej4.php'>click para volver al formulario</a></p>";
    } else {
        $html  = "<html>";
		$html .= "<head>";

		// Después de 5 segundos de mostrarse esta página web de error se redirigiría a la URL especificada.
		$html .= "<meta http-equiv='refresh' content='5;url=ej4.php'>";

		$html .= "</head>";
		$html .= "<body>";
        $html .= "<p style='color:red;'>El E-Mail NO ha sido enviado</p>";
        $html .= "<p>Haz <a href='ej4.php'>click para volver al formulario</a></p>";
		$html .= "<p>En 5 segundos será redirigido a la página principal.</p>";
		$html .= "</body>";
		$html .= "</html>";

		print $html;
    }
		

}


if(isset($_REQUEST['enviar'])) {
    $nombre = sanear('nombre');
    $email = sanear('email');
    $mensaje = $_REQUEST['mensaje'];
    $asunto = "EJERCICIO 4";

    if(preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$nombre)
            && filter_var( $email , FILTER_VALIDATE_EMAIL)
            && !empty($asunto)
            && !empty($mensaje)) {
        
                enviarEmail($nombre, $email, $asunto, $mensaje);

    } else {
        header('Refresh:5; url=ej4.php');
        print "<ul><li style='color:red;'>Tiene errores en los campos (Todos los datos son obligatorios y deben tener un formato correcto)</li></ul>";
        print "<p>Haz <a href='ej4.php'>click para volver al formulario</a></p>";
        print "<p>En 5 segundos será redirigido a la página principal.</p>";
    }


} else {

?>

<form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
    <p>Nombre del remitente: <input type="text" name="nombre"></p>
    <p>EMail destinatario: <input type="text" name="email"></p>
    <p>Mensaje: <br> <textarea name="mensaje" cols="30" rows="5"></textarea></p>
    <p>Archivo adjunto:
        <input type="hidden" name="MAX_FILE_SIZE" value="<? print $max_file_size; ?>"> 
        <input type="file" name="archivo"></p>
    <p><button type="submit" name="enviar">Enviar</button></p>
</form>


<?php
}
?>


</body>
</html>