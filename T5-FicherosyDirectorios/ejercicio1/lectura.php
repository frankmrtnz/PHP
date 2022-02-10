<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T5-FicherosyDirectorios</title>
</head>

<?php

if(isset($_REQUEST['enviar'])) {

    print "<h1 style='text-align:center;'>Ej1 - Manejo de Ficheros y Directorios (RESULTADO)</h1>";

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $tlf = $_REQUEST['tlf'];
    $email = $_REQUEST['email'];



    //abrir archivo, nombre archivo, modo escritura
    $nombreFichero = 'fich_salida.txt';
    $archivo = fopen($nombreFichero,'a+');  //con 'a+' añade al archivo, sin borrar el contenido anterior

    //escribir en $archivo el resto de cadena
    fwrite($archivo, "<b>Nombre:</b> $nombre - <b>Apellidos:</b> $apellidos - <b>Teléfono:</b> $tlf - <b>Email:</b> $email \n");
    fwrite($archivo, "$nombreFichero (tamaño): " . filesize($nombreFichero) . " bytes \n");

    print "Tu archivo se ha guardado con el nombre '$nombreFichero' <br>";

    //cerrar archivo 
    fclose($archivo);

    //lectura del fichero y mostrar contenido línea a línea
    print "<p><b>Los datos introducidos en el fichero son:</b><br>";
    $a = fopen($nombreFichero, 'r');
    while(!feof($a)){
        print fgets($a) . "<br>";
    }
    fclose($a);




} else {

?>

<body>
    
    <h1 style='text-align:center;'>Ej1 - Manejo de Ficheros y Directorios (FORMULARIO)</h1>
    <br>
    <form action="lectura.php" method="POST">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Apellidos: <input type="text" name="apellidos"></p>
        <p>Teléfono: <input type="text" name="tlf"></p>
        <p>Email: <input type="text" name="email"></p>
        <p><button type="submit" name="enviar">ENVIAR</button></p>
    </form>

</body>
<?php
}
?>
</html>