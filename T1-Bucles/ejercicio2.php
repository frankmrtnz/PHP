<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles-Ejercicio2</title>
</head>
<body>
    
<?php

print "<h1 style='text-align:center'>CÍRCULOS DE COLORES EN FILA</h1>";
print "<p>Actualice la página para mostrar un nuevo dibujo.</p>";

$circulos = rand(1,10);

print "<h2>$circulos círculo/s</h2>";

print "<table style='border: 1px solid #000;'>";
print "<tr style='border: 1px solid #000;'>";

for($i=1; $i<=$circulos; $i++) {
    print "<td style='border: 1px solid #000;'>"; 
    print   "<svg width=100 height=100> 
                <circle cx=50 cy=50 r=35 stroke='rgb' stroke-width=2 fill='rgb(".rand(1,254).",".rand(1,254).",".rand(1,254).")'> 
            </svg>";
    print "</td>";
}

print "</tr>";
print "</table>";

?>

</body>
</html>