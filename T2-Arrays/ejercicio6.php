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

print "<h1 style='text-align: center;'><b>EJERCICIO 6 - ELIMINAR ELEMENTO DE MATRIZ (RESPUESTA)</b></h1>";


$minValores = $_REQUEST['minValores'];
$maxValores = $_REQUEST['maxValores'];
$valorMin = $_REQUEST['valorMin'];
$valorMax = $_REQUEST['valorMax'];
$valoresEnMatriz = rand($minValores,$maxValores);
$aleatorio = rand($valorMin,$valorMax);
$eliminado = $_REQUEST['eliminado'];


print "<h1><b>Datos iniciales:</b></h1>";
print "<p>Número de valores en la matriz: " . $valoresEnMatriz . "</p>";
print "<p>Valores elegidos al azar entre $valorMin y $valorMax.</p>";
print "<br>";


print "<h1><b>Matriz inicial de valores:</b></h1>";

$numeros = [];

for($i=0; $i<$valoresEnMatriz; $i++){
    $numAleatorio = rand($valorMin,$valorMax);
    print "[$i] => " . $numAleatorio . "<br>"; 
    array_push($numeros, $numAleatorio);
}


print "<h1><b>Matriz con valor eliminado:</b></h1>";
print "<p>Valor a eliminar: $eliminado</p>";

if($eliminado <= $valoresEnMatriz){
    unset($numeros[$eliminado]);
    print "<pre>";
    print_r($numeros);
    print "</pre>"; 
} else {
    print "<p>El valor indicado no se encuentra en la matriz.</p>";
}


print "<p><a href='ejercicio6.html'>Volver al formulario.</a></p>";


?>

</body>
</html>