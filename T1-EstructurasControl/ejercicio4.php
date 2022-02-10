<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4-EstructurasControl</title>
</head>
<body>
    
<?php


$dado1 = rand(1,6);
$dado2 = rand(1,6);
$dado3 = rand(1,6);


print "<h1>Juego: Tres dados</h1>";
print "<p>Actualice la página para mostrar una nueva tirada.</p>";

print "<img src='img/$dado1.svg' width='150' height='150'>
       <img src='img/$dado2.svg' width='150' height='150'>
       <img src='img/$dado3.svg' width='150' height='150'>";

        if($dado1 == $dado2 && $dado2 == $dado3) {
                print "<p>Ha sacado trío de $dado1.</p>";
        } else if($dado1 == $dado2 || $dado1 == $dado3) {
            print "<p>Ha sacado una pareja de $dado1.</p>";
        } else if($dado2 == $dado1 || $dado2 == $dado3) {
            print "<p>Ha sacado una pareja de $dado2.</p>";
        } else {
            print "<p>No ha sacado ni pareja ni trío.</p>";
        }

?>

</body>
</html>