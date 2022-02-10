<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T2-Arrays1</title>
</head>
<body>
    
<?php

$minValores = $_REQUEST['minValores'];
$maxValores = $_REQUEST['maxValores'];
$valorMin = $_REQUEST['valorMin'];
$valorMax = $_REQUEST['valorMax'];

$valoresEnMatriz = rand($minValores,$maxValores);
$aleatorio = rand($valorMin,$valorMax);


print "<h1><b>Datos iniciales:</b></h1>";
print "<p>Número de valores en la matriz: " . $valoresEnMatriz . "</p>";
print "<p>Valores elegidos al azar entre $valorMin y $valorMax.</p>";


print "<h1><b>Matriz de valores:</b></h1>";
for($i=0; $i<$valoresEnMatriz; $i++){
    print "[$i] => " . rand($valorMin,$valorMax) . "<br>";
}


print "<p><a href='ejercicio5a.html'>Volver al formulario.</a></p>";

?>


</body>
</html>