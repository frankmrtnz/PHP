<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles-Ejercicio3</title>
</head>
<body>
    
<?php

print "<h1 style='text-align:center'>CÍRCULOS DE COLORES NUMERADOS</h1>";
print "<p>Actualice la página para mostrar un nuevo dibujo.</p>";

$circulos = rand(1,10);

print "<h2>$circulos círculo/s</h2>";

print "<table style='border: 1px solid #000;'>";
print "<tr style='border: 1px solid #000;'>";

for($i=1; $i<=$circulos; $i++) {
    print "<td style='border: 1px solid #000;'>
            <svg width='70' height='70' font-size='45' font-style:'bold'>
            <circle cx='35' cy='35' r='30' fill='hsl(" .rand(1,255). ",100%,50%)'></circle>
            <text x='23.5' y='50'>" .rand(1,9). "</text>
            </svg>
            </td>";
}    

print "</tr>";
print "</table>";

?>

</body>
</html>