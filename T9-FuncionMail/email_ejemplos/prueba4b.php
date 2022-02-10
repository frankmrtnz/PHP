<?php
	if(!isset($_POST['btnSubmit'])){
	print'<html>
<head><title>Enviar E-Mail desde PHP con Ficheros Adjuntos</title></head>
<body>
<form action="prueba4b.php" method="post" enctype="multipart/form-data">
	Nombre del remitente: <input type="text" name="txtNombre" id="txtNombre"/><br />
	Mail destinatario: <input type="text" name="txtMail" id="txtMail" /><br />
	Mensaje:<br /><textarea name="txtMensaje" id="txtMensaje" /></textarea><br />
	Archivo adjunto: <input type="file" name="txtFile" id="txtFile" /><p />
	<input type="submit" name="btnSubmit" value="Enviar" />
</form>
</body>
</html>';
}
else
{
// Comprobar si llegaron los datos requeridos:
    if(  !empty($_POST) && 
		 (isset($_POST['txtNombre'])  && !empty($_POST['txtNombre']))  &&
		 (isset($_POST['txtMail'])	  && !empty($_POST['txtMail']))	
	  )
	{

		// Indicar cabecera con el nombre del remitente. Si no indicamos la dirección de correo puede que 
		// no se realice el envío a a otros servicios como Hotmail o Yahoo
		$cabecera = "From: fmartinezmartin.daw@gmail.com\r\n";

		$datos   = "";
		$mensaje = "";

		// Si se seleccionó un archivo, se adjunta:
		if( empty($_FILES['txtFile']['name']) == false )
		{	

			// Creamos una cadena aleatoria, para que tenga valor unico
			//como separador entre cuerpo y archivos adjuntos:
			$separador = md5(uniqid(time()));

			// Comprobamos si el archivo fue subido, y leemos su contenido
		    if(is_uploaded_file($_FILES['txtFile']['tmp_name']))
			{
 				 // Leemos el archivo obteniéndolo como una cadena de texto:
				 $archivo = fopen($_FILES['txtFile']['tmp_name'], "rb");
				 $datos = fread( $archivo, filesize($_FILES['txtFile']['tmp_name']) );
				 fclose($archivo);

				 // Dividimos la cadena de texto en varias partes más pequeñas:
				 $datos = chunk_split( base64_encode($datos) );
			 }
	
			// Creamos la cabecera del mensaje:
			$cabecera .= "MIME-Version: 1.0\r\n".
						 "Content-Type: multipart/mixed; boundary=\"".$separador."\"\r\n\r\n";

			// Construimos el cuerpo del mensaje (para el texto):
			$mensaje = "--".$separador."\r\n";
			$mensaje .= "Content-Type:text/plain; charset='iso-8859-1'\r\n";
			$mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$mensaje .= $_POST['txtMensaje']."\r\n\r\n";

			// Continuamos construyendo el cuerpo del mensaje, añadiendo el archivo:
			$mensaje .= "--".$separador."\r\n";
			$mensaje .=	"Content-Type: ".$_FILES['txtFile']['type']."; name='".$_FILES['txtFile']['name']."'\r\n";
			$mensaje .= "Content-Transfer-Encoding: base64\r\n";
			$mensaje .= "Content-Disposition: attachment; filename='".$_FILES['txtFile']['name']."'\r\n\r\n";
			$mensaje .= $datos."\r\n\r\n";

            /*
                Si se fuera a insertar otro archivo, tras haber leído el contenido 
				del mismo y haberlo cargado en otra variable, repetiríamos aquí las 
				cinco líneas anteriores (cambiando el nombre del componente del 
				formulario en $_FILES)
            */
			
            // Separador de final del mensaje
            $mensaje .= "--".$separador."--";

		}
		else
		{

			// No se adjuntó ningún archivo, enviamos sólo el texto del mensaje:

			$mensaje = "Mensaje de: ".$_POST['txtNombre'].PHP_EOL;
			$mensaje .= "EMail: ".$_POST['txtMail'].PHP_EOL;
			$mensaje .= $_POST['txtMensaje'];
		}

		// IMPORTANTE: debes sustituir la dirección de correo por aquella en que deseas
		//recibir el EMail:
		$ok = mail( trim($_POST['txtMail']), "Mensaje de prueba", $mensaje, $cabecera );

		if( $ok == true )
			echo "<p>El E-Mail ha sido enviado</p>";
		else
			echo "<p>ERROR al enviar el E-Mail</p>";

		echo "<p>Haz <a href='adjuntos_1.html'>click para volver al formulario</a></p>";

	}
	else
	{

		$html  = "<html>";
		$html .= "<head>";

		// Después de cuatro segundos de mostrarse esta página web de error se redirigiría a la URL especificada.
		$html .= "<meta http-equiv='refresh' content='4;url=adjuntos_1.html'>";

		$html .= "</head>";
		$html .= "<body>";
		$html .= "No han llegado todos los datos. En unos segundos será redirigido a la página principal.";
		$html .= "</body>";
		$html .= "</html>";

		echo $html;

	}
}

?>