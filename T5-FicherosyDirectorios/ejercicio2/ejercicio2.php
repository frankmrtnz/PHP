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

    print "<h1 style='text-align:center;'>Ej2 - Manejo de Ficheros y Directorios</h1>";


    if(!is_file('contador.txt')){
        $contar=fopen('contador.txt','w');
        $contador = 0;
        fwrite($contar, $contador);
        fclose($contar);
    } else {
        $archivo=fopen("contador.txt","r+");    //con 'r+' es lectura y escritura, puntero al principio
        $contador=fgets($archivo);
        print "El número total de visitas a la página son: <b>$contador</b>";
        $contador++;
        rewind($archivo);   //Coloca el puntero al principio del fichero
        fwrite($archivo, $contador);  
        fclose($archivo);
    }
?>

</body>
</html>