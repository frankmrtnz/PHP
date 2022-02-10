<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1-PHP</title>
</head>
<body>
    
<?php

print "<h1>CONVERTIDOR DE DIVISAS (RESULTADO)</h1>";

    $cantidad = $_REQUEST['cantidad'];
    $divisa = $_REQUEST['divisa'];

if($cantidad <= 0  || $cantidad >= 1000000){
    print "<p>No has introducido una cantidad de dinero correcta, consulte los rangos permitidos.</p>";
} else {
    switch ($divisa) {
        case 'USD':
            print $cantidad . " Dólares USA son " . number_format(($cantidad/1.314), 2) . " euros.";
            break;
        case 'GBP':
            print $cantidad . " Libras esterlinas son " . number_format(($cantidad/0.898), 2) . " euros.";
            break;
        case 'JPY':
            print $cantidad . " Dólares USA son " . number_format(($cantidad/132.11), 2) . " euros.";
            break;
        case 'PST':
            print $cantidad . " Pesetas españolas son " . number_format(($cantidad/166.38), 2) . " euros.";
            break;
    }
}

    print "<p>Gracias por utilizar este convertidor.</p>";

    print "<a href='ejercicio1.html'>Volver al formulario.</a>";
    

?>

</body>
</html>