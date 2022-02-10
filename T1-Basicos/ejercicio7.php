<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
</head>
<body>
    
<?php

$r1 = rand(50, 150);
$r2 = rand(50, 150);
$r3 = rand(50, 150);

print " <p>Actualice la página para mostrar tres nuevos círculos</p>";


print "<svg width='1000' height='1000'>\n";
print "<circle cx=$r1 cy=200 r=$r1 stroke='black'
        stroke-width=2 fill='red'> </circle>";
print "<circle cx=". ($r1*2+$r2) ." cy=200 r=$r2 stroke='black'
        stroke-width=2 fill='green'> </circle>";
print "<circle cx=". ($r1*2+$r2*2+$r3) ." cy=200 r=$r3 stroke='black'
        stroke-width=2 fill='blue'> </circle>";
print "</svg>";


?>

</body>
</html>