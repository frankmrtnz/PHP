<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3-Funciones</title>
</head>
<body>
    
<?php

print "<h1 style='text-align: center;'>Ej12 - Fibonacci función recursiva (Respuesta)</h1>";

$numIntroducido = $_REQUEST['numIntroducido'];


function Fibonacci($numIntroducido) {
    if ($numIntroducido == 0) {
        return 0;    
    } else if ($numIntroducido == 1) {
        return 1;    
    } else {
        return (Fibonacci($numIntroducido-1) + Fibonacci($numIntroducido-2));
    }
}
  
for ($i = 0; $i < $numIntroducido; $i++){  
    print Fibonacci($i) . "<br>";
}


print "<br><br>";
print "<p><a href='ejercicio12.html'>Volver al formulario.</a></p>";

?>

</body>
</html>