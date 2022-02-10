<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3-Funciones</title>
</head>
<body>

<?php

print "<h1 style='text-align:center;'>Ej9 - Año bisiesto aleatorio.</h1>";

$dia = rand(1,31);
$mes = rand(1,12);
$anio = rand(1,3000);
$bisiesto;

function esBisiesto($anio){
    global $dia, $mes, $anio;
    if(($anio%4) != 0) {
        print "El <b>$dia/$mes/$anio</b> NO es bisiesto.";
    } else {
        print "El <b>$dia/$mes/$anio</b> SÍ es bisiesto.";
    }  
}

esBisiesto($anio);

?>

</body>
</html>