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

print "<h1 style='text-align:center;'>Ej4-Sumatorio de un número (Respuesta)</h1>";

$numIntroducido = $_REQUEST['numIntroducido'];

function sumatorio($x) {

$numSumatorio = 0;
for($i=0; $i<$x; $i++){
    global $numSumatorio;
    $numSumatorio = $numSumatorio+$i;
    
}
return $numSumatorio;
}

$resultadoSumatorio = sumatorio($numIntroducido);

print "<p>El sumatorio del número $numIntroducido es $resultadoSumatorio.</p>";



print "<br>";
print "<p><a href='ejercicio4.html'>Volver al formulario.</a></p>";

?>

</body>
</html>