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

print "<h1 style='text-align:right; margin-right: 200px;'>Ej1 - PARTIDA DE DADOS</h1>";
print "<p>Actualice la página para mostrar una nueva tirada de dados.</p>";

$numero = rand(2, 7);

print "  <h2>Jugador 1</h2>\n";
print "\n";

// GUARDAMOS VALORES DEL JUGADOR 1
$dados1 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados1[$i] = rand(1, 6);
}

// MOSTRAMOS RESULTADO DEL JUGADOR 1
print "  <p>\n";
foreach ($dados1 as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
print "\n";

print "  <h2>Jugador 2</h2>\n";
print "\n";

// GUARDAMOS VALORES DEL JUGADOR 2
$dados2 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados2[$i] = rand(1, 6);
}

// MOSTRAMOS RESULTADOS DEL JUGADOR 2
print "<p>\n";
foreach ($dados2 as $dado) {
    print "<img src=\"img/$dado.svg\" alt=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "</p>\n";
print "\n";

print "  <h2>Resultado</h2>\n";
print "\n";

$ganaPrimero = 0;
$ganaSegundo = 0;
$empate = 0;
for ($i = 0; $i < $numero; $i++) {
    if ($dados1[$i] > $dados2[$i]) {
        $ganaPrimero++;
    } elseif ($dados1[$i] < $dados2[$i]) {
        $ganaSegundo++;
    } else {
        $empate++;
    }
}

// CANTIDAD DE PARTIDAS GANADAS POR JUGADOR
print "<p>El jugador 1 ha ganado <b>$ganaPrimero</b> ve";
if ($ganaPrimero != 1) {
    print "ces";
} else {
    print "z";
}
print ", el jugador 2 ha ganado <b>$ganaSegundo</b> ve";
if ($ganaSegundo != 1) {
    print "ces";
} else {
    print "z";
}
print " y los jugadores han empatado <b>$empate</b> ve";
if ($empate != 1) {
    print "ces";
} else {
    print "z";
}
print ".</p>\n";
print "\n";

// GANADOR DE LA PARTIDA
if ($ganaPrimero > $ganaSegundo) {
    print "<p>En total, ha ganado el jugador <b>1</b>.</p>\n";
} elseif ($ganaPrimero < $ganaSegundo) {
    print "<p>En total, ha ganado el jugador <b>2</b>.</p>\n";
} else {
    print "<p>En total, han empatado.</p>\n";
}

?>

</body>
</html>