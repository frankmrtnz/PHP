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
    
    print "<h1 style='text-align:center;'>Ej3 - Manejo de Ficheros y Directorios (RESULTADO)</h1>";


    $nombre = $_REQUEST['nombre'];
    $comentarios = $_REQUEST['comentarios'];

    $nombreFichero = 'comentarios.txt';
    $archivo = fopen($nombreFichero,'a+');  //con 'a+' añade al archivo, sin borrar el contenido anterior
    $separador = '---------------------------------------------------------';


    //escribimos en el $archivo los datos proporcionados
    fwrite($archivo, $separador . "\n" . $nombre . "\n" . $comentarios . "\n");

    print "<p>Los datos se guardaron correctamente en el fichero '$nombreFichero'</p>";


    //cerrar archivo 
    fclose($archivo);

    
    print "<p>Pulse <a href='pagina3.php'>aquí</a> para ver todo el contenido del fichero.</p>";

?>

</body>
</html>