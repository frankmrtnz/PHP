<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T5-FicherosyDirectorios</title>
</head>
<body>
    
<?php

print "<h1 style='text-align:center;'>Ej6 - Manejo de Ficheros y Directorios</h1>";

$directorio = opendir('./imagenes');

print "<h3>El contenido de los archivos del directorio 'ejercicio6/imagenes' es: </h1>";

if(is_dir("imagenes/")) {
    $directorio = opendir('imagenes/') or die('Fallo de apertura de directorio');
    $fichero = fopen('infoImagenes.txt','w+') or die('Fallo de apertura de fichero');

    if(!file_exists('copiaImagenes/')) {
        mkdir('copiaImagenes/');
    }
    while($archivo = readdir($directorio)) {
        if(is_file('imagenes/'.$archivo)) {
            fwrite($fichero, "<b>Nombre:</b> ".$archivo.' - <b>Tamaño: </b>'.filesize('imagenes/'.$archivo)." bytes<br>");
            copy('imagenes/'.$archivo, 'copiaImagenes/'.$archivo);
        }
    }
    fclose($fichero);
    closedir($directorio);

    $fichero2 = file('infoImagenes.txt');

    foreach($fichero2 as $valor) {
        print $valor.'<br>';
    }
} else {
    print "No existe el directorio proporcionado";
}


/*
while($archivo = readdir($directorio)) {
    //Verificamos si es un directorio o no
    if(!is_dir($archivo)) {
        //Si NO son directorios
        print "<b>Archivo: </b>$archivo - <b>Tamaño: </b>" . filesize('imagenes/'.$archivo) . " bytes <br>";
    } else {
        //Si son directorios -> No mostraremos nada
    }
}
*/



/*
$nombreFichero = 'infoImagenes.txt';
$archivo = fopen($nombreFichero, 'w+');     //con 'w+' abrimos para lectura y escritura, puntero al principio y sobreescribe, además sino existe se intenta crear
$separador = "-------------------------------------------------";
*/




?>

</body>
</html>