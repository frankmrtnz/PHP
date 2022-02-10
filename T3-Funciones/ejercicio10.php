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

print "<h1 style='text-align: center;'>Ej10 - Calcular salario por semana (Respuesta)</h1>";

$hrsTrabajadas = $_REQUEST['hrsTrabajadas'];
$precioHora = $_REQUEST['precioHora'];

function calcularSalario($hrsTrabajadas,$precioHora){
    global $hrsTrabajadas, $precioHora;
    $salario = $hrsTrabajadas*$precioHora;
    print "Sus horas trabajadas son: $hrsTrabajadas<br>
        El precio de la hora es: $precioHora €.<br>";

print "<hr>";

    if($hrsTrabajadas > 40) {
        print "Ha hecho más de 40 horas.<br> 
            Ha hecho 40 horas y " . ($hrsTrabajadas-40) . " horas extras (+50% precio de la hora).<br>";
        $salarioHrsExtras = (($hrsTrabajadas-40)*$precioHora)*1.5;
        $salario = (40*$precioHora)+$salarioHrsExtras;
        print "Por tanto, su salario será: " . $salario . "€. <br>"; 
    } else {
        print "Ha hecho $hrsTrabajadas horas, por tanto no ha realizado ninguna hora extra.<br>";
    } 
    
    
    if($salario<600) {
        print "Está exento de pagar el IRPF al ser menos de 600€.<br>
            Por tanto, su salario será: " . $salario . " €.";
    } else if($salario>=600 && $salario<=800) {
        print "Tu salario está entre 600€ y 800€, con un IRPF del 5%.<br>
            Su salario descontando el IRPF (5%) entonces queda: " . $salario*0.95 . " €.";
    } else if($salario>800 && $salario<1000) {
        print "Tu salario es mayor de 800€ y menor de 1000€.<br>
            Su salario descontando el IRPF (12%) entonces queda: " . $salario*0.88 . " €."; 
    } else {
        print "El salario es mayor o igual que 1000€.";
    }
}

calcularSalario($hrsTrabajadas,$precioHora);


print "<br><br>";
print "<p><a href='ejercicio10.html'>Volver al formulario.</a></p>";

?>

</body>
</html>