
<?php


//Función que llamaremos para sanear cada entrada del formulario
function sanear($var) {
    $tmp = (isset($_REQUEST[$var]))
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
    return $tmp;
}




//Función validar texto
function validartexto($var2) {

    if($var2 != '') {
        global $errores;
        if(preg_match("/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s|-]*)+$/", $var2)) {
            $validar = '1';
        } else {
            $errores[] = "El formato de $var2 es incorrecto";
            $validar = '0';
        }
    } else {
        if($var2 == '') {
            $errores[] = "Falta el nombre o apellido";
            $validar = '0';
        }
    }
    return $validar;
    return var_dump($errores);
}


//Función Errores del fichero
function errorFich($fichero) {
	$err=0;
	if ($_FILES[$fichero]['error'] == '1' || $_FILES[$fichero]['error'] == '2') {
                print '<p style="color: red;"> No se ha podido subir el archivo, "pesa" demasiado.</p>';
				$err=12;
            } elseif ($_FILES[$fichero]['error'] == '3') {
                print '<p style="color: red;"> Se ha podido subir una parte del archivo, intentalo de nuevo.</p>';
					$err=3;
            } elseif ($_FILES[$fichero]['error'] == '4') {
                print '<p style="color: red;"> No se ha subido ningun archivo.</p>';
					$err=4;
            } elseif ($_FILES[$fichero]['error'] == '6' || $_FILES[$fichero]['error'] == '7' || $_FILES[$fichero]['error'] == '8') {
                print '<p style="color: red;"> No se ha podido subir el archivo, intentalo de nuevo.</p>';
					$err=678;
            }
			
	return $err;
}



//Función crear fichero de texto
function createxto($var,$modo,$cadena) {	
	global $gestor;
	$gestor = fopen($var, $modo)or die("Problemas al abrir $texto");
	$contenido=$cadena. "\r\n";//valores que paso de los controles del formulario
    return $cadena;
}



//Función para crear directorio
function crearDirectorio($var) {
    if(!is_dir($var)) {
        mkdir("$var/");
        return $dir1="$var/";
    }
    return $dir1="$var/";
}



//Función para directorio definitivo de copiaImagenes
function copiaimagen($origen,$destino) {
	if ($cursor = opendir($origen)) { 
		//apertura del directorio donde tengo las imagenes fotos/
		while ($archivo = readdir($cursor)) { //mientras exista un archivo en el directorio de origen
			if ($archivo != "." && $archivo != "..") {
				if (!is_dir($archivo)) {
					print "<br>$archivo, es el que voy a copiar al directorio archivo";
					//copia la imagen en la carpeta archivo
					copy($origen.$archivo,$destino.$archivo);
		    	}
			}
		}
	closedir($cursor);
	}	
}











?>