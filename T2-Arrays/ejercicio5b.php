<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$minValores = $_REQUEST['minValores'];
$maxValores = $_REQUEST['maxValores'];
$valorMin = $_REQUEST['valorMin'];
$valorMax = $_REQUEST['valorMax'];
$valoresEnMatriz = rand($minValores,$maxValores);
$aleatorio = rand($valorMin,$valorMax);
$orden = $_REQUEST['orden'];


print "<h1><b>Datos iniciales:</b></h1>";
print "<p>Número de valores en la matriz: " . $valoresEnMatriz . "</p>";
print "<p>Valores elegidos al azar entre $valorMin y $valorMax.</p>";

$numeros = [];

for($i=0; $i<$valoresEnMatriz; $i++){
    $numAleatorio = rand($valorMin,$valorMax);
    print "[$i] => " . $numAleatorio . "<br>"; 
    array_push($numeros, $numAleatorio);
}


print "<h1><b>Matriz ordenada de valores:</b></h1>";

if($orden == 'directo'){
    print "[Orden directo]";
    sort($numeros);     //Ordena alfabeticamente/numeralmente
    print "<pre>";
    print_r($numeros);
    print "</pre>";   
}else if($orden == 'inverso'){
    print "[Orden inverso]";
    rsort($numeros);    //Ordena alfabeticamente/numeralmente al reverso
    print "<pre>";
    print_r($numeros);
    print "</pre>";  
}else if($orden == ""){
    print "No has seleccionado ningún orden.";
    print "<pre>";
    print_r($numeros);
    print "</pre>"; 
}


print "<p><a href='ejercicio5b.html'>Volver al formulario.</a></p>";


?>

</body>
</html>