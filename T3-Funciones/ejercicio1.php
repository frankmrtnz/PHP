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

print "<h1 style='text-align:center;'>Ej1-Semisuma dos números (Respuesta)</h1>";

$num1 = $_REQUEST['num1'];
$num2 = $_REQUEST['num2'];

    function semisuma($x, $y) {
        $semisuma = ($x+$y)/2;
        return $semisuma;
    }

    $resultado = semisuma($num1,$num2);

    print "La semisuma de $num1 y $num2 es $resultado";

    print "<br>";
    print "<p><a href='ejercicio1.html'>Volver al formulario.</a></p>";

?>


</body>
</html>