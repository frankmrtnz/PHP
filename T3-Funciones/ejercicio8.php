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

print "<h1 style='text-align:center;'>Ej8 (Respuesta)</h1>";

$num1 = $_REQUEST['num1'];
$num2 = $_REQUEST['num2'];

print "<b>Números introducidos:</b><br>";
print "Primer número es $num1 y segundo número $num2.";

print "<hr>";


function contadorVueltas($x,$y){
    if($x > $y) {
        print "<p>El resultado es imposible por ser mayor desde $x hasta $y.</p>";
    } else {
        for($i=$x; $i<$y; $i++) {
            print "Desde: $i - Hasta: $y <br>";
        }
        print "Última vuelta, $i es igual a $y <br>";
    }
}


//Lo mismo pero con recursiva
function recursiva($num1,$num2){
    if($num1==$num2){
        print "Última vuelta $num1 hasta $num2";
    } else if($num1<$num2){
        print "Vuelta $num1 hasta $num2";
        recursiva($num1+1,$num2);
    } else {
        print "El primer número es mayor que el segundo";
    }
}

    
contadorVueltas($num1,$num2);


print "<br><br>";
print "<p><a href='ejercicio8.html'>Volver al formulario.</a></p>";

?>


</body>
</html>