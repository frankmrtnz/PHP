<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3-EstructurasControl</title>
</head>
<body>
    
<?php

$dado1 = rand(1,6);
$dado2 = rand(1,6);
$dado3 = rand(1,6);
$dado4 = rand(1,6);

if($dado1 == $dado2){
    $iguales1 = $dado1;
} else {
    $iguales1 = 0;
}

if($dado3 == $dado4){
    $iguales2 = $dado3;
} else {
    $iguales2 = 0;
}

$total_j1 = $dado1+$dado2;
$total_j2 = $dado3+$dado4;



print "<h1>Juego: Dos dados más altos</h1>";
print "<p>Actualice la página para mostrar una nueva tirada.</p>";

print "<table>
        <tr>
            <td style='text-align: center'>   
                <b>Jugador 1</b>
            </td>
            <td style='text-align: center'>
                <b>Jugador 2</b>
            </td>
            <td style='text-align: center'>
                <b>Resultado</b>
            </td>
        </tr>
        <tr>
            <td style='background-color: red; padding:15px;'>
                <img src='img/$dado1.svg' width='150' height='150'>
                <img src='img/$dado2.svg' width='150' height='150'>
            </td>
            <td style='background-color: blue; padding:15px;'>
                <img src='img/$dado3.svg' width='150' height='150'>
                <img src='img/$dado4.svg' width='150' height='150'>
            </td>
            <td style='text-align: center'>";

            if ($iguales1 > $iguales2) {
                print "<p>Ha ganado el jugador 1.</p>";
            } else if ($iguales2 > $iguales1) {
                print "<p>Ha ganado el jugador 2.</p>";
            } else if ($total_j1 > $total_j2) {
                print "<p>Ha ganado el jugador 1.</p>";
            } else if ($total_j2 > $total_j1) {
                print "<p>Ha ganado el jugador 2.</p>";
            } else {
                print "<p>Jugador 1 y Jugador 2 han quedado empate.</p>";
            }


print       "</td>
        </tr>
        </table>";


?>


</body>
</html>