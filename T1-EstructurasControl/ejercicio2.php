<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2-EstructurasControl</title>
</head>
<body>
    



<?php

$dado1 = rand(1,6);
$dado2 = rand(1,6);


print "<h1>Juego: Dado más alto</h1>";
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
            </td>
            <td style='background-color: blue; padding:15px;'>
                <img src='img/$dado2.svg' width='150' height='150'>
            </td>
            <td>";

            if($dado1 == $dado2) {
                print "<p>Los dos jugadores han empatado.</p>";
            } else if($dado1 > $dado2) {
                print "<p>Ha ganado el jugador 1.</p>";
            } else if($dado2 > $dado1) {
                print "<p>Ha ganado el jugador 2.</p>";
            }

print       "</td>
        </tr>
        </table>";


?>


</body>
</html>