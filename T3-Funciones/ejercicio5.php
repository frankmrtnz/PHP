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

print "<h1 style='text-align:center;'>Ej5 (Respuesta)</h1>";
print "<p>Introduce dos números, para dividirlos, calcular si es múltiplo de 2 y si la división de ambos es múltiplo de 2.</p>";
print "<br>";
print "<hr>";

$num1 = $_REQUEST['num1'];
$num2 = $_REQUEST['num2'];

function dividir($x, $y){
    $resultDivision = $x/$y;
    return "$resultDivision";
}
print "<b>- DIVISIÓN:</b>";
print "<br>";
print "El resultado de la división entre $num1/$num2 es: " . dividir($num1,$num2);

print "<hr>";

function multiploDe2($x) {
    if($x%2 == 0){
        return "<b>true</b>";
    } else {
        return "<b>false</b>";
    }

}
print "<b>- ES MÚLTIPLO DE 2 EL PRIMER NÚMERO (Devuelve true si lo es, false si no):</b>";
print "<br>";
print "¿El número $num1 es múltiplo de 2? " . multiploDe2($num1,$num2);

print "<hr>";


function multiploDe2DeDivision($x, $y) {
    $resultDivision = dividir($x,$y);
    $resultadoMultiplo = multiploDe2($resultDivision);
    return $resultadoMultiplo;
}
print "<b>- ES MÚLTIPLO DE 2 EL RESULTADO DE DIVIDIR LOS DOS NÚMEROS (Devuelve true si lo es, false si no):</b>";
print "<br>";
print "¿El resultado de dividir $num1/$num2 es múltiplo de 2? " . multiploDe2DeDivision($num1,$num2);


print "<hr>";

print "<br>";
print "<p><a href='ejercicio5.html'>Volver al formulario.</a></p>";



?>

</body>
</html>