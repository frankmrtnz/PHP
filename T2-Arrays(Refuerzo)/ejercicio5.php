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

print "<h1 style='text-align:right; margin-right: 200px;'>Ej5-JUGADA DE RISK</h1>";


// MUESTRA CANTIDAD DE DADOS PARA JUGAR DEL ATACANTE
print "  <h2>Atacante</h2>\n";
print "\n";
$numero1 = rand(1, 3);
if ($numero1 == 1) {
    print "  <p>El atacante ataca con $numero1 dado:</p>\n";
} else {
    print "  <p>El atacante ataca con $numero1 dados:</p>\n";
}
print "\n";


// GUARDA VALORES DEL ATACANTE EN LA MATRIZ
$dados1 = [];
for ($i = 0; $i < $numero1; $i++) {
    $dados1[$i] = rand(1, 6);
}


// ORDENA PRIMERA MATRIZ Y MUESTRA RESULTADOS OBTENIDOS POR ATACANTE
rsort($dados1);
print "  <p>\n";
foreach ($dados1 as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}
print "  </p>\n";
print "\n";


// MUESTRA CANTIDAD DE DADOS DEL DEFENSOR
print "  <h2>Defensor</h2>\n";
print "\n";
$numero2 = rand(1, 2);
if ($numero2 == 1) {
    print "  <p>El defensor defiende con $numero2 dado:</p>\n";
} else {
    print "  <p>El defensor defiende con $numero2 dados:</p>\n";
}
print "\n";


// GUARDA VALORES DEL DEFENSOR EN LA MATRIZ
$dados2 = [];
for ($i = 0; $i < $numero2; $i++) {
    $dados2[$i] = rand(1, 6);
}


// ORDENA SEGUNDA MATRIZ Y MUESTRA RESULTADOS OBTENIDOS POR DEFENSOR
rsort($dados2);
print "  <p>\n";
foreach ($dados2 as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}
print "  </p>\n";
print "\n";


// CUENTA CUÁNTAS PARTIDAS HA PERDIDO CADA UNO
$menor = min($numero1, $numero2);
$bajasAtacante = 0;
$bajasDefensor = 0;
for ($i = 0; $i < $menor; $i++) {
    if ($dados1[$i] > $dados2[$i]) {
        $bajasDefensor++;
    } else {
        $bajasAtacante++;
    }
}

// MUESTRA BAJAS DE CADA JUGADOR
print "  <h2>Resultado</h2>\n";
print "\n";
print "  <p>El atacante pierde <strong>$bajasAtacante</strong> unidad";
if ($bajasAtacante != 1) {
    print "es";
}
print ". El defensor pierde <strong>$bajasDefensor</strong> unidad";
if ($bajasDefensor != 1) {
    print "es";
}
print ".</p>\n";

?>

</body>
</html>