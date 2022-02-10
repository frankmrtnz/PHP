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

print "<h1 style='text-align:right; margin-right: 200px;'>Ej4-TIRADA DE DADOS ORDENADA</h1>";

$numero = rand(2, 7);

// CREA MATRIZ DE DADOS ALEATORIOS
$dados = [];
for ($i = 0; $i < $numero; $i++) {
    $dados[$i] = rand(1, 6);
}

// MUESTRA DADOS ALEATORIOS
print "  <h2>Tirada de $numero dados:</h2>\n";
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}
print "  </p>\n";
print "\n";

print "<hr>";

// ORDENA LOS DADOS
sort($dados);

// MUESTRA DADOS ORDENADOS
print "  <h2>Tirada ordenada de menor a mayor:</h2>\n";
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}
print "  </p>\n";
?>

</body>
</html>