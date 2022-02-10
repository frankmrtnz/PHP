<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5-EstructurasControl</title>
</head>
<body>
    
<?php


$dado1 = rand(1,6);
$dado2 = rand(1,6);
$dado3 = rand(1,6);
$dado4 = rand(1,6);
$dado5 = rand(1,6);
$dado6 = rand(1,6);



print "<h1>Juego: Tres dados más altos</h1>";
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
                <img src='img/$dado1.svg' width='120' height='120'>
                <img src='img/$dado2.svg' width='120' height='120'>
                <img src='img/$dado3.svg' width='120' height='120'>
            </td>
            <td style='background-color: blue; padding:15px;'>
                <img src='img/$dado4.svg' width='120' height='120'>
                <img src='img/$dado5.svg' width='120' height='120'>
                <img src='img/$dado6.svg' width='120' height='120'>
            </td>
            <td>";


            //TRIOS
            if(($dado1 == $dado2 && $dado2 == $dado3) && ($dado4 == $dado5 && $dado5 == $dado6)){
                if($dado1*3 > $dado4*3) {
                    print "<p>Jugador 1 ha obtenido trío de dados iguales de mayor valor.</p>";
                } else if($dado4*3 > $dado1*3) {
                    print "<p>Jugador 2 ha obtenido trío de dados iguales de mayor valor.</p>";
                } else {
                    print "<p>Jugador 1 y Jugador 2 han empatado con tríos del mismo valor.</p>";
                }
            } else if(($dado1 == $dado2 && $dado2 == $dado3) && ($dado4 != $dado5 || $dado5 != $dado6 || $dado4 != $dado6)){
                print "<p>Ha ganado Jugador 1 al ser el único en sacar trío.</p>";
            } else if(($dado4 == $dado5 && $dado5 == $dado6) && ($dado1 != $dado2 || $dado2 != $dado3 || $dado1 != $dado3)){
                print "<p>Ha ganado Jugador 2 al ser el único en sacar trío.</p>";
            }

            //PAREJAS
            else if(($dado1 == $dado2 || $dado1 == $dado3) && ($dado4 == $dado5 || $dado4 == $dado6)) {
                if($dado1*2 > $dado4*2 ){
                    print "<p>Jugador 1 ha obtenido pareja de dados iguales de mayor valor.</p>";
                } else if($dado4*2 > $dado1*2){
                    print "<p>Jugador 2 ha obtenido pareja de dados iguales de mayor valor.</p>";
                } else {
                    print "<p>Jugador 1 y Jugador 2 han empatado con parejas del mismo valor.</p>";
                }
            } else if (($dado2 == $dado1 || $dado2 == $dado3) && ($dado5 == $dado4 || $dado5 == $dado6)) {
                if($dado2*2 > $dado5*2 ){
                    print "<p>Jugador 1 ha obtenido pareja de dados iguales de mayor valor.</p>";
                } else if($dado5*2 > $dado2*2){
                    print "<p>Jugador 2 ha obtenido pareja de dados iguales de mayor valor.</p>";
                } else {
                    print "<p>Jugador 1 y Jugador 2 han empatado con parejas del mismo valor.</p>";
                }
            } else if (($dado1 == $dado2 || $dado1 == $dado3) && ($dado4 != $dado5 && $dado4 != $dado6 && $dado5!=$dado6)) {
                print "<p>Ha ganado Jugador 1 al ser el único que ha sacado pareja.</p>";
            } else if (($dado2 == $dado1 || $dado2 == $dado3) && ($dado4 != $dado5 && $dado4 != $dado6 && $dado5!=$dado6)) {
                    print "<p>Ha ganado Jugador 1 al ser el único que ha sacado pareja.</p>";
            } else if (($dado4 == $dado5 || $dado4 == $dado6) && ($dado1 != $dado2 && $dado1 != $dado3 && $dado2!=$dado3)) {
                print "<p>Ha ganado Jugador 2 al ser el único que ha sacado pareja.</p>";
            } else if (($dado5 == $dado4 || $dado5 == $dado6) && ($dado1 != $dado2 && $dado1 != $dado3 && $dado2!=$dado3)) {
                print "<p>Ha ganado Jugador 2 al ser el único que ha sacado pareja.</p>";

            //NO TRIOS NI PAREJAS
            } else if(($dado1 != $dado2 || $dado2 != $dado3 || $dado1!=$dado3) && ($dado4 != $dado5 || $dado5 != $dado6 || $dado4!=$dado6)){
                if(($dado1+$dado2+$dado3) > ($dado4+$dado5+$dado6)) {
                    print "<p>Gana Jugador 1 al obtener mayor puntuación.</p>"; 
                } else if(($dado4+$dado5+$dado6) > ($dado1+$dado2+$dado3)){
                    print "<p>Gana Jugador 2 al obtener mayor puntuación.</p>";
                } else {
                    print "<p>Empatan Jugador 1 y Jugador 2 al tener la misma puntuación.</p>";
                }
            }

print       "</td>
        </tr>
        </table>";

?>

</body>
</html>