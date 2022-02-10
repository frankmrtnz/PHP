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

print "<h1 style='text-align:center;'>Ej4 - Manejo de Ficheros y Directorios</h1>";


    $directorio = opendir(".");     //Abre el directorio actual en el que estamos

    print "<p><b>La ruta del directorio actual es: </b> " . getcwd() . "</p>";

    print "<h3>El contenido del directorio es: </h1>";
    while($archivo = readdir($directorio)) {
        //Verificamos si es un directorio o no
        if(is_dir($archivo)) {
            //Si son directorios
            print "<b>Directorio: </b>[". $archivo ."] - <b>Fecha última modificación: </b>" . date("d F Y H:i:s.", filectime($archivo)) . "<br>";
        } else {
            //Si son archivos
            print "<b>Archivo: </b>$archivo - <b>Tamaño: </b>" . filesize($archivo) . " bytes - <b>Fecha última modificación: </b>" . date("d F Y H:i:s.", filectime($archivo)) . "<br>";
        }
    }

    closedir($directorio);

?>

</body>
</html>