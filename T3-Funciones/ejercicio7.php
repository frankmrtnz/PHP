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

print "<h1 style='text-align:center;'>Ej7 - Números primos (Respuesta)</h1>";
print "<p>Introduce un número y te muestra los números primos del 1 hasta el número introducido.</p>";
print "<hr>";

$minimo = 1;
$maximo = $_REQUEST['num2'];

print "Los números primos del $minimo hasta el $maximo son: <br><br>";


print "El número <b>$minimo</b> ES PRIMO.<br>";
for($i=$minimo; $i<=$maximo; $i++){
    if(numerosPrimos($i)){
        print "El número <b>$i</b> ES PRIMO. <br>";
    } else {}
}

function numerosPrimos($numIntroducido){
    $contador = 0;

    for($i=1; $i<=$numIntroducido; $i++){
        if($numIntroducido%$i == 0){
            $contador = $contador + 1;
        }
    }

    if($contador==2){
        return true;    // Sí es primo
    } else {
        return false;   // No es primo
    }

}

print "<br>";
print "<p><a href='ejercicio7.html'>Volver al formulario.</a></p>";


/*
for ($i = $n1; $i <= $n2; $i++)
{
$nDiv = 0; // Número de divisores
for ($n = 1; $n <= $i; $n++) // Desde 1 hasta el valor que tenga $i
{
if($i%$n == 0) // $n es un divisor de $i
{
$nDiv = $nDiv + 1; // Agregamos un divisor mas.
}
}
if($nDiv == 2 or $i == 1)// Si tiene 2 divisores ó es 1 --> Es primo
{
print '<br>';
print $i;
}
}
*/


?>

</body>
</html>