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

$valoresEnMatriz = rand(5,15);
$numeros = array("0","1","2","3","4","5","6","7","8","9","10");

print "<h1><b>Datos iniciales:</b></h1>";
print "<p>Número de valores en la matriz: " . $valoresEnMatriz . "</p>";
print "<p>Valores elegidos al azar entre 0 y 10.</p>";

print "<h1><b>Matriz de valores:</b></h1>";
for($i=0; $i<$valoresEnMatriz; $i++){
    $aleatorio = rand(0,10);
    print "[$i] => " . $numeros[$aleatorio] . "<br>";
}

?>

</body>
</html>