<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3-PHP</title>
</head>
<body>
    
<?php

print "<h1>ECUACIÓN DE SEGUNDO GRADO (RESULTADO)</h1>";

$numA = $_REQUEST['numA'];
$numB = $_REQUEST['numB'];
$numC = $_REQUEST['numC'];

$negativo = -1;
$menos_numB = $numB * $negativo;
$op1 = pow($numB, 2);
$op2 = 4 * $numA * $numC;
$resta = $op1 - $op2;
$raiz = pow($resta, (1/2));
$dos_numA = 2 * $numA;

$resultado1 = ($menos_numB + $raiz) / $dos_numA;
$resultado2 = ($menos_numB - $raiz) / $dos_numA;

print "<p>La solución o soluciones de la ecuación <b style='font-size: 20px;'>(" 
. $numA . "<sup>2</sup>)x + (" . $numB . ")x + (" . $numC . ")</b> es o son:</p>";

if (($op1-4*$numA*$numC) < 0){ 
    print "<p>No tiene soluciones reales.</p>";
} else if (($op1-4*$numA*$numC) == 0) {
    print "<p>x = " . ($menos_numB/$dos_numA) . "</p>";
} else {
    print "<p>x<sub>1</sub> = " . $resultado1 . "</p>";
    print "<p>x<sub>2</sub> = " . $resultado2 . "</p>";
}


print "<p><a href='ejercicio3.html'>Volver al formulario.</a></p>";


?>

</body>
</html>