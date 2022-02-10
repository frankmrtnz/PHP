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

print "<h1 style='text-align:center;'>Ej3-Cuadrado y cubo de un número (Respuesta)</h1>";

$numIntroducido = $_REQUEST['numIntroducido'];


function cuadrado($x) {
    $cuadrado = pow($x,2);
    return $cuadrado;
}

function cubo($x) {
    $cubo = pow($x,3);
    return $cubo;
}

$resultadoCuadrado = cuadrado($numIntroducido);
$resultadoCubo = cubo($numIntroducido);

print "<p>El cuadrado del número introducido $numIntroducido es $resultadoCuadrado.</p>";
print "<p>El cubo del número introducido $numIntroducido es $resultadoCubo.</p>";



print "<br>";
print "<p><a href='ejercicio3.html'>Volver al formulario.</a></p>";

?>

</body>
</html>