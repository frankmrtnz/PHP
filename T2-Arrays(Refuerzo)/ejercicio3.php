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

print "<h1 style='text-align:right; margin-right: 200px;'>Ej3-NEGACIÓN DE BITS</h1>";

$numero = 10;

// MATRIZ DE BITS ALEATORIOS
$inicial = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial[$i] = rand(0, 1);
}

// MUESTRA BITS ALEATORIOS
print "  <pre style=\"font-size: 300%;\">\n";
print "A: ";
foreach ($inicial as $bit) {
    print "$bit ";
}
print "\n";
print "\n";


// MATRIZ CON VALORES COMPLEMENTARIOS
$resultado = [];
for ($i = 0; $i < $numero; $i++) {
    if ($inicial[$i] == 1) {
        $resultado[$i] = 0;
    } else {
        $resultado[$i] = 1;
    }
}


// MUESTRA VALORES COMPLEMENTARIOS
print "<span style=\"text-decoration: overline\">A</span>: ";
foreach ($resultado as $bit) {
    print "$bit ";
}
print "</pre>\n";

?>

</body>
</html>