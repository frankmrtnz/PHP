<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2-PHP</title>
</head>
<body>
    
<?php

print "<h1>CONVERTIDOR DE BYTES (RESULTADO)</h1>";

$bytes = $_REQUEST['bytes'];
$KB = 1024;
$MB = $KB*1024;
$GB = $MB*1024;


if($bytes < 0 || $bytes > 2000000000){
    print "<p>Valor introducido de bytes está fuera del rango permitido. 
    Consulte los valores permitidos.</p>";
} else {

    if ($bytes >= 0 && $bytes < $KB){
        print $bytes . " byte/s son " . $bytes . " byte/s.";
    } else if ($bytes >= $KB && $bytes < $MB) {
        print $bytes . " byte/s son " . number_format(($bytes/$KB), 0) . " KB y " 
        . $bytes%$KB . " byte/s.";
    } else if ($bytes >= $MB && $bytes < $GB) {
        print $bytes . " byte/s son " . number_format(($bytes/$MB), 0) . " MB y "
        . number_format((($bytes%$MB)/$KB), 0) . " KB.";
    } else if ($bytes >= $GB) {
        print $bytes . " byte/s son " . number_format(($bytes/$GB), 0) . " GB, " 
        . number_format((($bytes%$GB)/$MB), 0) . " MB, " 
        . number_format(((($bytes%$GB)%$MB)/$KB), 0) . " KB y "
        . ((($bytes%$GB)%$MB)%$KB) . " byte/s";
    }

}


print "<p><a href='ejercicio2.html'>Volver al formulario.</a></p>";


?>

</body>
</html>