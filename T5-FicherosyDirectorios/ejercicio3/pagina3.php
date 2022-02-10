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

    //lectura del fichero y mostrar contenido línea a línea
    print "<p><b>Los comentarios introducidos en el fichero son:</b><br>";
    $nombreFichero = 'comentarios.txt';
    $a = fopen($nombreFichero, 'r');
    while(!feof($a)){
        print fgets($a) . "<br>";
    }
    fclose($a);

?>


</body>
</html>