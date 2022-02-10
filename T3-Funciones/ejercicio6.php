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

print "<h1 style='text-align:center;'>Ej6 (Respuesta)</h1>";
print "<p>Introduce dos números para mostrar su suma y su resta con una función.</p>";
print "<hr>";


$num1 = $_REQUEST['num1'];
$num2 = $_REQUEST['num2'];


function SumayResta($x, $y) {
    $suma = $x+$y;
    $resta = $x-$y;
    return "Suma = $suma y Resta = $resta";
}

$resultadoSumayResta = SumayResta($num1,$num2);
print "La suma y la resta de $num1 y $num2 son:";
print "<br>";
print $resultadoSumayResta;

print "<hr>";

print "<br>";
print "<p><a href='ejercicio6.html'>Volver al formulario.</a></p>";





?>


</body>
</html>