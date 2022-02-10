<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Simulacro-1</title>
 <link href="estilos_soluciones.css" rel="stylesheet" type="text/css" title="Color" />
</head>
<body>
<?php
include('func-simulacro-1.php');
if(isset($_REQUEST["enviar"]))
	

{
	$error=array();

	//OBTENER VALORES DEL FORMULARIO
	$nombre=recoge("nomb");
	$apellido=recoge("apellidos");
	$edad=recoge("edad");
	 $tf=recoge("tf");
	 $mail=recoge("email");
	 
	 //Validación con funciones predefinidas en el lenguaje
	 
	if ($edad=="" || !ctype_digit($edad))
	{$error[]="<p class='aviso'>la edad introducido: $edad no es correcto o es nulo<BR/>";}
	else {print "el dato introducido: $edad<br/>";}

	if ($tf=="" || !ctype_digit($tf))
	{$error[]="<p class='aviso'>el telefono introducido: $tf no es correcto o es nulo";}
	else {print "el dato introducido: $tf<br/>";}


	if ($mail=="" || !filter_var($mail, FILTER_VALIDATE_EMAIL))
	{$error[]="<p class='aviso'>el email introducido: $mail no es correcto o es nulo<BR/>";}
	else {print "el dato introducido: $mail<br/>";}

	//Validar en funcion cualquier texto que tenga letras, con y sin tildes, espacios en blanco y/o guiones con patrón

	 $nombok=validotexto("$nombre");
	 
		print"<p>la funcion devuelve $nombok</P>";
		if ($nombok=="1")
		{print("<p>Su nombre es <b>$nombre</b></p>");}
		
	$apok=validotexto("$apellido");
		if ($apok=="1")
		{print("<p>Su apellido es <b>$apellido</b></p>");}
		
	//SUBIDA DE FICHERO

	if (is_uploaded_file ($_FILES["foto"]["tmp_name"])) //ver si se ha cargado
	{
		$dir1="fotos/";
		$dir1=creardirectorio($dir1);
			$fich=$_FILES["foto"]["name"];
			$completo=$dir1.$fich;

			if(is_file($completo))
				//ver si existe ya en el directorio
				{$unico=time();
				 $fich=$unico.$fich;
				 $completo=$dir1.$fich;
				}



	 
	 //mover el fichero al directorio permanente si no hay errores
			if (empty($error) and $apok==1 and $nombok==1)
		{ 
					if (move_uploaded_file($_FILES["foto"]["tmp_name"],$completo))
			{
					 print"<h2> Los ficheros generados por este documento son: </h2><br/>";

					 //para acceder a traves de un enlace a la imagen
					 print " <LI class='vis'>El foto al que se accede a través del enlace: <A HREF='" .$dir1.$fich . "'>" . $fich ."</A>\n";
					
					//CREACION DE FICHEROS DE TEXTO DEL USUARIO Y DEL FICHERO
					
					$texto="texto.txt";
					$modo="a+";
					$cadena=$nombre.$apellido.$edad.$tf.$mail;
					$bytes=0;
					$totalinea=createxto($texto,$modo,$cadena);
					$tamano=filesize($texto);	
					
					echo"<br><span class='vis'>El txt cuyo nombrees $texto y su tamaño:</span>".
					$tamano."Bytes <br><span class='vis'>y los bytes transferidos en esta linea son:</span>" .$totalinea."Bytes";
					
				//cierro fichero de entrada de datos explicar  global en función
				
					fclose ($gestor); 
					
					
					//----Muevo las imagenes a otro diectorio y creo otro txt con informacion de esas imagenes
						
							//creación del archivo de texto si noexiste(w+).
							
							$nomb='archivo_imagen.txt';
							$modo2="a+";
							crearimagentxt($nomb,$modo2);
							fclose($recurso);
			
					// ME POSICIONO EN EL DIRECTORIO DEL SCRIPT PARA ACCEDER A LOS DIRECTORIOS DE LAS COPIAS
					
					chdir('../');
					
					//copio las imágenes a otro directorio del mismo nivel
					$origen="fotos/";
					$destino="archivo/";
					$destino=creardirectorio($destino);
					copiaimagen($origen,$destino);

			}
			else{ 
							
												echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
												$errofich=errorFich('foto');
												if ($errofich!=0)
												{
													print "el error de subida de fichero es:<br>". $errofich;
												} 
				}
		}		
	
		else{
				print "<p class='aviso'>No se subre foto, ni se genera linea en txt,ni se mueven imágenees por errores en los ontroles mostrados</p>";
				print'<pre>'.print_r($error).print"</pre>";
			}
	}
		else  {print'No ha seleccionado el fichero o falta el nombre y apellido';}
}

else{
 //Si no se ha enviado nunca el formulario se ejecuta esta parte
?>
<h1> datos personales</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" ENCTYPE="multipart/form-data">
NOMBRE:<input type="text" name="nomb"/>
APELLIDOS:<input type="text" name="apellidos"/><br/>
EDAD:<input type="text" name="edad"/><br/>
TELEFONO:<input type="text" name="tf"/><br/>
EMAIL:<input type="text" name="email"/><br/>
<INPUT TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="102400">
FOTO:<INPUT TYPE="FILE" SIZE="44" NAME="foto">
<input type="submit" name="enviar"/><br/>
</form>
<?php
}
?>
</body>
</html>