<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T2-Arrays(Refuerzo)</title>
</head>
<body>
    
<?php

print "<h1 style='text-align:right; margin-right: 200px;'>Ej2-'Y' LÓGICO</h1>";


$numero = 10;

// PRIMERA MATRIZ DE BITS ALEATORIOS
$inicial1 = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial1[$i] = rand(0, 1);
}

// MOSTRAMOS BITS DE LA PRIMERA MATRIZ
print "  <pre style=\"font-size: 300%;\">\n";
print "   A   : ";
foreach ($inicial1 as $bit) {
    print "$bit ";
}
print "\n";
print "\n";

// SEGUNDA MATRIZ DE BITS ALEATORIOS
$inicial2 = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial2[$i] = rand(0, 1);
}

// MOSTRAMOS BITS DE LA SEGUNDA MATRIZ
print "   B   : ";
foreach ($inicial2 as $bit) {
    print "$bit ";
}
print "\n";
print "\n";


// CREAMOS MATRIZ CON RESULTADO DE LA CONJUNCIÓN LÓGICA
$resultado = [];
for ($i = 0; $i < $numero; $i++) {
    $resultado[$i] = (int)($inicial1[$i] && $inicial2[$i]);
}


// MUESTRA VALORES CALCULADOS
print "A and B: ";
foreach ($resultado as $bit) {
    print "$bit ";
}
print "\n";
print "</pre>\n";
?>

</body>
</html>