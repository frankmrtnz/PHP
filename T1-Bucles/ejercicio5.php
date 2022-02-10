<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles-Ejercicio5</title>
</head>
<body>
    
<?php

print "<h1>SUCESIONES ARITMÉTICAS 1 (RESULTADO)</h1>";
print "<p>Escriba los tres valores y le mostraré los términos de la sucesión aritmética correspondiente.</p>";

$valorInicial = $_REQUEST['valorInicial'];
$incremento = $_REQUEST['incremento'];
$numValores = $_REQUEST['numValores'];

print "<p><b>Has introducido los siguientes valores:</b>
<br>
Valor Inicial = $valorInicial
<br>
Incremento = $incremento
<br>
Número de valores = $numValores
<br>
</p>";

print "<b>Por tanto, la sucesión aritmética será la siguiente:</b>
        <br>";

for($i=1; $i<=$numValores; $i++){
    print "<b style='font-size:30px'>$valorInicial<b>";
    $valorInicial = $valorInicial+$incremento;
    if($i == $numValores){
        print ".";
    } else if($i != $numValores){
        print ", ";
    }
}

print "<p style='font-size:16px'><a href='ejercicio5.html'>Volver al formulario.</a></p>";


?>

</body>
</html>