
<?PHP
function recoge($var)
	{$tmp=(isset($_REQUEST[$var]))
	?trim(htmlspecialchars($_REQUEST[$var],ENT_QUOTES, "UTF-8"))
	:"";
	return $tmp; }


	
function validotexto($var3){
	global $error;
	if ($var3 != "" ){
	if (preg_match("/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s|-]*)+$/", $var3))
	{
	$validar="1";
	}
	 else{
		 $error[]="Falta  el formato de $var3 es incorrecto";
	$validar="0";
	}
	}
	else {if( $var3==""){$error[]="Falta el Nombre o Apellido ";
		$validar="0"; }
	}
	return $validar;
	}



function errorFich($fichero)

{
	$err=0;
	if ($_FILES[$fichero]['error'] == '1' || $_FILES[$fichero]['error'] == '2') {
                echo '<p style="color: red;"> No se ha podido subir el archivo, "pesa" demasiado.</p>';
				$err=12;
            } elseif ($_FILES[$fichero]['error'] == '3') {
                echo '<p style="color: red;"> Se ha podido subir una parte del archivo, intentalo de nuevo.</p>';
					$err=3;
            } elseif ($_FILES[$fichero]['error'] == '4') {
                echo '<p style="color: red;"> No se ha subido ningun archivo.</p>';
					$err=4;
            } elseif ($_FILES[$fichero]['error'] == '6' || $_FILES[$fichero]['error'] == '7' || $_FILES[$fichero]['error'] == '8') {
                echo '<p style="color: red;"> No se ha podido subir el archivo, intentalo de nuevo.</p>';
					$err=678;
            }
			
	return $err;
	
}
function createxto($var,$modo,$cadena)
{	$bytes=0;

	global $gestor;
	$gestor = fopen($var, $modo)or die("Problemas al abrir $texto");
				$contenido=$cadena. "\r\n";//valores que paso de los controles del formulario
				$bytes +=fwrite($gestor, $contenido);
				
				return $bytes;
	
	
}
function creardirectorio($var)
{
			if (!is_dir($var))
					{ mkdir("$var/");
						return $dir1="$var/";
					}
						return $dir1="$var/";
	
	
	
}
function crearimagentxt($var,$modo)
{ 
global $recurso;
	$recurso = fopen($var,$modo) or die( "Problemas al abrir $var");
						
				//otra forma de ver apertura con exito
			if ($recurso) 
			{					
					//defino el directorio en una constante para abreviar nomenclatura
					$dir1="fotos/";
					$dir1=creardirectorio($dir1);	
					//compruebo si existe
					
					if (!is_dir($dir1)) die ("Error al abrir el directorio $dir1");
					
					$cursor2 = opendir($dir1);
					
					//ME POSICIONO EN LA CARPETA DE LAS IMAGENES
					chdir($dir1);
					
					//mientras exista un archivo en el directorio LEO Y ESCRIBO SUS DATOS EN EL TXT
					while ($archivo = readdir($cursor2))
					{ 	
							//si el nombre del archivo  no son los directorios por defecto de windows(“.” O “..”)
						if ($archivo != "." && $archivo != "..")
						{
							//inserción del nombre del archivo
						fputs($recurso,$archivo.' '); 
						
							//inserción del tamaño del archivo
							
						fputs($recurso,filesize($archivo).'bytes'.  "\r\n");
						$tamaño=filesize($archivo) ;
						echo"<br><span class='vis'>El fichero de imagen cuyo nombre es : $archivo. <br>tiene un tamaño:</span>".$tamaño."Bytes <br>";
						}
					}
	
	
	
			}
}
function copiaimagen($origen,$destino)
{
	if ($cursor = opendir($origen)) 
			{ 
					//apertura del directorio donde tengo las imagenes fotos/
						
					while ($archivo = readdir($cursor)) 
					{ //mientras exista un archivo en el directorio de origen
						
						if ($archivo != "." && $archivo != "..")
						{
											if (!is_dir($archivo))
											{
												print"$archivo, es el que voy a copiar al directorio archivo";
													//copia la imagen en la carpeta archivo
												copy($origen.$archivo,$destino.$archivo);
											}
						}
					}
			closedir($cursor);
			}
	
	
	
	
}


?>
